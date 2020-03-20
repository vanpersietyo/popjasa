<?php
$this->load->view('template/head');
?>
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>"
          rel="stylesheet">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Progress Project</h3>
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
                            <h2 style="margin-top:0px">Progress Project <?php echo $button ?></h2>
                            <form action="<?php echo $action; ?>" method="post">
                                <div class="form-group">
                                    <label for="smallint">Status Log <?php echo form_error('Status_log') ?></label>
                                    <select class="form-control" id="Status_log" name="Status_log"
                                            value="<?php echo $Status_log; ?>">
                                        <option value="">---SILAHKAN PILIH---</option>
                                        <option value="0">New</option>
                                        <option value="1">On Progress</option>
                                        <option value="2">Finish</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date">Tgl Log <?php echo form_error('tgl_log') ?></label>
                                    <input type="text" class="form-control datepicker" name="tgl_log" id="tgl_log"
                                           placeholder="Tgl Log" value="<?php echo $tgl_log; ?>" autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                                    <textarea class="form-control" rows="3" name="keterangan" id="keterangan"
                                              placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                                </div>
                                <input type="hidden" name="Project_id" value="<?php echo $Project_id; ?>"/>
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                <a href="<?php echo site_url('transaksi/project_logs/get_logs/') . $Project_id ?>"
                                   class="btn btn-default">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <script type="text/javascript">
        var date = new Date();
        date.setDate(date.getDate());

        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

    </script>

<?php
$this->load->view('./template/head');
?>
