<?php
require_once '../../connect2.php';

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data (optional but recommended)
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $amount = mysqli_real_escape_string($conn, $_POST['debit']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // SQL query to insert data into disbursement_account table
    $sql = "INSERT INTO disbursement_account (date, debit, description) VALUES ('$date', '$debit', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect back to the form page if accessed directly
    header("Location: post_disbursement.php");
    exit();
}

$conn->close();
?>;
