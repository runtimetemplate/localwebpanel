  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Innovention</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="data:image/png;base64,<?php echo $_SESSION["admin_user_profile"];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["admin_user_fname"] . ' ' . $_SESSION["admin_user_lname"];?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="?dashboard" class="nav-link  <?= ($_SERVER['REQUEST_URI']=="/admin/?dashboard" || $_SERVER['REQUEST_URI']=="/admin/" )?"active":"";?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?inbox" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?inbox" || $_SERVER['REQUEST_URI']=="/admin/?compose" )?"active":"";?>">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Inbox
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?outlets" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?outlets")?"active":"";?>">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Outlets
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?sales" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?sales" || $_SERVER['REQUEST_URI']=="/admin/?gtoid=".$_GET['gtoid'] || $_SERVER['REQUEST_URI']=="/admin/?viewoutletsales=".$_GET['viewoutletsales'])?"active":"";?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Sales
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?users" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?users")?"active":"";?>">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-header">POS Settings</li>
          <li class="nav-item">
            <a href="?settings" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?settings")?"active":"";?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                General Settings
              </p>
            </a>
          </li>       
          <li class="nav-item">
            <a href="?defprod" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?defprod" || $_SERVER['REQUEST_URI']=="/admin/?edtprd=" . $_GET['edtprd'])?"active":"";?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?defcat" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?defcat")?"active":"";?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="?defform" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?defform" || $_SERVER['REQUEST_URI']=="/admin/?edtfrm=" . $_GET['edtfrm'])?"active":"";?>">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Formula
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?definv"class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?definv")?"active":"";?>">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Inventory
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?pmanagement"class="nav-link <?= ($_SERVER['REQUEST_URI']=="/admin/?pmanagement")?"active":"";?>">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Price Management
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
