<!-- Navbar -->
<nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item dropdown">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Transaction</a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
        <!-- <li><a href="#" class="dropdown-item">Announcement</a></li> -->
        <li><a href="inquiry.php" class="dropdown-item">Inquiry</a></li>
        <li class="dropdown-submenu dropdown-hover">
          <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Payment</a>
          <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
            <li><a tabindex="-1" href="./create_hoa_dues.view.php" class="dropdown-item">HOA Dues</a></li>
            <li class="dropdown-submenu">
              <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Miscellaneous</a>
              <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                <li><a href="carsticker.php" class="dropdown-item">Car Sticker</a></li>
                <li><a href="rfid.php" class="dropdown-item">RFID</a></li>
                <li><a href="reservation.php" class="dropdown-item">Reservation</a></li>
                <li><a href="penalty.view.php" class="dropdown-item">View Penalty</a></li>

                <!-- <li class="dropdown-submenu">
                  <a id="dropdownSubMenu4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Construction</a>
                  <ul aria-labelledby="dropdownSubMenu4" class="dropdown-menu border-0 shadow">
                    <li><a href="processing_fee.php" class="dropdown-item">Processing Fee</a></li>
                    <li><a href="#" class="dropdown-item">Bond</a></li>
                    <li><a href="#" class="dropdown-item">Delivery Fee</a></li>
                    <li><a href="#" class="dropdown-item">Worker's ID</a></li>
                  </ul>
                </li> -->
                <li><a href="inquiry.php" class="dropdown-item">Other</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="transaction.history.php" class="dropdown-item">Transaction History</a></li>
      </ul>
    </li>
  </ul>

 <!-- Notifications Dropdown Menu -->
 <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">1</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">1 Notification</span>
        <div class="dropdown-divider"></div>
        <!-- <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a> -->
        <!-- <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a> -->
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 1 New HOA Dues
          <span class="float-right text-muted text-sm">2 mins ago</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item mr-lg-3">
      <a class="nav-link" href="calendar.php" style="font-size: 18px;">
        <i class="ion-calendar"></i>
        <?php
          date_default_timezone_set('Asia/Manila');
          $currentDateTime = date('l, F d, Y H:i');
          echo $currentDateTime;
        ?>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../logout.php" style="font-size: 18px;">
        <i class="fas fa-power-off" style="color: orange;"></i> Log Out
      </a>
    </li>
  </ul>
</nav>
<!-- /.Navbar -->