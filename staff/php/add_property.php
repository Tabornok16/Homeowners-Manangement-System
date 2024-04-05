<?php
// Include your database connection file
include('../../connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $propertyId = $_POST['propertyId'];
    $selected_option = $_POST['homeowner'];
    $selected_values = explode('|', $selected_option);
    $user_id = $selected_values[0];
    $full_name = $selected_values[1];
    $jeastId = $_POST['monthly_dues'];
    $lotArea = $_POST['lotArea'];
    $jeastAddress = $_POST['jeastAddress'];

    // Perform database insertion
    $query = "INSERT INTO property (prop_id, user_id, homeowner, monthly_dues, lotArea, jeastAdd) VALUES ('$propertyId', '$user_id', '$full_name', '$jeastId', '$lotArea', '$jeastAddress')";
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