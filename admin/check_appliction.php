
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
                            <h1 class="text-center">Manage Services</h1>
                            <?php
                                $sql = "SELECT * FROM application";
                                $result = mysqli_query($connect, $sql);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Plumber Name</th>
                                            <th>Plumber ID</th>
                                            <th>Application Type</th>
                                            <th>Appliction</th>
                                            <th>Appliction Date</th>
                                        </tr>
                                        </thead>
                                        <?php while($row = mysqli_fetch_assoc($result)) {?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $row['plumber_name']; ?></td>
                                                <td><?php echo $row['plumber_id']; ?></td>
                                                <td><?php echo $row['type']; ?></td>
                                                <td><?php echo $row['application']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
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
