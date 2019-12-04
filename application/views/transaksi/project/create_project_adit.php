<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 03/12/2019
 * Time: 15:07
 */

/** @var M_Customer $customer */
/** @var CI_Controller $this */
    $this->load->view('template/head');
    

?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2"
        style="padding-bottom: 0 !important;  margin-bottom: 0 !important;">
        <h3 class="content-header-title">Create Project</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <p class="danger">silahkan create project</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content-header-right col-md-6 col-12">
        <div class="float-md-right">
            <a class="btn btn-danger bg-accent-4 pull-up" type="button"
                href="<?php echo site_url('transaksi/project/index_adit')?>"><i class="ft-arrow-left white"></i>
                Kembali</a>
            <a class="btn btn-success bg-accent-4 pull-up" type="button" href="javascript:void()"
                onclick="location.reload();"><i class="ft-refresh-cw white"></i> Refresh</a>
        </div>
    </div>

</div>

<form method="post" class="form-horizontal" id="form_project" action="javascript:void(0)"
    onsubmit="simpan_create_project()" autocomplete="off">

    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 0.5rem !important">
                        <h4 class="card-title">Header</h4>
                        <hr>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show" id="content-header">
                        <div class="card-body" style="padding-top: 0 !important">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="control-label">Customer</label>
                                        <!-- <select class="form-control" id="select2" name="customer" style="width: 100%">
                                            <option value="">Pilih Customer</option>
                                            <?php
                                            /** @var M_Customer $cust */
                                            foreach ($customer as $i => $cust)
                                            {
                                                echo "<option value='{$cust->id_customer}'>$cust->nm_customer</option>";
                                            }
                                            ?>
                                        </select> -->
                                        <div class="input-group">
                                            <input type="text" name="customer" class="form-control"
                                                placeholder="Masukan kode customer atau tekan button cari customer"
                                                aria-describedby="button-addon4">
                                                <input type="hidden" name="id_customer" />
                                            <div class="input-group-append">
                                                <button onclick="cari_customer()" class="btn btn-primary"
                                                    title="Cari Customer" type="button"><i
                                                        class="la la-search"></i></button>
                                            </div>
                                            <div id="error_messages" class="NOTIF_ERROR_KD_CUSTOMER"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Kasir</label>
                                        <input type="text" class="form-control" value="VANPERSIETYO"
                                            disabled="disabled">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="control-label">Layanan</label>
                                        <select class="form-control" id="select2" name="layanan" style="width: 100%">
                                            <option value="">Pilih Layanan</option>
                                            <?php
                                            /** @var M_Customer $cust */
                                            foreach ($layanan as $i => $lyn)
                                            {
                                                echo "<option value='{$lyn->id_layanan}'>$lyn->nama_layanan</option>";
                                            }
                                            ?>
                                        </select>                                        
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nama Project</label>
                                    <input name="nm_project" value="DEFF PROJECT" placeholder="Nama Project .."
                                        class="form-control" type="text" required="">
                                </div>
                                <div class="col-md-12">
                                    <label>Note Project</label>
                                    <textarea name="note_project" placeholder="Note Project .." maxlength="255"
                                        class="form-control" type="textarea"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button style="margin-top: 1.25rem !important;" type="submit"
                                            href="javascript:void(0)"
                                            class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"> Create
                                            Project </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Block level buttons with icon -->
                                    <div class="form-group">
                                        <a style="margin-top: 1.25rem !important;" type="button"
                                            href="<?php echo site_url('transaksi/project/index_adit')?>"
                                            class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up">
                                            Kembali</a>
                                    </div>
                                </div>
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
                    <div class="table-responsive">
                        <table id="tabel_list_customer" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="min-width: 5%">No.</th>
                                    <th style="min-width: 10%">Kode Customer</th>
                                    <th style="min-width: 15%">Nama Customer</th>
                                    <th style="min-width: 5%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"
                        onclick="reload_tabel_list_penjualan()"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up" data-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
let tabel_list_customer;
$(document).ready(function() {
    $('#select2').select2();
    tabel_list_customer = $('#tabel_list_customer').DataTable({
        'ajax' : {
            'url':"<?php echo site_url('/master/customer/tabel_customer/');?>"}
    });
});

function simpan_create_project() {
    alert('nanti ya');
}

function cari_customer() {
    reload_customer();
    $('.modal-title').text('Cari Customer'); // Set Title to Bootstrap modal title
    $('#modal_form').modal('show'); // show bootstrap modal
}

function pilih_customer(customer, nama_customer) {
    $('#modal_form').modal('hide'); // show bootstrap modal
    $('[name="customer"]').val(nama_customer);
    $('[name="id_customer"]').val(customer);
    // form_project.val().trigger('change');
    // alert(customer);
}

function reload_customer() {
    tabel_list_customer.ajax.url("<?php echo site_url('/master/customer/tabel_customer/');?>");
}

//function untuk simpan detail
function save(){
        var url = "https://prototype.nuhapos.com/pos/transaksi/stok/opname/ajax_add_detail";
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url 		: url,
            type		: "POST",
            data		: formData,
            contentType	: false,
            processData	: false,
            dataType	: "JSON",
            success: function(data)
            {
                data.status
                data.harga
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            }
        });
    }

</script>

<?php
	$this->load->view('template/foot');
?>