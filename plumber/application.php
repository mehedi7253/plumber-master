<?php

//connect with database
require_once '../php/config_plumber.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: plumber_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id

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
                                    <li class="breadcrumb-item"><a href="plumber_dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Application</li>
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
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center font-weight-bold">Application</h2>

                                <p>
                                    <?php
                                    if (isset($_POST['app_submit'])){

                                        $type         = $_POST['type'];
                                        $application  = $_POST['application'];
                                        $plumber_name = $_POST['plumber_name'];
                                        $plumber_id   = $_POST['plumber_id'];


                                        if ($type == ""){
                                            echo "<span class='text-danger text-capitalize'>Please select application Type</span><br/>";
                                        }
                                        if ($application == ""){
                                            echo "<span class='text-danger text-capitalize'>Please Write Your Application</span><br/>";
                                        }

                                        if ($type && $application){
                                            $created = @date('Y-m-d H:i:s');
                                            $sql = "INSERT INTO application (type, application, plumber_name, plumber_id, date) VALUES ('$type', '$application', '$plumber_name', '$plumber_id', '$created')";
                                            $r = mysqli_query($connect, $sql);

                                            echo "<span class='text-success text-capitalize'>Your Application Send Successful</span><br/>";
                                        }else{
                                            echo "<span class='text-danger text-capitalize'>Your Application Send Failed...!!</span><br/>";

                                        }

                                    }

                                    ?>
                                </p>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Plumber Name</label>
                                        <input type="text" disabled value="<?php echo $userdata['first_name']?> <?php echo $userdata['last_name']?>" class="form-control">
                                        <input type="text" hidden name="plumber_name" value="<?php echo $userdata['first_name']?> <?php echo $userdata['last_name']?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Plumber ID</label>
                                        <input type="text" disabled value="<?php echo $userdata['id']?>" class="form-control">
                                        <input type="text" hidden name="plumber_id" value="<?php echo $userdata['id']?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Application For</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="type">
                                            <option>--------Select One--------</option>
                                            <option value="change service">Change Service</option>
                                            <option value="change schedule">Change Schedule</option>
                                            <option value="block/unblock issue">Block/Unbloack Issue</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Write Application</label>
                                        <textarea name="application" class="form-control"></textarea>

                                        <script>
                                            CKEDITOR.replace('application',
                                                {
                                                    height:400,
                                                    resize_enabled:true,
                                                    wordcount: {
                                                        showParagraphs: false,
                                                        showWordCount: true,
                                                        showCharCount: true,
                                                        countSpacesAsChars: true,
                                                        countHTML: false,

                                                        maxCharCount: 20}
                                                });



                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="app_submit" class="btn btn-success col-7" value="Submit Apllication">
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


