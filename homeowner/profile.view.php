
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
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <?php
// Define or initialize the variables
$loggedInUsername = isset($loggedInUsername) ? $loggedInUsername : '';
$firstName = isset($firstName) ? $firstName : '';
$lastName = isset($lastName) ? $lastName : '';

?>

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="container" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; font-family: Arial, sans-serif;">
                        <h2 style="font-size: 24px; margin-bottom: 10px;">Profile</h2>
                        <form action="profile-action.php" method="POST" enctype="multipart/form-data">
                            <!-- User Details -->
                            <!-- <label for="username" style="display: block; margin-bottom: 5px;">Username:</label>
                            <input type="text" name="username" id="username" value="<?= isset($loggedInUsername) ? $loggedInUsername : '' ?>" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" disabled>

                            <label for="firstName" style="display: block; margin-bottom: 5px;">First Name:</label>
                            <input type="text" name="firstName" id="firstName" value="<?= isset($firstName) ? $firstName : '' ?>" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" disabled>

                            <label for="lastName" style="display: block; margin-bottom: 5px;">Last Name:</label>
                            <input type="text" name="lastName" id="lastName" value="<?= isset($lastName) ? $lastName : '' ?>" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" disabled>

                            <label for="gender" style="display: block; margin-bottom: 5px;">Gender:</label>
                            <select name="gender" id="gender" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select> -->

                            <!-- Additional Details -->
                            <hr style="margin-top: 20px; margin-bottom: 20px;">
                            <h2 style="font-size: 24px; margin-bottom: 10px;">Additional Details</h2>

                            <label for="password" style="display: block; margin-bottom: 5px;">Current Password</label>
                            <input type="password" name="password" id="password" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                            <label for="password" style="display: block; margin-bottom: 5px;">Change Password:</label>
                            <input type="password" name="password" id="password" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                            <label for="birthday" style="display: block; margin-bottom: 5px;">Birthday:</label>
                            <input type="date" name="birthday" id="birthday" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                            <label for="madd" style="display: block; margin-bottom: 5px;">Mailing Address:</label>
                            <textarea name="madd" id="madd" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea>

                            <input type="submit" value="Submit" style="background-color: #007bff; color: #fff; border: none; border-radius: 4px; padding: 10px 20px; cursor: pointer; font-size: 16px;">
                        </form>
                    </div>
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
