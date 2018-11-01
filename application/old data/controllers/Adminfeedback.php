<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminfeedback extends CI_Controller {

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
        $data['title']= 'List Feedback';
        $data['main_content'] = 'listFeedback';
        $data['result'] = $this->admin_model->getallfeedback();
        //$data['result'] = "";
        //print_r($data);exit();
        $this->load->view('template', $data);
    }
}