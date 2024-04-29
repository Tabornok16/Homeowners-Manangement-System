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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Homeowner Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              // Code to fetch transaction count for the logged-in homeowner
              // Assuming user_id is stored in the session as $_SESSION['user_id']
              $id = $_SESSION['id'];
              try {
                  $db = new PDO("mysql:host=localhost;dbname=hoa_db", "root", "");
                  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $sql = "SELECT COUNT(*) AS transaction_count FROM transaction WHERE homeowner = :id";
                  $stmt = $db->prepare($sql);
                  $stmt->bindParam(':id', $id);
                  $stmt->execute();

                  $result = $stmt->fetch(PDO::FETCH_ASSOC);
                  $transactionCount = $result['transaction_count'];

                  echo '<h3>' . $transactionCount . '</h3>';
              } catch(PDOException $e) {
                  echo "Connection failed: " . $e->getMessage();
              }
              ?>

              <p>Total Transactions</p>
            </div>
            <div class="icon">
              <i class="fas fa-exchange-alt"></i>
            </div>
            <a href="./transaction.history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              // Code to fetch property count for the logged-in homeowner
              // Assuming user_id is stored in the session as $_SESSION['user_id']
              $id = $_SESSION['id'];
              try {
                  $db = new PDO("mysql:host=localhost;dbname=hoa_db", "root", "");
                  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $sql = "SELECT COUNT(*) AS property_count FROM property WHERE id = :id";
                  $stmt = $db->prepare($sql);
                  $stmt->bindParam(':id', $id);
                  $stmt->execute();

                  $result = $stmt->fetch(PDO::FETCH_ASSOC);
                  $propertyCount = $result['property_count'];

                  echo '<h3>' . $propertyCount . '</h3>';
              } catch(PDOException $e) {
                  echo "Connection failed: " . $e->getMessage();
              }
              ?>

              <p>Owned Properties</p>
            </div>
            <div class="icon">
              <i class="fas fa-home"></i>
            </div>
            <a href="./property.view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include('partial/footer.php'); ?>
