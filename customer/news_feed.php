<?php

//connect with database
require_once '../php/config.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: customer_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['c_id']);  //get all information by user id

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/<?php echo $userdata['image'];?>">
    <title>News Feed</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/rating.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="jquery-bar-rating-master/dist/themes/fontawesome-stars.css" rel="stylesheet" type='text/css'>
    <link href="jquery-bar-rating-master/dist/themes/fontawesome-stars.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="front_template/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #F7F8FA;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <?php
                    $sql = "select * from news_post ORDER BY id DESC ";
                    $res = mysqli_query($connect, $sql);
                ?>
                <h2>News Feed</h2>
                <span class="text-capitalize"><i class="fas fa-user-friends text-muted "></i> 1689664 members</span>

                <?php while ($row = mysqli_fetch_assoc($res)){?>
                    <div class="card mt-5 radius" style="box-shadow: 4px 3px 13px">
                        <div class="card-header" style="background-color: #FFFFFF">
                            <p class="text-justify font-16 mt-3"> <?php echo $row['post_desc']?></p>
                        </div>
                        <div class="card-body" style="background-color: #DDDDDD">
                           <p class="text-center"><img src="../images/<?php echo $row['image']?>" class="img-fluid card-img-top" style="height: 350px; width: 350px;"></p>
                        </div>
                        <div class="card-footer" style="background-color: #F5F5F5">
                            <span><img src="../images/<?php echo $row['post_image']?>" style="height: 40px; width: 40px; border-radius: 50%"> <sup class="font-weight-bold ml-2" style="font-size: 19px;"> <?php echo $row['post_name']?> </sup></span>
                            <a href=""><span class="float-right" style="margin-right: 50px;"><i class="fas fa-comment-alt fa-2x" style="color: red"></i> <span style="font-size: 24px">4</span></span></a>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>


    <?php include 'mastaring/script.php';?>
</body>
</html>