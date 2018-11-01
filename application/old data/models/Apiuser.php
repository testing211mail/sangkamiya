<?php
class apiuser extends CI_Model
{
    public function demo()
    {
        return true;
    }
    public function getcategories()
    {
        $query=$this->db->query("select * from categories");        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getservices($catid)
    {
        $query=$this->db->query("select * from services where cat_id=".$catid."");        
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
    public function getcontacts($ser_id)
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

    public function getdetailcontact($m_id)
    {    
         $q=$this->db->query("update members set mobile_view=mobile_view+1 where mem_id=".$m_id."");
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
         $q=$this->db->query("update members set call_count=call_count+1 where mem_id=".$m_id."");
        return true;
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


     public function inccallcount($m_id)
    {
     $q=$this->db->query("update members set app_call_count=app_call_count+1 where mem_id=".$m_id."");
     return true;
    }


}