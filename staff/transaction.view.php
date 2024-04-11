<?php include("partial/header.php"); ?>
<?php include("partial/navbar.php"); ?>
<?php include("partial/sidebar.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transactions List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Transactions List</li>
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
                    <table id="stakeholderTable" class="table table-bordered table-striped table-hover" style="text-align: center;">
                        <thead>
                            <tr>
                                <!-- <th>Username</th> -->
                                <th>Homeowner</th>
                                <th>Tx ID</th>
                                <th>Tx No.</th>
                                <th>Particular</th>
                                <th>Period Covered</th>
                                <!-- <th>fromDate</th>
                                <th>toDate</th> -->
                                <th>Verification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table rows content here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <!-- Footer content -->
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('partial/footer.php'); ?>
