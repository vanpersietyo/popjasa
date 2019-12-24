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
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Trs_project_terima List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('project_terima/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Bool Ktp Fotokopi</th>
		    <th>Bool Ktp Asli</th>
		    <th>Bool Npwp Fotokopi</th>
		    <th>Bool Npwp Asli</th>
		    <th>Bool Sertifikat Fotokopi</th>
		    <th>Bool Sertifikat Asli</th>
		    <th>Bool Imb Fotokopi</th>
		    <th>Bool Imb Asli</th>
		    <th>Bool Stempel</th>
		    <th>Jml Materai</th>
		    <th>Bool Sk Domisili Fotokopi</th>
		    <th>Bool Sk Domisili Asli</th>
		    <th>Bool Surat Sewa Fotokopi</th>
		    <th>Bool Surat Sewa Asli</th>
		    <th>ID Hdr Project</th>
		    <th>ID Project</th>
		    <th>Created By</th>
		    <th>EntryTime</th>
		    <th>Modified By</th>
		    <th>Last Modified</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
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
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
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
                    ajax: {"url": "project_terima/json", "type": "POST"},
                    columns: [
                        {
                            "data": "ID_Project_terima",
                            "orderable": false
                        },{"data": "bool_ktp_fotokopi"},{"data": "bool_ktp_asli"},{"data": "bool_npwp_fotokopi"},{"data": "bool_npwp_asli"},{"data": "bool_sertifikat_fotokopi"},{"data": "bool_sertifikat_asli"},{"data": "bool_imb_fotokopi"},{"data": "bool_imb_asli"},{"data": "bool_stempel"},{"data": "jml_materai"},{"data": "bool_sk_domisili_fotokopi"},{"data": "bool_sk_domisili_asli"},{"data": "bool_surat_sewa_fotokopi"},{"data": "bool_surat_sewa_asli"},{"data": "ID_Hdr_Project"},{"data": "ID_Project"},{"data": "Created_by"},{"data": "EntryTime"},{"data": "Modified_by"},{"data": "Last_Modified"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
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