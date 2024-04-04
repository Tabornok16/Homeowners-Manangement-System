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
        $Today = date('y:m:d');
        $new = date('F d, Y', strtotime($Today));
        echo $new;
        ?>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../logout.php" style="font-size: 18px;">
        <i class="ion-log-out" style="color: gray;"></i> Log Out
      </a>
    </li>
  </ul>     
</nav>
