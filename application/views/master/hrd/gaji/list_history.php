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


    <div class="row">
      <!-- <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="add_person()"> <a> <i class="la la-plus"></i> Tambah Karyawan Baru </a></button>
        </div>
      </div> -->

      <div class="col-lg-12 col-md-4">
        <div class="form-group">
          <a class="btn mb-1 btn-danger btn-lg btn-block pull-up" href="<?php echo site_url('master/hrd/gaji')?>"> Kembali</a>
        </div>
      </div>

      <!-- <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <button class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="reload_table()"><i class="la la-refresh"></i> Muat Ulang</button>
        </div>
      </div> -->

    </div>

    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <!-- Invoices List table -->
                <h2 class="text-center text-red">Daftar Kenaikan Gaji Karyawan POP JASA</h2>
                <div class="table-responsive">
                  <table id="table" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th>ID Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Status</th>
                        <th>Gaji</th>
                        <th>Tgl Pembaruan</th>
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
            "url": "<?php echo site_url('master/hrd/gaji/ajax_history/'.$id)?>",
            "type": "POST"
        },

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

    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });


    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });

});


function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Karyawan Baru'); // Set Title to Bootstrap modal title

}

function clear_all_error()
{
    $('[name="nama_karyawan"]').removeClass('border-danger');
    $('[name="jns_kelamin"]').removeClass('border-danger');
    $('[name="status_karyawan"]').removeClass('border-danger');
    $('[name="id_jabatan"]').removeClass('border-danger');
    $('[class="NOTIF_ERROR_nama_karyawan"]').html('');
    $('[class="NOTIF_ERROR_jns_kelamin"]').html('');
    $('[class="NOTIF_ERROR_status_karyawan"]').html('');
    $('[class="NOTIF_ERROR_id_jabatan"]').html('');
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('master/hrd/gaji/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id_karyawan);
            $('[name="id_karyawan2"]').val(data.id_karyawan);
            $('[name="nama_karyawan"]').val(data.nama_karyawan);
            $('[name="jns_kelamin"]').val(data.jns_kelamin);
            $('[name="status_karyawan"]').val(data.status_karyawan);
            $('[name="id_jabatan"]').val(data.id_jabatan);
            $('[name="jml_gaji"]').val(data.jml_gaji);
            $('[name="updated_gaji"]').val(data.updated_gaji);
            $('[name="updated_gaji_by"]').val(data.updated_gaji_by);
            // $('[name="keterangan"]').val(data.keterangan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Setup Gaji Karyawan'); // Set title to Bootstrap modal title
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
        url = "<?php echo site_url('master/hrd/gaji/ajax_add')?>";
    } else {
        url = "<?php echo site_url('master/hrd/gaji/ajax_update')?>";
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
                  reload_table();
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
            swal("Sorry !", "Data Gagal Disimpan !", "warning");
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}



</script>
<script type="text/javascript">
function detail(ID){
     location.replace("<?php echo base_url('master/hrd/gaji/history')?>"+ID);
     //window.open("<?php echo base_url('hr/sppd/cetak/')?>"+ID);
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
                         <div class="form-group">
                           <div class="row">
                             <div class="col-md-6">
                               <label class="control-label">Nama Karyawan</label>
                                 <input name="nama_karyawan" placeholder="Nama Karyawn .." class="form-control" type="text" disabled>
                                 <input type="hidden" name="id"/>
                                  <div class="NOTIF_ERROR_nama_karyawan"></div>
                             </div>
                             <div class="col-md-6">
                             <label class="control-label">Pilih Jenis Kelamin</label>
                                 <select class="form-control" name="jns_kelamin" disabled>
                                  <option value=""> --- </option>
                                    <option value="L"> Laki - Laki </option>
                                    <option value="P"> Perempuan </option>
                                </select>
                                <div class="NOTIF_ERROR_jns_kelamin"></div>
                             </div>

                              <div class="col-md-6">
                                <label class="control-label">Pilih Status Karyawan</label>
                                 <select class="form-control" name="status_karyawan" disabled>
                                  <option value=""> --- </option>
                                    <option value="1"> Bekerja </option>
                                    <option value="2"> Tidak Bekerja </option>
                                </select>
                                <div class="NOTIF_ERROR_status_karyawan"></div>
                             </div>
                            <div class="col-md-6">
                             <label for="issueinput5">Pilih Jabatan</label>
                             <select class="form-control" name="id_jabatan" disabled>
                                <option value=""> --- </option>
                                <?php foreach ($jabatan as $jabatan) { ?>
                                  <option value="<?php echo $jabatan->id_jabatan ?>"> <?php echo "$jabatan->nama_jabatan" ?> </option>
                                <?php }?>
                              </select>
                              <div class="NOTIF_ERROR_id_jabatan"></div>
                              </div>
                              <div class="col-md-12">
                                <label for="issueinput5">Jumlah Gaji / Bulan</label>
                                <input type="text" name="jml_gaji" class="form-control" id="tanpa-rupiah" required="">
                                   <div class="NOTIF_ERROR_jml_gaji"></div>
                              </div>

                              <div class="col-md-12">
                                <label class="control-label col-md-3">Keterangan</label>
                               <textarea name="keterangan" placeholder="Keterangan .." class="form-control" type="textarea"></textarea>
                              </div>

                                <div class="col-md-6">
                                  <label for="issueinput5">Updated Gaji</label>
                                    <input name="updated_gaji" placeholder="Nama Karyawn .." class="form-control" type="text" disabled>
                                     <div class="NOTIF_ERROR_nama_karyawan"></div>
                                </div>
                                <div class="col-md-6">
                                  <label for="issueinput5">Updated By</label>
                                    <input name="updated_gaji_by" placeholder="Nama Karyawn .." class="form-control" type="text" disabled>
                                     <div class="NOTIF_ERROR_nama_karyawan"></div>
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

<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js') ?>" type="text/javascript"></script>
<script type="text/javascript">

/* Tanpa Rupiah */
var tanpa_rupiah = document.getElementById('tanpa-rupiah');
tanpa_rupiah.addEventListener('keyup', function(e)
{
 tanpa_rupiah.value = formatRupiah(this.value);
});

/* Tanpa Rupiah 2*/
var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
tanpa_rupiah2.addEventListener('keyup', function(e)
{
 tanpa_rupiah2.value = formatRupiah(this.value);
});

/* Dengan Rupiah */
var dengan_rupiah = document.getElementById('dengan-rupiah');
dengan_rupiah.addEventListener('keyup', function(e)
{
 dengan_rupiah.value = formatRupiah(this.value);
});

/* Fungsi */
function formatRupiah(angka, prefix)
{
 var number_string = angka.replace(/[^,\d]/g, '').toString(),
   split = number_string.split(','),
   sisa  = split[0].length % 3,
   rupiah  = split[0].substr(0, sisa),
   ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

 if (ribuan) {
   separator = sisa ? '.' : '';
   rupiah += separator + ribuan.join('.');
 }

 rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
 return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

</script>

<!-- End Bootstrap modal -->
</body>
