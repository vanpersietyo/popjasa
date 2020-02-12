<?php
    $this->load->view('template/head');
?>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Fix assets List</h3>
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

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="add()"> <a> <i class="la la-plus"></i> Tambah Fix Assets </a></button>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <a class="btn mb-1 btn-danger btn-lg btn-block pull-up" href="<?php echo site_url('master/fix_assets')?>"><i class="ft-repeat"></i> Kembali</a>
        </div>
    </div>
</div>

<div class="content-body">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h5 class="content-header-title">List Data Fix Assets</h5>
                        <br>
                        <!-- Invoices List table -->
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Barcode</th>
                                    <th>Nama FA</th>
                                    <th>Divisi</th>
                                    <th>Lokasi</th>
                                    <th>Cabang</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
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
                <div class="col-md-12">
                    <form method="post" class="form-horizontal" id="form_fa" action="javascript:void(0)"
                          onsubmit="simpan()" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="varchar">Barcode <?php echo form_error('Barcode') ?></label>
                                    <input type="text" class="form-control" name="Barcode" id="Barcode" placeholder="Barcode" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="varchar">Nama FA <?php echo form_error('Nama_FA') ?></label>
                                    <input type="text" class="form-control" name="Nama_FA" id="Nama_FA" placeholder="Nama FA" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="varchar">Divisi <?php echo form_error('Divisi') ?></label>
                                    <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="varchar">Lokasi <?php echo form_error('Lokasi') ?></label>
                                    <input type="text" class="form-control" name="Lokasi" id="Lokasi" placeholder="Lokasi" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="datetime">Date Akuisisi <?php echo form_error('Date_Akuisisi') ?></label>
                                    <input type="text" class="form-control datepicker1" name="Date_Akuisisi"
                                           id="Date_Akuisisi" placeholder="Date Akuisisi"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="datetime">Date FA <?php echo form_error('Date_FA') ?></label>
                                    <input type="text" class="form-control datepicker1" name="Date_FA" id="Date_FA"
                                           placeholder="Date FA"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="datetime">Date Disposed <?php echo form_error('Date_Disposed') ?></label>
                                    <input type="text" class="form-control datepicker1" name="Date_Disposed"
                                           id="Date_Disposed" placeholder="Date Disposed"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="varchar">Penerima <?php echo form_error('Penerima') ?></label>
                                    <input type="text" class="form-control" name="Penerima" id="Penerima" placeholder="Penerima" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Harga <?php echo form_error('Harga') ?></label>
                                    <input type="text" class="form-control" name="Harga" id="Harga"
                                           placeholder="Harga"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"
                        onclick="simpan()"><i class="fa fa-save"></i>Save</button>
                <button class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up" data-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>

<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<script type="text/javascript">
    function edit_setup(ID){
        location.replace("<?php echo base_url('master/fix_assets/update/')?>"+ID);
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        var t = $("#mytable").dataTable({
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('master/fix_assets/json')?>",
                "type": "POST"
            },
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
            title	: "Oops, Gagal!",
            text	: message,
            icon	: "error",
        });
    }

    //fungsi untuk menampilkan alert success
    function success_swal(message = 'Berhasil!') {
        swal({
            title   : "Berhasil",
            text	: message,
            icon	: "success",
        });
    }

    //fungsi untuk membersihakn semua error
    function clear_all_error(){
        $(".form-control").removeClass('border-danger');
        $('[id="error_messages"]').html('');
    }

    //fungsi untuk membersihakn semua error
    function clear_all_error()
    {
        $(".form-control").removeClass('border-danger');
        $('[id="error_messages"]').html('');
    }

    function add() {
        $('.modal-title').text('Tambah Fix Assets');
        $('#modal_form').modal('show'); // show bootstrap modal
    }

    function simpan() {
        clear_all_error();
        loading('Sedang Menyimpan Data Fix Assets..');
        var formData = new FormData($('#form_fa')[0]);
        $.ajax({
            url     : "<?php echo site_url('/master/fix_assets/simpan_fa/');?>",
            data  	: formData,
            type    : "POST",
            dataType: "JSON",
            contentType	: false,
            processData	: false,
            success : function(data)
            {
                swal.close();
                if(data.status){
                    window.location.href="<?php echo site_url('/master/fix_assets/'); ?>";
                }else{
                    swal.close();
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
            },
            error   : function (jqXHR, textStatus, errorThrown)
            {
                error_swal();
            }
        });
    }

    function destroy(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('master/fix_assets/delete/')?>"+id,
                type: "POST",
            });
            reload_table();
        }
    }

    function reload_table()
    {
        var table = $('#mytable').DataTable();
        table.ajax.reload(null, false); //reload datatable ajax
    }

</script>


<?php
$this->load->view('template/foot');
?>
