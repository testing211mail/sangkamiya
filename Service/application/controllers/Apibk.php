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
        
        // Construct the parent class
        parent::__construct();
        $this->load->model('Apiuser');
       /* $this->load->model('apiuser');
        $dbconnect = $this->load->database();     
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        */
    }

   

    public function demo_post()
    {
    	 $this->response(
                  array('success'=>'true')); 
    }
    public function getcategories_get()
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
        $result = $this->Apiuser->getcontacts($ser_id);
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

        public function getads_get()
    {
        $result = $this->Apiuser->getads();
        if($result)
            $this->response(array('success'=>'true','ads'=>$result));
        else
            $this->response(array('success'=>'false'));

    }

    public function getadsbycat_post()
    {
        $catid=$this->post('catid');
        $result = $this->Apiuser->getads1($catid);
        if($result)
            $this->response(array('success'=>'true','ads'=>$result));
        else
            $this->response(array('success'=>'false'));

    }

    public function getadsbycontact_post()
    {
        $memid=$this->post('memid');
        $result = $this->Apiuser->getads2($memid);
        if($result)
            $this->response(array('success'=>'true','ads'=>$result));
        else
            $this->response(array('success'=>'false'));

    }

    public function countcall_post()
    {
        $memid=$this->post('mem_id');
        $result = $this->Apiuser->countcall($memid);
        if($result)
            $this->response(array('success'=>'true'));
        else
            $this->response(array('success'=>'false'));

    }

    public function getsearchlist_get()
    {
      //  $memid=$this->post('mem_id');
        $result = $this->Apiuser->getsearchlist();
        if($result)
            $this->response(array('success'=>'true',"search"=>$result));
        else
            $this->response(array('success'=>'false'));

    }
    public function inccallcount_post()
    {
        $memid=$this->post('mem_id');
        $result = $this->Apiuser->inccallcount($memid);
        if($result)
            $this->response(array('success'=>'true'));
        else
            $this->response(array('success'=>'false'));

    }

    
  
    
    


   

}
