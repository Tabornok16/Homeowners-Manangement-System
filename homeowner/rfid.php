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
                    <h1>RFID Application Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">RFID Application Form</li>
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
            <form action="transactions.php" method="POST">
            <!-- <label for="rfid">RFID Code:</label>
            <input type="text" id="rfid" name="rfid" required> -->
            <label for="cOwner">Registered Car Owner:</label>
            <input type="text" id="cOwner" name="cOwner" required>

            <label for="validId">Driver License or Any Valid ID of the Owner:</label>
            <input type="file" id="validId" name="validId" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required>
            <br><br>

            <label for="cOwner">Plate Number:</label>
            <input type="text" id="pNumber" name="pNumber" required><br><br>

            <label for="carSticker">Car Sticker Number:</label>
            <input type="text" id="carSticker" name="carSticker" required><br><br>

            <label for="cBrand">Car Brand:</label>
            <select id="cBrandSelect" name="cBrand" required onchange="toggleTextInput('cBrandSelect', 'cBrandText')">
                <option value="" disabled selected>Select Car Brand</option>
                <option value="Toyota">Toyota</option>
                <option value="Honda">Honda</option>
                <option value="Ford">Ford</option>
                <option value="Chevrolet">Chevrolet</option>
                <option value="Other">Other</option>
            </select>
            <input type="text" id="cBrandText" name="cBrand" style="display: none;" placeholder="Enter Other Car Brand"><br><br>

            <label for="cType">Car Type:</label>
            <select id="cTypeSelect" name="cType" required onchange="toggleTextInput('cTypeSelect', 'cTypeText')">
                <option value="" disabled selected>Select Car Type</option>
                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Truck">Truck</option>
                <option value="Hatchback">Hatchback</option>
                <option value="Other">Other</option>
            </select>
            <input type="text" id="cTypeText" name="cType" style="display: none;" placeholder="Enter Other Car Type"><br><br>

            <label for="cColor">Car Color:</label>
            <select id="cColorSelect" name="cColor" required onchange="toggleTextInput('cColorSelect', 'cColorText')">
                <option value="" disabled selected>Select Car Color</option>
                <option value="red">Red</option>
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="blue">Blue</option>
                <option value="Other">Other</option>
            </select>
            <input type="text" id="cColorText" name="cColor" style="display: none;" placeholder="Enter Other Car Color"><br><br>



            <!-- <label for="amount">Amount:</label>
            <span id="amount" name="amount" required></span><br><br> -->

            <label for="refNum">Payment Reference Number:</label>
            <input type="text" id="refNum" name="refNum" required><br><br>

            <label for="requestor">Fullname of Requestor:</label>
            <input type="text" id="requestor" name="requestor" required><br><br>

            <button type="submit">Submit Application</button>
        </form>

        <script>
            // Fetch the price using AJAX when the RFID code is entered
            document.getElementById('rfid').addEventListener('change', function() {
                var rfid = this.value;
                fetchPrice(rfid);
            });

            function toggleTextInput(selectId, inputId) {
                var select = document.getElementById(selectId);
                var input = document.getElementById(inputId);

                if (select.value === "Other") {
                    input.style.display = "inline-block"; // Show text input
                    input.required = true; // Make text input required
                } else {
                    input.style.display = "none"; // Hide text input
                    input.required = false; // Remove required attribute from text input
                }
            }

            function fetchPrice(rfid) {
                fetch('get_price.php?rfid=' + rfid)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('amount').textContent = data.price;
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>
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
