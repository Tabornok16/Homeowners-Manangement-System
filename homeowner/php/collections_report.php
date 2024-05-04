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
        CONCAT(homeowners.fullname)  AS homeowner,
        SUM(transaction_particulars.amount) AS total_amount_paid
    FROM
        hoa_db.homeowners
    INNER JOIN
        hoa_db.transaction
    ON
        user.id = transaction.id
    INNER JOIN
        hoa_db.transaction_particulars
    ON
        transaction.tx_id = transaction_particulars.tx_id
    WHERE
        transaction_particulars.verification = 'Verified'
    GROUP BY
        homeowners.id;
";

// Execute the query
$result = mysqli_query($connection, $sql);

// Check if the query was successful
if ($result) {
    // Output table header
    echo "<table border='1'>
            <tr>
                <th>Homeowner</th>
                <th>Total Amount Paid</th>
            </tr>";

    // Fetch data from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Output or process each row of data
        echo "<tr>";
        echo "<td>" . $row['homeowner'] . "</td>";
        echo "<td>" . $row['total_amount_paid'] . "</td>";
        echo "</tr>";
    }

    // Output table footer
    echo "</table>";

    // Free result set
    mysqli_free_result($result);
} else {
    // If the query fails, display an error message
    echo 'Error: ' . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
