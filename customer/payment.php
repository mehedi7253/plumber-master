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
                                    <li class="breadcrumb-item active" aria-current="page">Payment List</li>
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
                                <h1>Payment List</h1>
                                <?php
                                    if (isset($_SESSION['c_id'])){
                                        $id = $_SESSION['c_id'];

                                        $payment_query = "SELECT * FROM booking WHERE c_id = $id";
                                        $result        = mysqli_query($connect, $payment_query);
                                    }

                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table tab-pan table-bordered table-hover">
                                        <thead class="text-white" style="background-color: #62ACB7">
                                            <tr>
                                                <th>Serial</th>
                                                <th>Plumber Name</th>
                                                <th>Service</th>
                                                <th>Plumber Phone</th>
                                                <th>Pay Now</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)){?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $row['p_name'];?></td>
                                                    <td><?php echo $row['service'];?></td>
                                                    <td><?php echo $row['p_phone'];?></td>
                                                    <td>
                                                        <?php

                                                            $pay_id = $row['id'];
                                                            $s1 = "SELECT * FROM payment WHERE booking_id = $pay_id";
                                                            $b1 = mysqli_query($connect, $s1);

                                                            $d = mysqli_fetch_assoc($b1);

                                                            if ($d == ''){
                                                                echo '<a href="#"><button class="btn btn-info btn-block" disabled><i class="fab fa-cc-amazon-pay"></i> Pay Now</button></a>';
                                                            }else{
                                                                echo '<a href="pay_now.php?pay= '.$pay_id.'"><button class="btn btn-info btn-block"><i class="fab fa-cc-amazon-pay"></i> Pay Now</button></a>';
                                                            }


                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
//                                                            $s = "Select payment.booking_id FROM payment,booking
//                                                                    WHERE booking.id=payment.booking_id
//                                                                    AND booking.id=booking_id";
                                                        $link = $row['id'];
                                                        $s = "SELECT * FROM payment WHERE booking_id = $link";
                                                        $b = mysqli_query($connect, $s);

                                                        ?>
                                                        <?php while ($link_invoice = mysqli_fetch_assoc($b)){?>
                                                            <a href="invoice.php?invoice=<?php echo $link_invoice['booking_id']?>" class="btn btn-info btn-block"><i class="fas fa-file-invoice"></i> View Invoice</a>
                                                        <?php }?>
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