<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>"
          rel="stylesheet">
</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu"
      data-col="2-columns">

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
                                        <h3 class="text-white"><?= number_format($omzet - $target->total_target); ?></h3>
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
                                        <?php
                                        $onProgress = $progress ? $progress->on_progress : 0;
                                        ?>
                                        <h3 class="warning"><?= number_format($onProgress) ?></h3>
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
                                        <?php
                                        $finish = $finish ? $finish->finish : 0;
                                        ?>
                                        <h3 class="danger"><?= number_format($finish) ?></h3>
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
                                <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group"
                                    role="group">
                                    <li class="nav-item"><a class="active nav-link" data-toggle="tab"
                                                            href="#scoreLineToDay">Perhari</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Perbulan</a>
                                    </li>
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
                <!-- Laporan Piutang Outstanding dan Berkas belum selesai -->
            </section>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card card-body">
                            <h5><label class="label label-control"
                                       style="vertical-align: middle; font-style: initial; font-weight: bold"><span>Laporan Transaksi Harian</span></label></h5>
                            <div class="card-header" style="padding-bottom: 0">

                                <div class="card-header" style="padding-bottom: 0">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <button class="btn btn-md btn-danger box-shadow-2 round">Pop Jasa</button>
                                        </div>
                                        <div class="col-lg-4">
                                            <input id="search_penjualan_popjasa" type="text" class="search form-control"
                                                   data-toggle="tooltip"
                                                   data-original-title="Cari Tanggal Penjualan Popjasa"
                                                   placeholder="Cari Tanggal Penjualan Popjasa">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div id="new-orders" class="media-list position-relative">
                                        <div class="table-responsive">
                                            <table id="penjualan_popjasa" class="table table-hover table-xl mb-0"
                                                   style="width: 100%;" align="center">
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
                                                <tr>
                                                    <td class="border-top-0">TOTAL</td>
                                                    <td class="border-top-0"></td>
                                                    <td class="border-top-0"></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header" style="padding-bottom: 0">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <button class="btn btn-md btn-danger box-shadow-2 round">Jasamura</button>
                                        </div>
                                        <div class="col-lg-4">
                                            <input id="search_penjualan_jasamurah" type="text" class="search form-control"
                                                   data-toggle="tooltip" data-original-title="Cari Kategori Produk"
                                                   placeholder="Cari Tanggal Penjualan Jasamura">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                            <div class="table-responsive">
                                <table id="penjualan_jasamurah" class="table table-hover table-xl mb-0"
                                       style="width: 100%;" align="center">
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
                                    <tr>
                                        <td class="border-top-0">TOTAL</td>
                                        <td class="border-top-0"></td>
                                        <td class="border-top-0"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card card-body">
                            <div class="col-lg-6 col-xl-6 col6">
                                <!-- Table product top ten sales -->
                                <div class="card-header" style="padding-bottom: 0">

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <button class="btn btn-md btn-danger box-shadow-2 round">TOP 10 TOTAL PENJUALAN
                                            </button>
                                        </div>
                                        <div class="col-lg-4">
                                            <input id="search_top_sales_layanan" type="text" class="search form-control"
                                                   data-toggle="tooltip" data-original-title="Cari TOP 10"
                                                   placeholder="TOP 10 TOTAL PENJUALAN">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table id="top_sales_layanan" class="table table-hover table-xl mb-0"
                                               style="width: 100%;" align="center">
                                            <thead>
                                            <tr>
                                                <th class="border-top-0">NO</th>
                                                <th class="border-top-0">PRODUK</th>
                                                <th class="border-top-0">QTY</th>
                                                <th class="border-top-0">TOTAL</th>
                                                <th class="border-top-0">PROFIT</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6 col6">
                                <!-- Table grafik penjualan -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card card-body">
                            <h5><label class="label label-control"
                                   style="vertical-align: middle; font-style: initial; font-weight: bold"><span>Laporan Piutang</span></label></h5>
                            <div class="card-header" style="padding-bottom: 0">

                                <div class="row">
                                    <div class="col-lg-8">
                                        <button class="btn btn-md btn-danger box-shadow-2 round">Berkas Sudah Selesai
                                        </button>
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="search_piutang_outstanding_finish" type="text" class="search form-control"
                                               data-toggle="tooltip" data-original-title="Cari Piutang Outstanding"
                                               placeholder="Cari Periode Piutang Outstanding">
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="outstanding_finish" class="table table-hover table-xl mb-0"
                                           style="width: 100%;" align="center">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">NO</th>
                                            <th class="border-top-0">NAMA CUSTOMER</th>
                                            <th class="border-top-0">NAMA LAYANAN</th>
                                            <th class="border-top-0">JUMLAH ORDER</th>
                                            <th class="border-top-0">JUMLAH DEAL</th>
                                            <th class="border-top-0">JUMLAH BAYAR</th>
                                            <th class="border-top-0">SISA BAYAR</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <button class="btn btn-md btn-danger box-shadow-2 round">Berkas Belum Selesai
                                        </button>
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="search_piutang_doc_not_finish" type="text" class="search form-control"
                                               data-toggle="tooltip" data-original-title="Cari Kategori Produk"
                                               placeholder="Cari Periode Piutang Outstanding">
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <table id="outstanding_not_finish" class="table table-hover table-xl mb-0"
                                       style="width: 100%;" align="center">
                                    <thead>
                                    <th class="border-top-0">NO</th>
                                    <th class="border-top-0">NAMA CUSTOMER</th>
                                    <th class="border-top-0">NAMA LAYANAN</th>
                                    <th class="border-top-0">JUMLAH ORDER</th>
                                    <th class="border-top-0">JUMLAH DEAL</th>
                                    <th class="border-top-0">JUMLAH BAYAR</th>
                                    <th class="border-top-0">SISA BAYAR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card card-body">
                            <div class="card-header" style="padding-bottom: 0">

                                <div class="row">
                                    <div class="col-lg-8">
                                        <button class="btn btn-md btn-danger box-shadow-2 round">LAPORAN ARUS KAS / CASH FLOW
                                        </button>
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="search_kas" type="text" class="search form-control"
                                               data-toggle="tooltip" data-original-title="ARUS KAS
                                               placeholder="Cari ARUS KAS / CASH FLOW">
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="outstanding_finish" class="table table-hover table-xl mb-0"
                                           style="width: 100%;" align="center">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">TANGGAL</th>
                                            <th class="border-top-0">TUNAI</th>
                                            <th class="border-top-0">BCA</th>
                                            <th class="border-top-0">MANDIRI</th>
                                            <th class="border-top-0">BRI</th>
                                            <th class="border-top-0">TOTAL</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // line chart section end -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php $this->load->view('dashboard/assets/js') ?>
<!-- END PAGE LEVEL JS-->
</body>
</html>
