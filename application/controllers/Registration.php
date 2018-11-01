<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

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
        $data['title']= 'List enquiry';
        $data['main_content'] = 'listenquiry';
        $data['result'] = $this->admin_model->getallenquiry();
        $this->load->view('template', $data);
    }

     public function getqueries()
    {
        $data['title']= 'List queries';
        $data['main_content'] = 'listqueries';
        $data['result'] = $this->admin_model->getqueries();
        $this->load->view('template', $data);
    }

     public function deletequery($id)
    {
        $result = $this->admin_model->deletequery($id);
        redirect('Registration/getqueries','refresh');
    }

    //getqueries
     public function deleteenquiry()
    {
        $formdata = $this->input->post();
        $result = $this->admin_model->deleteenquiry($formdata['id']);

            if ($result) {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Member Deleted Successfully!!</div>');
                echo json_encode(array('success'=> 1));
               // exit();
            }
            else
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Something went wrong!</strong> Try Again!!</div>');
                echo json_encode(array('success'=> 0));

            }
    }

     public function viewenquiry($id)
    {
            $data['title']= 'View enquiry';
            $data['main_content'] = 'viewenquiry';
            $data['result'] = $this->admin_model->getenquirydetail($id);
            $this->load->view('template', $data);
    }
    public function makemember($id)
    {
            $data['title']= 'Make Member';
            $data['main_content'] = 'makemember';
             $data['result'] = $this->admin_model->getallcategories();
            $data['info'] = $this->admin_model->getenquirydetail($id);
            $this->load->view('template', $data);   
    }


    public function do_upload(){
        header('Content-Type: application/json');
        $config['upload_path']   = './uploads/member/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $this->load->library('upload',$config);
       // $formdata=$this->input->post();
        //$this->upload->do_upload("file")
        if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
              //  echo $this->input->post('MemName');
                $data1['mem_name'] = $this->input->post("MemName");
                $data1['mem_mname'] = $this->input->post("MemmName");
                $data1['mem_hname'] = $this->input->post("MemhName");
                $data1['business_name'] = $this->input->post('BusinessName');
                $data1['business_mname'] = $this->input->post('BusinessmName');
                $data1['business_hname'] = $this->input->post('BusinesshName');
                $data1['address'] = $this->input->post('BusinessAdd');
                $data1['maddress'] = $this->input->post('BusinessmAdd');
                $data1['haddress'] = $this->input->post('BusinesshAdd');
                $data1['mobile_no'] = $this->input->post('contact');
                $data1['landline_no'] = $this->input->post('landline');
                $data1['aadhar_no'] = $this->input->post('aadhar');
                $data1['blood_group'] = $this->input->post('bgroup');
                $data1['email_id'] = $this->input->post('email');
                $data1['website'] = $this->input->post('website');
                $data1['youtube'] = $this->input->post('youtube');
                $data1['s_p_info'] = $this->input->post('sandp');
                $data1['s_p_minfo'] = $this->input->post('sandpm');
                $data1['s_p_hinfo'] = $this->input->post('sandph');
                $data1['service_id'] = $this->input->post('service');
                $data1['reg_date'] = date("d-m-Y");
                $data1['is_active'] = "1";
                $data1['lat'] = $this->input->post('lat');
                $data1['log'] = $this->input->post('log');
                $data1['imagelink'] = base_url().'uploads/member/'.$data['upload_data']['file_name'];
                $result = $this->admin_model->addmember($data1);
                if ($result) {
                  $this->admin_model->deleteenquiry($this->input->post('reg_id'));
                     $this->session->set_flashdata('alert', '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong>Member Added Successfully!!</div>');
                    echo  "true";
                }
               
               
        } 
    }

   
}