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
                                    <li class="breadcrumb-item active" aria-current="page">Pay Now</li>
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
                                <h2>Pay Now</h2>
                                <?php
                                    if (isset($_GET['pay'])){
                                        $id = $_GET['pay'];

                                        $sql = "SELECT * FROM booking WHERE id = $id";
                                        $res = mysqli_query($connect, $sql);

                                        $customer_data = mysqli_fetch_assoc($res);
                                    }
                                ?>
                            </div>
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span class="ml-3 text-dark font-weight-bold"><i class="far fa-credit-card fa-2x"></i> Card </span> </a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <span class="ml-3 text-dark font-weight-bold"><img src="../images/bkas.JPG" style="width: 50px; height: 50px">  Bkash</span></a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form_1 mt-4">
                                            <h4>
                                                <?php
                                                if (isset($_POST['card_pay'])){
                                                    $card_number    = $_POST['card_number'];
                                                    $payble         = $_POST['payble'];
                                                    $text_id        = $_POST['text_id'];
                                                    $discount       = $_POST['discount'];

                                                    if ($card_number == ""){
                                                        echo "<span class='text-danger'>Enter Your Card Number <sup>*</sup></span><br/>";
                                                    }


                                                    if ($card_number && $payble && $discount && $text_id){
                                                        $created = @date('Y-m-d H:i:s');
                                                        $booking_link = $customer_data['id'];
                                                        $card_paymnet = "UPDATE payment SET card_number ='$card_number', text_id = '$text_id', payble = '$payble', discount = '$discount', payment_by = 'Card', date = '$created' where  booking_id = $booking_link";
                                                        $result       = mysqli_query($connect, $card_paymnet);

                                                        echo "<span class='text-success'>Payment Successful </span><br/>";
                                                    }else{
                                                        echo "<span class='text-danger'>Payment Failed </span><br/>";
                                                    }
                                                }
                                                ?>
                                            </h4>

                                            <form action="" method="post" class="mt-4">
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Customer Name : </label>
                                                    <input type="text" disabled name="c_name" class="form-control text-dark text-capitalize" value="<?php echo $customer_data['c_name']?>">

                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Customer Email : </label>
                                                    <input type="text" name="c_email" disabled class="form-control text-dark" value="<?php echo $customer_data['c_email']?>">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Customer Phone Number : </label>
                                                    <input type="text" name="c_phone" disabled class="form-control text-dar" value="<?php echo $customer_data['c_phone']?>">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Customer Address : </label>
                                                    <textarea  name="c_address" disabled class="form-control text-dark"><?php echo $customer_data['address']?></textarea>
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Without Discount : </label>
                                                    <?php
                                                        $total_amount = $customer_data['id'];
                                                        $sql     = "SELECT * FROM payment WHERE booking_id = $total_amount";
                                                        $result  = mysqli_query($connect, $sql);

                                                        $amount = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <input type="text"  name="" id="payble" class="form-control text-dark" value="<?php echo $amount['total'];?>">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Add Your Discount Amount : </label>
                                                    <input type="number" name="discount" id="discount" class="form-control text-dark" placeholder="0">
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-bold">After Adding Discount: </label>
                                                    <input type="number" name="payble" id="disc" class="form-control text-dark" placeholder="0">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Card Number : </label>
                                                    <input type="text" name="card_number" class="form-control text-dark" placeholder="Enter Card Number">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Enter Your Text ID: </label>
                                                    <input type="text" name="text_id" class="form-control text-dark" placeholder="Enter Your Text ID">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="card_pay" class="btn btn-success col-7" value="Pay Now">
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="form_1 mt-4">
                                            <h4>
                                                <?php
                                                if (isset($_POST['bkas_pay'])){

                                                    $bkas_number    = $_POST['bkas_number'];
                                                    $text_id        = $_POST['text_id'];
                                                    $payble         = $_POST['payble'];
                                                    $discount       = $_POST['discount'];

                                                    if ($bkas_number == ""){
                                                        echo "<span class='text-danger'>Enter Your Bkash Number <sup>*</sup></span><br/>";
                                                    }
                                                    if ($text_id == ""){
                                                        echo "<span class='text-danger'>Enter Text ID <sup>*</sup></span><br/>";
                                                    }


                                                    if ($bkas_number && $text_id && $payble  && $discount){
                                                        $created = @date('Y-m-d H:i:s');
                                                        $booking_bkas = $customer_data['id'];
                                                        $bkas_payment = "UPDATE payment SET bkas_number = '$bkas_number', text_id = '$text_id', payble = '$payble', discount = '$discount', payment_by = 'Bkash', date = '$created' WHERE booking_id = $booking_bkas";
                                                        $result       = mysqli_query($connect, $bkas_payment);

                                                        echo "<span class='text-success'>Payment Successful </span><br/>";
                                                    }else{
                                                        echo "<span class='text-danger'>Payment Failed </span><br/>";
                                                    }
                                                }
                                                ?>
                                            </h4>

                                            <form action="" method="post" class="mt-4">
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Customer Name : </label>
                                                    <input type="text" name="c_name" disabled class="form-control text-dark text-capitalize" value="<?php echo $customer_data['c_name']?>">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Customer Email : </label>
                                                    <input type="text" name="c_email" disabled class="form-control text-dark" value="<?php echo $customer_data['c_email']?>">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Customer Phone : </label>
                                                    <input type="text" name="c_phone" disabled class="form-control text-dar" value="<?php echo $customer_data['c_phone']?>">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Customer Address : </label>
                                                    <textarea  name="c_address" disabled class="form-control text-dark"><?php echo $customer_data['address']?></textarea>
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Without Discount : </label>
                                                    <?php
                                                    $total_amount = $customer_data['id'];
                                                    $sql     = "SELECT * FROM payment WHERE booking_id = $total_amount";
                                                    $result  = mysqli_query($connect, $sql);

                                                    $amount = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <input type="text"  name="" id="payble_bks" class="form-control text-dark" value="<?php echo $amount['total'];?>">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Add Your Discount Amount : </label>
                                                    <input type="number" name="discount" id="discount_bks" class="form-control text-dark" placeholder="0">
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-bold">After Adding Discount: </label>
                                                    <input type="number" name="payble" id="disc_bks" class="form-control text-dark" placeholder="0" >
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Enter Bkas Number : </label>
                                                    <input type="text" name="bkas_number" class="form-control text-dark" placeholder="Enter Bkash Number">
                                                </div>
                                                <div  class="form-group">
                                                    <label class="font-weight-bold">Enter Your Text ID: </label>
                                                    <input type="text" name="text_id" class="form-control text-dark" placeholder="Enter Your Text ID">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="bkas_pay" class="btn btn-success col-7" value="Pay Now">
                                                </div>

                                            </form>
                                        </div>
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