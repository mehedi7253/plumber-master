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
                                    <li class="breadcrumb-item active" aria-current="page">Report Now</li>
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
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="text-center">Write Your Post</h3>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php
                                        if (isset($_POST['btn_post'])){

                                            $post_name  = $_POST['post_name'];
                                            $post_image = $_POST['post_image'];
                                            $post_desc  = $_POST['post_desc'];
                                            $image      = $_FILES['image'] ['name'];

                                            if ($post_desc == ""){
                                                echo "<span class='text-danger'>Filed Not Empty..!</span><br/>";
                                            }
                                            if ($image == ""){
                                                echo "<span class='text-danger'>Filed Not Empty..!</span><br/>";
                                            }

                                            if ($post_desc && $post_name && $post_image && $image){

                                                $fileinfo = PATHINFO($_FILES['image']['name']);
                                                $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension'];
                                                move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename);
                                                $location = $newfilename;

                                                $sql = "insert into news_post (post_name, post_image, post_desc, image) VALUES ('$post_name', '$post_image', '$post_desc', '$image')";
                                                $result = mysqli_query($connect, $sql);

                                                echo "<span class='text-success'>Post create successful</span><br/>";
                                            }else{
                                                echo "<span class='text-danger'>Post create failed..!</span><br/>";
                                            }

                                        }
                                    ?>
                                </p>
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Write Post</label>
                                        <input type="text" hidden name="post_name" value="<?php echo $userdata['first_name'] . ' ' . $userdata['last_name'];?>">
                                        <input type="text" hidden name="post_image" value="<?php echo $userdata['image']?>">
                                        <textarea name="post_desc" class="form-control" placeholder="Write Your Post"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Chose a picture</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="btn_post" class="btn btn-success col-4" value="Post">
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