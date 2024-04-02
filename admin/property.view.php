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
                    <h1>Property</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3 class="card-title">Title</h3>

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPropertyModal">
                    Add Property
                </button>
                <br><br>
                <table id="propertyTable" class="table table-bordered table-striped dataTable dtr-inline collapsed">
                    <thead>
                        <tr>
                            <th>Property ID</th>
                            <th>User ID</th>
                            <th>Jeast ID</th>
                            <th>Lot Area</th>
                            <th>Jeast Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
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
<div class="modal fade" id="addPropertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="userId">Homeowner:</label>
                        <select class="form-control" id="userId" name="userId">
                            <option value="">Select Homeowner</option>
                            <?php
                            // Query to fetch users from the database
                            $query = "SELECT user_id, firstname, lastname FROM user";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['user_id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jeastId">Jeast ID:</label>
                        <input type="text" class="form-control" id="jeastId" name="jeastId">
                    </div>
                    <div class="form-group">
                        <label for="lotArea">Lot Area:</label>
                        <input type="text" class="form-control" id="lotArea" name="lotArea">
                    </div>
                    <div class="form-group">
                        <label for="jeastAddress">Jeast Address:</label>
                        <input type="text" class="form-control" id="jeastAddress" name="jeastAddress">
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
                    "data": "user_id"
                },
                {
                    "data": "jeast_id"
                },
                {
                    "data": "lotArea"
                },
                {
                    "data": "jeastAdd"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return '<button class="edit-btn" data-id="' + row.prop_id + '">Edit</button> <button class="delete-btn" data-id="' + row.prop_id + '">Delete</button>';
                    }
                }
            ]

        });

        // Submit form via Ajax
        $('#addPropertyForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            // Add your AJAX request to submit form data here
            // Example:
            /*
            $.ajax({
                url: 'add_property.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    // Close modal
                    $('#addPropertyModal').modal('hide');
                    // Refresh DataTable
                    $('#propertyTable').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
            */
        });

        // Handle click event for edit button       
        $('#propertyTable').on('click', '.edit-btn', function() {
            var propertyId = $(this).data('id');
            // Perform edit action here, e.g., open a modal with the selected data for editing
            console.log('Edit clicked for property ID:', propertyId);
        });

        // Handle click event for delete button
        $('#propertyTable').on('click', '.delete-btn', function() {
            var propertyId = $(this).data('id');
            // Perform delete action here, e.g., show confirmation dialog and delete the entry
            console.log('Delete clicked for property ID:', propertyId);
        });
    });
</script>