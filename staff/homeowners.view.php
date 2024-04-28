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
                    <h1>Homeowners</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Homeowners</li>
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
                <h3 class="card-title">Homeowners List</h3>

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
                    Add Homeowner
                </button>
                <br><br>
                <!-- DataTable for Homeowners -->
                <table id="homeownersTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Birthday</th>
                            <th>Email</th>
                            <!-- <th>Password</th> -->
                            <th>Contact Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Homeowner data will be populated here -->
                    </tbody>
                </table>
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
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new homeowner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addHomeownersForm">
                    <div class="form-group">
                        <label for="userName">User Name:</label>
                        <input type="text" class="form-control" id="userName" name="userName">
                    </div>
                    <div class="form-group">
                        <label for="fullName">Full Name:</label>
                        <input type="text" class="form-control" id="fullName" name="fullName">
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
                        <span id="bdayError" style="color: red;"></span>
                        <!-- Your form fields -->
                        <div class="form-group">
                            <label for="bday">Birthday:</label>
                            <input type="date" class="form-control" id="bday" name="bday" min="<?php echo date('Y-m-d', strtotime('-18 years')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="contactNum">Contact Number:</label>
                            <input type="text" class="form-control" id="contactNum" name="contactNum">
                        </div>
                        <!-- Add more form fields as needed -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('partial/footer.php'); ?>

<script>
    document.getElementById('addHomeownersForm').addEventListener('submit', function(e) {
        var birthday = new Date(document.getElementById('bday').value);
        var today = new Date();
        var age = today.getFullYear() - birthday.getFullYear();

        if (age < 18) {
            e.preventDefault();
            document.getElementById('bdayError').textContent = "Must be 18 or older.";
        } else {
            document.getElementById('bdayError').textContent = "";
        }
    });

    $(document).ready(function() {
        // Initialize DataTable
        $('#homeownersTable').DataTable({
            "ajax": {
                "url": "php/get_homeowners.php", // URL to fetch homeowners data
                "type": "GET", // Request type
                "dataSrc": "data" // Data source (set to "data" as JSON root is an array)
            },
            "columns": [
                {"data": "id"},
                {"data": "userName"},
                {"data": "fullName"},
                {"data": "gender"},
                {"data": "bday"},
                {"data": "email"},
                {"data": "contactNum"}
            ],
            "buttons": [
                'copy', 'excel', 'pdf', 'print' // Add buttons for copy, excel, pdf, and print
            ]
        });

        // Submit form via Ajax
        $('#addHomeownersForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            // Add your AJAX request to submit form data here
            $.ajax({
                url: 'php/add_homeowners.php', // URL to handle the form submission
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
                    $('#homeownersTable').DataTable().ajax.reload();
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
