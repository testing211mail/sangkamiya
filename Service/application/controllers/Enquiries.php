<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller {

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

        $data['title']= 'List Enquiries';
        $data['main_content'] = 'listEnquiries';
        $data['result'] = $this->admin_model->getallenquiries();
        $this->load->view('template', $data);
    }

    public function removeEnquiry($id)
    {
    	$result = $this->admin_model->deleteenquiry($id);

    	if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Enquiries Deleted Successfully!!</div>');
                redirect('enquiries');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');
                redirect('enquiries');
            }
    }

}