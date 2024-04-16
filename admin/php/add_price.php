<?php
// Include your database connection file
include('../../connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $type = $_POST['type'];
    $subtype = $_POST['subtype'];
    $stakeholder = $_POST['stakeholder'];
    $price = $_POST['price'];


    // Perform database inserti on
    $sql = "INSERT INTO setprice (category, subcategory, type, subtype, unitStakeholder, price) 
    VALUES ('$category', '$subcategory', '$type', '$subtype', '$stakeholder', '$price')";



    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, return success message
        $response = array("success" => true, "message" => "Price added successfully.");
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
