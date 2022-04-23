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
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                    <div class="col-md-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>Create Invoice</h3>
                                <?php
                                if (isset($_GET['make_invoice'])){
                                    $make_invoice = $_GET['make_invoice'];

                                    $sql = "SELECT * FROM booking WHERE id = $make_invoice";
                                    $res = mysqli_query($connect, $sql);

                                    $customer_data = mysqli_fetch_assoc($res);
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <h4>
                                    <?php
                                    if (isset($_POST['make_invoice'])){
                                        $booking_id     = $_POST['booking_id'];
                                        $c_ID           = $_POST['c_ID'];
                                        $p_ID           = $_POST['p_ID'];
                                        $p_name         = $_POST['p_name'];
                                        $p_phone        = $_POST['p_phone'];
                                        $p_email        = $_POST['p_email'];
                                        $p_address      = $_POST['p_address'];
                                        $booking_date   = $_POST['booking_date'];
                                        $c_name         = $_POST['c_name'];
                                        $c_email        = $_POST['c_email'];
                                        $c_phone        = $_POST['c_phone'];
                                        $c_address      = $_POST['c_address'];
                                        $service        = $_POST['service'];
                                        $hour_rate      = $_POST['hour_rate'];
                                        $hour           = $_POST['hour'];
                                        $total          = $_POST['total'];

                                        if ($hour == ""){
                                            echo "<span class='text-danger'>Enter Your Working Hour <sup>*</sup></span><br/>";
                                        }


                                        if ($booking_id && $c_ID && $p_ID && $p_name && $p_phone && $p_email && $p_address && $booking_date && $c_name && $c_phone && $c_email && $c_address  && $service && $hour_rate && $hour && $total){
                                            $created = @date('Y-m-d H:i:s');
                                            $card_paymnet = "INSERT INTO payment (booking_id, c_ID, p_ID, p_name, p_phone, p_email, p_address, booking_date, c_name, c_email, c_phone, service, c_address, hour_rate, hour, total, invoice_date) VALUES ('$booking_id', '$c_ID', '$p_ID', '$p_name', '$p_phone', '$p_email', '$p_address', '$booking_date', '$c_name', '$c_email', '$c_phone', '$service', '$c_address', '$hour_rate', '$hour', '$total', '$created')";
                                            $result       = mysqli_query($connect, $card_paymnet);

                                            echo "<span class='text-success'>Invoice Create Successful </span><br/>";
                                        }else{
                                            echo "<span class='text-danger'>Invoice Create Failed </span><br/>";
                                        }
                                    }
                                    ?>
                                </h4>
                                <form action="" method="post" class="mt-5">
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Customer Name</label>
                                        <input type="text" name="booking_id"  hidden class="form-control text-dark" value="<?php echo $customer_data['id']?>">
                                        <input type="text" name="c_ID" hidden class="form-control text-dark" value="<?php echo $customer_data['c_id']?>">
                                        <input type="text" name="p_ID"  hidden class="form-control text-dark text-capitalize" value="<?php echo $customer_data['plumberID']?>">
                                        <input type="text" name="p_name" hidden  class="form-control text-dark text-capitalize" value="<?php echo $customer_data['p_name']?>">
                                        <input type="text" name="p_phone" hidden   class="form-control text-dark text-capitalize" value="<?php echo $customer_data['p_phone']?>">
                                        <input type="text" name="p_email"  hidden class="form-control text-dark text-capitalize" value="<?php echo $customer_data['p_email']?>">
                                        <input type="text" name="p_address"  hidden class="form-control text-dark text-capitalize" value="<?php echo $customer_data['address']?>">
                                        <input type="text" name="booking_date" hidden  class="form-control text-dark text-capitalize" value="<?php echo $customer_data['date']?>">
                                        <input type="text" name="service" hidden class="form-control text-dark" value="<?php echo $customer_data['service']?>">
                                        <input type="text" name="p_address" hidden class="form-control text-dark" value="<?php echo $customer_data['p_address']?>">

                                        <input type="text" name="c_name"  class="form-control text-dark" value="<?php echo $customer_data['c_name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Customer Email</label>
                                        <input type="text" name="c_email"  class="form-control text-dark" value="<?php echo $customer_data['c_email']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Customer Phone</label>
                                        <input type="text" name="c_phone"  class="form-control text-dark" value="<?php echo $customer_data['c_phone']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Customer Address</label>
                                        <input type="text" name="c_address"  class="form-control text-dark" value="<?php echo $customer_data['address']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Per Hour</label>
                                        <input type="text" name="hour_rate"  id="hour_rate"  class="form-control text-dark" value="<?php echo $customer_data['hour_rate']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Total Working Hour</label>
                                        <input type="text" name="hour"  id="hour"  class="form-control text-dark" placeholder="Enter Your Working Hour">
                                        <input type="text" hidden name="total" id="total" class="form-control text-dark">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="make_invoice" class="btn btn-success col-4" value="Submit">
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