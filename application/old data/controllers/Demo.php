<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Website_model');
       
    }

	public function index()
	{
			echo "in demo controller";		
	}
	public function getallcategories()
	{
		print_r($this->Admin_model->getallcategories());
	}

	public function getservices()
	{
		print_r($this->Admin_model->getservices(2));
	}
	public function insertservice()
	{
		$data=array();
		$data['cat_id']=2;
		$data['service_name']="hotels";
		$data['iconlink']="kjfh";
		print_r($this->Admin_model->addservice($data));
	}


	
}
