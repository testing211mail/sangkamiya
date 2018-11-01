<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
        $data['title']= 'List Services';
        $data['main_content'] = 'listServices';
        $data['result'] = $this->admin_model->getallcategories();
        $this->load->view('template', $data);
    }

    public function getServices()
    {
        $formdata = $this->input->post();
        if (isset($formdata['category'])) {
        $resultArr = $this->admin_model->getServices($formdata['category']);
            if ($resultArr)
            {
                echo json_encode($resultArr);
            }
            die();
      }
    }

 
public function do_upload(){

    header('Content-Type: application/json');
        $config['upload_path']   = './uploads/cat/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
               
             $data = array('upload_data' => $this->upload->data());


            $data1['cat_id'] = $this->input->post('category');
            $data1['service_name'] = $this->input->post('serviceName');
            $data1['iconlink'] = base_url().'uploads/cat/'.$data['upload_data']['file_name'];
             $result = $this->admin_model->addservice($data1);
             $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                echo "true";

/*
              $data1['cat_id'] = $this->input->post('category');
                $data1['service_name'] = $this->input->post('serviceName');
                $data1['service_mname'] = $this->input->post('serviceNamemarathi');
                $data1['service_hname'] = $this->input->post('serviceNamehindi');
                $data1['iconlink'] = base_url().'uploads/cat/'.$data['upload_data']['file_name'];
                 $result = $this->admin_model->addservice($data1);
                if ($data) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                    echo "true";
                }*/
            
        }


        /*
                $data1['cat_id'] = $this->input->post('category');
                $data1['service_name'] = $this->input->post('serviceName');
                 $result = $this->admin_model->addservice($data1);
                 $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                    echo "true";*/

        }


    public function editService($id = "")
    {

     /* else
        {*/
            $data['title']= 'Edit Service';
            $data['main_content'] = 'editService';
            $data['result'] = $this->admin_model->getdetailservice($id);
            $this->load->view('template', $data);   
      //  }
       /* if ($id == "") 
        {
            $formdata = $this->input->post();
            $data['service_name']=$formdata['service_name'];
            //print_r($formdata);exit();
            $result = $this->admin_model->editService($data,$formdata['ser_id']);

            if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Updated Successfully!!</div>');
                redirect('service');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
        }
        else
        {
            $data['title']= 'Edit Service';
            $data['main_content'] = 'editService';
            $data['result'] = $this->admin_model->getdetailservice($id);
            $this->load->view('template', $data);   
        }*/
    }

    public function editserviceinfo($id)
    {
       
      if($_FILES['file']['name'] == "") {
            $data1["service_name"]=$this->input->post('service_name');
            $result = $this->admin_model->editService($data1,$id);
             if ($result) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Image changed successfully!!</div>');
                    echo  "true";
                }
        }
        else
        {
            header('Content-Type: application/json');
            $config['upload_path']   = './uploads/cat/'; 
            $config['allowed_types'] = 'gif|jpg|png'; 
            $this->load->library('upload',$config);
            if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
                $data1['iconlink'] = base_url().'uploads/cat/'.$data['upload_data']['file_name'];
                $data1["service_name"]=$this->input->post('service_name');
                $result = $this->admin_model->editService($data1,$id);
                if ($result) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Image changed successfully!!</div>');
                    echo  "true";
                }
               
               
        } 
        
       }
    }

}
