<?php

//connect with database
require_once '../php/config_plumber.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: plumber_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id

?>
<?php
    if (isset($_GET['view_invoice'])){
        $invoice = $_GET['view_invoice'];

        $get_invoice = "SELECT * FROM payment WHERE booking_id = $invoice";
        $result      = mysqli_query($connect, $get_invoice);

        $customer_data  = mysqli_fetch_assoc($result);
    }
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
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $customer_data['c_name'];?> Invoice</li>
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
                                Invoice: #
                                <strong><?php echo $customer_data['id'];?></strong>
                                <span class="float-right"> <strong>Status:</strong>  <?php
                                    $status = $customer_data['status'];
                                    // echo $status;

                                    if (($status) == '0'){?>
                                        Pending
                                        <?php
                                    }
                                    if (($status) == '1'){?>
                                          Paid
                                        <?php
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="float-left mt-2">
                                    <h6 class="mb-3">From:</h6>
                                    <p>
                                        <strong class="text-capitalize"><?php echo $customer_data['c_name'];?></strong>
                                    </p>
                                    <p><?php echo $customer_data['c_address'];?></p>
                                    <p>Email: <?php echo $customer_data['c_email'];?></p>
                                    <p>Phone: <?php echo $customer_data['c_phone'];?></p>
                                </div>
                                <div class="float-right">
                                    <h6 class="mb-3">To:</h6>
                                    <p>
                                        <strong class="text-capitalize"><?php echo $customer_data['p_name'];?></strong>
                                    </p>
                                    <p><?php echo $customer_data['p_address'];?></p>
                                    <p>Email: <?php echo $customer_data['p_email'];?></p>
                                    <p>Phone: <?php echo $customer_data['c_phone'];?></p>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped mt-5">
                                        <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Booking Date</th>
                                            <th>Per hour</th>
                                            <th>Wroking hour</th>
                                            <th>Sub total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $customer_data['service'];?></td>
                                            <td><?php echo $customer_data['date'];?></td>
                                            <td><?php echo $customer_data['hour_rate'];?></td>
                                            <td><?php echo $customer_data['hour'];?></td>
                                            <td>
                                                <?php

                                                $sql = "SELECT hour,hour_rate,(hour*hour_rate) AS paybleAmount FROM payment WHERE booking_id = $invoice";
                                                $res = mysqli_query($connect, $sql);

                                                $r = mysqli_fetch_assoc($res);
                                                ?>
                                                <?php
                                                $t = $r['paybleAmount'];
                                                echo number_format($t,2);
                                                ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="table-borderless">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="float-right">Discount (<?php echo $customer_data['discount'];?>) </td>
                                            <td>
                                                <?php
                                                $sub_total = $r['paybleAmount'];
                                                $sql = "SELECT $sub_total, discount, ($sub_total - discount) AS val from payment WHERE booking_id =$invoice";
                                                $res = mysqli_query($connect, $sql);

                                                $rss = mysqli_fetch_assoc($res);
                                                ?>

                                                <?php
                                                $var = $rss['val'];
                                                echo number_format($var,2);
                                                ?>

                                            </td>
                                        </tr>
                                        <tr class="table-borderless">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="float-right">Vat (<?php echo $customer_data['tax'];?>%) </td>
                                            <td>
                                                <?php
                                                $dis = $rss['val'];
                                                $sql_discount = "SELECT $dis,tax, ROUND($dis * tax / 100,2) AS percent FROM payment WHERE booking_id = $invoice";
                                                $res = mysqli_query($connect, $sql_discount);

                                                $rs = mysqli_fetch_assoc($res);
                                                ?>
                                                <?php
                                                $percent = $rs['percent'];
                                                echo number_format($percent,2);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="font-weight-bold"><span class="float-right">Total</span> </td>
                                            <td class="font-weight-bold">
                                                <?php
                                                $per = $rs['percent'];
                                                $val = $rss['val'];

                                                $total = $per + $val;
                                                ?>
                                                <?php echo number_format($total, 2);?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="font-weight-bold"><span class="float-right">Due</span> </td>
                                            <td class="font-weight-bold">
                                                <?php
                                                $sql = "SELECT payble, $var,($var - payble) AS due_pay FROM payment WHERE booking_id = $invoice";
                                                $res = mysqli_query($connect, $sql);

                                                $row = mysqli_fetch_assoc($res);
                                                ?>
                                                <?php
                                                    $due = $row['due_pay'];
                                                    echo number_format($due,2);
                                                ?>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    <h4 class="text-center mb-3">Payment Status</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="bg-gray">
                                            <tr>
                                                <th>Payment By</th>
                                                <th>Card/Bkash Number</th>
                                                <th>Transaction ID</th>
                                                <th>Total</th>
                                                <th>Due</th>
                                                <th>Payment Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $customer_data['payment_by'];?></td>
                                                <td><?php echo $customer_data['card_number'];?> <?php echo $customer_data['bkas_number'];?></td>
                                                <td><?php echo $customer_data['text_id'];?></td>
                                                <td><?php $pay = $customer_data['payble']; echo number_format($pay,2);?></td>
                                                <td><?php $du = $row['due_pay'];  echo number_format($du,2);?></td>
                                                <td><?php echo $customer_data['date'];?></td>
                                            </tr>
                                            </tbody>
                                        </table>
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