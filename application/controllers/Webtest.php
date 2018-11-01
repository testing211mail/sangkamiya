<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webtest extends CI_Controller {

    public function __construct() {
        parent::__construct();
       // $this->load->model('Admin_model');
        $this->load->model('Website_model');
       
    }

	public function index()
	{
			echo "in website test controller";		
	}

	public function getservices()
	{
		print_r($this->Website_model->getServices(2,'hindi'));
	}

	public function getcontacts()
	{
		print_r($this->Website_model->getcontacts(4,'hindi'));
	}

	public function getDetailContact()
	{
		print_r($this->Website_model->getDetailContact(1,'hindi'));
	}


	public function getads()
	{
		print_r($this->Website_model->getads1(2));
	}

	public function search()
	{
		print_r($this->Website_model->getsearchlist("marathi"));
		
	}
	public function getoffers()
	{
		print_r($this->Website_model->getoffers());
		
	}

	public function test()
	{
		print_r($this->Admin_model->edititemimage(2,'hindi'));
	}
	

	/*public function getallcategories()
	{
		print_r($this->Admin_model->getallcategories());
	}

	
	public function insertservice()
	{
		$data=array();
		$data['cat_id']=2;
		$data['service_name']="hotels";
		$data['iconlink']="kjfh";
		print_r($this->Admin_model->addservice($data));
	}*/


	
}
