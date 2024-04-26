<?php
// Include connect.php to establish database connection
require_once '../../connect.php';

// Define an empty array to store users
$homeowners = array();

// Check if the connection is successful
if ($conn->connect_error) {
    $response = array("success" => false, "message" => "Connection failed: " . $conn->connect_error);
} else {
    // Query to fetch homeowners
    $sql = "SELECT * FROM homeowners";
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result) {
        // Fetch rows and add them to the $homeowners array
        while($row = $result->fetch_assoc()) {
            $homeowners[] = $row;
        }
        $response = array("success" => true, "data" => $homeowners);
    } else {
        $response = array("success" => false, "message" => "Error fetching data: " . $conn->error);
    }
}

// Close database connection
$conn->close();

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
