<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <meta name="author" content="RIVALDY SETIAWAN">
  <title>Search Track - POPJASA
  </title>
  <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/plugins/forms/wizard.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/plugins/pickers/daterange/daterange.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/assets/css/style.css">
</head>
<body class="horizontal-layout horizontal-menu 1-column   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="1-column">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="#">
              <h5 class="brand-text">POPJASA TRACKING ORDER</h5>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="https://popjasa.id/"><i class="ficon ft-arrow-left"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <div class="row full-height-vh-with-nav">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-10">
              <img class="img-fluid mx-auto d-block pb-3 pt-4 width-65-per" src="<?php echo base_url('assets')?>/app-assets/images/logo/logo-dark-lgpjs.png"
              alt="">
              <form  action="<?php echo site_url('customers/track/order') ?>" method="post">
              <fieldset class="form-group position-relative">
                <input type="text" name="id_inv" class="form-control form-control-xl input-xl" id="iconLeft1" placeholder="Ketik Nomor Invoice Anda ..." required>
                <div class="form-control-position">
                  <i class="ft-search font-medium-4"></i>
                </div>
              </fieldset>
              <div class="row py-2">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-dark btn-md"><i class="ft-search"></i> Search Tracking Produk</button>
                  <a href="https://api.whatsapp.com/send?phone=6282301026622&amp;text=Pop%20Jasa,%20%20Ada%20yang%20bisa%20kami%20bantu%20?%20Saya%20ingin%20konsultasi%20mengenai%20perijinan%20usaha%20tentang%20.%20.%20." class="btn btn-success btn-md"><i class="la la-whatsapp"></i> Konsultasi ? Klik disini ..</a>

                </div>
              </div>
            </form>
              <!-- <div class="row py-1">
                <div class="col-12 text-center">
                  <a href="https://api.whatsapp.com/send?phone=6282301026622&amp;text=Pop%20Jasa,%20%20Ada%20yang%20bisa%20kami%20bantu%20?%20Saya%20ingin%20konsultasi%20mengenai%20perijinan%20usaha%20tentang%20.%20.%20." class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter">
                    <span class="la la-whatsapp"></span>
                  </a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-dark navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://nuhasmart.com"
        target="_blank">NUHAPOS </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo base_url('assets')?>/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo base_url('assets')?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets')?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets')?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <!-- END PAGE LEVEL JS-->
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo base_url('assets') ?>/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url('assets') ?>/app-assets/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets') ?>/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"
  type="text/javascript"></script>
  <script src="<?php echo base_url('assets') ?>/app-assets/vendors/js/pickers/daterange/daterangepicker.js"
  type="text/javascript"></script>
  <script src="<?php echo base_url('assets') ?>/app-assets/vendors/js/forms/validation/jquery.validate.min.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo base_url('assets') ?>/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets') ?>/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets') ?>/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <!-- <script src="<?php echo base_url('assets') ?>/app-assets/js/scripts/forms/wizard-steps.js" type="text/javascript"></script> -->
  <!-- END PAGE LEVEL JS-->
  <script type="text/javascript">

  // Wizard tabs with numbers setup

  // Wizard tabs with icons setup
  $(".icons-tab-steps").steps({
      startIndex: 0,
      enableAllSteps: false,
      enablePagination: false,
      headerTag: "h6",
      bodyTag: "fieldset",
      transitionEffect: "fade",
      titleTemplate: '<span class="step">#index#</span> #title#',
      labels: {
          finish: 'Submit'
      },
      onFinished: function (event, currentIndex) {
          alert("Form submitted.");
      },
      labels: {
      cancel: "Cancel",
      current: "current step:",
      pagination: "Pagination",
      finish: "Wes Mari",
      enablePagination: false,
      next: "Lanjut",
      previous: "Mbalek",
      loading: "Loading ..."
  }
  });

  // Validate steps wizard

  // Show form
  var form = $(".steps-validation").show();

  $(".steps-validation").steps({
      headerTag: "h6",
      bodyTag: "fieldset",
      transitionEffect: "fade",
      titleTemplate: '<span class="step">#index#</span> #title#',
      labels: {
          finish: 'Submit'
      },
      onStepChanging: function (event, currentIndex, newIndex)
      {
          // Allways allow previous action even if the current form is not valid!
          if (currentIndex > newIndex)
          {
              return true;
          }
          // Forbid next action on "Warning" step if the user is to young
          if (newIndex === 3 && Number($("#age-2").val()) < 18)
          {
              return false;
          }
          // Needed in some cases if the user went back (clean up)
          if (currentIndex < newIndex)
          {
              // To remove error styles
              form.find(".body:eq(" + newIndex + ") label.error").remove();
              form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
          }
          form.validate().settings.ignore = ":disabled,:hidden";
          return form.valid();
      },
      onFinishing: function (event, currentIndex)
      {
          form.validate().settings.ignore = ":disabled";
          return form.valid();
      },
      onFinished: function (event, currentIndex)
      {
          alert("Submitted!");
      }
  });

  // Initialize validation
  $(".steps-validation").validate({
      ignore: 'input[type=hidden]', // ignore hidden fields
      errorClass: 'danger',
      successClass: 'success',
      highlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
      },
      unhighlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
      },
      errorPlacement: function(error, element) {
          error.insertAfter(element);
      },
      rules: {
          email: {
              email: true
          }
      }
  });


  // Initialize plugins
  // ------------------------------

  // Date & Time Range
  $('.datetime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
          format: 'MM/DD/YYYY h:mm A'
      }
  });
  </script>
</body>
</html>
