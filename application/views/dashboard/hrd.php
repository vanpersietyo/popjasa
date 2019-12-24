<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/app-assets/css/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">

  <div class="app-content content">
    <div class="content-wrapper">

      <div class="content-body">
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"><?php echo $tot_karyawan ?></h3>
                      <h6>Total Karyawan</h6>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">Rp. <?php echo number_format($jml_piutang_karyawan->sisa_piutang) ?></h3>
                      <h6>Jumlah Piutang Karyawan</h6>
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success"><?php echo $tot_kerja ?></h3>
                      <h6>Total Karyawan Bekerja</h6>
                    </div>
                    <div>
                      <i class="icon-heart danger font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%"
                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger"><?php echo $tot_resign?></h3>
                      <h6>Total Karyawan Resign</h6>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <section class="row match-height">
          <div class="col-6">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <a class="btn mb-1 btn-info btn-lg btn-block pull-up" href="<?php echo site_url('master/hrd/absensi_karyawan')?>"> Absen Karyawan ? Klik Disini ..</a>
                  <h3 class="content-header-title">Absensi Karyawan tgl : <?php echo date("d-m-Y")?></h3>
                  <br>
                  <!-- Invoices List table -->
                  <div class="table-responsive">
                    <table id="table2" class="table table-striped table-bordered sourced-data">
                      <thead>
                        <tr>
                          <th>Nama Karyawan</th>
                          <th>Status</th>
                          <th>Tgl Absen</th>
                          <!-- <th></th> -->
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>

                    </table>
                  </div>

                  <!--/ Invoices table -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <a class="btn mb-1 btn-info btn-lg btn-block pull-up" href="<?php echo site_url('master/hrd/pembayaran_karyawan')?>"> Bayar Piutang Karyawan ? Klik Disini ..</a>
                  <!-- Invoices List table -->
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered sourced-data">
                      <thead>
                        <tr>
                          <th>Nama Karyawan</th>
                          <th>Sisa Piutang</th>
                          <th>Jumlah Bayar</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                        <th>Jumlah</th>
                        <th>Rp. <?php echo number_format($jml_piutang_karyawan->sisa_piutang) ?></th>
                        <th>Rp. <?php echo number_format($jml_piutang_karyawan->jumlah_bayar) ?></th>
                      </tfoot>

                    </table>
                  </div>
                  <!--/ Invoices table -->
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- // line chart section end -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo base_url('assets/')?>app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/')?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/')?>app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url('assets/')?>app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo base_url('assets/')?>app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/')?>app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/')?>app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/')?>app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
  <!-- END PAGE LEVEL JS-->
  <script type="text/javascript">

  var save_method; //for save method string
  var table;
  var table2;
  var base_url = '<?php echo base_url();?>';

  $(document).ready(function() {

      //datatables
      table = $('#table').DataTable({

          // Load data for the table's content from an Ajax source
          "ajax": {
              "url": "<?php echo site_url('dashboard/ajax_pembayaran')?>",
              "type": "POST"
          },

      });

      table2 = $('#table2').DataTable({

          // Load data for the table's content from an Ajax source
          "ajax": {
              "url": "<?php echo site_url('master/hrd/absensi_karyawan/ajax_list2')?>",
              "type": "POST"
          },

      });

  });


  function reload_table()
  {
      table.ajax.reload(null,false);
      table2.ajax.reload(null,false); //reload datatable ajax
  }
  </script>

  <script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>" type="text/javascript"></script>


</body>
</html>
