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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">


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
    <div class="content-header row">
      <br>
    </div>


    <section class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="row" id="app">
          <div class="col-xl-4 col-lg-4 col-12">
            <div class="card bg-teal bg-lighten-1">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-white text-left">
                      <h3 class="text-white text-bold-500">1.000 Order</h3>
                      <span>Total Order</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-basket-loaded text-white font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-12">
            <div class="card bg-teal bg-lighten-2">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-white text-left">
                      <h3 class="text-white text-bold-500">500</h3>
                      <span>Total Jasa Belum Selesai</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-user text-white font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-12">
            <div class="card bg-teal bg-lighten-3">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-white text-left">
                      <h3 class="text-white text-bold-500">500</h3>
                      <span>Total Jasa Sudah Selesai</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-user text-white font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="charts-section">
      <div class="row">
        <div class="col-xl-6 col-lg-12">
          <div class="card text-blue bg-teal bg-darken-1">
            <div class="card-content">
              <div class="position-relative">
                <div class="chart-title position-absolute mt-2 ml-2 white">
                  <h3 class="display-4 text-white">Rp 4.500.000</h3>
                  <span>Omzet Today</span>
                </div>
                <canvas id="dashboard1" class="height-350 block"></canvas>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="col-xl-12 col-12">
            <div class="card bg-teal bg-darken-2">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-white text-left">
                      <h3 class="text-white">Rp <?php echo number_format($target->jumlah_target ) ?></h3>
                      <span>Target Bulan Ini</span>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-money text-white font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-12">
            <div class="card bg-teal bg-darken-3">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-white text-left">
                      <h3 class="text-white">Rp 2.000.000</h3>
                      <span>Pengeluaran Bulan ini </span>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-money text-white font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-12">
            <div class="card bg-teal bg-darken-4">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-white text-left">
                      <h3 class="text-white">Rp 0</h3>
                      <span>Profit Bulan ini</span>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-money text-white font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div id="recent-transactions" class="col-xl-6 col-lg-12">
          <div class="card">
            <div class="card-header bg-teal bg-accent-4">
              <h4 class="card-title" style="color: white;">TOP 5 Produk Jasa</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">

              </div>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table id="recent-orders" class="table table-hover table-xl mb-0">
                  <thead>
                    <tr>
                      <th class="border-top-0">Nama Produk</th>
                      <th class="border-top-0">Total Terjual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Jasa Pengurusan PT</p>
                      </td>
                      <td class="text-truncate">
                        <h3>20</h3>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Jasa Pengurusan CV</p>
                      </td>
                      <td class="text-truncate">
                        <h3>15</h3>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Jasa Pengurusan UD</p>
                      </td>
                      <td class="text-truncate">
                        <h3>14</h3>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Jasa Pengurusan NPWP</p>
                      </td>
                      <td class="text-truncate">
                        <h3>10</h3>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

         <div id="recent-transactions" class="col-xl-6 col-lg-12">
          <div class="card">
            <div class="card-header bg-teal bg-accent-3">
              <h4 class="card-title" style="color: white;">TOP 5 Produk Jasa (Amount)</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">

              </div>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table id="recent-orders" class="table table-hover table-xl mb-0">
                  <thead>
                    <tr>
                      <th class="border-top-0">Nama Produk</th>
                      <th class="border-top-0">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Jasa Pengurusan PT</p>
                      </td>
                      <td class="text-truncate">
                        <h4>Rp. 10.000.000.000</h4>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Jasa Pengurusan CV</p>
                      </td>
                      <td class="text-truncate">
                        <h4>Rp. 5.000.000.000</h4>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Jasa Pengurusan UD</p>
                      </td>
                      <td class="text-truncate">
                        <h4>Rp. 4.000.000.000</h4>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Jasa Pengurusan NPWP</p>
                      </td>
                      <td class="text-truncate">
                        <h4>Rp. 2.000.000.000</h4>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div id="recent-transactions" class="col-xl-6 col-lg-12">
          <div class="card">
            <div class="card-header bg-teal bg-accent-4">
              <h4 class="card-title" style="color: white;">TOP 5 Customer (qty)</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">

              </div>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table id="recent-orders" class="table table-hover table-xl mb-0">
                  <thead>
                    <tr>
                      <th class="border-top-0">Nama Customer</th>
                      <th class="border-top-0">Total Terjual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Rivaldy Setiawan</p>
                      </td>
                      <td class="text-truncate">
                        <h3>20</h3>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Adhitya Dwi Prasetyo</p>
                      </td>
                      <td class="text-truncate">
                        <h3>15</h3>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Izam </p>
                      </td>
                      <td class="text-truncate">
                        <h3>14</h3>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Muhammad Aljufri </p>
                      </td>
                      <td class="text-truncate">
                        <h3>10</h3>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div id="recent-transactions" class="col-xl-6 col-lg-12">
          <div class="card">
            <div class="card-header bg-teal bg-accent-3">
              <h4 class="card-title" style="color: white;">TOP 5 Customer (Amount)</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">

              </div>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table id="recent-orders" class="table table-hover table-xl mb-0">
                  <thead>
                    <tr>
                      <th class="border-top-0">Nama Customer</th>
                      <th class="border-top-0">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Rivaldy Setiawan</p>
                      </td>
                      <td class="text-truncate">
                        <h5>Rp. 2.000.000.000</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Adhitya Dwi Prasetyo</p>
                      </td>
                      <td class="text-truncate">
                        <h5>Rp. 1.000.000.000</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Izam</p>
                      </td>
                      <td class="text-truncate">
                        <h5>Rp. 500.000.000</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-truncate">
                        <p style="font-size: 20px;"> Muhammad Aljufri</p>
                      </td>
                      <td class="text-truncate">
                        <h5>Rp. 250.000.000</h5>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>


  </div>

</div>





<!-- BEGIN VENDOR JS-->
<script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
<script src="<?php echo base_url ('assets/app-assets/vendors/js/charts/chart.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url ('assets/app-assets/vendors/js/extensions/jquery.knob.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url ('assets/app-assets/vendors/js/charts/echarts/echarts.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url ('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url ('assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"
<script src="<?php echo base_url('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
<script src="<?php echo base_url ('assets/app-assets/js/scripts/cards/card-charts.js') ?>" type="text/javascript"></script>

  <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<!-- END PAGE LEVEL JS-->
<script type="text/javascript">

var save_method; //for save method string
var data_customer;

$(document).ready(function() {

    //datatables
    table = $('#data_customer').DataTable({

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('hr/cuti/ajax_cuti')?>",
            "type": "POST"
        },
        "order": [[ 4, "desc" ]]


    });
    var date = new Date();
    date.setDate(date.getDate());

    $('.datepicker').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
        startDate: date,
    });

});


function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#non_sppd').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Create Support Request'); // Set Title to Bootstrap modal title
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('hr/cuti/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="Status__c"]').val(data.Status__c);
            $('[name="Jenis_cuti"]').val(data.jenis);
            $('[name="lama_cuti"]').val(data.Lama_Cuti__c);
            $('[name="tanggal"]').val(data.tanggal);
            $('[name="Description__c"]').val(data.Description__c);

            // $('[name="Description"]').val(data.Description);
            $('#modal_update').modal('show'); // show bootstrap modal when complete loaded
            // $('.modal-title').text('Detail Support Request'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Upps ..!", "Gagal mengambil Data Please Relogin !", "warning");
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
      // var x = document.forms["form-input"]["Jenis_Cuti__c","Awal_Cuti__c","lama_cuti","Description__c"].value;
      //   if (x == "") {
      //       swal("Opps !", "Lengkapi data Anda !", "warning");
      //     //  return gagal;
      //   }else{
            url = "<?php echo site_url('hr/cuti/save')?>";
      //  }

    } else {
        url = "<?php echo site_url('accident/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
                swal("Good job!", "Transkasi Berhasil Terselesaikan!", "success");
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          $('#modal_form').modal('hide');
          reload_table();
          swal("Oops !!", "Failed Request Form Cuti", "warning");

        }
    });
}

function delete_person(id)
{
    if(confirm('Are You Sure Cancel Request?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('it/support_req/cancel')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                swal("Good job!", "Request Anda Berhasil di Cancel !", "success");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Upps ..!", "Request Anda Mengalami Masalah Coba Lagi !", "warning");
            }
        });

    }
}

</script>
<!-- End Bootstrap modal -->
<script type="text/javascript">
/*=========================================================================================
    File Name: advance-cards.js
    Description: intialize advance cards
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function(window, document, $) {
    'use strict';

    /****************************************************
    *               Employee Satisfaction               *
    ****************************************************/
    //Get the context of the Chart canvas element we want to select
    var ctx1 = document.getElementById("dashboard1").getContext("2d");

    // Create Linear Gradient
    var white_gradient = ctx1.createLinearGradient(0, 0, 0,400);
    white_gradient.addColorStop(0, 'rgba(255,255,255,0.5)');
    white_gradient.addColorStop(1, 'rgba(255,255,255,0)');

    // Chart Options
    var empSatOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetStrokeWidth : 3,
        pointDotStrokeWidth : 6,
        tooltipFillColor: "rgba(0,0,0,0.8)",
        legend: {
            display: false,
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: false,
            }],
            yAxes: [{
                display: false,
                ticks: {
                    min: 0,
                    max: 8
                },
            }]
        },
        title: {
            display: false,
            fontColor: "#FFF",
            fullWidth: false,
            fontSize: 40,
            text: '82%'
        }
    };

    // Chart Data
    var empSatData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "Omzet",
            data: [3, 2, 1, 3, 4, 3.2, 4],
            backgroundColor: white_gradient,
            borderColor: "rgba(255,255,255,1)",
            borderWidth: 2,
            strokeColor : "#ff6c23",
            pointColor : "#fff",
            pointBorderColor: "rgba(255,255,255,1)",
            pointBackgroundColor: "#1E9FF2",
            pointBorderWidth: 2,
            pointHoverBorderWidth: 2,
            pointRadius: 5,
        }]
    };

    var empSatconfig = {
        type: 'line',

        // Chart Options
        options : empSatOptions,

        // Chart Data
        data : empSatData
    };

    // Create the chart
    var areaChart = new Chart(ctx1, empSatconfig);


        /*********************************************
        *               Total Earnings               *
        **********************************************/
        //Get the context of the Chart canvas element we want to select
        var ctx3 = document.getElementById("earning-chart").getContext("2d");

        // Chart Options
        var earningOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetStrokeWidth : 3,
            pointDotStrokeWidth : 4,
            tooltipFillColor: "rgba(0,0,0,0.8)",
            legend: {
                display: false,
                position: 'bottom',
            },
            hover: {
                mode: 'label'
            },
            scales: {
                xAxes: [{
                    display: false,
                }],
                yAxes: [{
                    display: false,
                    ticks: {
                        min: 0,
                        max: 5
                    },
                }]
            },
            title: {
                display: false,
                fontColor: "#FFF",
                fullWidth: false,
                fontSize: 40,
                text: '82%'
            }
        };

        // Chart Data
        var earningData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                data: [2, 3, 1, 0.2, 0.1, 0.1, 0.3],
                backgroundColor: 'rgba(255,117,136,0.1)',
                borderColor: "transparent",
                borderWidth: 0,
                strokeColor : "#ff6c23",
                capBezierPoints: true,
                pointColor : "#fff",
                pointBorderColor: "rgba(255,117,136,1)",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointRadius: 4,
            }]
        };

        var earningConfig = {
            type: 'line',

            // Chart Options
            options : earningOptions,

            // Chart Data
            data : earningData
        };

        // Create the chart
        var earningChart = new Chart(ctx3, earningConfig);



})(window, document, jQuery);

</script>
</body>
