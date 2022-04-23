<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plumber Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/main.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
   <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<style>
    .plum_log{
        height: auto;
        width:100%;
        background-image: url("../images/plumber_login.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
</style>
<body class="plum_log">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card admin_card">
                    <div class="card-header">
                        <h1 class="text-center">Plumber Login</h1>

                        <!-- start php code-->
                        <?php

                            //connect with database
                            require_once '../php/config_plumber.php';

                            //check login
                            if(logged_in() === TRUE) {
                                header('location: plumber_dashboard.php'); //redirect page
                            }

                            // form submit
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

                                            $_SESSION['id'] = $userdata['id'];

                                            header('location: plumber_dashboard.php');
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
                            Don't have an account? <span class="ml-2">Contact With Admin or See <a href="../job_post.php">Job Post</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>