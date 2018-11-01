<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
        $data['title']= 'Manage Menus';
        $data['main_content'] = 'manageMenu';
        $data['result'] = $this->admin_model->getallmenus();
        //print_r($data['result']);exit();
        $this->load->view('template', $data);
    }


    public function addMenu()
    {
        
        $result= $this->admin_model->addmenu($this->input->post());

        if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Menu Updated Successfully!!</div>');
                redirect('menu','refresh');
        }
        else
        {
            $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

        }           
        
    }

    public function editMenu($id = "")
    {
        echo 'menu id is :'.$id;
        print_r($this->input->post());
        exit();
        $formdata = $this->input->post();
        $result = $this->admin_model->editMenu($formdata);

        if ($result) {
            $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Menu Updated Successfully!!</div>');
            redirect('menu','refresh');
        }
        else
        {
            $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');
        }
        
    }


    public function getMenuDetails($id)
    {
        $data = $this->admin_model->getmenudetail($id);
        echo json_encode($data);
    }


    public function saveMenuDetails()
    {
        /*$data = array(
            'menu_name' => $this->input->post('menu_name_'),
        );*/

        $id=$this->input->post('menu_id');
        $name=$this->input->post('menu_name_');
        $this->admin_model->editmenu($id,$name);
        echo json_encode(array("status" => TRUE));
    }
}
