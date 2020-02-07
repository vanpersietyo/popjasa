
  <script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
  <script src="<?php echo base_url('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/scripts/tables/datatables/datatable-basic.js') ?>" type="text/javascript"></script>

<script type="text/javascript">

var save_method; //for save method string
var data_customer;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({
        // Load data for the table's content from an Ajax source

        "ajax": {
            "url": "<?php echo site_url('transaksi/keuangan/bankout/ajax_data')?>",
            "type": "POST"
        },
    });
});




function add_person(){
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Master Bank Baru'); // Set Title to Bootstrap modal title
}


function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('transaksi/keuangan/bankout/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.ID_TRANS);
            $('[name="KD_BANK"]').val(data.KD_BANK);
            $('[name="SLD_KELUAR"]').val(data.SLD_KELUAR);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Supplier'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function lookup(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('transaksi/keuangan/bankout/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="id"]').val(data.ID_TRANS);
          $('[name="KD_BANK"]').val(data.KD_BANK);
          $('[name="SLD_KELUAR"]').val(data.SLD_KELUAR);
          $('#modal_lookup').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('View Data'); // Set title to Bootstrap modal title
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

function clear_all_error()
{
    $('[name="KD_BANK"]').removeClass('border-danger');
    $('[class="NOTIF_ERROR_KD_BANK"]').html('');
    $('[name="NM_BANK"]').removeClass('border-danger');
    $('[class="NOTIF_ERROR_SLD_KELUAR"]').html('');
    $('[name="TGL_BUAT"]').removeClass('border-danger');
    $('[class="NOTIF_ERROR_TGL_BUAT"]').html('');
    $('[name="KETERANGAN"]').removeClass('border-danger');
    $('[class="NOTIF_ERROR_KETERANGAN"]').html('');
}

function save()
{
    clear_all_error();
    //$('#btnSave').text('saving...'); //change button text
  //  $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('transaksi/keuangan/bankout/ajax_add')?>";
    } else {
        url = "<?php echo site_url('transaksi/keuangan/bankout/ajax_update')?>";
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
                swal("Sukses !", "Data Berhasil Disimpan !", "success");
                  reload_table();
            }
            else
            {
                for (let i = 0; i < data.inputerror.length; i++)
                {
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
            swal("Eror !", "Data Gagal Disimpan !", "warning");
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function delete_person(id)
{
    if(confirm('Anda Yakin Akan Menghapus Data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('transaksi/keuangan/bankout/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                swal("Sukses !", "Data Berhasil Dihapus !", "success");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Eror !", "Data Gagal Dihapus !", "warning");
            }
        });

    }
}


function konfirmasi(id)
{
    if(confirm('Anda Yakin Akan Konfirmasi Data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('transaksi/keuangan/bankout/ajax_konfirmasi')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                swal("Sukses !", "Data Berhasil Dikonfirmasi !", "success");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Eror !", "Data Gagal Dikonfirmasi !", "warning");
            }
        });

    }
}

function pemasukan() {
  location.replace("<?php echo site_url('transaksi/keuangan/bankout/detail_total_pemasukan')?>");
}

function pengeluaran() {
  location.replace("<?php echo site_url('transaksi/keuangan/bankout/detail_total_pengeluaran')?>");
}

function bankout() {
  location.replace("<?php echo site_url('transaksi/keuangan/bankout')?>");
}


</script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>" type="text/javascript"></script>
