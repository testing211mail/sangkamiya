<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailtest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
    }

	public function index()
	{

$this->email->from('imridiot@gmail.com', 'You');
$this->email->to('imridiot@gmail.com');
$this->email->subject('My first email by Mailjet');
$this->email->message('Hello from Mailjet & CodeIgniter !');
 
$res=$this->email->send();
print_r($res);
	}
}
