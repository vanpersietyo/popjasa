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
  font-size: 17px;
  font-weight: 500;
  font-style: italic;
}

#table_filter
{
    display:none;
}
</style>
<!-- END Custom CSS-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="add_person()"> <a> <i class="la la-plus"></i> Tambah Rekening Biaya Baru </a></button>
        </div>
      </div>

      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <button class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="reload_table()"><i class="la la-refresh"></i> Muat Ulang</button>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <input id="search-inp" type="text" class="font-weight-italic search form-control form-control-lg round box-shadow mb-1" placeholder="type anything what you want ☺"/>
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
                  <table id="table" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th width="10%">ID</th>
                        <th width="10%">ID2</th>
                        <th width="40%">Nama Rek Biaya</th>
                        <th width="10%">Input Date</th>
                        <th width="10%">InputBy</th>
                        <th width="20%">  </th>
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
<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js') ?>" type="text/javascript"></script>

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

      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "paging": true,
      "bLengthChange": false,
      "pageLength": 20,
      "bFilter": true,
      "searching": true,
      "bInfo": false,
      "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('master/rekeningbiaya/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ 0 ], //first column
                "orderable": false, //set not orderable
            },
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },

        ],

    });

    $('#search-inp').on('keyup',function(){
      table.search($(this).val()).draw() ;
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
    $('.modal-title').text('Tambah Kategori'); // Set Title to Bootstrap modal title

}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('master/rekeningbiaya/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_rekbiaya"]').val(data.id_rekbiaya);
            $('[name="id_rekbiayaa"]').val(data.id_rekbiaya);
            $('[name="id_jns_rekbiaya"]').val(data.id_jns_rekbiaya);
            $('[name="nm_rekbiaya"]').val(data.nm_rekbiaya);
            $('[name="keterangan"]').val(data.keterangan);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title
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
        url = "<?php echo site_url('master/rekeningbiaya/ajax_add')?>";
    } else {
        url = "<?php echo site_url('master/rekeningbiaya/ajax_update')?>";
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
            url : "<?php echo site_url('master/rekeningbiaya/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                swal("Kerja Bagus !", "Data Berhasil Dihapus !", "success");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Ya Ampun Maaf !", "Data Gagal Dihapus !", "warning");
            }
        });

    }
}

function bulk_delete()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0)
    {
        if(confirm('Kamu Yakin Mau Hapus Data '+list_id.length+' ini ?'))
        {
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "<?php echo site_url('master/rekeningbiaya/ajax_bulk_delete')?>",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        reload_table();
                        swal("Kerja Bagus !", "Data Berhasil Dihapus !", "warning");
                    }
                    else
                    {
                        swal("Ya Ampun Maaf !", "Data Gagal Dihapus !", "danger");
                    }

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    swal("Ya Ampun Maaf !", "Data Gagal Dihapus !", "warning");
                }
            });
        }
    }
    else
    {
        alert('no data selected');
    }
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
          <h4 class="modal-title text-bold-500 white"><i class="la la-pencil-square"></i> Tambah Kategori Baru</h4>
          <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" id="form" class="form-horizontal">
                     <div class="form-body">
                       <div class="row">
                         <div class="form-group col-6 mb-2">
                            <label for="issueinput5">ID</label>
                            <div class='input-group'>
                              <input type='hidden' class="form-control form-control-lg input-lg" name="id_rekbiaya" />
                               <input type='text' class="form-control form-control-lg input-lg" name="id_rekbiayaa" min="1" max="99" readonly required="" />
                            </div>
                          </div>
                          <div class="form-group col-6 mb-2">
                            <label for="projectinput2">Jenis Rekening Biaya</label>
                              <select class="select2 select2-size-lg form-control block" id="responsive_single" name="id_jns_rekbiaya" style="width: 100%" required>
                                <option value=""> --- </option>
                                <?php foreach ($nm_jns_rekbiaya as $jr) { ?>
                                  <option value="<?php echo $jr->id_jns_rekbiaya ?>"> <?php echo "$jr->id_jns_rekbiaya - $jr->nm_jns_rekbiaya" ?> </option>
                                <?php }?>
                              </select>
                           </div>
                          <div class="col-12 mb-2">
                             <label for="issueinput5">Name</label>
                             <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"><i class="fas fa-user-tie"></i></span>
                              </div>
                              <input type="text" class="form-control form-control-lg input-lg position-inside-maxlength"
                               id="maxlength-position-inside" maxlength="30" name="nm_rekbiaya" required="" placeholder="" aria-describedby="basic-addon3">
                            </div>
                           </div>

                       </div>

                       <div class="row">
                         <div class="form-group col-12 mb-2">
                           <label for="issueinput8">Note</label>
                           <textarea name="keterangan" placeholder="Description" class="form-control form-control-lg input-lg position-inside-maxlength"
                            id="maxlength-position-inside" maxlength="250"
                            rows="5" required></textarea>
                           <span class="help-block"></span>
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
<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/extended/form-maxlength.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
/* Tanpa Rupiah */
var tanpa_rupiah = document.getElementById('tanpa-rupiah');
tanpa_rupiah.addEventListener('keyup', function(e)
{
 tanpa_rupiah.value = formatRupiah(this.value);
});
</script>

<!-- End Bootstrap modal -->
</body>
