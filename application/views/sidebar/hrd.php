<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-static-top navbar-dark navbar-without-dd-arrow navbar-shadow"
role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('dashboard/hrd')?>"><i class="la la-dashboard"></i>
         <span>Dashboard</span>
       </a>
      </li>

     <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-sitemap"></i><span>HRD</span></a>
      <ul class="dropdown-menu">
        <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/absensi_karyawan')?>"
          data-toggle="dropdown"><i class="la la-calendar"></i>Absensi Karyawan<div class="badge badge-pill badge-danger"></div></a>
        </li>
        <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/cuti')?>"
         data-toggle="dropdown"><i class="la la-calendar"></i>Ijin Tidak Hadir / Cuti Karyawan</a>
       </li>
        <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/piutang_karyawan')?>"
           data-toggle="dropdown"><i class="la la-credit-card"></i>Pinjaman Karyawan</a>
       </li>
       <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/pembayaran_karyawan')?>"
         data-toggle="dropdown"><i class="la la-credit-card"></i>Pembayaran Piutang Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
       </li>
       <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/trans_tunjangan')?>"
         data-toggle="dropdown"><i class="la la-heart"></i>Tunjangan Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
       </li>
       <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/trans_potongan')?>"
         data-toggle="dropdown"><i class="la la-cut"></i>Potongan Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
       </li>
          <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/gaji') ?>"
                              data-toggle="dropdown"><i class="la la-file"></i>Pembayaran Gaji
                  <div class="badge badge-pill badge-danger"></div>
              </a>
          </li>

      </ul>
    </li>



      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-folder-open-o"></i><span>Master</span></a>
        <ul class="dropdown-menu">
           <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-folder"></i>HRD</a>
            <ul class="dropdown-menu">
              <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/karyawan')?>"
                data-toggle="dropdown"><i class="la la-file"></i>Master Karyawan<div class="badge badge-pill badge-danger"></div></a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/jabatan')?>"
                data-toggle="dropdown"><i class="la la-file"></i>Master Jabatan<div class="badge badge-pill badge-danger"></div></a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/gaji')?>"
                data-toggle="dropdown"><i class="la la-file"></i>Master Gaji<div class="badge badge-pill badge-danger"></div></a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/potongan')?>"
                data-toggle="dropdown"><i class="la la-file"></i>Master Potongan Karyawan<div class="badge badge-pill badge-danger"></div></a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/tunjangan')?>"
                data-toggle="dropdown"><i class="la la-file"></i>Master Tunjangan Karyawan <div class="badge badge-pill badge-danger"></div></a>
              </li>
              <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hrd/hari_kerja')?>"
                data-toggle="dropdown"><i class="la la-file"></i>Master Hari Kerja<div class="badge badge-pill badge-danger"></div></a>
              </li>
            </ul>
          </li>

        </ul>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-file-text"></i><span>Report</span> </a>
        <ul class="dropdown-menu">
          <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-folder"></i>HRD</a>
           <ul class="dropdown-menu">
             <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/hrd/absensi')?>"
               data-toggle="dropdown"><i class="la la-file"></i>Kehadiran Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
             </li>
             <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/hrd/gaji')?>"
               data-toggle="dropdown"><i class="la la-file"></i>Gaji Karyawan<div class="badge badge-pill badge-danger"></div></a>
             </li>
             <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/hrd/cuti')?>"
               data-toggle="dropdown"><i class="la la-file"></i>Ketidakhadiran Karyawan<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
             </li>
           </ul>
         </li>

        </ul>
      </li>




        <li class="dropdown nav-item pull-up" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-settings"></i><span>Setting</span> </a>

            <ul class="dropdown-menu">
                <!--                    <li data-menu="">-->
                <!--                        <a class="dropdown-item" href="--><?php //echo site_url('account.php') ?><!--">-->
                <!--                            <i class="icon-user"></i> Account</a>-->
                <!--                    </li>-->
                <li data-menu="">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="show_modal_change_password()">
                        <i class="icon-key"></i> <span>Change Password</span></a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>"><i class="ft-power"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </li>


    </ul>
  </div>
</div>
