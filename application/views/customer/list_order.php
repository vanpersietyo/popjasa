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

    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <input type="hidden" value="<?php echo $id_header; ?>" id="id_project"
                                   name="id_project"/>
                            <h5 class="content-header-title">Log's Project
                                List <?php echo $id_header; ?></h5>
                            <br>

                            <!--                            <div class="table-responsive">-->
                            <!--                                <table class="table table-bordered table-striped" id="mytable">-->
                            <!--                                    <thead>-->
                            <!--                                    <tr>-->
                            <!--                                        <th width="80px">No</th>-->
                            <!--                                        <th>Status Log</th>-->
                            <!--                                        <th>Tgl Log</th>-->
                            <!--                                        <th>Keterangan</th>-->
                            <!--                                        <th width="200px">Created By</th>-->
                            <!--                                    </tr>-->
                            <!--                                    </thead>-->
                            <!---->
                            <!--                                </table>-->
                            <!--                            </div>-->

                            <div class="content-body">
                                <section class="row match-height">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title info">*Data Customer : </h4>
                                                <a class="heading-elements-toggle"><i
                                                            class="la la-ellipsis-h font-medium-3"></i></a>
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
                                                                    <input name="nm_customer"
                                                                           value="<?php echo $customer->nm_customer; ?>"
                                                                           placeholder="Nama Customer .."
                                                                           class="form-control" type="text"
                                                                           disabled>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Telp Customer</label>
                                                                    <input name="tlp_customer"
                                                                           value="<?php echo $customer->tlp_customer; ?>"
                                                                           placeholder="Telp Customer .."
                                                                           class="form-control" type="number"
                                                                           disabled>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label>Hp Customer</label>
                                                                    <input name="telp2_customer"
                                                                           value="<?php echo $customer->telp2_customer; ?>"
                                                                           placeholder="No Hp Customer .."
                                                                           class="form-control"
                                                                           type="number" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Email Customer</label>
                                                                    <input name="email_customer"
                                                                           value="<?php echo $customer->email_customer; ?>"
                                                                           placeholder="Email Customer .."
                                                                           class="form-control" type="email"
                                                                           disabled>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Kota Customer</label>
                                                                    <input name="kota_customer"
                                                                           value="<?php echo $customer->kota_customer; ?>"
                                                                           placeholder="Kota Customer .."
                                                                           class="form-control" type="text"
                                                                           disabled>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label>Note Contacted</label>
                                                                    <textarea name="keterangan"
                                                                              value="<?php echo $customer->keterangan; ?>"
                                                                              placeholder="Keterangan .."
                                                                              maxlength="255"
                                                                              class="form-control" type="textarea"
                                                                              disabled></textarea>
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
                                                <h4 class="card-title info">*Produk Jasa Yang Dibeli : </h4>
                                                <a class="heading-elements-toggle"><i
                                                            class="la la-ellipsis-h font-medium-3"></i></a>
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
                                                    <div class="table-responsive">
                                                        <table id="table2"
                                                               class="table table-striped table-bordered sourced-data">
                                                            <thead>
                                                            <tr>
                                                                <th>Nama <?php echo $status ?></th>
                                                                <th>Harga Pokok</th>
                                                                <th>Harga Jual</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>

                                                            <tfoot>
                                                            <th colspan="1">Total Harga Jual</th>
                                                            <th colspan="3"></th>

                                                            </tfoot>

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

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <input type="hidden" id="id_project" name="id_project"
                                                           value="<?php echo $project->id_project; ?>"
                                                    <h5 class="card-title danger">#Document Formulir</h5>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-6">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                        class="btn mb-1 btn-dark btn-block pull-up"
                                                                        onclick="show_keterangan()"><a>&nbsp;Formulir
                                                                        Keterangan </a>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                        class="btn mb-1 btn-dark  btn-block pull-up"
                                                                        onclick="show_izin()"><a>&nbsp;Formulir
                                                                        Izin </a></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                        class="btn mb-1 btn-dark  btn-block pull-up"
                                                                        onclick="show_uraian()"><a>&nbsp;Formulir
                                                                        Uraian </a></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                        class="btn mb-1 btn-dark  btn-block pull-up"
                                                                        onclick="show_terima()"><a>&nbsp;Formulir
                                                                        Terima </a></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h5 class="card-title danger">#Status Projects</h5>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-6">
                                                            <div class="form-group">
                                                                <?php echo anchor(site_url('transaksi/project_logs/get_logs/') . $project->id_project, 'Status Project', 'class="btn mb-1 btn-dark btn-block pull-up"'); ?>
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
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal animated pulse text-left" id="modal_form_keterangan" role="dialog"
         aria-labelledby="myModalLabel17"
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
                                            <div class="container tab-pane active" id="keterangan"
                                                 style="padding-top: 5px">
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
                                                                <input type="text" class="form-control"
                                                                       name="id_p roject"
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
                                                                    <input type="text" class="form-control"
                                                                           name="siup_tdp"
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
                                                                    <input type="text" class="form-control"
                                                                           name="lain_text"
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
                                                                    <input type="text" class="form-control"
                                                                           name="hrg_saham"
                                                                           id="hrg_saham"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>NO TELP :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="no_telp"
                                                                           id="no_telp"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>NO FAX :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="no_fax"
                                                                           id="no_fax"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>KEL :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="kelurahan"
                                                                           id="kelurahan"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>KOTA/KABUPATEN :</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="kabupaten"
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
                                                                <input type="text" class="form-control"
                                                                       name="id_project"
                                                                       id="id_project" placeholder="ID Project"
                                                                       readonly/>
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
                                                            <label for="jns_npwp" class="col-form-label">NPWP PRIBADI
                                                                (SEMU
                                                                PENGURUS) :</label>
                                                            <input type="text" class="form-control" name="npwp"
                                                                   id="npwp"
                                                                   placeholder="NPWP Pribadi"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="jns_sertifikat" class="col-form-label">SERTIFIKAT
                                                                T.
                                                                USAHA :</label>
                                                            <input type="text" class="form-control" name="sertifikat"
                                                                   id="sertifikat" placeholder="Sertifikat T. USAHA"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="jns_imb" class="col-form-label">IMB (IJIN
                                                                MENDIRIKAN
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
                                                            <label for="materai" class="col-form-label">MATERAI
                                                                :</label>
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
                                                                   id="domisili"
                                                                   placeholder="IJIN Mendirikan Bangunan"/>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="jns_sewa" class="col-form-label">SURAT SEWA
                                                                :</label>
                                                            <input type="text" class="form-control" name="surat_sewa"
                                                                   id="surat_sewa"
                                                                   placeholder="IJIN Mendirikan Bangunan"/>
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

    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">

        var save_method; //for save method string
        var table;
        var table2;
        var base_url = '<?php echo base_url();?>';

        let id = $('[name="id_project"]').val();
        $(document).ready(function () {
            var t = $("#mytable").dataTable({
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('customers/track/json/')?>" + id,
                    "type": "POST"
                },
            });

            table2 = $('#table2').DataTable({


                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('transaksi/project/ajax_project2/' . $id_header)?>",
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
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(2, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var numFormat = $.fn.dataTable.render.number('\,', '.', 0, 'Rp. ').display;
                    $(api.column(2).footer()).html(
                        '<h5 class="text-bold-500"> ' + numFormat(pageTotal)
                    );
                },

                "columns": [
                    {mData: '0'},
                    {mData: '1', render: $.fn.dataTable.render.number(',', '.', 0, '')},
                    {mData: '2', render: $.fn.dataTable.render.number(',', '.', 0, '')},
                    {mData: '3'},
                ],

            });

        });

        $(document).ready(function () {

        });

        function reload_table() {
            table.ajax.reload(null, false);
            table2.ajax.reload(null, false); //reload datatable ajax
        }

        function show_keterangan() {

            let id = $('[name="id_project"]').val();
        }

        function show_izin() {

            let id = $('[name="id_project"]').val();
            window.location.href = "<?php echo site_url('/transaksi/projects_izin/cek_exist_projects/'); ?>" + id;
        }

        function show_uraian() {

            let id = $('[name="id_project"]').val();
            window.location.href = "<?php echo site_url('/transaksi/project_uraian/cek_exist_projects/'); ?>" + id;
        }

        function show_terima() {

            let id = $('[name="id_project"]').val();
            window.location.href = "<?php echo site_url('/transaksi/project_terima/cek_exist_projects/'); ?>" + id;
        }

        function confirm_project($id) {
            if (confirm('Are you sure confirm this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('transaksi/project/confirm')?>/" + $id,
                    type: "POST",
                    dataType: "JSON",
                    success: function (data) {
                        //if success reload ajax table
                        // $('#modal_form').modal('hide');
                        reload_table();
                        swal("Good Job !", "Data Berhasil Diupdate !", "success");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Upps Sorry !", "Data Gagal Diupdate !", "warning");
                    }
                });

            }
        }

    </script>

<?php
$this->load->view('./template/foot');
?>