<?php $this->load->view('transaksi/keuangan/bankout/assets/css')?>
<!-- END Custom CSS-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title"><b>Transaksi Pencairan Dana Keluar</b></h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><p class="dark">Transaksi Untuk Mencairkan Dana Pengeluaran Dengan Mengurangi Saldo Bank Yang Sudah Ada</p>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

    <section id="charts-section">
      <!-- <div class="row animated bounceInUp fast">
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="card bg-gradient-directional-info text-white  pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="text-white text-bold-600"><?php echo number_format($sum_saldo);?></h3>
                    <h6 class="text-white"><b>TOTAL PEMASUKAN</b></h6>
                  </div>
                  <div>
                    <i class="fas fa-file-invoice-dollar white font-large-2 float-right"></i>
                  </div>
                </div>
                <button type="button" class="btn btn-outline-white btn pull-up text-right" onclick="pemasukan()"> <b class="text-dark"> <i class="fas fa-search dark"></i>  Detail Data</b></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="card bg-gradient-directional-danger pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="text-white text-bold-600"><?php echo number_format($pengeluaran)?></h3>
                    <h6 class="text-white"><b>TOTAL PENGELUARAN</b></h6>
                  </div>
                  <div>
                    <i class="fas fa-file-invoice-dollar white font-large-2 float-right"></i>
                  </div>
                </div>
                <button type="button" class="btn btn-outline-white btn pull-up text-right" onclick="pengeluaran()"> <b class="text-dark"> <i class="fas fa-search dark"></i>  Detail Data</b></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="card bg-gradient-directional-warning  pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="text-white text-bold-600"><?php echo number_format($sum_bankout->TOTAL_KELUAR);?></h3>
                    <h6 class="text-white"><b>TOTAL SALDO BANK KELUAR</b></h6>
                  </div>
                  <div>
                    <i class="fas fa-file-invoice-dollar white font-large-2 float-right"></i>
                  </div>
                </div>
                <button type="button" class="btn btn-outline-white btn pull-up text-right" onclick="bankout()"> <b class="text-dark"> <i class="fas fa-refresh dark"></i>  Refresh Data</b></button>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <div class="row">
        <div class="col-lg-12 col-md-6">
          <div class="form-group">
            <button type="button" class="btn btn-outline-info btn pull-up" onclick="add_person()"> <i class="fas fa-plus-circle"></i> <b> Buat Transaksi Kas Keluar</b><div></div></button>
          </div>
        </div>
        <!-- <div class="col-lg-6 col-md-6">
          <div class="form-group">
            <button class="btn mb-1 btn-blue bg-accent-4 btn-lg btn-block pull-up" onclick="reload_table()"><i class="la la-refresh"></i> Refresh Data</button>
          </div>
        </div> -->
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
                          <th></th>
                          <th>ID TRANS</th>
                          <th>KD BANK</th>
                          <th>SALDO KELUAR</th>
                          <th>KETERANGAN</th>
                          <th>TGL TRANSAKSI</th>
                          <th>OPERATOR</th>
                        </tr>
                      </thead>
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
<?php $this->load->view('transaksi/keuangan/bankout/assets/js')?>
<?php $this->load->view('transaksi/keuangan/bankout/assets/modal')?>
<!-- End Bootstrap modal lookup-->
<!-- End Bootstrap modal -->
</body>
