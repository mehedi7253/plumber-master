<?php

    require_once '../php/config.php';

    // check user login via session
    if(not_logged_in() === TRUE) {
        header('location: customer_login.php'); // redirect location
    }

    $userdata = getUserDataByUserId($_SESSION['c_id']);  //get all information by user id


    $userid = $userdata['c_id'];
    $postid = $_POST['postid'];
    $rating = $_POST['rating'];

    // Check entry within table
    $query = "SELECT COUNT(*) AS cntpost FROM post_rating WHERE postid=".$postid." and userid=".$userid;

    $result = mysqli_query($connect,$query);
    $fetchdata = mysqli_fetch_array($result);
    $count = $fetchdata['cntpost'];

    if($count == 0){
        $insertquery = "INSERT INTO post_rating(userid,postid,rating) values(".$userid.",".$postid.",".$rating.")";
        mysqli_query($connect,$insertquery);
    }else {
        $updatequery = "UPDATE post_rating SET rating=" . $rating . " where userid=" . $userid . " and postid=" . $postid;
        mysqli_query($connect,$updatequery);

    }


    // get average
    $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=".$postid;
    $result = mysqli_query($connect,$query) or die(mysqli_error());
    $fetchAverage = mysqli_fetch_array($result);
    $averageRating = $fetchAverage['averageRating'];

    $return_arr = array("averageRating"=>$averageRating);

    echo json_encode($return_arr);