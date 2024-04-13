<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_db";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


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



<script>
    $(document).ready(function () {

        $('#submitButton').click(function () {
    // Serialize form data
    var formData = $('#hoaForm').serialize();

    // Get additional data for properties
    var propertyIDs = [];
    var amounts = [];
    var fromDates = [];
    var toDates = [];
    $('#propertyTableBody tr').each(function () {
        var propertyID = $(this).find('input[name="particular[]"]').val();
        var amount = $(this).find('input[name="monthlyDues[]"]').val();
        var fromDate = $(this).find('input[name="fromDate[]"]').val();
        var toDate = $(this).find('input[name="toDate[]"]').val();

        propertyIDs.push(propertyID);
        amounts.push(amount);
        fromDates.push(fromDate);
        toDates.push(toDate);
    });

    // Append additional data to formData
    formData += '&propertyIDs=' + JSON.stringify(propertyIDs);
    formData += '&amount=' + JSON.stringify(amounts);
    formData += '&fromDate=' + JSON.stringify(fromDates);
    formData += '&toDate=' + JSON.stringify(toDates);

    // Log serialized form data to console
    console.log("Serialized Form Data:", formData);

    // Send AJAX request
    $.ajax({
        url: $('#hoaForm').attr('action'),
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            // Handle success response
            console.log(response);
            if (response.success) {
                // Show success message or redirect to another page
                alert("Transaction submitted successfully");
                // Redirect to another page if needed
                // window.location.href = "success.php";
            } else {
                // Show error message
                alert("Failed to submit transaction");
            }
        },
        error: function (xhr, status, error) {
            // Handle error
            console.error(error);
            // Log MySQL error message to console
            console.log("MySQL error: " + xhr.responseText);
            // Display MySQL error message in alert
            alert("Error occurred while submitting transaction. Please check the console for details.");
        }
    });
});

$(document).ready(function () {
    // Function to fetch and populate properties for the logged-in homeowner
    function fetchProperties() {
        // Make AJAX request to fetch properties
        $.ajax({
            url: 'php/get_user_properties.php', // Adjust the URL based on your backend logic
            method: 'POST',
            dataType: 'json',
            success: function (response) {
                // Populate the property table with the retrieved data
                var tableBody = $('#propertyTableBody');
                tableBody.empty(); // Clear previous data

                // Loop through the retrieved properties and append rows to the table
                $.each(response, function (index, property) {
                    var row = '<tr>' +
                        '<td>' + property.prop_id + '</td>' +
                        '<td>' + property.monthly_dues + '</td>' +
                        '<td><input type="month" name="fromDate[]" class="form-control fromDate"></td>' +
                        '<td><input type="month" name="toDate[]" class="form-control toDate"></td>' +
                        '<td><input type="text" name="amount[]" class="amount" disabled></td>' +
                        '</tr>';
                    tableBody.append(row);
                });
            },
            error: function (xhr, status, error) {
                // Handle errors
                console.error(error);
            }
        });
    }

    // Call the fetchProperties function when the page is loaded
    fetchProperties();

    // Calculate amount when dates are selected or changed
    $(document).on('change', '.fromDate, .toDate', function () {
        var row = $(this).closest('tr');
        var amount = calculatePropertyAmount(row);
        calculateTotalAmountDue();
    });

    // Other parts of your JavaScript code
});


  // Function to calculate amount for a single property
  function calculatePropertyAmount(row) {
            var fromDate = new Date(row.find('.fromDate').val());
            var toDate = new Date(row.find('.toDate').val());
            var monthlyDues = parseFloat(row.find('.monthlyDues').val());
            if (!isNaN(monthlyDues)) {
                var monthsDifference = (toDate.getFullYear() - fromDate.getFullYear()) * 12 + toDate.getMonth() - fromDate.getMonth() + 1;
                var amount = monthlyDues * monthsDifference;
                row.find('.amount').val(amount.toFixed(2));

                return amount;
            }
            return 0;
        }

        // Function to calculate total amount due for all properties
        // Function to calculate total amount due for all properties
        function calculateTotalAmountDue() {
            var totalAmountDue = 0;
            $('.amount').each(function () {
                var amount = parseFloat($(this).val());
                if (!isNaN(amount)) {
                    totalAmountDue += amount;
                }
            });
            $('#totalAmountDue').val(totalAmountDue.toFixed(2));
        }

        $('#vendor').change(function () {
            var userId = $(this).val(); // Get the selected user_id
            // Make AJAX request to fetch properties of selected homeowner
            $.ajax({
                url: 'php/get_open_properties.php', // PHP script to fetch properties
                method: 'POST',
                data: { userId: userId }, // Send the selected user_id to the PHP script
                dataType: 'json',
                success: function (response) {
                    // Populate the property table with the retrieved data
                    var tableBody = $('#propertyTableBody');
                    tableBody.empty(); // Clear previous data

                    // Loop through the retrieved properties and append rows to the table
                    $.each(response, function (index, property) {
                        // Log each property before appending to the table
                        console.log("Property:", property);
                        var row = '<tr>' +
                            '<td><input type="text" name="particular[]" value="' + property.prop_id + '" disabled></td>' +
                            '<td><input type="number" name="monthlyDues[]" class="form-control monthlyDues" value="' + property.monthly_dues + '"></td>' + // Hidden input for monthly dues
                            '<td><input type="month" name="fromDate[]" class="form-control fromDate"></td>' + // Use type="month" for month input
                            '<td><input type="month" name="toDate[]" class="form-control toDate"></td>' + // Use type="month" for month input
                            '<td><input type="text" name="amount[]" class="amount" disabled></td>' + // Add class for "AMOUNT" input
                            '</tr>';
                        tableBody.append(row);
                    });
                },
                error: function (xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
        });

        // Calculate amount when dates are selected or changed
        $(document).on('change', '.fromDate, .toDate', function () {
            var row = $(this).closest('tr');
            var amount = calculatePropertyAmount(row);
            calculateTotalAmountDue();
        });

        // Get the current date
        var currentDate = new Date();

        // Format the date as YYYY-MM-DD
        var formattedDate = currentDate.toISOString().split('T')[0];

        // Set the formatted date as the value of the input field
        $('#tx_date').val(formattedDate);

    });

</script>