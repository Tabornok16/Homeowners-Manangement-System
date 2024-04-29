

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

    // Query to count all records from the payment_submission table
    $sql = "SELECT COUNT(*) as totalSubmissions FROM payment_submissions";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Fetch the total number of payment submissions
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalSubmissions = $row['totalSubmissions'];

    // Display the total number of payment submissions
    echo '<div>  '. $totalSubmissions . '</div>';
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

