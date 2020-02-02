<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-static-top navbar-dark navbar-without-dd-arrow navbar-shadow"
role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('dashboard/hrd')?>"><i class="la la-dashboard"></i>
         <span>Dashboard</span>
       </a>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-users"></i><span>Customer Management</span></a>
       <ul class="dropdown-menu">
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

      </ul>
    </li>

    <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-globe"></i><span>Operasional</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/project')?>"
             data-toggle="dropdown"><i class="la la-file-archive-o"></i>Buat Project</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/fixAsset_Hdr') ?>"
                                data-toggle="dropdown"><i class="la la-file-archive-o"></i>Fix Assets</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/pembayaran')?>"
              data-toggle="dropdown"><i class="la la-money"></i>Pembayaran Project</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/pengeluaran')?>"
              data-toggle="dropdown"><i class="la la-money"></i>Pengeluaran Bulanan</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/asset') ?>"
                                data-toggle="dropdown"><i class="la la-money"></i>Fix Assets</a>
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

          <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-folder"></i>Operational</a>
           <ul class="dropdown-menu">
<!--             <li data-menu=""><a class="dropdown-item" href="--><?php //echo site_url('master/customer')?><!--"-->
<!--               data-toggle="dropdown"><i class="icon-diamond"></i>Customer</a>-->
<!--             </li>-->
<!--             <li data-menu=""><a class="dropdown-item" href="--><?php //echo site_url('master/supplier')?><!--"-->
<!--               data-toggle="dropdown"><i class="icon-star"></i>Notaris</a>-->
<!--             </li>-->
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
<!--           <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-credit-card"></i>Rekening Biaya</a>-->
<!--            <ul class="dropdown-menu">-->
<!--              <li data-menu=""><a class="dropdown-item" href="--><?php //echo site_url('master/jenisrekeningbiaya')?><!--"-->
<!--                data-toggle="dropdown">Kategori Rekening Biaya</a>-->
<!--              </li>-->
<!--              <li data-menu=""><a class="dropdown-item" href="--><?php //echo site_url('master/rekeningbiaya')?><!--"-->
<!--                data-toggle="dropdown">Rekening Biaya</a>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </li>-->
          <!-- <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/bank')?>"
            data-toggle="dropdown"><i class="icon-credit-card"></i>Bank</a>
          </li> -->
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/bank')?>"
                                data-toggle="dropdown"><i class="icon-credit-card"></i>Bank</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/kota')?>"
                                data-toggle="dropdown"><i class="la la-folder"></i>Kota</a>
            </li>
           <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/fix_assets')?>"
             data-toggle="dropdown"><i class="icon-trophy"></i>Aset</a>
           </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/targetpencapaian')?>"
                                data-toggle="dropdown"><i class="icon-target"></i>Target Omzet</a>
            </li>
<!--             <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-target"></i>Target</a>-->
<!--              <ul class="dropdown-menu">-->
<!--                 <li data-menu=""><a class="dropdown-item" href="--><?php //echo site_url('master/targetpencapaian')?><!--" data-toggle="dropdown"> Target Pencapaian Global</a>-->
<!--                </li>-->
<!--                <li data-menu=""><a class="dropdown-item" href="--><?php //echo site_url('master/hargalayanan')?><!--"-->
<!--                  data-toggle="dropdown">Target Pencapaian Per Produk</a>-->
<!--                </li>-->
<!--              </ul>-->
<!--            </li>-->
             <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/user')?>"
              data-toggle="dropdown"><i class="icon-users"></i>User</a>
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
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/biayapengeluaran')?>"
              data-toggle="dropdown"><i class="icon-calendar"></i>Biaya Pengeluaran<div class="badge badge-pill badge-danger"><?php echo $this->session->userdata('cuti')?></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/omzet')?>"
              data-toggle="dropdown"><i class="icon-calendar"></i>Project<div class="badge badge-pill badge-danger"></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/piutangoutstanding')?>"
              data-toggle="dropdown"><i class="icon-calendar"></i>Piutang Outstanding<div class="badge badge-pill badge-danger"></div></a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('report/labarugi')?>"
              data-toggle="dropdown"><i class="icon-calendar"></i>Laba Rugi<div class="badge badge-pill badge-danger"></div></a>
            </li>
<!--            <li data-menu=""><a class="dropdown-item" href="--><?php //echo site_url('report/labarugi')?><!--"-->
<!--              data-toggle="dropdown"><i class="icon-calendar"></i>Detail Order<div class="badge badge-pill badge-danger"></div></a>-->
<!--            </li>-->
<!--            <li data-menu=""><a class="dropdown-item" href="--><?php //echo site_url('report/labarugi')?><!--"-->
<!--              data-toggle="dropdown"><i class="icon-calendar"></i>Analytics<div class="badge badge-pill badge-danger"></div></a>-->
<!--            </li>-->
        </ul>
      </li>

        <li class=" nav-item pull-up" data-menu="">
            <a class="nav-link" href="<?php echo site_url('customers/track')?>" target="_blank"><i class="ft-search"></i>
                <span>Customers Track</span>
            </a>
        </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('auth/logout')?>"><i class="ft-power"></i>
         <span>Logout</span>
       </a>
      </li>


    </ul>
  </div>
</div>
