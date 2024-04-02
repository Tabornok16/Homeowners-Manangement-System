<?php
require_once 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password (assuming you're using PHP's password_hash function)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Query to check if the user exists with the given credentials
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['password']) {
            // Password is correct, set session variables
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['username'] = $row['username']; // Setting username to session
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
        }
    }
    // Invalid credentials
    echo '<script>alert("Invalid Credentials."); window.location.href = "login.php";</script>';
} else {
    // Invalid request method
    echo "Invalid request method.";
}

$conn->close();
