<?php include('partial/header.php'); ?>
<?php include('partial/navbar.php'); ?>
<?php include('partial/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Total Number of Homeowners -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
          <div class="inner">
          <?php
            // Include connect.php to establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hoa_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if $conn is defined and not null
            if ($conn) {
                // Query to count total users
                $sql = "SELECT COUNT(*) AS totalUsers FROM user";

                // Execute the query
                $result = $conn->query($sql);

                if ($result) {
                    // Fetch the result as an associative array
                    $row = $result->fetch_assoc();

                    // Check if the result is not empty
                    if ($row) {
                        // Get the total users count
                        $totalUsers = $row['totalUsers'];

                        // Display the total users count
                        echo '<h3>' . $totalUsers . '</h3>';
                    } else {
                        // If the result is empty, display an error message or default value
                        echo '<h3>Error</h3>';
                    }
                } else {
                    // If query execution fails, display an error message or default value
                    echo '<h3>Error</h3>';
                }

                // Close the database connection
                $conn->close();
            } else {
                // If $conn is not defined or null, display an error message
                echo '<h3>Error: Database connection failed.</h3>';
            }
            ?>
      <p>Total Number Homeowners Registered</p>
    </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
            <a href="user.view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
<!--End of Total number of Homeowners-->

<!--Total Number of Registered Properties-->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
            <?php
            // Include connect.php to establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hoa_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Query to count total registered properties
            $sql = "SELECT COUNT(*) AS totalProperties FROM property";

            // Execute the query
            $result = $conn->query($sql);

            if ($result) {
              // Fetch the result as an associative array
              $row = $result->fetch_assoc();

              // Check if the result is not empty
              if ($row) {
                // Get the total properties count
                $totalProperties = $row['totalProperties'];

                // Display the total properties count
                echo '<h3>' . $totalProperties . '</h3>';
              } else {
                // If the result is empty, display an error message or default value
                echo '<h3>Error</h3>';
              }
            } else {
              // If query execution fails, display an error message or default value
              echo '<h3>Error</h3>';
            }

            // Close database connection
            $conn->close();
            ?>
            <p>Total Number Registered Properties</p>
          </div>
          <div class="icon">
            <i class="fas fa-home"></i>
          </div>
          <a href="property.view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
<!--End Total Number of Registered Properties-->




        
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>44</h3>

              <p>Total Transactions</p>
            </div>
            <div class="icon">
            <i class="fas fa-exchange-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>



        
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>8</h3>

              <p>Total Number of Reservations</p>
            </div>
            <div class="icon">
            <i class="fas fa-calendar-check"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include('partial/footer.php'); ?>