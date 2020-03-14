<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="author" content="Rivaldy Setiawan,Skom">
  <title>POPJASA</title>
  <link rel="icon" href="<?php echo base_url('assets/app-assets/vendors/login16/images/icons/favicon.ico') ?>"/>
  <link rel="icon" href="<?php echo base_url('assets/app-assets/vendors/login16/images/icons/favicon.ico') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!--===============================================================================================-->
<style media="screen">
.horizontal-menu .navbar-horizontal .nav-item a span {
  font-size: 1.0rem;
  font-weight: 500;
}


/*#loading {*/
/*  transition: 0.3s all ease-out;*/
/*  position: fixed;*/
/*  top: 0;*/
/*  bottom: 0;*/
/*  left: 0;*/
/*  right: 0;*/
/*  display: flex;*/
/*  flex-direction: column;*/
/*  justify-content: center;*/
/*  align-items: center;*/
/*  z-index: 999999999999;*/
/*  background: white;*/
/*}*/

/*#loading.ready {*/
/*  opacity: 0;*/
/*}*/

/*.sweet-load-outer {*/
/*  height: 128px;*/
/*  width: 128px;*/
/*  animation: bounce 2s infinite ease-in-out both;*/
/*}*/

/*.sweet-load-ring {*/
/*  height: 100%;*/
/*  width: 100%;*/
/*  border-radius: 50%;*/
/*  background-color: #FF8686;*/
/*  display: flex;*/
/*  align-items: center;*/
/*  justify-content: center;*/
/*  -webkit-animation: ring-color 20s infinite ease-in-out both;*/
/*  animation: ring-color 20s infinite ease-in-out both;*/
/*}*/

/*.sweet-load-circle {*/
/*  height: 80%;*/
/*  width: 80%;*/
/*  border-radius: 50%;*/
/*  background: linear-gradient(221deg, #f12d54, #d03e82, #3c91e6, #ff6e6e, #ffd123, #ff6eaa, #92ff23, #67a6e7, #6123ff, #9961cc, #d0207b, #a569b6, #f12d54);*/
/*  background-size: 2600% 2600%;*/
/*  -webkit-animation: circle-color 25s ease infinite;*/
/*  -moz-animation: circle-color 25s ease infinite;*/
/*  animation: circle-color 25s ease infinite;*/
/*  display: flex;*/
/*  align-items: center;*/
/*  justify-content: center;*/
/*}*/

/*.sweet-load-punch {*/
/*  height: 45%;*/
/*  width: 45%;*/
/*  background: white;*/
/*  border-radius: 12px;*/
/*  transform: rotate(45deg);*/
/*}*/

/*@-webkit-keyframes ring-color {*/
/*  0% {*/
/*    background-color: #FF8686;*/
/*  }*/
/*  15% {*/
/*    background-color: #67A6E7;*/
/*  }*/
/*  30% {*/
/*    background-color: #FFC686*/
/*  }*/
/*  45% {*/
/*    background-color: #41C991;*/
/*  }*/
/*  60% {*/
/*    background-color: #BC5DC8;*/
/*  }*/
/*  85% {*/
/*    background-color: #DA589D;*/
/*  }*/
/*  100% {*/
/*    background-color: #FF8686;*/
/*  }*/
/*}*/

/*@keyframes ring-color {*/
/*  0% {*/
/*    background-color: #FF8686;*/
/*  }*/
/*  15% {*/
/*    background-color: #67A6E7;*/
/*  }*/
/*  30% {*/
/*    background-color: #FFC686*/
/*  }*/
/*  45% {*/
/*    background-color: #41C991;*/
/*  }*/
/*  60% {*/
/*    background-color: #BC5DC8;*/
/*  }*/
/*  85% {*/
/*    background-color: #DA589D;*/
/*  }*/
/*  100% {*/
/*    background-color: #FF8686;*/
/*  }*/
/*}*/

/*@-webkit-keyframes circle-color {*/
/*  0% {*/
/*    background-position: 78% 0%*/
/*  }*/
/*  100% {*/
/*    background-position: 23% 100%*/
/*  }*/
/*}*/

/*@keyframes circle-color {*/
/*  0% {*/
/*    background-position: 78% 0%*/
/*  }*/
/*  100% {*/
/*    background-position: 23% 100%*/
/*  }*/
/*}*/

/*@-webkit-keyframes bounce {*/
/*  0%,*/
/*  80%,*/
/*  100% {*/
/*    -webkit-transform: scale(0.9)*/
/*  }*/
/*  40% {*/
/*    -webkit-transform: scale(1.0)*/
/*  }*/
/*}*/

/*@keyframes bounce {*/
/*  0%,*/
/*  80%,*/
/*  100% {*/
/*    -webkit-transform: scale(0.8);*/
/*    transform: scale(0.9);*/
/*  }*/
/*  40% {*/
/*    -webkit-transform: scale(1.0);*/
/*    transform: scale(1.0);*/
/*  }*/
/*}*/

</style>

<!-- preloader -->
<div id="loading"><div class="sweet-load-outer"><div class="sweet-load-ring"><div class="sweet-load-circle"><div class="sweet-load-punch"></div></div></div></div></div>
<!-- preloader-end -->

</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">
  <!-- fixed-top-->
  <!-- <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-dark bg-gradient-x-grey-blue bg-darken-4 navbar-brand-center" style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"> -->
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
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <?php if ($this->session->userdata('akses_user')=='hrd' | $this->session->userdata('akses_user')=='HRD') {
    $this->load->view('sidebar/hrd');
  }elseif ($this->session->userdata('akses_user')=='mrkt' | $this->session->userdata('akses_user')=='MRKT') {
    $this->load->view('sidebar/marketing');
  }elseif ($this->session->userdata('akses_user')=='ops' | $this->session->userdata('akses_user')=='OPS') {
    $this->load->view('sidebar/operational');
  }elseif ($this->session->userdata('akses_user')=='su' | $this->session->userdata('akses_user')=='SU') {
    $this->load->view('sidebar/superuser');
  }?>
  <!-- <script type='text/javascript'>
PullToRefresh.init({
 mainElement: 'body',
 onRefresh: function(){ window.location.reload(); }
});
</script> -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php  if(isset($pages))$this->load->view($pages); ?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- <footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">&copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
        target="_blank">NuhaPOS  </a></span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer> -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122182576-1"></script>
  <script>
  // preloader
  $(window).on('load', function () {
  	$("#loading").fadeOut(500);
  })
  </script>

</body>
</html>
