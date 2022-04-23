
<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }

    require_once '../php/db_connect.php';

?>






<?php include "front/header.php"; ?>

<body id="page-top">

<?php include "front/nav.php";?>



<div id="wrapper">
   <?php include "front/sidebar.php";?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(c_id) AS totalCustomer FROM customers"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['totalCustomer']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                                ?>

                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="view_user.php">
                            <span class="float-left">Total Customer</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-secondary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS completeWork FROM booking WHERE final = 2"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['completeWork']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="confirm_order.php">
                            <span class="float-left">Complete Work</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS pendingRequest FROM booking WHERE status = 0"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['pendingRequest']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="cancel_order.php">
                            <span class="float-left">Pending Request</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                $sql = "SELECT count(id) AS totalPlumber FROM plumbers"; //select all id from donor_php table
                                $res = mysqli_query($connect, $sql);
                                $values = mysqli_fetch_assoc($res);
                                $num_rows = $values['totalPlumber']; //toatal number of available data in database
                                echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="view_plumber.php">
                            <span class="float-left">Total Plumber</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                $sql = "SELECT SUM(payble) AS Total FROM payment"; //select all id from donor_php table
                                $res = mysqli_query($connect, $sql);
                                $values = mysqli_fetch_assoc($res);

                                $num_rows = $values['Total'];
                                $total = number_format($num_rows, 2);
                                echo  "<span style='font-size: 25px;'>  $total Taka</span>";
                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="earn.php">
                            <span class="float-left">Total Earning</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
            </div>

        <!-- main content-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-5">
<!--                        --><?php
//                        $sql ="SELECT p_email, p_name, COUNT(p_email) as NOFT FROM booking GROUP BY p_email";
//                        $result = mysqli_query($connect,$sql);
//                        $chart_data="";
//                        while ($row = mysqli_fetch_array($result)) {
//
//                            $plumber_email[]  = $row['p_email'];
//                            $p_name[]   = $row['p_name'];
//                            $NOFT[] = $row['NOFT'];
//                        }
//                        ?>
                        <div style="hieght:20%;text-align:center">
                            <h3 class="page-header text-center">Analytics Reports </h3>
                            <canvas  id="graph" width="1000"  height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end of main content-->
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Create By © Md. Mehedi Hasan</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->


    <?php include "front/footer.php";?>

<script type="application/javascript">
    var motorcycle_chart = new AwesomeChart('graph');
    motorcycle_chart.data = [
        <?php
        $query = "SELECT p_email, p_name, COUNT(p_email) as NOFT FROM booking GROUP BY p_email";
        $res   = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($res)) {
        ?>
         <?php echo $row['NOFT'] . ','; ?>
        <?php }; ?>
    ];

    motorcycle_chart.labels = [
        <?php
        $query = "SELECT p_email, p_name, COUNT(p_email) as NOFT FROM booking GROUP BY p_email";
        $res   = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($res)) {
        ?>
        <?php echo "'" . $row['p_name'] . "'" . ','; ?>
        <?php }; ?>
    ];
    motorcycle_chart.colors = ['blue', 'green', 'yaloow'];
    motorcycle_chart.randomColors = true;
    motorcycle_chart.animate = true;
    motorcycle_chart.animationFrames = 30;
    motorcycle_chart.draw();
</script>

</body>
</html>
