
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php if (isset($title)) { echo $title; } else { echo "Hello Jalgaon"; } ?></title>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
 
  <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/lumen.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
  
    <link href="<?php echo base_url();?>assets/css/timeline.css" rel="stylesheet">

     <script type="text/javascript" src="http://www.google.com/jsapi">

</script>



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
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseServices" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Manage Services</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseServices">
            <li data-toggle="tooltip" data-placement="right" title="Categories">
              <a class="nav-link" href="<?php echo base_url(); ?>categories">
                <i class="fa fa-fw fa-align-justify"></i>
                <span class="nav-link-text">Categories</span>
              </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Services">
              <a class="nav-link" href="<?php echo base_url(); ?>service">
                <i class="fa fa-fw fa-cubes"></i>
                <span class="nav-link-text">Services</span>
              </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Members">
              <a class="nav-link" href="<?php echo base_url(); ?>members">
                <i class="fa fa-fw fa-users"></i>
                <span class="nav-link-text">Members</span>
              </a>
            </li>
           
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contents">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseContents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-newspaper-o"></i>
            <span class="nav-link-text">Manage Contents</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseContents">
            <li data-toggle="tooltip" data-placement="right" title="Menu">
              <a class="nav-link" href="<?php echo base_url(); ?>contents">
                <i class="fa fa-fw fa-align-justify"></i>
                <span class="nav-link-text">Image Contents</span>
              </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Video News">
              <a class="nav-link" href="<?php echo base_url(); ?>videonews">
                <i class="fa fa-fw fa-video-camera"></i>
                <span class="nav-link-text">Video News</span>
              </a>
            </li>           
          </ul>
        </li>

        

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ads">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAdvertisements" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-vcard-o"></i>
            <span class="nav-link-text">Manage Ads</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAdvertisements">
             <li data-toggle="tooltip" data-placement="right" title="Image Ads">
              <a class="nav-link" href="<?php echo base_url(); ?>imageads">
                <i class="fa fa-buysellads" aria-hidden="true"></i>
                <span class="nav-link-text">Image Ads</span>
              </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Video Ads">
              <a class="nav-link" href="<?php echo base_url(); ?>videoads">
                <i class="fa fa-video-camera" aria-hidden="true"></i>
                <span class="nav-link-text">Video Ads</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Services">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAndroid" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Android App</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAndroid">
            <li data-toggle="tooltip" data-placement="right" title="Menu">
              <a class="nav-link" href="<?php echo base_url(); ?>menu">
                <i class="fa fa-fw fa-align-justify"></i>
                <span class="nav-link-text">Menu</span>
              </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Notifications">
              <a class="nav-link" href="<?php echo base_url(); ?>notification">
                <i class="fa fa-fw fa-info"></i>
                <span class="nav-link-text">Notifications</span>
              </a>
            </li>           
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Enquiries">
          <a class="nav-link" href="<?php echo base_url(); ?>enquiries">
            <i class="fa fa-fw fa-bell"></i>
            <span class="nav-link-text">Enquiries</span>

          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link" href="<?php echo base_url(); ?>users">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Manage Users</span>

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
          <small>Copyright ©  <a href="/"> Hello Jalgaon 2018</a></small>
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

    <div id="loading" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(102, 102, 102); z-index: 30001; opacity: 0.8; display: none;">
      <p style="position: absolute; color: White; top: 50%; left: 50%;">
      <img src="<?php echo base_url(); ?>assets/icon/806.gif" style="width: 30%;height: 30%">
      </p>
    </div>