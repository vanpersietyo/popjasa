<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-static-top navbar-dark navbar-without-dd-arrow navbar-shadow"
role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('dashboard/hrd')?>"><i class="la la-bar-chart-o"></i>
         <span>Dashboard</span>
       </a>
      </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('master/hrd/karyawan')?>"><i class="la la-users"></i>
         <span>Karyawan</span>
       </a>
      </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('master/hrd/jabatan')?>"><i class="la la-building"></i>
         <span>Jabatan</span>
       </a>
      </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('master/hrd/gaji')?>"><i class="la la-money"></i>
         <span>Gaji</span>
       </a>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-credit-card"></i><span>Kasbon</span> </a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/piutang_karyawan')?>"
              data-toggle="dropdown"><i class="la la-credit-card"></i>Piutang Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/pembayaran_karyawan')?>"
              data-toggle="dropdown"><i class="la la-credit-card"></i>Pembayaran Piutang Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
            </li>
        </ul>
      </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('master/hrd/bonus_karyawan')?>"><i class="la la-heart"></i>
         <span>Bonus</span>
       </a>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-calendar"></i><span>Kehadiran</span> </a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/absensi_karyawan')?>"
              data-toggle="dropdown"><i class="la la-calendar"></i>Absensi Karyawan<div class="badge badge-pill badge-danger"></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/hari_kerja')?>"
              data-toggle="dropdown"><i class="la la-calendar"></i>Detail Hari Kerja<div class="badge badge-pill badge-danger"></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/cuti')?>"
              data-toggle="dropdown"><i class="la la-calendar"></i>Ijin Tidak Hadir<div class="badge badge-pill badge-danger"></div></a>
            </li>
        </ul>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-file-text"></i><span>Laporan</span> </a>
        <ul class="dropdown-menu">

            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/hrd/absensi')?>"
              data-toggle="dropdown"><i class="la la-file"></i>Kehadiran Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/hrd/gaji')?>"
              data-toggle="dropdown"><i class="la la-file"></i>Gaji Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/hrd/cuti')?>"
              data-toggle="dropdown"><i class="la la-file"></i>Ketidakhadiran Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
            </li>
        </ul>
      </li>



      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('auth/logout')?>"><i class="ft-power"></i>
         <span>Logout</span>
       </a>
      </li>


    </ul>
  </div>
</div>
