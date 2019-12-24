<script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
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
            "url": "<?php echo site_url('master/hrd/trans_tunjangan/ajax_list')?>",
            "type": "POST"
        },

    });

    table2 = $('#table2').DataTable({

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('master/hrd/trans_tunjangan/ajax_list2')?>",
            "type": "POST"
        },

        "footerCallback": function ( row, data, start, end, display ) {
           var api = this.api(), data;

           // Remove the formatting to get integer data for summation
           var intVal = function ( i ) {
               return typeof i === 'string' ?
                   i.replace(/[\$,]/g, '')*1 :
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
           { mData: '1' },
           { mData: '2', render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { mData: '3' },
       ],

       rowGroup: {
           dataSrc: 'nm_karyawan'
       }

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
    $('[name="jml_bayar"]').removeClass('border-danger');
    $('[class="NOTIF_ERROR_jml_bayar"]').html('');
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('master/hrd/trans_tunjangan/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_trans"]').val(data.id_trans_tunjangan);
            $('[name="id"]').val(data.id_karyawan);
            $('[name="id_karyawan2"]').val(data.id_karyawan);
            $('[name="nama_karyawan"]').val(data.nama_karyawan);
            $('[name="jns_kelamin"]').val(data.jns_kelamin);
            $('[name="status_karyawan"]').val(data.status_karyawan);
            $('[name="id_jabatan"]').val(data.id_jabatan);
            $('[name="jml_gaji"]').val(data.jml_gaji);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Tambah Tunjangan Karyawan'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function delete_person(id)
{
    if(confirm('Anda Yakin Akan Menghapus Data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('master/hrd/trans_tunjangan/ajax_delete')?>/"+id,
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
                swal("Sorry !", "Data Gagal Dihapus !", "warning");
            }
        });

    }
}

function reload_table()
{
    table.ajax.reload(null,false);
    table2.ajax.reload(null,false); //reload datatable ajax
}



function save()
{
    clear_all_error();
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('master/hrd/trans_tunjangan/ajax_add')?>";
    } else {
        url = "<?php echo site_url('master/hrd/trans_tunjangan/ajax_update')?>";
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
     location.replace("<?php echo base_url('master/hrd/trans_tunjangan/history/')?>"+ID);
   }

  function konfirmasi(){
        location.replace("<?php echo base_url('master/hrd/trans_tunjangan/konfirmasi/'.$this->session->userdata('yangLogin'))?>");
      }

</script>
