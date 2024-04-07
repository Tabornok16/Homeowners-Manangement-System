<?php
// Include necessary files
include("partial/header.php");
include("partial/navbar.php");
include("partial/sidebar.php");

// Initialize variables
$loggedInUsername = ""; // Initialize with a default value
$firstName = ""; // Initialize with a default value
$lastName = ""; // Initialize with a default value

// Check if user is logged in and retrieve data from session or database
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];

    // Assuming you have a database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT firstname, lastname FROM user WHERE username = '$loggedInUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
    }
}

?>