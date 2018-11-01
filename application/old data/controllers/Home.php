<?php

header('Access-Control-Allow-Origin:*');
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	var $links;
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Website_model');
    }

	public function index()
	{
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'SangKamya';
    	$data['main_content'] = 'website/index.php';
    	//$data['search']=array('abc','pqr','xyz','yogita');
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function education()
	{
		$catId=1;
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Education';
		$data['servList'] = $this->Website_model->getServices($catId);
    	$data['main_content'] = 'website/education.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function health()
	{
		$catId=4;
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Health';
		$data['servList'] = $this->Website_model->getServices($catId);
    	$data['main_content'] = 'website/health.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function government()
	{
		$catId=3;
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Government';
		$data['servList'] = $this->Website_model->getServices($catId);
    	$data['main_content'] = 'website/govt.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function lifestyle()
	{
		$catId=5;
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Lifestyle';
		$data['servList'] = $this->Website_model->getServices($catId);
    	$data['main_content'] = 'website/lifestyle.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function services()
	{
		$catId=6;
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Services';
		$data['servList'] = $this->Website_model->getServices($catId);
    	$data['main_content'] = 'website/services.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function food()
	{
		$catId=2;
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Food';
		$data['servList'] = $this->Website_model->getServices($catId);
    	$data['main_content'] = 'website/food.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function shops()
	{
		$catId=7;
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Shops';
		$data['servList'] = $this->Website_model->getServices($catId);
    	$data['main_content'] = 'website/shops.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function offers()
	{
		$catId=8;
		$data['imgLinks']=$this->Website_model->getads();
		$data['offers']=$this->Website_model->getoffers();
		$data['title']= 'Offers';
    	$data['main_content'] = 'website/offers.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function getRandomImages()
	{
		$loc = base_url()."uploads/jon/";
  		$this->links = array($loc."ogadv1.jpg", $loc."ogadv2.jpg", $loc."ogadv3.jpg",$loc."ogadv4.jpg",$loc."ogadv5.jpg");
	}

	public function contactList($serId)
	{

		//$catId=rand(0,6);
		//$data['imgLinks']=$this->Website_model->getads3(2);
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'Contacts Lis';
		$data['contactList']= $this->Website_model->getContacts($serId);
    	$data['main_content'] = 'website/contactList.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function contactInfo($memId)
	{
		$data['imgLinks']=$this->Website_model->getads2($memId);
		$data['title']= 'Contact Details';
		$data['contactInfo']= $this->Website_model->getDetailContact($memId);
    	$data['main_content'] = 'website/contactInfo.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function about()
	{
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'About Us';
    	$data['main_content'] = 'website/about.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function feedback()
	{
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'Feedback';
    	$data['main_content'] = 'website/feedback.php';
    	$res=$this->Website_model->getsearchlist();
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function submitFeedback()
	{
		$formdata = $this->input->post();
		$flag = $this->Website_model->savefeedback($formdata);

		if ($flag) {
			$this->session->set_flashdata('successMsg', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Thank You For Your Valuable Feedback :) .</strong></div>');
		}
		$this->feedback();	
	}

	public function getdata()
	{
		$data=array("hello","hii","bye","abc","xyz");
		echo json_encode($data);
	}

	public function getsearchlist()
	{
		$result = $this->Website_model->getsearchlist();
		if($result)
		{
			echo json_encode($result);
		}	
		else
		{
			echo "false";
		}
	}

	public function callCounter()
	{
		echo "in home counter";
		//$result = $this->Website_model->inccallcount();
	}

}

        