<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_db";

// Process form data if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare data for insertion
    $date = $_POST['date'];
    $debit = $_POST['debit'];
    $description = $_POST['description'];

    // SQL query to insert data into disbursement_account table
    $sql = "INSERT INTO disbursement_account (date, debit, description) VALUES (NOW(), '$debit', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
