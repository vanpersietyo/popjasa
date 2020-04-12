  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/chartist.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/raphael-min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/morris.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/timeline/horizontal-timeline.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/core/app-menu.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/core/app.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')?>"></script>

  <script>
$(window).on("load", function(){
    $('#recent-buyers, #new-orders').perfectScrollbar({
        wheelPropagation: true
    });
});
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
          height: 300        });

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

      var DayLabelList = [<?php echo $tgl_penjualan?>];
      var DaySeries1List = {
        name: "series-1",
        data: [<?php echo $jml_penjualan?>]
      };

      var MonthLabelList = ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL","AUG", "SEP", "OCT", "NOV", "DES"];
      var MonthSeries1List = {
        name: "series-1",
        data: [<?php echo $omz_penjualan_month?>]
      };

      var createChart = function createChart(button) {
        var btn = button || $("#ecommerceChartView .chart-action").find(".active");

        var chartId = btn.attr("href");
        switch (chartId) {
          case "#scoreLineToDay":
            scoreChart("scoreLineToDay", DayLabelList, DaySeries1List);
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

$(document).ready(function() {
    penjualan_popjasa = $('#penjualan_popjasa').DataTable({
        "ajax": {
            "url": "<?php echo base_url('dashboard/ajax_penjualan_popjasa')?>",
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
           total_1 = api
               .column( 1 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );
           total_2 = api
               .column( 2 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );
           pageTotal_1 = api
               .column( 1, { page: 'current'} )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

           pageTotal_2 = api
               .column( 2, { page: 'current'} )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

            var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, '' ).display;
             $( api.column( 1 ).footer() ).html(
                 '<b class="danger">'+ numFormat(pageTotal_1)
             );

             var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, '' ).display;
              $( api.column( 2 ).footer() ).html(
                  '<b class="danger">'+ numFormat(pageTotal_2)
              );
       },
        "columns": [
            { mData: '0' },
            { mData: '1', render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { mData: '2', render: $.fn.dataTable.render.number( ',', '.', 0, '' ) }
        ],

        "info"		: false,
		"scrollY"       : "250px",
		"scrollCollapse": true,
		"ordering"      : true,
		"searching"     : true,
		"bLengthChange" : false,
		"processing"    : true, //Feature control the processing indicator.
		"paging"        : false,
    });
	$('#penjualan_popjasa_filter').html('');
	$('#search_penjualan_popjasa').on('keyup',function(){
		penjualan_popjasa.search($(this).val()).draw() ;
	});

    penjualan_jasamurah = $('#penjualan_jasamurah').DataTable({
      "ajax": {
          "url": "<?php echo base_url('dashboard/ajax_penjualan_jasamurah')?>",
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
         total_1 = api
             .column( 1 )
             .data()
             .reduce( function (a, b) {
                 return intVal(a) + intVal(b);
             }, 0 );
         total_2 = api
             .column( 2 )
             .data()
             .reduce( function (a, b) {
                 return intVal(a) + intVal(b);
             }, 0 );
         pageTotal_1 = api
             .column( 1, { page: 'current'} )
             .data()
             .reduce( function (a, b) {
                 return intVal(a) + intVal(b);
             }, 0 );

         pageTotal_2 = api
             .column( 2, { page: 'current'} )
             .data()
             .reduce( function (a, b) {
                 return intVal(a) + intVal(b);
             }, 0 );

          var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, '' ).display;
           $( api.column( 1 ).footer() ).html(
               '<b class="danger">'+ numFormat(pageTotal_1)
           );

           var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, '' ).display;
            $( api.column( 2 ).footer() ).html(
                '<b class="danger">'+ numFormat(pageTotal_2)
            );
     },
      "columns": [
          { mData: '0' },
          { mData: '1', render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
          { mData: '2', render: $.fn.dataTable.render.number( ',', '.', 0, '' ) }
      ],

      "info"		: false,
  "scrollY"       : "250px",
  "scrollCollapse": true,
  "ordering"      : true,
  "searching"     : true,
  "bLengthChange" : false,
  "processing"    : true, //Feature control the processing indicator.
  "paging"        : false,
  });
    $('#penjualan_jasamurah_filter').html('');
    $('#search_penjualan_jasamurah').on('keyup',function(){
      penjualan_jasamurah.search($(this).val()).draw() ;
    });

    outstanding_finish = $('#outstanding_finish').DataTable({
        "ajax": {
            "url": "<?php echo base_url('dashboard/ajax_outstanding_finish')?>",
        },

        "info"		: false,
        "scrollY"       : "250px",
        "scrollCollapse": true,
        "ordering"      : true,
        "searching"     : true,
        "bLengthChange" : false,
        "processing"    : true, //Feature control the processing indicator.
        "paging"        : false,
    });
    $('#outstanding_finish_filter').html('');
    $('#search_piutang_outstanding_finish').on('keyup',function(){
        outstanding_finish.search($(this).val()).draw() ;
    });

    outstanding_not_finish = $('#outstanding_not_finish').DataTable({
        "ajax": {
            "url": "<?php echo base_url('dashboard/ajax_outstanding_not_finish')?>",
        },
        "info"		: false,
        "scrollY"       : "250px",
        "scrollCollapse": true,
        "ordering"      : true,
        "searching"     : true,
        "bLengthChange" : false,
        "processing"    : true, //Feature control the processing indicator.
        "paging"        : false,
    });
    $('#outstanding_not_finish_filter').html('');
    $('#search_piutang_outstanding_not_finish').on('keyup',function(){
        outstanding_not_finish.search($(this).val()).draw() ;
    });

});

</script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/vendors/js/vendors.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/vendors/js/ui/jquery.sticky.js" ></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/js/core/app-menu.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/js/scripts/customizer.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets')?>/app-assets/js/scripts/forms/select/form-select2.js"></script>