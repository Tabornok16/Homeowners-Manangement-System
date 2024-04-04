<!-- Navbar -->
<nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
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
      </a>
    </li>
  </ul>     
</nav>
