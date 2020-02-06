<?php
$this->load->view('template/head');
?>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Fix assets List</h3>
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
            <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="add()"><a> <i
                            class="la la-plus"></i> Tambah Fix Assets </a></button>
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

<?php
$this->load->view('/template/foot');
?>

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
            ajax: {"url": "trs_asset/json", "type": "POST"},
            columns: [
                {
                    "data": "trno",
                    "orderable": false
                }, {"data": "fa_id"}, {"data": "jenis"}, {"data": "date_beli"}, {"data": "estimasi"}, {"data": "date_penyusutan"}, {"data": "hrg_beli"}, {"data": "penyusutan_thn"}, {"data": "penyusutan_bln"}, {"data": "pembulatan"},
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


