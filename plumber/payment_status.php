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
                                    <li class="breadcrumb-item active" aria-current="page">Payment Status</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3>Payment Status</h3>
                                <?php
                                    if (isset($_SESSION['id'])){
                                        $id = $_SESSION['id'];
                                    }
                                    $slect_data = "select * from payment WHERE p_id = $id";
                                    $result     = mysqli_query($connect, $slect_data);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#Serial</th>
                                                <th>Customer Name</th>
                                                <th>Customer Email</th>
                                                <th>Customer Phone</th>
                                                <th>Service</th>
                                                <th>Taka</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($result)){?>
                                            <tr>
                                                <td>#<?php echo $i++;?></td>
                                                <td><?php echo $row['c_name'];?></td>
                                                <td><?php echo $row['c_email'];?></td>
                                                <td><?php echo $row['c_phone'];?></td>
                                                <td><?php echo $row['service'];?></td>
                                                <td><?php echo $row['total'];?></td>
                                                <td>
                                                    <?php
                                                    $status = $row['status'];
                                                    // echo $status;

                                                    if (($status) == '0'){?>
                                                       <span class="text-danger">Pending</span>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                        <span class="text-success">Received</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $status = $row['status'];
                                                    // echo $status;

                                                    if (($status) == '0'){?>
                                                        <a href="payment_sts.php?p_sts=<?php echo $row['id']?>" class="btn btn-danger">Pending</a>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                        <a href="payment_sts.php?p_sts=<?php echo $row['id']?>" class="btn btn-success">Rechived</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="view_invoice.php?view_invoice=<?php echo $row['booking_id']?>"><i class="fas fa-file-invoice"></i> View</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
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