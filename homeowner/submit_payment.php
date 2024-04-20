<?php
// Include database connection
include '../connect2.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Start a transaction
        $db->beginTransaction();

        // Check if necessary form fields are set and not empty
        if (isset($_POST['paymentAmount']) && isset($_POST['paymentfor']) && isset($_POST['paymentReference']) && isset($_FILES['proofImage'])) {
            // Retrieve form data
            $paymentAmount = $_POST['paymentAmount'];
            $payment_for = $_POST['paymentfor'];
            $ref_no = $_POST['paymentReference'];
            
            // Check if the directory exists, if not, create it
            $targetDirectory = "../uploads/";
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true); // Create the directory with full permissions
            }
            
            // File upload handling
            $targetFile = $targetDirectory . basename($_FILES["proofImage"]["name"]);
            
            // Move uploaded file to specified directory
            if (move_uploaded_file($_FILES["proofImage"]["tmp_name"], $targetFile)) {
                // Insert transaction data into the database
                $transactionQuery = "INSERT INTO payment_submissions (amount, payment_for, ref_no, proof_of_payment) VALUES (:paymentAmount, :payment_for, :ref_no, :proof_of_payment)";
                $transactionStatement = $db->prepare($transactionQuery);
                $transactionStatement->bindParam(':paymentAmount', $paymentAmount);
                $transactionStatement->bindParam(':payment_for', $payment_for);
                $transactionStatement->bindParam(':ref_no', $ref_no);
                $transactionStatement->bindParam(':proof_of_payment', $targetFile);
                $transactionStatement->execute();

                // Update tables with payment_for matching the particular column in transaction_particulars to value 2
                $updateQuery = "UPDATE transaction_particulars SET verification = 2 WHERE particular = :payment_for";
                $updateStatement = $db->prepare($updateQuery);
                $updateStatement->bindParam(':payment_for', $payment_for);
                $updateStatement->execute();

                // Commit the transaction
                $db->commit();

                // Transaction inserted successfully
                echo json_encode(['success' => 'Transaction submitted successfully']);
            } else {
                // Error occurred while uploading file
                echo json_encode(['error' => 'Failed to upload file']);
            }
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
?>
