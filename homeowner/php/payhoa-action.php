<?php

include('connect.php');



// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Get current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming $prop_id is set or retrieved from somewhere
$prop_id = 1; // Replace 1 with the actual value

// Correct the SQL query syntax and execute it to fetch lotArea
$sql_lotArea = "SELECT lotArea FROM property WHERE prop_id = $prop_id"; // Assuming 'property' is your table name
$result_lotArea = mysqli_query($con, $sql_lotArea);

// Check if the query was executed successfully
if (!$result_lotArea) {
    die("Error in SQL query for lotArea: " . mysqli_error($con));
}

// Fetch the row from the result set
$row_lotArea = mysqli_fetch_assoc($result_lotArea);

// Check if the row was fetched successfully and get lotArea value as an integer
if ($row_lotArea) {
    $lotArea = (float) $row_lotArea["lotArea"]; // Cast to float
} else {
    $lotArea = 0;
    echo "Lot Area not found for this user<br>";
}

// Fetch price from the setprice table where tx_id is 1
$sql_price = "SELECT Price FROM setprice WHERE tx_id = 1 LIMIT 1";
$result_price = mysqli_query($con, $sql_price);

if (!$result_price) {
    die("Error in SQL query for price: " . mysqli_error($con));
}

if ($result_price->num_rows > 0) {
    $row_price = mysqli_fetch_assoc($result_price);
    $price = (int) $row_price["Price"]; // Cast to integer
} else {
    $price = 0;
    echo "Price not found<br>";
}

// Calculate payment amount as an integer
$paymentAmount = $lotArea * $price;
?>


<!--<h3>Payment Amount: <?php echo $paymentAmount; ?></h3>-->


<?php
// Close the database connection
mysqli_close($con);

include('partial/footer.php');
?>