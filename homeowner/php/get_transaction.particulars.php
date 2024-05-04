<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_db";

$id = $_SESSION['id'];

try {
    // Create connection using PDO
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch all records from the transaction-particulars table
    $sql = "SELECT * FROM transaction_particulars WHERE homeowner = 'homeowner'";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Check if there are any records
    if ($stmt->rowCount() > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Transaction ID</th>';
        echo '<th>Tx Number</th>';
        echo '<th>Particular</th>';
        echo '<th>From Date</th>';
        echo '<th>To Date</th>';
        echo '<th>Amount</th>';
        echo '<th>Verification</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Output data of each row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["tx_id"] . '</td>';
            echo '<td>' . $row["tx_no"] . '</td>';
            echo '<td>' . $row["particular"] . '</td>';
            echo '<td>' . $row["fromDate"] . '</td>';
            echo '<td>' . $row["toDate"] . '</td>';
            echo '<td>' . $row["amount"] . '</td>';
            echo "<td>";
            if ($row['verification'] == 1) {
                echo '<span class="badge badge-danger">Unpaid</span>';
            } elseif ($row['verification'] == 2) {
                echo '<span class="badge badge-success">for verification</span>';
            } else {
                echo "Unknown"; // Handle other cases if needed
            }
            echo "</td>";
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No records found";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
