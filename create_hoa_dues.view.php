<?php
// Include database connection
include '../connect2.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required array keys are set
    if (isset($_POST['tx_no'], $_POST['tx_date'], $_POST['totalAmountDue'], $_POST['propertyIDs'], $_POST['fromDate'], $_POST['toDate'], $_POST['amount'])) {
        // Retrieve form data
        $tx_no = $_POST['tx_no'];
        $tx_date = $_POST['tx_date'];
        $totalAmountDue = $_POST['totalAmountDue'];
        $propertyIDs = $_POST['propertyIDs']; // Array of property IDs
        $fromDates = $_POST['fromDate']; // Array of from dates
        $toDates = $_POST['toDate']; // Array of to dates
        $amounts = $_POST['amount']; // Array of amounts

        try {
            // Start transaction
            $db->beginTransaction();

            // Prepare and execute SQL query to insert data into the transaction table
            $transactionQuery = "INSERT INTO transaction (tx_no, tx_date, amount) VALUES (:tx_no, :tx_date, :totalAmountDue)";
            $transactionStatement = $db->prepare($transactionQuery);
            $transactionStatement->bindParam(':tx_no', $tx_no);
            $transactionStatement->bindParam(':tx_date', $tx_date);
            $transactionStatement->bindParam(':totalAmountDue', $totalAmountDue);
            $transactionStatement->execute();

            // Retrieve the transaction ID of the inserted transaction
            $tx_id = $db->lastInsertId();

            // Prepare and execute SQL query to insert data into the transaction_particulars table for each detail
            $particularsQuery = "INSERT INTO transaction_particulars (tx_id, tx_no, particular, fromDate, toDate, amount) VALUES (:tx_id, :tx_no, :particular, :fromDate, :toDate, :amount)";
            $particularsStatement = $db->prepare($particularsQuery);

            // Check if arrays are not empty before iterating
            if (!empty($propertyIDs) && !empty($fromDates) && !empty($toDates) && !empty($amounts)) {
                // Iterate over each transaction detail and insert into the transaction_particulars table
                foreach ($propertyIDs as $key => $propertyID) {
                    $particular = $propertyID;
                    $particularsStatement->bindParam(':tx_id', $tx_id);
                    $particularsStatement->bindParam(':tx_no', $tx_no);
                    $particularsStatement->bindParam(':particular', $particular);
                    $particularsStatement->bindParam(':fromDate', $fromDates[$key]);
                    $particularsStatement->bindParam(':toDate', $toDates[$key]);
                    $particularsStatement->bindParam(':amount', $amounts[$key]);
                    $particularsStatement->execute();
                }
            }

            // Commit the transaction
            $db->commit();

            // Transaction and particulars inserted successfully
            echo json_encode(['success' => 'Transaction and particulars submitted successfully']);
        } catch (PDOException $e) {
            // Rollback the transaction in case of any errors
            $db->rollback();
            // Error occurred, display error message with MySQL error
            echo json_encode(['error' => 'Failed to submit transaction: ' . $e->getMessage()]);
        }
    } else {
        // If required array keys are not set, return error message
        echo json_encode(['error' => 'Required form data is missing.']);
    }
}
?>
