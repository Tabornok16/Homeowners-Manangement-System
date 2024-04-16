<?php
// Include connect.php to establish database connection
require_once '../../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    $userType = $_POST["userType"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $mailingAddress = $_POST["mailingAddress"];
    $postalCode = $_POST["postalCode"];

    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $password = mysqli_real_escape_string($conn, $password);
    $userType = mysqli_real_escape_string($conn, $userType);
    $gender = mysqli_real_escape_string($conn, $gender);
    $birthday = mysqli_real_escape_string($conn, $birthday);
    $email = mysqli_real_escape_string($conn, $email);
    $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
    $mailingAddress = mysqli_real_escape_string($conn, $mailingAddress);
    $postalCode = mysqli_real_escape_string($conn, $postalCode);

    // Hash the password (assuming you're using PHP's password_hash function)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // You can perform additional validation here

    // Insert user into database
    $sql = "INSERT INTO user (username, firstname, lastname, password, userType, gender, birthday, email, phone, madd, postal) 
            VALUES ('$username', '$firstname', '$lastname', '$hashedPassword', '$userType', '$gender', '$birthday', '$email', '$phoneNumber', '$mailingAddress', '$postalCode')";

    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, return success message
        $response = array("success" => true, "message" => "User added successfully.");
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
