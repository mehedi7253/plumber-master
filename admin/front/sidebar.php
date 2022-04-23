<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="admin_dashboard.php">

            <span><img src="../images/admin.jpg" class="img-fluid" style="height:150px; width: 150px; border-radius: 50%; margin-left: 5%"></span><br/>
            <p class="ml-5 mt-2 c">Admin <i class="fas fa-circle fa-1x" style="color: #1BBD36"></i></p>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-street-view" style="color: white"></i>
            <span>Manage Plumber</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="add_plumber.php"><i class="fas fa-plus-circle" style="color: green"></i> Add Plumber</a>
            <a class="dropdown-item" href="view_plumber.php"><i class="fas fa-eye" style="color: #00aff0"></i> view All Plumber</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-street-view" style="color: white"></i>
            <span>View User</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!--            <a class="dropdown-item" href="add_plumber.php"><i class="fas fa-plus-circle" style="color: green"></i> Add Plumber</a>-->
            <a class="dropdown-item" href="view_user.php"><i class="fas fa-eye" style="color: #00aff0"></i> view All User</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="report.php"><i class="far fa-share-square" style="color: red"></i><span> Report List</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fab fa-servicestack" style="color: green"></i>
            <span>Services</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="add_service.php"><i class="fas fa-plus-circle" style="color: green"></i> Add New Service</a>
            <a class="dropdown-item" href="manage_service.php"><i class="fas fa-tasks" style="color: green;"></i> Manage Service</a>
            <a class="dropdown-item" href="rate.php"><i class="fas fa-edit"></i><span> Add Service Rate</span></a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="admin-map.php"><i class="fa fa-map-marker" style="color: cornflowerblue"></i><span> Confirm Location</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Order Report</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="earn.php"><i class="fas fa-dollar-sign" style="color: red"></i> Earning</a>
            <a class="dropdown-item" href="confirm_order.php"><i class="fas fa-eye" style="color: green"></i> All Confirm Order</a>
            <a class="dropdown-item" href="cancel_order.php"><i class="fas fa-eye" style="color: red"></i> All Pending Order</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="check_message.php"><i class="far fa-comment-alt"></i><span> Check Message</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell" style="color: white"></i>
            <span>Notice</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="add_notice.php"><i class="fas fa-plus-circle" style="color: green"></i> Add New Notice</a>
            <a class="dropdown-item" href="manage_notice.php"><i class="fas fa-tasks" style="color: green;"></i> Manage Notice</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="check_appliction.php"><i class="fas fa-angle-double-left" style="color: green"></i><span> Check New Application</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="chat_box.php"><i class="far fa-comment-alt"></i><span> Chat Box</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="id_card.php"><i class="fas fa-address-card" style="color: green"></i><span> ID Card Generate</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell" style="color: white"></i>
            <span>Post For new plumber</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="post_plumber.php"><i class="fas fa-plus-circle" style="color: green"></i> Add New Post</a>
            <a class="dropdown-item" href="manage_post.php"><i class="fas fa-tasks" style="color: green;"></i> Manage post</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="application.php"><i class="fa fa-file" style="color: rgba(170,189,208,0.6)"></i><span> Application List</span></a>
    </li>

</ul>