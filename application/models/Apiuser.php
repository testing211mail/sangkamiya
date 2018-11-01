<?php
class apiuser extends CI_Model
{
    public function demo()
    {
        return true;
    }
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
    public function getcategories($lang)
    {
        $att=array("cat_name","cat_hname","cat_mname");
        $cname=$this->getlang($lang,$att);
        $query=$this->db->query("select cat_id ,".$cname ." as cat_name from categories".'');        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getservices($catid,$lang)
    {
        $att=array("service_name","service_hname","service_mname");
        $sname=$this->getlang($lang,$att);
       /* $this->db->select('ser_id,cat_id,'.$sname.' as service_name,iconlink');*/
        $query=$this->db->query('select ser_id,cat_id,'.$sname.' as service_name,iconlink from services where cat_id='.$catid.'  order by '.$sname.' ASC');        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getcatid($ser_id)
    {
        $query=$this->db->query("select cat_id from services where ser_id=".$ser_id."");        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }
    public function getcontacts($ser_id,$lang)
    {
         $att=array("mem_name","mem_hname","mem_mname");
        $mname=$this->getlang($lang,$att);
         $att=array("business_name","business_hname","business_mname");
        $bname=$this->getlang($lang,$att);
         $att=array("address","haddress","maddress");
        $address=$this->getlang($lang,$att);      
        
        $this->db->select($mname.' as mem_name ,mem_id,'.$bname.' as business_name ,'.$address.' as address,mobile_no,imagelink ');
        
      //  $this->db->select('mem_name,mem_id,business_name,address,mobile_no,imagelink');
        $this->db->from('members');
        $this->db->where('service_id',$ser_id);
        $this->db->where('is_active',1);
        $this->db->where('is_deleted',0);
        $this->db->order_by($bname,"ASC");
        $query = $this->db->get();
        if($query->num_rows())
        {
            $res=$query->result();
            shuffle ($res);
            return $res;
           /* return $query->result();*/
        }
        else
            return false;
    }

    public function getdetailcontact($m_id,$lang)
    {    
         $q=$this->db->query("update members set mobile_view=mobile_view+1 where mem_id=".$m_id."");

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
        $query = $this->db->query("SELECT * FROM `ads` WHERE is_active=1 AND mem_id =".$mem_id."");
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

    public function countcall($m_id)
    {    
         $q=$this->db->query("update members set app_call_count=app_call_count+1 where mem_id=".$m_id."");
        return true;
    }

    public function getsearchlist($lang)
    {        $att=array("mem_name","mem_hname","mem_mname");
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

    }


     public function inccallcount($m_id)
    {
     $q=$this->db->query("update members set app_call_count=app_call_count+1 where mem_id=".$m_id."");
     return true;
    }

      public function getoffers()
    {
        $query=$this->db->query("SELECT * FROM `offers` WHERE is_active=1");
        if($query->num_rows())
            return $query->result();
        else
            return false;
     
    }

    public function submitFeedback($data)
    {
        $res = $this->db->insert('feedback',$data);
        if($res)
            return true;
        else
            return false;

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