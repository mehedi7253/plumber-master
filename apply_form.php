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
                <div class="card">
                    <div class="card-header">
                        <img src="images/logo.png" style="70px; width: 70px; border-radius: 50%" class="float-right">
                    </div>
                    <div class="card-body">
                        <h5 class="ml-4">
                            <?php
                            if (isset($_GET['job_post'])){
                                $job_id = $_GET['job_post'];

                                $sql = "select * from hire_post WHERE id = $job_id";
                                $res = mysqli_query($connect, $sql);

                                $data = mysqli_fetch_assoc($res);
                            }
                            if (isset($_POST['btn'])){
//                                $job_id       = $_POST['job_id'];
                                $first_name   = $_POST['first_name'];
                                $last_name    = $_POST['last_name'];
                                $email        = $_POST['email'];
                                $phone        = $_POST['phone'];
                                $nid          = $_POST['nid'];
                                $service      = $_POST['service'];
                                $expreance    = $_POST['expreance'];
                                $pres_address = $_POST['pres_address'];
                                $parm_address = $_POST['parm_address'];
                                $dob          = $_POST['dob'];
                                $gender       = $_POST['gender'];
                                $image        = $_FILES['image'] ['name'];




                                if ($first_name == ""){
                                    echo "<span class='text-danger'> First name Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($last_name == ""){
                                    echo "<span class='text-danger'> Last name Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($email == ""){
                                    echo "<span class='text-danger'> Email name Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($email == ""){
                                    echo "<span class='text-danger'> Email Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($phone == ""){
                                    echo "<span class='text-danger'> Phone Number Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($nid == ""){
                                    echo "<span class='text-danger'> NID Number Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($service == ""){
                                    echo "<span class='text-danger'> Service Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($expreance == ""){
                                    echo "<span class='text-danger'> Expreance Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($pres_address == ""){
                                    echo "<span class='text-danger'> Present Address Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($parm_address == ""){
                                    echo "<span class='text-danger'> Permanent Address Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($dob == ""){
                                    echo "<span class='text-danger'> Date Of Birth Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($gender == ""){
                                    echo "<span class='text-danger'> Gender Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";
                                }
                                if ($image == ""){
                                    echo "<span class='text-danger'> Image Is Required <sup class='text-danger font-weight-bold'>**</sup></span> <br/>";

                                }


                                if ($first_name && $last_name && $email && $phone && $nid && $service && $expreance && $pres_address && $parm_address && $dob && $gender && $image) {

                                    $error = 0;

                                    $sqlCheck = "SELECT * FROM apply_plumber WHERE email = '$email'";
                                    $result = mysqli_query($connect, $sqlCheck);
                                    $count = mysqli_num_rows($result);
                                    if ($count > 0) {
                                        $exist = "Email All ready Registerd Try Agin!";
                                        echo $exist;
                                        $error = 1;
                                    }

                                    if ($error == 0) {
                                        $fileinfo = PATHINFO($_FILES['image']['name']);
                                        $newfilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
                                        move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $newfilename);
                                        $location = $newfilename;

                                        $insert_data = "insert into apply_plumber(first_name, last_name, email, phone, nid, service, expreance, pres_address, parm_address, dob, gender, image, status) VALUES ('$first_name', '$last_name', '$email', '$phone', '$nid', '$service', '$expreance', '$pres_address', '$parm_address', '$dob', '$gender', '$image', '0')";
                                        $result = mysqli_query($connect, $insert_data);

                                        $lastid = mysqli_insert_id($connect);

                                        $sql = "SELECT * FROM apply_plumber WHERE id = '$lastid'";
                                        $records = mysqli_query($connect, $sql);
                                        $count = mysqli_num_rows($records);

                                        if ($count == 1) {
                                            $row = mysqli_fetch_array($records);

                                            $_SESSION['id'] = $row['id'];
                                            $_SESSION['first_name'] = $row['first_name'];
                                            $_SESSION['last_name'] = $row['last_name'];
                                            $_SESSION['email'] = $row['email'];
                                            $_SESSION['phone'] = $row['phone'];
                                            $_SESSION['nid'] = $row['nid'];
                                            $_SESSION['service'] = $row['service'];
                                            $_SESSION['expreance'] = $row['expreance'];
                                            $_SESSION['pres_address'] = $row['pres_address'];
                                            $_SESSION['parm_address'] = $row['parm_address'];
                                            $_SESSION['dob'] = $row['dob'];
                                            $_SESSION['gender'] = $row['gender'];
                                            $_SESSION['image'] = $row['image'];

                                            echo "<span class='text-success'>Application Successful</span> <br/>";
                                            header('Location: view_application.php');

                                        } else {
                                            echo "<span class='text-danger'>Application Failed..!</span> <br/>";
                                        }
                                    }
                                }
                            }
                            ?>
                        </h5>

                        <form action="" method="post" enctype="multipart/form-data" class="mt-5">
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>First Name <sup class="text-danger font-weight-bold">**</sup></label>

<!--                                <input type="text" name="job_id"  class="form-control" value="--><?php //echo $data['id'];?><!--">-->
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="<?php if($_POST) {
                                    echo $_POST['first_name'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Last Name <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter last Name" value="<?php if($_POST) {
                                    echo $_POST['last_name'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Email <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php if($_POST) {
                                    echo $_POST['email'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Phone Number <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php if($_POST) {
                                    echo $_POST['phone'];
                                } ?>">
                            </div>
                            <div class="form-group ml-3">
                                <label>NID Number <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="nid" class="form-control" placeholder="Enter NID Number" value="<?php if($_POST) {
                                    echo $_POST['nid'];
                                } ?>">
                            </div>

                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Service <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="service" class="form-control" value="<?php echo $data['service']?>" value="<?php if($_POST) {
                                    echo $_POST['service'];
                                } ?>">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Experience <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="text" name="expreance" class="form-control" placeholder="Enter Your Experience" value="<?php if($_POST) {
                                    echo $_POST['expreance'];
                                } ?>">
                            </div>

                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Present Address <sup class="text-danger font-weight-bold">**</sup></label>
                                <textarea type="text" name="pres_address" class="form-control" placeholder="Enter Your Present Address"></textarea>
                            </div>

                            <div class="form-group col-md-6 col-sm-12 float-left">
                                <label>Permanent Address <sup class="text-danger font-weight-bold">**</sup></label>
                                <textarea type="text" name="parm_address" class="form-control" placeholder="Enter Your Permanent Address"></textarea>
                            </div>

                            <div class="form-group ml-3">
                                <label>Date Of Birth <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="date" name="dob" class="form-control" value="<?php if($_POST) {
                                    echo $_POST['dob'];
                                } ?>">
                            </div>
                            <div class="form-group ml-3">
                                <label>Select Gender <sup class="text-danger font-weight-bold">**</sup></label> <br/>
                                <input type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Female"> FeMale
                            </div>
                            <div class="form-group ml-3">
                                <label>Select Your Image <sup class="text-danger font-weight-bold">**</sup></label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-info col-6" value="Submit">
                            </div>

                        </form>
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
</body>
</html>