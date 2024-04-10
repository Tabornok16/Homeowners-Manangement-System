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
                    <h1>RFID Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">RFID Payment</li>
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
            <div class="container" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; font-family: Arial, sans-serif;">
    <h2 style="font-size: 24px; margin-bottom: 20px; text-align: center;">Car Registration Application</h2>
    <form action="transactions.php" method="POST">
        
        <!-- RFID CODE -->
        <label for="rfid" class="form-label">RFID Code:</label>
        <input type="text" id="rfid" name="rfid" class="form-control" required>
    
        <!-- Registered Car Owner -->
        <label for="cOwner" style="display: block; margin-bottom: 10px;">Registered Car Owner:</label>
        <input type="text" id="cOwner" name="cOwner" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

        <!-- Driver License or Valid ID -->
        <label for="validId" style="display: block; margin-bottom: 10px;">Driver License or Any Valid ID of the Owner:</label>
        <input type="file" id="validId" name="validId" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required style="margin-bottom: 15px;">

        <!-- Plate Number -->
        <label for="pNumber" style="display: block; margin-bottom: 10px;">Plate Number:</label>
        <input type="text" id="pNumber" name="pNumber" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

        <!-- Car Sticker Number -->
        <label for="carSticker" style="display: block; margin-bottom: 10px;">Car Sticker Number:</label>
        <input type="text" id="carSticker" name="carSticker" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

        <!-- Car Brand -->
        <label for="cBrandSelect" style="display: block; margin-bottom: 5px;">Car Brand:</label>
        <select id="cBrandSelect" name="cBrand" required onchange="toggleTextInput('cBrandSelect', 'cBrandText')" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            <option value="" disabled selected>Select Car Brand</option>
            <option value="Toyota">Toyota</option>
            <option value="Honda">Honda</option>
            <option value="Ford">Ford</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Other">Other</option>
        </select>
        <input type="text" id="cBrandText" name="cBrand" style="display: none; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" placeholder="Enter Other Car Brand">

        <!-- Car Type -->
        <label for="cTypeSelect" style="display: block; margin-bottom: 5px;">Car Type:</label>
        <select id="cTypeSelect" name="cType" required onchange="toggleTextInput('cTypeSelect', 'cTypeText')" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            <option value="" disabled selected>Select Car Type</option>
            <option value="Sedan">Sedan</option>
            <option value="SUV">SUV</option>
            <option value="Truck">Truck</option>
            <option value="Hatchback">Hatchback</option>
            <option value="Other">Other</option>
        </select>
        <input type="text" id="cTypeText" name="cType" style="display: none; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" placeholder="Enter Other Car Type">

        <!-- Car Color -->
        <label for="cColorSelect" style="display: block; margin-bottom: 5px;">Car Color:</label>
        <select id="cColorSelect" name="cColor" required onchange="toggleTextInput('cColorSelect', 'cColorText')" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            <option value="" disabled selected>Select Car Color</option>
            <option value="red">Red</option>
            <option value="white">White</option>
            <option value="black">Black</option>
            <option value="blue">Blue</option>
            <option value="Other">Other</option>
        </select>
        <input type="text" id="cColorText" name="cColor" style="display: none; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" placeholder="Enter Other Car Color">

        <!-- Payment Reference Number -->
        <label for="refNum" style="display: block; margin-bottom: 10px;">Payment Reference Number:</label>
        <input type="text" id="refNum" name="refNum" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

        <!-- Fullname of Requestor -->
        <label for="requestor" style="display: block; margin-bottom: 10px;">Fullname of Requestor:</label>
        <input type="text" id="requestor" name="requestor" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

        <!-- Submit Button -->
        <button type="submit" style="background-color: #007bff; color: #fff; border: none; border-radius: 4px; padding: 10px 20px; cursor: pointer; font-size: 16px;">Submit Application</button>
    </form>

    </div>
</div>



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
