<?php
class Admin_model extends CI_Model
{
    public function validateadmin($username,$password)
    {
        $this->db->select("*");
        $this->db->from('adminlogin');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        else
            return false;     
    }

    public function validateuser($username,$password)
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
        $this->db->where('is_deleted','false');
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        else
            return false;     
    }

    public function insertUser($data){
        $res = $this->db->insert('userlogin',$data);
        if ($res) {
            return true;
        }
        return false;
    }

    public function getAllUsers()
    {
        $res = $this->db->query('select * from userlogin');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;     
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('userlogin');
        return true;
    }

    public function addcategory($data)
    {
        $res = $this->db->insert('categories',$data);
        if ($res) {
            return true;
        }
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
        $res = $this->db->query('SELECT members.* , services.service_name FROM members join services on members.service_id = services.ser_id where members.is_deleted="false"');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
        
    }

    public function getmemberdetail($id)
    {
        $res = $this->db->query('SELECT members.* , services.service_name,services.cat_id FROM members join services on members.service_id = services.ser_id where mem_id='.$id.' AND members.is_deleted="false"');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
        
    }

    public function getalliads()
    {
        $res = $this->db->query('SELECT imgads.* , members.mem_name FROM imgads join members on members.mem_id = imgads.mem_id');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
    }

    public function addiads($data)
    {
        $res = $this->db->insert('imgads',$data);
        if ($res) {
            return true;
        }
        else 
            return false;
    }

    public function deleteiad($id)
    {
    	  $res = $this->db->query('SELECT imgads.* FROM imgads where img_ad_id='.$id."");
        $result = $res->result();

    	 if (file_exists($result["imagelink"])) {
    unlink($result[0]["imagelink"]);

  }
        $this->db->where('img_ad_id', $id);
        $this->db->delete('imgads'); 
    }

      public function getallvads()
    {
        $res = $this->db->query('select * from videoads where is_deleted="false"');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
    }

    public function addvads($data)
    {
        $res = $this->db->insert('videoads',$data);
        if ($res) {
            return true;
        }
        else 
            return false;
    }

    public function deletevad($id)
    {
        $res = $this->db->query('SELECT videoads.* FROM videoads where vidad_id='.$id."");
        $result = $res->result_array();
       /* print_r($result);
        exit();*/
     /*     $res = $this->db->query('SELECT videolink.* FROM videoads where vidad_id='.$id."");
        $result = $res->result_array();*/

         if (file_exists($result[0]["videolink"])) {
    unlink($result[0]["videolink"]);
}
        $this->db->where('vidad_id', $id);
        $this->db->delete('videoads'); 
        return true;
    }  

    public function editService($formdata,$id)
    {
    	$this->db->where('ser_id',$id);
		return $this->db->update('services',$formdata);
    }
    public function editCategory($id,$formdata)
    {
        $this->db->where('cat_id',$id);
        return $this->db->update('categories',$formdata);
    }

    public function editMember($formdata,$id)
    {
        //print_r($formdata);exit();
        $this->db->where('mem_id',$id);
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

         $res = $this->db->query('SELECT imagelink.* FROM members where mem_id='.$id."");
        $result = $res->result();

         if (file_exists($result["imagelink"])) {
    unlink($result[0]["imagelink"]);
}

        $this->db->where('mem_id',$id);
        $this->db->set('is_deleted','1');
        return $this->db->update('members');
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

    public function getdetailCategory($id)
    {
        $this->db->select("*");
        $this->db->from("categories");
        $this->db->where("cat_id",$id);
        $this->db->where("is_deleted","false");

        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return 0;
    }


      public function getallmenus()
    {
        $res = $this->db->query('select * from menus where is_deleted="false"');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
    }

    public function addmenu($data)
    {
        $res = $this->db->insert('menus',$data);
        if ($res) {
            return true;
        }
        else 
            return false;
    }

    public function deletemenu($id)
    {
        $this->db->where('menu_id', $id);
        $this->db->delete('menus'); 
    }

      public function getmenudetail($id)
    {
        $res = $this->db->query('select * from menus where is_deleted="false" and menu_id='.$id.'');
        $result = $res->result();

        if ($result)
            return $result[0];
        else
            return false;
    }

    public function editmenu($id,$name)
    {
        $d=array();
        $d["menu_name"]=$name;
        $this->db->where('menu_id',$id);
        return $this->db->update('menus',$d);
    }

    public function getallenquiries()
    {
        $res = $this->db->query('select * from enquiry');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;     
    }

    public function deleteenquiry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('enquiry');
    }

    public function getallcontents()
    {
        $res = $this->db->query('select items.*,menus.menu_name from items join menus on items.menu_id = menus.menu_id where items.is_deleted="false"');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
    }

    public function addcontent($data)
    {
        $res = $this->db->insert('items',$data);
        if ($res) {
            return true;
        }
        return false;
    }


    public function getcontentdetail($id)
    {
        $res = $this->db->query('select items.*,menus.menu_name from items join menus on items.menu_id = menus.menu_id where items.is_deleted="false" and items.item_id='.$id.'');
        $result = $res->result();
        if ($result)
            return $result[0];
        else
            return false;
    }
     public function edititemimage($id,$link)
    {
        $d=array();
        $d["imagelink"]=$link;
        $this->db->where('item_id',$id);
        return $this->db->update('items',$d);  
    }
    public function edititemdata($id,$data)
    {
        $this->db->where('item_id',$id);
        return $this->db->update('items',$data);  
    }

    public function getvidnews()
    {
        $res = $this->db->query('select items.*,menus.menu_name from items join menus on items.menu_id = menus.menu_id where items.is_deleted="false" and is_video=1');
        $result = $res->result();

        if ($result)
            return $result;
        else
            return false;
    }

    public function editvideolink($id,$link)
    {
        $d=array();
        $d["videolink"]=$link;
        $this->db->where('item_id',$id);
        return $this->db->update('items',$d);  
    }
    public function approvemember($id)
    {
        $formdata=array("is_approved"=>"1");
        $this->db->where('mem_id',$id);
        return $this->db->update('members',$formdata);

    }
     public function approvecontent($id)
    {
        $formdata=array("is_approved"=>"1");
        $this->db->where('item_id',$id);
        return $this->db->update('items',$formdata);
    }
    public function disapprovemember($id)
    {
        $formdata=array("is_approved"=>"0");
        $this->db->where('mem_id',$id);
        return $this->db->update('members',$formdata);

    }

    public function deleteCategory($id)
    {
        $this->db->where('cat_id',$id);
        $this->db->set('is_deleted','true');
        return $this->db->update('categories');
    }

    public function disapprovecontent($id)
    {
        $formdata=array("is_approved"=>"0");
        $this->db->where('item_id',$id);
        return $this->db->update('items',$formdata);

    }

    public function deletecontent($id)
    {
        $res = $this->db->query('SELECT imagelink FROM items where item_id='.$id."");
        $result = $res->result();

         if (file_exists($result["imagelink"])) {
    unlink($result[0]["imagelink"]);
}
        $this->db->where('item_id', $id);
        $this->db->delete('items');
        return true;
    }
}