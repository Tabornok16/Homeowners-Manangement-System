<?php
// Include the connection file
include("connect.php");

// Check if the user is logged in (you may have your own logic for this)
if (isset($_SESSION['username'])) {
    // Fetch user data from the database based on the logged-in username
    $loggedInUsername = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username = '$loggedInUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set the variables with the fetched data
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];

        // Output the input fields with the logged-in user's data
        echo '<label for="username">Username</label>';
        echo '<input type="text" name="username" id="username" value="' . $loggedInUsername . '">';

        echo '<label for="firstName">First Name</label>';
        echo '<input type="text" name="firstName" id="firstName" value="' . $firstName . '">';

        echo '<label for="lastName">Last Name</label>';
        echo '<input type="text" name="lastName" id="lastName" value="' . $lastName . '">';
    } else {
        echo 'User data not found.';
    }

    $conn->close();
} else {
    echo 'Please log in first.';
}
?>
