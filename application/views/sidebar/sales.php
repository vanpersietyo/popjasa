<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-static-top navbar-dark navbar-without-dd-arrow navbar-shadow"
role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('dashboard')?>"><i class="la la-dashboard"></i>
         <span>Dashboard</span>
       </a>
      </li>



      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('sales/master/area')?>"><i class="la la-map"></i>
         <span>Area</span>
       </a>
      </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('sales/customer/all')?>"><i class="la la-users"></i>
         <span>All Customer</span>
       </a>
      </li>

      <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-warning"></i><span>Reason</span> </a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/sales/reason/lost')?>"
              data-toggle="dropdown"><i class="la la-warning danger"></i>Lost Reason</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('master/sales/reason/deal')?>"
              data-toggle="dropdown"><i class="la la-warning success"></i>Deal Reason</a>
            </li>
        </ul>
      </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('sales/customer/contacted')?>"><i class="la la-comments"></i>
         <span>Customer Contacted</span>
       </a>
      </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('sales/customer/deals')?>"><i class="la la-flag-checkered"></i>
         <span>Customer Deals</span>
       </a>
      </li>

      <li class=" nav-item pull-up" data-menu="">
       <a class="nav-link" href="<?php echo site_url('sales/customer/lost')?>"><i class="la la-frown-o"></i>
         <span>Lost Customer</span>
       </a>
      </li>




    <li class="dropdown nav-item pull-up" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-clipboard"></i><span>Project</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/project')?>"
             data-toggle="dropdown"><i class="la la-file-archive-o"></i>Buat Project</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo site_url('transaksi/progress')?>"
              data-toggle="dropdown"><i class="la la-bar-chart"></i>Progress Project</a>
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
