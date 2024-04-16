<?php include("partial/header.php");?>
<?php include("partial/navbar.php");?>
<?php include("partial/sidebar.php");?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Issuing Penalty</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Penalty</li>
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
                <div style="display: flex; justify-content: center;">
                    <form action="issue_penalty_process.php" method="POST" style="width: 80%;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: bold;" for="homeowner">Homeowner Name or ID:</label>
                            <input style="width: 100%; max-width: 400px; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" type="text" id="homeowner" name="homeowner" required placeholder="Enter homeowner's name or ID">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: bold;" for="reason">Reason for Penalty:</label>
                            <textarea style="width: 100%; max-width: 400px; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" id="reason" name="reason" rows="4" cols="50" required placeholder="Enter reason for penalty"></textarea>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: bold;" for="amount">Penalty Amount:</label>
                            <input style="width: 100%; max-width: 400px; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" type="number" id="amount" name="amount" min="0" step="0.01" required placeholder="Enter penalty amount">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: bold;" for="notes">Additional Notes:</label>
                            <textarea style="width: 100%; max-width: 400px; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" id="notes" name="notes" rows="4" cols="50" placeholder="Enter any additional notes"></textarea>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: bold;" for="penaltyLetter">Upload Formal Penalty Letter:</label>
                            <input style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: auto;" type="file" id="penaltyLetter" name="penaltyLetter" accept=".pdf,.doc,.docx" required>
                        </div>

                        <div>
                            <button style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;" type="submit">Issue Penalty</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

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


<?php include('partial/footer.php') ?>
