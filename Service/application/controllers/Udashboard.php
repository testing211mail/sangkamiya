<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Udashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('userlogged_in')) {
            redirect('userhome/index','refresh');
        }
        $this->load->model('Admin_model');
        
    }

	public function index()
    {
             
    }

    public function showDashboard()
    {
    
		$data['title']= 'User Home';
    	$data['main_content'] = 'udashboard';
    	$this->load->view('template', $data);
    }
}
