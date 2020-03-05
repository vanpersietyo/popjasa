<?php $this->load->view('./template/head'); ?>
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

    <?php if (isset($pages)) $this->load->view($pages); ?>

<footer class="footer fixed-bottom footer-dark navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2"
                                                                                     href="https://nuhasmart.com"
                                                                                     target="_blank">NUHAPOS </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i
                class="ft-heart pink"></i></span>
    </p>
</footer>

<?php $this->load->view('./template/foot'); ?>
