<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_db";

try {
    // Create connection using PDO
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch all records from the Transaction table
    $sql = "SELECT tx_id, tx_date, tx_no, homeowner, amount, verification FROM transaction";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Check if there are any records
    if ($stmt->rowCount() > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Transaction ID</th>';
        echo '<th>Transaction Date</th>';
        echo '<th>Tx Number</th>';
        echo '<th>Homeowner</th>';
        echo '<th>Amount</th>';
        echo '<th>Verification</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Output data of each row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["tx_id"] . '</td>';
            echo '<td>' . $row["tx_date"] . '</td>';
            echo '<td>' . $row["tx_no"] . '</td>';
            echo '<td>' . $row["homeowner"] . '</td>';
            echo '<td>' . $row["amount"] . '</td>';
            echo "<td>";
            
            if ($row['verification'] == 1) {
                echo '<span class="badge badge-danger">Unpaid</span>';
            } elseif ($row['verification'] == 2) {
                echo '<span class="badge badge-primary">for verification</span>';
            } elseif ($row['verification'] == 3) {
                echo '<span class="badge badge-success">verified</span>';
            } else {
                echo "Unknown"; // Handle other cases if needed
            }
            echo "</td>";
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No transactions found";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$db = null;
