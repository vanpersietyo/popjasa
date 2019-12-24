<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">

<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">

<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">


<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css') ?>">

<!-- END Custom CSS-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Create New Project</h3>
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
          <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="add_person()"> <a> <i class="la la-plus"></i> Tambah Customer Baru </a></button>
        </div>
      </div>

      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <a class="btn mb-1 btn-danger btn-lg btn-block pull-up" href="<?php echo site_url('transaksi/project')?>"><i class="ft-repeat"></i> Kembali</a>
        </div>
      </div>

    </div>

    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h5 class="content-header-title">List Data Customers Deal :</h5>
                  <br>
                <!-- Invoices List table -->
                <div class="table-responsive">
                  <table id="table" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th></th>
                        <th>ID Customer</th>
                        <th>Nama Customer</th>
                        <th>Telp</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Kota</th>
                        <th>Tgl Dibuat</th>
                        <th>Operator</th>

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


<!-- BEGIN VENDOR JS-->
<script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<!-- END PAGE LEVEL JS-->
<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('transaksi/project/ajax_create_new')?>",
            "type": "POST"
        },
        "order": [[ 1, "desc" ]]
    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });


});

function clear_all_error()
{
  $('[name="nm_customer"]').removeClass('border-danger');
    $('[name="president"]').removeClass('border-danger');
    $('[class="NOTIF_ERROR_nm_customer"]').html('');
    $('[class="NOTIF_ERROR_president"]').html('');
}

function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    clear_all_error();
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Customer Baru'); // Set Title to Bootstrap modal title

}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('master/customer/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id_customer);
            $('[name="id_customer"]').val(data.id_customer);
            $('[name="nm_customer"]').val(data.nm_customer);
            $('[name="alamat"]').val(data.alamat);
            $('[name="nm_perusahaan"]').val(data.nm_perusahaan);
            $('[name="alamat_perusahaan"]').val(data.alamat_perusahaan);
            $('[name="jns_usaha"]').val(data.jns_usaha);
            $('[name="bidang_usaha"]').val(data.bidang_usaha);
            $('[name="Agen"]').val(data.Agen);
            $('[name="tlp_customer"]').val(data.tlp_customer);
            $('[name="telp2_customer"]').val(data.telp2_customer);
            $('[name="email_customer"]').val(data.email_customer);
            $('[name="kota_customer"]').val(data.kota_customer);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="keterangan_deals"]').val(data.keterangan_deals);
            $('[name="keterangan_lost"]').val(data.keterangan_lost);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function save()
{
  clear_all_error();
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('sales/customer/contacted/ajax_add_deal')?>";
    } else {
        url = "<?php echo site_url('sales/customer/contacted/ajax_update')?>";
    }

    // ajax adding data to database
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
                 swal("Kerja Bagus !", "Data Berhasil Disimpan !", "success");
                //alert('berhasil  fak');

            }
            else
            {

                for (let i = 0; i < data.inputerror.length; i++)
                {
                  console.log(JSON.stringify(data.inputerror[i]));
                  console.log(JSON.stringify(data.notiferror[i]));
                    let inputerror = $('[name="'+data.inputerror[i]+'"]');
                    $('[class="NOTIF_ERROR_'+data.inputerror[i]+'"]').html(data.notiferror[i]);
                    inputerror.addClass('border-danger');
                }
                $('[name="'+data.inputerror[0]+'"]').focus();
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Ya Ampun Maaf !", "Data Gagal Disimpan !", "warning");
            //alert('gagal fak');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('master/Customer/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                swal("Good Job !", "Data Berhasil Dihapus !", "success");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Upps Sorry !", "Data Gagal Dihapus !", "warning");
            }
        });

    }
}

function project(ID){
     location.replace("<?php echo base_url('transaksi/project/create/')?>"+ID);
   }
</script>
<script type="text/javascript">
function cetak(ID){
     // location.replace("<?php echo base_url('finance/sppd/cetak/')?>"+ID);
     window.open("<?php echo base_url('hr/sppd/cetak/')?>"+ID);
   }

</script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>" type="text/javascript"></script>


<!-- Bootstrap modal insert-->
<div class="modal animated pulse text-left" id="modal_form" role="dialog" aria-labelledby="myModalLabel17"
  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i> Tambah User Baru</h4>
          <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" id="form" class="form-horizontal">
                      <input type="hidden" value="" name="id_karyawan"/>
                     <div class="form-body">
                       <input type="hidden" name="id"/>

                         <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Nama Customer</label>
                                  <input name="nm_customer" placeholder="Nama Customer .." class="form-control" type="text">
                                  <div class="NOTIF_ERROR_nm_customer"></div>
                              </div>
                              <div class="col-md-6">
                                <label>Nama Perusahaan</label>
                                  <input name="nm_perusahaan" placeholder="Nama Perusahaan .." class="form-control" type="text">
                              </div>
                              <div class="col-md-6">
                                 <label>Alamat Customer</label>
                               <textarea name="alamat" placeholder="Alamat Customer .." maxlength="255" rows="2" class="form-control" type="textarea"></textarea>
                              </div>
                              <div class="col-md-6">
                                 <label>Alamat Perusahaan</label>
                               <textarea name="alamat_perusahaan" placeholder="Alamat PErusahaan .." maxlength="255" rows="2" class="form-control" type="textarea"></textarea>
                              </div>
                             <div class="col-md-12">
                                 <label for="projectinput2">Agen</label>
                                 <select class="select2 form-control block"  name="agen" style="width: 100%">
                                     <option value="" class="disabled">Pilih Agen</option>
                                     <?php foreach ($agen as $agen) { ?>
                                        <option value="<?php echo $agen->id_agen?>" ><?php echo $agen->nm_agen?></option>
                                     <?php }?>
                                 </select>
                             </div>

                            </div>

                             <div class="row">
                               <div class="col-md-6">
                                <label>Telp Customer</label>
                                   <input name="tlp_customer" placeholder="Telp Customer .." class="form-control" type="number">
                                   <span class="help-block"></span>
                               </div>

                               <div class="col-md-6">
                                <label>Hp Customer</label>
                                   <input name="telp2_customer" placeholder="No Hp Customer .." class="form-control" type="number">
                                   <span class="help-block"></span>
                               </div>
                             </div>

                             <div class="row">
                               <div class="col-md-6">
                                <label>Email Customer</label>
                                   <input name="email_customer" placeholder="Email Customer .." class="form-control" type="email">
                                   <span class="help-block"></span>
                               </div>

                               <div class="col-md-6">
                                <label>Pilih Area Kota Customer</label>
                                <select class="form-control" name="kota_customer"  width="100%" required>
                                   <option value=""> --- </option>
                                   <?php foreach ($area as $area) { ?>
                                     <option value="<?php echo $area->nama_kota ?>"> <?php echo "$area->nama_kota" ?> </option>
                                   <?php }?>
                                 </select>
                                 <div class="NOTIF_ERROR_kota_customer"></div>
                                 </div>

                               <label class="control-label col-md-3">Keterangan</label>
                                 <div class="col-md-12">
                                  <textarea name="keterangan" placeholder="Keterangan .." maxlength="255" class="form-control" type="textarea"></textarea>
                                 </div>
                             </div>


                         </div>
                     </div>
                 </form>

                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"> Simpan</button>
                     </div>
                   </div>
                   <div class="col-md-6">
                     <!-- Block level buttons with icon -->
                     <div class="form-group">
                       <button type="button" class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up" data-dismiss="modal">
                         Tutup
                       </button>
                     </div>
                   </div>
                 </div>
                </div>

        </div>

      </div>
    </div>
  </div>
    </div>

    <!-- Bootstrap modal insert-->
<div class="modal animated pulse text-left" id="modal_update" role="dialog" aria-labelledby="myModalLabel17"
  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i> Tambah User Baru</h4>
          <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" id="form" class="form-horizontal">
                     <div class="form-body">
                         <div class="form-group">
                          <label class="control-label col-md-3">ID Karyawan </label>
                             <div class="col-md-12">

                                 <input name="id_karyawan2" placeholder="ID Karyawan .." class="form-control" type="text" disabled>
                                 <input type="hidden" name="id"/>
                                 <span class="help-block"></span>
                             </div>
                             <label class="control-label col-md-3">Nama Karyawan</label>
                             <div class="col-md-12">
                                 <input name="nama_karyawan" placeholder="Nama Karyawn .." class="form-control" type="text">
                                 <span class="help-block"></span>
                             </div>
                             <div class="col-md-12">
                             <label class="control-label col-md-3">Pilih Jenis Kelamin</label>
                                 <select class="form-control" name="jns_kelamin" required>
                                  <option value=""> --- </option>
                                    <option value="L"> Laki - Laki </option>
                                    <option value="P"> Perempuan </option>
                                </select>
                             </div>
                             <label class="control-label col-md-12">Pilih Status Karyawan</label>
                              <div class="col-md-12">

                                 <select class="form-control" name="status_karyawan" required>
                                  <option value=""> --- </option>
                                    <option value="1"> Bekerja </option>
                                    <option value="0"> Tidak Bekerja </option>
                                </select>
                             </div>
                            <div class="col-md-12">
                             <label for="issueinput5">Pilih Jabatan</label>
                             <select class="form-control" name="id_jabatan" required>
                                <option value=""> --- </option>
                                <?php foreach ($jabataan as $jabatan) { ?>
                                  <option value="<?php echo $jabatan->id_jabatan ?>"> <?php echo "$jabatan->nama_jabatan" ?> </option>
                                <?php }?>
                              </select>
                              </div>
                             <label class="control-label col-md-3">Keterangan</label>
                             <div class="col-md-12">
                              <textarea name="keterangan" placeholder="Keterangan .." class="form-control" type="textarea"></textarea>
                             </div>
                         </div>
                     </div>
                 </form>

                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"> Simpan</button>
                     </div>
                   </div>
                   <div class="col-md-6">
                     <!-- Block level buttons with icon -->
                     <div class="form-group">
                       <button type="button" class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up" data-dismiss="modal">
                         Tutup
                       </button>
                     </div>
                   </div>
                 </div>
                </div>

        </div>

      </div>
    </div>
  </div>
    </div>
<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js') ?>" type="text/javascript"></script>

<!-- End Bootstrap modal -->
</body>
