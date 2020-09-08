  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Innovention</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="data:image/png;base64,<?php echo $_SESSION["client_user_profile"];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["client_user_fname"] . ' ' . $_SESSION["client_user_lname"];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php?dashboard" class="nav-link  <?= ($_SERVER['REQUEST_URI']=="/client/index.php?dashboard" || $_SERVER['REQUEST_URI']=="/client/" || $_SERVER['REQUEST_URI']=="/client/index.php" )?"active":"";?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?outlets" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/client/index.php?outlets" || $_SERVER['REQUEST_URI']=="/client/view_outlets.php?id=".$_GET['id'])?"active":"";?>">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Outlets
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?users" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/client/index.php?users")?"active":"";?>">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Employees
              </p>
            </a>
          </li>
          <!-- <li class="nav-header">POS Settings</li>
          <li class="nav-item">
            <a href="index.php?settings" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/clientclient/index.php?settings")?"active":"";?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                General Settings
              </p>
            </a>
          </li>       
          <li class="nav-item">
            <a href="index.php?defprod" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/client/index.php?defprod" || $_SERVER['REQUEST_URI']=="/client/editproductpage.php?id=" . $_GET['id'])?"active":"";?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?defcat" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/client/index.php?defcat")?"active":"";?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?defform" class="nav-link <?= ($_SERVER['REQUEST_URI']=="/client/index.php?defform" || $_SERVER['REQUEST_URI']=="/client/editformulapage.php?id=" . $_GET['id'])?"active":"";?>">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Formula
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?definv"class="nav-link <?= ($_SERVER['REQUEST_URI']=="/client/index.php?definv")?"active":"";?>">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Inventory
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?pmanagement"class="nav-link <?= ($_SERVER['REQUEST_URI']=="/client/index.php?pmanagement")?"active":"";?>">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Price Management
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
    </div>
  </aside>
