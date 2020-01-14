<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/app-assets/css/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>/assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">

  <div class="app-content content">
    <div class="content-wrapper">

      <div class="content-body">
        <div class="row">
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"><?= number_format($order->tot_order) ?></h3>
                      <h6>Total Order</h6>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning"><?= number_format($progress->on_progress) ?></h3>
                      <h6>Total Belum Selesai</h6>
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger"><?= number_format($finish->finish) ?></h3>
                      <h6>Total Sudah Selesai</h6>
                    </div>
                    <div>
                      <i class="icon-heart danger font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="primary"><?= number_format($cust_contacted->contacted) ?></h3>
                      <h6>Customer Contacted</h6>
                    </div>
                    <div>
                      <i class="icon-user-follow primary font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success"><?= number_format($cust_deal->contacted) ?></h3>
                                    <h6>Customer Deal</h6>
                                </div>
                                <div>
                                    <i class="icon-user-follow success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger"><?= number_format($cust_lost->contacted) ?></h3>
                                    <h6>Customer Lost</h6>
                                </div>
                                <div>
                                    <i class="icon-user-unfollow danger font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- line chart section start -->
        <section id="chartjs-line-charts">
          <!-- Line Chart -->
          <div class="row match-height">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <!-- <h4 class="card-title">Simple Line Chart</h4> -->
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body chartjs">
                    <canvas id="line-chart" height="500"></canvas>
                  </div>
                  <div class="card-footer">
                    <div class="row mt-1">
                      <div class="col-6 text-center">
                        <h6 class="text-muted">Omzet</h6>
                        <h2 class="block font-weight-normal">18.6 k</h2>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                          aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-6 text-center">
                        <h6 class="text-muted">Target</h6>
                        <h2 class="block font-weight-normal">64.54 M</h2>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%"
                          aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-xl-6 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">New Orders</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                        href="invoice-summary.html" target="_blank">Rekapitulasi</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div id="new-orders" class="media-list position-relative">
                    <div class="table-responsive">
                      <table id="new-orders-table" class="table table-hover table-xl mb-0">
                        <thead>
                          <tr>
                            <th class="border-top-0">Jasa</th>
                            <th class="border-top-0">Tanya</th>
                            <th class="border-top-0">Real</th>
                            <th class="border-top-0">Selisih</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-truncate">Jasa Pengurusan PT</td>
                            <td class="text-truncate">100 Cust</td>
                            <td class="text-truncate">50 Cust</td>
                            <td class="text-truncate">50 Cust</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Jasa Pengurusan CV</td>
                            <td class="text-truncate">100 Cust</td>
                            <td class="text-truncate">50 Cust</td>
                            <td class="text-truncate">50 Cust</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Jasa Pengurusan UD</td>
                            <td class="text-truncate">100 Cust</td>
                            <td class="text-truncate">50 Cust</td>
                            <td class="text-truncate">50 Cust</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Jasa Pengurusan TDP</td>
                            <td class="text-truncate">100 Cust</td>
                            <td class="text-truncate">50 Cust</td>
                            <td class="text-truncate">50 Cust</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>

          <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <!-- <h4 class="card-title">New Orders</h4> -->
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                      href="invoice-summary.html" target="_blank">Rekapitulasi</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div id="new-orders" class="media-list position-relative">
                  <div class="table-responsive">
                    <table id="new-orders-table" class="table table-hover table-xl mb-0">
                      <thead>
                        <tr>
                          <th class="border-top-0">Jasa</th>
                          <th class="border-top-0">Tanya</th>
                          <th class="border-top-0">Real</th>
                          <th class="border-top-0">Selisih</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-truncate">Jasa Pengurusan PT</td>
                          <td class="text-truncate">100 Cust</td>
                          <td class="text-truncate">50 Cust</td>
                          <td class="text-truncate">50 Cust</td>
                        </tr>
                        <tr>
                          <td class="text-truncate">Jasa Pengurusan CV</td>
                          <td class="text-truncate">100 Cust</td>
                          <td class="text-truncate">50 Cust</td>
                          <td class="text-truncate">50 Cust</td>
                        </tr>
                        <tr>
                          <td class="text-truncate">Jasa Pengurusan UD</td>
                          <td class="text-truncate">100 Cust</td>
                          <td class="text-truncate">50 Cust</td>
                          <td class="text-truncate">50 Cust</td>
                        </tr>
                        <tr>
                          <td class="text-truncate">Jasa Pengurusan TDP</td>
                          <td class="text-truncate">100 Cust</td>
                          <td class="text-truncate">50 Cust</td>
                          <td class="text-truncate">50 Cust</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div id="recent-transactions" class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <h4 class="card-title">Recent Transactions</h4> -->
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                      href="invoice-summary.html" target="_blank">Progress</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="table-responsive">
                  <table id="recent-orders" class="table table-hover table-xl mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0">No Invoice</th>
                        <th class="border-top-0">Nama Customer</th>
                        <th class="border-top-0">Produk Jasa</th>
                        <th class="border-top-0">Sisa Piutang</th>
                        <th class="border-top-0">Status Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-truncate"><a href="#">INV-001001</a></td>
                        <td class="text-truncate">Nuhasmart</td>
                        <td class="text-truncate">Jasa Pengurusan PT</td>
                        <td class="text-truncate">Rp. 2.000.000</td>
                        <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Paid</td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><a href="#">INV-001001</a></td>
                        <td class="text-truncate">Nuhasmart</td>
                        <td class="text-truncate">Jasa Pengurusan UD</td>
                        <td class="text-truncate">Rp. 2.000.000</td>
                        <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Paid</td>
                      </tr>
                      <tr>
                        <td class="text-truncate"><a href="#">INV-001001</a></td>
                        <td class="text-truncate">Nuhasmart</td>
                        <td class="text-truncate">Jasa Pengurusan CV</td>
                        <td class="text-truncate">Rp. 2.000.000</td>
                        <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Paid</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- Line Stacked Area Chart -->
          <!-- <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Line Stacked Area Chart</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body chartjs">
                    <canvas id="line-chart2" height="500"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="row">
           <div class="col-12">
             <div class="card">
               <div class="card-header">
                 <!-- <h4 class="card-title">Column Chart</h4> -->
                 <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                 <div class="heading-elements">
                   <ul class="list-inline mb-0">
                     <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                     <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                     <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                     <li><a data-action="close"><i class="ft-x"></i></a></li>
                   </ul>
                 </div>
               </div>
               <div class="card-content collapse show">
                 <div class="card-body">
                   <canvas id="column-chart" height="400"></canvas>
                 </div>
               </div>
               <div class="card-footer">
                 <div class="row mt-1">
                   <div class="col-2 text-center">
                     <h6 class="text-muted">Omzet</h6>
                     <h2 class="block font-weight-normal">18.6 k</h2>
                     <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                       <div class="progress-bar bg-gradient-x-yellow" role="progressbar" style="width: 70%"
                       aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                   </div>
                   <div class="col-2 text-center">
                     <h6 class="text-muted">Hpp</h6>
                     <h2 class="block font-weight-normal">64.54 M</h2>
                     <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                       <div class="progress-bar bg-gradient-x-teal" role="progressbar" style="width: 60%"
                       aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                   </div>
                   <div class="col-2 text-center">
                     <h6 class="text-muted">Gaji</h6>
                     <h2 class="block font-weight-normal">24.38 B</h2>
                     <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                       <div class="progress-bar bg-gradient-x-cyan" role="progressbar" style="width: 40%"
                       aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                   </div>
                   <div class="col-2 text-center">
                     <h6 class="text-muted">Operasional</h6>
                     <h2 class="block font-weight-normal">36.72 M</h2>
                     <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                       <div class="progress-bar bg-gradient-x-blue" role="progressbar" style="width: 90%"
                       aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                   </div>
                   <div class="col-2 text-center">
                     <h6 class="text-muted">Zakat</h6>
                     <h2 class="block font-weight-normal">36.72 M</h2>
                     <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                       <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 90%"
                       aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                   </div>
                   <div class="col-2 text-center">
                     <h6 class="text-muted">Pajak</h6>
                     <h2 class="block font-weight-normal">36.72 M</h2>
                     <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                       <div class="progress-bar bg-gradient-x-red" role="progressbar" style="width: 90%"
                       aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                   </div>

                 </div>
               </div>
             </div>
           </div>
         </div>
        </section>
        <!-- // line chart section end -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo base_url('assets/')?>app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/')?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/')?>app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url('assets/')?>app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo base_url('assets/')?>app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/')?>app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/')?>app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/')?>app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <!-- <script src="<?php echo base_url('assets/')?>app-assets/js/scripts/charts/chartjs/line/line.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/')?>app-assets/js/scripts/charts/chartjs/line/line2.js" type="text/javascript"></script> -->
  <!-- <script src="<?php echo base_url('assets/')?>app-assets/js/scripts/charts/chartjs/bar/column.js" type="text/javascript"></script> -->
  <!-- CHART 1-->
  <script type="text/javascript">
  $(window).on("load", function(){

      //Get the context of the Chart canvas element we want to select
      var ctx = $("#line-chart");

      // Chart Options
      var chartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
              position: 'bottom',
          },
          hover: {
              mode: 'label'
          },
          scales: {
              xAxes: [{
                  display: true,
                  gridLines: {
                      color: "#f3f3f3",
                      drawTicks: false,
                  },
                  scaleLabel: {
                      display: true,
                      labelString: 'Month'
                  }
              }],
              yAxes: [{
                  display: true,
                  gridLines: {
                      color: "#f3f3f3",
                      drawTicks: false,
                  },
                  scaleLabel: {
                      display: true,
                      labelString: 'Value'
                  }
              }]
          },
          title: {
              display: true,
              text: ''
          }
      };

      // Chart Data
      var chartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [{
              label: "Target",
              data: [2000000000, 2000000000, 2000000000, 2000000000, 2000000000, 2000000000, 2000000000],
              fill: false,
              borderDash: [5, 5],
              borderColor: "#FE0B0B",
              pointBorderColor: "#FE0B0B",
              pointBackgroundColor: "#FFF",
              pointBorderWidth: 2,
              pointHoverBorderWidth: 2,
              pointRadius: 4,
          },{
              label: "omzet",
              data: [1600000000, 250000000, 2120000000, 280000000, 210000000, 1600000000, 210000000],
              lineTension: 0,
              fill: false,
              borderColor: "#12B728",
              pointBorderColor: "#12B728",
              pointBackgroundColor: "#FFF",
              pointBorderWidth: 2,
              pointHoverBorderWidth: 2,
              pointRadius: 4,
          }]
      };

      var config = {
          type: 'line',

          // Chart Options
          options : chartOptions,

          data : chartData
      };

      // Create the chart
      var lineChart = new Chart(ctx, config);
  });
  </script>

  <!-- CHART 2-->
  <script type="text/javascript">
  $(window).on("load", function(){

      //Get the context of the Chart canvas element we want to select
      var ctx = $("#column-chart");

      // Chart Options
      var chartOptions = {
          // Elements options apply to all of the options unless overridden in a dataset
          // In this case, we are setting the border of each bar to be 2px wide and green
          elements: {
              rectangle: {
                  borderWidth: 2,
                  borderColor: 'rgb(0, 255, 0)',
                  borderSkipped: 'bottom'
              }
          },
          responsive: true,
          maintainAspectRatio: false,
          responsiveAnimationDuration:500,
          legend: {
              position: 'top',
          },
          scales: {
              xAxes: [{
                  display: true,
                  gridLines: {
                      color: "#FBC02D",
                      drawTicks: false,
                  },
                  scaleLabel: {
                      display: true,
                  }
              }],
              yAxes: [{
                  display: true,
                  gridLines: {
                      color: "#f3f3f3",
                      drawTicks: false,
                  },
                  scaleLabel: {
                      display: true,
                  }
              }]
          },
          title: {
              display: true,
              text: ''
          }
      };

      // Chart Data
      var chartData = {
          labels: ["January", "February", "March", "April", "May"],
          datasets: [{
              label: "Omzet",
              data: [65, 59, 80, 81, 56],
              backgroundColor: "#FBC02D",
              hoverBackgroundColor: "#FBC02D",
              borderColor: "transparent"
          }, {
              label: "Hpp",
              data: [65, 59, 80, 81, 56],
              backgroundColor: "#00796B",
              hoverBackgroundColor: "#00796B",
              borderColor: "transparent"
          },{
              label: "Gaji",
              data: [65, 59, 80, 81, 56],
              backgroundColor: "#0097A7",
              hoverBackgroundColor: "#0097A7",
              borderColor: "transparent"
          },{
              label: "Operasional",
              data: [65, 59, 80, 81, 56],
              backgroundColor: "#1976D2",
              hoverBackgroundColor: "#1976D2",
              borderColor: "transparent"
          },{
              label: "Zakat",
              data: [28, 48, 40, 19, 86],
              backgroundColor: "#1EC481",
              hoverBackgroundColor: "#1EC481",
              borderColor: "transparent"
          },{
              label: "Pajak",
              data: [28, 48, 40, 19, 86],
              backgroundColor: "#D32F2F",
              hoverBackgroundColor: "#D32F2F",
              borderColor: "transparent"
          }]
      };

      var config = {
          type: 'bar',

          // Chart Options
          options : chartOptions,

          data : chartData
      };

      // Create the chart
      var lineChart = new Chart(ctx, config);
  });
  </script>
</body>
</html>
