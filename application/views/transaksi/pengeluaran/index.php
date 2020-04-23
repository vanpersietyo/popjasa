<?php $this->load->view('transaksi/pengeluaran/assets/css')?>

<style media="screen">
    label {
        display: inline-block;
        margin-bottom: .5rem;
        font-size: 17px;
        font-weight: 500;
        font-style: italic;
    }

    #table_filter {
        display: none;
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
        <div class="content-header row">

            <div class="content-header-left col-md-6 col-6">
                <h3 class="content-header-title">Transaksi Pengeluaran Biaya Bulanan</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><b class="">Untuk Menambah Transaksi, Klik Tombol (+) Tambah Pengeluaran</b>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <button type="button" class="btn mb-1 btn-info btn-block pull-up" onclick="add_person()"><a>
                                    <i class="fa fa-plus"></i> Tambah Pengeluaran </a></button>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <button class="btn mb-1 btn-info btn-block pull-up" onclick="reload_table()"><i
                                        class="fa fa-refresh"></i> Muat Ulang
                            </button>
                        </div>
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
                                    <table id="tabel_pengeluaran"
                                           class="table table-striped table-bordered sourced-data" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th style="width:15%">ID Pengeluaran</th>
                                            <th style="width:10%">Periode</th>
                                            <th style="width:5%">Tahun</th>
                                            <th style="width:20%">Keterangan</th>
                                            <th style="width:10%">Total</th>
                                            <th style="width:10%">Tgl Dibuat</th>
                                            <th style="width:10%">Input By</th>
                                            <th style="width:10%">Aksi</th>
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
                <form action="javascript:void(0)" onsubmit="save()" id="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="projectinput2">Periode Pengeluaran</label>
                                <select class="select select-size-lg form-control block" id="responsive_single"
                                        name="<?=M_trs_pengeluaran::periode;?>" style="width: 100%">
                                    <option value="" class="disabled"> ---</option>
                                    <option value="Januari"> Januari</option>
                                    <option value="Februari"> Februari</option>
                                    <option value="Maret"> Maret</option>
                                    <option value="April"> April</option>
                                    <option value="Mei"> Mei</option>
                                    <option value="Juni"> Juni</option>
                                    <option value="Juli"> Juli</option>
                                    <option value="Augustus"> Augustus</option>
                                    <option value="September"> September</option>
                                    <option value="October"> October</option>
                                    <option value="November"> November</option>
                                    <option value="Desember"> Desember</option>
                                </select>
                                <div id="error_messages" class="NOTIF_ERROR_<?=M_trs_pengeluaran::periode;?>"></div>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="issueinput5">Keterangan Biaya Pengeluaran</label>
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control form-control-lg input-lg position-inside-maxlength"
                                           id="maxlength-position-inside" maxlength="120" name="<?=M_trs_pengeluaran::keterangan;?>"
                                           placeholder="" aria-describedby="basic-addon3">
                                </div>
                                <div id="error_messages" class="NOTIF_ERROR_<?=M_trs_pengeluaran::keterangan;?>"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" id="btnSave"
                                        class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"> Simpan
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Block level buttons with icon -->
                            <div class="form-group">
                                <button type="button" class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"
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
    var base_url = '<?php echo base_url();?>';
    let btnSave = $('#btnSave');

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
        $('[id="error_messages"]').html('');
    }

    $(document).ready(function () {
        table = $('#tabel_pengeluaran').DataTable({
            "ajax": {
                "url": "<?php echo site_url('transaksi/pengeluaran/ajax_list')?>",
            },
            "columnDefs": [
                {
                    targets: 2,
                    visible: false
                }
            ],
            "columns": [
                {mData: '0', class: 'text-center'},
                {mData: '1', class: 'text-center'},
                {mData: '2', class: 'text-center'},
                {mData: '3'},
                {mData: '4', render: $.fn.dataTable.render.number(',', '.', 0, ''), class: 'text-right'},
                {mData: '5', class: 'text-center'},
                {mData: '6'},
                {mData: '7', class: 'text-center'},
            ],
            drawCallback: function (e) {
                var c = this.api(),
                    r = c.rows({
                        page: "current"
                    }).nodes(),
                    i = null;
                c.column(2, {
                    page: "current"
                }).data().each(function (e, c) {
                    i !== e && ($(r).eq(c).before('<tr class="group"><td colspan="8">' + e + "</td></tr>"), i = e)
                })
            }
        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
        });

        $('.select').select2();

    });

    function add_person() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        clear_all_error();
        $('.select').val('<?php echo Conversion::monthIndo('',1);?>').trigger('change');
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Pengeluaran'); // Set Title to Bootstrap modal title

    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    function save() {
        btnSave.text('Menyimpan...'); //change button text
        btnSave.attr('disabled', true); //set button disable
        clear_all_error();
        // ajax adding data to database
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: "<?php echo site_url('transaksi/pengeluaran/ajax_add')?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {
                if (data.status) //if success close modal and reload ajax table
                {
                    $('.select').val('').trigger('change');
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
                error_swal('Data Gagal Disimpan !');
                btnSave.text('Simpan'); //change button text
                btnSave.attr('disabled', false); //set button enable
            }
        });
    }

    function delete_person(id) {
        if (confirm('Are you sure delete this data?')) {
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

    function detail(id) {
        window.location.href = "<?php echo site_url('transaksi/pengeluaran/detail')?>/" + id;
    }
</script>