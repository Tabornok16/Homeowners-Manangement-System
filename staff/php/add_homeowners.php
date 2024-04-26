<?php
// Include connect.php to establish database connection
require_once '../../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userName = $_POST["userName"];
    $fullName = $_POST["fullName"];
    $gender = $_POST["gender"];
    $bday = $_POST["bday"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $contactNum = $_POST["contactNum"];

    // Sanitize input to prevent SQL injection
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

    // Insert homeowner into database
    $sql = "INSERT INTO homeowners (userName, fullName, gender, bday, email, password, contactNum) 
            VALUES ('$userName', '$fullName', '$gender', '$bday', '$email', '$hashedPassword', '$contactNum')";

    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, return success message
        $response = array("success" => true, "message" => "Homeowner added successfully.");
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
?>
