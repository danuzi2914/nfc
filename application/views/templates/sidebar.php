    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="layanan">
        <div class="sidebar-brand-text mx-3">IT HELPDESK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Main  Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('auth/statuslayanan')?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-tachometer-alt"></i>
           Dashboard
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('auth/statuslayanan')?>" rel="stylesheet">
             <i class="fas fa-fw fa-wrench"></i>  Service Status</a>
            <a class="collapse-item"  href="<?php echo base_url('auth/statussoftware')?>" rel="stylesheet">
              <i class="fas fa-desktop"></i> Software Status</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="layanan" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-server"></i>
           Master
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('auth/viewlayanan')?>" rel="stylesheet">
             <i class="fas fa-fw fa-wrench"></i>  Layanan</a>
            <a class="collapse-item"  href="<?php echo base_url('auth/user')?>" rel="stylesheet">
              <i class="fas fa-users"></i> Customer</a>
          </div>
        </div>
      </li>

      <!-- layanan form -->
      <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('auth/layananmasuk')?>" rel="stylesheet">
          <i class="far fa-id-card"></i>
          Service</a>
      </li>

      <!-- DATA USER -->
    <!--     <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('auth/user')?>" rel="stylesheet">
         <i class="fas fa-users"></i>
         Customer</a>
      </li>
 -->
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('auth/admin')?>" rel="stylesheet">
        <i class="fas fa-user-cog"></i>
          Administrator
        </a>
      </li>
          <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('auth/login')?>" rel="stylesheet">
         <i class="fas fa-fw fa-sign-out-alt"></i>
        Logout</a>
      </li>
            <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->