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
    <!--nav bar-->

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
    <!--end navbar-->


    <!--slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 slider_img" src="images/slide-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 slider_img" src="images/slide-1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 slider_img" src="images/slide-1.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <section class="slider_contatct d-none d-lg-block">
            <div class="col-4 col-sm-4 mb-5 mt-5">
                <div class="card">
                    <div class="card-header" style="background-color: #F3E721">
                        <p class="text-center"><span class="font-weight-bolder text-capitalize">Quick contact form</span> <br/>
                            call us anytime !</p>
                    </div>
                    <div class="card-body" style="background-color: #1E4763">
                        <p>
                            <?php
                                if (isset($_POST['btn'])){
                                    $name     = $_POST['name'];
                                    $phone    = $_POST['phone'];
                                    $email    = $_POST['email'];
                                    $msg      = $_POST['message'];

                                    if ($name == ""){
                                        echo "<span class='text-danger'> **Name Required</span> <br/>";
                                    }
                                    if ($phone == ""){
                                        echo "<span class='text-danger'> **Phone Required</span> <br/>";
                                    }
                                    if ($email == ""){
                                        echo "<span class='text-danger'> **Email Required</span> <br/>";
                                    }
                                    if ($msg == ""){
                                        echo "<span class='text-danger'> **Message Required</span> <br/>";
                                    }

                                    if ($name && $phone && $email && $msg){
                                        $send_message = "INSERT INTO message (name, phone, email, message) VALUES ('$name', '$phone', '$email', '$msg')";
                                        $result = mysqli_query($connect, $send_message);

                                        echo "<span class='text-success'>Message Send Successful</span>";
                                    }else{
                                        echo "<span class='text-danger'>Message Send Un-Successful</span>";
                                    }
                                }
                            ?>
                        </p>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name.." class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" placeholder="Phone Number.." class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email..." class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message...." class="form-control" name="message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-success" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--end slider-->



    <!--service offer-->
    <section class="service_offer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mt-3 mb-5">
                    <div class="mt-5">
                        <p class="font-weight-bold"><span class=""><img src="images/sep-icon.png"> <span class="ml-2">SERVICE WE OFFER</span> </span></p>
                    </div>

                    <div id="recipeCarousel23" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner w-100" role="listbox">
                            <div class="carousel-item row no-gutters active">
                                <div class="col-md-4 float-left p-3">
                                    <img src="images/services-1.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                                <div class="col-md-4 p-3 float-left">
                                    <img src="images/services-2.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                                <div class="col-md-4 p-3 float-left">
                                    <img src="images/services-3.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                            </div>


                            <div class="carousel-item row no-gutters">
                                <div class="col-md-4 float-left p-3">
                                    <img src="images/services-1.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                                <div class="col-md-4 p-3 float-left">
                                    <img src="images/services-2.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                                <div class="col-md-4 p-3 float-left">
                                    <img src="images/services-3.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                            </div>


                            <div class="carousel-item row no-gutters">
                                <div class="col-md-4 float-left p-3">
                                    <img src="images/services-1.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                                <div class="col-md-4 p-3 float-left">
                                    <img src="images/services-2.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                                <div class="col-md-4 p-3 float-left">
                                    <img src="images/services-3.png" alt="image" class="card-img-top" style="height: 170px">
                                    <div class="card card-body">
                                        <h4 class="text-center">House cleaning & Maid Service</h4>
                                        <p class="mt-5"></p>
                                        <a href=""><button class="btn btn-primary btn-block">View details</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <a class="carousel-control-prev" href="#recipeCarousel23" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#recipeCarousel23" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
    </section>
    <!--end service offer-->


    <!--blog-->
    <section class="blog mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mt-5">
                    <div class="col-md-4 col-sm-12 float-left">
                        <img src="images/welcome-img.png">
                    </div>
                    <div class="col-md-8 col-sm-12 float-left">
                        <h5 class="mt-5">WELCOME TO OUR PLUMBING SITE</h5>
                        <p class="mt-5 text-muted">Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo eni sai th ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione kavosvo uptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>

                        <div class="col-md-4 col-sm-12 float-left mt-5">
                            <img src="images/high-trained-staff.png">
                            <h6 class="mt-4">HIGHLY-TRAINED STAFF</h6>
                            <p class="mt-3 text-justify">Beatae vitae dicta sunt explicabonie seni sai th ipsam voluptatem.</p>
                        </div>
                        <div class="col-md-4 col-sm-12 float-left mt-5">
                            <img src="images/quality-cleaning-staff.png">
                            <h6 class="mt-4">QULAITY CLEANING TOOLS</h6>
                            <p class="mt-3 text-justify">Beatae vitae dicta sunt explicabonie seni sai th ipsam voluptatem.</p>
                        </div>
                        <div class="col-md-4 col-sm-12 float-left mt-5">
                            <img src="images/fast-service.png">
                            <h6 class="mt-4">FAST & EFFECTIVE SERVICE</h6>
                            <p class="mt-3 text-justify">Beatae vitae dicta sunt explicabonie seni sai th ipsam voluptatem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog-->


    <!--clever staff-->
    <section class="clever_staff">
        <div class="container">
            <div class="row">
                <?php
                    $sql    = "SELECT * FROM plumbers";
                    $res    = mysqli_query($connect, $sql);

                ?>
                <div class="col-md-12 col-sm-12 mt-5 mb-5">
                    <div class="col-md-3 col-sm-12 float-left">
                        <p class="font-weight-bold"><span class=""><img src="images/sep-icon.png"> <span class="ml-2">CLEVER STAFFS</span> </span></p>
                        <p class="ml-5 text-justify">Totam rem aperiam, eaque ipsa quae inventore veritatis et quasi architect beatae vitae dicta sunt expleo. nemo enim ipsam voluptatem quia.</p>
                    </div>
                    <div  class="col-md-9 col-sm-12 float-left">
                        <div id="recipeCarousel3" class="carousel slide w-100" data-ride="carousel">
                            <div class="carousel-inner w-100" role="listbox">
                                <?php while ($row = mysqli_fetch_assoc($res)){?>
                                    <div class="carousel-item row no-gutters active">
                                        <div class="col-md-4 float-left p-3">
                                            <img src="images/<?php echo $row['image'];?>" alt="image" class="card-img-top" style="height: 170px">
                                        </div>
                                        <div class="col-md-4 p-3 float-left">
                                            <img src="images/<?php echo $row['image'];?>" alt="image" class="card-img-top" style="height: 170px">
                                        </div>
                                        <div class="col-md-4 p-3 float-left">
                                            <img src="images/<?php echo $row['image'];?>" alt="image" class="card-img-top" style="height: 170px">
                                        </div>
                                    </div>
                                <?php }?>
                            </div>

                    </div>
                        <a class="carousel-control-prev" href="#recipeCarousel3" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#recipeCarousel3" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                </div>
            </div>
        </div>
    </section>
    <!--clever staff-->


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