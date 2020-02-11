<?php $this->load->view('transaksi/bankin/assets/css')?>
<!-- END Custom CSS-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title"><b>Transaksi Kas Masuk</b></h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><p class="dark">Transaksi Untuk Pemasukan Dana Dengan Menambahkan Saldo Bank Yang Sudah Di Set</p>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

    <section id="charts-section">
      <div class="row">
        <div class="col-lg-12 col-md-6">
          <div class="form-group">
            <button type="button" class="btn btn-outline-info btn pull-up" onclick="add_person()"> <i class="fas fa-plus-circle"></i> <b> Buat Transaksi Kas Masuk</b><div></div></button>
          </div>
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
                          <th></th>
                          <th>ID TRANS</th>
                          <th>KD BANK</th>
                          <th>SALDO MASUK</th>
                          <th>KETERANGAN</th>
                          <th>TANGGAL</th>
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
<?php $this->load->view('transaksi/bankin/assets/js')?>
<?php $this->load->view('transaksi/bankin/assets/modal')?>
<!-- End Bootstrap modal lookup-->
<!-- End Bootstrap modal -->
</body>