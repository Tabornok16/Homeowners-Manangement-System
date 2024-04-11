  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #36007E;">
    <!-- Brand Logo -->
    <a href="./index.php" class="brand-link">
      <img src="../assets/img/home-logo.png" alt="HOA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">STAFF</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Welcome <?php echo $username; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="./index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i> <!-- Changed from "far fa-image" to "fas fa-tachometer-alt" for dashboard -->
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./user.view.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i> <!-- Changed from "far fa-image" to "fas fa-users" for users -->
              <p>
                Homeowner List
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="./property.view.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i> <!-- Changed from "far fa-image" to "fas fa-home" for property -->
              <p>
                Property
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./transaction.view.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i> <!-- Changed from "far fa-image" to "fas fa-home" for property -->
              <p>
                Transaction List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./calendar.view.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i> <!-- Changed from "far fa-image" to "fas fa-home" for property -->
              <p>
                Calendar
              </p>
            </a>
          </li>
   


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>