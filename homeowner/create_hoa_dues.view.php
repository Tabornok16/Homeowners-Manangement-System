<?php include ("partial/header.php"); ?>
<?php include ("partial/navbar.php"); ?>
<?php include ("partial/sidebar.php"); ?>
<?php include ("../connect2.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CREATE HOA DUES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">CREATE HOA DUES</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: #e5e5e5;">
                        <div class="card-body">
                            <!-- Sales Invoice Form -->
                            <form id="hoaForm" action="submit_transaction.php" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-4">

                                        <label for="vendor">HOMEOWNER</label>
                                        <select class="form-control" id="vendor" name="vendor">
                                            <?php
                                            // Fetch vendors from the database and populate the dropdown in the modal
                                            $query = "SELECT * FROM user WHERE userType = 3;";
                                            $result = $db->query($query);

                                            if ($result) {
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    // Capitalize the first, middle, and last names
                                                    $lastname = strtoupper($row['lastname']);
                                                    $firstname = strtoupper($row['firstname']);
                                                    $middlename = strtoupper($row['middlename']);

                                                    // Concatenate the capitalized names
                                                    $fullname = $lastname . " " . $firstname . " " . $middlename;

                                                    // Display the capitalized full name as an option
                                                    echo "<option value=" . $row['user_id'] . ">{$fullname}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="tx_no">TX #</label>
                                        <input type="text" class="form-control" id="tx_no" name="tx_no" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="tx_date">DATE</label>
                                        <input type="text" class="form-control" id="tx_date" name="tx_date" readonly>
                                    </div>
                                    <!-- Modal for selecting existing vendors -->
                                    <div class="modal" id="vendorModal" tabindex="-1" role="dialog"
                                        aria-labelledby="vendorModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title" id="vendorModalLabel">Select Homeowner</a>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table
                                            class="table table-hover table-bordered table-striped dataTable dtr-inline collapsed"
                                            id="propertyTable">
                                            <thead>
                                                <tr>
                                                    <th>PROPERTY ID</th>
                                                    <th>MONTHLY DUES</th>
                                                    <th>FROM</th>
                                                    <th>TO</th>
                                                    <th>AMOUNT</th>
                                                </tr>
                                            </thead>
                                            <tbody id="propertyTableBody">
                                                <!-- Each row represents a separate item -->
                                                <!-- You can dynamically add rows using JavaScript/jQuery -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <br> <br><br> <br><br> <br><br> <br>
                                    <div class="modal-footer">
                                        <div class="summary-details">
                                            <div class="container">

                                                <!-- GROSS AMOUNT -->
                                                <div class="row">

                                                    <div class="input-group">
                                                        <label>Total Amount Due:</label>
                                                        <input type="text" class="form-control" name="totalAmountDue"
                                                            id="totalAmountDue" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br><br><br>
                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-md-10 d-inline-block">

                                        <button type="button" class="btn btn-success" id="submitButton">SUBMIT</button>
                                        <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                                        <button type="button" class="btn btn-secondary" id="printButton">Print</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End Sales Invoice Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->



<?php include ('partial/footer.php') ?>

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
                var amount = $(this).find('input[name="amount[]"]').val();
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
                        // Show success message
                        toastr.success('Transaction saved!', '', {
                            onHidden: function () {
                                // Reload the page after hiding the toast
                                location.reload();
                            }
                        });
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