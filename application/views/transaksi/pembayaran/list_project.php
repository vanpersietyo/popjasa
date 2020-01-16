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
<style media="screen">
label {
  display: inline-block;
  margin-bottom: .5rem;
  font-size: 18px;
  font-weight: 500;
}
</style>
<!-- END Custom CSS-->
<div class="app-content content">
  <div class="content-wrapper">


    <div class="row">
      <!-- <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up" > <a> <i class="la la-dollar"></i> PEMBAYARAN CUSTOMER </a></button>
        </div>
      </div> -->

      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up"> <a> <i class="la la-group"></i> <?php echo $customer->nm_customer; ?> </a></button>
        </div>
      </div>

      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <a class="btn mb-1 btn-info btn-lg btn-block pull-up" href="<?php echo site_url('transaksi/pembayaran')?>"><i class="la la-backward"></i> Kembali</a>
        </div>
      </div>

    </div>

    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <!-- Invoices List table -->
                <div class="table-responsive">
                  <table id="table" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th width="5%"></th>
                        <th>ID Project</th>
                        <th>Nama Produk</th>
                        <th>Standart Harga</th>
                        <th>Harga Deals</th>
                        <th>Jumlah Bayar</th>
                        <th>Kurang Bayar</th>
                    

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
            "url": "<?php echo site_url('transaksi/pembayaran/ajax_project/'.$id_customer)?>",
            "type": "POST"
        },
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]

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
    $('.modal-title').text('Tambah Project Baru'); // Set Title to Bootstrap modal title

}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('transaksi/project/ajax_edit_project')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id_project);
            $('[name="id_project"]').val(data.id_project);
            $('[name="id_customer"]').val(data.id_customer);
            $('[name="id_layanan"]').val(data.id_layanan);
            $('[name="harga_jual"]').val(data.harga_jual);
            $('[name="keterangan"]').val(data.keterangan);
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
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('transaksi/project/ajax_add_project')?>";
    } else {
        url = "<?php echo site_url('transaksi/project/ajax_update_project')?>";
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
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Ya Ampun Maaf !", "Data Gagal Disimpan !", "warning");
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
            url : "<?php echo site_url('transaksi/project/ajax_delete_project')?>/"+id,
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


</script>
<script type="text/javascript">
function bayar(ID){
     location.replace("<?php echo base_url('transaksi/pembayaran/bayar/')?>"+ID);
     //window.open("<?php echo base_url('hr/sppd/cetak/')?>"+ID);
   }

 function history(ID){
      location.replace("<?php echo base_url('transaksi/pembayaran/history/')?>"+ID);
      //window.open("<?php echo base_url('hr/sppd/cetak/')?>"+ID);
    }

</script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>" type="text/javascript"></script>


<!-- Bootstrap modal insert-->
<div class="modal animated fade text-left" id="modal_form" role="dialog" aria-labelledby="myModalLabel17"
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
                             <label class="control-label col-md-3">Nama Customer</label>
                             <div class="col-md-12">
                                 <input name="nm_customer" placeholder="Nama Customer .." class="form-control" type="text" value="<?php echo $customer->nm_customer?>" disabled>
                                 <input type="hidden" name="id"/>
                                 <input type="hidden" name="id_customer" value="<?php echo $id_customer ?>"/>
                                 <span class="help-block"></span>
                             </div>
                            </div>

                             <div class="row">

                              <div class="col-md-12">
                                  <label for="issueinput5">Pilih Produk Jasa</label>
                                   <select class="form-control" name="id_layanan" required>
                                      <option value=""> --- </option>
                                     <?php foreach ($produk as $key => $value) { ?>
                                       <option value="<?php echo $value->id_layanan?>"><?php echo $value->nama_layanan ?> </option>
                                     <?php }?>
                                  </select>
                               </div>

                               <div class="col-12 mb-2">
                                  <label for="issueinput5">Harga Deals</label>
                                  <div class="input-group">
                                   <div class="input-group-prepend">
                                     <span class="input-group-text" id="basic-addon3"><i class="la la-money"></i></span>
                                   </div>
                                   <input type="text" id="tanpa-rupiah" class="form-control form-control-lg input-lg" name="harga_jual" placeholder="" aria-describedby="basic-addon3">
                                 </div>
                                </div>
                             </div>

                             <div class="row">
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
