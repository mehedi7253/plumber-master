
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
                <li class="breadcrumb-item active">Customer Invoice</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 mx-auto mt-5 mb-5">
                    <div class="col-md-10 mx-auto">
                        <div class="card" id="mainFrame">
                            <div class="card-header">
                            <?php
                                if (isset($_GET['invoice'])){
                                    $invoice = $_GET['invoice'];

                                    $get_invoice = "SELECT * FROM payment WHERE id = $invoice";
                                    $result      = mysqli_query($connect, $get_invoice);

                                    $user_data  = mysqli_fetch_assoc($result);
                                }

                            ?>

                            Invoice: #
                            <strong><?php echo $user_data['id'];?></strong>
                            <span class="float-right"> <strong>Status:</strong>
                                <?php
                                $process = $user_data['status'];
                                // echo $status;
                                if (($process) == '0'){?>
                                    Pending
                                    <?php
                                }
                                if (($process) == '1'){?>
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
                                        <strong class="text-capitalize"><?php echo $user_data['c_name'];?></strong>
                                    </p>
                                    <p><?php echo $user_data['c_address'];?></p>
                                    <p>Email: <?php echo $user_data['c_email'];?></p>
                                    <p>Phone: <?php echo $user_data['c_phone'];?></p>
                                    <p class="font-weight-bold">Service: <?php echo $user_data['service'];?></p>
                                </div>
                                <div class="float-right">
                                    <h6 class="mb-3">To:</h6>
                                    <p>
                                        <strong class="text-capitalize"><?php echo $user_data['p_name'];?></strong>
                                    </p>
                                    <p><?php echo $user_data['p_address'];?></p>
                                    <p>Email: <?php echo $user_data['p_email'];?></p>
                                    <p>Phone: <?php echo $user_data['p_phone'];?></p>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped mt-5">
                                        <thead class="bg-gray">
                                        <tr>
                                            <th>Service</th>
                                            <th>Booking Date</th>
                                            <th>Per hour</th>
                                            <th>Working hour</th>
                                            <th>Sub total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $user_data['service'];?></td>
                                            <td><?php echo $user_data['date'];?></td>
                                            <td><?php echo $user_data['hour_rate'];?></td>
                                            <td><?php echo $user_data['hour'];?></td>
                                            <td>
                                                <?php

                                                $sql = "SELECT hour, hour_rate,(hour*hour_rate) AS paybleAmount FROM payment WHERE id = $invoice";
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
                                            <td class="float-right">Discount (<?php echo $user_data['discount'];?>) </td>
                                            <td>
                                                <?php
                                                $sub_total = $r['paybleAmount'];
                                                $sql = "SELECT $sub_total, discount, ($sub_total - discount) AS val from payment WHERE id =$invoice";
                                                $res = mysqli_query($connect, $sql);

                                                $rss = mysqli_fetch_assoc($res);
                                                ?>

                                                <?php
                                                $discount = $rss['val'];
                                                $dis = $discount;

                                                echo number_format($dis,2);
                                                ?>

                                            </td>
                                        </tr>
                                        <tr class="table-borderless">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="float-right">Vat (<?php echo $user_data['tax'];?>%) </td>
                                            <td>
                                                <?php
                                                $dis = $rss['val'];
                                                $sql_discount = "SELECT $dis,tax, ROUND($dis * tax / 100,2) AS percent FROM payment WHERE id = $invoice";
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
                                                $sql = "SELECT $discount, payble,($discount - payble) AS due_pay FROM payment WHERE id = $invoice";
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
                                                <td><?php echo $user_data['payment_by'];?></td>
                                                <td><?php echo $user_data['card_number'];?> <?php echo $user_data['bkas_number'];?></td>
                                                <td><?php echo $user_data['text_id'];?></td>
                                                <td><?php $pay = $user_data['payble']; echo number_format($pay,2);?></td>
                                                <td><?php $du = $row['due_pay'];  echo number_format($du,2);?></td>
                                                <td><?php echo $user_data['date'];?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <div class="card-footer">
                            <a href="earn.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>

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
</body>
</html>
