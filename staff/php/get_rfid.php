<?php
// Assuming you have established a database connection

if (isset($_GET['rfid'])) {
    $rfid = $_GET['rfid'];

    // Query to fetch price from setprice table based on subcategory 'rfid'
    $query = "SELECT price FROM setprice WHERE subcategory = 'rfid'";
    $result = $db->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];

        // Return the price as JSON
        echo json_encode(['price' => $price]);
    } else {
        // If price not found
        echo json_encode(['error' => 'Price not found']);
    }
} else {
    // If RFID code not provided
    echo json_encode(['error' => 'RFID code not provided']);
}
?>
