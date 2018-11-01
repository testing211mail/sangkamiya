<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
         $this->load->model('Website_model');
       // $this->load->model('Website_model');
       
    }
    public function test()
	{
		print_r($this->Admin_model->edititemimage(2,'hindi'));
	}

	public function index()
	{
		$langg=$this->session->userdata('lang');
		$result=$this->Website_model->getnearContacts(1,$langg,20.0078443,73.7571348);
		print_r($result);
		echo "in demo controlle jfhgk r";		
	}
		function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
	public function demo()
	{
		
		$data['imgLinks']=$this->Website_model->getads();
		$data['title']= 'demo';
		/*$data['servList'] = $this->Website_model->getServices($catId,$langg);*/
    	$data['main_content'] = 'website/demo.php';
    	

		$this->load->view('website/template', $data);

}

public function getco()
{
	if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    //send request and receive json data by latitude and longitude
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    
    //if request status is successful
    if($status == "OK"){
        //get address from json data
        $location = $data->results[0]->formatted_address;
    }else{
        $location =  '';
    }
    
    //return address to ajax 
    echo $location;
}
		/*	$PublicIP = $this->get_client_ip(); 
			 $json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
			 $json  =  json_decode($json ,true);
			 $country =  $json['country_name'];
			 $region= $json['region_name'];
			 $city = $json['city'];		
			 print_r($json);*/
/*
			 $user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];

echo "-------------------";
print_r($geo);
echo "\n----------------------";
$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
if ($query && $query['status'] == 'success') {
echo 'Hey user from ' . $query['country'] . ', ' . $query['city'] . '!';*/
/*}
foreach ($query as $data) {
    echo $data . "<br>";
}*/
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
