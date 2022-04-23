
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
                <li class="breadcrumb-item active">Applier Data</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-10 mx-auto mt-5 mb-5">
                    <?php
                    if (isset($_GET['app_id'])){
                        $id = $_GET['app_id'];

                        $sql = "SELECT * FROM apply_plumber WHERE id = $id";
                        $result = mysqli_query($connect, $sql);

                        $data = mysqli_fetch_assoc($result);
                    }

                    ?>

                    <div class="card" id="mainFrame">
                        <div class="card-header">
                            <p>Application ID: <?php echo $data['id'];?> <span><img src="../images/logo.png" style="70px; width: 70px; border-radius: 50%" class="float-right"></span></p>
                        </div>
                        <div class="card-body">
                            <div class="image ml-3">
                                <img src="../images/<?php echo $data['image'];?>" style="height: 150px; width: 150px">
                            </div>

                            <div class="mt-4">
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>First Name</label>
                                    <input disabled value="<?php echo $data['first_name'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Last Name</label>
                                    <input disabled  value="<?php echo $data['last_name'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Email</label>
                                    <input disabled value="<?php echo $data['email'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Phone Number</label>
                                    <input disabled value="<?php echo $data['phone'];?>" class="form-control">
                                </div>

                                <div class="form-group ml-3">
                                    <label>NID</label>
                                    <input disabled value="<?php echo $data['nid'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Service</label>
                                    <input disabled value="<?php echo $data['service'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Experience</label>
                                    <input disabled value="<?php echo $data['expreance'];?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Present Address</label>
                                    <textarea disabled class="form-control"><?php echo $data['pres_address'];?></textarea>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 float-left">
                                    <label>Parmanent Address</label>
                                    <textarea disabled class="form-control"><?php echo $data['parm_address'];?></textarea>
                                </div>
                                <div class="form-group ml-3">
                                    <label>Date Of Birth</label>
                                    <input disabled value="<?php echo $data['dob'];?>" class="form-control">
                                </div>
                                <div class="form-group ml-3">
                                    <label>Gender</label>
                                    <input disabled value="<?php echo $data['gender'];?>" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info float-right" type="pss" id="prntPSS">Download Now</button>
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
