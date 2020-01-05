<?php
$this->load->view('template/head');
?>

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Log's Project</h3>
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
    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h2 style="margin-top:0px">Log's Project <?php echo $button ?></h2>
                            <form action="<?php echo $action; ?>" method="post">
                                <div class="form-group">
                                    <label for="smallint">Status Log <?php echo form_error('Status_log') ?></label>
                                    <input type="text" class="form-control" name="Status_log" id="Status_log"
                                           placeholder="Status Log" value="<?php echo $Status_log; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="date">Tgl Log <?php echo form_error('tgl_log') ?></label>
                                    <input type="text" class="form-control datepicker" name="tgl_log" id="tgl_log"
                                           placeholder="Tgl Log" value="<?php echo $tgl_log; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                                    <textarea class="form-control" rows="3" name="keterangan" id="keterangan"
                                              placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                                </div>
                                <input type="hidden" name="Project_id" value="<?php echo $Project_id; ?>"/>
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                <a href="<?php echo site_url('project_logs') ?>" class="btn btn-default">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            //datepicker
            $('.datepicker').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                todayHighlight: true,
                orientation: "top auto",
                todayBtn: true,
                todayHighlight: true,
            });
        });
    </script>

<?php
$this->load->view('./template/head');
?>