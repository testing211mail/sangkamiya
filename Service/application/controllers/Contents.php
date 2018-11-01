<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        if (!$this->session->userdata('adminlogged_in') && !$this->session->userdata('userlogged_in')) {
              redirect('adminhome');
          }  
    }

    public function index()
    {
        $data['title']= 'Manage Contents';
        $data['main_content'] = 'listContents';
        $data['menus'] = $this->admin_model->getallmenus();
        $data['result'] = $this->admin_model->getallcontents();
        $this->load->view('template', $data);
    }


    public function do_upload(){

        header('Content-Type: application/json');
        $checked = $this->input->post('notiFlag');
       
        $config['upload_path']   = './uploads/contents/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
            $data1['menu_id'] = $this->input->post("menu_id");
            $data1['title'] = $this->input->post('contentTitle');
            $data1['description'] = $this->input->post('contentDesc');
            $data1['date'] = date("d-m-Y");
            $data1['imagelink'] = base_url().'uploads/contents/'.$data['upload_data']['file_name'];
            $result = $this->admin_model->addcontent($data1);
            if ($data) {
                 $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Contents Added Successfully!!</div>');
                echo  "true";
            }     
        } 
    }

    public function editContent($id)
    {
        $data['title']= 'Edit Contents';
        $data['main_content'] = 'editContent';
        $data['menus'] = $this->admin_model->getallmenus();
        $data['content'] = $this->admin_model->getcontentdetail($id);
        $this->load->view('template', $data);
    }

    public function savecontent()
    {
    $formdata = $this->input->post();

        /*print_r($formdata);exit();*/
        $id = $formdata['item_id'];
        $editarray = array('date' => $formdata['date'],'title' => $formdata['contentTitle'], 'description' => $formdata['contentDesc']);
        $result = $this->admin_model->edititemdata($id,$editarray);

        if ($result) {
            $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Content Updated Successfully!!</div>');
            redirect('contents');
        }
        else
        {
            $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

        }
    }

    public function approveContent($id)
    {
        $res= $this->admin_model->approvecontent($id);

        if ($res) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Contents Approved Successfully!!</div>');
                redirect('contents');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
    }

    public function disapproveContent($id)
    {
        $res= $this->admin_model->disapprovecontent($id);

        if ($res) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Content Dis-Approved Successfully!!</div>');
                redirect('contents');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
    }

    public function deleteContent($id)
    {
        $res= $this->admin_model->deletecontent($id);

        if ($res) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Content Deleted Successfully!!</div>');
                redirect('contents');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
    }


    public function editcontentimage($id){
        header('Content-Type: application/json');
        $config['upload_path']   = './uploads/contents/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
            $itemid = $id;
            $link = base_url().'uploads/contents/'.$data['upload_data']['file_name'];
            $result = $this->admin_model->edititemimage($itemid,$link);
            if ($result) {
                 $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong>Image changed successfully!!</div>');
                echo  "true";
            }      
        } 
    }
    
}