<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 03/12/2019
 * Time: 15:08
 */
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets') ?>/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/login18/vendor/bootstrap/css/bootstrap.min.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css') ?>">

    <script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>

    <!-- END Custom CSS-->
    <div class="app-content content">
        <div class="content-wrapper">