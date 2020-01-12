<?php
$this->load->view('./template/head');
?>
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <h5 class="brand-text" style="text-align: center">POPJASA TRACKING ORDER</h5>
                </a>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="https://popjasa.id/"><i
                                        class="ficon ft-arrow-left"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <input type="hidden" value="<?php echo $project_log->Project_id; ?>" id="id_project"
                                   name="id_project"/>
                            <h5 class="content-header-title">Log's Project
                                List <?php echo $project_log->Project_id; ?></h5>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Status Log</th>
                                        <th>Tgl Log</th>
                                        <th>Keterangan</th>
                                        <th width="200px">Created By</th>
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
            var t = $("#mytable").dataTable({
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('customers/track/json/')?>" + id,
                    "type": "POST"
                },
            });
        });
    </script>
<?php
$this->load->view('./template/foot');
?>