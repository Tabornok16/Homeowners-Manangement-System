<?php include('partial/header.php'); ?>
<?php include('partial/navbar.php'); ?>
<?php include('partial/sidebar.php'); ?>
?>

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
                        <?php
                        // Assuming you have already established a database connection
                        $result = mysqli_query($connection, $sql);
                        // Define your SQL query
                        $sql = "
                            SELECT
                                user.username,
                                CONCAT(user.firstname, ' ', user.lastname) AS homeowner,
                                transaction.tx_id,
                                transaction.tx_no,
                                transaction_particulars.particular,
                                transaction_particulars.period,
                                transaction_particulars.fromDate,
                                transaction_particulars.toDate,
                                transaction_particulars.amount,
                                transaction_particulars.verification
                            FROM
                                hoa_db.user
                            INNER JOIN
                                hoa_db.transaction
                            ON
                                user.user_id = transaction.user_id
                            INNER JOIN
                                hoa_db.transaction_particulars
                            ON
                                transaction.tx_id = transaction_particulars.tx_id;
                        ";

                        // Execute the query
                        $result = mysqli_query($connection, $sql);

                        // Check if the query was successful
                        if ($result) {
                            // Fetch data from the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Output or process each row of data
                                echo "<tr>";
                                echo "<td>" . $row['tx_id'] . "</td>";
                                echo "<td>" . $row['username'] . " (" . $row['homeowner'] . ")</td>";
                                echo "<td>";
                                echo '<button type="button" class="btn btn-primary">Edit</button>';
                                // Add more actions/buttons as needed
                                echo "</td>";
                                echo "</tr>";
                            }

                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            // If the query fails, display an error message
                            echo '<tr><td colspan="3">Error: ' . mysqli_error($connection) . '</td></tr>';
                        }

                        // Close the database connection
                        mysqli_close($connection);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


                    <tbody>
                        <!-- User data will be populated here -->
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