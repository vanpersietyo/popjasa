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
                <a class="dropdown-item" href="javascript:void(0)" onclick="show_modal_change_password()"><i class="icon-settings"></i> Change Password</a>
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

  <div class="modal animated pulse text-left" id="modal_change_password" role="dialog" aria-labelledby="myModalLabel17"
       aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header bg-info bg-darken-3">
                  <h4 class="modal-title text-bold-500 white"><i class="la la-gear"></i> Ubah Password User
                      : <?php echo $this->conversion->get_user_login() ?></h4>
                  <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="javascript:void(0)" id="form_change_password" class="form-horizontal"
                        onsubmit="change_password()" autocomplete="off">
                      <div class="form-body">
                          <fieldset class="form-group position-relative has-icon-left">
                              <input name="password_lama" type="password" class="form-control"
                                     placeholder="Password Sekarang"
                                     required="required" <?php echo Conversion::tooltip('Masukkan Password Lama Anda') ?>
                                     autofocus="autofocus">
                              <div class="form-control-position">
                                  <i class="ft-lock"></i>
                              </div>
                              <?php echo Conversion::error_notif_input('password_lama') ?>
                          </fieldset>
                          <fieldset class="form-group position-relative has-icon-left">
                              <input name="password_baru" type="password" class="form-control" placeholder="Password Baru"
                                     required="required" <?php echo Conversion::tooltip('Masukkan Password Baru Anda') ?>>
                              <div class="form-control-position">
                                  <i class="ft-lock"></i>
                              </div>
                              <?php echo Conversion::error_notif_input('password_baru') ?>
                          </fieldset>
                          <fieldset class="form-group position-relative has-icon-left">
                              <input name="konfirm_password_baru" type="password" class="form-control"
                                     placeholder="Konfirmasi Password Baru"
                                     required="required" <?php echo Conversion::tooltip('Masukkan Kembali Password Baru Anda') ?>>
                              <div class="form-control-position">
                                  <i class="ft-lock"></i>
                              </div>
                              <?php echo Conversion::error_notif_input('konfirm_password_baru') ?>
                          </fieldset>

                          <hr>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <button type="submit" id="btnChangePassword"
                                              class="btn mb-1 btn-info  box-shadow-2 btn-lg btn-block pull-up"> Ubah
                                          Password
                                      </button>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <!-- Block level buttons with icon -->
                                  <div class="form-group">
                                      <button type="button"
                                              class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                              data-dismiss="modal">
                                          Batal
                                      </button>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122182576-1"></script>
  <script>
  // preloader
  $(window).on('load', function () {
  	$("#loading").fadeOut(500);
  })


  function show_modal_change_password() {
      $('#modal_change_password').modal('show'); // show bootstrap modal when complete loaded
      $('[name="password_lama"]').focus();
  }

  function change_password() {
      $(".form-control").removeClass('border-danger');
      $('[id="error_messages"]').html('');
      var url = "<?php echo site_url('master/user/change_password')?>";
      var btnchangepwd = $('#btnChangePassword');
      var formData = new FormData($('#form_change_password')[0]);
      btnchangepwd.attr('disabled', true); //set button enable
      $.ajax({
          url: url,
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function (data) {
              if (data.status) {
                  $('#modal_change_password').modal('hide');
                  swal({
                      title: "Berhasil",
                      text: data.message,
                      icon: "success",
                  });
              } else {
                  if (data.sw_alert) {
                      swal({
                          title: "Gagal",
                          text: data.message,
                          icon: "error",
                      });
                  } else {
                      for (let i = 0; i < data.inputerror.length; i++) {
                          let inputerror = $('[name="' + data.inputerror[i] + '"]');
                          $('[class="NOTIF_ERROR_' + data.inputerror[i] + '"]').html(data.notiferror[i]);
                          inputerror.addClass('border-danger');
                      }
                      $('[name="' + data.inputerror[0] + '"]').focus();
                  }
              }
              btnchangepwd.attr('disabled', false); //set button enable
          },
          error: function (jqXHR, textStatus, errorThrown) {
              swal({
                  title: "Gagal",
                  text: 'Silahkan Hubungi Administrator',
                  icon: "error",
              });
              btnchangepwd.attr('disabled', false); //set button enable
          }
      });
  }
  </script>

</body>
</html>
