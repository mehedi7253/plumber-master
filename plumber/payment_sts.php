<?php

require_once '../php/config.php';

if (isset($_GET['p_sts'])){
    $p_sts = $_GET['p_sts']; // decleare variable

    $sql = "SELECT * FROM payment WHERE id='$p_sts'"; // select all students

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_object($result)){
        $status_var = $row->final;

        if ($status_var == '0'){
            $status_state = 1;
        }else{
            $status_state = 1;
        }
        $update = "UPDATE payment SET status = '$status_state' WHERE id = '$p_sts'";

        $res = mysqli_query($connect, $update);

        if ($res){
            header('Location: payment_status.php');
        }else{
            echo  mysqli_error($res);
        }
    }
}





?>