<?php include('partial/header.php'); ?>
<?php include('partial/sidebar.php'); ?>
<?php include('partial/navbar.php'); ?>
<?php

// Check if the user is logged in (you may have your own logic for this)
if (isset($_SESSION['username'])) {
    // Database connection code (replace with your own)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hoa_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user data from the database based on the logged-in username
    $loggedInUsername = $_SESSION['username'];
    $sql = "SELECT firstname, lastname FROM user WHERE username = '$loggedInUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];

        // Output the input fields with the logged-in user's data
        echo '<label for="username">Username</label>';
        echo '<input type="text" name="username" id="username" value="' . $loggedInUsername . '" disabled>';

        echo '<label for="firstName">First Name</label>';
        echo '<input type="text" name="firstName" id="firstName" value="' . $firstName . '" disabled>';

        echo '<label for="lastName">Last Name</label>';
        echo '<input type="text" name="lastName" id="lastName" value="' . $lastName . '" disabled>';
    } else {
        echo 'User data not found.';
    }

    $conn->close();
} else {
    echo 'Please log in first.';
}
?>
<style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            label {
                font-weight: bold;
            }

            input[type="text"],
            input[type="password"],
            input[type="date"],
            textarea,
            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            select {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background-image: url('data:image/svg+xml;utf8,<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
                background-repeat: no-repeat;
                background-position-x: calc(100% - 12px);
                background-position-y: 50%;
                padding-right: 30px;
            }

            textarea {
                resize: vertical;
                min-height: 100px;
            }

            input[type="submit"] {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 12px 20px;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

            hr {
                border: 0;
                border-top: 1px solid #ccc;
                margin: 20px 0;
            }
        </style>

<body>

    <div class="container">
        <h2>Profile</h2>
        <form action="profile-action.php" method="POST" enctype="multipart/form-data">
            <!-- Upload Image -->
            <!-- <label for="userImage">Upload Image:</label>
            <input type="file" name="userImage" id="userImage"> -->

            <!-- User Details -->
            <?php
            echo '<label for="username">Username</label>';
            echo '<input type="text" name="username" id="username" value="' . $loggedInUsername . '" disabled>';

            echo '<label for="firstName">First Name</label>';
            echo '<input type="text" name="firstName" id="firstName" value="' . $firstName . '" disabled>';

            echo '<label for="lastName">Last Name</label>';
            echo '<input type="text" name="lastName" id="lastName" value="' . $lastName . '" disabled>';
            ?>

            <label for="gender">Gender:</label>
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <!-- Additional Details -->
            <hr>
            <h2>Additional Details</h2>

            <label for="password">Change Password:</label>
            <input type="password" name="password" id="password">

            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" id="birthday">

            <label for="madd">Mailing Address:</label>
            <textarea name="madd" id="madd"></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>