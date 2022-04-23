<?php

//connect with database
require_once '../php/config.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: customer_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['c_id']);  //get all information by user id

?>


<?php include 'mastaring/top_header.php'?>
    <!--top header-->

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <?php include "mastaring/nav.php";?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <?php include "mastaring/side_bar.php";?>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->


        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="customer_dasboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chat Now</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->




            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Well Come To Chat box. Fell Free to Chat With Admin</h3>
                            </div>
                            <div class="card-body"  style="margin: 5px; padding: 5px; height: 400px; overflow: auto;">
                                <p>
                                    <?php
                                    if (isset($_SESSION['c_id'])){
                                        $id = $_SESSION['c_id'];

                                        $view_message = "SELECT * FROM chating WHERE m_id = $id ORDER BY date ASC";
                                        $res = mysqli_query($connect, $view_message);
                                    }

                                    ?>
                                </p>
                                <?php while ($row = mysqli_fetch_assoc($res)){?>

                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <img src="../images/<?php echo $row['name'];?>" style="height: 50px; width: 50px; border-radius: 50%;">
                                        </div>
                                        <textarea class="font-weight-bold form-control"  disabled style="height: 56px; border-radius: 16px; margin-left: 8px; margin-top: 10px"><?php echo $row['message'];?> <?php echo $row['image'];?></textarea>
                                    </div>
                                    <p class="text-dark float-right" style="font-size: 9px"><?php echo $row['date'];?></p>
                                <?php }?>
                            </div>
                            <div class="card-footer">
                                <h1 class="text-danger">
                                    <?php
                                    if (isset($_POST['btn'])){
                                        $msg    = $_POST['message'];
                                        $name   = $_POST['name'];
                                        $m_id   = $_POST['m_id'];
                                        $m_name = $_POST['m_name'];

                                        $created = @date('Y-m-d H:i:s');
                                        $sql = "INSERT INTO chating (message, m_name, name, m_id, date) VALUES ('$msg','$m_name', '$name','$m_id', '$created')";
                                        $res = mysqli_query($connect, $sql);

                                        echo "<script>document.location.href='chating.php'</script>";

                                    }
                                    ?>
                                </h1>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div  class="form-group input-group">
                                        <input type="text" name="message" placeholder="Write Message...." class="form-control">
                                        <input type="number" name="m_id" hidden value="<?php echo $userdata['c_id'];?>" class="form-control">
                                        <input type="text" name="m_name" hidden value="<?php echo $userdata['first_name'];?> <?php echo $userdata['last_name'];?>" class="form-control">
                                        <input type="text" name="name" hidden value="<?php echo $userdata['image'];?>" class="form-control">

                                        <div class="input-group-prepend">
                                            <button type="submit" name="btn" class="btn btn-skype"><i class="fas fa-paper-plane" style="color: white"></i></button>
                                            <button type="button" class="btn btn-secondary" title="Chose Image" data-toggle="modal" data-target="#exampleModalCenter">
                                                <i class="far fa-file-image"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <P>
                                                    <?php
                                                    if (isset($_POST['btn_image'])){
                                                        $name = $_POST['name'];
                                                        $m_id = $_POST['m_id'];

                                                        $fileinfo = PATHINFO($_FILES['image']['name']); // file information
                                                        $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension']; // upload path and name with extension
                                                        move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename); // upload file
                                                        $location = $newfilename; // location info

                                                        $created = @date('Y-m-d H:i:s');
                                                        $sql = "INSERT INTO chating (name, image, m_id, date) VALUES ('$name', '$location', '$m_id', '$created')";
                                                        $result = mysqli_query($connect, $sql);
                                                        echo "<script>document.location.href='chating.php'</script>";

                                                    }
                                                    ?>
                                                </P>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Select An Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="text" name="name" hidden value="<?php echo $userdata['image'];?>" class="form-control">
                                                        <input type="text" name="m_id" hidden value="<?php echo $userdata['c_id'];?>" class="form-control">

                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="btn_image">Send</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'mastaring/footer.php'?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
<?php include 'mastaring/script.php'?>