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
      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="add_person()"> <a> <i class="la la-plus"></i> Tambah Rincian Pengeluaran </a></button>
        </div>
      </div>

      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <button class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="reload_table()"><i class="la la-refresh"></i> Muat Ulang</button>
        </div>
      </div>

       <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <a class="btn mb-1 btn-info btn-lg btn-block pull-up" href="<?php echo site_url('transaksi/pengeluaran')?>"><i class="la la-backward"></i> Kembali</a>
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
                        <th width="10%">Nama Rek. Biaya</th>
                        <th width="10%">Jml Pengeluaran</th>
                        <th width="25%">keterangan</th>
                        <th width="10%">Acc Bank</th>
                        <th width="10%">Tgl Dibuat</th>
                        <th width="10%">InputBy</th>
                        <th width="5%"></th>
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
        "ajax": {
            "url": "<?php echo site_url('transaksi/pengeluaran/ajax_list_detail/'.$id)?>",
            "type": "POST"
        },
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
    $('.modal-title').text('Tambah Pengeluaran'); // Set Title to Bootstrap modal title

}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('transaksi/Produk/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
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
        url = "<?php echo site_url('transaksi/pengeluaran/ajax_add_detail')?>";
    } else {
        url = "<?php echo site_url('transaksi/Produk/ajax_update')?>";
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
    if(confirm('Apakah anda yakin ingin menghapus data ini ?'))
    {
        // ajax delete data to database
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('transaksi/pengeluaran/ajax_delete')?>/"+id,
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

function delete_detail(id)
{
    if(confirm('Apakah anda yakin ingin menghapus data ini ?'))
    {
        // ajax delete data to database
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('transaksi/pengeluaran/ajax_delete_detail')?>/"+id,
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

function detail(id)
{
  location.replace("<?php echo site_url('transaksi/pengeluaran/detail')?>/"+id);
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
                     <input type="hidden" value="" name="itemid"/>
                     <div class="form-body">
                       <div class="row">
                         <div class="col-6 mb-2">
                            <label for="issueinput5">ID PENGELUARAN</label>
                            <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="basic-addon3"><i class="fas fa-key"></i></span>
                             </div>
                             <input type="hidden" class="form-control form-control-lg input-lg" value="<?php echo $headers->id_trs_rekbiaya  ?>" placeholder="" name="id_trs_rekbiaya" aria-describedby="basic-addon3" disabled>
                             <input type="text" class="form-control form-control-lg input-lg" value="<?php echo $headers->id_trs_rekbiaya ?>" placeholder="" aria-describedby="basic-addon3" disabled>
                           </div>
                          </div>
                          <div class="col-6 mb-2">
                             <label for="issueinput5">Periode</label>
                             <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control form-control-lg input-lg" value="<?php echo $headers->periode ?>" placeholder="" aria-describedby="basic-addon3" disabled>
                            </div>
                           </div>
                          <div class="col-12 mb-2">
                               <label for="projectinput2">Nama Pengeluaran</label>
                                 <select class="select select-size-lg form-control block" id="responsive_single" name="id_rekbiaya" style="width: 100%" required>
                                   <option value="" class="disabled"> --- </option>
                                      <?php foreach ($rekbiaya as $key => $value) { ?>
                                        <option value="<?php echo $value->id_rekbiaya?>"> <?php echo $value->nm_rekbiaya ?></option>
                                      <?php }?>
                                 </select>
                           </div>
                           <div class="col-12 mb-2">
                              <label for="issueinput5">Jumlah Pengeluaran</label>
                              <div class="input-group">
                               <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3"><i class="la la-money"></i></span>
                               </div>
                               <input type="hidden" value="<?php echo $headers->id_trs_rekbiaya;?>" name="id_header" placeholder="" aria-describedby="basic-addon3">
                               <input type="text" id="tanpa-rupiah" class="form-control form-control-lg input-lg" name="harga" placeholder="" aria-describedby="basic-addon3">
                             </div>
                            </div>

                            <div class="col-md-12">
                             <label for="issueinput5">Pilih Akun Bank</label>
                             <select class="form-control" name="kd_bank" >
                                <option value=""> --- </option>
                                <?php foreach ($bank as $bank) { ?>
                                  <option value="<?php echo $bank->kd_bank ?>"> <?php echo "$bank->nm_bank" ?> </option>
                                <?php }?>
                              </select>
                              <div class="NOTIF_ERROR_kd_bank"></div>
                              </div>

                            <div class="col-12 mb-2">
                               <label for="issueinput5">Keterangan</label>
                               <div class="input-group">

                                <textarea name="keterangan" placeholder="Keterangan .." class="form-control form-control-lg input-lg position-inside-maxlength"
                                 id="maxlength-position-inside" maxlength="250"
                                 rows="5" required></textarea>
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
