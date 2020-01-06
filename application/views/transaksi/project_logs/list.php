<?php
$this->load->view('./template/head');
?>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Log's Project List</h3>
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

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="form-group" style="text-align: right">
                <input type="hidden" value="<?php echo $project->id_project; ?>" id="id_project" name="id_project"/>
                <?php echo anchor(site_url('transaksi/project_logs/create_progress/') . $project->id_project, 'Create', 'class="btn btn-primary"'); ?>
                <?php echo anchor(site_url('transaksi/progress'), 'Kembali', 'class="btn btn-primary"'); ?>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h5 class="content-header-title">Log's Project List</h5>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Status Log</th>
                                        <th>Tgl Log</th>
                                        <th>Keterangan</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
        let id = $('[name="id_project"]').val();
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
                "ajax": {
                    "url": "<?php echo site_url('transaksi/project_logs/json/')?>" + id,
                    "type": "POST"
                },
                columns: [
                    {
                        "data": "Project_id",
                        "orderable": false
                    }, {"data": "Status_log"}, {"data": "tgl_log"}, {"data": "keterangan"},
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
<?php
$this->load->view('./template/foot');
?>