<?php $this->load->view('transaksi/keuangan/bankin/assets/css') ?>
<!-- END Custom CSS-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"><b>Transaksi Kas Masuk</b></h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><p class="dark">Transaksi Untuk Pemasukan Dana Dengan
                                    Menambahkan Saldo Bank Yang Sudah Di Set</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="float-md-right">
                    <button type="button" class="btn btn-outline-info btn pull-up" onclick="add_person()"><i
                            class="fas fa-plus-circle"></i> <b> Buat Transaksi Kas Masuk</b>
                    </button>
                </div>
            </div>
        </div>

        <section id="charts-section">
            <div class="row">
                <div id="recent-transactions" class="col-xl-12 col-lg-12">
                    <div class="card">

                        <div class="card-content">
                            <div class="table-responsive">
                                <br>
                                <table id="table" class="table table-striped table-bordered" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th style="width:5%"></th>
                                        <th style="width:10%">ID TRANS</th>
                                        <th style="width:15%">TANGGAL</th>
                                        <th style="width:15%">KD BANK</th>
                                        <th style="width:15%;text-align: right">SALDO MASUK</th>
                                        <th style="width:25%">KETERANGAN</th>
                                        <th style="width:25%">KONFIRMASI</th>
                                        <th style="width:15%">OPERATOR</th>
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
<?php $this->load->view('transaksi/keuangan/bankin/assets/js') ?>
<?php $this->load->view('transaksi/keuangan/bankin/assets/modal') ?>
<!-- End Bootstrap modal lookup-->
<!-- End Bootstrap modal -->
</body>
