<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/vendors.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/icheck.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/icheck/custom.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/meteocons/style.css') ?>">

<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/app.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/extensions/sweetalert.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/plugins/animate/animate.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/vendors/css/forms/selects/select2.min.css') ?>">

<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">


<!-- END Page Level CSS-->
<style media="screen">
label {
  display: inline-block;
  margin-bottom: .5rem;
  font-size: 18px;
  font-weight: 500;
}
</style>


<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css') ?>">
<!-- END Custom CSS-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="col-xl-12 col-lg-12">
        <div class="heading-elements text-right">
        </div>
      </div>
    </div>
    <div class="content-body">
      <section class="row">
        <div class="col-xl-12 col-lg-12 col-12">
                <div class="card">
                  <div class="card-content collapse show">
                    <div class="card-body">
                      <h2 align="center">Form Pembayaran</h2>
                      <h4 align="center"><b>"POPJASA"</b></h4> <br>
                       <?php echo form_open_multipart('transaksi/pembayaran/simpan')?>
                        <div class="form-body">
                          <!-- <h4 class="form-section"><i class="ft-clipboard"></i> Data Expenses</h4> -->
                             <input type="hidden" value="<?php echo $id_sppd?>" name="id_sppd"/>
                               <div class="form-body">
                                 <div class="form-body">
                                       <div class="row">
                                         <div class="col-6 mb-2">
                                           <div class="form-group">
                                             <label for="projectinput2">Nama Customers</label>
                                               <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <button class="btn btn-dark" type="button"><i class="ft-users"></i></button>
                                                 </div>
                                               <input type="text" value="<?php echo $project->nm_customer?>"class="form-control" placeholder="Value"
                                              data-toggle="tooltip" data-trigger="hover"
                                               data-placement="top" data-title="Value" required="" disabled>
                                             </div>
                                           </div>
                                          </div>

                                          <div class="col-6 mb-2">
                                            <div class="form-group">
                                              <label for="projectinput2">Nama Produk</label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <button class="btn btn-dark" type="button"><i class="ft-globe"></i></button>
                                                  </div>
                                                <input type="text" value="<?php echo $project->nama_layanan?>" class="form-control" placeholder="Value"
                                                 data-toggle="tooltip" data-trigger="hover"
                                                data-placement="top" data-title="Value" required="" disabled>
                                              </div>
                                            </div>
                                           </div>

                                           <div class="col-6 mb-2">
                                             <div class="form-group">
                                               <label for="projectinput2">Nilai Project</label>
                                                 <div class="input-group">
                                                   <div class="input-group-prepend">
                                                     <button class="btn btn-dark" type="button">IDR</button>
                                                   </div>
                                                 <input type="text" value="<?php echo number_format($project->harga) ?>"  class="form-control" placeholder="Value"
                                                  data-toggle="tooltip" data-trigger="hover"
                                                 data-placement="top" data-title="Value" required="" disabled>
                                               </div>
                                             </div>
                                            </div>



                                           <div class="col-3 mb-2">
                                               <div class="form-group">
                                                   <label for="projectinput2">Tgl Transaksi Pembayaran</label>
                                                   <div class="input-group">
                                                       <div class="input-group-prepend">
                                                           <button class="btn btn-dark" type="button"><i class="ft-calendar"></i></button>
                                                       </div>
                                                       <input type="text" value="<?php echo date("d - m - Y"); ?>" class="form-control" placeholder="Value"
                                                              data-toggle="tooltip" data-trigger="hover"
                                                              data-placement="top" data-title="Value" required="" disabled>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-3 mb-2">
                                               <div class="form-group">
                                                   <label for="projectinput2">Tgl Deal Project</label>
                                                   <div class="input-group">
                                                       <div class="input-group-prepend">
                                                           <button class="btn btn-dark" type="button"><i class="ft-calendar"></i></button>
                                                       </div>
                                                       <input type="text" value="<?php echo date("d - m - Y", strtotime($project->tgl_input)); ?>" class="form-control" placeholder="Value"
                                                              data-toggle="tooltip" data-trigger="hover"
                                                              data-placement="top" data-title="Value" required="" disabled>
                                                   </div>
                                               </div>
                                           </div>

                                             <div class="col-12 mb-2">
                                               <div class="form-group">
                                                 <label for="projectinput2">Keterangan Project</label>
                                                   <div class="input-group">
                                                     <textarea maxlength="114" value="<?php echo $project->keterangan ?>" placeholder="Keterangan .." data-toggle="tooltip" data-trigger="hover"
                                                     data-placement="top" data-title="Keterangan Pembayaran" class="form-control" rows="2"  disabled><?php echo $project->keterangan ?></textarea>
                                                                 <span class="help-block"></span>
                                                 </div>
                                               </div>
                                              </div>

                                          <div class="col-6 mb-2">
                                            <div class="form-group">
                                              <label for="projectinput2">Total Bayar</label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <button class="btn btn-dark" type="button">IDR</button>
                                                  </div>
                                                <input type="text" value="<?php echo number_format($tot_bayar->total_bayar) ?>" class="form-control" placeholder="Value"
                                                 data-toggle="tooltip" data-trigger="hover"
                                                data-placement="top" data-title="Value" required="" disabled>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-6 mb-2">
                                            <div class="form-group">
                                              <label for="projectinput2">Kurang Bayar</label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <button class="btn btn-dark" type="button">IDR</button>
                                                  </div>
                                                <input type="text" name="value" value="<?php echo number_format($jml_project->harga_jual-$tot_bayar->total_bayar)?>" class="form-control" placeholder="Value"
                                                 data-toggle="tooltip" data-trigger="hover"
                                                data-placement="top" data-title="Value" required="" disabled>
                                              </div>
                                            </div>
                                          </div>

                                           <div class="col-6 mb-2">
                                             <div class="form-group">
                                             <label for="projectinput2">Tipe Pembayaran</label>
                                               <select class="select2 form-control block" id="responsive_single" name="tipe_pay" style="width: 100%" required>
                                                 <option value="" class="disabled">-----</option>
                                                  <option value="cash" >Cash</option>
                                                  <option value="tf_bca" >Transfer BCA</option>
                                                  <option value="tf_mandiri" >Transfer Mandiri</option>
                                               </select>
                                             </div>
                                           </div>


                                           <div class="col-6 mb-2">
                                             <div class="form-group">
                                               <label for="projectinput2">Jumlah Pembayaran</label>
                                               <input type="hidden" name="id_project" value="<?php echo $project->id_project; ?>">
                                                 <div class="input-group">
                                                   <div class="input-group-prepend">
                                                     <button class="btn btn-dark" type="button">IDR</button>
                                                   </div>
                                                 <input type="text" name="jumlah_pay" class="form-control" placeholder="Value"
                                                 id="tanpa-rupiah" data-toggle="tooltip" data-trigger="hover"
                                                 data-placement="top" data-title="Value" required="">
                                               </div>
                                             </div>
                                           </div>


                                         </div>


                                     <div class="row">
                                       <div class="form-group col-12 mb-2">
                                         <label for="issueinput8">Keterangan</label>
                                         <textarea maxlength="114" name="keterangan" placeholder="Keterangan .." data-toggle="tooltip" data-trigger="hover"
                                   data-placement="top" data-title="Keterangan Pembayaran" class="form-control" rows="3"  required></textarea>
                                               <span class="help-block"></span>
                                       </div>
                                     </div>

                                 </div>
                         </div>

                          <div class="form-group">
                            <button type="button submit" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"><i class="la la-check"></i> Simpan</button>

                            <a href="<?php echo site_url('transaksi/pembayaran');?>">
                              <button type="button" class="btn mb-1 btn-danger box-shadow-2 btn-lg btn-block pull-up">
                                <i class="la la-close"></i> Batal
                              </button>
                            </a>

                          </div>
                    <?php echo form_close();?>
                    </div>
                  </div>
                </div>
              </div>
      </section>
    </div>
  </div>
</div>
<!-- BEGIN VENDOR JS-->
<script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

<script type="text/javascript">

/* Tanpa Rupiah */
var tanpa_rupiah = document.getElementById('tanpa-rupiah');
tanpa_rupiah.addEventListener('keyup', function(e)
{
 tanpa_rupiah.value = formatRupiah(this.value);
});

/* Tanpa Rupiah 2*/
var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
tanpa_rupiah2.addEventListener('keyup', function(e)
{
 tanpa_rupiah2.value = formatRupiah(this.value);
});

/* Dengan Rupiah */
var dengan_rupiah = document.getElementById('dengan-rupiah');
dengan_rupiah.addEventListener('keyup', function(e)
{
 dengan_rupiah.value = formatRupiah(this.value);
});

/* Fungsi */
function formatRupiah(angka, prefix)
{
 var number_string = angka.replace(/[^,\d]/g, '').toString(),
   split = number_string.split(','),
   sisa  = split[0].length % 3,
   rupiah  = split[0].substr(0, sisa),
   ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

 if (ribuan) {
   separator = sisa ? '.' : '';
   rupiah += separator + ribuan.join('.');
 }

 rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
 return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

</script>




<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>" type="text/javascript"></script>


<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js') ?>" type="text/javascript"></script>
</body>
