<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar" style="background-color: #11101D;">
  <!-- Brand Logo -->
  <a href="./index.php" class="brand-link">
    <img src="../assets/img/home-logo.png" alt="HOA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ADMINISTRATOR</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../assets/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Welcome
          <?php echo $username; ?>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php
        $currentFile = basename($_SERVER['PHP_SELF']);
        ?>

        <li class="nav-item <?php echo ($currentFile === 'index.php') ? 'menu-open' : ''; ?>">
          <a href="./index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item <?php echo ($currentFile === 'user.view.php') ? 'menu-open' : ''; ?>">
          <a href="./user.view.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        <li class="nav-item <?php echo ($currentFile === 'transaction.history.php') ? 'menu-open' : ''; ?>">
          <a href="transaction.history.php" class="nav-link">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>
              Transaction
            </p>
          </a>
        </li>
        <li class="nav-item <?php echo ($currentFile === 'property.view.php') ? 'menu-open' : ''; ?>">
          <a href="./property.view.php" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Property
            </p>
          </a>
        </li>
        <!-- <li class="nav-item <?php echo ($currentFile === 'calendar.view.php') ? 'menu-open' : ''; ?>">
          <a href="./calendar.view.php" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Calendar
            </p>
          </a> -->
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link show-multilevel-sidebar">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Master List
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./set_price.view.php" class="nav-link">
                <i class="nav-icon fas fa-dollar-sign"></i>
                <p>
                  Set Price
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./category_list.view.php" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./stakeholder_list.view.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Unit/Stakeholder</p>
              </a>
            </li>
          </ul>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>