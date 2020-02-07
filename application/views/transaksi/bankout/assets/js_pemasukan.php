

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
              "url": "<?php echo site_url('transaksi/keuangan/bankout/ajax_pemasukan')?>",
              "type": "POST"
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

           // Total over all pages
           total = api
               .column( 4 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );
         total_1 = api
             .column( 5 )
             .data()
             .reduce( function (a, b) {
                 return intVal(a) + intVal(b);
             }, 0 );

           // Total over this page
           pageTotal = api
               .column( 4, { page: 'current'} )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );
         pageTotal_1 = api
             .column( 5, { page: 'current'} )
             .data()
             .reduce( function (a, b) {
                 return intVal(a) + intVal(b);
             }, 0 );
         pageTotal_2 = api
             .column( 6, { page: 'current'} )
             .data()
             .reduce( function (a, b) {
                 return intVal(a) + intVal(b);
             }, 0 );

          var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
           $( api.column( 4 ).footer() ).html(
               '<h5 class="text-bold-500"> '+ numFormat(pageTotal)
           );
           var numFormat_1 = $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
            $( api.column( 5 ).footer() ).html(
                '<h5 class="text-bold-500"> '+ numFormat_1(pageTotal_1)
            );
            var numFormat_2 = $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
             $( api.column( 6 ).footer() ).html(
                 '<h5 class="text-bold-500"> '+ numFormat_2(pageTotal_2)
             );
       },

       "columns": [
           { mData: '0' },
           { mData: '1' },
           { mData: '2' },
            { mData: '3' },
           { mData: '4',render: $.fn.dataTable.render.number( ',', '.', 0, '' )  },
           { mData: '5',render: $.fn.dataTable.render.number( ',', '.', 0, '' )  },
           { mData: '6',render: $.fn.dataTable.render.number( ',', '.', 0, '' )  },
            { mData: '7' },

       ],

      });

      table = $('#table2').DataTable({
          // Load data for the table's content from an Ajax source

          "ajax": {
              "url": "<?php echo site_url('transaksi/keuangan/bankout/ajax_saldo')?>",
              "type": "POST"
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

           // Total over all pages
           total = api
               .column( 1 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

           // Total over this page
           pageTotal = api
               .column( 1, { page: 'current'} )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

           var numFormat= $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
            $( api.column( 1 ).footer() ).html(
                '<h5 class="text-bold-500"> '+ numFormat(pageTotal)
            );

       },

       "columns": [
           { mData: '0' },
           { mData: '1',render: $.fn.dataTable.render.number( ',', '.', 0, '' )  },
       ],

      });

      table = $('#table3').DataTable({
          // Load data for the table's content from an Ajax source

          "ajax": {
              "url": "<?php echo site_url('transaksi/keuangan/bankout/ajax_saldo_in')?>",
              "type": "POST"
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

           // Total over all pages
           total = api
               .column( 1 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

           // Total over this page
           pageTotal = api
               .column( 1, { page: 'current'} )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

           var numFormat= $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
            $( api.column( 1 ).footer() ).html(
                '<h5 class="text-bold-500"> '+ numFormat(pageTotal)
            );

       },

       "columns": [
           { mData: '0' },
           { mData: '1',render: $.fn.dataTable.render.number( ',', '.', 0, '' )  },
       ],

      });



    });


    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax
    }

    </script>


    <script src="<?php echo base_url('assets/app-assets/vendors/js/extensions/sweetalert.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/app-assets/js/scripts/extensions/sweet-alerts.js') ?>" type="text/javascript"></script>
