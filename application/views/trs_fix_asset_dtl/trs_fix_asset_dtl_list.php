<!doctype html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <style>
        .dataTables_wrapper {
            min-height: 500px
        }

        .dataTables_processing {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            margin-left: -50%;
            margin-top: -25px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            color: grey;
        }

        body {
            padding: 15px;
        }
    </style>
</head>
<body>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <h2 style="margin-top:0px">Trs_fix_asset_dtl List</h2>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-4 text-right">
        <?php echo anchor(site_url('trs_fix_asset_dtl/create'), 'Create', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('trs_fix_asset_dtl/excel'), 'Excel', 'class="btn btn-primary"'); ?>
    </div>
</div>
<table class="table table-bordered table-striped" id="mytable">
    <thead>
    <tr>
        <th width="80px">No</th>
        <th>Fa Id</th>
        <th>Jenis</th>
        <th>Date Beli</th>
        <th>Estimasi</th>
        <th>Date Penyusutan</th>
        <th>Hrg Beli</th>
        <th>Penyusutan Thn</th>
        <th>Penyusutan Bln</th>
        <th>Pembulatan</th>
        <th>Added By</th>
        <th>Entry Time</th>
        <th>Changed By</th>
        <th>Last Modified</th>
        <th width="200px">Action</th>
    </tr>
    </thead>

</table>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            initComplete: function () {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function (e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "trs_fix_asset_dtl/json", "type": "POST"},
            columns: [
                {
                    "data": "TrNo",
                    "orderable": false
                }, {"data": "Fa_Id"}, {"data": "Jenis"}, {"data": "Date_beli"}, {"data": "Estimasi"}, {"data": "Date_penyusutan"}, {"data": "Hrg_beli"}, {"data": "Penyusutan_thn"}, {"data": "Penyusutan_bln"}, {"data": "Pembulatan"}, {"data": "Added_by"}, {"data": "Entry_time"}, {"data": "Changed_by"}, {"data": "Last_Modified"},
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [[0, 'desc']],
            rowCallback: function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>
</body>
</html>