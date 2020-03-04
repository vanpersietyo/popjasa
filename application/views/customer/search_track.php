<?php $this->load->view('template/head'); ?>
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <h5 class="brand-text" style="text-align: center">POPJASA TRACKING ORDER</h5>
            </a>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="https://popjasa.id/"><i
                                    class="ficon ft-arrow-left"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row full-height-vh-with-nav">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-6 col-10">
                        <img class="img-fluid mx-auto d-block pb-3 pt-4 width-65-per"
                             src="<?php echo base_url('assets') ?>/app-assets/images/logo/logo-dark-lgpjs.png"
                             alt="">
                        <form action="<?php echo site_url('customers/track/order') ?>" method="post">
                            <fieldset class="form-group position-relative">
                                <input type="text" name="id_inv" class="form-control form-control-xl input-xl"
                                       id="id_inv" placeholder="Ketik Nomor Invoice Anda ..." required>
                                <div class="form-control-position">
                                    <i class="ft-search font-medium-4"></i>
                                </div>
                            </fieldset>
                            <div class="row py-2">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-dark btn-md"><i class="ft-search"></i> Search
                                        Tracking Produk
                                    </button>
                                    <a href="https://api.whatsapp.com/send?phone=6282301026622&amp;text=Pop%20Jasa,%20%20Ada%20yang%20bisa%20kami%20bantu%20?%20Saya%20ingin%20konsultasi%20mengenai%20perijinan%20usaha%20tentang%20.%20.%20."
                                       class="btn btn-success btn-md"><i class="la la-whatsapp"></i> Konsultasi ? Klik
                                        disini ..</a>

                                </div>
                            </div>
                        </form>
                        <!-- <div class="row py-1">
                          <div class="col-12 text-center">
                            <a href="https://api.whatsapp.com/send?phone=6282301026622&amp;text=Pop%20Jasa,%20%20Ada%20yang%20bisa%20kami%20bantu%20?%20Saya%20ingin%20konsultasi%20mengenai%20perijinan%20usaha%20tentang%20.%20.%20." class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter">
                              <span class="la la-whatsapp"></span>
                            </a>
                          </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer fixed-bottom footer-dark navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2"
                                                                                     href="https://nuhasmart.com"
                                                                                     target="_blank">NUHAPOS </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i
                    class="ft-heart pink"></i></span>
    </p>
</footer>
<?php $this->load->view('template/foot'); ?>
