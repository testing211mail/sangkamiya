<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
        $data['title']= 'Report';
        $data['main_content'] = 'listreport';
        $data['result'] = $this->admin_model->getallmembers();
        $this->load->view('template', $data);
    }



   
}