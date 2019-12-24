<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Point Of Sale">
  <meta name="keywords" content="Point of sale">
  <meta name="author" content="RIVALDY SETIAWAN">
  <title>Point Of Sale | Rvl Devs</title>
  <link rel="apple-touch-icon" href="<?php echo base_url('assets/app-assets/images/ico/mymazabuta-min.png') ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/app-assets/images/ico/mymazabuta-min.png') ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/pages/login-register.css') ?>">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css') ?>">
  <!-- END Custom CSS-->
</head>
<body class="horizontal-layout horizontal-menu 1-column menu-expanded blank-page blank-page"
data-open="hover" data-menu="horizontal-menu" data-col="1-column" style="background:linear-gradient(to right, #fffff, #fffff);">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <!-- <img src="<?php echo base_url('assets/app-assets/images/mazabuta.png') ?>" alt="Rvl" width="128"> -->
                    </div>
                  </div>

                </div>
                <div class="card-content">

                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Make it easy with <b>Rvl Devs</b></span>
                  </h6>
                  <div class="card-body pt-0">
                    <form class="form-horizontal" action="<?php echo site_url('Auth/process') ?>" method="post">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="user-name">Username</label>
                        <input type="text" class="form-control saveIt" id="user_id" name="user_id" placeholder="Enter User Account Here ..">
                      </fieldset>
                      <fieldset class="form-group floating-label-form-group mb-1">
                        <label for="user-password">Password</label>
                        <input type="password" class="form-control saveIt" id="password" name="password" placeholder="Enter Password Here ..">
                      </fieldset>
                      <div class="form-group row">

                      </div>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="fa fa-unlock"></i> LOGIN</button>
                    </form>
                  </div>

                  <div class="card-body">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/app-assets/vendors/js/forms/icheck/icheck.min.js') ?>" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
  <script src="<?php echo base_url('assets/app-assets/js/scripts/forms/form-login-register.js') ?>" type="text/javascript"></script>
  <script src="//code.jquery.com/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/custom/saveIt.js') ?>" type="text/javascript"></script>

  <!-- END PAGE LEVEL JS-->

</body>
</html>
