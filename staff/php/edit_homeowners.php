<?php
// Include connect.php to establish database connection
require_once '../../connect.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"]; // Assuming you have an input field for the homeowner ID
    $userName = $_POST["userName"];
    $fullName = $_POST["fullName"];
    $gender = $_POST["gender"];
    $bday = $_POST["bday"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $contactNum = $_POST["contactNum"];

    // Sanitize input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);
    $userName = mysqli_real_escape_string($conn, $userName);
    $fullName = mysqli_real_escape_string($conn, $fullName);
    $gender = mysqli_real_escape_string($conn, $gender);
    $bday = mysqli_real_escape_string($conn, $bday);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $contactNum = mysqli_real_escape_string($conn, $contactNum);

    // Hash the password (assuming you're using PHP's password_hash function)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // You can perform additional validation here

    // Update homeowner in the database
    $sql = "UPDATE homeowners 
            SET userName='$userName', fullName='$fullName', gender='$gender', bday='$bday', email='$email', password='$hashedPassword', contactNum='$contactNum' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // If update is successful, return success message
        $response = array("success" => true, "message" => "Homeowner updated successfully.");
    } else {
        // If update fails, return error message with MySQL error
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
?>
