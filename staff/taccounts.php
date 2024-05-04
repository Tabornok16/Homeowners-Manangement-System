<?php
// Include header, navbar, and sidebar
include("partial/header.php");
include("partial/navbar.php");
include("partial/sidebar.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare data for insertion
    $date = $_POST['date'];
    $debit = $_POST['debit'];
    $description = $_POST['description'];

    // SQL query to insert data into disbursement_account table
    $sql = "INSERT INTO disbursement_account (date, debit, description) VALUES ('$date', '$debit', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

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
                <!-- Form for submitting disbursement -->
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-bottom: 20px;">
                    <label for="date" style="margin-right: 10px;">Date:</label>
                    <input type="date" id="date" name="date" required style="padding: 5px;">
                    <label for="debit" style="margin-right: 10px;">Amount:</label>
                    <input type="number" id="debit" name="debit" required style="padding: 5px;">
                    <label for="description" style="margin-right: 10px; margin-left: 20px;">Description:</label>
                    <input type="text" id="description" name="description" required style="padding: 5px;">
                    <button type="submit" style="padding: 5px; background-color: #007bff; color: #fff; border: none;">Submit Disbursement</button>
                </form>

                <!-- Table to display disbursement data -->
                <table style="width: 100%; border-collapse: collapse; margin: 0 auto;">
                    <thead>
                        <tr style="background-color: #f2f2f2;">
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Date</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Amount</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch data from disbursement_account table and display in table rows
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

                        // SQL query to fetch all data from disbursement_account table
                        $sql = "SELECT * FROM disbursement_account";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            $totalAmount = 0; // Initialize total amount
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["date"] . "</td>
                                    <td>" . $row["debit"] . "</td>
                                    <td>" . $row["description"] . "</td>
                                </tr>";
                                // Add debit amount to total
                                $totalAmount += $row["debit"];
                            }
                            echo "<tr>
                                <td colspan='3' style='text-align: right;'><strong>Total:</strong> PHP: " . number_format($totalAmount, 2) . "</td>
                            </tr>";
                        } else {
                            echo "<tr><td colspan='3'>0 results</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Include footer -->
<?php include('partial/footer'); ?>
