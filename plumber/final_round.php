<?php

require_once '../php/config.php';

if (isset($_GET['final_round'])){
    $final_round1 = $_GET['final_round']; // decleare variable

    $sql = "SELECT * FROM booking WHERE id='$final_round1'"; // select all students

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_object($result)){
        $status_var = $row->final;

        if ($status_var == '0'){
            $status_state = 1;
        }else{
            $status_state = 1;
            $status_state = 2;
        }
        $update = "UPDATE booking SET final = '$status_state' WHERE id = '$final_round1'";

        $res = mysqli_query($connect, $update);

        if ($res){
            header('Location: booking_list.php');
        }else{
            echo  mysqli_error($res);
        }
    }
}

?>