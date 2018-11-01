<?php
class Admin_model extends CI_Model
{
    public function validateadmin($username,$password)
    {
        $this->db->select("*");
        $this->db->from('userlogin');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        else
            return false;     
    }

     public function getallcategories()
    {
        $this->db->select("*");
        $this->db->from('categories');
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        else
            return false;     
    }

     public function getservices($cat_id)
    {
        $this->db->select("*");
        $this->db->from('services');
        $this->db->where('cat_id',$cat_id);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        else
            return false;
    }
    public function addservice($data)
    {
        $res = $this->db->insert('services',$data);
        if ($res) {
            return true;
        }
        return false;
    }

    public function addmember($data)
    {
        $res = $this->db->insert('members',$data);
        if ($res) {
            return true;
        }
        else 
            return false;
    }

    public function getallmembers()
    {
        $res = $this->db->query('SELECT members.* , services.service_name FROM members join services on members.service_id = services.ser_id where is_deleted="0"');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
        
    }

    public function getmemberdetail($id)
    {
        $res = $this->db->query('SELECT members.* , services.service_name FROM members join services on members.service_id = services.ser_id where mem_id='.$id.' AND is_deleted="0"');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
        
    }

    public function getallads()
    {
        $res = $this->db->query('SELECT ads.* , members.mem_name FROM ads join members on members.mem_id = ads.mem_id');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
    }

    public function addAds($data)
    {
        $res = $this->db->insert('ads',$data);
        if ($res) {
            return true;
        }
        else 
            return false;
    }

    public function addOffers($data)
    {
        $res = $this->db->insert('offers',$data);
        if ($res) {
            return true;
        }
        else 
            return false;
    }

    public function editService($formdata)
    {
    	//print_r($formdata);exit();
    	$this->db->where('ser_id',$formdata['ser_id']);
		return $this->db->update('services',$formdata);
    }

    public function editMember($formdata)
    {
        //print_r($formdata);exit();
        $this->db->where('mobile_no',$formdata['mobile_no']);
        return $this->db->update('members',$formdata);
    }

    public function editimagelink($id,$formdata)
    {
    	$this->db->where('mem_id',$id);
		return $this->db->update('members',$formdata);	
    }

    public function editiconlink($id,$formdata)
    {
        $this->db->where('ser_id',$id);
        return $this->db->update('services',$formdata);  
    }

    public function deletemember($id)
    {
        $this->db->where('mem_id',$id);
        $this->db->set('is_deleted','1');
        return $this->db->update('members');
    }

    public function deletead($id)
    {
        $this->db->where('ad_id', $id);
        $this->db->delete('ads'); 
    }

     public function deleteoffer($id)
    {
        $this->db->where('offer_id', $id);
        $this->db->delete('offers'); 
    }

    public function getallfeedback()
    {
        $this->db->select("*");
        $this->db->from("feedback");
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return 0;
    }

    public function getdetailservice($id)
    {
        $this->db->select("*");
        $this->db->from("services");
        $this->db->where("ser_id",$id);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return 0;
    }

     public function getalloffers()
    {
        $res = $this->db->query('SELECT offers.* , members.mem_name FROM offers join members on members.mem_id = offers.mem_id');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
    }
      public function getreport()
    {
        $res = $this->db->query('SELECT * from members where is_deleted =0');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
    }
    
    
}