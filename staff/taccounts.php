<?php include("partial/header.php"); ?>
<?php include("partial/navbar.php"); ?>
<?php include("partial/sidebar.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Disbursement</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Disbursement</li>
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
            <form method="post" action="process_disbursement.php" style="margin-bottom: 20px;">
                <label for="amount" style="margin-right: 10px;">Amount:</label>
                <input type="number" id="amount" name="amount" required style="padding: 5px;">
                <label for="description" style="margin-right: 10px; margin-left: 20px;">Description:</label>
                <input type="text" id="description" name="description" required style="padding: 5px;">
                <button type="submit" style="padding: 5px; background-color: #007bff; color: #fff; border: none;">Submit Disbursement</button>
            </form>

                <h1 style="text-align: center; margin-bottom: 20px;">Disbursement Table</h1>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f2f2f2;">
                            <th style="border: 1px solid black; padding: 8px;">ID</th>
                            <th style="border: 1px solid black; padding: 8px;">Date</th>
                            <th style="border: 1px solid black; padding: 8px;">Debit</th>
                            <th style="border: 1px solid black; padding: 8px;">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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
                        $sql = "SELECT * FROM disbursement_account ORDER BY id DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['id'] . "</td>";
                                echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['date'] . "</td>";
                                echo "<td style='border: 1px solid black; padding: 8px;'>$" . $row['debit'] . "</td>";
                                echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['description'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' style='text-align: center; border: 1px solid black; padding: 8px;'>No disbursements found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
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
