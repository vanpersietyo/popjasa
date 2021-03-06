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
                "url": "<?php echo site_url('master/bank/ajax_data')?>",
                "type": "POST"
            },
        });

    });

    function add_person()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Account Bank Baru'); // Set Title to Bootstrap modal title

    }


    function edit_person(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string


        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('master/bank/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.kd_bank);
                $('[name="kd_bank"]').val(data.kd_bank);
                $('[name="nm_bank"]').val(data.nm_bank);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Account Bank'); // Set title to Bootstrap modal title
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
            url : "<?php echo site_url('master/bank/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.kd_bank);
                $('[name="kd_bank"]').val(data.kd_bank);
                $('[name="nm_bank"]').val(data.nm_bank);
                $('#modal_lookup').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('View Account Bank'); // Set title to Bootstrap modal title
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
        $('[name="kd_bank"]').removeClass('border-danger');
        $('[class="NOTIF_ERROR_kd_bank"]').html('');
        $('[name="nm_bank"]').removeClass('border-danger');
        $('[class="NOTIF_ERROR_nm_bank"]').html('');

    }

    function save()
    {
        clear_all_error();

        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('master/bank/ajax_add')?>";
        } else {
            url = "<?php echo site_url('master/bank/ajax_update')?>";
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
                url : "<?php echo site_url('master/bank/ajax_delete')?>/"+id,
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
</script>