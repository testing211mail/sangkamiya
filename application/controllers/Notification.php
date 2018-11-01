<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        if (!$this->session->userdata('adminlogged_in')) {
              redirect('adminhome');
          }  
    }

    public function index()
    {
        $data['title']= 'Notification';
        $data['main_content'] = 'notification';
        $this->load->view('template', $data);
    }

    public function sendnotification()
    {
        $formdata =$this->input->post();
        $title = $formdata['title'];
        $desc = $formdata['description'];
        $response = $this->sendMessage($title,$desc);
        $return["allresponses"] = $response;
        $return = json_encode( $return);

        redirect('notification','refresh');

        /*print("\n\nJSON received:\n");
        print($return);
        print("\n"); */
    }

    public function sendMessage($title,$desc)
    {
        $heading = array(
           "en" => $title
        );
        $content = array(
            "en" => $desc
        );
        
        $fields = array(
            'app_id' => "55a65b53-2d97-47ca-a66d-342d5c4015eb",
            'included_segments' => array('All'),
            'data' => array("foo" => "bar"),
            'headings' => $heading,
            'contents' => $content
        );
        
        $fields = json_encode($fields);
        /*print("\nJSON sent:\n");
        print($fields);*/
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic NGQ3ZmM4YmUtZWY5NS00YWIzLWFhOWItMGI1ZjhmZTdhODc3'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;      
    }
}