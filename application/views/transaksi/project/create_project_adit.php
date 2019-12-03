<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 03/12/2019
 * Time: 15:07
 */

/** @var M_Customer $customer */
/** @var CI_Controller $this */
	$this->load->view('template/head');

?>
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2" style="padding-bottom: 0 !important;  margin-bottom: 0 !important;">
        <h3 class="content-header-title">Create Project</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><p class="danger">silahkan create project</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content-header-right col-md-6 col-12">
        <div class="float-md-right">
            <a class="btn btn-danger bg-accent-4 pull-up" type="button" href="<?php echo site_url('transaksi/project/index_adit')?>" ><i class="ft-arrow-left white"></i> Kembali</a>
            <a class="btn btn-success bg-accent-4 pull-up" type="button" href="javascript:void()" onclick="location.reload();" ><i class="ft-refresh-cw white"></i> Refresh</a>
        </div>
    </div>

</div>

<form method="post" class="form-horizontal" id="form_return" action="javascript:void(0)" onsubmit="simpan_create_project()" autocomplete="off">

    <div class="content-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 0.5rem !important">
                        <h4 class="card-title">Header</h4>
                        <hr>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload" ><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show" id="content-header">
                        <div class="card-body" style="padding-top: 0 !important">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="control-label">Customer</label>
                                        <select class="form-control" id="select2" name="customer" style="width: 100%">
                                            <option value="">Pilih Customer</option>
                                            <?php
                                            /** @var M_Customer $cust */
                                            foreach ($customer as $i => $cust)
                                            {
                                                echo "<option value='{$cust->id_customer}'>$cust->nm_customer</option>";
                                            }
                                            ?>
                                        </select>
                                        <div id="error_messages" class="NOTIF_ERROR_KD_TRANS_PENJUALAN"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Kasir</label>
                                        <input type="text" class="form-control" value="VANPERSIETYO" disabled="disabled">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button style="margin-top: 1.25rem !important;" type="submit" href="javascript:void(0)" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"> Create Project </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Block level buttons with icon -->
                                    <div class="form-group">
                                        <a style="margin-top: 1.25rem !important;" type="button" href="<?php echo site_url('transaksi/project/index_adit')?>" class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up"> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</form>

<script type="text/javascript">

    $(document).ready(function() {
        $('#select2').select2();
    });

    function simpan_create_project() {
        alert('nanti ya');
    }

</script>

<?php
	$this->load->view('template/foot');
?>


