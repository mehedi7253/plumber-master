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
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-5" style="background-color: silver">
                            <div class="card-body">
                                <h1>
                                    <?php
                                    if (isset($_POST['report_btn'])){
                                        $name  = $_POST['p_name'];
                                        $issue = $_POST['issue'];
                                        $desc  = $_POST['description'];


                                        if ($name == ""){
                                            echo "<span class='text-danger'>Please Select Plumber</span> <br/>";
                                        }
                                        if ($issue == ""){
                                            echo "<span class='text-danger'>Please Enter Report Issue</span> <br/>";
                                        }
                                        if ($desc == ""){
                                            echo "<span class='text-danger'>Please Enter Description</span> <br/>";
                                        }

                                        if ($name && $issue && $desc){
                                            $sql_report = "INSERT INTO report (p_name, issue, description) VALUES ('$name', '$issue', '$desc')";
                                            $result = mysqli_query($connect, $sql_report);

                                            echo "<span class='text-success'>Report Send Successful</span> <br/>";

                                        }else{

                                            echo "<span class='text-danger'>Report Send Failed...Try Again</span> <br/>";
                                        }

                                    }
                                    ?>
                                </h1>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold w-25">Select Plumber</label>
                                        <?php
                                        $sql ="select * from plumbers";
                                        $res = mysqli_query($connect, $sql);
                                        ?>
                                        <select class="form-control" id="exampleFormControlSelect1" name="p_name">
                                            <option selected>------Select Plumber---------</option>
                                            <?php while ($row = mysqli_fetch_assoc($res)){?>
                                                <option value="<?php echo $row['first_name'];?>"><?php echo $row['first_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold w-25">Issue</label>
                                        <textarea name="issue" class="form-control" placeholder="Write Your Report Issue"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold w-25">Report Description</label>
                                        <textarea name="description" class="form-control" placeholder="Write Your Report Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <input type="submit" name="report_btn" class="btn btn-danger" value="Send Report">
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