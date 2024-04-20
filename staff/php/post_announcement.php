<?php
// Assuming you have already connected to your database
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date_created = $_POST['date_created'];
    $due_date = $_POST['due_date'];

    // File upload handling
    $file_name = $_FILES['file_upload']['name'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $file_type = $_FILES['file_upload']['type'];
    $file_error = $_FILES['file_upload']['error'];

    // Specify your upload directory
    $upload_dir = "uploads/";

    if ($file_error === 0) {
        // Check file type
        $allowed_types = array('pdf', 'docx', 'doc');
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (in_array($file_ext, $allowed_types)) {
            // Generate a unique file name to avoid overwriting existing files
            $new_file_name = uniqid('file_', true) . '.' . $file_ext;

            // Move uploaded file to specified directory
            if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                // Insert announcement into the database
                $sql = "INSERT INTO post_announcement (title, content, date_created, due_date, file_name, file_path) VALUES ('$title', '$content', '$date_created', '$due_date', '$new_file_name', '$upload_dir$new_file_name')";
                // Execute SQL query
                if (mysqli_query($connection, $sql)) {
                    echo "<script>alert('Announcement posted successfully!');</script>";
                } else {
                    echo "<script>alert('Error posting announcement. Please try again later.');</script>";
                }
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type. Allowed types: PDF, DOCX, DOC.');</script>";
        }
    } else {
        echo "<script>alert('Error uploading file. Error code: $file_error');</script>";
    }
}
?>
