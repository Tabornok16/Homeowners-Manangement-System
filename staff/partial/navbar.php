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

        <li><a href="#" class="dropdown-item">Homeowner Verification</a></li>
        <li><a href="#" class="dropdown-item">Posting Announcement</a></li>



        <!-- Level two dropdown-->
        <li class="dropdown-submenu dropdown-hover">
          <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Payment</a>
          <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
            <li>
              <a tabindex="-1" href="#" class="dropdown-item">HOA Dues</a>
            </li>

            <!-- Level three dropdown -->
            <li class="dropdown-submenu">
              <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Miscellaneous</a>
              <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                <li><a href="#" class="dropdown-item">RFID</a></li>
                <li><a href="#" class="dropdown-item">Car Sticker</a></li>
                <li><a href="#" class="dropdown-item">Reservation</a></li>
                <li><a href="#" class="dropdown-item">Penalty</a></li>
                <li class="dropdown-submenu"> <!-- New dropdown submenu for "Construction" -->
                  <a id="dropdownSubMenu4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Construction</a>
                  <ul aria-labelledby="dropdownSubMenu4" class="dropdown-menu border-0 shadow">
                    <li><a href="#" class="dropdown-item">Processing Fee</a></li>
                    <li><a href="#" class="dropdown-item">Bond</a></li>
                    <li><a href="#" class="dropdown-item">Delivery Fee</a></li>
                    <li><a href="#" class="dropdown-item">Worker's ID</a></li>
                    <!-- Add more construction-related items as needed -->
                  </ul>
                </li>
                <li><a href="#" class="dropdown-item">Other</a></li>
              </ul>
            </li>
            <!-- End Level three -->

          </ul>
        </li>
        <!-- End Level two -->
        <li><a href="#" class="dropdown-item">Transaction History</a></li>
      </ul>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item mr-lg-3">
      <a class="nav-link" style="font-size: 18px;">
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
        <i class="ion-log-out" style="color: red;"></i> Log Out
      </a>
    </li>
  </ul>
</nav>