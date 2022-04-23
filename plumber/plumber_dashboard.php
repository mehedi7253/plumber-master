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
                                    <li class="breadcrumb-item active" aria-current="page">Dash Board</li>
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
                       <div class="col-sm-6 col-md-6 float-left">
                           <div class="card">
                               <div class="card-header">
                                   <h3><i class="fas fa-users fa-1x" style="color: green"></i> Total Hired </h3>
                               </div>
                               <div class="card-body">
                                   <?php
                                   if (isset($_SESSION['id'])){
                                       $id = $_SESSION['id'];

                                       $sql = "SELECT count(id) AS totalBooking FROM booking WHERE plumberID = $id";
                                       $res = mysqli_query($connect, $sql);
                                       $values = mysqli_fetch_assoc($res);
                                       $num_rows = $values['totalBooking']; //toatal number of available data in database
                                       echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data

                                   }

                                   ?>
                               </div>
                           </div>
                       </div>
                        <div class="col-sm-6 col-md-6 float-left">
                            <div class="card">
                                <div class="card-header">
                                    <h3><i class="fas fa-users fa-1x" style="color: green"></i> Total Income</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['id'])){
                                        $id = $_SESSION['id'];

                                        $sql = "SELECT p_ID, COUNT(p_ID) as NOFT, SUM(DISTINCT(payble)) as 'Total Amount'
                                          FROM payment WHERE p_ID = $id";
                                        $res = mysqli_query($connect, $sql);
                                        $values = mysqli_fetch_assoc($res);
                                        $num_rows = $values['Total Amount']; //toatal number of available data in database
                                        $total = number_format($num_rows, 2);
                                        echo "<span class='text-center' style='font-size: 30px;'>$total Taka</span>"; //print data

                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mt-5">
                        <h3 class="text-center">Most Customer Hired You</h3>
                        <canvas  id="plumber" width="1000"  height="400"></canvas>
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
<script type="application/javascript">
    var motorcycle_chart = new AwesomeChart('plumber');
    motorcycle_chart.data = [
        <?php
        $query = "SELECT c_email, c_name, COUNT(c_email) as NOFT FROM booking WHERE plumberID = $id GROUP BY c_email";
        $res   = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($res)) {
        ?>
        <?php echo $row['NOFT'] . ','; ?>
        <?php }; ?>
    ];

    motorcycle_chart.labels = [
        <?php
        $query = "SELECT c_email, c_name, COUNT(c_email) as NOFT FROM booking WHERE plumberID = $id GROUP BY c_email";
        $res   = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($res)) {
        ?>
        <?php echo "'" . $row['c_name'] . "'" . ','; ?>
        <?php }; ?>
    ];

    motorcycle_chart.colors = ['blue', 'green', 'yaloow'];
    motorcycle_chart.randomColors = true;
    motorcycle_chart.animate = true;
    motorcycle_chart.animationFrames = 30;
    motorcycle_chart.draw();
</script>


