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
                    <h1>View Penalty</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">View Penalty</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <!-- <div class="card">
            <div class="card-body">
            <form action="issue_penalty_process.php" method="POST">
            <label for="homeowner">Homeowner Name or ID:</label>
            <input type="text" id="homeowner" name="homeowner" required placeholder="Enter homeowner's name or ID">
            <br><br>

            <label for="reason">Reason for Penalty:</label><br>
            <textarea id="reason" name="reason" rows="4" cols="50" required placeholder="Enter reason for penalty"></textarea>
            <br><br>

            <label for="amount">Penalty Amount:</label>
            <input type="number" id="amount" name="amount" min="0" step="0.01" required placeholder="Enter penalty amount">
            <br><br>

            <label for="notes">Additional Notes:</label><br>
            <textarea id="notes" name="notes" rows="4" cols="50" placeholder="Enter any additional notes"></textarea>
            <br><br>

            <label for="penaltyLetter">Upload Formal Penalty Letter:</label>
            <input type="file" id="penaltyLetter" name="penaltyLetter" accept=".pdf,.doc,.docx" required>
            <br><br>

            <button type="submit">Issue Penalty</button>
        </form> -->

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


<?php include('partial/footer.php') ?>
