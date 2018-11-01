<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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
        $data['title']= 'List Categories';
        $data['main_content'] = 'listCategories';
        $data['result'] = $this->admin_model->getallcategories();
        $this->load->view('template', $data);
    }

    
    public function editCategory($id = "")
    {
            $data['title']= 'Edit Category';
            $data['main_content'] = 'editCategory';
            $data['result'] = $this->admin_model->getdetailCategory($id);
            $this->load->view('template', $data);   
    }

    public function deleteCategory($id = "")
    {
            $data['title']= 'Delete Category';
            $data['result'] = $this->admin_model->deleteCategory($id);
            $this->load->view('template', $data);   
    }

    public function editserviceimage($id){

        if($_FILES['file']['name'] == "") {
            $data1["cat_name"]=$this->input->post('cat_name');
            $result = $this->admin_model->editCategory($id,$data1);
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
                $data1['imagelink'] = base_url().'uploads/cat/'.$data['upload_data']['file_name'];
                $data1["cat_name"]=$this->input->post('cat_name');
                $result = $this->admin_model->editCategory($id,$data1);
                if ($result) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Image changed successfully!!</div>');
                    echo  "true";
                }
               
               
        } 
        
        }
        
    }

    public function do_upload(){
        header('Content-Type: application/json');
        $config['upload_path']   = './uploads/cat/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
                $data1['cat_name'] = $this->input->post('categoryName');
                $data1['imagelink'] = base_url().'uploads/cat/'.$data['upload_data']['file_name'];
                 $result = $this->admin_model->addcategory($data1);
                if ($data1) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                    echo "true";
                }
        }
    }
}
