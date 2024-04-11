<?php include('partial/header.php'); ?>
<?php include('partial/navbar.php'); ?>
<?php include('partial/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaction List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaction List</li>
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
                <!-- DataTable for Users -->
               <div class="table-responsive">
               <table id="stakeholderTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Unit/Stakeholder</th>
                            <th>Action</th>
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



<?php include('partial/footer.php'); ?>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#stakeholderTable').DataTable({
            "ajax": {
                "url": "php/get_transaction.php", // URL to fetch user data
                "type": "GET", // Request type
                "dataSrc": "" // Data source (empty since JSON root is an array)
            },
            "columns": [{
                    "data": "txno"
                },
                {
                    "data": "tx_date"
                },
                {
                    "data": "amount"
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
        $('#stakeholderTable').on('click', '.edit-btn', function() {
            var userId = $(this).data('id');
            // Perform edit action here, e.g., open a modal with the selected data for editing
            console.log('Edit clicked for user ID:', userId);
        });

        // Handle click event for delete button
        $('#stakeholderTable').on('click', '.delete-btn', function() {
            var userId = $(this).data('id');
            // Perform delete action here, e.g., show confirmation dialog and delete the user
            console.log('Delete clicked for user ID:', userId);
        });

        // Submit form via Ajax
        $('#addStakeholderForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            // Add your AJAX request to submit form data here
            $.ajax({
                url: 'php/add_stakeholder.php', // URL to handle the form submission
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
                    $('#stakeholderTable').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                    // Display generic error toast notification
                    toastr.error('An error occurred while processing your request. Please try again later.');
                }
            });
        });
    });

</script>