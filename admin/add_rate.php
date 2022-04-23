
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
                <div class="col-md-10 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Service Rate</h1>

                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <h3 class="mb-3">
                                    <?php
                                        if (isset($_GET['id'])){
                                            $rat = $_GET['id'];

                                            $sql = "SELECT * FROM plumbers WHERE id = $rat";
                                            $res = mysqli_query($connect, $sql);

                                            $data = mysqli_fetch_assoc($res);

                                        }

                                        if ($_POST){
                                            $rate = $_POST['rate'];

                                            if ($rate == ""){
                                                echo "<span class='text-danger'>Enter Amount</span><br/>";
                                            }

                                            if ($rate){
                                                $sql = "UPDATE plumbers SET rate = '$rate' WHERE id = $rat";
                                                $result = mysqli_query($connect, $sql);

                                                echo "<span class='text-success'>Service Amount Added Successful</span><br/>";
                                            }else{
                                                echo "<span class='text-danger'>Service Amount Added Failed</span><br/>";
                                            }

                                        }
                                    ?>
                                </h3>
                                <form action="" method="post">
                                    <div class="form-group">

                                    </div>
                                    <div class="form-group">
                                        <label>Enter Amount Per Hour</label>
                                        <input type="number" class="form-control" name="rate" placeholder="Enter Per Hour Amount">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="rate_now" class="btn btn-success" value="Submit">
                                    </div>
                                </form>
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
