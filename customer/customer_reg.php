

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/main.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body style="background-color: #FAF7F0">
    <div  class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="col-md-7 col-sm-12 float-left">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h1 class="text-center">Customer Registration Form</h1>

                            <!-- start php code-->
                            <?php

                            //connect with database
                            require_once '../php/config.php';

                            //check login
                            if(logged_in() === TRUE) {
                                header('location: customer_dasboard.php'); //redirect page
                            }

                            // form is submitted
                            if($_POST) {
                                $fname      = $_POST['fname']; //decleare variable fname and put it into post method
                                $lname      = $_POST['lname']; //decleare variable lname and put it into post method
                                $username   = $_POST['username']; //decleare variable username and put it into post method
                                $password   = $_POST['password']; //decleare variable password and put it into post method
                                $cpassword  = $_POST['cpassword']; //decleare variable cpassword and put it into post method





                                //check first name is required
                                if($fname == "") {
                                    echo "<br/><br/><span class='text-danger'> First Name is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                }

                                //check last name is required
                                if($lname == "") {
                                    echo "<span class='text-danger'> Last Name is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                }

                                //check customer name is required
                                if($username == "") {
                                    echo "<span class='text-danger'> Email is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                }

                                //check password is required
                                if($password == "") {
                                    echo "<span class='text-danger'> Password is Required <sup class='font-weight-bold'>*</sup>/span> <br/>";
                                }

                                //check confirm Password is required
                                if($cpassword == "") {
                                    echo "<span class='text-danger'> Confirm Password is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                }

                                //check all information..if all information is coorectly input then data will be insert into database. other wise not.
                                if($fname && $lname && $username && $password && $cpassword) {

                                    if($password == $cpassword) {
                                        if(userExists($username) === TRUE) {
                                            echo $_POST['username'] . "<span class='text-danger'> already exists !!</span>";
                                        } else {
                                            if(registerUser() === TRUE) {
                                                echo "<h1 class='text-success'>Successfully Registered</h1>";
                                            } else {
                                                echo "<span class='text-danger'>Faieled To Registerd</span>";
                                            }
                                        }
                                    } else {
                                        echo "<span class='text-danger'>  Password does not match with Conform Password <sup class='font-weight-bold'>*</sup></span>";
                                    }
                                }

                            }

                            ?>
                            <!-- End  php code-->
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user" style="height: 10px"></i> </span>
                                    </div>
                                    <input type="text" name="fname" id="firstName" placeholder="First Name" autocomplete="off" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['fname'];
                                    } ?>" />
                                </div>
                                <label id="firstNameError" class="text-danger float-left ml-3"></label>

                                <div  class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input type="text" name="lname" id="lastName" placeholder="Last Name" autocomplete="off" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['lname'];
                                    } ?>" />
                                </div>
                                <label id="lastNameError" class="text-danger float-left ml-3"></label>

                                <div  class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                                    <input type="email" name="username" id="email" placeholder="Email" autocomplete="off" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['username'];
                                    } ?>" />
                                </div>
                                <label id="emailError" class="text-danger float-left ml-3"></label>

                                <div  class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input type="password" name="password" id="password" placeholder="Password"  class="form-control" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="" id="showhide"><span class="text-info font-weight-bold ml-2">Show Password</span>  <span id="passwordError" class="text-danger float-left ml-3"></span>
                                </div>


                                <div  class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input type="password" name="cpassword" id="confirmPassword" placeholder="Confirm Password" class="form-control" autocomplete="off" />
                                </div>
                                <label id="confirmPasserror" class="text-danger float-left ml-3"></label>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-camera"></i></span>
                                    </div>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div  class="form-group">
                                    <button class="btn  btn-success col-4" type="submit">Submit</button>
                                    <button class="btn btn-danger col-4" type="reset">Cancel</button>
                                </div>

                            </form>
                        </div>
                        <div class="card-footer">
                            <p class="float-right">Already Registered ? Click <a href="customer_login.php"><span class="text-info">Login</span></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 float-left">
                    <img src="../images/registration.jpg" class="img-fluid d-none d-lg-block" style="height: 650px; width:100%;">
                </div>
            </div>

        </div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/validation.js"></script>
</body>
</html>