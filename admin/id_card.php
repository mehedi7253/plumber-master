
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
                <li class="breadcrumb-item active">Create New ID Card</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-10 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Create New ID Card For Plumber</h1>
                            <?php
                            $sql = "SELECT * FROM plumbers";
                            $result = mysqli_query($connect, $sql);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                               <div class="table-responsive">
                                   <table class="table table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Make Now</th>
                                        </tr>
                                       </thead>
                                       <tbody>
                                       <?php
                                        $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></td>
                                                <td>
                                                    <?php
                                                        $id = $row['id'];

                                                        $sql = "select * from id_card WHERE p_id = $id";
                                                        $res = mysqli_query($connect, $sql);

                                                    ?>

                                                    <?php
                                                        if ($res) {
                                                            if (mysqli_num_rows($res)) {
                                                                echo '<a href="make_id.php?make= ' . $id . '" class="btn btn-success">View</a>';
                                                            } else {
                                                                echo '<a href="make_id.php?make= ' . $id . '" class="btn btn-info">Make Now</a>';

                                                            }
                                                        }
                                                    ?>

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
