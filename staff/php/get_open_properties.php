<?php
// Include database connection
include '../../connect2.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if user_id is provided in the POST request
if(isset($_POST['user_id'])) {
    // Sanitize the input to prevent SQL injection
    $userId = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare SQL query to fetch properties associated with the provided user_id
    $query = "SELECT * FROM property WHERE user_id = :user_id";

    try {
        // Execute the query and fetch properties
        $statement = $db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->execute();
        $properties = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Return properties as JSON
        echo json_encode($properties);
    } catch (PDOException $e) {
        // If an exception occurs, return an error message
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // If userId is not provided in the POST request, return an error message
    echo json_encode(['error' => 'User ID not provided']);
}
?>
