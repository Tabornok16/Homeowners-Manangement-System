<?php
include('partial/header.php');
include('partial/navbar.php');
include('partial/sidebar.php');

$metrics = [
  [
    'title' => 'Registered Homeowners',
    'icon' => 'ion ion-person',
    'link' => 'user.view.php',
    'color' => 'bg-success',
    'data' => [
      'query' => 'SELECT COUNT(*) AS totalUsers FROM user',
      'error' => 'Error: Failed to fetch total users count.'
    ]
  ],
  [
    'title' => 'Registered Properties',
    'icon' => 'fas fa-home',
    'link' => 'property.view.php',
    'color' => 'bg-warning',
    'data' => [
      'include' => 'php/view.total.properties.php',
      'error' => 'Error: Failed to fetch total registered properties count.'
    ]
  ],
  [
    'title' => 'Transactions',
    'icon' => 'fas fa-exchange-alt',
    'link' => 'transaction.history.php',
    'color' => 'bg-info',
    'data' => [
      'include' => 'php/count_transaction.php',
      'error' => 'Error: Failed to fetch total transactions count.'
    ]
  ],
  [
    'title' => 'Reservations',
    'icon' => 'fas fa-calendar-check',
    'link' => '#',
    'color' => 'bg-primary',
    'data' => [
      'value' => 8
    ]
  ]
];

?>

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
            <li class="breadcrumb-item active">Administrator Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Display metrics -->
      <div class="row">
        <?php foreach ($metrics as $metric) : ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box <?php echo $metric['color'] ?>">
              <div class="inner">
                <?php
                // Check if data is defined
                if (isset($metric['data'])) {
                  // Check if query is defined
                  if (isset($metric['data']['query'])) {
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

                    // Execute the query
                    $result = $conn->query($metric['data']['query']);

                    if ($result) {
                      // Fetch the result as an associative array
                      $row = $result->fetch_assoc();

                      // Check if the result is not empty
                      if ($row) {
                        // Get the total count
                        $total = $row['totalUsers'];

                        // Display the total count
                        echo '<h3>' . $total . '</h3>';
                      } else {
                        // If the result is empty, display an error message
                        echo '<h3>' . $metric['data']['error'] . '</h3>';
                      }
                    } else {
                      // If query execution fails, display an error message
                      echo '<h3>' . $metric['data']['error'] . '</h3>';
                    }

                    // Close the database connection
                    $conn->close();
                  } elseif (isset($metric['data']['include'])) {
                    // Include the specified file
                    include($metric['data']['include']);
                  } elseif (isset($metric['data']['value'])) {
                    // Display the specified value
                    echo '<h3>' . $metric['data']['value'] . '</h3>';
                  }
                }
                ?>
                <p><?php echo $metric['title']; ?></p>
              </div>
              <div class="icon">
                <i class="<?php echo $metric['icon']; ?>"></i>
              </div>
              <a href="<?php echo $metric['link']; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- End of Display metrics -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include('partial/footer.php'); ?>