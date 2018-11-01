<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('adminlogged_in')) {
            redirect('adminhome/index','refresh');
        }
        $this->load->model('Admin_model');
        
    }

	public function index()
    {
             
    }

    public function showDashboard()
    {
    
		$data['title']= 'Admin Home';
    	$data['main_content'] = 'dashboard';
    	$this->load->view('template', $data);
    }
}
