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
                                    <li class="breadcrumb-item active" aria-current="page">Make Invoice</li>
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
                                <h3>Make Invoice For Customer</h3>
                                <?php
                                if (isset($_SESSION['id'])){
                                    $id = $_SESSION['id'];

                                    $payment_query = "SELECT * FROM booking WHERE plumberID = $id";
                                    $result        = mysqli_query($connect, $payment_query);
                                }

                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>#Serial</th>
                                                <th>Customer Name</th>
                                                <th>Customer Email</th>
                                                <th>Customer Phone</th>
                                                <th>Service</th>
                                                <th>Invoice</th>
                                                <th>View Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            while ($customer_data = mysqli_fetch_assoc($result)){?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $customer_data['c_name'];?></td>
                                                    <td><?php echo $customer_data['c_email'];?></td>
                                                    <td><?php echo $customer_data['c_phone'];?></td>
                                                    <td><?php echo $customer_data['service'];?></td>
                                                    <td>
                                                        <a href="invoice.php?make_invoice=<?php echo $customer_data['id']?>"><i class="fas fa-file-signature"></i> Make Now</a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $link = $customer_data['id'];
                                                            $s = "SELECT * FROM payment WHERE booking_id = $link";
                                                            $b = mysqli_query($connect, $s);
                                                        ?>

                                                        <?php while ($l = mysqli_fetch_assoc($b)){?>
                                                        <a href="view_invoice.php?view_invoice=<?php echo $l['booking_id']?>"><i class="fas fa-eye"></i> View</a>
                                                    <?php }?>
                                                    </td>
                                                </tr>
                                        <?php } ?>
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