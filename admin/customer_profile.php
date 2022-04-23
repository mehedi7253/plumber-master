
<?php
session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.php');
}

require_once '../php/db_connect.php';

?>


<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];

    $q = "SELECT * FROM customers WHERE c_id = $id";

    $r = mysqli_query($connect, $q);
    $data = mysqli_fetch_assoc($r);

}
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
                    <a href="admin_dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Plumber Profile</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="col-md-3 col-sm-12 float-left">
                        <div class="card mt-5">
                            <div class="card-header">
                                <center class="m-t-30"> <img src="../images/<?php echo $data['image'];?>" title="<?php echo $data['first_name'];?>" width="100%" height="200" />
                                    <h4 class="card-title m-t-10 text-capitalize mt-3"><?php echo $data['first_name'];?> <span><?php echo $data['last_name'];?></span></h4>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 float-left">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>First Name </th>
                                        <td class="font-weight-bold text-capitalize"><?php echo $data['first_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Name  </th>
                                        <td class="font-weight-bold text-capitalize"><?php echo $data['last_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email </th>
                                        <td class="font-weight-bold"><?php echo $data['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender  </th>
                                        <td class="font-weight-bold"><?php echo $data['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address  </th>
                                        <td class="font-weight-bold"><?php echo $data['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number  </th>
                                        <td class="font-weight-bold"><?php echo $data['contact']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Join Date  </th>
                                        <td class="font-weight-bold"><?php echo $data['date']; ?></td>
                                    </tr>
                                </table>
                            </div>
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
