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
<style>
    .cust_log{
        height: auto;
        width:100%;
        background-image: url("../images/banner1.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
</style>
<body class="cust_log">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card admin_card">
                    <div class="card-header">
                        <h1 class="text-center">Customer Login</h1>

                        <!-- start php code-->
                        <?php

                            //connect with database
                            require_once '../php/config.php';

                            //check login
                            if(logged_in() === TRUE) {
                                header('location: customer_dasboard.php'); //redirect page
                            }

                            // form submiited
                            if($_POST) {
                                $username = $_POST['username']; //decleare variable username and put it into post method
                                $password = $_POST['password']; //decleare variable password and put it into post method

                                //check error
                                //if username empty
                                if($username == "") {
                                    echo "<span class='text-danger'>* Username Field is Required</span> <br />";
                                }

                                //if password empty
                                if($password == "") {
                                    echo "<span class='text-danger'>* Password Field is Required </span> <br />";
                                }

                                //if name and password is match then customer can log in otherwise not,.
                                if($username && $password) {
                                    if(userExists($username) == TRUE) {
                                        $login = login($username, $password);
                                        if($login) {
                                            $userdata = userdata($username);

                                            $_SESSION['c_id'] = $userdata['c_id'];

                                            header('location: customer_dasboard.php');
                                            exit();

                                        } else {
                                            echo "<span class='text-danger'>Incorrect username/password combination</span>";
                                        }
                                    } else{
                                        echo "<span class='text-danger'>username does not exists</span>";
                                    }
                                }

                            } // /if

                        ?>
                        <!-- End php code-->

                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Email">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                            <br />
                            <div>
                                <button class="btn btn-success col-4" name="btn" type="submit">Login</button>
                                <button class="btn btn-danger col-4"  type="reset">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex  justify-content-center links">
                            Don't have an account?<a href="customer_reg.php"> <span class="ml-2">Registration Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>