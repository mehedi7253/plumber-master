
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
                <li class="breadcrumb-item active">Total Earning</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 mx-auto mt-5 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Total Earning</h1>
                            <?php
                                $sql = "SELECT * FROM payment";
                                $result = mysqli_query($connect, $sql);
                            ?>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Invoice ID</th>
                                            <th>Booking Date</th>
                                            <th>Service</th>
                                            <th>Hour Rate</th>
                                            <th>Working Hour</th>
                                            <th>Discount</th>
                                            <th>Tax</th>
                                            <th>Pay Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM accountant";
                                        $res = mysqli_query($connect, $sql);
                                        ?>
                                        <?php $i = 1;
                                        while ($row = $result->fetch_assoc()){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><a class="text-decoration-none" href="invoice.php?invoice=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['service']; ?></td>
                                                <td><?php echo $row['hour_rate']; ?></td>
                                                <td><?php echo $row['hour']; ?></td>
                                                <td><?php echo $row['discount']; ?></td>
                                                <td><?php echo $row['tax']; ?></td>
                                                <td><?php echo $row['payble']; ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total:</td>
                                            <td>
                                                <?php
                                                $sql_dis = "SELECT  SUM(discount) AS total_dis FROM payment";
                                                $dis = mysqli_query($connect, $sql_dis);
                                                $values = mysqli_fetch_assoc($dis);
                                                $num_rows = $values['total_dis'];
                                                $total_dis = number_format($num_rows,2);
                                                echo "<span>$total_dis</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $sql_tax = "SELECT  SUM(tax) AS total_tax FROM payment";
                                                $tax = mysqli_query($connect, $sql_tax);
                                                $values = mysqli_fetch_assoc($tax);
                                                $num_rows = $values['total_tax'];
                                                $total_tax = number_format($num_rows,2);
                                                echo "<span>$total_tax</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $sql_total = "SELECT  SUM(payble) AS total_amount FROM payment";
                                                $total = mysqli_query($connect, $sql_total);
                                                $values = mysqli_fetch_assoc($total);
                                                $num_rows = $values['total_amount'];
                                                $total_amount = number_format($num_rows,2);
                                                echo "<span>$total_amount T.K</span>";
                                                ?>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        <div class="card-footer">

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
