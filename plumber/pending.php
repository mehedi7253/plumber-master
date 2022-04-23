<?php

require_once '../php/db_connect.php';

if (isset($_GET['pending'])){
    $pending1 = $_GET['pending']; // decleare variable

    $sql = "SELECT * FROM booking WHERE id='$pending1'"; // select all students

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_object($result)){
        $status_var = $row->process;

        if ($status_var == '0'){
            $status_state = 1;
        }else{
            $status_state = 0;
        }
        $update = "UPDATE booking SET process = '$status_state' WHERE id = '$pending1'";

        $res = mysqli_query($connect, $update);

        if ($res){
            header('Location: booking_list.php');
        }else{
            echo  mysqli_error($res);
        }
    }
}

?>