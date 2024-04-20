<?php
// Start session
session_start();
// Include connect.php to establish database connection
require_once '../../connect.php';

// Define an empty array to store properties
$properties = array();
$id = $_SESSION['user_id'];

// Query to fetch properties
$sql = "SELECT * FROM property WHERE user_id = '$id'";
$result = $conn->query($sql);   

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch rows and add them to the $properties array
    while($row = $result->fetch_assoc()) {
        $properties[] = $row;
    }
}

// Close database connection
$conn->close();

// Return properties as JSON
header('Content-Type: application/json');
echo json_encode($properties);
?>
