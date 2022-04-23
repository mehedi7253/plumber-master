
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
                <div class="col-md-12 col-sm-12">
                    <h1 class="text-center card-header">Create New ID Card For Plumber</h1>

                   <div class="col-md-6 col-sm-12 float-left mt-3 mb-5">
                       <div class="card" style="border: 1px solid #337AB7;">
                           <div class="card-header" style="background-color: #337AB7">
                               <h3 class="text-center text-white">Plumber Information</h3>
                           </div>
                           <div class="card-body">
                               <h3>
                                   <?php
                                   if (isset($_GET['make'])){
                                       $id = $_GET['make'];

                                       $select_plumber_data = "SELECT * FROM plumbers WHERE id = $id";
                                       $result = mysqli_query($connect, $select_plumber_data);

                                       $view_data = mysqli_fetch_assoc($result);
                                   }
                                   if (isset($_POST['id_card'])){
                                       $p_id      = $_POST['p_id'];
                                       $p_name    = $_POST['p_name'];
                                       $p_email   = $_POST['p_email'];
                                       $p_phone   = $_POST['p_phone'];
                                       $p_address = $_POST['p_address'];
                                       $service   = $_POST['service'];
                                       $image     = $_POST['image'];
                                       $join_date = $_POST['join_date'];

                                       if ($p_id && $p_name && $p_email && $p_phone && $p_address && $service && $image && $join_date){

                                           $sql = "INSERT INTO id_card (p_id, p_name, p_email, p_phone, p_address, service, image, join_date, status) VALUES ('$p_id', '$p_name', '$p_email', '$p_phone', '$p_address', '$service', '$image', '$join_date', '0')";
                                           $res = mysqli_query($connect, $sql);

                                           echo "<span class='text-success'>ID Card Generate Successful</span><br/>";
                                       }
                                       else{
                                           echo "<span class='text-success'>ID Card Generate Failed!</span><br/>";
                                       }
                                   }

                                   ?>
                               </h3>
                               <form action="" method="post" class="mt-3">
                                   <div class="form-group">
                                       <input type="number" name="p_id" hidden class="form-control" value="<?php echo $view_data['id'];?>">
                                       <input type="text" name="p_name" class="form-control text-capitalize" value="<?php echo $view_data['first_name']?> <?php echo $view_data['last_name']?>">
                                   </div>
                                   <div class="form-group">
                                       <input type="text" name="p_email" class="form-control" value="<?php echo $view_data['username'];?>">
                                   </div>
                                   <div class="form-group">
                                       <input type="text" name="p_phone" class="form-control" value="<?php echo $view_data['contact'];?>">
                                   </div>
                                   <div class="form-group">
                                       <input type="text" name="p_address" class="form-control" value="<?php echo $view_data['address'];?>">
                                   </div>
                                   <div class="form-group">
                                       <input type="text" name="service" class="form-control" value="<?php echo $view_data['service'];?>">
                                   </div>
                                   <div class="form-group">
                                       <input type="text" name="image" hidden class="form-control" value="<?php echo $view_data['image'];?>">
                                   </div>
                                   <div class="form-group">
                                       <input type="text" name="join_date" class="form-control" value="<?php echo $view_data['date'];?>">
                                   </div>
                                   <div class="form-group">
                                       <img src="../images/<?php echo $view_data['image'];?>" style="height: 150px; width: 150px">
                                   </div>
                                   <div class="form-group">
                                       <input type="submit" name="id_card" class="btn btn-block text-white" value="Generate ID" style="background-color: #337AB7">
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
                    <div class="col-md-6 col-sm-12 float-left mt-3 mb-5">
                        <div class="card" style="border: 1px solid #337AB7">
                            <div class="card-header" style="background-color: #337AB7">
                                <h3 class="text-center text-white">Generate ID Card</h3>
                                <?php
                                    $store_id = $view_data['id'];

                                    $get_id = "SELECT * FROM id_card WHERE p_id = '$store_id'";
                                    $result = mysqli_query($connect, $get_id);

                                    $id_card = mysqli_fetch_assoc($result);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="card" id="mainFrame">
                                    <img src="../images/idcard.jpg" class="card-img-top" height="150px">
                                    <div class="img_logo">
                                        <img src="../images/logo.png" class="float-right mr-4" style="height: 80px; width: 80px; position: relative; margin-top: -118px; border-radius: 50%">
                                    </div>
                                    <div class="card-body" style="background-image: url(../images/cardbg5.JPG); background-size: 100% 100%; background-repeat: no-repeat">
                                        <div class="image">
                                            <img src="../images/<?php echo $id_card['image']?>" style="height: 150px; width: 130px; position: relative; margin-top: -100px">
                                            <span class="font-weight-bold ml-3 text-justify"><?php echo $id_card['p_name']?></span><br/>
                                        </div>
                                        <div class="mt-3">
                                            <p><span class="font-weight-bold">ID No:</span> <span style="margin-left: 18px">#<?php echo $id_card['id']?></span></p>
                                            <p><span class="font-weight-bold">Email:</span> <span style="margin-left: 20px"> <?php echo $id_card['p_email']?></span></p>
                                            <p><span class="font-weight-bold">Phone:</span> <span style="margin-left: 14px"> <?php echo $id_card['p_phone']?></span></p>
                                            <p><span class="font-weight-bold">Address:</span> <span style="margin-left: 2px"> <?php echo $id_card['p_address']?></span></p>
                                            <p><span class="font-weight-bold">Service:</span> <span style="margin-left: 12px"> <?php echo $id_card['service']?></span></p>
                                            <p><span class="font-weight-bold">Join Date:</span> <span> <?php echo $id_card['join_date']?></span></p>

                                        </div>
                                        <div class="bar float-right" style="position: relative; margin-top: -72px">
                                            <img src="../images/rsz_mg.jpg" style="height: 30px; width: 150px; margin-left: 28px">
                                            <br/>
                                            <img src="../images/bar.JPG" style="height: 40px; width: 200px" class="mt-2">
                                        </div>

                                    </div>
                                </div>
                                <button class="btn btn-block text-white mt-3" id="prntPSS" style="background-color: #337AB7">Download Now</button>

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
