
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
                <li class="breadcrumb-item active">Add Service Rate</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Plumber Service Rate</h1>
                            <?php
                            $sql = "SELECT * FROM plumbers";
                            $res = mysqli_query($connect, $sql);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                     <table class="table table-striped table-bordered">
                                         <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Plumber Name</th>
                                                <th>Plumber Email</th>
                                                <th>Contact</th>
                                                <th>Service Name</th>
                                                <th>Price</th>
                                                <th>Set Rate</th>
                                            </tr>
                                         </thead>
                                         <tbody>
                                         <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($res)){?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></td>
                                                    <td><?php echo $row['username'];?></td>
                                                    <td><?php echo $row['contact'];?></td>
                                                    <td><?php echo $row['service'];?></td>
                                                    <td><?php echo $row['rate'];?></td>
                                                    <td>
                                                        <a href="add_rate.php?id=<?php echo $row['id']?>" class="nav-link"><i class="fas fa-edit"></i> Set Rate</a>
                                                    </td>
                                                </tr>
                                         <?php }?>
                                         </tbody>
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
