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
                    <div class="col-12">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="customer_dasboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Dashboard</li>
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
                        <div class="col-md-4 col-sm-12 float-left mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3><i class="fas fa-users fa-1x" style="color: green"></i> Total Booking</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                        if (isset($_SESSION['c_id'])){
                                            $id = $_SESSION['c_id'];

                                            $sql = "SELECT count(c_id) AS totalBooking FROM booking WHERE c_id = $id";
                                            $res = mysqli_query($connect, $sql);
                                            $values = mysqli_fetch_assoc($res);
                                            $num_rows = $values['totalBooking'];
                                            echo "<span style='font-size: 30px;'>$num_rows Plumbers</span>";

                                        }

                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 float-left mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3><i class="fas fa-users fa-1x" style="color: green"></i> Most Booking Service</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['c_id'])){
                                        $id = $_SESSION['c_id'];

                                        $sql = "SELECT service, COUNT(service) FROM booking WHERE c_id = $id GROUP BY service HAVING COUNT(service) > 1";
                                        $res = mysqli_query($connect, $sql);
                                        $values = mysqli_fetch_assoc($res);
                                        $num_rows = $values['service'];
                                        echo "<span style='font-size: 25px;'>$num_rows Service</span>";

                                    }


                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 float-left mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3><i class="fas fa-users fa-1x" style="color: green"></i> Total Pay</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['c_id'])){
                                        $id = $_SESSION['c_id'];

                                        $sql = "SELECT c_id, COUNT(c_id ) as NOFT, SUM(DISTINCT(payble)) as 'Total Amount' FROM payment WHERE c_id = $id";
                                        $res = mysqli_query($connect, $sql);
                                        $values = mysqli_fetch_assoc($res);

                                        $num_rows = $values['Total Amount'];
                                        $total = number_format($num_rows, 2);
                                        echo  "<span style='font-size: 30px;'>  $total Taka</span>";

                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mt-5">
                        <h3 class="text-center">Your Payment Analysis</h3>
                        <canvas  id="graphs" width="1000"  height="400"></canvas>
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
    var motorcycle_chart = new AwesomeChart('graphs');
    motorcycle_chart.data = [
        <?php
        $query = "SELECT * FROM payment WHERE c_id = $id";
        $res   = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($res)) {
        ?>
        <?php echo $row['payble'] . ','; ?>
        <?php }; ?>
    ];

    motorcycle_chart.labels = [
        <?php
        $query = "select * from payment WHERE c_id = $id";
        $res   = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($res)) {
        ?>
        <?php echo "'" . $row['service'] . "'" . ',' ?>
        <?php }; ?>
    ];

    motorcycle_chart.colors = ['blue', 'green', 'yaloow'];
    motorcycle_chart.randomColors = true;
    motorcycle_chart.animate = true;
    motorcycle_chart.animationFrames = 30;
    motorcycle_chart.draw();
</script>
