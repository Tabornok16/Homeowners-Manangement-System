<?php
// Check if the amount and value parameters are set in the URL
if (isset($_GET['amount']) && isset($_GET['value'])) {
    // Sanitize and retrieve the amount and value from the URL
    $amount = filter_var($_GET['amount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $value = filter_var($_GET['value'], FILTER_SANITIZE_STRING);

    // Perform payment processing logic here, such as updating a database record or sending payment to a payment gateway
    // For demonstration purposes, we'll just display a success message
    $paymentMessage = "Payment of $amount for $value successful!";
} else {
    // Redirect the user back to the previous page or show an error message if parameters are missing
    header("Location: index.php"); // Redirect to index.php or any other appropriate page
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proof of Payment</title>
</head>

<body>
    <h1>Payment Details</h1>
    <?php if (isset($paymentMessage)) : ?>
        <p><?php echo $paymentMessage; ?></p>
    <?php endif; ?>
    <!-- You can add more HTML here for displaying payment details or options -->
</body>

</html>
