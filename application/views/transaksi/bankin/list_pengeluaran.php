<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<!-- END Custom CSS-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2" style="padding-bottom: 0 !important;  margin-bottom: 0 !important;">
  				<h3 class="content-header-title">List Detail Data Pengeluaran</h3>
  				<div class="row breadcrumbs-top">
  					<div class="breadcrumb-wrapper col-12">
  						<ol class="breadcrumb">
                <li class="breadcrumb-item"><p class="dark">List Detail Data Pemasukan Di Ambil Dari Transaksi Pembelian dan Biaya Operasional</p>
  							</li>
  						</ol>
  					</div>
  				</div>
  			</div>

  			<div class="content-header-right col-md-6 col-12">
  				<div class="float-md-right">
  					<button class="btn btn-danger bg-accent-4 pull-up" type="button" onclick="window.location.href='<?php echo site_url('transaksi/keuangan/bankin')?>'"><i class="ft-arrow-left white"></i> Kembali</button>
  					<button class="btn btn-success bg-accent-4 pull-up" type="button" onclick="location.reload();" ><i class="ft-refresh-cw white"></i> Refresh</button>
  				</div>
  			</div>
      </div>
      <section id="charts-section">
        <div class="row animated bounceInUp fast">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger"><?php echo number_format($tot_pengeluaran->TOTAL_BAYAR_BELI)?></h3>
                      <h6>Total Pembelian</h6>
                    </div>
                    <div>
                      <i class="fa fa-money danger font-large-2 float-right"></i>
                    </div>
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
                      <h3 class="danger"><?php echo number_format($tot_operasional->TOTAL_OPS)?></h3>
                      <h6>Total Biaya Operasional</h6>
                    </div>
                    <div>
                      <i class="fa fa-money danger font-large-2 float-right"></i>
                    </div>
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
                      <h3 class="info"><?php echo number_format($tot_period_pengeluaran->TOTAL_BAYAR_BELI)?></h3>
                      <h6>Total Pembelian <?php echo strtoupper(date('M-Y'))?></h6>
                    </div>
                    <div>
                      <i class="fa fa-money info font-large-2 float-right"></i>
                    </div>
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
                      <h3 class="info"><?php echo number_format($tot_period_operasional->TOTAL_OPS)?></h3>
                      <h6>Total Biaya Operasional <?php echo strtoupper(date('M-Y'))?></h6>
                    </div>
                    <div>
                      <i class="fa fa-money info font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="charts-section">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
              <h4 class="content-header-title danger">List Detail Data Pembelian</h4>
            </div>
          </div>
        <div class="row">
          <div id="recent-transactions" class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="table-responsive">
                  <br>
                  <table id="table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>ID TRANSAKSI</th>
                            <th>NAMA SUPPLIER</th>
                            <th>JML PEMBELIAN</th>
                            <th>JML PEMBAYARAN</th>
                            <th>SISA HUTANG</th>
                            <th>PERIODE</th>
                          </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="3"><h5 class="text-bold-500" align="right">Total :<h5></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                      </table>
                      <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="charts-section">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
              <h4 class="content-header-title danger">List Detail Data Pengeluaran Operasional</h4>
            </div>
          </div>
        <div class="row">
          <div id="recent-transactions" class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="table-responsive">
                  <br>
                  <table id="table2" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>ID TRANSAKSI</th>
                            <th>PERIODE</th>
                            <th>NAMA PENGELUARAN</th>
                            <th>JUMLAH</th>
                          </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="3"><h5 class="text-bold-500" align="right">Total :<h5></th>
                                <th></th>
                            </tr>
                        </tfoot>
                      </table>
                      <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    </div>
<?php $this->load->view('transaksi/keuangan/bankout/assets/js_pengeluaran')?>

    </body>
