<?php $this->load->view('template/head'); ?>
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
                            <h4 class="card-title">Report Fix Asset</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="post" target="print_popup" action="<?php echo site_url('report/rfixasset/cetak') ?>" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
<!--                                    <div class="form-body">-->
<!--                                        <h4 class="form-section"><i class="ft-clipboard"></i> Laporan Fix Asset Perusahaan</h4>-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-6 mb-2">-->
<!--                                                <div class="form-group">-->
<!--                                                    <label for="projectinput2">Tgl Awal</label>-->
<!--                                                    <div class="input-group">-->
<!--                                                        <div class="input-group-prepend">-->
<!--                                                            <button class="btn btn-info" type="button"><i class="la la-calendar"></i></button>-->
<!--                                                        </div>-->
<!--                                                        <input data-role="date" type='text' class="datepicker form-control" name="TGL_01" required />-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!---->
<!--                                            <div class="col-6 mb-2">-->
<!--                                                <div class="form-group">-->
<!--                                                    <label for="projectinput2">Tgl Akhir</label>-->
<!--                                                    <div class="input-group">-->
<!--                                                        <div class="input-group-prepend">-->
<!--                                                            <button class="btn btn-danger" type="button"><i class="la la-calendar"></i></button>-->
<!--                                                        </div>-->
<!--                                                        <input data-role="date" type='text' class="datepicker form-control" name="TGL_02" required />-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div class="form-group">
                                        <button type="submit" name="submitForm" value="rekap" class="btn mb-1 btn-info box-shadow-2 btn-lg btn-block pull-up"><i class="la la-print"></i> Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php $this->load->view('template/foot'); ?>
