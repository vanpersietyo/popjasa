<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/weather-icons/climacons.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/charts/morris.css') ?>"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/charts/chartist.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css') ?>">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/pages/timeline.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/pages/dashboard-ecommerce.css') ?>">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css') ?>">
  <!-- END Custom CSS-->
</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- eCommerce statistic -->
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">1000</h3>
                      <h6>Total Order</h6>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">500</h3>
                      <h6>Total Belum Selesai</h6>
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">500</h3>
                      <h6>Total Sudah Selesai</h6>
                    </div>
                    <div>
                      <i class="icon-heart danger font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success">1000</h3>
                      <h6>Customer Baru</h6>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ eCommerce statistic -->
        <!-- Products sell and New Orders -->
        <div class="row match-height">
          <div class="col-xl-6 col-12" id="ecommerceChartView">
            <div class="card card-shadow">
              <div class="card-header card-header-transparent py-20">
                <div class="btn-group dropdown">
                  <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">PRODUCTS SALES</a>
                  <div class="dropdown-menu animate" role="menu">
                    <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                    <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                    <a class="dropdown-item" href="#" role="menuitem">profit</a>
                  </div>
                </div>
                <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
                  <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#scoreLineToDay">Day</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">Week</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Month</a></li>
                </ul>
              </div>
              <div class="widget-content tab-content bg-white p-20">
                <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
                <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">New Orders</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
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
        <!--/ Products sell and New Orders -->
        <!-- Recent Transactions -->
        <div class="row">
          <div id="recent-transactions" class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Recent Transactions</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                      href="invoice-summary.html" target="_blank">Invoice Summary</a></li>
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
        <!--/ Recent Transactions -->
        <!--Recent Orders & Monthly Sales -->
        <div class="row match-height">
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-content ">
                <div id="cost-revenue" class="height-250 position-relative"></div>
              </div>
              <div class="card-footer">
                <div class="row mt-1">
                  <div class="col-2 text-center">
                    <h6 class="text-muted">Omzet</h6>
                    <h2 class="block font-weight-normal">18.6 k</h2>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                      <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 70%"
                      aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-2 text-center">
                    <h6 class="text-muted">Hpp</h6>
                    <h2 class="block font-weight-normal">64.54 M</h2>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                      <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 60%"
                      aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-2 text-center">
                    <h6 class="text-muted">Gaji</h6>
                    <h2 class="block font-weight-normal">24.38 B</h2>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                      <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 40%"
                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-2 text-center">
                    <h6 class="text-muted">Operasional</h6>
                    <h2 class="block font-weight-normal">36.72 M</h2>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                      <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 90%"
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
                  <div class="col-1 text-center">
                    <h6 class="text-muted">Pajak</h6>
                    <h2 class="block font-weight-normal">36.72 M</h2>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                      <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 90%"
                      aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-1 text-center">
                    <h6 class="text-muted">Sedekah</h6>
                    <h2 class="block font-weight-normal">36.72 M</h2>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                      <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 90%"
                      aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--/Recent Orders & Monthly Sales -->

      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/app-assets/vendors/js/charts/chartist.min.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js') ?>"
  type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/vendors/js/charts/raphael-min.js') ?>" type="text/javascript"></script>
  <!-- <script src="<?php echo base_url('assets/app-assets/vendors/js/charts/morris.min.js') ?>" type="text/javascript"></script> -->
  <script src="<?php echo base_url('assets/app-assets/vendors/js/timeline/horizontal-timeline.js') ?>" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
  <!-- <script src="<?php echo base_url('assets/app-assets/js/scripts/pages/dashboard-ecommerce.js') ?>" type="text/javascript"></script> -->
  <!-- END PAGE LEVEL JS-->
  <script type="text/javascript">
  /*=========================================================================================
      File Name: dashboard-ecommerce.js
      Description: dashboard-ecommerce
      ----------------------------------------------------------------------------------------
      Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
      Version: 1.0
      Author: PIXINVENT
      Author URL: http://www.themeforest.net/user/pixinvent
  ==========================================================================================*/


  (function(window, document, $) {
      'use strict';
      /*************************************************
      *               Score Chart                      *
      *************************************************/
      (function () {
        var scoreChart = function scoreChart(id, labelList, series1List) {
          var scoreChart = new Chartist.Line('#' + id, {
            labels: labelList,
            series: [series1List]
          }, {
            lineSmooth: Chartist.Interpolation.simple({
              divisor: 2
            }),
            fullWidth: true,
            chartPadding: {
              right: 25
            },
            series: {
              "series-1": {
                showArea: false
              }
            },
            axisX: {
              showGrid: false
            },
            axisY: {
              labelInterpolationFnc: function labelInterpolationFnc(value) {
                return value / 1000 + 'K';
              },
              scaleMinSpace: 40
            },
            plugins: [Chartist.plugins.tooltip()],
            low: 0,
            showPoint: false,
            height: 300
          });

          scoreChart.on('created', function (data) {
            var defs = data.svg.querySelector('defs') || data.svg.elem('defs');
            var width = data.svg.width();
            var height = data.svg.height();

            var filter = defs.elem('filter', {
              x: 0,
              y: "-10%",
              id: 'shadow' + id
            }, '', true);

            filter.elem('feGaussianBlur', { in: "SourceAlpha",
              stdDeviation: "24",
              result: 'offsetBlur'
            });
            filter.elem('feOffset', {
              dx: "0",
              dy: "32"
            });

            filter.elem('feBlend', { in: "SourceGraphic",
              mode: "multiply"
            });

            defs.elem('linearGradient', {
                id: id + '-gradient',
                x1: 0,
                y1: 0,
                x2: 1,
                y2: 0
            }).elem('stop', {
                offset: 0,
                'stop-color': 'rgba(22, 141, 238, 1)'
            }).parent().elem('stop', {
                offset: 1,
                'stop-color': 'rgba(98, 188, 246, 1)'
            });

            return defs;
          }).on('draw', function (data) {
            if (data.type === 'line') {
              data.element.attr({
                filter: 'url(#shadow' + id + ')'
              });
            } else if (data.type === 'point') {

              var parent = new Chartist.Svg(data.element._node.parentNode);
              parent.elem('line', {
                x1: data.x,
                y1: data.y,
                x2: data.x + 0.01,
                y2: data.y,
                "class": 'ct-point-content'
              });
            }
            if (data.type === 'line' || data.type == 'area') {
              data.element.animate({
                d: {
                  begin: 1000 * data.index,
                  dur: 1000,
                  from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                  to: data.path.clone().stringify(),
                  easing: Chartist.Svg.Easing.easeOutQuint
                }
              });
            }
          });
        };

        var DayLabelList = ["1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th"];
        var DaySeries1List = {
          name: "series-1",
          data: [0, 4500, 2600, 6100, 2600, 6500, 3200, 6800]
        };

        var WeekLabelList = ["W1", "W2", "W4", "W5", "W6", "W7", "W8"];
        var WeekSeries1List = {
          name: "series-1",
          data: [77000, 18000, 61000, 26000, 58000, 32000, 70000, 45000]
        };

        var MonthLabelList = ["AUG", "SEP", "OTC", "NOV", "DEC", "JAN", "FEB"];
        var MonthSeries1List = {
          name: "series-1",
          data: [100000, 500000, 300000, 700000, 100000, 200000, 700000, 50000]
        };

        var createChart = function createChart(button) {
          var btn = button || $("#ecommerceChartView .chart-action").find(".active");

          var chartId = btn.attr("href");
          switch (chartId) {
            case "#scoreLineToDay":
              scoreChart("scoreLineToDay", DayLabelList, DaySeries1List);
              break;
            case "#scoreLineToWeek":
              scoreChart("scoreLineToWeek", WeekLabelList, WeekSeries1List);
              break;
            case "#scoreLineToMonth":
              scoreChart("scoreLineToMonth", MonthLabelList, MonthSeries1List);
              break;
          }
        };

        createChart();
        $(".chart-action li a").on("click", function () {
          createChart($(this));
        });
      })();

      /*************************************************
      *               Cost Revenue Stats               *
      *************************************************/
      new Chartist.Line('#cost-revenue', {
          labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
          series: [
              [
                  {meta:'Revenue', value: 5},
                  {meta:'Revenue', value: 3},
                  {meta:'Revenue', value: 6},
                  {meta:'Revenue', value: 3},
                  {meta:'Revenue', value: 8},
                  {meta:'Revenue', value: 5},
                  {meta:'Revenue', value: 8},
                  {meta:'Revenue', value: 12},
                  {meta:'Revenue', value: 7},
                  {meta:'Revenue', value: 14},

              ]
          ]
      }, {
          low: 0,
          high: 18,
          fullWidth: true,
          showArea: true,
          showPoint: true,
          showLabel: false,
          axisX: {
              showGrid: false,
              showLabel: false,
              offset: 0
          },
          axisY: {
              showGrid: false,
              showLabel: false,
              offset: 0
          },
          chartPadding: 0,
          plugins: [
              Chartist.plugins.tooltip()
          ]
      }).on('draw', function(data) {
          if (data.type === 'area') {
              data.element.attr({
                  'style': 'fill: #28D094; fill-opacity: 0.2'
              });
          }
          if (data.type === 'line') {
              data.element.attr({
                  'style': 'fill: transparent; stroke: #28D094; stroke-width: 4px;'
              });
          }
          if (data.type === 'point') {
              var circle = new Chartist.Svg('circle', {
                cx: [data.x], cy:[data.y], r:[7],
              }, 'ct-area-circle');
               data.element.replace(circle);
          }
      });
  })(window, document, jQuery);

  </script>
</body>
</html>
