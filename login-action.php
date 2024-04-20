<?php
require_once 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Check if there's an existing session variable for login attempts
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0; // Initialize login attempts counter
    }

    // Increment login attempts
    $_SESSION['login_attempts']++;

    // Check if the number of login attempts exceeds the limit
    $max_login_attempts = 3; // Adjust as needed
    if ($_SESSION['login_attempts'] > $max_login_attempts) {
        echo '<script>alert("Maximum login attempts exceeded. Please try again later."); window.location.href = "login.php";</script>';
        exit(); // Stop further execution
    }

    // Query to check if the user exists with the given credentials
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set session variables
        $_SESSION['user_id'] = $row['user_id'];
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
    } else {
        // Invalid credentials
        echo '<script>alert("Invalid Credentials. Attempts remaining: '. ($max_login_attempts - $_SESSION['login_attempts']) .'"); window.location.href = "login.php";</script>';
        exit(); // Stop further execution
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

$conn->close();
?>
