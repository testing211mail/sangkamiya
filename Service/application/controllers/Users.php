<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
        $data['title']= 'Manage Users';
        $data['main_content'] = 'listUsers';
        $data['users']=$this->admin_model->getAllUsers();
        $this->load->view('template', $data);
    }

    public function deleteuser($id)
    {
        $res = $this->admin_model->deleteUser($id);


        if ($res) {
            
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> User Deleted Successfully !!</div>');
                redirect('users','refresh');
        }
        else
        {

            $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

        }
    }

    public function addUser()
    {
        $formdata = $this->input->post();
        $res = $this->admin_model->insertUser($formdata);
        if ($res) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> User Added Successfully !!</div>');
                redirect('users','refresh');
        }
        else
        {
            $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

        }
    }

}
