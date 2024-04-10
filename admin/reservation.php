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
        <div class="card" style="width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; font-family: Arial, sans-serif;">
    <form action="reservation_process.php" method="POST">
        <!-- Facility -->
        <label for="facility" style="display: block; margin-bottom: 10px;">Facility:</label>
        <select id="facility" name="facility" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            <option value="" disabled selected>Select Facility</option>
            <option value="Basketball Court">Basketball Court</option>
            <option value="Lawn Tennis Court">Lawn Tennis Court</option>
            <option value="Function Room">Function Room</option>
            <option value="Clubhouse">Clubhouse</option>
            <option value="Swimming Pool">Swimming Pool</option>
        </select>

        <!-- Fullname of Requestor -->
        <label for="requestorFullName" style="display: block; margin-bottom: 10px;">Fullname of Requestor:</label>
        <input type="text" id="requestorFullName" name="requestorFullName" required placeholder="Enter your fullname" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

        <!-- Date and Time -->
        <label for="date" style="display: block; margin-bottom: 10px;">Date:</label>
        <input type="date" id="date" name="date" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

        <label for="time" style="display: block; margin-bottom: 10px;">Time:</label>
        <input type="time" id="time" name="time" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

        <!-- Privileges -->
        <label for="privileges" style="display: block; margin-bottom: 10px;">Privileges:</label>
        <input type="checkbox" id="member" name="privileges[]" value="Member" style="margin-right: 5px;">
        <label for="member">Member</label>
        <input type="checkbox" id="vip" name="privileges[]" value="VIP" style="margin-right: 5px;">
        <label for="vip">VIP</label><br>

        <!-- Notes -->
        <label for="notes" style="display: block; margin-bottom: 10px;">Notes:</label>
        <textarea id="notes" name="notes" rows="4" cols="50" placeholder="Enter any special notes" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea>

        <!-- List of Guests -->
        <label for="guests" style="display: block; margin-bottom: 10px;">List of Guests:</label>
        <textarea id="guests" name="guests" rows="4" cols="50" placeholder="Enter names of guests" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea>

        <!-- Upload Guest List Image -->
        <label for="guestListImage" style="display: block; margin-bottom: 10px;">Upload Guest List Image:</label>
        <input type="file" id="guestListImage" name="guestListImage" accept="image/*" style="margin-bottom: 15px;">

        <!-- Payment Reference Number -->
        <!-- <label for="paymentRef" style="display: block; margin-bottom: 10px;">Payment Reference Number:</label>
        <input type="text" id="paymentRef" name="paymentRef" placeholder="Enter Payment Reference Number" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"> -->

        <!-- Submit Button -->
        <button type="submit" style="background-color: #007bff; color: #fff; border: none; border-radius: 4px; padding: 10px 20px; cursor: pointer; font-size: 16px;">Reserve</button>
    </form>
</div>

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
