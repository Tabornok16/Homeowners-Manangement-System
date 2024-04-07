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
                        <li class="breadcrumb-item"><a href="admin\index.php">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        
    <div class="container">
        <h2>Change information</h2>
        <form action="profile-action.php" method="POST" enctype="multipart/form-data">
            <!-- Upload Image -->
            <!-- <label for="userImage">Upload Image:</label>
            <input type="file" name="userImage" id="userImage"> -->

            <!-- User Details -->

            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= $loggedInUsername ?>" disabled>

            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" value="<?= $firstName ?>" disabled>

            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" value="<?= $lastName ?>" disabled>
        

            <!-- Additional Details -->
            <hr>
            <h2>Additional Details</h2>

            <label for="password">Change Password:</label>
            <input type="password" name="password" id="password">

            <label for="phone">Change Phone Number:</label>
            <input type="phone" name="phone" id="phone">

            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" id="birthday">

            <label for="madd">Mailing Address:</label>
            <textarea name="madd" id="madd"></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
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