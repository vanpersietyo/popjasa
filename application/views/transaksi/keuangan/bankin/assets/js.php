<script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>" type="text/javascript" ></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/tables/datatables/datatable-basic.js') ?>" type="text/javascript"></script>

<script type="text/javascript">

    var save_method; //for save method string
    var data_customer;

    $(document).ready(function() {
        table = $('#table').DataTable({
            "ajax": {
                "url": "<?php echo site_url('transaksi/keuangan/bankin/ajax_data')?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable" : false,
                    "targets"   : 0
                },{
                    "visible": false,
                    "targets": 6
                },
            ],
            "columns": [
                { mData: '0' },
                { mData: '1' },
                { mData: '2' },
                { mData: '3' },
                { mData: '4', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp. ' ),class:'text-right'},
                { mData: '5' },
                { mData: '6' },
                { mData: '7' },
            ],
            order : [[6,'asc']],
            drawCallback: function(e) {
                var c = this.api(),
                    r = c.rows({
                        page: "current"
                    }).nodes(),
                    i = null;
                c.column(6, {
                    page: "current"
                }).data().each(function(e, c) {
                    i !== e && ($(r).eq(c).before('<tr class="group"><td colspan="8">' + e + "</td></tr>"), i = e)
                })
            }
        });
    });

    function add_person(){
        save_method = 'add';
        $('[name="KD_BANK"]').val('').trigger('change');
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('.form-control').prop('disabled',false); // clear error string
        $('#btnSave').prop('disabled',false); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Transaksi Kas Masuk'); // Set Title to Bootstrap modal title
    }

    function edit_person(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('transaksi/keuangan/bankin/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="<?=M_bankin::ID_TRANS;?>"]').val(data.<?=M_bankin::ID_TRANS;?>);
                $('[name="<?=M_bankin::KD_BANK;?>"]').val(data.<?=M_bankin::KD_BANK;?>).trigger('change').prop('disabled',false);
                $('[name="<?=M_bankin::SLD_MASUK;?>"]').val(formatRupiah(data.<?=M_bankin::SLD_MASUK;?>)).prop('disabled',false);
                $('[name="<?=M_bankin::KETERANGAN;?>"]').val(data.<?=M_bankin::KETERANGAN;?>).prop('disabled',false);
                $('[name="<?=M_bankin::TGL_TRANS;?>"]').val(formatDate(data.<?=M_bankin::TGL_TRANS;?>,'2')).prop('disabled',false);
                $('#btnSave').prop('disabled',false);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Kas Masuk ' + data.<?=M_bankin::ID_TRANS;?>); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function lookup(id)
    {
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('transaksi/keuangan/bankin/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="<?=M_bankin::KD_BANK;?>"]').val(data.<?=M_bankin::KD_BANK;?>).trigger('change').prop('disabled',true);
                $('[name="<?=M_bankin::SLD_MASUK;?>"]').val(formatRupiah(data.<?=M_bankin::SLD_MASUK;?>)).prop('disabled',true);
                $('[name="<?=M_bankin::KETERANGAN;?>"]').val(data.<?=M_bankin::KETERANGAN;?>).prop('disabled',true);
                $('[name="<?=M_bankin::TGL_TRANS;?>"]').val(formatDate(data.<?=M_bankin::TGL_TRANS;?>,'2')).prop('disabled',true);
                $('#btnSave').prop('disabled',true);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Lihat Kas Masuk ' + data.<?=M_bankin::ID_TRANS;?>); // Set title to Bootstrap modal title
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
        $('.form-control').removeClass('border-danger');
        $('[class="NOTIF_ERROR_KD_BANK"]').html('');
        $('[class="NOTIF_ERROR_SLD_MASUK"]').html('');
    }

    function save()
    {
        clear_all_error();
        //$('#btnSave').text('saving...'); //change button text
        //  $('#btnSave').attr('disabled',true); //set button disable
        var url;

        if(save_method === 'add') {
            url = "<?php echo site_url('transaksi/keuangan/bankin/ajax_add')?>";
        } else {
            url = "<?php echo site_url('transaksi/keuangan/bankin/ajax_update')?>";
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
                url : "<?php echo site_url('transaksi/keuangan/bankin/ajax_delete')?>/"+id,
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
                url : "<?php echo site_url('transaksi/keuangan/bankin/ajax_konfirmasi')?>/"+id,
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

    function formatDate($date,$type = '1') {
        if ($date === '0000-00-00 00:00:00') {
            return '';
        }
        let date = new Date($date);
        let m = (date.getMonth() + 1).toString().padStart(2, '0');
        let d = date.getDate().toString().padStart(2, '0');
        let y = date.getFullYear();
        let h = date.getHours().toString().padStart(2, '0');
        let i = date.getMinutes().toString().padStart(2, '0');
        let s = date.getSeconds().toString().padStart(2, '0');

        if ($type === '1') {
            return d + "-" + m + "-" + y + " " + h + ":" + i + ":" + s;
        } else if ($type === '2') {
            return d + "-" + m + "-" + y;
        }else if ($type === '3') {
            return y + "-" + m + "-" + d;
        }else if ($type === '4') {
            return h + ":" + i;
        }
    }

</script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>" type="text/javascript"></script>
