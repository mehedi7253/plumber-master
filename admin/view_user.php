<?php

session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.donor_php');
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
                <li class="breadcrumb-item active">Manage users</li>
            </ol>

            <!-- Icon Cards-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-5 mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4> <i class="fas fa-table"></i> All users Information</h4>
                                <?php
                                $sql = "SELECT * FROM customers";
                                $result = mysqli_query($connect, $sql);
                                ?>
                            </div>
                            <div class="card-body">
                                <?php while ($data = mysqli_fetch_assoc($result)){?>
                                    <div class="col-md-4 col-sm-12 mt-3 float-left">
                                        <div class="card">
                                            <img class="img-fluid" src="../images/<?php echo $data['image'];?>" style="height: 250px;">
                                            <div class="card-body">
                                                <label class="font-weight-bold">Name  : <?php echo $data['first_name'];?> <?php echo $data['last_name'];?></label><br/>
                                                <label class="font-weight-bold">Email : <?php echo $data['username'];?></label><br/>
                                                <label class="font-weight-bold">Phone : <?php echo $data['contact'];?></label><br/>
                                            </div>
                                            <div class="card-footer">
                                                <a class="btn btn-info float-right mt-3" href="customer_profile.php?id=<?php echo $data['c_id'];?>">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="card-footer">
                                <a href="admin_dashboard.php" class="nav-link text-info">Back</a>
                            </div>
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
                    <span>Create by@ Israt Jahan</span>
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

