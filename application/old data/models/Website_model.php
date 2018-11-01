<?php
class Website_model extends CI_Model
{
	public function getServices($catid)
    {
        
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('cat_id',$catid);
        $query = $this->db->get();

        if($query->num_rows())
        {
        	$this->db->select('cat_name');
	        $this->db->from('categories');
	        $this->db->where('cat_id',$catid);
	        $q = $this->db->get();
	        $catname=$q->result();
        	$a=array("category_name"=>$catname[0]->cat_name,"services"=>$query->result());
        	return $a;
        }
        else
        {
            return false;
        }

    }

    public function getContacts($ser_id)
    {
        
        $this->db->select('mem_name,mem_id,business_name,address,mobile_no,imagelink');
        $this->db->from('members');
        $this->db->where('service_id',$ser_id);
        $this->db->where('is_active',1);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }
    public function getDetailContact($m_id)
    { 
        $q=$this->db->query("update members set web_view=web_view+1 where mem_id=".$m_id."");

        $this->db->select('*');
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
    

    public function getsearchlist()
    {
        $services=$this->db->query("select ser_id as id,service_name as name,'service' as type from services");
        $contact=$this->db->query("select mem_id as id,mem_name as name,'contact' as type from members where is_active=1");
        $business=$this->db->query("select mem_id as id,business_name as name,'contact' as type from members where is_active=1");
        $categories=$this->db->query("select cat_id as id,cat_name as name,'category' as type from categories");
        $res=array();
        if($categories->num_rows()>0)
        {
            $res=$categories->result();
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

    

    
}