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
                                    <li class="breadcrumb-item active" aria-current="page">Notice</li>
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
                                <h1 class="text-center">Manage Notice</h1>
                                <?php
                                $sql = "SELECT * FROM notice";
                                $result = mysqli_query($connect, $sql);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Notice Title</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <?php while ($row = $result->fetch_assoc()) {?>
                                                <tbody>
                                                <tr>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['application']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                </tr>
                                                </tbody>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="admin_dashboard.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
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