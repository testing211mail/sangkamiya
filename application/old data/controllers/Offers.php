<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

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
        $data['title']= 'Offers';
        $data['main_content'] = 'listOffers';
        $data['result'] = $this->admin_model->getalloffers();
        $this->load->view('template', $data);
    }

    public function addOffers()
    {
        $data['title']= 'Add Offers';
        $data['main_content'] = 'addOffers';
        $data['result'] = $this->admin_model->getallmembers();
        $this->load->view('template', $data);
    }

     public function deleteoffer()
    {
        $formdata = $this->input->post();
        $result = $this->admin_model->deleteoffer($formdata['id']);

            if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Advertisement Deleted Successfully!!</div>');
                echo "true";
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
    }

     public function do_upload(){
        header('Content-Type: application/json');
        $config['upload_path']   = './uploads/offers/'; 
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
                $data1['mem_id'] = $this->input->post('member');
                $data1['offer_date'] = date("d-m-Y");
                $data1['is_active'] = "1";
                $data1['imagelink'] = base_url().'uploads/offers/'.$data['upload_data']['file_name'];
                 $result = $this->admin_model->addOffers($data1);
                if ($data1) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                    echo "true";
                }
        }
    }

   
}