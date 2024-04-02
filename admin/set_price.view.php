<?php include('partial/header.php'); ?>
<?php include('partial/navbar.php'); ?>
<?php include('partial/sidebar.php'); ?>
<?php include('../connect.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Set Price</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Set Price</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
                    Add new
                </button>
                <br><br>
                <!-- DataTable for Users -->
                <div class="table-responsive">
                    <table id="pricingTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>tx_id</th>
                                <th>date</th>
                                <th>category</th>
                                <th>subcategory</th>
                                <th>type</th>
                                <th>subtype</th>
                                <th>unitStakeholder</th>
                                <th>price</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- User data will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addDataForm">
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category" name="category">
                            <option value="">Select Category</option>
                            <?php
                            // Query to fetch users from the database
                            $query = "SELECT id, category FROM category";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Sub Category:</label>
                        <select class="form-control" id="subcategory" name="subcategory">
                            <option value="">Select Sub Category</option>
                            <?php
                            // Query to fetch users from the database
                            $query = "SELECT id, category FROM category";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>
                    <div class="form-group">
                        <label for="subtype">Subtype:</label>
                        <input type="text" class="form-control" id="subtype" name="subtype">
                    </div>
                    <div class="form-group">
                        <label for="stakeholder">Unit/Stakeholder:</label>
                        <select class="form-control" id="stakeholder" name="stakeholder">
                            <option value="">Select Unit/Stakeholder</option>
                            <?php
                            // Query to fetch users from the database
                            $query = "SELECT id, stakeholder FROM stakeholder";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['stakeholder'] . '">' . $row['stakeholder'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price (PHP):</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include('partial/footer.php'); ?>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#pricingTable').DataTable({
            "ajax": {
                "url": "php/get_pricing.php", // URL to fetch user data
                "type": "GET", // Request type
                "dataSrc": "" // Data source (empty since JSON root is an array)
            },
            "columns": [{
                    "data": "tx_id"
                },
                {
                    "data": "date"
                },
                {
                    "data": "category"
                },
                {
                    "data": "subcategory"
                },
                {
                    "data": "type"
                },
                {
                    "data": "subtype"
                },
                {
                    "data": "unitStakeholder"
                },
                {
                    "data": "price"
                },
                {
                    "data": "action"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return '<button class="edit-btn" data-id="' + row.prop_id + '">Edit</button> <button class="delete-btn" data-id="' + row.prop_id + '">Delete</button>';
                    }
                }
            ]
        });

        // Handle click event for edit button
        $('#pricingTable').on('click', '.edit-btn', function() {
            var userId = $(this).data('id');
            // Perform edit action here, e.g., open a modal with the selected data for editing
            console.log('Edit clicked for user ID:', userId);
        });

        // Handle click event for delete button
        $('#pricingTable').on('click', '.delete-btn', function() {
            var userId = $(this).data('id');
            // Perform delete action here, e.g., show confirmation dialog and delete the user
            console.log('Delete clicked for user ID:', userId);
        });

        // Submit form via Ajax
        $('#addDataForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            // Add your AJAX request to submit form data here
            $.ajax({
                url: 'php/add_price.php', // URL to handle the form submission
                method: 'POST',
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    // Display toast notification
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    // Close modal
                    $('#addDataModal').modal('hide');
                    // Refresh DataTable
                    $('#pricingTable').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                    // Display generic error toast notification
                    toastr.error('An error occurred while processing your request. Please try again later.');
                }
            });
        });

        // TODO
        // Initialize autoNumeric for the price input field
        // var priceInput = new AutoNumeric('#price', {
        //     currencySymbol: '₱', // Philippine peso currency symbol
        //     digitGroupSeparator: ',', // Use comma as a digit group separator
        //     decimalCharacter: '.', // Use dot as a decimal separator
        //     decimalPlaces: 2, // Display up to 2 decimal places
        //     allowDecimalPadding: True // Do not display unnecessary decimal zeroes
        // });

        // // Add event listener for input event to update formatting as the user types
        // $('#price').on('input', function() {
        //     priceInput.set(this.value); // Set the formatted value
        // });
    });
</script>