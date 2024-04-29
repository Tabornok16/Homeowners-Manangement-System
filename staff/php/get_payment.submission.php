<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
</head>
<body>

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

    // Query to fetch all records from the payment_submission table
    $sql = "SELECT id, tx_no, amount, payment_for, ref_no, proof_of_payment FROM payment_submissions";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Check if there are any records
    if ($stmt->rowCount() > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Transaction Number</th>';
        echo '<th>Amount</th>';
        echo '<th>Payment For</th>';
        echo '<th>Reference Number</th>';
        echo '<th>Proof of Payment</th>';
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
            echo '<td><a href="' . $row["proof_of_payment"] . '" data-lightbox="proof-of-payment" data-title="Proof of Payment">View Proof</a></td>';
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</body>
</html>
