<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_db";

try {
    // Create connection using PDO
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch all records from the payment_submission table
    $sql = "SELECT ps.*, t.* FROM payment_submissions ps INNER JOIN transaction t ON ps.tx_no = t.tx_no";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Check if there are any records
    if ($stmt->rowCount() > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Transaction Number</th>';
        echo '<th>Amount</th>';
        echo '<th>Payment For</th>';
        echo '<th>Reference Number</th>';
        echo '<th>Proof of Payment</th>';
        echo '<th>Status</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Output data of each row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["tx_no"] . '</td>';
            echo '<td>' . $row["amount"] . '</td>';
            echo '<td>' . $row["payment_for"] . '</td>';
            echo '<td>' . $row["ref_no"] . '</td>';
            echo '<td><a href="' . $row["proof_of_payment"] . '" data-lightbox="proof-of-payment" data-title="Proof of Payment">View Proof</a></td>';
            echo "<td>";
            if ($row['verification'] == 1) {
                echo '<span class="badge badge-danger">Unpaid</span>';
            } elseif ($row['verification'] == 2) {
                echo '<span class="badge badge-primary">for verification</span>';
            } elseif ($row['verification'] == 3) {
                echo '<span class="badge badge-success">verified</span>';
            } else {
                echo "Unknown"; // Handle other cases if needed
            }
            echo "<td><button class='btn btn-primary verify-btn' data-txno='" . $row['tx_no'] . "'>Verify</button></td>";
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No records found";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.verify-btn').click(function() {
            var txNo = $(this).data('txno');
            verifyTransaction(txNo);
        });

        function verifyTransaction(txNo) {
            $.ajax({
                url: 'verify.php',
                type: 'GET',
                data: {
                    tx_no: txNo
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Update the UI or show a success message
                     
                        window.location.reload(true);
                        // You can update the UI here, for example, change the button color or text
                    } else {
                        alert('Error verifying transaction: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error verifying transaction: ' + error);
                }
            });
        }
    });
</script>