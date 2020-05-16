<?php
/** @var CI_Controller  $this */
/** @var object         $target */
/** @var integer        $omzet */

$this->load->view('dashboard/assets/head');
?>
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

            <!-- Top 10 Penjualan-->
            <div class="row match-height">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="padding-bottom: 0">
                            <div class="row">
                                <div class="col-lg-8">
                                    <button class="btn btn-md btn-danger box-shadow-2 round">PENJUALAN HARIAN POPJASA
                                    </button>
                                </div>
                                <div class="col-lg-4">
                                    <input id="search_penjualan_popjasa" type="text" class="search form-control"
                                           data-toggle="tooltip" data-original-title="Cari Tanggal Penjualan Popjasa"
                                           placeholder="Cari Tanggal Penjualan Popjasa">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="media-list position-relative">
                                <div class="table-responsive">
                                    <table id="penjualan_popjasa" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">TANGGAL</th>
                                            <th class="border-top-0">QTY</th>
                                            <th class="border-top-0">PENJUALAN</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th class="border-top-0">TOTAL</th>
                                            <th class="border-top-0"></th>
                                            <th class="border-top-0"></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="padding-bottom: 0">
                            <div class="row">
                                <div class="col-lg-8">
                                    <button class="btn btn-md btn-danger box-shadow-2 round">PENJUALAN HARIAN JASAMURA
                                    </button>
                                </div>
                                <div class="col-lg-4">
                                    <input id="search_penjualan_jasamurah" type="text" class="search form-control"
                                           data-toggle="tooltip" data-original-title="Cari Kategori Produk"
                                           placeholder="Cari Tanggal Penjualan Jasamura">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="media-list position-relative">
                                <div class="table-responsive">
                                    <table id="penjualan_jasamurah" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">TANGGAL</th>
                                            <th class="border-top-0">QTY</th>
                                            <th class="border-top-0">PENJUALAN</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th class="border-top-0">TOTAL</th>
                                            <th class="border-top-0"></th>
                                            <th class="border-top-0"></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diagram Pir Top 10 Penjualan -->
            <div class="row match-height">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="padding-bottom: 0">
                            <div class="row">
                                <div class="col-lg-8">
                                    <button class="btn btn-md btn-danger box-shadow-2 round">TOP 10 PENJUALAN
                                    </button>
                                </div>
                                <div class="col-lg-4">
                                    <input id="search_top_sales_layanan" type="text" class="search form-control"
                                           data-toggle="tooltip" data-original-title="Cari TOP 10"
                                           placeholder="TOP 10 PENJUALAN">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="media-list position-relative">
                                <div class="table-responsive">
                                    <table id="top_sales_layanan" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">NO</th>
                                            <th class="border-top-0">PRODUK</th>
                                            <th class="border-top-0">QTY</th>
                                            <th class="border-top-0">OMZET</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="padding-bottom: 0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-md btn-danger box-shadow-2 round">GRAFIK TOP 10 PENJUALAN
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: 0">
                        <div class="card-content">
                            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="simple-pie-chart" height="400" width="304" class="chartjs-render-monitor" style="display: block; width: 304px; height: 400px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Piutang -->
        <div class="row match-height">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 0">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>
                                    <label class="label label-control" style="vertical-align: middle; font-style: initial; font-weight: bold">
                                        <span>Laporan Piutang</span>
                                    </label>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- Berkas Selesai -->
                    <div class="card-content" style="padding-top: 0">
                        <div class="card-body" style="padding-top: 0">
                            <div class="row">
                                <div class="col-lg-8">
                                    <button class="btn btn-md btn-danger round">Berkas Sudah Selesai
                                    </button>
                                </div>
                                <div class="col-lg-4">
                                    <input id="search_piutang_outstanding_finish" type="text" class="search form-control"
                                           data-toggle="tooltip" data-original-title="Cari Piutang Outstanding"
                                           placeholder="Cari Piutang Outstanding">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" style="padding:0">
                                    <div class="table-responsive">
                                        <table id="outstanding_finish" class="table table-striped table-bordered"
                                               style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="border-top-0">NO</th>
                                                <th class="border-top-0">NAMA CUSTOMER</th>
                                                <th class="border-top-0">NAMA LAYANAN</th>
                                                <th class="border-top-0">JUMLAH ORDER</th>
                                                <th class="border-top-0">JUMLAH DEAL</th>
                                                <th class="border-top-0">JUMLAH BAYAR</th>
                                                <th class="border-top-0">SISA BAYAR</th>
                                                <th class="border-top-0"></th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Berkaa Belum Selesai -->
                    <div class="card-content" style="padding-top: 0">
                        <div class="card-body" style="padding-top: 0">
                            <div class="row">
                                <div class="col-lg-8">
                                    <button class="btn btn-md btn-danger round">Berkas Belum Selesai
                                    </button>
                                </div>
                                <div class="col-lg-4">
                                    <input id="search_piutang_doc_not_finish" type="text" class="search form-control"
                                           placeholder="Cari Piutang Outstanding">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" style="padding:0">
                                    <div class="table-responsive">
                                        <table id="outstanding_not_finish" class="table table-striped table-bordered"
                                               style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="border-top-0">NO</th>
                                                <th class="border-top-0">NAMA CUSTOMER</th>
                                                <th class="border-top-0">NAMA LAYANAN</th>
                                                <th class="border-top-0">JUMLAH ORDER</th>
                                                <th class="border-top-0">JUMLAH DEAL</th>
                                                <th class="border-top-0">JUMLAH BAYAR</th>
                                                <th class="border-top-0">SISA BAYAR</th>
                                                <th class="border-top-0"></th>
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
            </div>
        </div>

        <!-- Cashflow -->
        <div class="row match-height">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 0">
                        <div class="row">
                            <div class="col-lg-7">
                                <h4>
                                    <button onclick="cetak_cashflow_bulan()" class="btn btn-md btn-danger box-shadow-2 round"
                                        <?php echo Conversion::tooltip('Cetak Laporan Cashflow')?>>
                                        LAPORAN ARUS KAS / CASHFLOW <i class="ft-printer"></i>
                                    </button>
                                </h4>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <select class="select2 form-control" name="cabang" id="cabang_cashflow" style="width: 100%" title="Pilih Cabang">
                                            <option value="all"> Semua Cabang</option>
                                            <?php
                                                /** @var M_cabang $cabang */
                                                /** @var M_cabang $cbg */
                                                foreach ($cabang as $cbg) {?>
                                                    <option value="<?=$cbg->kd_cabang?>"><?=$cbg->nm_cabang?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-8">
                                        <input id="search_cashflow" type="text" class="search form-control"
                                               data-toggle="tooltip" data-original-title="ARUS KAS"
                                               placeholder="Cari ARUS KAS / CASH FLOW">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- Berkas Selesai -->
                    <div class="card-content" style="padding-top: 0">
                        <div class="card-body" style="padding-top: 0">
                            <div class="row">
                                <div class="col-lg-12" style="padding:0">
                                    <div class="table-responsive">
                                        <table id="cashflow" class="table table-striped table-bordered" style="width: 100%;">
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
                                            <tfoot>
                                                <tr>
                                                    <th class="text-right"><h5 ><b class="danger">SALDO SAAT INI :</></h5></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
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
        </div>

</div>
</div>

<?php $this->load->view('dashboard/assets/js');?>