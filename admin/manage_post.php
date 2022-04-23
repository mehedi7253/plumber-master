
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
                <li class="breadcrumb-item active">Hire Plumber</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Manage Post</h1>
                            <?php
                                $get_service = "select * from hire_post";
                                $result = mysqli_query($connect, $get_service);
                            ?>

                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Service</th>
                                                <th>Description</th>
                                                <th>Vacancy</th>
                                                <th>Post Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)){?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $row['service'];?></td>
                                                    <td><?php echo $row['application'];?></td>
                                                    <td><?php echo $row['vacancy'];?></td>
                                                    <td><?php echo $row['post_date'];?></td>
                                                    <td><?php echo $row['post_end'];?></td>
                                                    <td>
                                                        <?php
                                                        $status = $row['status'];
                                                        // echo $status;

                                                        if (($status) == '0'){?>
                                                                Post Available
                                                            <?php
                                                        }
                                                        if (($status) == '1'){?>
                                                            Post Suspend
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="update_delete_post.php?update=<?php echo $row['id']?>" >Update</a>
                                                    </td>
                                                    <td>
                                                        <a href="update_delete_post.php?delete=<?php echo $row['id']?>" onclick="return confirm('Are you sure to Delete <?php echo $row['service'];?> Service Post!!'); ">Delete</a>
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
