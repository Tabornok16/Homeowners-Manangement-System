<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hoa_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare data for insertion
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    // SQL query to insert data into disbursement_account table
    $sql = "INSERT INTO disbursement_account (amount, description, date) VALUES ('$amount', '$description', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Redirect back to the form page if accessed directly
    header("Location: your_form_page.php");
    exit();
}
?>
