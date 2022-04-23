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
                                    <li class="breadcrumb-item active" aria-current="page">Confirm Book</li>
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
                                <h3 class="text-center">Confirm booking</h3>
                                <h3>
                                    <?php
                                    if (isset($_GET['book'])){
                                        $id = $_GET['book'];

                                        $query = "SELECT * FROM plumbers WHERE id = $id";

                                        $r = mysqli_query($connect, $query);
                                        $data = mysqli_fetch_assoc($r);
                                    }

                                    if (isset($_POST['btn_confirm'])){
                                        $plumberID = $_POST['plumberID'];
                                        $c_id     = $_POST['c_id'];
                                        $c_name	  = $_POST['c_name'];
                                        $c_phone  = $_POST['c_phone'];
                                        $c_email  = $_POST['c_email'];
                                        $address  = $_POST['address'];
                                        $p_address = $_POST['p_address'];
                                        $p_name   = $_POST['p_name'];
                                        $p_email  = $_POST['p_email'];
                                        $p_phone  = $_POST['p_phone'];
                                        $service  = $_POST['service'];
                                        $hour_rate = $_POST['hour_rate'];

                                        if ($c_name == ""){
                                            echo "<span class='text-danger'> Customer Name Is Required</span><br/>";
                                        }
                                        if ($c_phone == ""){
                                            echo "<span class='text-danger'> Customer Phone Is Required</span><br/>";
                                        }
                                        if ($c_email == ""){
                                            echo "<span class='text-danger'> Customer Email Is Required</span><br/>";
                                        }
                                        if ($address == ""){
                                            echo "<span class='text-danger'> Customer Address Is Required</span><br/>";
                                        }
                                        if ($p_name == ""){
                                            echo "<span class='text-danger'> Plumber Name Is Required</span><br/>";
                                        }
                                        if ($p_email == ""){
                                            echo "<span class='text-danger'> Plumber Email Is Required</span><br/>";
                                        }
                                        if ($p_phone == ""){
                                            echo "<span class='text-danger'> Plumber Phone Is Required</span><br/>";
                                        }
                                        if ($service == ""){
                                            echo "<span class='text-danger'> Plumber Service Is Required</span><br/>";
                                        }
                                        if ($p_address == ""){
                                            echo "<span class='text-danger'> Plumber Address Is Required</span><br/>";
                                        }


                                        if ($c_id && $c_name && $c_phone && $c_email && $address && $p_name && $p_email && $p_phone && $service && $hour_rate && $p_address){
                                            $created = @date('Y-m-d H:i:s');

                                            $booking = "INSERT INTO booking (c_id, c_name, c_phone, c_email, address, plumberID, p_name, p_email, p_phone, service, status, p_address, hour_rate, date, process, final) VALUES ('$c_id', '$c_name', '$c_phone', '$c_email', '$address', '$plumberID', '$p_name', '$p_email', '$p_phone', '$service', '0', '$p_address', '$hour_rate', '$created', '0', '0')";
                                            $result  = mysqli_query($connect, $booking);

                                            echo "<span class='text-success'>Booking Successful....<br/>Thanks For booking. Our Plumber Will Contact With you Soon...</span><br/>";
                                        }else{
                                            echo "<span class='text-success'>Booking Failed.. Try Again!!</span><br/>";
                                        }
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" hidden name="hour_rate" class="form-control" value="<?php echo $data['rate'];?>">
                                        <input type="text" hidden name="c_id" class="form-control" value="<?php echo $userdata['c_id'];?>">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" name="c_name" value="<?php echo $userdata['first_name'];?> <?php echo $userdata['last_name'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input type="number" name="c_phone" value="<?php echo $userdata['contact'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input type="email" name="c_email" value="<?php echo $userdata['username'];?>" class="form-control">
                                    </div>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-map-marker"></i> </span>
                                        </div>
                                        <textarea name="address"class="form-control"><?php echo $userdata['address'];?></textarea>
                                    </div>

                                    <h4 class="font-weight-bold text-center p-2">Plumber information</h4>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-hammer"></i> </span>
                                        </div>
                                        <input type="text" name="service" value="<?php echo $data['service'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" name="p_name" value="<?php echo $data['first_name'];?> <?php echo $data['last_name'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                        </div>
                                        <input type="email" name="p_email" value="<?php echo $data['username'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-phone"></i> </span>
                                        </div>
                                        <input type="number" name="p_phone" value="<?php echo $data['contact'];?>" class="form-control">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-map-marker"></i></i> </span>
                                        </div>
                                        <input type="text" name="p_address" value="<?php echo $data['address'];?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" hidden name="plumberID" class="form-control" value="<?php echo $data['id'];?>">
                                    </div>


                                    <div class="form-group">
                                        <input type="submit" name="btn_confirm" class="btn btn-success col-5" value="Confirm Book">
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