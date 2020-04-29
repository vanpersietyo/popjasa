<?php
$this->load->view('template/head');
?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"></h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><p class="danger">
                        <h2 style="margin-top:0px"><?php echo $button ?> Penyusutan Fix Asset</h2></p>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="varchar">Penyutan No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="trno"
                                                   value="<?php echo $trno; ?>" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="varchar">Fa Id <?php echo form_error('fa_id') ?></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nama_fa" id="nama_fa"
                                                   placeholder="Masukan kode Fa atau tekan button cari Fa"
                                                   value="<?php echo $fa_id; ?>"/>
                                            <input type="hidden" name="fa_id"/>
                                            <div class="input-group-append">
                                                <button onclick="cari_item()" class="btn btn-primary"
                                                        title="Cari Customer" type="button"><i
                                                            class="la la-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
                                        <input type="text" class="form-control" name="jenis" id="jenis"
                                               placeholder="Jenis"
                                               value="<?php echo $jenis; ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="smallint">Estimasi <?php echo form_error('estimasi') ?></label>
                                        <input type="text" class="form-control" name="estimasi" id="estimasi"
                                               placeholder="1"
                                               value="<?php echo $estimasi; ?>"/>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">Date Beli <?php echo form_error('date_beli') ?></label>
                                        <input type="text" class="form-control datepicker1" name="date_beli"
                                               id="date_beli"
                                               placeholder="Date Beli"
                                               value="<?php echo $date_beli; ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">Date
                                            Penyusutan <?php echo form_error('date_penyusutan') ?></label>
                                        <input type="text" class="form-control datepicker1" name="date_penyusutan"
                                               id="date_penyusutan"
                                               placeholder="Date Penyusutan" value="<?php echo $date_penyusutan; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="double">Hrg Beli <?php echo form_error('hrg_beli') ?></label>
                                        <input type="text" class="form-control" name="hrg_beli" id="hrg_beli"
                                               placeholder="Hrg Beli"
                                               value="<?php echo $hrg_beli; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="double">Penyusutan
                                            Thn <?php echo form_error('penyusutan_thn') ?></label>
                                        <input type="text" class="form-control" name="penyusutan_thn"
                                               id="penyusutan_thn"
                                               placeholder="Penyusutan Thn"
                                               value="<?php echo $penyusutan_thn; ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="double">Penyusutan
                                            Bln <?php echo form_error('penyusutan_bln') ?></label>
                                        <input type="text" class="form-control" name="penyusutan_bln"
                                               id="penyusutan_bln"
                                               placeholder="Penyusutan Bln"
                                               value="<?php echo $penyusutan_bln; ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="double">Pembulatan <?php echo form_error('pembulatan') ?></label>
                                        <input type="text" class="form-control" name="pembulatan" id="pembulatan"
                                               placeholder="Pembulatan"
                                               value="<?php echo $pembulatan; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="trno" value="<?php echo $trno; ?>"/>
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                <a href="<?php echo site_url('transaksi/trs_asset') ?>" class="btn btn-default"
                                   style="text-align: right">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal animated pulse text-left" id="modal_form" role="dialog" aria-labelledby="myModalLabel17"
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
                <div class="table-responsive">
                    <table id="tabel_list_fix_assets" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                        <tr>
                            <th style="min-width: 5%">No.</th>
                            <th style="min-width: 10%">Kode Item</th>
                            <th style="min-width: 15%">Nama Item</th>
                            <th style="min-width: 5%">Aksi</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"
                        onclick="reload_tabel_list_fix_assets()"><i class="fa fa-refresh"></i> Refresh
                </button>
                <button class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up" data-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    let tabel_list_fix_assets;
    let fix_assets = $('[name="fa_id"]');
    $(document).ready(function () {

        tabel_list_fix_assets = $('#tabel_list_fix_assets').DataTable({
            'ajax': {
                'url': "<?php echo site_url('/master/fix_assets/json2/');?>"
            }
        });
        //datepicker
        $('.datepicker1').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        fix_assets.on('change', function () {
            let value = customer.val();
            loading('Sedang Mengecek Fix Assets..');
            $.ajax({
                url: "<?php echo site_url('master/fix_assets/find_by_name/'); ?>" + value,
                "data": new FormData($('#form_return')[0]),
                "type": "POST",
                "contentType": false,
                "processData": false,
                "dataType": "JSON",
                success: function (data) {
                    swal.close();
                    if (data.status) {
                        $('[name="fa_id"]').val(data.Fa_ID);
                        clear_all_error();
                    } else {
                        $('[class="NOTIF_ERROR_KD_TRANS_PENJUALAN"]').html(data.message);
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


    /**
     * created_at: 2019-12-07
     * created_by: Afes Oktavianus
     * @param messages
     */
    function loading(messages = 'Please Wait') {
        swal({
            text: messages,
            icon: "<?php echo site_url('/assets/app-assets/images/icons/loading.gif');?>",
            closeOnClickOutside: false,
            closeOnEsc: false,
            buttons: {
                confirm: {
                    visible: false,
                }
            }
        });
    }

    //fungsi untuk menampilkan alert error
    function error_swal(message = 'Silahkan Hubungi Administrator!') {
        swal({
            title: "Oops, Gagal!",
            text: message,
            icon: "error",
        });
    }

    //fungsi untuk menampilkan alert success
    function success_swal(message = 'Berhasil!') {
        swal({
            title: "Berhasil",
            text: message,
            icon: "success",
        });
    }

    //fungsi untuk membersihakn semua error
    function clear_all_error() {
        $(".form-control").removeClass('border-danger');
        $('[id="error_messages"]').html('');
    }

    //fungsi untuk membersihakn semua error
    function clear_all_error() {
        $(".form-control").removeClass('border-danger');
        $('[id="error_messages"]').html('');
    }


    function cari_item() {
        reload_items();
        $('.modal-title').text('Cari Fix Assets'); // Set Title to Bootstrap modal title
        $('#modal_form').modal('show'); // show bootstrap modal
    }

    function pilih_items(fa_id, nama_fa) {
        $('#modal_form').modal('hide'); // show bootstrap modal
        $('[name="nama_fa"]').val(nama_fa);
        $('[name="fa_id"]').val(fa_id);
        // form_project.val().trigger('change');
        // alert(customer);
    }

    function reload_items() {
        tabel_list_fix_assets.ajax.url("<?php echo site_url('/master/fix_assets/json2/');?>");
    }


    /* Tanpa Rupiah */
    var penyusutan_thn = document.getElementById('penyusutan_thn');
    penyusutan_thn.addEventListener('keyup', function (e) {
        penyusutan_thn.value = formatRupiah(this.value);
    });
    var penyusutan_bln = document.getElementById('penyusutan_bln');
    penyusutan_bln.addEventListener('keyup', function (e) {
        penyusutan_bln.value = formatRupiah(this.value);
    });
    var pembulatan = document.getElementById('pembulatan');
    pembulatan.addEventListener('keyup', function (e) {
        pembulatan.value = formatRupiah(this.value);
    });
    var hrg_beli = document.getElementById('hrg_beli');
    hrg_beli.addEventListener('keyup', function (e) {
        hrg_beli.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>


<?php
$this->load->view('template/foot');
?>
