<?php

session_start(); // Start the session to access $_SESSION variables

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_db";

$id = $_SESSION['id']; // Assuming user_id is stored in the session

try {
    // Create connection using PDO
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to count transactions for the logged-in homeowner
    $sql = "SELECT COUNT(*) AS transaction_count FROM transaction WHERE homeowner = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Fetch the count result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $transactionCount = $result['transaction_count'];

    echo "Total Transactions: " . $transactionCount;
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$db = null;
?>
