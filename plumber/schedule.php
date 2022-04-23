<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 7/21/2020
 * Time: 7:39 PM
 */

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
                                    <li class="breadcrumb-item active" aria-current="page">Change Schedule</li>
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
                    <div class="col-md-8 mx-auto mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Change Schedule Status</h3>
                                <?php
                                    if (isset($_POST['schedule'])){

                                        $id       = $_POST['id'];
                                        $schedule = $_POST['set_schedule'];

                                        if ($schedule == " "){
                                            echo "<span class='text-danger'>Select One.!</span><br/>";
                                        }

                                        if ($schedule){
                                            $sql = "UPDATE plumbers SET set_schedule = '$schedule' WHERE id = $id";
                                            $res = mysqli_query($connect, $sql);

                                            if ($res){
                                                echo "<span class='text-success'>Update Successful....!</span><br/>";
                                            }else{
                                                echo "<span class='text-danger'>Update Failed....!</span><br/>";
                                            }
                                        }
                                    }

                                ?>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input name="id" hidden value="<?php echo $userdata['id'];?>">
                                        <label>Set Schedule</label>
                                        <select name="set_schedule" class="form-control">
                                            <option>--------Select One--------</option>
                                            <option value="Morning">Morning (8.00 AM - 12.00 AM) </option>
                                            <option value="After Noon">After Noon (12.00 PM - 3.00 PM) </option>
                                            <option value="Evening">Evening (4.00 PM - 7.00 PM) </option>
                                            <option value="Night">Night (7.00 PM - 12.00 AM) </option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="schedule" class="btn btn-success"> Submit
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <a href="plumber_dashboard.php" class="float-right btn btn-info">Back</a>
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