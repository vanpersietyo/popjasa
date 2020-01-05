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
        $(document).ready(function () {
            var t = $("#mytable").dataTable({
                "ajax": {
                    "url": "<?php echo site_url('transaksi/project_logs/json')?>",
                    "type": "POST"
                },
            });
        });
    </script>
    </body>
<?php
$this->load->view('./template/foot');
?>