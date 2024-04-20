<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_db";

$id = $_SESSION['user_id'];

try {
    // Create connection using PDO
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch all records from the transaction-particulars table
    $sql = "SELECT * FROM payment_submissions WHERE homeowner = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Check if there are any records
    if ($stmt->rowCount() > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Transaction ID</th>';
        echo '<th>Amount</th>';
        echo '<th>Payment For</th>';
        echo '<th>Ref No</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Output data of each row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["tx_no"] . '</td>';
            echo '<td>' . $row["amount"] . '</td>';
            echo '<td>' . $row["payment_for"] . '</td>';
            echo '<td>' . $row["ref_no"] . '</td>';
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
