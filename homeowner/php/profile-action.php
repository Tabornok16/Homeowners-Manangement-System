<?php
// Include necessary files
include("partial/header.php");
include("partial/navbar.php");
include("partial/sidebar.php");
include ("connect.php");

// Fetch user data from the database based on $loggedInUsername
// Example database query using mysqli
$mysqli = new mysqli("localhost", "username", "password", "database_name");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT username, firstName, lastName FROM users WHERE username = '$loggedInUsername'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Assuming there's only one row for the user, fetch the data
    $row = $result->fetch_assoc();
    $loggedInUsername = $row["username"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
} else {
    // Handle case where user data is not found
    $loggedInUsername = "";
    $firstName = "";
    $lastName = "";
}

$mysqli->close();
?>