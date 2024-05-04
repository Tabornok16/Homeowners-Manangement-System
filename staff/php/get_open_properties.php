<?php
// Include database connection
include '../../connect2.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if user_id is provided in the POST request
if(isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $userId = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare SQL query to fetch properties associated with the provided id
    $query = "SELECT * FROM property WHERE user_id = :id";

    try {
        // Execute the query and fetch properties
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $userId, PDO::PARAM_INT);
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
