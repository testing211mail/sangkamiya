
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php if (isset($title)) { echo $title; } else { echo "Success Business"; } ?></title>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
 
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/datatables.min.js"></script>


  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/lumen.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
  
    <link href="<?php echo base_url();?>assets/css/timeline.css" rel="stylesheet">

</head>
<style type="text/css">
  .ui-autocomplete-category {
    font-weight: bold;
    padding: .1em .2em;
    margin: .4em 0 .1em;
    line-height: 1;
  }
</style>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url(); ?>adminhome">Admin Dashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url(); ?>adminhome">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Services">
          <a class="nav-link" href="<?php echo base_url(); ?>service">
            <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Services</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Members">
          <a class="nav-link" href="<?php echo base_url(); ?>members">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Members</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Advertisement">
          <a class="nav-link" href="<?php echo base_url(); ?>ads">
            <i class="fa fa-buysellads" aria-hidden="true"></i>
            <span class="nav-link-text">Advertisment</span>
          </a>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Offers">
          <a class="nav-link" href="<?php echo base_url(); ?>offers">
            <i class="fa fa-gift" aria-hidden="true"></i>
            <span class="nav-link-text">Offers</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Report">
          <a class="nav-link" href="<?php echo base_url(); ?>report">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span class="nav-link-text">Report</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Advertisement">
          <a class="nav-link" href="<?php echo base_url(); ?>adminfeedback">
            <i class="fa fa-commenting" aria-hidden="true"></i>
            <span class="nav-link-text">Feedback</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">   
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link">
            <?php echo $this->session->userdata('adminname'); ?>
        </li> -->
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright ©  <a href="/"> Sangkamya.com 2018</a></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>adminhome/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    