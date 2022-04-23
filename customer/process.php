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
                                    <li class="breadcrumb-item active" aria-current="page">Your Booking Process List</li>
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
                    <div class="col-md-9 mx-auto">
                        <div class="card">
                            <?php
                            if (isset($_GET['book_id'])){
                                $id = $_GET['book_id'];

                                $q = "SELECT * FROM booking WHERE id = $id";

                                $r = mysqli_query($connect, $q);
                                $data = mysqli_fetch_assoc($r);
                            }
                            ?>
                            <div class="card-body bg-white">
                                <h3 class="text-center mt-3 mb-2">Status</h3>

                                <p class="font-weight-bold">Booking ID: #<?php echo $data['id'];?> <span class="float-right">Booking Date: <?php echo $data['date'];?></span></p>
                                <div class="table-responsive">
                                    <div class="table">
                                        <tr>
                                            <td>
                                                <?php
                                                $status = $data['status'];
                                                // echo $status;

                                                if (($status) == '0'){?>
                                                    <button class="btn btn-danger col-3">Pending</button>
                                                    <?php
                                                }
                                                if (($status) == '1'){?>
                                                    <button class="btn btn-success col-3">Received</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $process = $data['process'];
                                                // echo $status;

                                                if (($process) == '0'){?>
                                                    <button class="btn btn-danger col-4">Pending</button>
                                                    <?php
                                                }
                                                if (($process) == '1'){?>
                                                    <button class="btn btn-success col-4">Process Is Going On</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $process = $data['final'];
                                                // echo $status;
                                                if (($process) == '0'){?>
                                                    <button class="btn btn-danger col-4">Pending</button>
                                                    <?php
                                                }
                                                if (($process) == '1'){?>
                                                    <button class="btn btn-info col-4">Process Is Going On</button>
                                                    <?php
                                                }
                                                if (($process) == '2'){?>
                                                    <button class="btn btn-success col-4">Complete</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-center mt-2 mb-2">Customer Information</h4>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input disabled value="<?php echo $data['c_name'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input disabled value="<?php echo $data['c_phone'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input disabled  value="<?php echo $data['c_email'];?>" class="form-control">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-map-marker"></i> </span>
                                        </div>
                                        <textarea disabled class="form-control"><?php echo $data['address'];?></textarea>
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-hammer"></i> </span>
                                        </div>
                                        <input disabled value="<?php echo $data['service'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-check"></i> </span>
                                        </div>
                                        <input disabled value="<?php echo $data['date'];?> (Booking Date)" class="form-control">
                                    </div>
                                    <h4 class="font-weight-bold text-center p-2">Plumber information</h4>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-hammer"></i> </span>
                                        </div>
                                        <input disabled value="<?php echo $data['service'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input disabled value="<?php echo $data['p_name'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input disabled value="<?php echo $data['p_email'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input disabled value="<?php echo $data['p_phone'];?>" class="form-control">
                                    </div>
                                </div>

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