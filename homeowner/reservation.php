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
                    <h1>Reservation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Reservation</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        
    <!-- Main content -->
    <section class="content">
        

        <!-- Default box -->
        <div class="card">
        <form action="reservation_process.php" method="POST">
            <label for="facility">Facility:</label>
            <select id="facility" name="facility" required>
                <option value="" disabled selected>Select Facility</option>
                <option value="Basketball Court">Basketball Court</option>
                <option value="Lawn Tennis Court">Lawn Tennis Court</option>
                <option value="Function Room">Function Room</option>
                <option value="Clubhouse">Clubhouse</option>
                <option value="Swimming Pool">Swimming Pool</option>
            </select>

            <label for="requestorFullName">Fullname of Requestor:</label>
            <input type="text" id="requestorFullName" name="requestorFullName" required placeholder="Enter your fullname">
            <br><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="privileges">Privileges:</label>
            <input type="checkbox" id="member" name="privileges[]" value="Member">
            <label for="member">Member</label>
            <input type="checkbox" id="vip" name="privileges[]" value="VIP">
            <label for="vip">VIP</label><br>

            <label for="notes">Notes:</label><br>
            <textarea id="notes" name="notes" rows="4" cols="50" placeholder="Enter any special notes"></textarea><br><br>

            <label for="guests">List of Guests:</label><br>
            <textarea id="guests" name="guests" rows="4" cols="50" placeholder="Enter names of guests"></textarea>
            <br><br>

            <label for="guestListImage">Upload Guest List Image:</label>
            <input type="file" id="guestListImage" name="guestListImage" accept="image/*">
            <br><br>

            <label for="paymentRef">Payment Reference Number:</label>
            <input type="text" id="paymentRef" name="paymentRef" placeholder="Enter Payment Reference Number">
            <br><br>

            <button type="submit">Reserve</button>
        </form>

    </section>

            <div class="card-body">

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
