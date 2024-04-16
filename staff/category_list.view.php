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
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
               <table id="categoryTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Category</th>
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
                <form id="addCategoryForm">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category">
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
        $('#categoryTable').DataTable({
            "ajax": {
                "url": "php/get_category.php", // URL to fetch user data
                "type": "GET", // Request type
                "dataSrc": "" // Data source (empty since JSON root is an array)
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "category"
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
        $('#categoryTable').on('click', '.edit-btn', function() {
            var userId = $(this).data('id');
            // Perform edit action here, e.g., open a modal with the selected data for editing
            console.log('Edit clicked for user ID:', userId);
        });

        // Handle click event for delete button
        $('#categoryTable').on('click', '.delete-btn', function() {
            var userId = $(this).data('id');
            // Perform delete action here, e.g., show confirmation dialog and delete the user
            console.log('Delete clicked for user ID:', userId);
        });

        // Submit form via Ajax
        $('#addCategoryForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            // Add your AJAX request to submit form data here
            $.ajax({
                url: 'php/add_category.php', // URL to handle the form submission
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
                    $('#categoryTable').DataTable().ajax.reload();
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