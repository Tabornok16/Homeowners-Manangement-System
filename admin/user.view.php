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
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">User Verification</li>
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
                <h3 class="card-title">Users Verification</h3>

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                    Register New User
                </button>
                <br><br>
                <!-- DataTable for Users -->
                <table id="userTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Type</th>
                            <th>Gender</th>
                            <th>Marital Status</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Mailing Address</th>
                            <th>Postal Code</th>
                            <th>Birthday</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- User data will be populated here -->
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <!-- Footer -->
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    <div class="form-group">
                        <label for="username">User Name: </label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="userType">User Type:</label>
                        <select class="form-control" id="userType" name="userType">
                            <option value="1">Admin</option>
                            <option value="2">Staff</option>
                            <option value="3">Homeowner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Marital Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widow">Widow</option>
                            <option value="Divorce">Divorce</option>
                            <option value="Seperated">Seperated</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="mm/dd/yyyy">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber">
                    </div>
                    <div class="form-group">
                        <label for="mailingAddress">Mailing Address:</label>
                        <input type="text" class="form-control" id="mailingAddress" name="mailingAddress">
                    </div>
                    <div class="form-group">
                        <label for="postalCode">Postal Code:</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode">
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
        $('#userTable').DataTable({
            "ajax": {
                "url": "php/get_users.php", // URL to fetch user data
                "type": "GET", // Request type
                "dataSrc": "" // Data source (empty since JSON root is an array)
            },
            "columns": [{
                    "data": "user_id"
                },
                {
                    "data": "username"
                },
                {
                    "data": "firstname"
                },
                {
                    "data": "lastname"
                },
                {
                    "data": "userType"
                },
                {
                    "data": "gender"
                },
                {
                    "data": "status"
                },
                {
                    "data": "email"
                },
                {
                    "data": "phone"
                },
                {
                    "data": "madd"
                },
                {
                    "data": "postal"
                },
                {
                    "data": "birthday"
                },
                {
                    "data": null,
"render": function(data, type, row) {
    return '<button class="edit-btn" data-id="' + row.userID + '" style="display: inline-block;">Edit</button> <button class="view-btn" data-id="' + row.userID + '" style="display: inline-block;">View</button>';
}
                }
            ],
            "buttons": [
                'copy', 'excel', 'pdf', 'print' // Add buttons for copy, excel, pdf, and print
            ]
        });

        // Handle click event for edit button
        $('#userTable').on('click', '.edit-btn', function() {
            var userId = $(this).data('id');
            // Perform edit action here, e.g., open a modal with the selected data for editing
            console.log('Edit clicked for user ID:', userId);
        });

        // Handle click event for view button
        $('#userTable').on('click', '.view-btn', function() {
            var userId = $(this).data('id');
            // Perform view action here, e.g., show confirmation dialog and view the user
            console.log('View clicked for user ID:', userId);
        });

        // Submit form via Ajax
        $('#addUserForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            // Add your AJAX request to submit form data here
            $.ajax({
                url: 'php/add_user.php', // URL to handle the form submission
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
                    $('#addUserModal').modal('hide');
                    // Refresh DataTable
                    $('#userTable').DataTable().ajax.reload();
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