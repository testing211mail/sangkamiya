<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videonews extends CI_Controller {

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
        $data['title']= 'Manage Video News';
        $data['main_content'] = 'listVContents';
        $data['menus'] = $this->admin_model->getallmenus();
        $data['result'] = $this->admin_model->getvidnews();
        $this->load->view('template', $data);
    }


    function do_upload()
    {
        header('Content-Type: application/json');
        $checked = $this->input->post('notiFlag');
        $config['upload_path'] = './uploads/videonews';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('vfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            return $error;
        }   
        else
        {
            $this->load->library('upload', $config);
            $vdata = array('upload_data' => $this->upload->data());

            if ( ! $this->upload->do_upload('ifile'))
            {
                $error = array('error' => $this->upload->display_errors());

                return $error;
            }   
            else
            {
                $idata = array('upload_data' => $this->upload->data());
                $data1['menu_id'] = $this->input->post("menu_id");
                $data1['title'] = $this->input->post('contentTitle');
                $data1['description'] = $this->input->post('contentDesc');
                $data1['date'] = date("d-m-Y");
                $data1['imagelink'] = base_url().'uploads/videonews/'.$idata['upload_data']['file_name'];
                $data1['videolink'] = base_url().'uploads/videonews/'.$vdata['upload_data']['file_name'];
                $data1['is_video'] = 1;
                
                $result = $this->admin_model->addcontent($data1);
                if ($idata || $vdata) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> News Added Successfully!!</div>');
                    echo  "true";
                }     
            }       
        }
    }

    public function editVideonews($id)
    {
        /*print_r($this->admin_model->getcontentdetail($id));
        exit();*/
        $data['title']= 'Edit Video News';
        $data['main_content'] = 'editVContent';
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

    public function editcontentimage($id){
        header('Content-Type: application/json');
        $config['upload_path']   = './uploads/videonews/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("ifile")){
            $data = array('upload_data' => $this->upload->data());
            $itemid = $id;
            $link = base_url().'uploads/videonews/'.$data['upload_data']['file_name'];
            $result = $this->admin_model->edititemimage($itemid,$link);
            if ($result) {
                 $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong>Image changed successfully!!</div>');
                echo  "true";
            }      
        } 
    }
    

    public function editcontentvideo($id){
        header('Content-Type: application/json');
        $config['upload_path']   = './uploads/videonews/'; 
        $config['allowed_types'] = 'mp4|avi|mkv'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("vfile")){
            $data = array('upload_data' => $this->upload->data());
            $itemid = $id;
            $link = base_url().'uploads/videonews/'.$data['upload_data']['file_name'];
            $result = $this->admin_model->editvideolink($itemid,$link);
            if ($result) {
                 $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong>Video changed successfully!!</div>');
                echo  "true";
            }      
        } 
    }


    public function approveContent($id)
    {
        $res= $this->admin_model->approvecontent($id);

        if ($res) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Contents Approved Successfully!!</div>');
                redirect('videonews');
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
                redirect('videonews');
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
                redirect('videonews');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
    }
}