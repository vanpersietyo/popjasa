<?php
/** @var M_trs_pengeluaran $headers */
/** @var string $firstDay */
/** @var string $lastDay */
/** @var string $currentDay */

$this->load->view('transaksi/pengeluaran/assets/css')?>
<style>
    html body .content .content-wrapper {
        padding: 1.2rem;
    }

    .card-body {
        padding: 0.5rem !important;
    }

    .table th, .table td {
        padding: 0.5rem 1rem;
    }

    table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
        padding-right: 14px;
    }
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row mb-2">
            <div class="col-md-6 col-6" >
                <h3 class="content-header-title">Detail Pengeluaran Bulanan</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><b class="">
                                    Periode <?php echo $headers->periode.' Tahun '.$headers->tahun;?>
                                </b>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-info btn-block pull-up" onclick="add_person()"><a>
                                <i class="fa fa-plus"></i> Tambah Detail </a></button>
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-info btn-block pull-up" onclick="reload_table()"><i
                                    class="fa fa-refresh"></i> Muat Ulang
                        </button>
                    </div>

                    <div class="col-md-4">
                        <a class="btn btn-info btn-block pull-up"
                           href="<?php echo site_url('transaksi/pengeluaran') ?>"><i class="fa fa-backward"></i> Kembali</a>
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
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered sourced-data" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th style="width:10%">Tanggal</th>
                                            <th style="width:20%">Nama Rekening</th>
                                            <th style="width:25%">Keterangan</th>
                                            <th style="width:15%">Nominal</th>
                                            <th style="width:10%">Akun</th>
                                            <th style="width:10%">Input By</th>
                                            <th style="width:5%">Aksi</th>
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
    </div>
</div>

<div class="modal animated pulse text-left" id="modal_form" role="dialog" aria-labelledby="myModalLabel17"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i> Tambah Kategori Baru
                </h4>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="post" onsubmit="save()" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="itemid"/>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="issueinput5">ID PENGELUARAN</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg input-lg" readonly="readonly"
                                           value="<?php echo $headers->id_trs_rekbiaya ?>" placeholder=""
                                           aria-describedby="basic-addon3" name="<?=M_trs_detail_rekening_biaya::id_trs_rekbiaya?>">
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="issueinput5">Periode</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg input-lg"
                                           value="<?php echo $headers->periode ?>" placeholder=""
                                           aria-describedby="basic-addon3" disabled>
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="projectinput2">Nama Pengeluaran</label>
                                <select class="select select-size-lg form-control block" id="responsive_single"
                                        name="<?=M_trs_detail_rekening_biaya::id_rekbiaya?>" style="width: 100%" required>
                                    <?php foreach ($rekbiaya as $key => $value) { ?>
                                        <option value="<?php echo $value->id_rekbiaya ?>"> <?php echo $value->nm_rekbiaya ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="projectinput2">Tanggal Pengeluaran<sup class="text-danger"><small>(Klik Untuk Ubah Tanggal)</small></sup></label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3" onclick="clickTanggal()"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input  name="<?php echo M_trs_detail_rekening_biaya::tgl_input?>" type="text"
                                            class="datepicker form-control form-control-lg input-lg" readonly="readonly"
                                            <?php echo Conversion::tooltip('Klik Untuk Ubah Tanggal');?>>
                                </div>
                                <?php echo Conversion::error_notif_input(M_trs_detail_rekening_biaya::tgl_input)?>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="issueinput5">Jumlah Pengeluaran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"><i class="la la-money"></i></span>
                                    </div>
                                    <input type="text" class="maskmoney form-control form-control-lg input-lg"
                                           name="<?=M_trs_detail_rekening_biaya::harga?>" placeholder="0"
                                           autocomplete="off" aria-describedby="basic-addon3">
                                </div>
                                <?php echo Conversion::error_notif_input(M_trs_detail_rekening_biaya::harga)?>
                            </div>

                            <div class="col-md-12">
                                <label for="issueinput5">Pilih Akun Bank</label>
                                <select class="form-control" name="<?=M_trs_detail_rekening_biaya::kd_bank?>">
                                    <?php foreach ($bank as $bank) { ?>
                                        <option value="<?php echo $bank->kd_bank ?>"> <?php echo "$bank->nm_bank" ?> </option>
                                    <?php } ?>
                                </select>
                                <div class="NOTIF_ERROR_kd_bank"></div>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="issueinput5">Keterangan</label>
                                <textarea name="<?=M_trs_detail_rekening_biaya::keterangan?>" placeholder="Keterangan .."
                                          class="form-control form-control-lg input-lg position-inside-maxlength"
                                          id="maxlength-position-inside" maxlength="250"
                                          rows="5"></textarea>
                                <?php echo Conversion::error_notif_input(M_trs_detail_rekening_biaya::keterangan)?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" id="btnSave"
                                        class="btn btn-info box-shadow-2 btn-lg btn-block pull-up"> Simpan
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Block level buttons with icon -->
                            <div class="form-group">
                                <button type="button" class="btn btn-danger box-shadow-2 btn-lg btn-block pull-up"
                                        data-dismiss="modal">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('transaksi/pengeluaran/assets/js')?>

<script type="text/javascript">
    var save_method; //for save method string
    var table;
    let $datepicker = $('.datepicker');
    let btnSave = $('#btnSave');

    $(document).ready(function () {
        //datatables
        table = $('#table').DataTable({
            "ajax": {
                "url": "<?php echo site_url('transaksi/pengeluaran/ajax_list_detail/' . $id)?>",
                "type": "POST"
            },
            "columns": [
                {mData: '0', class: 'text-center'},
                {mData: '1'},
                {mData: '2'},
                {mData: '3', render: $.fn.dataTable.render.number(',', '.', 0, ''), class: 'text-right'},
                {mData: '4'},
                {mData: '5'},
                {mData: '6', class: 'text-center'},
            ],
        });

        //datepicker
        $datepicker.datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            startDate: '<?php echo $firstDay?>',
            endDate: '<?php echo $lastDay?>'
        });

        //untuk inputan nominal uang
        $('.maskmoney').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            autoGroup: true,
            placeholder: "0",
            rightAlign: false
        });
    });
    //fungsi untuk menampilkan alert error
    function error_swal(message = 'Silahkan Hubungi Administrator!') {
        swal("Gagal", message, "error");
    }
    //fungsi untuk menampilkan alert success
    function success_swal(message = 'Berhasil!') {
        swal("Berhasil", message, "success");
    }
    //fungsi untuk membersihakn semua error
    function clear_all_error(){
        $(".form-control").removeClass('border-danger');
        $('.form-group').removeClass('has-error'); // clear error class
        $('[id="error_messages"]').html('');
        $('.help-block').empty(); // clear error string
    }

    function add_person() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals

        $datepicker.datepicker('setDate','<?php echo $currentDay;?>');
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Pengeluaran Bulan <?php echo $headers->periode." - ".$headers->tahun;?>'); // Set Title to Bootstrap modal title
    }

    function edit_person(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('transaksi/Produk/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('[name="itemid"]').val(data.itemid);
                $('[name="itemname"]').val(data.itemname);
                $('[name="amount"]').val(data.amount);
                $('[name="trtype"]').val(data.trtype);
                $('[name="itemcategoryid"]').val(data.itemcategoryid);
                $('[name="ukuranid"]').val(data.ukuranid);
                $('[name="type"]').val(data.type);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }


    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    function save() {
        btnSave.text('Menyimpan...'); //change button text
        btnSave.attr('disabled', true); //set button disable
        clear_all_error();
        var url;
        if (save_method === 'add') {
            url = "<?php echo site_url('transaksi/pengeluaran/ajax_add_detail')?>";
        } else {
            url = "<?php echo site_url('transaksi/Produk/ajax_update')?>";
        }
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {
                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                    swal("Kerja Bagus !", "Data Berhasil Disimpan !", "success");
                } else {
                    if(data.sw_alert){
                        error_swal(data.message);
                    }else{
                        for (let i = 0; i < data.inputerror.length; i++)
                        {
                            let inputerror = $('[name="'+data.inputerror[i]+'"]');
                            $('[class="NOTIF_ERROR_'+data.inputerror[i]+'"]').html(data.notiferror[i]);
                            inputerror.addClass('border-danger');
                        }
                        $('[name="'+data.inputerror[0]+'"]').focus();
                    }
                }
                btnSave.text('Simpan'); //change button text
                btnSave.attr('disabled', false); //set button enable
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal("Ya Ampun Maaf !", "Data Gagal Disimpan !", "warning");
                btnSave.text('Simpan'); //change button text
                btnSave.attr('disabled', false); //set button enable
            }
        });
    }

    function delete_person(id) {
        if (confirm('Apakah anda yakin ingin menghapus data ini ?')) {
            // ajax delete data to database
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('transaksi/pengeluaran/ajax_delete')?>/" + id,
                dataType: "JSON",
                success: function (data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                    swal("Kerja Bagus !", "Data Berhasil Dihapus !", "success");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal("Ya Ampun Maaf !", "Data Gagal Dihapus !", "warning");
                }
            });

        }
    }

    function delete_detail(id) {
        if (confirm('Apakah anda yakin ingin menghapus data ini ?')) {
            // ajax delete data to database
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('transaksi/pengeluaran/ajax_delete_detail')?>/" + id,
                dataType: "JSON",
                success: function (data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                    swal("Kerja Bagus !", "Data Berhasil Dihapus !", "success");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal("Ya Ampun Maaf !", "Data Gagal Dihapus !", "warning");
                }
            });

        }
    }

    function detail(id) {
        location.replace("<?php echo site_url('transaksi/pengeluaran/detail')?>/" + id);
    }

    function clickTanggal(){
        $datepicker.datepicker("show");
    }

</script>