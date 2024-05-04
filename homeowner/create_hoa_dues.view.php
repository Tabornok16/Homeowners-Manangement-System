<?php include("partial/header.php"); ?>
<?php include("partial/navbar.php"); ?>
<?php include("partial/sidebar.php"); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Monthly Dues Record</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Monthly Dues Record</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="display-6 text-left">Monthly Dues</h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>TX No</th>
                                                    <th>TX Date</th>
                                                    <th>Particular</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $servername = "localhost";
                                                $username = "root"; // Your MySQL username
                                                $password = ""; // Your MySQL password
                                                $database = "hoa_db"; // Your database name
                                                
                                                // Create connection
                                                $conn = new mysqli($servername, $username, $password, $database);

                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

                                                $sql = "SELECT * FROM transaction t INNER JOIN transaction_particulars tp ON t.tx_id = tp.tx_id WHERE t.homeowner = '$id'";
                                                $result = $conn->query($sql);

                                                if ($result === false) {
                                                    echo "Error executing the query: " . $conn->error;
                                                } else {
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['tx_no'] . "</td>";
                                                            echo "<td>" . $row['tx_date'] . "</td>";
                                                            echo "<td>" . $row['particular'] . "</td>";
                                                            echo "<td>" . $row['fromDate'] . "</td>";
                                                            echo "<td>" . $row['toDate'] . "</td>";
                                                            echo "<td>" . $row['amount'] . "</td>";
                                                            echo "<td>";
                                                            if ($row['verification'] == 1) {
                                                                echo '<span class="badge badge-danger">Unpaid</span>';
                                                            } elseif ($row['verification'] == 2) {
                                                                echo '<span class="badge badge-success">Paid</span>';
                                                            } elseif ($row['verification'] == 3) {
                                                                echo '<span class="badge badge-success">for verification</span>';
                                                            }
                                                            else {
                                                                echo "Unknown";
                                                            }
                                                            echo "</td>";
                                                            echo "<td>" . ' <a href="make_payment_dues.php?amount=' . $row['amount'] . '&value=' . $row['particular'] . '&tx_no=' . $row['tx_no'] . '" class="btn btn-primary">Proof of Payment</a>' . "</td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='8'>No data found.</td></tr>";
                                                    }
                                                }

                                                $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card-footer">
        <!-- Footer content here -->
    </div>
</div>

<?php include('partial/footer.php') ?>
