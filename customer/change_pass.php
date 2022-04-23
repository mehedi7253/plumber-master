<?php

//connect with database
require_once '../php/config.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: customer_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['c_id']);  //get all information by user id

?>
<?php include 'mastaring/top_header.php'?>
    <!--top header-->

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <?php include "mastaring/nav.php";?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <?php include "mastaring/side_bar.php";?>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->


        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="customer_dasboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Change password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->




            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card bg-gray">
                            <div class="card-header">
                                <h3 class="text-center">Change Password</h3>
                                <p>
                                    <?php
                                    if($_POST) {
                                        $currentpassword = $_POST['currentpassword'];
                                        $newpassword = $_POST['password'];
                                        $conformpassword = $_POST['conformpassword'];

                                        if($currentpassword == "") {
                                            echo "<span class='text-danger'>Current Password field is required</span> <br />";
                                        }

                                        if($newpassword == "") {
                                            echo "<span class='text-danger'>New Password field is required</span> <br />";
                                        }

                                        if($conformpassword == "") {
                                            echo "<span class='text-danger'>Confirm Password field is required</span> <br />";
                                        }

                                        if($currentpassword && $newpassword && $conformpassword) {
                                            if(passwordMatch($_SESSION['c_id'], $currentpassword) === TRUE) {

                                                if($newpassword != $conformpassword) {
                                                    echo "<span class='text-danger'>New password does not match with confirm password</span> <br />";
                                                } else {
                                                    if(changePassword($_SESSION['c_id'], $newpassword) === TRUE) {
                                                        echo "<span class='text-success'>Password Change Successfully </span>";
                                                    } else {
                                                        echo "<span class='text-danger'>Error while updating the information</span> <br />";
                                                    }
                                                }

                                            } else {
                                                echo "<span class='text-danger'>Current Password is incorrect</span> <br />";
                                            }
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="card-body bg-gray">
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" name="currentpassword" class="form-control" autocomplete="off" placeholder="Current Password" />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="New Password" />
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="conformpassword" class="form-control" autocomplete="off" placeholder="Confirm Password" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="btn" class="btn btn-info" value="Change Password" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'mastaring/footer.php'?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
<?php include 'mastaring/script.php'?>