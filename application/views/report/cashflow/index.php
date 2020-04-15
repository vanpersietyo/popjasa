<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">

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
                                <ul class="nav nav-tabs nav-linetriangle no-hover-bg nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tanggal-tab" data-toggle="tab" href="#tanggal"
                                           aria-controls="tanggal" aria-expanded="true"><b>RANGE TANGGAL</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="harian-tab" data-toggle="tab" href="#harian"
                                           aria-controls="harian" aria-expanded="false"><b>HARIAN</b></a>
                                    </li>
                                </ul>

                                <div class="tab-content px-1 pt-1">
                                    <div class="tab-pane active" id="tanggal" role="tabpanel" aria-labelledby="tanggal-tab"
                                         aria-expanded="false">
                                        <form id="form_cashflow" method="post" autocomplete="off"
                                              action="javascript:void(0)" onsubmit="cetak_cashflow()">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-6 mb-2">
                                                        <div class="form-group">
                                                            <h5 class="font-medium-3">Tanggal Awal</h5>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-info" type="button"><i
                                                                            class="la la-calendar"></i></button>
                                                                </div>
                                                                <input data-role="date" type='text'
                                                                       class="datepicker form-control" name="tgl_awal"/>
                                                            </div>
                                                            <?php echo Conversion::error_notif_input('tgl_awal') ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <div class="form-group">
                                                            <h5 class="font-medium-3">Tanggal Akhir</h5>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-info" type="button"><i
                                                                            class="la la-calendar"></i></button>
                                                                </div>
                                                                <input data-role="date" type='text'
                                                                       class="datepicker2 form-control"
                                                                       name="tgl_akhir"/>
                                                            </div>
                                                            <?php echo Conversion::error_notif_input('tgl_akhir') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 mb-2">
                                                        <h5 class="font-medium-3">Pembayaran</h5>
                                                        <div class="input-group">
                                                            <select class="select2 form-control" name="bayar"
                                                                    style="width: 100%">
                                                                <option value="all"> Semua</option>
                                                                <?php
                                                                /** @var M_bank $bank */
                                                                /** @var M_bank $bank_dtl */
                                                                foreach ($bank as $bank_dtl) { ?>
                                                                    <option value="<?php echo $bank_dtl->kd_bank ?>"><?php echo $bank_dtl->nm_bank; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <?php echo Conversion::error_notif_input('bayar') ?>
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <h5 class="font-medium-3">Kantor Cabang</h5>
                                                                <div class="input-group">
                                                                    <select class="select2 form-control" name="cabang"
                                                                            style="width: 100%">
                                                                        <?php /** @var bool $akses */
                                                                        if ($akses) {
                                                                            ?>
                                                                            <option value="all">Semua</option>
                                                                        <?php } ?>

                                                                        <?php
                                                                        /** @var M_cabang $cabang */
                                                                        /** @var M_cabang $cgb */
                                                                        foreach ($cabang as $cgb) { ?>
                                                                            <option value="<?php echo $cgb->kd_cabang ?>"><?php echo $cgb->nm_cabang; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <?php echo Conversion::error_notif_input('bayar') ?>
                                                            </div>
                                                            <div class="col-4">
                                                                <h5 class="font-medium-3">Cutoff Saldo</h5>
                                                                <input name="cutoff_tanggal" class="checkbox form-control" type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit"
                                                        class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up">
                                                    <i class="la la-print"></i> Cetak
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="harian" role="tabpanel" aria-labelledby="harian-tab"
                                         aria-expanded="false">
                                        <form id="form_cashflow_harian" method="post" autocomplete="off"
                                              action="javascript:void(0)" onsubmit="cetak_cashflow_harian()">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-4 mb-2">
                                                        <div class="form-group">
                                                            <h5 class="font-medium-3">Tanggal</h5>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-info" type="button"><i
                                                                                class="la la-calendar"></i></button>
                                                                </div>
                                                                <input data-role="date" type='text'
                                                                       class="form-control" id="tgl_harian"
                                                                       name="tgl_harian"/>
                                                            </div>
                                                            <?php echo Conversion::error_notif_input('tgl_harian') ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 mb-2">
                                                        <h5 class="font-medium-3">Pembayaran</h5>
                                                        <div class="input-group">
                                                            <select class="select2 form-control" name="bayar"
                                                                    style="width: 100%">
                                                                <option value="all"> Semua</option>
                                                                <?php
                                                                /** @var M_bank $bank */
                                                                /** @var M_bank $bank_dtl */
                                                                foreach ($bank as $bank_dtl) { ?>
                                                                    <option value="<?php echo $bank_dtl->kd_bank ?>"><?php echo $bank_dtl->nm_bank; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <?php echo Conversion::error_notif_input('bayar') ?>
                                                    </div>
                                                    <div class="col-3 mb-2">
                                                        <h5 class="font-medium-3">Kantor Cabang</h5>
                                                        <div class="input-group">
                                                            <select class="select2 form-control" name="cabang"
                                                                    style="width: 100%">
                                                                <?php /** @var bool $akses */
                                                                if ($akses) {
                                                                    ?>
                                                                    <option value="all">Semua</option>
                                                                <?php } ?>

                                                                <?php
                                                                /** @var M_cabang $cabang */
                                                                /** @var M_cabang $cgb */
                                                                foreach ($cabang as $cgb) { ?>
                                                                    <option value="<?php echo $cgb->kd_cabang ?>"><?php echo $cgb->nm_cabang; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <?php echo Conversion::error_notif_input('bayar') ?>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <h5 class="font-medium-3">Cutoff Saldo</h5>
                                                        <input name="cutoff_tanggal" class="checkbox form-control" type="checkbox" checked>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit"
                                                        class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up">
                                                    <i class="la la-print"></i> Cetak
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/app-assets/vendors/js/forms/icheck/icheck.min.js') ?>"></script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.datepicker').focus();
        }, 500);
        $('.select2').select2();
    });

    var datepicker = $('.datepicker');
    datepicker.datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true
    });
    datepicker.datepicker('setDate', new Date());

    var datepicker2 = $(".datepicker2");
    datepicker2.datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true
    });
    datepicker2.datepicker('setDate', new Date());

    var tgl_harian = $("#tgl_harian");
    tgl_harian.datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true
    });
    tgl_harian.datepicker('setDate', new Date());

    $('.checkbox').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        increaseArea: '40%'
    });

    //fungsi untuk menampilkan alert error
    function error_swal(message = 'Silahkan Hubungi Administrator!') {
        swal("Gagal", message, "error");
    }

    //fungsi untuk menampilkan alert success
    function success_swal(message = 'Berhasil!') {
        swal("Berhasil", message, "success");
    }

    //fungsi untuk membersihakn semua error
    function clear_all_error() {
        $(".form-control").removeClass('border-danger');
        $('[id="error_messages"]').html('');
    }

    //fungsi cetak cashflow
    function cetak_cashflow() {
        clear_all_error();
        var formData = new FormData($('#form_cashflow')[0]);
        $.ajax({
            url: "<?php echo site_url('report/cashflow/validasi')?>",
            data: formData,
            type: "POST",
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status) {
                    $.post("<?php echo site_url('report/cashflow/cetak_cashflow')?>",data.params, function (data) {
                        var w = window.open('about:blank');
                        w.document.open();
                        w.document.write(data);
                        w.document.close();
                    });
                } else {
                    if (data.sw_alert) {
                        error_swal(data.message);
                    } else {
                        for (let i = 0; i < data.inputerror.length; i++) {
                            let inputerror = $('[name="' + data.inputerror[i] + '"]');
                            $('[class="NOTIF_ERROR_' + data.inputerror[i] + '"]').html(data.notiferror[i]);
                            inputerror.addClass('border-danger');
                        }
                        $('[name="' + data.inputerror[0] + '"]').focus();
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                error_swal();
            }
        });
    }

    //fungsi cetak cashflow
    function cetak_cashflow_harian() {
        clear_all_error();
        var formData = new FormData($('#form_cashflow_harian')[0]);
        $.ajax({
            url: "<?php echo site_url('report/cashflow/validasi_harian')?>",
            data: formData,
            type: "POST",
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status) {
                    $.post("<?php echo site_url('report/cashflow/cetak_cashflow')?>",data.params, function (data) {
                        var w = window.open('about:blank');
                        w.document.open();
                        w.document.write(data);
                        w.document.close();
                    });
                } else {
                    if (data.sw_alert) {
                        error_swal(data.message);
                    } else {
                        for (let i = 0; i < data.inputerror.length; i++) {
                            let inputerror = $('[name="' + data.inputerror[i] + '"]');
                            $('[class="NOTIF_ERROR_' + data.inputerror[i] + '"]').html(data.notiferror[i]);
                            inputerror.addClass('border-danger');
                        }
                        $('[name="' + data.inputerror[0] + '"]').focus();
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                error_swal();
            }
        });
    }
</script>