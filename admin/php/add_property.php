<?php
// Include your database connection file
include('../../connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $propertyId = $_POST['propertyId'];
    $userId = $_POST['userId'];
    $jeastId = $_POST['monthly_dues'];
    $lotArea = $_POST['lotArea'];
    $jeastAddress = $_POST['jeastAddress'];

    // Perform database insertion
    $query = "INSERT INTO property (prop_id, user_id, monthly_dues, lotArea, jeastAdd) VALUES ('$propertyId', '$userId', '$jeastId', '$lotArea', '$jeastAddress')";
    if ($conn->query($query) === TRUE) {
        // Return success message
        echo json_encode(array("status" => "success", "message" => "Property added successfully"));
    } else {
        // Return error message
        echo json_encode(array("status" => "error", "message" => "Error adding property: " . $conn->error));
    }

    // Close database connection
    $conn->close();
} else {
    // If form is not submitted, return error message
    echo json_encode(array("status" => "error", "message" => "Form not submitted"));
}
?>