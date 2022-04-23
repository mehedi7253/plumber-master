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
                                    <li class="breadcrumb-item active" aria-current="page">profile</li>
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
                        <div class="col-md-4 col-sm-12 float-left">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <?php
                                        if (isset($_POST['pic'])){
                                            $fileinfo = PATHINFO($_FILES['image']['name']);
                                            $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension'];
                                            move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename);
                                            $location = $newfilename;

                                            $update_profie_pic = "UPDATE plumbers SET image = '$location' WHERE id = '$_SESSION[id]'";
                                            mysqli_query($connect, $update_profie_pic);


                                            $sql = "SELECT * FROM plumbers WHERE id = '$_SESSION[id]'";
                                            $records = mysqli_query($connect, $sql);
                                            $count = mysqli_num_rows($records);

                                            if ($count == 1) {
                                                $row = mysqli_fetch_array($records);
                                                echo " $userdata[image]";

                                                echo "<script>document.location.href='plumber_dashboard.php'</script>";

                                            }


                                        }
                                        ?>
                                    </div>
                                    <center class="m-t-30"> <img src="../images/<?php echo $userdata['image'];?>" title="<?php echo $userdata['first_name'];?>" class="rounded-circle" width="200" height="200" />
                                        <h4 class="card-title m-t-10 text-capitalize"><?php echo $userdata['first_name'];?> <span><?php echo $userdata['last_name'];?></span></h4>
                                    </center>
                                    <br/>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group mt-3">
                                            <input type="file" name="image">
                                            <input type="submit" name="pic" value="Change profile Picture" class="btn btn-success mt-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 float-left">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>First Name </th>
                                            <td class="font-weight-bold text-capitalize"><?php echo $userdata['first_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name  </th>
                                            <td class="font-weight-bold text-capitalize"><?php echo $userdata['last_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email </th>
                                            <td class="font-weight-bold"><?php echo $userdata['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Service  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['service']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Address  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['contact']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Join Date  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['date']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Work  </th>
                                            <td class="font-weight-bold">
                                                <?php
                                                if (isset($_SESSION['id'])){
                                                    $id = $_SESSION['id'];

                                                    $sql = "SELECT * FROM booking WHERE plumberID = $id";
                                                    $fetchs = mysqli_query($connect, $sql);
                                                }


                                                $get_total_work = "SELECT DISTINCT (COUNT(p_email)) as NOE FROM booking b WHERE $id=b.plumberID";

                                                $result_work = mysqli_query($connect, $get_total_work);


                                                ?>
                                                <?php while ($r = mysqli_fetch_assoc($result_work)){?>

                                                    <span><?php echo $r['NOE']?></span>
                                                <?php }?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Avarage Rating</th>
                                            <td class="font-weight-bold">
                                                <div class="content">

                                                    <?php
                                                    $userid = $userdata['id'];

                                                    if (isset($_SESSION['id'])){
                                                        $id = $_SESSION['id'];

                                                        $sql = "SELECT * FROM plumbers WHERE id = $id";
                                                        $result = mysqli_query($connect, $sql);
                                                    }
                                                    while($row = mysqli_fetch_array($result)){
                                                        $postid = $row['id'];
                                                        $title = $row['first_name'];
                                                        $content = $row['username'];


                                                        // get average
                                                        $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=".$postid;
                                                        $avgresult = mysqli_query($connect,$query) or die(mysqli_error());
                                                        $fetchAverage = mysqli_fetch_array($avgresult);
                                                        $averageRating = $fetchAverage['averageRating'];

                                                        $sql2 ="SELECT postid, COUNT(userid) AS USER FROM post_rating WHERE postid =  $id";
                                                        $user = mysqli_query($connect, $sql2);
                                                        $get_user = mysqli_fetch_assoc($user);

                                                        $sql2 ="SELECT postid, COUNT(userid) AS USER FROM post_rating WHERE postid =  $id";
                                                        $user = mysqli_query($connect, $sql2);
                                                        $get_user = mysqli_fetch_assoc($user);

                                                        if($averageRating <= 0){
                                                            $averageRating = "No rating yet.";
                                                        }
                                                        ?>


                                                        <span id='avgrating_<?php echo $postid; ?>'><?php echo $averageRating; ?> Based On <?php echo $get_user['USER']?> user</span>

                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
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