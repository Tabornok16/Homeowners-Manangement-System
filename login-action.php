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

    // Check if there's an existing session variable for the last failed login attempt
    if (isset($_SESSION['last_failed_login'])) {
        // Check if enough time has passed since the last failed attempt (5 minutes = 300 seconds)
        $time_since_last_attempt = time() - $_SESSION['last_failed_login'];
        if ($time_since_last_attempt < 300) {
            // Display error message and prevent login
            echo '<script>alert("Please wait for 5 minutes before attempting to login again."); window.location.href = "login.php";</script>';
            exit(); // Stop further execution
        }
    }

    // Query to check if the user exists with the given credentials
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Reset login attempts counter on successful login
        unset($_SESSION['last_failed_login']);

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
        } elseif ($position == "3") {
            header("Location: homeowner/index.php");
        } else {
            header("Location: login.php");
        }
        exit(); // Stop further execution
    } else {
        // Record the timestamp of the failed login attempt
        $_SESSION['last_failed_login'] = time();

        // Invalid credentials
        echo '<script>alert("Invalid Credentials."); window.location.href = "login.php";</script>';
        exit(); // Stop further execution
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

$conn->close();
?>
