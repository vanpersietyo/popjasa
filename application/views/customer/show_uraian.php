<?php
$this->load->view('./template/head');
?>
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">

    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">

    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/plugins/forms/wizard.css">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">


    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css') ?>">
    <!-- END Custom CSS-->

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <h5 class="brand-text" style="text-align: center">POPJASA TRACKING ORDER</h5>
                </a>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="https://popjasa.id/"><i
                                    class="ficon ft-arrow-left"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"></h3>
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

        <div class="table-responsive">
            <table  class="table table-striped table-bordered sourced-data">
                <tr><td>Nm Perusahaan</td><td><?php echo $nm_perusahaan; ?></td></tr>
                <tr><td>Modal</td><td><?php echo $modal; ?></td></tr>
                <tr><td>Presentase Shm</td><td><?php echo $presentase_shm; ?></td></tr>
                <tr><td>Hrg Saham</td><td><?php echo $hrg_saham; ?></td></tr>
                <tr><td>No Telp</td><td><?php echo $No_Telp; ?></td></tr>
                <tr><td>No Fax</td><td><?php echo $No_Fax; ?></td></tr>
                <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
                <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
                <tr><td>Kelurahan</td><td><?php echo $kelurahan; ?></td></tr>
                <tr><td>Kabupaten</td><td><?php echo $kabupaten; ?></td></tr>
                <tr><td>Izin Persetujuan</td><td><?php echo $izin_persetujuan; ?></td></tr>
                <tr><td>Signature Commander</td><td><?php echo $signature_commander; ?></td></tr>
                <tr><td>Penerima</td><td><?php echo $penerima; ?></td></tr>
                <tr><td></td><td> <form action="<?php echo site_url('customers/track/order') ?>" method="post">
                            <input type="hidden" name="id_inv" value="<?= $id?>">
                            <button type="submit" class="btn btn-dark btn-md"><i class="ft-arrow-left"></i> Kembali
                            </button>
                        </form></td></tr>
            </table>
        </div>
    </div>
<?php
$this->load->view('./template/foot');
?>