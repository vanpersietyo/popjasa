<?php
$this->load->view('template/head');
?>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"></h3>
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


<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <a class="btn mb-1 btn-info btn-lg btn-block pull-up"
               href="<?php echo site_url('transaksi/trs_asset/create') ?>"><i class="ft-excell"></i> Tambah Fix
                Asset</a>

        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <a class="btn mb-1 btn-danger btn-lg btn-block pull-up"
               href="<?php echo site_url('transaksi/trs_asset/excel') ?>"><i class="ft-excell"></i> Excell</a>
        </div>
    </div>
</div>

<div class="content-body">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h5 class="content-header-title">List Data Fix Assets</h5>
                        <br>
                        <!-- Invoices List table -->
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th width="200px">Action</th>
                                    <th width="80px">TrNo</th>
                                    <th>Fa Id</th>
                                    <th>Jenis</th>
                                    <th>Date Beli</th>
                                    <th>Hrg Beli</th>
                                    <th>Penyusutan Thn</th>
                                    <th>Penyusutan Bln</th>
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

<script type="text/javascript">
    function edit_setup(ID) {
        location.replace("<?php echo base_url('transaksi/trs_asset/update/')?>" + ID);
    }
</script>

<?php
$this->load->view('/template/foot');
?>

<script type="text/javascript">
    $(document).ready(function () {
        var t = $("#mytable").dataTable({
            "ajax": {
                "url": "<?php echo site_url('transaksi/trs_asset/json')?>",
                "type": "POST"
            },
        });
    });

    function destroy(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('transaksi/trs_asset/delete/')?>" + id,
                type: "POST",
            });
            reload_table();
        }
    }

    function reload_table() {
        var table = $('#mytable').DataTable();
        table.ajax.reload(null, false); //reload datatable ajax
    }
</script>

