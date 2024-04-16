<?php
// Include connect.php to establish database connection
require_once '../../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $category = $_POST["category"];

    // Sanitize input to prevent SQL injection
    $category = mysqli_real_escape_string($conn, $category);
   
    // Insert user into database
    $sql = "INSERT INTO category (category) 
            VALUES ('$category')";

    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, return success message
        $response = array("success" => true, "message" => "Category added successfully.");
    } else {
        // If insertion fails, return error message with MySQL error
        $response = array("success" => false, "message" => "Error: " . $conn->error);
    }
} else {
    // If request method is not POST, return error message
    $response = array("success" => false, "message" => "Invalid request method.");
}

// Close database connection
$conn->close();

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);    
