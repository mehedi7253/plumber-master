
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
                <li class="breadcrumb-item active">Manage All Services</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Manage Services</h1>
                            <?php
                                $sql = "SELECT * FROM services";
                                $result = mysqli_query($connect, $sql);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Service Name</th>
                                                <th>Service Description</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php while ($row = $result->fetch_assoc()) {?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['application']; ?></td>
                                                <td><img src="<?php echo "../images/". $row['image'];?>" style="height: 100px; width: 100px;"></td>
                                                <td>
                                                    <a href="update_delete_services.php?update=<?php echo $row['id'];?>" class="btn btn-success"> <span><i class="fas fa-pen-square"></i> update</span></a>
                                                    <a href="update_delete_services.php?del=<?php echo $row['id'];?>" class="btn btn-danger"> <span><i class="fas fa-minus-circle"></i> Delete</span></a>

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
