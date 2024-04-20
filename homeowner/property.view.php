<?php include ('partial/header.php'); ?>
<?php include ('partial/navbar.php'); ?>
<?php include ('partial/sidebar.php'); ?>
<?php include ('../connect.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Property</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Property</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">My Properties</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Button to trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPropertyModal">
                    Add Property
                </button> -->
                <br><br>
                <div class="table-responsive">
                    <table id="propertyTable"
                        class="table table-hover table-bordered table-striped dataTable dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>Property ID</th>
                                <th>Name</th>
                                <th>Monthly Dues</th>
                                <th>Lot Area</th>
                                <th>Jeast Address</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="addPropertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Property</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addPropertyForm">
                    <div class="form-group">
                        <label for="propertyId">Property ID:</label>
                        <input type="text" class="form-control" id="propertyId" name="propertyId">
                    </div>
                    <div class="form-group">
                        <label for="homeowner">Homeowner:</label>
                        <select class="form-control" id="homeowner" name="homeowner">
                            <option value="">Select Homeowner</option>
                            <?php
                            // Query to fetch users from the database
                            $query = "SELECT user_id, firstname, lastname FROM user";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Concatenate user_id, first name, and last name
                                    $option_value = $row['user_id'] . '|' . $row['firstname'] . ' ' . $row['lastname'];
                                    echo '<option value="' . $option_value . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label id="hoaDuesLabel">
                            <?php
                            // Query to fetch HOA dues from the database
                            $query = "SELECT * FROM setprice WHERE category = 'HOA DUES'";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo 'PRICE PER SQM: ' . $row['price'];
                                }
                            }
                            ?>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="lotArea">Lot Area:</label>
                        <input type="text" class="form-control" id="lotArea" name="lotArea">
                    </div>
                    <div class="form-group">
                        <label for="jeastAddress">Jeast Address:</label>
                        <input type="text" class="form-control" id="jeastAddress" name="jeastAddress">
                    </div>
                    <div class="form-group">
                        <label for="monthly_dues">Monthly Dues:</label>
                        <input type="text" class="form-control" id="monthly_dues" name="monthly_dues" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include ('partial/footer.php'); ?>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#propertyTable').DataTable({
            "ajax": {
                "url": "php/get_properties.php", // URL to fetch properties data
                "type": "GET", // Request type
                "dataSrc": "" // Data source (empty since JSON root is an array)
            },
            "columns": [{
                "data": "prop_id"
            },
            {
                "data": "homeowner"
            },
            {
                "data": "monthly_dues"
            },
            {
                "data": "lotArea"
            },
            {
                "data": "jeastAdd"
            }
            ]

        });

        // Submit form via Ajax
        $('#addPropertyForm').submit(function (e) {
            e.preventDefault(); // Prevent default form submission
            // Add your AJAX request to submit form data here
            $.ajax({
                url: 'php/add_property.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    // Close modal
                    $('#addPropertyModal').modal('hide');
                    // Refresh DataTable
                    $('#propertyTable').DataTable().ajax.reload();
                    // Show success toast
                    toastr.success('Property added successfully');
                },
                error: function (xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                    // Show error toast
                    toastr.error('Error adding property: ' + xhr.responseText);
                }
            });
        });
        // Handle click event for edit button       
        $('#propertyTable').on('click', '.edit-btn', function () {
            var propertyId = $(this).data('id');
            // Perform edit action here, e.g., open a modal with the selected data for editing
            console.log('Edit clicked for property ID:', propertyId);
        });

        // Handle click event for delete button
        $('#propertyTable').on('click', '.delete-btn', function () {
            var propertyId = $(this).data('id');
            // Perform delete action here, e.g., show confirmation dialog and delete the entry
            console.log('Delete clicked for property ID:', propertyId);
        });
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get elements
        const lotAreaInput = document.getElementById("lotArea");
        const hoaDuesLabel = document.getElementById("hoaDuesLabel");
        const monthlyDuesInput = document.getElementById("monthly_dues");

        // Function to calculate monthly dues
        function calculateMonthlyDues() {
            const lotArea = parseFloat(lotAreaInput.value);
            const hoaDues = parseFloat(hoaDuesLabel.textContent.split(":")[1].trim());
            const monthlyDues = lotArea * hoaDues;

            // Update the monthly dues input field
            monthlyDuesInput.value = isNaN(monthlyDues) ? "" : monthlyDues.toFixed(2);
        }

        // Add event listeners
        lotAreaInput.addEventListener("input", calculateMonthlyDues);
        hoaDuesLabel.addEventListener("change", calculateMonthlyDues);
    });
</script>