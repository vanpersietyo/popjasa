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

<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/css/core/colors/palette-gradient.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/fonts/simple-line-icons/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/app-assets/css/plugins/forms/wizard.css">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">


<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/css/style.css') ?>">
<!-- END Custom CSS-->
<div class="app-content content">

  <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Update Progress</h3>
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
      <section class="row match-height">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title info">*Data Customer : </h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                  <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content">
              <div class="card-body">
                <!-- Invoices List table -->
                           <div class="form-body">
                               <div class="form-group">
                                  <div class="row">

                                   <div class="col-md-4">
                                        <label>Nama Customer</label>
                                         <input name="nm_customer" value="<?php echo $customer->nm_customer;?>" placeholder="Nama Customer .." class="form-control" type="text" disabled>
                                   </div>
                                    <div class="col-md-4">
                                      <label>Telp Customer</label>
                                         <input name="tlp_customer" value="<?php echo $customer->tlp_customer;?>" placeholder="Telp Customer .." class="form-control" type="number" disabled>
                                     </div>

                                     <div class="col-md-4">
                                      <label>Hp Customer</label>
                                         <input name="telp2_customer" value="<?php echo $customer->telp2_customer;?>" placeholder="No Hp Customer .." class="form-control" type="number" disabled>
                                     </div>
                                   </div>

                                   <div class="row">
                                     <div class="col-md-6">
                                      <label>Email Customer</label>
                                         <input name="email_customer" value="<?php echo $customer->email_customer;?>" placeholder="Email Customer .." class="form-control" type="email" disabled>
                                     </div>

                                     <div class="col-md-6">
                                      <label>Kota Customer</label>
                                         <input name="kota_customer" value="<?php echo $customer->kota_customer;?>" placeholder="Kota Customer .." class="form-control" type="text" disabled>
                                     </div>
                                       <div class="col-md-12">
                                         <label>Note Contacted</label>
                                        <textarea name="keterangan" value="<?php echo $customer->keterangan;?>" placeholder="Keterangan .." maxlength="255" class="form-control" type="textarea" disabled></textarea>
                                       </div>
                                   </div>


                               </div>
                           </div>
                <!--/ Invoices table -->
              </div>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title info">*Produk Jasa Yang Dibeli : </h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                  <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content">
              <div class="card-body">
                <!-- Invoices List table -->
                <div class="table-responsive">
                  <table id="table2" class="table table-striped table-bordered sourced-data">
                    <thead>
                      <tr>
                        <th>Nama <?php echo $status?></th>
                        <th>Harga Pokok</th>
                        <th>Harga Jual</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>

                    <tfoot>
                      <th colspan="1">Total Harga Jual</th>
                      <th colspan="3"></th>

                    </tfoot>

                  </table>
                </div>
              <!--/ Invoices table -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="content-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h5 class="card-title danger">#Status Progress</h5>
                  <br>
              <div class="row">
                <div class="col-lg-1   col-md-6">
                </div>
                <div class="col-lg-1   col-md-6">
                </div>
                <div class="col-lg-1 col-md-6">
                  <div class="form-group">
                    <button type="button" class="btn mb-1 btn-dark btn-block pull-up" onclick="followup()"> <a>&nbsp;Minuta </a></button>
                  </div>
                </div>
                <div class="col-lg-1 col-md-6">
                  <div class="form-group">
                    <button type="button" class="btn mb-1 btn-dark  btn-block pull-up" onclick="firstcheck()"> <a>&nbsp;Akte </a></button>
                  </div>
                </div>
                <div class="col-lg-1 col-md-12">
                  <div class="form-group">
                    <button type="button" class="btn mb-1 btn-dark  btn-block pull-up" onclick="component()"> <a>&nbsp;Domisili </a></button>
                  </div>
                </div>
                <div class="col-lg-1 col-md-6">
                  <div class="form-group">
                    <button type="button" class="btn mb-1 btn-dark  btn-block pull-up" onclick="quotation()"> <a>&nbsp;NPWP </a></button>
                  </div>
                </div>
                <div class="col-lg-1 col-md-6">
                  <div class="form-group">
                    <button type="button" class="btn mb-1 btn-dark  btn-block pull-up" onclick="spk()"> <a>&nbsp;PN </a></button>
                  </div>
                </div>
                <div class="col-lg-1 col-md-6">
                  <div class="form-group">
                    <button type="button" class="btn mb-1 btn-dark  btn-block pull-up" onclick="spk()"> <a>&nbsp;SIUP </a></button>
                  </div>
                </div>
                <div class="col-lg-1 col-md-6">
                  <div class="form-group">
                    <button type="button" class="btn mb-1 btn-dark  btn-block pull-up" onclick="spk()"> <a>&nbsp;TDP </a></button>
                  </div>
                </div>
                <div class="col-lg-1 col-md-6">
                  <div class="form-group">
                    <button type="button" class="btn mb-1 btn-dark  btn-block pull-up" onclick="spk()"> <a>&nbsp;PKD </a></button>
                  </div>
                </div>
                <div class="col-lg-1   col-md-6">
                </div>
                <div class="col-lg-1   col-md-6">
                </div>
                <div class="col-lg-1   col-md-6">
                </div>
              <div>

            </div>
          </div>
        </div>
        </div>

      </div>

      <!-- Form wzard with step validation section start -->
      <section id="icon-tabs">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title danger">#Tracking Progress Produk Jasa </h4>
                         <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

                     </div>
                     <div class="card-content collapse show">
                         <div class="card-body">
                             <form action="#" class="icons-tab-steps wizard-notification">
                                 <!-- Step 1
                                 <h6 class="bg-dark"><i class="step-icon la la-file"></i> Minuta</h6>
                                 <fieldset>
                                   <div class="row">
                                     <div class="col-md-12">
                                       <div class="row">
                                         <div class="col-md-4">
                                          <label>Status</label>
                                            <select class="form-control" name="kota_customer"  width="100%" required>
                                               <option value="1"> Tidak Dikerjain </option>
                                               <option value="2"> On Progress </option>
                                               <option value="3"> Bermasalah </option>
                                               <option value="4"> Belum Dikerjain </option>
                                               <option value="5"> Sudah Dikerjakan </option>
                                             </select>
                                           </div>
                                         <div class="col-md-4">
                                           <div class="form-group">
                                               <label for="projectinput2">Tgl Minuta Jadi</label>
                                               <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <button class="btn btn-dark" type="button"><i class="la la-calendar"></i></button>
                                                 </div>
                                                 <input data-role="date" type='text' class="datepicker form-control" name="TGL_01" required />
                                             </div>
                                           </div>
                                         </div>
                                         <div class="col-md-4">
                                           <div class="form-group">
                                               <label for="projectinput2">Tgl TTD Minuta</label>
                                               <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <button class="btn btn-dark" type="button"><i class="la la-calendar"></i></button>
                                                 </div>
                                               <input data-role="date" type='text' class="datepicker form-control" name="TGL_02" required />
                                             </div>
                                           </div>
                                         </div>
                                         <div class="col-md-6">
                                           <label>Nama Client Yang Hadir Saat TTD</label>
                                            <textarea name="keterangan" placeholder="Ketik Disini .." maxlength="255" class="form-control" type="textarea" required></textarea>
                                         </div>
                                         <div class="col-md-6">
                                           <label>Pengertian Minuta</label>
                                             <textarea name="keterangan" placeholder="Ketik Disini .." maxlength="255" class="form-control" type="textarea" required></textarea>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </fieldset>
                                 <!-- Step Akte
                                 <h6><i class="step-icon la la-file"></i> Akte</h6>
                                 <fieldset>
                                   <div class="row">
                                     <div class="col-md-12">
                                       <div class="row">
                                         <div class="col-md-3">
                                          <label>Status</label>
                                            <select class="form-control" name="kota_customer"  width="100%" required>
                                               <option value="1"> Tidak Dikerjain </option>
                                               <option value="2"> On Progress </option>
                                               <option value="3"> Bermasalah </option>
                                               <option value="4"> Belum Dikerjain </option>
                                               <option value="5"> Sudah Dikerjakan </option>
                                             </select>
                                           </div>
                                         <div class="col-md-3">
                                           <div class="form-group">
                                               <label for="projectinput2">No Akte</label>
                                               <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <button class="btn btn-dark" type="button"><i class="la la-file"></i></button>
                                                 </div>
                                                 <input type='text' class="form-control" name="TGL_01" required />
                                             </div>
                                           </div>
                                         </div>
                                         <div class="col-md-3">
                                           <div class="form-group">
                                               <label for="projectinput2">Kedudukan Perusahaan</label>
                                               <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <button class="btn btn-dark" type="button"><i class="la la-calendar"></i></button>
                                                 </div>
                                               <input data-role="date" type='text' class="datepicker form-control" name="TGL_02" required />
                                             </div>
                                           </div>
                                         </div>

                                         <div class="col-md-3">
                                           <div class="form-group">
                                               <label for="projectinput2">Modal Yang Tercantum Dalam Akte</label>
                                               <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <button class="btn btn-dark" type="button"><i class="la la-calendar"></i></button>
                                                 </div>
                                               <input data-role="date" type='text' class="datepicker form-control" name="TGL_02" required />
                                             </div>
                                           </div>
                                         </div>
                                         <div class="col-md-3">
                                           <div class="form-group">
                                               <label for="projectinput2">No Akte</label>
                                               <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <button class="btn btn-dark" type="button"><i class="la la-file"></i></button>
                                                 </div>
                                                 <input type='text' class="form-control" name="TGL_01" required />
                                             </div>
                                           </div>
                                         </div>
                                         <div class="col-md-3">
                                           <label>Susunan Pengurus dan Nama Client</label>
                                            <textarea name="keterangan" placeholder="Ketik Disini .. (Contoh: akta pendirian,akta pembubaran atau akta perubahan)" maxlength="255" class="form-control" type="textarea" required></textarea>
                                         </div>
                                         <div class="col-md-3">
                                           <label>Keterangan Akte</label>
                                            <textarea name="keterangan" placeholder="Ketik Disini .. (Contoh: akta pendirian,akta pembubaran atau akta perubahan)" maxlength="255" class="form-control" type="textarea" required></textarea>
                                         </div>
                                         <div class="col-md-3">
                                           <label>Pengertian Akte</label>
                                             <textarea name="keterangan" placeholder="Ketik Disini .." maxlength="255" class="form-control" type="textarea" required></textarea>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </fieldset>
                                 <!-- Step 3
                                 <h6><i class="step-icon la la-map-o"></i> Domisili</h6>
                                 <fieldset>
                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="eventName2">Event Name :</label>
                                         <input type="text" class="form-control" id="eventName2">
                                       </div>
                                       <div class="form-group">
                                         <label for="eventType2">Event Type :</label>
                                         <select class="c-select form-control" id="eventType2" data-placeholder="Type to search cities"
                                         name="eventType2">
                                           <option value="Banquet">Banquet</option>
                                           <option value="Fund Raiser">Fund Raiser</option>
                                           <option value="Dinner Party">Dinner Party</option>
                                           <option value="Wedding">Wedding</option>
                                         </select>
                                       </div>
                                       <div class="form-group">
                                         <label for="eventLocation2">Event Location :</label>
                                         <select class="c-select form-control" id="eventLocation2" name="location">
                                           <option value="">Select City</option>
                                           <option value="Amsterdam">Amsterdam</option>
                                           <option value="Berlin">Berlin</option>
                                           <option value="Frankfurt">Frankfurt</option>
                                         </select>
                                       </div>
                                     </div>
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label>Event Date - Time :</label>
                                         <div class='input-group'>
                                           <input type='text' class="form-control datetime" />
                                           <span class="input-group-addon">
                                             <span class="ft-calendar"></span>
                                           </span>
                                         </div>
                                       </div>
                                       <div class="form-group">
                                         <label for="eventStatus2">Event Status :</label>
                                         <select class="c-select form-control" id="eventStatus2" name="eventStatus">
                                           <option value="Planning">Planning</option>
                                           <option value="In Progress">In Progress</option>
                                           <option value="Finished">Finished</option>
                                         </select>
                                       </div>
                                       <div class="form-group">
                                         <label>Requirements :</label>
                                         <div class="c-inputs-stacked">
                                           <div class="d-inline-block custom-control custom-checkbox">
                                             <input type="checkbox" name="status2" class="custom-control-input" id="staffing2">
                                             <label class="custom-control-label" for="staffing2">Staffing</label>
                                           </div>
                                           <div class="d-inline-block custom-control custom-checkbox">
                                             <input type="checkbox" name="status2" class="custom-control-input" id="catering2">
                                             <label class="custom-control-label" for="catering2">Catering</label>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </fieldset>
                                 <!-- Step 4
                                 <h6><i class="step-icon la la-money"></i> NPWP</h6>
                                 <fieldset>
                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="meetingName2">Name of Meeting :</label>
                                         <input type="text" class="form-control" id="meetingName2">
                                       </div>
                                       <div class="form-group">
                                         <label for="meetingLocation2">Location :</label>
                                         <input type="text" class="form-control" id="meetingLocation2">
                                       </div>
                                       <div class="form-group">
                                         <label for="participants2">Names of Participants</label>
                                         <textarea name="participants" id="participants2" rows="4" class="form-control"></textarea>
                                       </div>
                                     </div>
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="decisions2">Decisions Reached</label>
                                         <textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
                                       </div>
                                       <div class="form-group">
                                         <label>Agenda Items :</label>
                                         <div class="c-inputs-stacked">
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                                             <label class="custom-control-label" for="item21">1st item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item22">
                                             <label class="custom-control-label" for="item22">2nd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item23">
                                             <label class="custom-control-label" for="item23">3rd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item24">
                                             <label class="custom-control-label" for="item24">4th item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item25">
                                             <label class="custom-control-label" for="item25">5th item</label>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </fieldset>
                                 <!-- Step 5
                                 <h6><i class="step-icon la la-building"></i> PN</h6>
                                 <fieldset>
                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="meetingName2">Name of Meeting :</label>
                                         <input type="text" class="form-control" id="meetingName2">
                                       </div>
                                       <div class="form-group">
                                         <label for="meetingLocation2">Location :</label>
                                         <input type="text" class="form-control" id="meetingLocation2">
                                       </div>
                                       <div class="form-group">
                                         <label for="participants2">Names of Participants</label>
                                         <textarea name="participants" id="participants2" rows="4" class="form-control"></textarea>
                                       </div>
                                     </div>
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="decisions2">Decisions Reached</label>
                                         <textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
                                       </div>
                                       <div class="form-group">
                                         <label>Agenda Items :</label>
                                         <div class="c-inputs-stacked">
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                                             <label class="custom-control-label" for="item21">1st item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item22">
                                             <label class="custom-control-label" for="item22">2nd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item23">
                                             <label class="custom-control-label" for="item23">3rd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item24">
                                             <label class="custom-control-label" for="item24">4th item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item25">
                                             <label class="custom-control-label" for="item25">5th item</label>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </fieldset>
                                 <!-- Step 6
                                 <h6><i class="step-icon la la-building"></i> SIUP</h6>
                                 <fieldset>
                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="meetingName2">Name of Meeting :</label>
                                         <input type="text" class="form-control" id="meetingName2">
                                       </div>
                                       <div class="form-group">
                                         <label for="meetingLocation2">Location :</label>
                                         <input type="text" class="form-control" id="meetingLocation2">
                                       </div>
                                       <div class="form-group">
                                         <label for="participants2">Names of Participants</label>
                                         <textarea name="participants" id="participants2" rows="4" class="form-control"></textarea>
                                       </div>
                                     </div>
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="decisions2">Decisions Reached</label>
                                         <textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
                                       </div>
                                       <div class="form-group">
                                         <label>Agenda Items :</label>
                                         <div class="c-inputs-stacked">
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                                             <label class="custom-control-label" for="item21">1st item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item22">
                                             <label class="custom-control-label" for="item22">2nd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item23">
                                             <label class="custom-control-label" for="item23">3rd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item24">
                                             <label class="custom-control-label" for="item24">4th item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item25">
                                             <label class="custom-control-label" for="item25">5th item</label>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </fieldset>
                                 <!-- Step 7
                                 <h6><i class="step-icon la la-building"></i> TDP</h6>
                                 <fieldset>
                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="meetingName2">Name of Meeting :</label>
                                         <input type="text" class="form-control" id="meetingName2">
                                       </div>
                                       <div class="form-group">
                                         <label for="meetingLocation2">Location :</label>
                                         <input type="text" class="form-control" id="meetingLocation2">
                                       </div>
                                       <div class="form-group">
                                         <label for="participants2">Names of Participants</label>
                                         <textarea name="participants" id="participants2" rows="4" class="form-control"></textarea>
                                       </div>
                                     </div>
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="decisions2">Decisions Reached</label>
                                         <textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
                                       </div>
                                       <div class="form-group">
                                         <label>Agenda Items :</label>
                                         <div class="c-inputs-stacked">
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                                             <label class="custom-control-label" for="item21">1st item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item22">
                                             <label class="custom-control-label" for="item22">2nd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item23">
                                             <label class="custom-control-label" for="item23">3rd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item24">
                                             <label class="custom-control-label" for="item24">4th item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item25">
                                             <label class="custom-control-label" for="item25">5th item</label>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </fieldset>
                                 <!-- Step 8
                                 <h6><i class="step-icon la la-building"></i> PKD</h6>
                                 <fieldset>
                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="meetingName2">Name of Meeting :</label>
                                         <input type="text" class="form-control" id="meetingName2">
                                       </div>
                                       <div class="form-group">
                                         <label for="meetingLocation2">Location :</label>
                                         <input type="text" class="form-control" id="meetingLocation2">
                                       </div>
                                       <div class="form-group">
                                         <label for="participants2">Names of Participants</label>
                                         <textarea name="participants" id="participants2" rows="4" class="form-control"></textarea>
                                       </div>
                                     </div>
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="decisions2">Decisions Reached</label>
                                         <textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
                                       </div>
                                       <div class="form-group">
                                         <label>Agenda Items :</label>
                                         <div class="c-inputs-stacked">
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item21">
                                             <label class="custom-control-label" for="item21">1st item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item22">
                                             <label class="custom-control-label" for="item22">2nd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item23">
                                             <label class="custom-control-label" for="item23">3rd item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item24">
                                             <label class="custom-control-label" for="item24">4th item</label>
                                           </div>
                                           <div class="custom-control custom-checkbox">
                                             <input type="checkbox" name="agenda2" class="custom-control-input" id="item25">
                                             <label class="custom-control-label" for="item25">5th item</label>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </fieldset>
                                 -->
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
      </section>
            <!-- Form wzard with step validation section end -->
        </div>
      </div>
</div>


<!-- BEGIN VENDOR JS-->
<script src="<?php echo base_url('assets/app-assets/vendors/js/vendors.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/vendors/js/charts/jquery.sparkline.min.js') ?>"></script>
<script src="<?php echo base_url('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app-assets/js/scripts/customizer.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<!-- END PAGE LEVEL JS-->
<script type="text/javascript">

var save_method; //for save method string
var table;
var table2;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {
    table2 = $('#table2').DataTable({


        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('transaksi/project/ajax_project/'.$id_header)?>",
            "type": "POST"
        },

        "footerCallback": function ( row, data, start, end, display ) {
           var api = this.api(), data;

           // Remove the formatting to get integer data for summation
           var intVal = function ( i ) {
               return typeof i === 'string' ?
                   i.replace(/[\$,]/g, '')*1 :
                   typeof i === 'number' ?
                       i : 0;
           };

           // Total over all pages
           total = api
               .column( 2 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

           // Total over this page
           pageTotal = api
               .column( 2, { page: 'current'} )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );

          var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
         $( api.column( 2 ).footer() ).html(
             '<h5 class="text-bold-500"> '+ numFormat(pageTotal)
         );
       },

        "columns": [
            { mData: '0' },
            { mData: '1', render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { mData: '2', render: $.fn.dataTable.render.number( ',', '.', 0, '' )},
            { mData: '3'  },
        ],

    });
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

});

function reload_table()
{
  table.ajax.reload(null,false);
  table2.ajax.reload(null,false); //reload datatable ajax
}
</script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets') ?>/app-assets/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets') ?>/app-assets/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
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


  <script type="text/javascript">

  // Wizard tabs with numbers setup

  // Wizard tabs with icons setup
  $(".icons-tab-steps").steps({
      startIndex: 1,
      enableAllSteps: false,
      enablePagination: false,
      headerTag: "h6",
      bodyTag: "fieldset",
      transitionEffect: "fade",
      titleTemplate: '<span class="step">#index#</span> #title#',
      labels: {
          finish: 'Submit'
      },
      onFinished: function (event, currentIndex) {
          alert("Form submitted.");
      },
      labels: {
      cancel: "Cancel",
      current: "current step:",
      pagination: "Pagination",
      finish: "Wes Mari",
      enablePagination: false,
      next: "Lanjut",
      previous: "Mbalek",
      loading: "Loading ..."
  }
  });

  // Validate steps wizard

  // Show form
  var form = $(".steps-validation").show();

  $(".steps-validation").steps({
      headerTag: "h6",
      bodyTag: "fieldset",
      transitionEffect: "fade",
      titleTemplate: '<span class="step">#index#</span> #title#',
      labels: {
          finish: 'Submit'
      },
      onStepChanging: function (event, currentIndex, newIndex)
      {
          // Allways allow previous action even if the current form is not valid!
          if (currentIndex > newIndex)
          {
              return true;
          }
          // Forbid next action on "Warning" step if the user is to young
          if (newIndex === 3 && Number($("#age-2").val()) < 18)
          {
              return false;
          }
          // Needed in some cases if the user went back (clean up)
          if (currentIndex < newIndex)
          {
              // To remove error styles
              form.find(".body:eq(" + newIndex + ") label.error").remove();
              form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
          }
          form.validate().settings.ignore = ":disabled,:hidden";
          return form.valid();
      },
      onFinishing: function (event, currentIndex)
      {
          form.validate().settings.ignore = ":disabled";
          return form.valid();
      },
      onFinished: function (event, currentIndex)
      {
          alert("Submitted!");
      }
  });

  // Initialize validation
  $(".steps-validation").validate({
      ignore: 'input[type=hidden]', // ignore hidden fields
      errorClass: 'danger',
      successClass: 'success',
      highlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
      },
      unhighlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
      },
      errorPlacement: function(error, element) {
          error.insertAfter(element);
      },
      rules: {
          email: {
              email: true
          }
      }
  });


  // Initialize plugins
  // ------------------------------

  // Date & Time Range
  $('.datetime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
          format: 'MM/DD/YYYY h:mm A'
      }
  });
  </script>


<!-- End Bootstrap modal -->
</body>
