<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin5">

        <a class="navbar-brand" href="">
                <span class="logo-text">
                     <a href="customer_profile.php" class="navbar-brand text-capitalize"><h1><span><?php echo $userdata['first_name'];?> </span><?php echo $userdata['last_name'];?> </h1></a>
                </span>
        </a>

        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
    </div>

    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

        <ul class="navbar-nav float-left mr-auto">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                <form class="app-search position-absolute">
                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                </form>
            </li>
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/<?php echo $userdata['image'];?>" alt="user" class="rounded-circle" width="31"></a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                    <a class="dropdown-item" href="customer_profile.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                    <a class="dropdown-item ml-2" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
        </ul>
    </div>
</nav>