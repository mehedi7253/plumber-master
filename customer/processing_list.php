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
                                    <li class="breadcrumb-item active" aria-current="page">Your processing List</li>
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
                                <h3 class="text-center">Your Order Status</h3>
                            </div>
                            <div class="card-body">
                                <?php

                                ?>

                                <br /><br />
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="alert-success">
                                        <tr>
                                            <th>Serial</th>
                                            <th>Plumber Name</th>
                                            <th>Plumber Phone</th>
                                            <th>Plumber Address</th>
                                            <th>Service</th>
                                            <th>Booking Date</th>
                                            <th>More</th>
                                        </tr>
                                        </thead>

                                        <?php
                                        if (isset($_SESSION['c_id'])){
                                            $c_id = $_SESSION['c_id'];

                                            $sql = "SELECT * FROM booking WHERE c_id = $c_id";
                                            $fetchs = mysqli_query($connect, $sql);
                                        }

                                        ?>

                                        <tbody>
                                        <?php
                                        $i =1;
                                        while ($fetch = mysqli_fetch_assoc($fetchs)){?>
                                            <tr>
                                                <td><?php echo  $i++ ?></td>
                                                <td><?php echo $fetch['p_name'];?></td>
                                                <td><?php echo $fetch['p_phone'];?></td>
                                                <td><?php echo $fetch['p_address'];?></td>
                                                <td><?php echo $fetch['service'];?></td>
                                                <td><?php echo $fetch['date'];?></td>
                                                <td>
                                                    <a href="process.php?book_id=<?php echo $fetch['id'];?>" class="btn btn-info">View More</a>
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