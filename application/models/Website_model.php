<?php
class Website_model extends CI_Model
{
    public function getlang($lang,$arr)
    {
        if($lang=="english")
            return $arr[0];
        if($lang=="hindi")
            return $arr[1];
        if($lang=="marathi")
            return $arr[2];
        return 0;
    }

	public function getServices($catid,$lang)
    {
        $att=array("service_name","service_hname","service_mname");
        $sname=$this->getlang($lang,$att);
        $this->db->select('ser_id,cat_id,'.$sname.' as service_name,iconlink');
        $this->db->from('services');
        $this->db->where('cat_id',$catid);
        $this->db->order_by($sname,'ASC');
        $query = $this->db->get();

        if($query->num_rows())
        {
            $att=array("cat_name","cat_hname","cat_mname");
            $cname=$this->getlang($lang,$att);
        	$this->db->select($cname);
	        $this->db->from('categories');
	        $this->db->where('cat_id',$catid);
	        $q = $this->db->get();
	        $catname=$q->result();
        	$a=array("category_name"=>$catname[0]->$cname,"services"=>$query->result());
        	return $a;
        }
        else
        {
            return false;
        }

    }
/*
    SELECT * , (3956 * 2 * ASIN(SQRT( POWER(SIN((20.0078443 - `lat`) *  pi()/180 / 2), 2) +COS(20.0078443 * pi()/180) * COS(`lat` * pi()/180) * POWER(SIN(( 73.7571348 - `log`) * pi()/180 / 2), 2) ))) as distance from members having  distance <= 10 order by distance*/

    public function getnearContacts($ser_id,$lang,$lat,$long)
    {
       // echo "in controller";
        $att=array("mem_name","mem_hname","mem_mname");
        $mname=$this->getlang($lang,$att);
         $att=array("business_name","business_hname","business_mname");
        $bname=$this->getlang($lang,$att);
         $att=array("address","haddress","maddress");
        $address=$this->getlang($lang,$att);      
        
        $this->db->select($mname.' as mem_name ,mem_id,'.$bname.' as business_name ,'.$address.' as address,mobile_no,imagelink,((3956 * 2 * ASIN(SQRT( POWER(SIN(('.$lat.' - `lat`) *  pi()/180 / 2), 2) +COS('.$lat.' * pi()/180) * COS(`lat` * pi()/180) * POWER(SIN(('.$long.' - `log`) * pi()/180 / 2), 2) )))*1.6) as distance');
        $this->db->from('members');
        $this->db->where('service_id',$ser_id);
        $this->db->where('is_active',1);
        $this->db->where('is_deleted',0);
        $this->db->order_by('distance','ASC');
        $query = $this->db->get();
        $res=$query->result();
      	//print_r($res);
      	foreach ($res as $key => $value) {
      		$res[$key]->distance = number_format((float)$res[$key]->distance, 1, '.', '');
      	}
        return $res;
        /*if($query->num_rows())
        {
            $res=$query->result();
            shuffle ($res);
            return $res;
        }*/
            
       /* else
            return false;*/
    }

    public function getContacts($ser_id,$lang)
    {
        $att=array("mem_name","mem_hname","mem_mname");
        $mname=$this->getlang($lang,$att);
         $att=array("business_name","business_hname","business_mname");
        $bname=$this->getlang($lang,$att);
         $att=array("address","haddress","maddress");
        $address=$this->getlang($lang,$att);      
        
        $this->db->select($mname.' as mem_name ,mem_id,'.$bname.' as business_name ,'.$address.' as address,mobile_no,imagelink ');
        $this->db->from('members');
        $this->db->where('service_id',$ser_id);
        $this->db->where('is_active',1);
        $this->db->where('is_deleted',0);
        $query = $this->db->get();
        if($query->num_rows())
        {
            $res=$query->result();
            shuffle ($res);
            return $res;
        }
            
        else
            return false;
    }
    public function getDetailContact($m_id,$lang)
    { 
        $q=$this->db->query("update members set web_view=web_view+1 where mem_id=".$m_id."");

         $att=array("mem_name","mem_hname","mem_mname");
        $mname=$this->getlang($lang,$att);
         $att=array("business_name","business_hname","business_mname");
        $bname=$this->getlang($lang,$att);
         $att=array("address","haddress","maddress");
        $address=$this->getlang($lang,$att);   
         $att=array("s_p_info","s_p_hinfo","s_p_minfo");
        $spinfo=$this->getlang($lang,$att);        
        $this->db->select($mname.' as mem_name ,mem_id,'.$bname.' as business_name ,'.$address.' as address,mobile_no,imagelink,landline_no,email_id,website,youtube,lat,log,'.$spinfo.' as s_p_info');

        $this->db->from('members');
        $this->db->where('mem_id',$m_id);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }
    public function getads()
    {
    	$query = $this->db->query("SELECT * FROM `ads` WHERE is_active=1");
    	if($query->num_rows())
    	{
    		$res=$query->result();
            $ads=array();
            shuffle($res);
            if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            //echo is_array($ads);
            //print_r(is_array($ads));
            //exit();
            if(is_array($ads))
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }
            
            return $ad;
    	}
    	else
    		return false;
    }

    public function getads1($catid)
    {
    	$query = $this->db->query("SELECT * FROM `ads` WHERE is_active=1 AND mem_id IN(select `mem_id` FROM members WHERE `service_id` IN (SELECT `ser_id` FROM `services` WHERE `cat_id`=".$catid.") AND is_active =1)");
    	if($query->num_rows())
        {
            $res=$query->result();
            $ads=array();
            shuffle($res);
            if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            if(is_array($ads)=="Array")
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }
            
            return $ad;
        }
    	else
    		return false;
    }
    public function getads2($mem_id)
    {
    	$query = $this->db->query("SELECT * FROM `ads` WHERE is_active=1 AND mem_id =$mem_id");
    	if($query->num_rows())
    	{
            $res=$query->result();
            $ads=array();
            shuffle($res);
            if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            if(is_array($ads))
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }
            
            return $ad;
    	}
    	else
    		return false;
    }

     public function getads3($serid)
    {

        $query = $this->db->query("SELECT * FROM `ads` WHERE is_active=1 AND mem_id IN(select `mem_id` FROM members WHERE `service_id` IN (SELECT `ser_id` FROM `services` WHERE `cat_id`=(select cat_id from services where ser_id=".$serid.")) AND is_active =1)");
        if($query->num_rows())
        {
            $res=$query->result();
            $ads=array();
            shuffle($res);
            if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            if(is_array($ads))
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }
            
            return $ad;
        }
        else
            return false;
    }
    public function savefeedback($data)
    {
        $res = $this->db->insert('feedback',$data);
        if($res)
            return true;
        else
            return false;
    }
    

    public function getsearchlist($lang)
    {
        $att=array("mem_name","mem_hname","mem_mname");
        $mname=$this->getlang($lang,$att);
         $att=array("business_name","business_hname","business_mname");
        $bname=$this->getlang($lang,$att);
         $att=array("service_name","service_hname","service_mname");
        $sname=$this->getlang($lang,$att);

         $att=array("cat_name","cat_hname","cat_mname");
        $cname=$this->getlang($lang,$att);
         
        $cat=$this->db->query("select cat_id as id,".$cname." as name,'category' as type from categories");

         $services=$this->db->query("select ser_id as id,".$sname." as name,'service' as type from services");
        $contact=$this->db->query("select mem_id as id,".$mname." as name,'contact' as type from members where is_active=1 and is_deleted=0");
        $business=$this->db->query("select mem_id as id,".$bname." as name,'contact' as type from members where is_active=1 and is_deleted=0");
      
        $res=array();
        if($cat->num_rows()>0)
        {
            $res=$cat->result();
            $res=array_merge($res,$services->result());
            $res=array_merge($res,$contact->result());
            $res=array_merge($res,$business->result());
         
            $all=array();
            $ids=array();
            $names=array();
            $types=array();
            foreach ($res as $key => $value) {
            array_push($ids,$value->id);
            array_push($names,$value->name);
            array_push($types,$value->type);
            }
            $all["ids"]=$ids;
            $all["names"]=$names;
            $all["types"]=$types;

            return $all;


        }
        else
            return false;
    }

    public function getsearchlist1()
    {
        $services=$this->db->query("select ser_id as id,service_name as name,'service' as type from services");
        $contact=$this->db->query("select mem_id as id,mem_name as name,'contact' as type from members where is_active=1");
        $business=$this->db->query("select mem_id as id,business_name as name,'contact' as type from members where is_active=1");
        $res=array();
        if($services->num_rows()>0)
        {
            $res=$services->result();
            $res=array_merge($res,$contact->result());
            $res=array_merge($res,$business->result());
            return $res;
        }
        else
            return false;
    }
    public function getsearchlist2()
    {
        $contact=$this->db->query("select mem_id as id,mem_name as name,'contact' as type from members where is_active=1");
        $business=$this->db->query("select mem_id as id,business_name as name,'contact' as type from members where is_active=1");
        $res=array();
        if($contact->num_rows()>0)
        {
            $res=$contact->result();
            $res=array_merge($res,$business->result());
            return $res;


        }
        else
            return false;
    }

     public function getoffers()
    {
        $query = $this->db->query("SELECT * FROM `offers` WHERE is_active=1");
        if($query->num_rows())
        {
            $res=$query->result();
            $ads=array();
            shuffle($res);
           /* if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            //echo is_array($ads);
            //print_r(is_array($ads));
            //exit();
            if(is_array($ads))
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }*/
            
            return $res;
        }
        else
            return false;
    }

    public function inccallcount($m_id)
    {
     $q=$this->db->query("update members set web_call_count=web_call_count+1 where mem_id=".$m_id."");
     return true;
    }

    public function inccount()
    {
     $q=$this->db->query("update setting set count=count+1 where id=1");
     return true;
    }
     public function getcount()
    {
    $q1=$this->db->query("select (SELECT count FROM setting WHERE  id=1) as webcount, 
       (SELECT COUNT(*) FROM members WHERE is_deleted=0) as memcount,(SELECT COUNT(*) FROM services) as servicecount");
     $res=$q1->result();
     return $res;
    }

    public function addenquiry($data)
    {

        $res = $this->db->insert('registration',$data);
        if($res)
            return true;
        else
            return false;
    }

    public function addquery($data)
    {    

        $res = $this->db->insert('enquiry',$data);
        if($res)
            return true;
        else
            return false;
    }

    

    
}