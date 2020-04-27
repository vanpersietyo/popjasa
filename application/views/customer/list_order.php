<?php
$this->load->view('./template/head');
?>

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <h5 class="brand-text" style="text-align: center">POPJASA TRACKING ORDER</h5>
                </a>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="https://popjasa.id/"><i
                                        class="ficon ft-arrow-left"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="app-content content">

        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Progress</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><p class="danger"></p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section class="row match-height">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title info">Data Customer : </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Invoices List table -->
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Nama Customer</label>
                                                    <input name="nm_customer" value="<?php echo $customer->nm_customer; ?>"
                                                           placeholder="Nama Customer .." class="form-control" type="text"
                                                           disabled>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Telp Customer</label>
                                                    <input name="tlp_customer"
                                                           value="<?php echo $customer->tlp_customer; ?>"
                                                           placeholder="Telp Customer .." class="form-control" type="number"
                                                           disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Hp Customer</label>
                                                    <input name="telp2_customer"
                                                           value="<?php echo $customer->telp2_customer; ?>"
                                                           placeholder="No Hp Customer .." class="form-control"
                                                           type="number" disabled>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email Customer</label>
                                                    <input name="email_customer"
                                                           value="<?php echo $customer->email_customer; ?>"
                                                           placeholder="Email Customer .." class="form-control" type="email"
                                                           disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Kota Customer</label>
                                                    <input name="kota_customer"
                                                           value="<?php echo $customer->kota_customer; ?>"
                                                           placeholder="Kota Customer .." class="form-control" type="text"
                                                           disabled>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Note Contacted</label>
                                                    <textarea name="keterangan" value="<?php echo $customer->keterangan; ?>"
                                                              placeholder="Keterangan .." maxlength="255"
                                                              class="form-control" type="textarea" disabled></textarea>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!--/ Invoices table -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title info">Produk Jasa Yang Dibeli : </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Invoices List table -->
                                    <div class="table table-responsive">
                                        <table id="table2" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Nama Jasa</th>
                                                <th>Harga </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>

                                            <tfoot>
                                            <th colspan="1">Total Harga</th>
                                            <th colspan="1"></th>

                                            </tfoot>

                                        </table>
                                    </div>
                                    <!--/ Invoices table -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title info">History Pembayaran : </h4>
                                    <!-- Invoices List table -->
                                    <div class="table-responsive">
                                        <table id="tablePembayaran" class="table table-striped table-bordered sourced-data">
                                            <thead>
                                            <tr>
                                                <th>Kode Pembayaran</th>
                                                <th>Jumlah</th>
                                                <th>Tgl Transaksi</th>
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

                </section>
            </div>

            <div class="content-body">

<!--                <div class="row">-->
<!--                    <div class="col-12">-->
<!--                        <div class="card">-->
<!--                            <div class="card-content">-->
<!--                                <div class="card-body">-->
<!--                                    <input type="hidden" id="id_project" name="id_project"-->
<!--                                           value="--><?php //echo $project->id_project; ?><!--"-->
<!--                                    <h5 class="card-title danger">#Document Formulir</h5>-->
<!--                                    <br>-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-lg-12 col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <button type="button" class="btn mb-1 btn-dark btn-block pull-up"-->
<!--                                                        onclick="show_keterangan()"><a>&nbsp;Formulir Keterangan </a>-->
<!--                                                </button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-lg-12 col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <button type="button" class="btn mb-1 btn-dark  btn-block pull-up"-->
<!--                                                        onclick="show_izin()"><a>&nbsp;Formulir Izin </a></button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-lg-12 col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <button type="button" class="btn mb-1 btn-dark  btn-block pull-up"-->
<!--                                                        onclick="show_uraian()"><a>&nbsp;Formulir Uraian </a></button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-lg-12 col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <button type="button" class="btn mb-1 btn-dark  btn-block pull-up"-->
<!--                                                        onclick="show_terima()"><a>&nbsp;Formulir Terima </a></button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-lg-12 col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <button type="button" class="btn mb-1 btn-dark  btn-block pull-up"-->
<!--                                                        onclick="show_kepuasan()"><a>&nbsp;Formulir Kepuasan Pelanggan </a></button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!---->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="row">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h5 class="content-header-title">Log's Project
                                            List </h5>
                                        <br>

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" id="mytable">
                                                <thead>
                                                <tr>
                                                    <th width="80px">No</th>
                                                    <th>Status Log</th>
                                                    <th>Tgl Log</th>
                                                    <th>Keterangan</th>
                                                    <th width="200px">Created By</th>
                                                </tr>
                                                </thead>

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

    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
        let id = $('[name="id_project"]').val();
        $(document).ready(function () {
            var t = $("#mytable").dataTable({
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('customers/track/json/')?>" + id,
                    "type": "POST"
                },
            });
        });
    </script>

    <div class="modal animated pulse text-left" id="modal_form_keterangan" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i></h4>
                    <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form_project" id="form_project" action="javascript:void(0)" autocomplete="off">

                        <div class="content-body">
                            <section class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="tab-content">
                                            <div class="container tab-pane active" id="keterangan" style="padding-top: 5px">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="varchar">ID Hdr
                                                                Project <?php echo form_error('ID_Hdr_Project') ?></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                       name="id_hdr_Project"
                                                                       id="id_hdr_Project"
                                                                       placeholder="ID Hdr Project"
                                                                       readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="varchar">ID
                                                                Project <?php echo form_error('ID_Project') ?></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="id_p roject"
                                                                       id="id_project"
                                                                       placeholder="ID Project" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Email UNTUK NIB</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="email"
                                                                                   id="email"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Password</label>
                                                                        <div class="input-group">
                                                                            <input type="password" class="form-control"
                                                                                   name="password"
                                                                                   id="password"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Email pengurus:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="email_pengurus"
                                                                                   id="email_pengurus"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>No. Telp pengurus:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="notelp"
                                                                                   id="notelp"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>LUASAN TEMPAT USAHA:</label>
                                                                        <div class="input-group">
                                                                            <input type="number" class="form-control"
                                                                                   name="luas"
                                                                                   id="luas"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>MENGETAHUI POPJASA dari:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="tahu"
                                                                                   id="tahu"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>BIDANG USAHA:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="bidang_usaha"
                                                                                   id="bidang_usaha"
                                                                                   placeholder="Ket Bidang Usaha"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="id_project_ket"/>
                                                    <button type="button"
                                                            class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                                            data-dismiss="modal">
                                                        Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated pulse text-left" id="modal_form_izin" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i></h4>
                    <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form_project" id="form_project" action="javascript:void(0)" autocomplete="off">

                        <div class="content-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="tab-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="varchar">ID Hdr
                                                                        Project <?php echo form_error('ID_Hdr_Project') ?></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                               name="id_hdr_project" id="id_hdr_project"
                                                                               placeholder="ID Hdr Project" readonly/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="varchar">ID
                                                                        Project <?php echo form_error('ID_Project') ?></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                               name="id_project" id="id_project"
                                                                               placeholder="ID Project" readonly/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>AKTA NOTARIS</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="akta_notaris" id="akta_notaris"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>PENGESAHAN</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="pengesahan" id="pengesahan"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>NPWP PRIBADI</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="npwp"
                                                                           id="npwp"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>NPWP (dikirim) PERUSAHAAN</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="npwp_perusahaan" id="npwp_perusahaan"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>SKT NPWP (dikirim)</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="skt_perusahaan" id="skt_perusahaan"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">&nbsp;
                                                                <label>SIUP & TDP (NIB)</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="siup_tdp"
                                                                           id="siup_tdp"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>REGISTRASI</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="registrasi" id="registrasi"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>PKP</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="pkp"
                                                                           id="pkp"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>S.K. DOMISILI</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="sk_domisili" id="sk_domisili"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">&nbsp;
                                                                <label>Lain-lain</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="lain_text"
                                                                           id="lain_text"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="id_project_ket"/>
                                                    <button type="button"
                                                            class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                                            data-dismiss="modal">
                                                        Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated pulse text-left" id="modal_form_uraian" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i></h4>
                    <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form_project" id="form_project" action="javascript:void(0)" autocomplete="off">

                        <div class="content-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="tab-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="varchar">ID Hdr
                                                                        Project <?php echo form_error('ID_Hdr_Project') ?></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                               name="id_hdr_project" id="id_hdr_project"
                                                                               placeholder="ID Hdr Project" readonly/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="varchar">ID
                                                                        Project <?php echo form_error('ID_Project') ?></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                               name="id_project" id="id_project"
                                                                               placeholder="ID Project" readonly/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>NAMA PERUSAHAAN</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="nm_perusahaan" id="nm_perusahaan"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>MODAL DASAR : Rp.</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="modal"
                                                                           id="modal"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>MODAL DISETOR : Rp.</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="modal_disetor" id="modal_disetor"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>PRESENTASE PEMBAGIAN SAHAM :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="presentase_shm" id="presentase_shm"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>HARGA TIAP SAHAM : RP.</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="hrg_saham"
                                                                           id="hrg_saham"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>NO TELP :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="no_telp"
                                                                           id="no_telp"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>NO FAX :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="no_fax"
                                                                           id="no_fax"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>KEL :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="kelurahan"
                                                                           id="kelurahan"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>KOTA/KABUPATEN :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="kabupaten"
                                                                           id="kabupaten"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="id_project_ket"/>
                                                    <button type="button"
                                                            class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                                            data-dismiss="modal">
                                                        Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated pulse text-left" id="modal_form_terima" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i></h4>
                    <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form_project" id="form_project" action="javascript:void(0)" autocomplete="off">

                        <div class="content-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="varchar">ID Hdr
                                                                Project <?php echo form_error('ID_Hdr_Project') ?></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                       name="id_hdr_project" id="id_hdr_project"
                                                                       placeholder="ID Hdr Project" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="varchar">ID
                                                                Project <?php echo form_error('ID_Project') ?></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="id_project"
                                                                       id="id_project" placeholder="ID Project" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="bool_ktp" class="col-form-label">KTP :</label>
                                                            <input type="numeric" class="form-control" name="jml_ktp"
                                                                   id="jml_ktp" placeholder="Jumlah Orang"/>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <label for="bool_ktp" class="col-form-label">&nbsp;</label>
                                                            <input type="text" class="form-control" name="ktp" id="ktp"
                                                                   placeholder="KTP"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="jns_npwp" class="col-form-label">NPWP PRIBADI (SEMU
                                                                PENGURUS) :</label>
                                                            <input type="text" class="form-control" name="npwp" id="npwp"
                                                                   placeholder="NPWP Pribadi"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="jns_sertifikat" class="col-form-label">SERTIFIKAT T.
                                                                USAHA :</label>
                                                            <input type="text" class="form-control" name="sertifikat"
                                                                   id="sertifikat" placeholder="Sertifikat T. USAHA"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="jns_imb" class="col-form-label">IMB (IJIN MENDIRIKAN
                                                                BANGUNAN) :</label>
                                                            <input type="text" class="form-control" name="imb" id="imb"
                                                                   placeholder="IJIN Mendirikan Bangunan"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="bool_stempel" class="col-form-label">Stempel
                                                                :</label>&nbsp;
                                                            <input type="text" class="form-control" name="stempel"
                                                                   id="stempel" placeholder="IJIN Mendirikan Bangunan"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="materai" class="col-form-label">MATERAI :</label>
                                                            <input type="number" class="form-control" name="jml_materai"
                                                                   id="jml_materai" placeholder="Jumlah Materai"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="nofax" class="col-form-label">S.K. DOMISILI
                                                                :</label>
                                                            <input type="text" class="form-control" name="domisili"
                                                                   id="domisili" placeholder="IJIN Mendirikan Bangunan"/>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="jns_sewa" class="col-form-label">SURAT SEWA
                                                                :</label>
                                                            <input type="text" class="form-control" name="surat_sewa"
                                                                   id="surat_sewa" placeholder="IJIN Mendirikan Bangunan"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="id_project_terima"/>
                                                    <button type="button"
                                                            class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                                            data-dismiss="modal">
                                                        Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript">

        var save_method; //for save method string
        var table;
        var table2;
        var base_url = '<?php echo base_url();?>';

        $(document).ready(function () {
            table2 = $('#table2').DataTable({


                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('customers/track/ajax_produk/' . $id_header)?>",
                    "type": "POST"
                },

                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(1)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(1, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var numFormat = $.fn.dataTable.render.number('\,', '.', 0, 'Rp. ').display;
                    $(api.column(1).footer()).html(
                        '<h class="text-bold-500"> ' + numFormat(pageTotal)
                    );
                },

                "columns": [
                    {mData: '0'},
                    {mData: '1', render: $.fn.dataTable.render.number(',', '.', 0, '')},
                ],

            });

        });

        function reload_table() {
            table.ajax.reload(null, false);
            table2.ajax.reload(null, false); //reload datatable ajax
        }

        function show_keterangan() {
            let id = $('[name="id_project"]').val();
            window.location.href = "<?php echo site_url('/transaksi/projects_ket/cek_projects/'); ?>" + id;
        }

        function show_izin() {
            let id = $('[name="id_project"]').val();
            window.location.href = "<?php echo site_url('/transaksi/projects_izin/cek_projects/'); ?>" + id;
        }

        function show_uraian() {
            let id = $('[name="id_project"]').val();
            window.location.href = "<?php echo site_url('/transaksi/project_uraian/cek_projects/'); ?>" + id;
        }

        function show_terima() {
            let id = $('[name="id_project"]').val();
            window.location.href = "<?php echo site_url('/transaksi/project_terima/cek_projects/'); ?>" + id;
        }

        function show_kepuasan() {
            let id = $('[name="id_project"]').val();
            window.location.href = "<?php echo site_url('/transaksi/kepuasan_pelanggan/cek_projects/'); ?>" + id;
        }

        function confirm_project($id) {
            if(confirm('Are you sure confirm this data?'))
            {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('transaksi/project/confirm')?>/"+$id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        // $('#modal_form').modal('hide');
                        reload_table();
                        swal("Good Job !", "Data Berhasil Diupdate !", "success");
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal("Upps Sorry !", "Data Gagal Diupdate !", "warning");
                    }
                });

            }
        }
    </script>
    <script type="text/javascript">
        var date = new Date();
        date.setDate(date.getDate());

        $('.datepicker').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
            //startDate: date,
        });

        $('.datepicker2').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
            //startDate: date,
        });

    </script>


    <script type="text/javascript">

        // Wizard tabs with numbers setup

        // Wizard tabs with icons setup
        $(".icons-tab-steps").steps({
            startIndex: 1,
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
            onStepChanging: function (event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                alert("Submitted!");
            }
        });

        // Initialize validation
        $(".steps-validation").validate({
            ignore: 'input[type=hidden]', // ignore hidden fields
            errorClass: 'danger',
            successClass: 'success',
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            errorPlacement: function (error, element) {
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

    <script type="text/javascript">

        var save_method; //for save method string
        var table;
        var base_url = '<?php echo base_url();?>';

        $(document).ready(function() {
            //datatables
            table = $('#tablePembayaran').DataTable({
                "ajax": {
                    "url": "<?php echo site_url('transaksi/pembayaran/ajax_list_pembayaran/'.$id_project)?>",
                    "type": "POST"
                },

            });
        });

        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax
        }



    </script>
    <!-- End Bootstrap modal -->
<?php
$this->load->view('./template/foot');
?>