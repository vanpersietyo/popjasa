<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 03/12/2019
 * Time: 15:07
 */

/** @var CI_Controller $this */
	$this->load->view('template/head');
?>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Create New Project</h3>
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
      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <button type="button" class="btn mb-1 btn-info btn-lg btn-block pull-up" onclick="add()"> <a> <i class="la la-plus"></i> Tambah Project Baru </a></button>
        </div>
      </div>

      <div class="col-lg-6 col-md-6">
        <div class="form-group">
          <a class="btn mb-1 btn-danger btn-lg btn-block pull-up" href="<?php echo site_url('transaksi/project')?>"><i class="ft-repeat"></i> Kembali</a>
        </div>
      </div>

    </div>

    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h5 class="content-header-title">List Data Customers Deal :</h5>
                  <br>
                <!-- Invoices List table -->
                <div class="table-responsive">
                  <table id="table" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
						  <th width="5%"></th>
						  <th>ID Project</th>
						  <th>Nama Project</th>
						  <th>Nama Customer</th>
						  <th>Jumlah Penjualan</th>
						  <th>Status</th>
						  <th>Tgl</th>
						  <th>Operator</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>

                  </table>
                </div>
                <!--/ Invoices table -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

<script type="text/javascript">

    $(document).ready(function() {
        table = $('#table').DataTable({
            "ajax": {
                "url": "<?php echo site_url('transaksi/project/ajax_list')?>",
            }
        });
    });

    function add() {
		window.location.href = "<?php echo site_url('transaksi/project/create_project')?>";
    }

</script>

<?php
	$this->load->view('template/foot');
?>

