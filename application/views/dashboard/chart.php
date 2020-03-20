<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/css/pages/timeline.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/app-assets/css/pages/dashboard-ecommerce.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets')?>/assets/css/style.css">
  <!-- END Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
  <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">

  <div class="app-content content">
    <div class="content-wrapper">

      <div class="content-body">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card bg-gradient-directional-info pull-up pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h3 class="text-white"><?= number_format($target->total_target) ?></h3>
                          <h6 class="text-white">Target</h6>
                        </div>
                        <div>
                          <i class="icon-basket-loaded white font-large-2 float-right"></i>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card bg-gradient-directional-success pull-up pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="text-white"><?= number_format($omzet) ?></h3>
                            <h6 class="text-white">Omzet Penjualan</h6>
                          </div>
                          <div>
                            <i class="icon-pie-chart   white font-large-2 float-right"></i>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card bg-gradient-directional-warning pull-up pull-up">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="media-body text-left">
                              <h3 class="text-white"><?= number_format($cust_deal->contacted) ?></h3>
                              <h6 class="text-white">Jumlah Customer</h6>
                            </div>
                            <div>
                              <i class="icon-user-follow white font-large-2 float-right"></i>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card bg-gradient-directional-danger pull-up pull-up">
                        <div class="card-content">
                          <div class="card-body">
                            <div class="media d-flex">
                              <div class="media-body text-left">
                                <h3 class="text-white"><?= number_format($omzet-$target->total_target); ?></h3>
                                <h6 class="text-white">Progres Target</h6>
                              </div>
                              <div>
                                <i class="icon-heart white font-large-2 float-right"></i>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"><?= number_format($order->tot_order) ?></h3>
                      <h6>Total Order</h6>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning"><?= number_format($progress->on_progress) ?></h3>
                      <h6>Total Belum Selesai</h6>
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger"><?= number_format($finish->finish) ?></h3>
                      <h6>Total Sudah Selesai</h6>
                    </div>
                    <div>
                      <i class="icon-heart danger font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="primary"><?= number_format($cust_contacted->contacted) ?></h3>
                      <h6>Customer Contacted</h6>
                    </div>
                    <div>
                      <i class="icon-user-follow primary font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success"><?= number_format($cust_deal->contacted) ?></h3>
                                    <h6>Customer Deal</h6>
                                </div>
                                <div>
                                    <i class="icon-user-follow success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger"><?= number_format($cust_lost->contacted) ?></h3>
                                    <h6>Customer Lost</h6>
                                </div>
                                <div>
                                    <i class="icon-user-unfollow danger font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- line chart section start -->
        <section id="chartjs-line-charts">
          <div class="row match-height">
            <div class="col-xl-12 col-12" id="ecommerceChartView">
               <div class="card card-shadow">
                 <div class="card-header card-header-transparent py-20">
                   <div class="btn-group dropdown">
                     <a href="#" class="text-body text-dark"><h5>Grafik Penjualan Produk</h5></a>
                   </div>
                   <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
                     <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#scoreLineToDay">Perhari</a></li>
                     <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Perbulan</a></li>
                   </ul>
                 </div>
                 <div class="widget-content tab-content bg-white p-20">
                   <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
                   <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                   <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
                 </div>
               </div>
             </div>

          </div>

          <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <!-- <h4 class="card-title">New Orders</h4> -->
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                      href="invoice-summary.html" target="_blank">Popjasa</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div id="new-orders" class="media-list position-relative">
                  <div class="table-responsive">
                    <table id="penjualan_popjasa" class="table table-hover table-xl mb-0" style="width: 100%;" align="center">
                       <thead>
                       <tr>
                         <th class="border-top-0">TANGGAL</th>
                         <th class="border-top-0">QTY</th>
                         <th class="border-top-0">PENJUALAN</th>
                       </tr>
                       </thead>
                       <tbody>
                       </tbody>
                       <tfoot>
                         <td class="border-top-0">TOTAL</td>
                         <td class="border-top-0"></th>
                         <td class="border-top-0"></td>
                       </tfoot>
                     </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div id="recent-transactions" class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <h4 class="card-title">Recent Transactions</h4> -->
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                      href="invoice-summary.html" target="_blank">Jasa Murah</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="table-responsive">
                  <table id="penjualan_jasamurah" class="table table-hover table-xl mb-0" style="width: 100%;" align="center">
                     <thead>
                     <tr>
                       <th class="border-top-0">TANGGAL</th>
                       <th class="border-top-0">QTY</th>
                       <th class="border-top-0">PENJUALAN</th>
                     </tr>
                     </thead>
                     <tbody>
                     </tbody>
                     <tfoot>
                       <td class="border-top-0">TOTAL</td>
                       <td class="border-top-0"></th>
                       <td class="border-top-0"></td>
                     </tfoot>
                   </table>
                </div>
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
  <?php $this->load->view('dashboard/assets/js_kasir')?>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
