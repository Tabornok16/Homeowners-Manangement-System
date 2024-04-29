<?php include 'partial/header.php'; ?>
<?php include 'partial/navbar.php'; ?>
<?php include 'partial/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaction History</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Transaction History</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Payment Submission Section -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Payment Submission</h3>

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
                <?php include './php/get_payment.submission.php'; ?>
            </div>
        </div>
        <!-- End Payment Submission Section -->

        <!-- First Default Box -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Transaction Logs</h3>

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
                <?php include './php/get_transaction.php'; ?>
            </div>
        </div>

        <!-- Second Default Box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Transaction Particulars Logs</h3>

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
                <?php include './php/get_transaction.particulars.php'; ?>
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include 'partial/footer.php'; ?>
