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
        <div class="col-xl-12 col-lg-12">
             <div class="card">
               <div class="card-header">
                 <h4 class="card-title">Report Gaji Karyawan</h4>
               </div>
               <div class="card-content">
                 <div class="card-body">
                   <p>Berikut Merupakan Laporan Dari Gaji Karyawan</p>
                   <ul class="nav nav-tabs nav-underline no-hover-bg">
                     <li class="nav-item">
                       <a class="nav-link" id="home-tab3" data-toggle="tab" href="#home3" aria-controls="home3"
                       aria-expanded="true">Gaji Semua Karyawan</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link active" id="profile-tab3" data-toggle="tab" href="#profile3" aria-controls="profile3"
                       aria-expanded="false">Slip Gaji</a>
                     </li>


                   </ul>
                   <div class="tab-content px-1 pt-1">
                     <div role="tabpanel" class="tab-pane" id="home3" aria-labelledby="home-tab3" aria-expanded="true">
                       <form method="post" target="print_popup" action="<?php echo site_url('report/hrd/gaji/cetak') ?>" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
                         <div class="form-body">
                           <h4 class="form-section"><i class="ft-clipboard"></i> Slip Gaji Karyawan</h4>
                                        <div class="row">
                                          <div class="col-6 mb-2">
                                            <div class="form-group">
                                                <label for="projectinput2">Tgl Awal</label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <button class="btn btn-info" type="button"><i class="la la-calendar"></i></button>
                                                  </div>
                                                  <input data-role="date" type='text' class="datepicker form-control" name="TGL_01" required />
                                              </div>
                                            </div>
                                          </div>

                                            <div class="col-6 mb-2">
                                              <div class="form-group">
                                                  <label for="projectinput2">Tgl Akhir</label>
                                                  <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <button class="btn btn-danger" type="button"><i class="la la-calendar"></i></button>
                                                    </div>
                                                  <input data-role="date" type='text' class="datepicker form-control" name="TGL_02" required />
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                     </div>

                           <div class="form-group">
                             <button type="submit" name="submitForm" value="rekap" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"><i class="la la-print"></i> Cetak</button>
                           </div>
                     </form>
                     </div>
                     <div class="tab-pane active" id="profile3" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                         <form method="post" target="print_popup" action="<?php echo site_url('report/hrd/gaji/cetak_karyawan') ?>" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
                           <div class="form-body">
                             <h4 class="form-section"><i class="ft-clipboard"></i> Laporan Semua Gaji Karyawan</h4>
                                          <div class="row">
                                            <div class="col-6 mb-2">
                                              <div class="form-group">
                                                  <label for="projectinput2">Tgl Awal</label>
                                                  <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <button class="btn btn-info" type="button"><i class="la la-calendar"></i></button>
                                                    </div>
                                                    <input data-role="date" type='text' class="datepicker form-control" name="TGL_01" required />
                                                </div>
                                              </div>
                                            </div>

                                              <div class="col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="projectinput2">Tgl Akhir</label>
                                                    <div class="input-group">
                                                      <div class="input-group-prepend">
                                                        <button class="btn btn-danger" type="button"><i class="la la-calendar"></i></button>
                                                      </div>
                                                    <input data-role="date" type='text' class="datepicker form-control" name="TGL_02" required />
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="projectinput2">Karyawan</label>
                                                    <div class="input-group">

                                                      <select  class="select2 form-control block" id="responsive_single" name="id_karyawan" style="width: 100%" required>
                                                         <option value=""> --- </option>
                                                         <?php foreach ($karyawan as $karyawan) { ?>
                                                           <option value="<?php echo $karyawan->id_karyawan ?>"> <?php echo "$karyawan->nama_karyawan" ?> </option>
                                                         <?php }?>
                                                       </select>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                       </div>

                             <div class="form-group">
                               <button type="submit" name="submitForm" value="non_rekap" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"><i class="la la-print"></i> Cetak</button>
                             </div>
                       </form>
                     </div>

                   </div>
                 </div>
               </div>
             </div>
           </div>
      </section>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
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
<!-- END PAGE LEVEL JS-->
<script type="text/javascript">
    var date = new Date();
    date.setDate(date.getDate());

    $('.datepicker').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
        //startDate: date,
    });

    $('.datepicker2').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
        //startDate: date,
    });

</script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/forms/select/form-select2.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/') ?>/app-assets/js/scripts/navs/navs.js" type="text/javascript"></script>
</body>
