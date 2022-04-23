<?php

    //connect with database
    require_once '../php/config.php';

    // check user login via session
    if(not_logged_in() === TRUE) {
        header('location: customer_login.php'); // redirect location
    }

    $userdata = getUserDataByUserId($_SESSION['c_id']);  //get all information by user id

?>
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <!-- User Profile-->
            <li>
                <!-- User Profile-->
                <div class="user-profile d-flex no-block dropdown m-t-20">
                    <div class="user-pic">
                        <img src="../images/<?php echo $userdata['image'];?>" alt="users" class="rounded-circle img-thumbnail text-center"style="width: 150px; height: 150px" />
                    </div>
                </div>
                <!-- End User Profile-->
            </li>
            <li class="sidebar-item">
                <h5 class="text-capitalize ml-5 m-b-0 user-name font-medium"><?php echo $userdata['first_name'];?> <?php echo $userdata['last_name'];?></h5>
                <p class="op-5 ml-5 mt-2 text-dark font-weight-bold user-email"><?php echo $userdata['username'];?></p>
            </li>
            <!-- User Profile-->
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="customer_dasboard.php" aria-expanded="false"><i class="fas fa-home"></i><span class="hide-menu">Home Page</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="edit_customer_info.php"><i class="fas fa-user-edit" style="color: #0f6674"></i><span class="hide-menu p-1">Update Profile</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="change_pass.php"><i class="fas fa-unlock-alt" style="color: #1BBD36"></i><span class="hide-menu p-1">Change Password</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="book_plumber.php"><i class="fas fa-calendar-check" style="color: #2a2358"></i><span class="hide-menu p-1">Book Plumber</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="report.php"><i class="far fa-share-square" style="color: red"></i><span class="hide-menu p-1">Report Plumber</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="chating.php"><i class="far fa-envelope" style="color: #999999"></i><span class="hide-menu p-1"> Chat Box</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="processing_list.php" aria-expanded="false"><i class="fas fa-bars"></i><span class="hide-menu">Booking Process List</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="payment.php" aria-expanded="false"><i class="fab fa-cc-amazon-pay"></i><span class="hide-menu">Payment list</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="news_feed.php" target="_blank" aria-expanded="false"><i class="far fa-newspaper"></i><span class="hide-menu">News Feed</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="write_post.php" aria-expanded="false"><i class="far fa-newspaper"></i><span class="hide-menu">Write Post</span></a></li>
        </ul>

    </nav>
    <!-- End Sidebar navigation -->
</div>