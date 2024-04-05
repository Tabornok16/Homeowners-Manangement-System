<?php
// Include database connection
include '../connect2.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Start a transaction
        $db->beginTransaction();

        // Check if necessary form fields are set and not empty
        if(isset($_POST['propertyIDs']) && isset($_POST['amount']) && isset($_POST['fromDate']) && isset($_POST['toDate'])) {
            // Retrieve form data
            $tx_no = $_POST['tx_no'];
            $tx_date = $_POST['tx_date'];
            $totalAmountDue = $_POST['totalAmountDue'];
            // $propertyIDs = $_POST['propertyIDs']; // Array of property IDs
            // $fromDates = $_POST['fromDate']; // Array of from dates
            // $toDates = $_POST['toDate']; // Array of to dates
            // $amounts = $_POST['amount']; // Array of amounts

            // Decode JSON strings into arrays
$propertyIDs = json_decode($_POST['propertyIDs']);
$fromDates = json_decode($_POST['fromDate']);
$toDates = json_decode($_POST['toDate']);
$amounts = json_decode($_POST['amount']);

            // Insert transaction data into the database
            $transactionQuery = "INSERT INTO transaction (tx_no, tx_date, amount) VALUES (:tx_no, :tx_date, :totalAmountDue)";
            $transactionStatement = $db->prepare($transactionQuery);
            $transactionStatement->bindParam(':tx_no', $tx_no);
            $transactionStatement->bindParam(':tx_date', $tx_date);
            $transactionStatement->bindParam(':totalAmountDue', $totalAmountDue);
            $transactionStatement->execute();

            // Retrieve the transaction ID of the inserted transaction
            $tx_id = $db->lastInsertId();

            // Insert transaction particulars data into the database
            $particularsQuery = "INSERT INTO transaction_particulars (tx_id, tx_no, particular, fromDate, toDate, amount) VALUES (:tx_id, :tx_no, :particular, :fromDate, :toDate, :amount)";
            $particularsStatement = $db->prepare($particularsQuery);

            // Iterate over each transaction detail and insert into the database
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

            // Commit the transaction
            $db->commit();

            // Transaction and particulars inserted successfully
            echo json_encode(['success' => 'Transaction and particulars submitted successfully']);
        } else {
            // Handle the case when some form fields are missing or empty
            echo json_encode(['error' => 'Some form fields are missing or empty']);
        }
    } catch (PDOException $e) {
        // Rollback the transaction on exception
        $db->rollBack();
        // Error occurred, display error message with MySQL error
        echo json_encode(['error' => 'Failed to submit transaction: ' . $e->getMessage()]);
    }
}
