<?php
// Establish the database connection
$connection = mysqli_connect("localhost", "root", "", "hoa_db");

// Check if the connection is successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define your SQL query
$sql = "
    SELECT
        CONCAT(user.firstname, ' ', user.lastname) AS homeowner,
        transaction.tx_id,
        transaction.tx_no,
        transaction_particulars.particular,
        -- transaction_particulars.period,
        -- transaction_particulars.fromDate,
        -- transaction_particulars.toDate,
        transaction_particulars.amount,
        transaction_particulars.verification
    FROM
        hoa_db.user
    INNER JOIN
        hoa_db.transaction
    ON
        user.user_id = transaction.user_id
    INNER JOIN
        hoa_db.transaction_particulars
    ON
        transaction.tx_id = transaction_particulars.tx_id;
";

// Execute the query
$result = mysqli_query($connection, $sql);

// Check if the query was successful
if ($result) {
    // Fetch data from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Output or process each row of data
        echo "<tr>";
        echo "<td>" . $row['homeowner'] . "</td>";
        echo "<td>" . $row['tx_id'] . "</td>";
        echo "<td>" . $row['tx_no'] . "</td>";
        echo "<td>" . $row['particular'] . "</td>";
        // echo "<td>" . $row['fromDate'] . "</td>";
        // echo "<td>" . $row['toDate'] . "</td>";
        echo "<td>" . $row['verification'] . "</td>";
        echo "</tr>";
    }

    // Free result set
    mysqli_free_result($result);
} else {
    // If the query fails, display an error message
    echo '<tr><td colspan="5">Error: ' . mysqli_error($connection) . '</td></tr>';
}

// Close the database connection
mysqli_close($connection);
?>
