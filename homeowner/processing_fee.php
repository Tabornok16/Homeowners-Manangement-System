<?php include("partial/header.php");?>
<?php include("partial/navbar.php");?>
<?php include("partial/sidebar.php");?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment Processing Fee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Processing Fee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
            <?php

                // Database credentials
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "hoa_db";

                // Create connection
                $connection = mysqli_connect($servername, $username, $password, $database);

                // Assuming your_table_name is 'setprice' in hoa_db
                $sql = "SELECT Subcategory, type, subtype, unitStakeholder, price FROM setprice"; // Include 'price' in the query

                $result = mysqli_query($connection, $sql);
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Make Payment</title>
                <!-- Bootstrap CSS -->
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>
                <h1>Payment Details</h1>

                <!-- Dropdown menu for subtype selection -->
                <div class="form-group">
                    <label for="paymentSubtype">Subtype:</label>
                    <select class="form-control" id="paymentSubtype" name="paymentSubtype">
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['subtype']; ?>" data-price="<?php echo $row['price']; ?>"><?php echo $row['subtype']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Display the selected subtype's price dynamically -->
                <div id="priceDisplay"></div>

                <!-- Bootstrap JS and dependencies -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <!-- Custom JavaScript -->
                <script>
                    // Function to update the displayed price based on the selected subtype
                    $(document).ready(function() {
                        $('#paymentSubtype').change(function() {
                            var selectedSubtype = $(this).find('option:selected').data('price');
                            $('#priceDisplay').text('Price: PHP ' + selectedSubtype);
                        });
                    });
                </script>
            </body>
            </html>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <!-- Footer -->
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('partial/footer.php') ?>
