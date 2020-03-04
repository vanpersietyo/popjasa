<?php $this->load->view("template/head"); ?>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title"> <?php echo $button ?> Transaksi Fix Asset</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><p class="danger"></p>
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
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
                            <form action="<?php echo $action; ?>" method="post">
                                <?php if ($status == 'update') { ?>
                                    <div class="form-group">
                                        <label for="date">No. Transaksi <?php echo form_error('Tgl') ?></label>
                                        <input type="text" class="form-control" name="TrNo1" id="TrNo"
                                               placeholder="TrNo" disabled
                                               value="<?php echo $TrNo; ?>"/>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="date">Tanggal Transaksi <?php echo form_error('Tgl') ?></label>
                                    <input type="text" class="form-control datepicker1" name="Tgl" id="Tgl"
                                           placeholder="Tgl"
                                           value="<?php echo $Tgl; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Keterangan <?php echo form_error('TrManualRef') ?></label>
                                    <input type="text" class="form-control" name="TrManualRef" id="TrManualRef"
                                           placeholder="Keterannga"
                                           value="<?php echo $TrManualRef; ?>"/>
                                </div>
                                <?php if ($status == 'update') { ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="mytable">
                                            <thead>
                                            <tr>
                                                <th>Fa Id</th>
                                                <th>Tanggal Penyusutan</th>
                                                <th>Hrg Beli</th>
                                                <th>Estimasi</th>
                                                <th>Penyusutan Tahun</th>
                                                <th>Penyusutan Bulan</th>
                                                <th>Pembulatan</th>
                                                <th style="min-width: 100px">Action</th>
                                            </tr>
                                            </thead>

                                        </table>
                                    </div>
                                    &nbsp;
                                    <div class="panel panel-footer">
                                        <?php echo anchor(site_url('transaksi/fixAsset_dtl/create/' . $TrNo), 'Create', 'class="btn btn-primary"'); ?>
                                    </div>
                                    &nbsp;
                                <?php } ?>
                                <div class="modal-footer">
                                    <div class="col-md-6">
                                        <input type="hidden" name="TrNo" value="<?php echo $TrNo; ?>"/>
                                        <button type="submit"
                                                class="btn btn-primary form-control"><?php echo $button ?></button>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger bg-accent-4 pull-up  form-control" type="button"
                                           href="<?php echo site_url('transaksi/fixAsset_hdr') ?>"><i
                                                    class="ft-arrow-left white"></i>
                                            Kembali</a>
                                    </div>
                                </div>
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

        $('.datepicker1').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

    </script>
    <script type="text/javascript">
        var table;
        let id = $('[name="TrNo"]').val();
        $(document).ready(function () {
            table = $("#mytable").dataTable({
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('transaksi/fixAsset_dtl/json2/')?>" + id,
                    "type": "POST"
                },
            });
        });

        function edit_setup(id, lineNo) {

            location.replace("<?php echo site_url('transaksi/fixAsset_dtl/update/')?>" + id + '/' + lineNo);
        }

        function destroy(id, lineNo) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('transaksi/fixAsset_dtl/delete/')?>" + id + '/' + lineNo,
                    type: "POST",
                    dataType: "JSON",
                    success: function (data) {
                        reload_table();
                        swal("Good Job !", "Data Berhasil Dihapus !", "success");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Upps Sorry !", "Data Gagal Dihapus !", "warning");
                    }
                });

            }
        }

        function reload_table() {
            location.reload();
        }
    </script>
<?php $this->load->view('./template/foot');; ?>