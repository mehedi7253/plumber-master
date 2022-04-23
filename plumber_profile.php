<?php
include 'php/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plumber Master</title>
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
            <a href="#" class="navbar-brand"><h1><span>Plumber </span> Master</h1></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="myMenu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="" class="nav-link active ">HOME</a></li>
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
<!--content-->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12 float-left">
            <div class="card mt-5 mb-5">
                <?php
                if (isset($_GET['plumber'])){
                    $id = $_GET['plumber'];

                    $q = "SELECT * FROM plumbers WHERE id = $id";

                    $r = mysqli_query($connect, $q);
                    $data = mysqli_fetch_assoc($r);
                }
                ?>
                <img class="img-fluid" src="images/<?php echo $data['image'];?>" style="height: 250px;">

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
                            $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid= $id";
                            $avgresult = mysqli_query($connect,$query) or die(mysqli_error());

                            $rate = mysqli_fetch_assoc($avgresult);

                            $sql2 ="SELECT postid, COUNT(userid) AS USER FROM post_rating WHERE postid =  $id";
                            $user = mysqli_query($connect, $sql2);
                            $get_user = mysqli_fetch_assoc($user);

                        ?>
                        <p>Average Rating: <?php echo $rate['averageRating'];?> Based On <?php echo $get_user['USER']?> User</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-12 float-left">
            <div class="card-body mt-5">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Email </th>
                            <td class="font-weight-bold"><?php echo $data['username']; ?></td>
                        </tr>
                        <tr>
                            <th>Service  </th>
                            <td class="font-weight-bold"><?php echo $data['service']; ?></td>
                        </tr>
                        <tr>
                            <th>Gender  </th>
                            <td class="font-weight-bold"><?php echo $data['gender']; ?></td>
                        </tr>
                        <tr>
                            <th>Address  </th>
                            <td class="font-weight-bold"><?php echo $data['address']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone Number  </th>
                            <td class="font-weight-bold"><?php echo $data['contact']; ?></td>
                        </tr>
                        <tr>
                            <th>Join Date  </th>
                            <td class="font-weight-bold"><?php echo $data['date']; ?></td>
                        </tr>

                    </table>
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