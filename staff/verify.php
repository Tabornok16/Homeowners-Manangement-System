<?php

// Assuming you have verified the transaction successfully
// You can update the verification logic as per your requirements

// Check if the transaction ID parameter is set in the URL
if (isset($_GET['tx_no'])) {
    // Sanitize the input
    $tx_no = $_GET['tx_no'];

    try {
        // Connect to your database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hoa_db";

        // Create connection using PDO
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement to update the verification column
        $stmt_transaction = $db->prepare("UPDATE transaction SET verification = 3 WHERE tx_no = :tx_no");
        $stmt_transaction->bindParam(':tx_no', $tx_no);
        $stmt_transaction->execute();
        
        // Prepare and execute the second update statement for the transaction_particulars table
        $stmt_particulars = $db->prepare("UPDATE transaction_particulars SET verification = 2 WHERE tx_no = :tx_no");
        $stmt_particulars->bindParam(':tx_no', $tx_no);
        $stmt_particulars->execute();
        // Return a success message in JSON format
        $response = array('success' => true, 'message' => 'Transaction verified successfully');
        echo json_encode($response);
    } catch (PDOException $e) {
        // Return an error message in JSON format if an exception occurs
        $response = array('success' => false, 'error' => 'Error updating verification: ' . $e->getMessage());
        echo json_encode($response);
    }
} else {
    // Return an error message in JSON format if the transaction ID parameter is not set
    $response = array('success' => false, 'error' => 'Transaction ID parameter not set');
    echo json_encode($response);
}
