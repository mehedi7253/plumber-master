<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin5">

        <a class="navbar-brand" href="">
                <span class="logo-text">
                     <a href="profile.php" class="navbar-brand text-capitalize"><h1><span><?php echo $userdata['first_name'];?> </span><?php echo $userdata['last_name'];?> </h1></a>
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
                <?php
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];

                    $count = 0;
                    $sql2 = "SELECT * FROM booking WHERE notify = 0 AND plumberID = $id";
                    $result = mysqli_query($connect, $sql2);
                    $count = mysqli_num_rows($result);
                }
                ?>
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count" style="font-size: 15px; color: white;"><?php if($count>0) { echo $count; } ?></span><i class="far fa-bell fa-2x" style="color: white; height: 30px"></i></a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                    <?php
                    $sql="UPDATE booking SET notify=1 WHERE notify=0";
                    $result=mysqli_query($connect, $sql);

                    $sql="select * from booking WHERE plumberID = $id ORDER BY c_id";
                    $result=mysqli_query($connect, $sql);

                    ?>
                    <div class="" href="">
                        <?php
                        $response='';
                        while($row=mysqli_fetch_array($result)) {
                            $response = $response . "<a href='booking_list.php'><div class='notification-item' style='padding:10px; cursor:pointer;'>" .
                                "<div class='notification-comment' style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>" . $row["c_name"]  . "</div>" .
                                "</div></a>";
                        }
                        if(!empty($response)) {
                            print $response;
                        }
                        ?>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/<?php echo $userdata['image'];?>" alt="user" class="rounded-circle" width="31"></a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                    <a class="dropdown-item" href="profile.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                    <a class="dropdown-item ml-2" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>

            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
        </ul>
    </div>
</nav>