<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">

<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">

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
        <div class="content-header row animated bounceInUp fast">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h2 class="mb-1"><b>Report Cashflow</b></h2>
                <h6 class="card-subtitle text-muted mb-0">Laporan Arus Kas</h6>
            </div>
        </div>

        <div class="content-body">
            <section class="row animated bounceInUp">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form id="form_cashflow" method="post" autocomplete="off" action="javascript:void(0)" onsubmit="cetak_cashflow()">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <h5 class="font-medium-3">Tanggal Awal</h5>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-info" type="button"><i class="la la-calendar"></i></button>
                                                        </div>
                                                        <input data-role="date" type='text' class="datepicker form-control" name="tgl_awal" />
                                                    </div>
                                                    <?php echo Conversion::error_notif_input('tgl_awal')?>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <h5 class="font-medium-3">Tanggal Akhir</h5>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-info" type="button"><i class="la la-calendar"></i></button>
                                                        </div>
                                                        <input data-role="date" type='text' class="datepicker2 form-control" name="tgl_akhir"  />
                                                    </div>
                                                    <?php echo Conversion::error_notif_input('tgl_akhir')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <h5 class="font-medium-3">Pembayaran</h5>
                                                <div class="input-group">
                                                    <select class="select2 form-control" name="bayar" style="width: 100%">
                                                        <option value="all"> Semua</option>
                                                        <?php
                                                        /** @var M_bank $bank */
                                                        /** @var M_bank $bank_dtl */
                                                        foreach ($bank as $bank_dtl) {?>
                                                            <option value="<?php echo $bank_dtl->kd_bank ?>"><?php echo $bank_dtl->nm_bank;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <?php echo Conversion::error_notif_input('bayar')?>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <h5 class="font-medium-3">Kantor Cabang</h5>
                                                <div class="input-group">
                                                    <select class="select2 form-control" name="cabang" style="width: 100%">
                                                        <?php /** @var bool $akses */
                                                        if($akses){?>
                                                            <option value="all">Semua</option>
                                                        <?php }?>

                                                        <?php
                                                        /** @var M_cabang $cabang */
                                                        /** @var M_cabang $cgb */
                                                        foreach ($cabang as $cgb) {?>
                                                            <option value="<?php echo $cgb->kd_cabang ?>"><?php echo $cgb->nm_cabang;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <?php echo Conversion::error_notif_input('bayar')?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"><i class="la la-print"></i> Cetak</button>
                                    </div>
                                </form>
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
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js')?>"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js')?>"></script>

<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js')?>"></script>
<!-- END PAGE LEVEL JS-->

<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function(){ $('.datepicker').focus(); }, 500);

        $('.select2').select2();
    });

    $('.datepicker').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true
    });

    $(".datepicker2").datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true
    });
    $(".datepicker2").datepicker('setDate', new Date());
    //fungsi untuk menampilkan alert error
    function error_swal(message = 'Silahkan Hubungi Administrator!') {
        swal("Gagal", message, "error");
    }
    //fungsi untuk menampilkan alert success
    function success_swal(message = 'Berhasil!') {
        swal("Berhasil", message, "success");
    }
    //fungsi untuk membersihakn semua error
    function clear_all_error(){
        $(".form-control").removeClass('border-danger');
        $('[id="error_messages"]').html('');
    }
    //
    function cetak_cashflow() {
        clear_all_error();
        var formData = new FormData($('#form_cashflow')[0]);
        $.ajax({
            url         : "<?php echo site_url('report/cashflow/validasi')?>",
            data  	    : formData,
            type        : "POST",
            dataType    : "JSON",
            contentType	: false,
            processData	: false,
            success     : function(data)
            {
                if(data.status){
                    window.open(data.message, "_blank");
                }else{
                    if(data.sw_alert){
                        error_swal(data.message);
                    }else{
                        for (let i = 0; i < data.inputerror.length; i++)
                        {
                            let inputerror = $('[name="'+data.inputerror[i]+'"]');
                            $('[class="NOTIF_ERROR_'+data.inputerror[i]+'"]').html(data.notiferror[i]);
                            inputerror.addClass('border-danger');
                        }
                        $('[name="'+data.inputerror[0]+'"]').focus();
                    }
                }
            },
            error       : function (jqXHR, textStatus, errorThrown)
            {
                error_swal();
            }
        });
    }

</script>