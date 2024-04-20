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
                    <h1>Submit Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Submit Payment</li>
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

                // Check connection
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Assuming your_table_name is 'setprice' in hoa_db
                $sql = "SELECT Subcategory, type, subtype, unitStakeholder FROM setprice"; // Update table name if different

                $result = mysqli_query($connection, $sql);

                if ($result && isset($_GET['amount']) && isset($_GET['value'])) {
                    // Sanitize and retrieve the amount and value from the URL
                    $amount = filter_var($_GET['amount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $value = filter_var($_GET['value'], FILTER_SANITIZE_STRING);

                    // Fetch the values from the database result
                    $row = mysqli_fetch_assoc($result);
                    $subcategory = $row['Subcategory'];
                    $type = $row['type'];
                    $subtype = $row['subtype'];
                    $unitStakeholder = $row['unitStakeholder'];

                    // Perform payment processing logic here
                    // For demonstration purposes, we'll just display a success message including the retrieved values
                    $paymentMessage = "<br> <br> Payment of PHP $amount for $value <br><br> Deposit in this Bank. <br> <br> BPI Account
<br> Bank Account Name: Jubilation Home Village East Homeowner's Association Inc. <br> Account Number: 002641-0027-02 <br> BPI Biñan City <br> <br>     Do you want to proceed? <br> <br>";
                } else {
                    // Redirect the user back to the previous page or show an error message if parameters are missing
                    header("Location: index.php"); // Redirect to index.php or any other appropriate page
                    exit(); // Stop further execution
                }
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
    <?php if (isset($paymentMessage)) : ?>
        <p><?php echo $paymentMessage; ?></p>
    <?php endif; ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">
        Yes, Submit Payment Reference Number
    </button>
    <a href="inquiry.php" class="btn btn-secondary">Cancel</a>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Payment form -->
                    <form action="submit_payment.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="paymentAmount">PHP Amount:</label>
                            <input type="text" class="form-control" id="paymentAmount" name="paymentAmount" value="<?php echo $amount; ?>" readonly>
                        </div>

                        <?php
                        // Construct the payment message
                        $paymentMessage = "Payment for $value";
                        
                        ?>
                        <input type="text" class="form-control" id="paymentfor" name="paymentfor" value="<?php echo filter_var($_GET['value'], FILTER_SANITIZE_STRING);; ?>" readonly> </input>
                        <!-- Display the payment message -->
                        <div class="alert alert-info" role="alert">
                            <?php echo $paymentMessage; ?>
                        </div>

                        <!-- <div class="form-group">
                            <label for="paymentCategory">Category:</label>
                            <input type="text" class="form-control" id="paymentCategory" name="paymentCategory" value="<?php echo $value; ?>" readonly>
                        </div> -->
                        <div class="form-group">
                            <label for="paymentReference">Reference Number:</label>
                            <input type="text" class="form-control" id="paymentReference" name="paymentReference">
                        </div>
                        <div class="form-group">
                            <label for="proofImage">Proof of Payment:</label>
                            <input type="file" class="form-control-file" id="proofImage" name="proofImage">
                        </div>
                        <!-- Add more payment form fields as needed -->
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                        <a href="inquiry.php" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

    



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



<script>
// Assuming you're using jQuery for AJAX requests
$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Submit the form via AJAX
        $.ajax({
            url: 'submit_payment.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                // Check the response from the server
                if (response.success) {
                    // Display success Toastr notification
                    toastr.success(response.success);

                    // Redirect after displaying Toastr notification
                    setTimeout(function() {
                        window.location.href = 'create_hoa_dues.view.php';
                    }, 1000); // Redirect after 3 seconds (adjust the time as needed)
                } else if (response.error) {
                    // Display error Toastr notification
                    toastr.error(response.error);
                }
            },
            error: function(xhr, status, error) {
                // Display error Toastr notification for AJAX errors
                toastr.error('AJAX Error: ' + error);
            }
        });
    });
});


</script>