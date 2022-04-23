
<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }

    require_once '../php/db_connect.php';



    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM message WHERE id = $id";
        $res = mysqli_query($connect, $sql);

        header('Location:check_message.php');
    }

?>