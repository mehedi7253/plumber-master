<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body style="background-color: #007bb6;">

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card admin_card">
                <div class="card-header">
                    <h1 class="text-center">Admin Login</h1>
                </div>
                <div class="card-body">
                    <p>
                        <?php

                        session_start();
                        if (isset($_SESSION['email'])){
                            header('Location: admin_dashboard.php');
                        }

                        require_once '../php/db_connect.php';
                        global  $connect;


                        if (isset($_POST['btn'])){
                            $email    = $_POST['email'];
                            $pass     = $_POST['password'];

                            $sql = "SELECT * FROM admin WHERE email ='$email' AND password = '$pass'";

                            $result = mysqli_query($connect, $sql);

                            $row = mysqli_num_rows($result);
                            if ($row == 1){
                                echo "Login Done";
                                $_SESSION['email'] = $email;
                                header('Location: admin_dashboard.php');
                            }else{
                                echo "<span class='text-danger'>User Name Or Password Doesn't match</span>";
                            }
                        }

                        ?>

                    </p>
                    <form action="" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Email">
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
            </div>
        </div>
    </div>
</div>
</body>
</html>