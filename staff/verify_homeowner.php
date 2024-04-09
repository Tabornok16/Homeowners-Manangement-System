<?php include('partial/header.php'); ?>
<?php include('partial/navbar.php'); ?>
<?php include('partial/sidebar.php'); ?>
<?php include('../connect.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Verify Homeowners</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Verify Homeowners</li>
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
                // Establish connection to MySQL database
                $servername = "localhost";
                $username = "root"; // Replace with your MySQL username
                $password = ""; // Replace with your MySQL password
                $dbname = "hoa_db";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                if (isset($row['verification'])) {
                    // Access the 'verification_status' key
                    $verification = $row['verification'];
                    // Proceed with using $verification variable or perform other operations
                } else {
                    // Handle the case when 'verification' key is not set in the array
                    echo "";
                }
                

                // Query to fetch users information
                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output table header
                    echo "<h2>Users Information</h2>";
                    echo "<table><tr><th>User ID</th><th>User Name</th><th>First Name</th><th>Last Name</th><th>User Type</th><th>Gender</th><th>Email</th><th>Phone Number</th><th>Mailing Address</th><th>Postal Code</th><th>Birthday</th><th>Verification Status</th><th>Actions</th></tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["firstname"] . "</td>";
                        echo "<td>" . $row["lastname"] . "</td>";
                        echo "<td>" . $row["userType"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["madd"] . "</td>";
                        echo "<td>" . $row["postal"] . "</td>";
                        echo "<td>" . $row["birthday"] . "</td>";
                        echo "<td>" . $row["verification"] . "</td>";
                        echo "<td>";
                
                        echo "<td>";
                        echo "<a href='uupdate.php?id=" . $row["user_id"] . "' class='btn btn-primary mr-1'>Update</a>";
                        echo "<a href='javascript:void(0);' onclick='confirmView(" . $row["user_id"] . ")' class='btn btn-info mr-1'>View</a>";
                        echo "<a href='javascript:void(0);' onclick='updateVerification(" . $row["user_id"] . ", \"Verified\")' class='btn btn-success mr-1'>Verified</a>";
                        echo "<a href='javascript:void(0);' onclick='updateVerification(" . $row["user_id"] . ", \"Unverified\")' class='btn btn-danger'>Unverified</a>";
                        echo "</td>";

                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p>No results found.</p>";
                }

                // Close database connection
                $conn->close();
                ?>

                <!-- JavaScript function for SweetAlert confirmation -->
                <script>
                function confirmView(user_id) {
                    // Fetch the row details using AJAX
                    $.ajax({
                        url: 'fetch_row_details.php', // Replace 'fetch_row_details.php' with your PHP script to fetch row details
                        method: 'POST',
                        data: { user_id: user_id },
                        success: function(response) {
                            // Show the row details in a modal or alert
                            Swal.fire({
                                title: 'User Details',
                                html: response, // Use the response from the server to display the row details
                                icon: 'info',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Close'
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching row details:', error);
                            alert('Error fetching row details. Please try again.');
                        }
                    });
                }

                function updateVerification(userId, status, button) {
                    // Send an AJAX request to update the verification status
                    // Example using jQuery:
                    $.ajax({
                        url: 'update_verification.php',
                        method: 'POST',
                        data: { userId: userId, status: status },
                        success: function(response) {
                            // Handle success response
                            alert('Verification status updated successfully.');
                            // Reload or update the table as needed
                            if (status === 'Verified') {
                                button.classList.remove('btn-danger');
                                button.classList.add('btn-success');
                                button.innerText = 'Verified';
                            } else {
                                button.classList.remove('btn-success');
                                button.classList.add('btn-danger');
                                button.innerText = 'Unverified';
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error('Error updating verification status:', error);
                            alert('Error updating verification status. Please try again.');
                        }
                    });
                }
                </script>
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

<?php include('partial/footer.php'); ?>
