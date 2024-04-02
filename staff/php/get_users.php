<?php
// Include connect.php to establish database connection
require_once '../../connect.php';

// Define an empty array to store users
$users = array();

// Query to fetch users
$sql = "SELECT * FROM user WHERE userType = 3";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch rows and add them to the $users array
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Close database connection
$conn->close();

// Return users as JSON
header('Content-Type: application/json');
echo json_encode($users);
?>