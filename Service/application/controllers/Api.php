<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 */
class Api extends REST_Controller {

    function __construct()
    {     
        parent::__construct();
        $this->load->model('Apiuser');
    }

    public function demo_post()
    {
    	 $this->response(
                  array('success'=>'true')); 
    }

    public function addenquiry_post()
    {
        $result = $this->Apiuser->addenquiry($this->post());

         if($result)
            $this->response(array('success'=>'true'));
        else
            $this->response(array('success'=>'false')); 
    }
    public function getads_post()
    {
        //$this->response(array('success'=>'true'));
        $result=$this->Apiuser->getads();
         if($result)
            $this->response(array('success'=>'true','ads'=>$result));
        else
            $this->response(array('success'=>'false')); 

    }
    public function getcontentlist_post()
    {
        $result=$this->Apiuser->getcontentlist($this->post('menuid'));
         if($result)
            $this->response(array('success'=>'true','contentlist'=>$result));
        else
            $this->response(array('success'=>'false')); 

    }
/*    public function homepage_post()
        {
            $homepage=array();
            $result=$this->Apiuser->getcontent(1);
            $result1=$this->Apiuser->getcontent(2);
            $result2=$this->Apiuser->getcontent(3);
            if($result)
                array_push($homepage,$result);
            if($result1)
                array_push($homepage,$result1);
            if($result2)
                array_push($homepage,$result2);

         if($result)
            $this->response(array('success'=>'true','details'=>$homepage));
        else
            $this->response(array('success'=>'false')); 
        }
*/
    public function getmenus_post()
    {
        $result=$this->Apiuser->getmenus();
        if($result)
        {
            $this->response(array('success'=>'true','menus'=>$result));
        }
        else
             $this->response(array('success'=>'false')); 

    }

    public function getcontent_post()
    {
        $result=$this->Apiuser->getcontent($this->post('itemid'));
         if($result)
            $this->response(array('success'=>'true','content'=>$result));
        else
            $this->response(array('success'=>'false')); 

    }
     public function getcategories_post()
    {
        $result = $this->Apiuser->getcategories();
        if($result)
            $this->response(array('success'=>'true','categories'=>$result));
        else
            $this->response(array('success'=>'false'));
    }

     public function getservices_post()
    {
        $catid=$this->post('cat_id');
        $result = $this->Apiuser->getservices($catid);
        if($result)
            $this->response(array('success'=>'true','services'=>$result));
        else
            $this->response(array('success'=>'false'));
    }

      public function getcontacts_post()
    {
        $ser_id=$this->post('ser_id');
        $taluka=$this->post('taluka');
       /* if(sizeof($this->post()>1))
            $taluka=$this->post('taluka');
        else 
            $taluka='';*/
        $result = $this->Apiuser->getcontacts($ser_id,$taluka);
        if($result)
            $this->response(array('success'=>'true','contactlist'=>$result));
        else
            $this->response(array('success'=>'false'));

    }
    public function getdetailcontact_post()
    {
        $mem_id=$this->post('mem_id');
        $result = $this->Apiuser->getdetailcontact($mem_id);
        if($result)
            $this->response(array('success'=>'true','contactdetails'=>$result));
        else
            $this->response(array('success'=>'false'));

    }

     public function getheadings_post()
    {
        $result=$this->Apiuser->getheadings("1");
         if($result)
            $this->response(array('success'=>'true','headings'=>$result));
        else
            $this->response(array('success'=>'false')); 

    }

    public function getsearchlist_post()
    {
        $result=$this->Apiuser->getsearchlist("1");
         if($result)
            $this->response(array('success'=>'true','search'=>$result));
        else
            $this->response(array('success'=>'false')); 

    }
     public function gettaluka_post()
    {
        $result=$this->Apiuser->gettaluka();
         if($result)
            $this->response(array('success'=>'true','taluka'=>$result));
        else
            $this->response(array('success'=>'false')); 

    }

   
}
