<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-static-top navbar-dark navbar-without-dd-arrow navbar-shadow"
role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('dashboard/hrd')?>"><i class="la la-dashboard"></i>
         <span>Dashboard</span>
       </a>
      </li>



    <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-globe"></i><span>Operasional</span></a>
        <ul class="dropdown-menu">
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
