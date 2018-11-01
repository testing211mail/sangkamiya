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
        //print_r($data);exit();
        $this->load->view('template', $data);
    }

    public function getServices()
    {
        $formdata = $this->input->post();
        //$formdata['category'] = "2";
        if (isset($formdata['category'])) {
        $resultArr = $this->admin_model->getServices($formdata['category']);
        //print_r($resultArr);exit();
            if ($resultArr)
            {
                echo json_encode($resultArr);
            }
            die();
      }
    }

   /* public function addservice()
    {

        $formdata = $this->input->post();
        echo "<script>console.log( 'Debug Objects: " . $formdata . "' );</script>";
        $catid = $formdata['category'];
        $servicename = $formdata['serviceName'];
        $data1 = [];
        $config['upload_path']=base_url()."upload/cat/";
        $config['allowed_types']='gif|jpg|png';
        $this->load->library('upload',$config);
        if($this->upload->do_upload($formdata['file'])){
        $data = array('upload_data' => $this->upload->data());
        $data1['cat_id'] = $catid;
        $data1['service_name'] = $servicename;
        $data1['iconlink'] = $data['upload_data']['file_name'];
        $result = $this->admin_model->addservice($data1);
        if ($result == TRUE) {
            return "ok";
        }
        }
    }*/

public function do_upload(){
   header('Content-Type: application/json');
        $config['upload_path']   = './uploads/cat/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
               
             $data = array('upload_data' => $this->upload->data());
              $data1['cat_id'] = $this->input->post('category');
                $data1['service_name'] = $this->input->post('serviceName');
                $data1['service_mname'] = $this->input->post('serviceNamemarathi');
                $data1['service_hname'] = $this->input->post('serviceNamehindi');
                $data1['iconlink'] = base_url().'uploads/cat/'.$data['upload_data']['file_name'];
                 $result = $this->admin_model->addservice($data1);
                if ($data) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                    echo "true";
                }
            
        }

                /*     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                    echo "true";
*/
      /*  header('Content-Type: application/json');
        $config['upload_path']   = '.uploads/cat/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
              $data1['cat_id'] = $this->input->post('category');
                $data1['service_name'] = $this->input->post('serviceName');
                $data1['service_mname'] = $this->input->post('serviceNamemarathi');
                $data1['service_hname'] = $this->input->post('serviceNamehindi');
                $data1['iconlink'] = base_url().'uploads/cat/'.$data['upload_data']['file_name'];
                 $result = $this->admin_model->addservice($data1);
                if ($data) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                    echo "true";
                }
        }*/
    }

    public function editService($id = "")
    {
       /* if ($id == "") 
        {
            $formdata = $this->input->post();
            //print_r($formdata);exit();
            $result = $this->admin_model->editService($formdata);

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
        {*/
            $data['title']= 'Edit Service';
            $data['main_content'] = 'editService';
            $data['result'] = $this->admin_model->getdetailservice($id);
            //print_r($data);exit();
            $this->load->view('template', $data);   
     //   }
    }

    public function editserviceimage($id){

        if($_FILES['file']['name'] == "") {
           $data1["service_name"]=$this->input->post('service_name');
                $data1["service_hname"]=$this->input->post('service_hname');
                $data1["service_mname"]=$this->input->post('service_mname');
            $result = $this->admin_model->editiconlink($id,$data1);
             if ($result) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Image changed successfully!!</div>');
                    echo  "true";
                }
        }
        else
        {
            header('Content-Type: application/json');
            $config['upload_path']   = './uploads/cat/'; 
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
            $this->load->library('upload',$config);
            if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
                $data1['iconlink'] = base_url().'uploads/cat/'.$data['upload_data']['file_name'];
                $data1["service_name"]=$this->input->post('service_name');
                $data1["service_hname"]=$this->input->post('service_hname');
                $data1["service_mname"]=$this->input->post('service_mname');
                $result = $this->admin_model->editiconlink($id,$data1);
                if ($result) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Image changed successfully!!</div>');
                    echo  "true";
                }
               
               
        } 
        
        }
     
    }
}
