<?php
    include 'php/db_connect.php';
    if (isset($_GET['service'])){
        $serv_id = $_GET['service'];

        $select_service = "SELECT * FROM services WHERE id = $serv_id";
        $serv_res       = mysqli_query($connect, $select_service);

        $serv_data = mysqli_fetch_assoc($serv_res);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $serv_data['name']; ?> Service</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/css/main.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link href="images/logo.png" rel="icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<style>
    .sticky.is-sticky {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        z-index: 1000;
        width: 100%;
    }

</style>
<body>
<!--nav bar-->
<section class="header-top" style="background-color: silver">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="float-left">
                    <p class="text-info p-2 font-weight-bold">Call US: <span class="text-success">01941697253</span> <br/><span>Email: <span class="text-success">mehedi@gmail.com</span></span></p>
                </div>
                <div class="float-right p-2">
                    <a href="admin/admin_login.php" class="nav-link float-left"><button class="btn btn-info">Admin</button></a>
                    <a href="customer/customer_login.php" class="nav-link float-left"><button class="btn btn-info">Customer</button></a>
                    <a href="plumber/plumber_login.php" class="nav-link float-left"><button class="btn btn-info">Plumber</button></a>
                </div>

            </div>
        </div>
    </div>
</section>
<header>
    <nav class="navbar navbar-expand-lg  bg-dark navbar-dark top-navbar" data-toggle="sticky-onscroll">
        <div class="container">
            <a href="index.php" class="navbar-brand"><h1><span>Plumber </span> Master</h1></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="myMenu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link active ">HOME</a></li>
                    <li class="nav-item"><a href="" class="nav-link">About Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <?php
                            $sql = "SELECT * FROM services";
                            $res = mysqli_query($connect, $sql);
                            ?>
                            <?php while ($row = mysqli_fetch_assoc($res)){?>
                                <a class="dropdown-item" target="_blank" href="service.php?service=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>
                            <?php }?>
                        </div>
                    </li>
                    <li class="nav-item"><a href="" class="nav-link"> working Demo</a></li>
                    <li class="nav-item"><a href="" class="nav-link">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </nav>

</header>
<!-- End top header-->
<!--end navbar-->

<div class="slider">
    <img src="images/<?php echo $serv_data['image']?>" style="width: 100%; height: 300px;">
    <div style="margin-top: -100px;">
        <h2 class="ml-5" style="font-size:35px;min-height:40px;color:white" id="text-shadow3"></h2>
    </div>
</div>
<!--content-->
    <div class="container">
         <div class="row">
             <div class="col-md-12 col-sm-12">
                 <div class="col-md-8 col-sm-12 float-left mt-5 mb-5">
                     <h1 class="font-weight-bold mt-5 text-capitalize"><?php echo $serv_data['title']?></h1>

                     <p class="mt-3 text-justify" style="font-size: 17px; font-family: Arial"><?php echo $serv_data['application']?></p>

                     <hr/>

                     <h2 class="font-weight-bold mt-5 text-capitalize">Features</h2>

                     <p class="mt-3 text-justify" style="font-size: 17px; font-family: Arial;">
                         Hourly, Daily, Weekly and Monthly Subscription Model.<br/><br/>

                         4-step Trained Cleaning Professionals.<br/><br/>

                         Background Checked, Verified and Trusted.<br/><br/>

                         Affordable Price with Custom Packages.
                     </p>
                 </div>
                 <div class="col-md-4 col-sm-12 float-left mt-5 mb-5">
                     <div class="mt-5 mb-3">
                             <h3>Top Plumber </h3>
                             <?php
                                $service_name = $serv_data['name'];

//                                $select_plumber = "SELECT plumbers.image, plumbers.id, booking.plumberID, booking.service, booking.p_email, booking.plumberID, booking.p_name FROM booking INNER JOIN plumbers ON booking.plumberID = plumbers.id AND booking.service = '$service_name'";
                               $select_plumber = "select * from plumbers WHERE service = '$service_name'";
                             $result = mysqli_query($connect, $select_plumber);
                             ?>
                             <?php while ($data = mysqli_fetch_assoc($result)){?>
                                 <div class="card mt-3">
                                    <img src="images/<?php echo $data['image'];?>" style="height: 150px;" class="card-img-top">
                                     <div class="card-body">
                                         <p>Name: <?php echo $data['first_name']?> <?php echo $data['last_name']?></p>
                                         <p>Service: <?php echo $data['service']?></p>
<!--                                         <p>Total Work: --><?php //echo $data['NOFT']?><!--</p>-->

                                     </div>
                                     <div class="card-footer">
                                         <a href="plumber_profile.php?plumber=<?php echo $data['id']?>" class="nav-link float-left">View Profile</a>
                                         <a href="customer/customer_login.php" class="nav-link float-right">Book Now</a>
                                     </div>

                                 </div>
                             <?php }?>

                     </div>
                 </div>
             </div>
         </div>
    </div>
<!--end content-->


<!--blog-->
<!--start footer-->
<section class="fotter bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <p class="text-center p-2 text-white">This site is create By @ <b> <i>Md. Mehedi Hasan</i></b></p>
            </div>
        </div>
    </div>
</section>
<!--end footer-->

<!--    scrooll up-->
<button id="topBtn"><i class="fas fa-arrow-up"></i></button>

<!--script-->
<script src="assets/js/jquery.js">
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/topdown.js"></script>
<script src="assets/js/validation.js"></script>
<script>

    // Sticky navbar
    // =========================
    $(document).ready(function () {
        // Custom function which toggles between sticky class (is-sticky)
        var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
            var stickyHeight = sticky.outerHeight();
            var stickyTop = stickyWrapper.offset().top;
            if (scrollElement.scrollTop() >= stickyTop) {
                stickyWrapper.height(stickyHeight);
                sticky.addClass("is-sticky");
            }
            else {
                sticky.removeClass("is-sticky");
                stickyWrapper.height('auto');
            }
        };

        // Find all data-toggle="sticky-onscroll" elements
        $('[data-toggle="sticky-onscroll"]').each(function () {
            var sticky = $(this);
            var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
            sticky.before(stickyWrapper);
            sticky.addClass('sticky');

            // Scroll & resize events
            $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
                stickyToggle(sticky, stickyWrapper, $(this));
            });

            // On page load
            stickyToggle(sticky, stickyWrapper, $(window));
        });
    });

</script>
</body>
</html>