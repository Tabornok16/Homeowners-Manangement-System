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
                    <h1>Inquiry</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Inquiry</li>
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
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="display-6 text-left">Price List</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <!-- <th>Transaction ID</th>
                                            <th>Date</th> -->
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Type</th>
                                            <th>Subtype</th>
                                            <th>Unit/Stakeholder</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Establish a database connection
                                        $servername = "localhost";
                                        $username = "root"; // Your MySQL username
                                        $password = ""; // Your MySQL password
                                        $database = "hoa_db"; // Your database name

                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $database);

                                        // Perform SQL query to fetch data
                                        $sql = "SELECT * FROM setprice";
                                        $result = $conn->query($sql);

                                        // Check if the query was successful
                                        if ($result === false) {
                                            echo "Error executing the query: " . $conn->error;
                                        } else {
                                            // Check if the result set is not empty
                                            if ($result->num_rows > 0) {
                                                // Fetch data from the result set
                                                while ($row = $result->fetch_assoc()) {
                                                    // Process each row of data
                                                    echo "<tr>";
                                                    // echo "<td>" . $row['tx_Id'] . "</td>";
                                                    // echo "<td>" . $row['date'] . "</td>";
                                                    echo "<td>" . $row['category'] . "</td>";
                                                    echo "<td>" . $row['subcategory'] . "</td>";
                                                    echo "<td>" . $row['type'] . "</td>";
                                                    echo "<td>" . $row['subtype'] . "</td>";
                                                    echo "<td>" . $row['unitStakeholder'] . "</td>";
                                                    echo "<td>" . $row['price'] . "</td>";
                                                    echo "<td>" . '<a href="make_payment.php?amount=' . $row['price'] . '&value=' . $row['category'] . '" class="btn btn-primary">Submit Proof of Payment</a>' . "</td>";
                                                    echo "</tr>";
                                                    // Add more fields as needed
                                                }
                                            } else {
                                                // No rows found, handle this case if needed
                                                echo "<tr><td colspan='8'>No data found.</td></tr>";
                                            }
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
</section>



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