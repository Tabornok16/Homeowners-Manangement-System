<?php

require_once '../../connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data`
    $t_id = $_POST['transaction'];
    $s = $_POST['status'] ?? 'null';
    $s_d = $_POST['start_date'] ?? '';
    $e_d = $_POST['end_date'] ?? '';

    // Validate the form data (you can add your own validation logic here)

    // Connect to the database (replace with your own database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hoa_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate the form data (you can add your own validation logic here)
    if (empty($s_d) || empty($e_d)) {
        array("danger" => true, "message" => "Error: Start date and end date are required");
        exit;
    }

    // Prepare and execute the SQL query to insert the event into the database
    $sql = "INSERT INTO events (transaction_id, status, start_date, end_date) VALUES ('$t_id', '$s', '$s_d', '$e_d')";

    if ($conn->query($sql) === TRUE) {
        if ($conn->query($sql) === TRUE) {
            $response = array("success" => true, "message" => "Event added successfully");
        } else {
            $response = array("success" => true, "message" => "Error: " . $sql . "<br>" . $conn->error);
        }
    }

    // Close the database connection
    $conn->close();
}

header('Location: ../calendar.view.php');
