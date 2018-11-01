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
        

        if ($this->session->userdata('lang') == "") {
           $this->setDefault();
        }
    }

	public function index()
	{
        $this->Website_model->inccount();
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'SangKamya';
    	$data['main_content'] = 'website/index.php';
    	//$data['search']=array('abc','pqr','xyz','yogita');
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
        $data['count']=$this->Website_model->getcount();
    	$this->load->view('website/template', $data);
	}

	public function education()
	{
        $langg=$this->session->userdata('lang');
		$catId=1;
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Education';
		$data['servList'] = $this->Website_model->getServices($catId,$langg);
    	$data['main_content'] = 'website/education.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function health()
	{
		$catId=4;
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Health';
		$data['servList'] = $this->Website_model->getServices($catId,$langg);
    	$data['main_content'] = 'website/health.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function government()
	{
		$catId=3;
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Government';
		$data['servList'] = $this->Website_model->getServices($catId,$langg);
    	$data['main_content'] = 'website/govt.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function lifestyle()
	{
		$catId=5;
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Lifestyle';
		$data['servList'] = $this->Website_model->getServices($catId,$langg);
    	$data['main_content'] = 'website/lifestyle.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function services()
	{
		$catId=6;
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Services';
		$data['servList'] = $this->Website_model->getServices($catId,$langg);
    	$data['main_content'] = 'website/services.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function food()
	{
		$catId=2;
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Food';
		$data['servList'] = $this->Website_model->getServices($catId,$langg);
    	$data['main_content'] = 'website/food.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function shops()
	{
		$catId=7;
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		//$data['imgLinks']=$this->Website_model->getads1($catId);
		$data['title']= 'Shops';
		$data['servList'] = $this->Website_model->getServices($catId,$langg);
    	$data['main_content'] = 'website/shops.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function offers()
	{
		$catId=8;
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		$data['offers']=$this->Website_model->getoffers();
		$data['title']= 'Offers';
    	$data['main_content'] = 'website/offers.php';
    	$res=$this->Website_model->getsearchlist($langg);
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
        $langg=$this->session->userdata('lang');
		//$catId=rand(0,6);
		//$data['imgLinks']=$this->Website_model->getads3(2);
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'Contacts List';
		$data['contactList']= $this->Website_model->getContacts($serId,$langg);
    	$data['main_content'] = 'website/contactList.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function contactInfo($memId)
	{  
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads2($memId);
		$data['title']= 'Contact Details';
		$data['contactInfo']= $this->Website_model->getDetailContact($memId,$langg);
    	$data['main_content'] = 'website/contactInfo.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function about()
	{
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'About Us';
    	$data['main_content'] = 'website/about.php';
    	$res=$this->Website_model->getsearchlist($langg);
    	$data['ids']=$res["ids"];
    	$data['names']=$res["names"];
    	$data['types']=$res["types"];
    	$this->load->view('website/template', $data);
	}

	public function feedback()
	{
        $langg=$this->session->userdata('lang');
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'Feedback';
    	$data['main_content'] = 'website/feedback.php';
    	$res=$this->Website_model->getsearchlist($langg);
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
        $langg=$this->session->userdata('lang');
		$result = $this->Website_model->getsearchlist($langg);
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

	public function changelanguage()
	{
		$sentLang=$this->input->post('sellang');
		$this->session->set_userdata(array(
                        'lang' => $sentLang,
                        ));

		$this->selectLanguage();
        //header('Location: '.$this->input->server('HTTP_REFERER'));
		redirect('/','refresh');
		
	}
   
	public function selectLanguage()
	{

		if ($this->session->userdata('lang') =='english') {
			$this->session->set_userdata(array(
                        'home' => 'Home',
                        'about'=>'About',
                        'feedback'=>'Feedback',
                        'register'=>'Registration',
                        'education' => 'Education',
                        'food' => 'Food',
                        'lifestyle' => 'Lifestyle',
                        'government' => 'Government',
                        'shops' => 'Shops',
                        'health' => 'Health',
                        'offers' => 'Offers',
                        'services' => 'Services',
                        'search' => 'Search',
                        'lang'=>'english',
                        'name'=>'Enter Your Name',
                        'contact'=>'Enter Your Contact No.',
                        'comment'=>'Comment In-Short',
                        'submit'=>'Submit',
                        'abt1h'=>'Idea & Management',
                        'abt1n'=>'Mayur Anil Kumbhare',
                        'abt2h'=>'Finance & Ads Creator',
                        'abt2n'=>'Rakhi Shamkant Kelhe',
                        'abt3h'=>'Planning & Marketing',
                        'abt3n'=>'Shubham Shamkant Kelhe',
                        'add'=>'"Dattaprasad" , Opp. Jajuwadi Garden, Mahalaxmi Colony, Bhaygaon Rd. , Malegaon Camp, Malegaon - 423105',
                        'android'=>'',
                        ));
		}


		if ($this->session->userdata('lang') =='hindi') {
			$this->session->set_userdata(array(
                        'home' => 'होम',
                        'about'=>'के बारे में',
                        'feedback'=>'प्रतिक्रिया',
                        'register'=>'पंजीकरण',
                        'education' => 'शिक्षा',
                        'food' => 'भोजन',
                        'lifestyle' => 'जीवनशैली',
                        'government' => 'सरकारी क्षेत्र',
                        'shops' => 'दुकानें',
                        'health' => 'स्वास्थ्य',
                        'offers' => 'ऑफर',
                        'services' => 'सेवाएं',
                        'search' => 'खोज',
                        'lang'=>'hindi',
                        'name'=>'अपना नाम दर्ज करें',
                        'contact'=>'अपना संपर्क दर्ज करें',
                        'comment'=>'संक्षेप में प्रतिक्रिया',
                        'submit'=>'सबमिट',
                        'abt1h'=>'आइडिया और मैनेजमेंट',
                        'abt1n'=>'मयूर अनिल कुंभारे',
                        'abt2h'=>'वित्त और विज्ञापन',
                        'abt2n'=>'राखी शामकांत केल्हे',
                        'abt3h'=>'योजना और विपणन',
                        'abt3n'=>'शुभम शामकांत केल्हे',
                        'add'=>'"दत्तप्रसाद" जाजुवाडी गार्डन के सामने, महालक्ष्मी कॉलनी, भायगांव रोड , मालेगाव कॅम्प, मालेगाव - 423105',
                        ));
		}
		if ($this->session->userdata('lang') =='marathi') {
			$this->session->set_userdata(array(
                        'home' => 'होम',
                        'about'=>'याबद्दल',
                        'feedback'=>'अभिप्राय',
                        'register'=>'नोंदणी',
                        'education' => 'शिक्षण',
                        'food' => 'अन्न',
                        'lifestyle' => 'जीवनशैली',
                        'government' => 'सरकारी क्षेत्र',
                        'shops' => 'दुकाने',
                        'health' => 'आरोग्य',
                        'offers' => 'ऑफर',
                        'services' => 'सेवा',
                        'search' => 'शोध',
                        'lang'=>'marathi',
                        'name'=>'आपले नांव लिहा',
                        'contact'=>'आपला संपर्क प्रविष्ट करा',
                        'comment'=>'थोडक्यात अभिप्राय',
                        'submit'=>'सबमिट',
                        'abt1h'=>'आयडिया आणि व्यवस्थापन',
                        'abt1n'=>'मयूर अनिल कुंभारे',
                        'abt2h'=>'वित्त व जाहिराती',
                        'abt2n'=>'राखी शामकांत केल्हे',
                        'abt3h'=>'नियोजन आणि विपणन',
                        'abt3n'=>'शुभम शामकांत केल्हे',
                        'add'=>'"दत्तप्रसाद" जाजुवाडी गार्डन समोर, महालक्ष्मी कॉलनी, भायगांव रोड , मालेगाव कॅम्प, मालेगाव - 423105',
                        ));
		}
		
	}

    public function setDefault()
    {
        $this->session->set_userdata(array(
                        'home' => 'होम',
                        'about'=>'याबद्दल',
                        'feedback'=>'अभिप्राय',
                        'register'=>'नोंदणी',
                        'education' => 'शिक्षण',
                        'food' => 'अन्न',
                        'lifestyle' => 'जीवनशैली',
                        'government' => 'सरकारी क्षेत्र',
                        'shops' => 'दुकाने',
                        'health' => 'आरोग्य',
                        'offers' => 'ऑफर',
                        'services' => 'सेवा',
                        'search' => 'शोध',
                        'lang'=>'marathi',
                        'name'=>'आपले नांव लिहा',
                        'contact'=>'आपला संपर्क प्रविष्ट करा',
                        'comment'=>'थोडक्यात अभिप्राय',
                        'submit'=>'सबमिट',
                        'abt1h'=>'आयडिया आणि व्यवस्थापन',
                        'abt1n'=>'मयूर अनिल कुंभारे',
                        'abt2h'=>'वित्त व जाहिराती',
                        'abt2n'=>'राखी शामकांत केल्हे',
                        'abt3h'=>'नियोजन आणि विपणन',
                        'abt3n'=>'शुभम शामकांत केल्हे',
                        'add'=>'"दत्तप्रसाद" जाजुवाडी गार्डन समोर, महालक्ष्मी कॉलनी, भायगांव रोड , मालेगाव कॅम्प, मालेगाव - 423105',
                        ));
    }

    public function register()
    {
        $langg=$this->session->userdata('lang');
        $data['imgLinks']=$this->Website_model->getads();
        $data['title']= 'Register';
        $data['main_content'] = 'website/register.php';
        $res=$this->Website_model->getsearchlist($langg);
        $data['ids']=$res["ids"];
        $data['names']=$res["names"];
        $data['types']=$res["types"];
        $this->load->view('website/template', $data);
    }

    public function insertEnquiry()
    {
        $formdata = $this->input->post();
        date_default_timezone_set('Asia/Kolkata');
        $formdata["date"]=date('d-m-Y');
        $result = $this->Website_model->addenquiry($formdata);

        if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Enquiry Added Successfully!!</div>');
                redirect('home/register','refresh');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
    }

    public function askQuery()
    {
        $formdata=$this->input->post();
        date_default_timezone_set('Asia/Kolkata');
        $formdata["date"]=date('d-m-Y');
        /*print_r($formdata);
        exit();*/
        $result = $this->Website_model->addquery($formdata);
        if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Query Sent Successfully!!</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');
                redirect($_SERVER['HTTP_REFERER']);

            }
        
        
    }
    public function getNearby($servId,$lat,$long)
    {
        
        $langg=$this->session->userdata('lang');
        $data['imgLinks']=$this->Website_model->getads();
        $data['title']= 'Near By Contacts List';
        $data['contactList']= $this->Website_model->getnearContacts($servId,$langg,$lat,$long);
        $data['main_content'] = 'website/contactList2.php';
        $res=$this->Website_model->getsearchlist($langg);
        $data['ids']=$res["ids"];
        $data['names']=$res["names"];
        $data['types']=$res["types"];
        $this->load->view('website/template', $data);
    }
    
}

        