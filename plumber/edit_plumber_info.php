<?php

//connect with database
require_once '../php/config_plumber.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: plumber_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id

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
                                    <li class="breadcrumb-item"><a href="plumber_dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Update Your Information</h1>

                                <?php


                                if($_POST) {
                                    $fname       = $_POST['fname']; // declare variable fname and put it into post method.
                                    $lname       = $_POST['lname']; // declare variable lname and put it into post method.
                                    $contact     = $_POST['contact']; // declare variable contact and put it into post method.
                                    $address     = $_POST['address']; // declare variable address and put it into post method.
                                    $gender      = $_POST['gender']; // declare variable gender and put it into post method.
                                    //check error
                                    //check filename is required
                                    if($fname == "") {
                                        echo "<span class='text-danger'> * First Name is Required</span> <br />";
                                    }

                                    //check lastname is required
                                    if($lname == "") {
                                        echo "<span class='text-danger'> * Last Name is Required</span> <br />";
                                    }

//                                if($username == "") {
//                                    echo "<span class='text-danger'> * Email is Required</span> <br />";
//                                }

                                    //check contact is required
                                    if($contact == "") {
                                        echo "<span class='text-danger'> * Contact is Required</span> <br />";
                                    }

                                    //check address is required
                                    if($address == "") {
                                        echo "<span class='text-danger'> * Address is Required</span> <br />";
                                    }

                                    //check gender is required
                                    if($gender == "") {
                                        echo "<span class='text-danger'> * Gender is Required</span> <br />";
                                    }
                                    //here  check all user  information. if user coorectly input their information message will be shown  Successfully Updated other wise not.
                                    if($fname && $lname  && $contact && $address && $gender) {
                                        $user_exists = users_exists_by_id($_SESSION['id'], $username);
                                        if($user_exists === TRUE) {
                                            echo "username already exists <br /> ";
                                        } else {
                                            if(updateInfo($_SESSION['id']) === TRUE) {
                                                echo "<h3 class='text-success mt-5'>Successfully Updated</h3> <br />";
                                            } else {
                                                echo "<span class='text-danger'>Error while updating the information</span>";
                                            }
                                        }
                                    }

                                }
                                ?>


                            </div>
                            <div class="card-body">

                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="text" class="form-control" name="username" id="username" title="You Can not update Your @Email address" placeholder="Email" disabled formtarget="uu" value=" <?php echo $userdata['username'] ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Fisrt Name" value="<?php if($_POST) {
                                            echo $_POST['fname'];
                                        } else {
                                            echo $userdata['first_name'];
                                        } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php if($_POST) {
                                            echo $_POST['lname'];
                                        } else {
                                            echo $userdata['last_name'];
                                        } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nid">NID</label>
                                        <input type="text" class="form-control" name="username" id="username" title="You Can not update Your NID Number" placeholder="Email" disabled formtarget="uu" value=" <?php echo $userdata['nid'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Service</label>
                                        <input type="text" class="form-control" name="username" id="username" title="Contact With Admin To change your service" placeholder="Service" disabled formtarget="uu" value=" <?php echo $userdata['service'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php if($_POST) {
                                            echo $_POST['contact'];
                                        } else {
                                            echo $userdata['contact'];
                                        }  ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php if($_POST) {
                                            echo $_POST['address'];
                                        } else {
                                            echo $userdata['address'];
                                        } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Gender : </label> <br/>
                                        <label class="radio-inline"><input type="radio" name="gender" value="Male"> Male</label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="Female"> Female</label>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success btn-block">Update</button>
                                    </div>

                                </form>
                            </div>


                            <div class="card-footer">
                                <a href="" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
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