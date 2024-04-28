<?php
// Start the session
session_start();

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $password = $_POST["password"];

    // Sanitize input to prevent SQL injection
    $userName = mysqli_real_escape_string($conn, $userName);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password for comparison
    $hashedPassword = hash('sha256', $password);

    // Query to check if the user exists with the given credentials
    $sql = "SELECT * FROM homeowners WHERE userName='$userName' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // User found, set session variables
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['fullName'] = $row['fullName'];
        $_SESSION['userName'] = $row['userName'];
        $position = $row["userType"];

        // Redirect based on user type
        if ($position == "3") {
            header("Location: homeowner\index.php");
        } else {
            header("Location: choose.role.php");
        }
        exit(); // Stop further execution after redirection
    } else {
        // Invalid credentials
        echo '<script>alert("Invalid credentials."); window.location.href = "choose.role.php";</script>';
        exit(); // Stop further execution
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

$conn->close();
?>
