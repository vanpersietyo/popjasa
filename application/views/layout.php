<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="author" content="NUHAPOS">
  <title>POPJASA</title>
  <link rel="icon" href="<?php echo base_url('assets/app-assets/vendors/login16/images/icons/favicon.ico') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
    <script src="https://kit.fontawesome.com/1af36d9dde.js" crossorigin="anonymous"></script>
  <!--===============================================================================================-->
<style media="screen">
.horizontal-menu .navbar-horizontal .nav-item a span {
  font-size: 1.0rem;
  font-weight: 500;
}
</style>

<!-- preloader -->
<div id="loading"><div class="sweet-load-outer"><div class="sweet-load-ring"><div class="sweet-load-circle"><div class="sweet-load-punch"></div></div></div></div></div>
<!-- preloader-end -->

</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="#"> <img class="brand-logo" alt="" src="<?php echo base_url('assets/app-assets/vendors/logo/popjasa.png') ?>">
               <h1 class="brand-text"><?php echo $this->session->userdata('nm_cabang')?></h1>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">

          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700"><?php echo $this->session->userdata('yangLogin')?></span>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?php echo site_url('setup/changepassword')?>"><i class="icon-settings"></i> Change Password</a>
                <a class="dropdown-item" href="<?php echo site_url('auth/logout')?>"><i class="icon-power"></i> Logout</a>


              </div>

            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <?php if ($this->session->userdata('akses_user')==='hrd' | $this->session->userdata('akses_user')==='HRD') {
    $this->load->view('sidebar/hrd');
  }elseif ($this->session->userdata('akses_user')==='mrkt' | $this->session->userdata('akses_user')==='MRKT') {
    $this->load->view('sidebar/marketing');
  }elseif ($this->session->userdata('akses_user')==='ops' | $this->session->userdata('akses_user')==='OPS') {
    $this->load->view('sidebar/operational');
  }elseif ($this->session->userdata('akses_user')==='su' | $this->session->userdata('akses_user')==='SU') {
    $this->load->view('sidebar/superuser');
  }?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php  if(isset($pages))$this->load->view($pages); ?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122182576-1"></script>
  <script>
  // preloader
  $(window).on('load', function () {
  	$("#loading").fadeOut(500);
  })
  </script>

</body>
</html>
