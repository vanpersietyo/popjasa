<?php $this->load->view("template/head"); ?>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title"> <?php echo $button ?> Transaksi Fix Asset Detail</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><p class="danger"></p>
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo $action; ?>" method="post">
                                <div class="form-group">
                                    <label for="varchar">Fa Id <?php echo form_error('Fa_Id') ?></label>
                                    <div class="input-group">
                                        <input type="text" name="nama_fa" class="form-control"
                                               placeholder="Masukan kode fix asset atau tekan button cari fix asset"
                                               aria-describedby="button-addon4" value="<?php echo $Fa_Id; ?>">
                                        <input type="hidden" name="Fa_Id" id="Fa_Id" value="<?php echo $Fa_Id; ?>"/>
                                        <div class="input-group-append">
                                            <button onclick="cari_fix_asset()" class="btn btn-primary"
                                                    title="Cari Customer" type="button"><i
                                                        class="la la-search"></i></button>
                                        </div>
                                        <div id="error_messages" class="NOTIF_ERROR_KD_CUSTOMER"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Jenis <?php echo form_error('Jenis') ?></label>
                                    <input type="text" class="form-control" name="Jenis" id="Jenis" placeholder="Jenis"
                                           value="<?php echo $Jenis; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date Beli <?php echo form_error('Date_beli') ?></label>
                                    <input type="text" class="form-control" name="Date_beli" id="Date_beli"
                                           placeholder="Date Beli" value="<?php echo $Date_beli; ?>" readonly/>
                                </div>
                                <div class="form-group">
                                    <label for="smallint">Estimasi <?php echo form_error('Estimasi') ?></label>
                                    <input type="text" class="form-control" name="Estimasi" id="Estimasi"
                                           placeholder="Estimasi" value="<?php echo $Estimasi; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date
                                        Penyusutan <?php echo form_error('Date_penyusutan') ?></label>
                                    <input type="text" class="form-control datepicker1" name="Date_penyusutan"
                                           id="Date_penyusutan"
                                           placeholder="Date Penyusutan" value="<?php echo $Date_penyusutan; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="decimal">Hrg Beli <?php echo form_error('Hrg_beli') ?></label>
                                    <input type="text" class="form-control" name="Hrg_beli" id="Hrg_beli"
                                           placeholder="Hrg Beli" value="<?php echo $Hrg_beli; ?>" readonly/>
                                </div>
                                <?php if ($status == 'Update') { ?>
                                    <div class="form-group">
                                        <label for="decimal">Penyusutan
                                            Thn <?php echo form_error('Penyusutan_thn') ?></label>
                                        <input type="text" class="form-control" name="Penyusutan_thn"
                                               id="Penyusutan_thn" disabled
                                               placeholder="Penyusutan Thn" value="<?php echo $Penyusutan_thn; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="decimal">Penyusutan
                                            Bln <?php echo form_error('Penyusutan_bln') ?></label>
                                        <input type="text" class="form-control" name="Penyusutan_bln"
                                               id="Penyusutan_bln" disabled
                                               placeholder="Penyusutan Bln" value="<?php echo $Penyusutan_bln; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="decimal">Pembulatan <?php echo form_error('Pembulatan') ?></label>
                                        <input type="text" class="form-control" name="Pembulatan" id="Pembulatan"
                                               disabled
                                               placeholder="Pembulatan" value="<?php echo $Pembulatan; ?>"/>
                                    </div>
                                <?php } ?>
                                <div class="modal-footer">
                                    <div class="col-md-6">
                                        <input type="hidden" name="TrNo" value="<?php echo $TrNo; ?>"/>
                                        <input type="hidden" name="Line_No" value="<?php echo $Line_No; ?>"/>
                                        <button type="submit"
                                                class="btn btn-primary form-control"><?php echo $button ?></button>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger bg-accent-4 pull-up  form-control" type="button"
                                           href="<?php echo site_url('transaksi/fixAsset_hdr/update/') . $TrNo ?>"><i
                                                    class="ft-arrow-left white"></i>
                                            Kembali</a>
                                    </div>
                                </div>

                                <div class="modal animated pulse text-left" id="modal_form" role="dialog"
                                     aria-labelledby="myModalLabel17"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h4 class="modal-title text-bold-500 white"><i
                                                            class="la la-pencil-square"></i></h4>
                                                <button type="button" class="close white" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table id="tabel_list_fa" class="table table-striped table-bordered"
                                                           style="width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th style="min-width: 5%">No.</th>
                                                            <th style="min-width: 10%">Kode FA</th>
                                                            <th style="min-width: 15%">Nama Item</th>
                                                            <th style="min-width: 15%">Tanggal Beli</th>
                                                            <th style="min-width: 15%">Harga Beli</th>
                                                            <th style="min-width: 5%">Aksi</th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"
                                                        onclick="reload_tabel_list_fa()"><i class="fa fa-refresh"></i>
                                                    Refresh
                                                </button>
                                                <button class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                                        data-dismiss="modal"
                                                        aria-label="Close"><i class="fa fa-times"></i> Tutup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <script type="text/javascript">
        let tabel_list_fa;
        let nama_fa = $('[name="nama_fa"]');
        let estimasi = $('[name="Estimasi"]');
        $(document).ready(function () {

            tabel_list_fa = $('#tabel_list_fa').DataTable({
                'ajax': {
                    'url': "<?php echo site_url('/master/fix_assets/json2/');?>"
                }
            });

            nama_fa.on('change', function () {
                let value = nama_fa.val();
                loading('Sedang Mengecek Fix Asset..');
                $.ajax({
                    url: "<?php echo site_url('master/fix_assets/find_asset_by_name/'); ?>" + value,
                    "data": new FormData($('#form_return')[0]),
                    "type": "POST",
                    "contentType": false,
                    "processData": false,
                    "dataType": "JSON",
                    success: function (data) {
                        swal.close();
                        if (data.status) {
                            $('[name="Fa_Id"]').val(data.Fa_Id);
                            clear_all_error();
                        } else {
                            $('[class="NOTIF_ERROR_KD_FA"]').html(data.message);
                            customer.addClass('border-danger');
                            customer.val('').focus();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        error_swal();
                    }
                });
            });

        });

        var date = new Date();
        date.setDate(date.getDate());

        $('.datepicker1').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        function cari_fix_asset() {
            reload_fix_asset();
            $('.modal-title').text('Cari Fix Asset'); // Set Title to Bootstrap modal title
            $('#modal_form').modal('show'); // show bootstrap modal
        }

        function pilih_fix_asset(customer, nama_customer, date_beli, harga) {
            $('#modal_form').modal('hide'); // show bootstrap modal
            $('[name="nama_fa"]').val(nama_customer);
            $('[name="Fa_Id"]').val(customer);
            $('[name="Date_beli"]').val(date_beli);
            $('[name="Hrg_beli"]').val(harga);
            // form_project.val().trigger('change');
            // alert(customer);
        }

        function reload_fix_asset() {
            tabel_list_fa.ajax.url("<?php echo site_url('/master/fix_assets/json2/');?>");
        }


        // var estimasi = document.getElementById('Estimasi');
        // estimasi.addEventListener('keyup', function (e) {
        //     alert(estimasi.val());
        //     let hrg_beli = $('[name="Hrg_Beli]').val();
        //     alert(hrg_beli);
        //     var nil_estimasi = estimasi.val();
        //     var penyusutan_thn = hrg_beli/nil_estimasi;
        //     var penyusutan_bln = penyusutan_thn/12;
        //     var round_penyusutan = Math.round(penyusutan_bln);
        //     $('[name="Penyusutan_thn"]').val(penyusutan_thn);
        //     $('[name="Penyusutan_bln"]').val(penyusutan_bln);
        //     $('[name="Pembulatan"]').val(round_penyusutan);
        // });


    </script>
<?php $this->load->view("template/foot"); ?>