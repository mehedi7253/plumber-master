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
                                    <li class="breadcrumb-item active" aria-current="page">Plumber Profile</li>
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
                               <?php
                               if (isset($_GET['id'])){
                                   $id = $_GET['id'];

                                   $q = "SELECT * FROM plumbers WHERE id = $id";

                                   $r = mysqli_query($connect, $q);
                                   $data = mysqli_fetch_assoc($r);
                               }
                               ?>
                               <img class="img-fluid" src="../images/<?php echo $data['image'];?>" style="height: 250px;">

                               <div class="card-body">
                                   <h4 class="text-center text-capitalize"><?php echo $data['first_name'];?> <?php echo $data['last_name'];?></h4>
                                   <p class="font-weight-bold text-center">Total Work: <span class ="ml-2 font-weight-bold">
                                        <?php
                                        $get_total_work = "SELECT DISTINCT (COUNT(p_email)) as NOE FROM booking b WHERE $id=b.plumberID";

                                        $result_work = mysqli_query($connect, $get_total_work);
                                        ?>

                                           <?php while ($r = mysqli_fetch_assoc($result_work)){?>

                                               <td><?php echo $r['NOE']?></td>
                                           <?php }?>
                                    </span>
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <div class="content text-center">

                                       <?php
                                       $userid = $userdata['c_id'];
                                       if (isset($_GET['id'])){
                                           $id = $_GET['id'];

                                           $query = "SELECT * FROM plumbers WHERE id = $id";
                                           $result = mysqli_query($connect,$query);
                                       }

                                       while($row = mysqli_fetch_array($result)){
                                           $postid = $row['id'];
                                           $title = $row['first_name'];
                                           $content = $row['username'];


                                           // User rating
                                           $query = "SELECT * FROM post_rating WHERE postid=".$postid." and userid=".$userid;
                                           $userresult = mysqli_query($connect,$query) or die(mysqli_error());
                                           $fetchRating = mysqli_fetch_array($userresult);
                                           $rating = $fetchRating['rating'];

                                           // get average
                                           $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=".$postid;
                                           $avgresult = mysqli_query($connect,$query) or die(mysqli_error());
                                           $fetchAverage = mysqli_fetch_array($avgresult);
                                           $averageRating = $fetchAverage['averageRating'];

                                           $sql2 ="SELECT postid, COUNT(userid) AS USER FROM post_rating WHERE postid = $id";
                                           $user = mysqli_query($connect, $sql2);
                                           $get_user = mysqli_fetch_assoc($user);

                                           if($averageRating <= 0){
                                               $averageRating = "No rating yet.";
                                           }
                                           ?>
                                           <div class="post">
                                               <div class="post-action">
                                                   <!-- Rating -->
                                                   <select class='rating' id='rating_<?php echo $postid; ?>' data-id='rating_<?php echo $postid; ?>'>
                                                       <option value="1" >1</option>
                                                       <option value="2" >2</option>
                                                       <option value="3" >3</option>
                                                       <option value="4" >4</option>
                                                       <option value="5" >5</option>
                                                   </select>
                                                   <div style='clear: both;'></div>
                                                   Average Rating : <span id='avgrating_<?php echo $postid; ?>'><?php echo $averageRating; ?> Based On <?php echo $get_user['USER']?> User</span>

                                                   <!-- Set rating -->
                                                   <script type='text/javascript'>
                                                       $(document).ready(function(){
                                                           $('#rating_<?php echo $postid; ?>').barrating('set',<?php echo $rating; ?>);
                                                       });

                                                   </script>
                                               </div>
                                           </div>
                                           <?php
                                       }
                                       ?>

                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="col-md-8 col-sm-12 float-left">
                           <div class="card-body">
                               <div class="card" id="mainFrame">
                                   <img src="../images/idcard.jpg" class="card-img-top" height="100px">
                                   <div class="img_logo">
                                       <img src="../images/logo.png" class="float-right mr-4" style="height: 80px; width: 80px; position: relative; margin-top: -118px; border-radius: 50%">
                                   </div>
                                   <div class="card-body" style="background-image: url(../images/cardbg5.JPG); background-size: 100% 100%; background-repeat: no-repeat">
                                       <div class="image">
                                           <img src="../images/<?php echo $data['image']?>" style="height: 150px; width: 130px; position: relative; margin-top: -100px">
                                           <span class="font-weight-bold ml-3 text-justify"><?php echo $data['first_name']?> <?php echo $data['last_name']?></span><br/>
                                       </div>
                                       <div class="mt-3">
                                           <p><span class="font-weight-bold">ID No:</span> <span style="margin-left: 18px">#<?php echo $data['id']?></span></p>
                                           <p><span class="font-weight-bold">Email:</span> <span style="margin-left: 20px"> <?php echo $data['username']?></span></p>
                                           <p><span class="font-weight-bold">Phone:</span> <span style="margin-left: 14px"> <?php echo $data['contact']?></span></p>
                                           <p><span class="font-weight-bold">Address:</span> <span style="margin-left: 2px"> <?php echo $data['address']?></span></p>
                                           <p><span class="font-weight-bold">Service:</span> <span style="margin-left: 12px"> <?php echo $data['service']?></span></p>
                                           <p><span class="font-weight-bold">Join Date:</span> <span> <?php echo $data['date']?></span></p>

                                       </div>
                                       <div class="bar float-right" style="position: relative; margin-top: -72px">
<!--                                           <img src="../images/rsz_mg.jpg" style="height: 30px; width: 150px; margin-left: 28px">-->
                                           <label class="font-italic ml-5"><?php echo $data['first_name']?> <?php echo $data['last_name']?></label>
                                           <br/>
                                           <img src="../images/bar.JPG" style="height: 40px; width: 200px" class="mt-2">
                                       </div>

                                   </div>
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