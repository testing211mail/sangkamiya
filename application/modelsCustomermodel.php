<?php
class Customermodel extends CI_Model
{

    public function insertcustomer($data)
    {
        print_r($data);
        exit();
        /*$this->db->select('*');
        $this->db->from('customer');
        $this->db->where('email', $data['email']);
        
        $query = $this->db->get();
        if ($query->num_rows())
        {
            return false;
        }else
        {
             $this->db->select_max('id');
            $this->db->from('customer');
            $query = $this->db->get();
            $r=$query->result();
            echo $r;
            exit();
      

            $this->db->insert('customer',$data);
            return true;
        }*/
         
       
    }
 
}