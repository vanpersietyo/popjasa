<?php $this->load->view('master/hrd/trans_tunjangan/assets/css')?>
<!-- END Custom CSS-->
<div class="app-content content">

  <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Tunjangan Karyawan</h3>
        </div>
      </div>

    <div class="content-body">
      <section class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <!-- Invoices List table -->
                <div class="table-responsive">
                  <table id="table" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th>Nama Karyawan</th>
                        <th width="10%"></th>
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

        <div class="col-6">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <!-- Invoices List table -->
                <div class="table-responsive">
                  <table id="table2" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th>Nama Karyawan</th>
                        <th>Tunjangan</th>
                        <th>Jumlah</th>
                          <th>Akun Bank</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                      <tr>
                          <th colspan="2"><h5 class="text-bold-500" align="right">Total Tunjangan:<h5></th>
                          <th colspan="3"></th>
                      </tr>
                  </tfoot>

                  </table>
                </div>
                <div class="row">
                  <?php if ($conf->st_data==0){ ?>
                    <div class="col-md-12">
                        <a type="button" href="<?php echo site_url('master/hrd/trans_tunjangan/konfirmasi/'.$this->session->userdata('yangLogin'));?>" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"> Save</a>
                    </div>
                  <?php }elseif ($conf->st_data==1) { ?>
                    <div class="col-md-12">
                        <a type="button" href="<?php echo site_url('master/hrd/trans_tunjangan/unkonfirmasi/'.$this->session->userdata('yangLogin'));?>" class="btn mb-1 btn-warning box-shadow-2 btn-lg btn-block pull-up"> Edit</a>
                    </div>
                  <?php } ?>

                </div>
                <!--/ Invoices table -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<?php $this->load->view('master/hrd/trans_tunjangan/assets/js')?>
<?php $this->load->view('master/hrd/trans_tunjangan/assets/modal')?>

<!-- End Bootstrap modal -->
</body>
