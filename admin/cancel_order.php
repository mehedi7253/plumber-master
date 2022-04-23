
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
                <li class="breadcrumb-item active">Manage All Order</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Pending Order</h1>
                            <?php
                            $sql = "SELECT * FROM booking WHERE status = 0";
                            $result = mysqli_query($connect, $sql);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Customer Phone</th>
                                            <th>Customer Email</th>
                                            <th>Customer Address</th>
                                            <th>Plumber Name</th>
                                            <th>Plumber Phone</th>
                                            <th>Plumber Email</th>
                                            <th>Service</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php while ($row = $result->fetch_assoc()) {?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $row['c_name']; ?></td>
                                                <td><?php echo $row['c_phone']; ?></td>
                                                <td><?php echo $row['c_email']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['p_name']; ?></td>
                                                <td><?php echo $row['p_phone']; ?></td>
                                                <td><?php echo $row['p_email']; ?></td>
                                                <td><?php echo $row['service']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td>
                                                    <?php
                                                    $status = $row['status'];
                                                    // echo $status;

                                                    if (($status) == '0'){?>
                                                        <a href="order_status.php?status=<?php echo $row['id'];?>" onclick="return confirm('Block <?php echo $row['first_name'];?>')"><button class="btn btn-danger">Pending</button></a>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                        <a href="order_status.php?status=<?php echo $row['id'];?>"  onclick="return confirm('UnBlock <?php echo $row['first_name'];?>')"><button class="btn btn-success">Received</button></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="admin_dashboard.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
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
