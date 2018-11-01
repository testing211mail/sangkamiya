<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminhome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');   
    }

	public function index()
    {
        if($this->session->userdata('adminlogged_in')) 
        {
            redirect('dashboard/showDashboard');
        }
        else 
        {
            $this->load->view('adminLogin');
        }               
    }

    public function dologin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('errorLogin', '<div class="row" align="center"><div class="alert alert-danger"><strong>Invalid Username or Password.</strong></div></div>');
                 redirect('adminhome','refresh');
        }
        else
        {   
            $this->session->set_userdata(array('adminlogged_in' => true, ) ); 
            redirect('dashboard/showDashboard');

                $user = $this->Admin_model->validateadmin($username,md5($password));
                $user = $user[0];
                if($user) 
                {
                    $this->session->set_userdata(array('id' => $user['id'],'adminname' => $user['username'],'adminlogged_in' => true, ) ); 
                    redirect('adminhome/showDashboard','refresh');
                } 
                else 
                {    
                    $this->session->set_flashdata('errorLogin','<div style="color: red";>Username or Password is incorrect</div>'); 
                    redirect('adminhome','refresh'); 
                }   
            
        }
    }


	public function logout() {
        
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('adminname');
        $this->session->unset_userdata('adminlogged_in');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('adminhome/index', 'refresh');

    }
}
