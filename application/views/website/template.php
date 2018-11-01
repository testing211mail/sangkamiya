<?php $this->load->view('website/header'); ?>
<?php  if (isset($main_content)) { $this->load->view($main_content); } else { echo " "; } ?>
<?php $this->load->view('website/footer'); ?>