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
          <h3 class="content-header-title">Create Project</h3>
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

    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h3 class="content-header-title">Data Customers</h3>
                  <br>
                <!-- Invoices List table -->
                           <div class="form-body">
                               <div class="form-group">
                                  <div class="row">

                                   <div class="col-md-4">
                                        <label>Nama Customer</label>
                                         <input name="nm_customer" value="<?php echo $customer->nm_customer;?>" placeholder="Nama Customer .." class="form-control" type="text" disabled>
                                   </div>
                                    <div class="col-md-4">
                                      <label>Telp Customer</label>
                                         <input name="tlp_customer" value="<?php echo $customer->tlp_customer;?>" placeholder="Telp Customer .." class="form-control" type="number" disabled>
                                     </div>

                                     <div class="col-md-4">
                                      <label>Hp Customer</label>
                                         <input name="telp2_customer" value="<?php echo $customer->telp2_customer;?>" placeholder="No Hp Customer .." class="form-control" type="number" disabled>
                                     </div>
                                   </div>

                                   <div class="row">
                                     <div class="col-md-4">
                                      <label>Email Customer</label>
                                         <input name="email_customer" value="<?php echo $customer->email_customer;?>" placeholder="Email Customer .." class="form-control" type="email" disabled>
                                     </div>

                                     <div class="col-md-4">
                                      <label>Kota Customer</label>
                                         <input name="kota_customer" value="<?php echo $customer->kota_customer;?>" placeholder="Kota Customer .." class="form-control" type="text" disabled>
                                     </div>
                                       <div class="col-md-4">
                                         <label>Note Contacted</label>
                                        <textarea name="keterangan" value="<?php echo $customer->keterangan;?>" placeholder="Keterangan .." maxlength="255" class="form-control" type="textarea" disabled></textarea>
                                       </div>
                                   </div>


                               </div>
                           </div>
                <!--/ Invoices table -->
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h3 class="content-header-title">Produk Yang Dibeli :</h3>
                <br>
                <!-- Invoices List table -->
                <div class="table-responsive">
                  <table id="table2" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th>Nama <?php echo $status?></th>
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
                  <div class="row">
                      <div class="col-6">
                          <a class="btn btn-info btn-block <?php echo $status ?>"
                             href="<?php echo site_url('transaksi/project/simpan_transaksi/' . $id_header) ?>"><i
                                      class="ft-check"></i> Confirmed</a>
                      </div>
                      <div class="col-6">
                          <a class="btn btn-danger btn-block " href="<?php echo site_url('transaksi/progress') ?>"><i
                                      class="ft-repeat"></i> Kembali</a>
                      </div>
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
var table2;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('transaksi/project/ajax_project_produk/'.$id_header)?>",
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
               .column( 2 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

           // Total over this page
           pageTotal = api
               .column( 2, { page: 'current'} )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );
          // var numFormat = $.fn.dataTable.render.number( '\,', '.', 2, '£' ).display;
          //  // Update footer
          //  $( api.column( 3 ).footer() ).html(
          //      //'<h3 class="text-bold-500"> Rp. '+pageTotal +''
          //      '<h3 class="text-bold-500 '+ numFormat(pageTotal)
          //  );
          var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
         $( api.column( 2 ).footer() ).html(
             '<h5 class="text-bold-500"> '+ numFormat(pageTotal)
         );
       },

        "columns": [
            { mData: '0' },
            { mData: '1', render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { mData: '2', render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
            { mData: '3'  },
        ],

    });
    var date = new Date();
    date.setDate(date.getDate());

    $('.datepicker').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
        startDate: date,
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


function add_person(id){
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('[name="id_layanan"]').val(id);
    $('[name="id_layanan2"]').val(id);
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
  table.ajax.reload(null,false);
  table2.ajax.reload(null,false); //reload datatable ajax
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
                //swal("Kerja Bagus !", "Data Berhasil Disimpan !", "success");
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
  function detail(ID){
     location.replace("<?php echo base_url('master/hrd/piutang_karyawan/history/')?>"+ID);
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
                      <input type="hidden" value="<?php echo $id_header?>" name="id_hdr_project"/>
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
                                  <label for="issueinput5">Produk Jasa</label>
                                    <input type="hidden" name="id_layanan2"/>
                                   <select class="form-control" name="id_layanan" disabled>
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
