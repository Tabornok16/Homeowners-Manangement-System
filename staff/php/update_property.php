<?php
// Include connect.php to establish database connection
require_once '../../connect.php';

// Check if propertyId is set and not empty
if (isset($_POST['prop_id']) && !empty($_POST['prop_id'])) {
    $prop_id = $_POST['prop_id'];

    // Check if other required fields are set and not empty
    if (
        isset($_POST['homeowner']) && !empty($_POST['homeowner']) &&
        isset($_POST['lotArea']) && !empty($_POST['lotArea']) &&
        isset($_POST['jeastAddress']) && !empty($_POST['jeastAddress'])
    ) {
        $homeowner = $_POST['homeowner'];
        $lotArea = $_POST['lotArea'];
        $jeastAddress = $_POST['jeastAddress'];

        // Update property data in the database
        $sql = "UPDATE property SET homeowner = '$homeowner', lotArea = '$lotArea', jeastAdd = '$jeastAddress' WHERE id = $propertyId";
        if ($conn->query($sql) === TRUE) {
            // Property data updated successfully
            echo json_encode(array('success' => 'Property data updated successfully'));
        } else {
            // Error updating property data
            http_response_code(500); // Set response status code to 500 (Internal Server Error)
            echo json_encode(array('error' => 'Error updating property data: ' . $conn->error));
        }
    } else {
        // Required fields not provided
        http_response_code(400); // Set response status code to 400 (Bad Request)
        echo json_encode(array('error' => 'Required fields not provided'));
    }
} else {
    // PropertyId not provided
    http_response_code(400); // Set response status code to 400 (Bad Request)
    echo json_encode(array('error' => 'PropertyId not provided'));
}

// Close database connection
$conn->close();
?>
