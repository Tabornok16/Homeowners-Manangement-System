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

    // Get the transaction count
    $transactionCount = $stmt->rowCount();

    // Display the transaction count with bigger font size
    echo '<h3>' . $transactionCount . '</h3>';

} catch(PDOException $e) {
    echo '<p style="color: red;">Connection failed: ' . $e->getMessage() . '</p>';
}

// Close the database connection
$db = null;
?>
