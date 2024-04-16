<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$dbname = "hoa_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email details
    $to = "jvelandres@gmail.com"; // Replace with your actual email address
    $headers = "From: $name <$email>";

    // Save form data to database
    $sql = "INSERT INTO emailform (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) { 
        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully.";
        } else {
            echo "Error sending email.";
        }
    } else {
        echo "Error saving data to database: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}

// Close database connection
$conn->close();
?>
