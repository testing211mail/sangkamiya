<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

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
        $data['title']= 'List Members';
        $data['main_content'] = 'listMembers';
        $data['result'] = $this->admin_model->getallmembers();
        //$data['result'] = "";
        //print_r($data);exit();
        $this->load->view('template', $data);
    }

    public function addMember()
    {
            $data['title']= 'Add Member';
            $data['main_content'] = 'addMember';
            $data['result'] = $this->admin_model->getallcategories();
            //$data['result'] = "";
            //print_r($data);exit();
            $this->load->view('template', $data);
    }
    public function viewMember($id)
    {
            $data['title']= 'View Member';
            $data['main_content'] = 'viewMember';
            $data['result'] = $this->admin_model->getmemberdetail($id);
            //$data['result'] = $id;
            //print_r($data);exit();
            $this->load->view('template', $data);
    }
    public function editMember($id = '')
    {
        $formdata = $this->input->post();
        if (isset($formdata['task']) && $formdata['task'] == 'editMember') {
            $id=$formdata['mem_id'];
            //print_r($formdata);exit();
            $editarray = array('mem_name' => $formdata['mem_name'], 'business_name' => $formdata['business_name'], 'business_desc' => $formdata['s_p_info'], 'address' => $formdata['address'], 'lat' => $formdata['lat'], 'log' => $formdata['log'], 'mobile_no' => $formdata['mobile_no'], 'landline_no' => $formdata['landline_no'], 'email_id' => $formdata['email_id']);
            $result = $this->admin_model->editMember($editarray,$id);

            if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Member Updated Successfully!!</div>');
                redirect('members');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
        }
        else
        {
            $data['title']= 'Edit Member';
            $data['main_content'] = 'editMember';
            $data['result'] = $this->admin_model->getmemberdetail($id);
            //$data['result'] = $id;
            //print_r($data);exit();
            $this->load->view('template', $data);
        }
    }

    public function do_upload(){


        header('Content-Type: application/json');
        $config['upload_path']   = './uploads/member/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
              //  echo $this->input->post('MemName');
                $data1['mem_name'] = $this->input->post("MemName");
                $data1['business_name'] = $this->input->post('BusinessName');
                $data1['address'] = $this->input->post('BusinessAdd');
                $data1['mobile_no'] = $this->input->post('contact');
                $data1['landline_no'] = $this->input->post('landline');
                $data1['email_id'] = $this->input->post('email');
                $data1['business_desc'] = $this->input->post('sandp');
                $data1['service_id'] = $this->input->post('service');
                $data1['reg_date'] = date("d-m-Y");
                $data1['lat'] = $this->input->post('lat');
                $data1['log'] = $this->input->post('log');
                $data1['taluka']=$this->input->post('taluka');
                $data1['imagelink'] = base_url().'uploads/member/'.$data['upload_data']['file_name'];
                $result = $this->admin_model->addmember($data1);
                if ($data) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Service Added Successfully!!</div>');
                    echo  "true";
                }
               
               
        } 
    }

    public function editshopimage($id){
        header('Content-Type: application/json');
        $config['upload_path']   = './uploads/member/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->load->library('upload',$config);
       // $formdata=$this->input->post();
        //$this->upload->do_upload("file")
        if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
                $memberid = $id;
                $data1['imagelink'] = base_url().'uploads/member/'.$data['upload_data']['file_name'];
                $result = $this->admin_model->editImagelink($memberid,$data1);
                if ($result) {
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Profile Picture changed successfully!!</div>');
                    echo  "true";
                }
               
               
        } 
    }

    public function deletemember()
    {
        $formdata = $this->input->post();
        $result = $this->admin_model->deletemember($formdata['id']);

            if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Member Deleted Successfully!!</div>');
                echo json_encode(array('success'=> 1));
                exit();
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
    }

    public function approveMember($id)
    {
        $res= $this->admin_model->approvemember($id);

        if ($res) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Member Approved Successfully!!</div>');
                redirect('members');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }

    }

    public function disapproveMember($id)
    {
        $res= $this->admin_model->disapprovemember($id);

        if ($res) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Member Dis-Approved Successfully!!</div>');
                redirect('members');
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');

            }
    }

    
}