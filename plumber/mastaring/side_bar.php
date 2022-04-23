<?php

//connect with database
require_once '../php/config_plumber.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: plumber_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id

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
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="plumber_dashboard.php"><i class="fas fa-home"></i><span class="hide-menu p-1"> Home</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="edit_plumber_info.php"><i class="fas fa-user-edit" style="color: #0f6674"></i><span class="hide-menu p-1">Update Profile</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="change_pass.php"><i class="fas fa-unlock-alt" style="color: #1BBD36"></i><span class="hide-menu p-1">Change Password</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="schedule.php"><i class="fas fa-unlock-alt" style="color: #1BBD36"></i><span class="hide-menu p-1">Make Schedule</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="booking_list.php?"><i class="fas fa-calendar-check" style="color: #2a2358"></i><span class="hide-menu p-1">Booking List</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="notice.php"><i class="fas fa-bell" style="color: #040505"></i><span class="hide-menu p-1"> Notice</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="application.php"><i class="fas fa-folder-plus" style="color: #0e2259"></i><span class="hide-menu p-1"> Application</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="location.php"><i class="fa fa-map-marker" style="color: cornflowerblue"></i><span class="hide-menu p-1"> Location</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="make_invoice.php"><i class="fas fa-file-invoice"></i><span class="hide-menu p-1"> Make Invoice</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="payment_status.php"><i class="fas fa-dollar-sign"></i><span class="hide-menu p-1"> Payment Status</span></a></li>
        </ul>

    </nav>
    <!-- End Sidebar navigation -->
</div>