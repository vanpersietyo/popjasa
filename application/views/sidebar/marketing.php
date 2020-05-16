 <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-static-top navbar-dark navbar-without-dd-arrow navbar-shadow"
role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('dashboard')?>"><i class="la la-dashboard"></i>
         <span>Dashboard</span>
       </a>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-users"></i><span>Customer Management</span></a>
       <ul class="dropdown-menu">

           <li data-menu="">
               <a class="dropdown-item" href="<?php echo site_url('sales/customer/all') ?>"
                  data-toggle="dropdown"><i class="icon-users"></i>List All Customer</a>
           </li>
           <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('sales/customer/contacted')?>"
             data-toggle="dropdown"><i class="icon-speech"></i>Customer Contacted</a>
           </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('sales/customer/deals')?>"
             data-toggle="dropdown"><i class="icon-user-following"></i>Customers Deal</a>
           </li>
           <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('sales/customer/lost')?>"
             data-toggle="dropdown"><i class="icon-user-unfollow"></i>Lost Customer</a>
           </li>
       </ul>
     </li>


    <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-globe"></i><span>Operasional</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/project')?>"
             data-toggle="dropdown"><i class="la la-file-archive-o"></i>Buat Project</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/fixAsset_hdr') ?>"
                                data-toggle="dropdown"><i class="la la-file-archive-o"></i>Fix Assets</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/pembayaran')?>"
              data-toggle="dropdown"><i class="la la-money"></i>Pembayaran Project</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/pengeluaran')?>"
              data-toggle="dropdown"><i class="la la-money"></i>Pengeluaran Bulanan</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/progress')?>"
              data-toggle="dropdown"><i class="la la-bar-chart"></i>Progress Project</a>
            </li>
        </ul>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-folder-open-o"></i><span>Master</span></a>
        <ul class="dropdown-menu">
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-folder"></i>Customer Management</a>
             <ul class="dropdown-menu">
               <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/sales/reason/lost')?>"
                 data-toggle="dropdown"><i class="la la-warning danger"></i>Lost Reason</a>
               </li>
               <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/sales/reason/deal')?>"
                 data-toggle="dropdown"><i class="la la-warning success"></i>Deal Reason</a>
               </li>
             </ul>
           </li>


          <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-folder"></i>Operational</a>
           <ul class="dropdown-menu">
             <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/agen')?>"
               data-toggle="dropdown"><i class="icon-moustache"></i>Agen</a>
             </li>
             <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-present"></i>Produk Jasa</a>
              <ul class="dropdown-menu">
                 <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/produkjasa')?>" data-toggle="dropdown">Produk Jasa</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/hargalayanan')?>"
                  data-toggle="dropdown">Harga Layanan Jasa</a>
                </li>
              </ul>
            </li>
           </ul>
         </li>

            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/rekeningbiaya')?>"
                                data-toggle="dropdown"><i class="icon-credit-card"></i>Rekening Biaya</a>
            </li>

            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/kota')?>"
                                data-toggle="dropdown"><i class="la la-folder"></i>Kota</a>
            </li>

        </ul>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-file-text"></i><span>Laporan</span> </a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/biayapengeluaran')?>"
              data-toggle="dropdown"><i class="icon-calendar"></i>Laporan Biaya Pengeluaran<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/omzet')?>"
              data-toggle="dropdown"><i class="icon-calendar"></i>Laporan Penjualan<div class="badge badge-pill badge-danger"></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/labarugi')?>"
              data-toggle="dropdown"><i class="icon-calendar"></i>Laporan Laba Rugi<div class="badge badge-pill badge-danger"></div></a>
            </li>
        </ul>
      </li>

        <li class=" nav-item pull-up" data-menu="">
            <a class="nav-link" href="<?php echo site_url('customers/track')?>" target="_blank"><i class="ft-search"></i>
                <span>Customers Track</span>
            </a>
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
