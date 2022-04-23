<?php
include 'php/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plumber Service</title>
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

<header>
    <nav class="navbar navbar-expand-lg  bg-dark navbar-dark top-navbar" data-toggle="sticky-onscroll">
        <div class="container">
            <a href="#" class="navbar-brand"><h1><span>Plumber </span> Master</h1></a>
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
                    <li class="nav-item"><a href="news_feed.php" class="nav-link"> News Feed</a></li>
                    <li class="nav-item"><a href="" class="nav-link">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </nav>

</header>
<!-- End top header-->

<section class="newsfeed mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <h2>Total Members <span class="float-right"><a href="job_post.php" class="nav-link">Job Post</a></span></h2>
                <?php
                $sql = "select * from news_post ORDER BY id DESC ";
                $res = mysqli_query($connect, $sql);
                ?>
                <span class="text-capitalize"><i class="fas fa-user-friends text-muted "></i> 1689664 members</span>

                <?php while ($row = mysqli_fetch_assoc($res)){?>
                    <div class="card mt-5 radius" style="box-shadow: 4px 3px 13px">
                        <div class="card-header" style="background-color: #FFFFFF">
                            <p class="text-justify font-16 mt-3"> <?php echo $row['post_desc']?></p>
                        </div>
                        <div class="card-body" style="background-color: #DDDDDD">
                            <p class="text-center"><img src="images/<?php echo $row['image']?>" class="img-fluid card-img-top" style="height: 350px; width: 350px;"></p>
                        </div>
                        <div class="card-footer" style="background-color: #F5F5F5">
                            <span><img src="images/<?php echo $row['post_image']?>" style="height: 40px; width: 40px; border-radius: 50%"> <sup class="font-weight-bold ml-2" style="font-size: 19px;"> <?php echo $row['post_name']?> </sup></span>
                            <a href=""><span class="float-right" style="margin-right: 50px;"><i class="fas fa-comment-alt fa-2x" style="color: red"></i> <span style="font-size: 24px">4</span></span></a>
                        </div>
                    </div>
                <?php }?>

            </div>
        </div>
    </div>

</section>





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
<script src="assets/js/jquery.js"></script>
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