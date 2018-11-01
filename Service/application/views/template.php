<?php 

if ($this->session->userdata('adminlogged_in')) {
	$this->load->view('header'); 
}
else{
	$this->load->view('uheader'); 
}

?>
<?php  if (isset($main_content)) { $this->load->view($main_content); } else { echo " "; } ?>
<?php $this->load->view('footer'); ?>