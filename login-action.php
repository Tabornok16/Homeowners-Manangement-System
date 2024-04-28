<?php
// Start the session
session_start();

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists with the given credentials
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, set session variables
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['username'] = $row['username'];
        $position = $row["userType"];

        // Redirect based on user type
        if ($position == "1") {
            header("Location: admin/index.php");
        } elseif ($position == "2") {
            header("Location: staff/index.php");
        } else {
            header("Location: login-homeowner.php");
        }
        exit(); // Stop further execution
    } else {
        // Invalid credentials
        echo '<script> window.location.href = "choose.role.php";</script>';
        exit(); // Stop further execution
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

$conn->close();
?>
