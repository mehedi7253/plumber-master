<?php
    session_start();
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
                <div class="card" id="mainFrame">
                    <div class="card-header">
                        <p>Application ID: <?php echo $_SESSION['id'];?> <span><img src="images/logo.png" style="70px; width: 70px; border-radius: 50%" class="float-right"></span></p>
                    </div>
                    <div class="card-body">
                        <div class="image ml-3">
                            <img src="images/<?php echo $_SESSION['image'];?>" style="height: 150px; width: 150px">
                        </div>

                        <div class="mt-4">
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>First Name</label>
                                <input disabled value="<?php echo $_SESSION['first_name'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Last Name</label>
                                <input disabled  value="<?php echo $_SESSION['last_name'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Email</label>
                                <input disabled value="<?php echo $_SESSION['email'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Phone Number</label>
                                <input disabled value="<?php echo $_SESSION['phone'];?>" class="form-control">
                            </div>

                            <div class="form-group ml-3">
                                <label>NID</label>
                                <input disabled value="<?php echo $_SESSION['nid'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Service</label>
                                <input disabled value="<?php echo $_SESSION['service'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Experience</label>
                                <input disabled value="<?php echo $_SESSION['expreance'];?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Present Address</label>
                                <textarea disabled class="form-control"><?php echo $_SESSION['pres_address'];?></textarea>
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Parmanent Address</label>
                                <textarea disabled class="form-control"><?php echo $_SESSION['parm_address'];?></textarea>
                            </div>
                            <div class="form-group ml-3">
                                <label>Date Of Birth</label>
                                <input disabled value="<?php echo $_SESSION['dob'];?>" class="form-control">
                            </div>
                            <div class="form-group ml-3">
                                <label>Gender</label>
                                <input disabled value="<?php echo $_SESSION['gender'];?>" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info float-right" type="pss" id="prntPSS">Download Now</button>
                    </div>
                </div>

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

<script type="application/javascript">
    $(document).ready(function () {

        $('#prntPSS').click(function() {
            var printContents = $('#mainFrame').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });

    });
</script>
</body>
</html>