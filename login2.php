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

    // Query to retrieve the hashed password from the database
    $stmt = $conn->prepare("SELECT id, password FROM homeowners WHERE userName = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found, get the hashed password
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        // Verify the password using password_verify
        if (password_verify($password, $hashedPassword)) {
            // Password matches, set session variables
            $_SESSION['id'] = $userId;
            $_SESSION['userName'] = $userName;

            // Redirect to the appropriate page
            header("Location: homeowner/index.php");
            exit(); // Stop further execution after redirection
        } else {
            // Invalid password
            echo '<script>alert("Invalid password."); window.location.href = "login.php";</script>';
            exit(); // Stop further execution
        }
    } else {
        // User not found
        echo '<script>alert("User not found."); window.location.href = "login.php";</script>';
        exit(); // Stop further execution
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

$conn->close();
?>
