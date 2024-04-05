<?php include ("partial/header.php"); ?>
<?php include ("partial/navbar.php"); ?>
<?php include ("partial/sidebar.php"); ?>
<?php include ("../connect2.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CREATE HOA DUES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">CREATE HOA DUES</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: #e5e5e5;">
                        <div class="card-body">
                            <!-- Sales Invoice Form -->
                            <form id="" action="" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="vendor">HOMEOWNER</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="vendor" name="vendor"
                                                placeholder="Select homeowner">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    data-toggle="modal" data-target="#vendorModal">Select</button>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Modal for selecting existing vendors -->
                                    <div class="modal" id="vendorModal" tabindex="-1" role="dialog"
                                        aria-labelledby="vendorModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title" id="vendorModalLabel">Select Homeowner</a></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Place your vendor list here -->
                                                    <select class="form-control" id="existingVendor"
                                                        name="existingVendor">
                                                        <option value="">Select Homeowner</option>
                                                        <?php
                                                        // Fetch vendors from the database and populate the dropdown in the modal
                                                        $query = "SELECT * FROM property";
                                                        $result = $db->query($query);

                                                        if ($result) {
                                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                                echo "<option value=''>{$row['user_id']}</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                                                    <!-- Select Product Item -->
                                <div class="table-responsive">
                                    <table class="table table-condensed" id="itemTable">
                                        <thead>
                                            <tr>
                                                <th>ITEM</th>
                                                <th>DESCRIPTION</th>
                                                <th>QTY</th>
                                                <th>UOM</th>
                                                <th>RATE</th>
                                                <th>AMOUNT</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody id="itemTableBody">
                                            <!-- Each row represents a separate item -->
                                            <!-- You can dynamically add rows using JavaScript/jQuery -->
                                        </tbody>
                                        <tfoot>
                                            <tr id="totalItemsRow">
                                                <td colspan="6">Total Items:</td>
                                                <td id="totalItemsCount">0</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <div class="summary-details">
                                        <div class="container">
                                            <!-- GORSS AMOUNT -->
                                            <div class="row">

                                                <div class="col-md-4 d-inline-block text-right">
                                                    <label>Gross Amount:</label>
                                                </div>
                                                <div class="col-md-3 d-inline-block">

                                                </div>
                                                <div class="col-md-5 d-inline-block">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">&#8369;</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="grossAmount"
                                                            id="grossAmount" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- DISCOUNT -->
                                            <div class="row">
                                            <div class="col-md-4 d-inline-block text-right">
                                                    <label for="discountPercentage">DISCOUNT (%):</label>
                                                </div>
                                                <div class="col-md-3 d-inline-block">
                                                   
                                                </div>
                                                <!-- Hidden input field to hold the discountAccount value -->
                                                <input type="hidden" id="discountAccountInput" name="discountAccount" value="">
                                                <div class="col-md-5 d-inline-block">
                                                    <div class="input-group">
                                                    <select class="form-control" id="discountPercentage" name="discountPercentage"
                                                        required>
                                                    
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- NET AMOUND DUE -->
                                            <div class="row">
                                                <div class="col-md-4 d-inline-block text-right">
                                                    <label>Net Amount Due:</label>
                                                </div>
                                                <div class="col-md-3 d-inline-block">

                                                </div>
                                                <div class="col-md-5 d-inline-block">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">&#8369;</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="netAmountDue"
                                                            id="netAmountDue" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- GROSS AMOUNT -->
                                            <div class="row" style="font-size: 30px">
                                                <div class="col-md-6 d-inline-block text-right">
                                                    <label>Total Amount Due:</label>
                                                </div>
                                                <div class="col-md-6 d-inline-block">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">&#8369;</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="totalAmountDue"
                                                            id="totalAmountDue" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <!-- End Sales Invoice Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->


<?php include ('partial/footer.php') ?>


<!-- SELECT vendor -->
<script>
    // Function to handle selection of an existing vendor from the modal
    function selectExistingVendor() {
        var selectedVendor = $("#existingVendor").find(":selected");
        var vendorName = selectedVendor.text();
        var vendorEmail = selectedVendor.data("email");
        var vendorShippingAddress = selectedVendor.data("shipaddress");

        // Set the values in the manual input fields
        $("#vendor").val(vendorName);
        $("#email").val(vendorEmail);
        $("#shippingAddress").val(vendorShippingAddress);
        // Close the modal
        $("#vendorModal").modal("hide");
    }
</script>