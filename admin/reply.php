
<?php
session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.php');
}

require_once '../php/db_connect.php';

?>






<?php include "front/header.php"; ?>

<body id="page-top">

<?php include "front/nav.php";?>



<div id="wrapper">
    <?php include "front/sidebar.php";?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Chat Box</li>
            </ol>

            <!-- Icon Cards-->
            <div class="container-fluid">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Well Come To Chat box</h3>
                        </div>
                        <div class="card-body" style="margin: 5px; padding: 5px; height: 400px; overflow: auto;">
                            <p>
                                <?php
                                if (isset($_GET['reply'])){
                                    $id = $_GET['reply'];

                                    $view_message = "SELECT * FROM chating WHERE m_id = $id";
                                    $res = mysqli_query($connect, $view_message);

                                    $repy_msg = mysqli_fetch_assoc($res);
                                }



                                ?>
                            </p>
                            <?php while ($row = mysqli_fetch_assoc($res)){?>

                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <img src="../images/<?php echo $row['name'];?>" style="height: 50px; width: 50px; border-radius: 50%;">  </span>
                                    </div>
                                    <input class="font-weight-bold form-control"  disabled style="height: 64px; border-radius: 15px; margin-left: 8px;" value="<?php echo $row['message'];?>">
                                </div>
                                <p class="text-muted float-right" style="font-size: 9px"><?php echo $row['date'];?></p>
                            <?php }?>
                        </div>
                        <div class="card-footer">
                            <h1 class="text-danger">
                                <?php
                                if (isset($_POST['btn'])){
                                    $msg = $_POST['message'];
                                    $name = $_POST['name'];
                                    $m_id   = $_POST['m_id'];
                                    $m_name = $_POST['m_name'];

                                    $created = @date('Y-m-d H:i:s');
                                    $sql = "INSERT INTO chating (message, m_name, name, m_id, date) VALUES ('$msg','$m_name', '$name','$m_id', '$created')";
                                    $result = mysqli_query($connect, $sql);


//                                    header('Location: replly.php');
                                    echo "<script>document.location.href='chat_box.php'</script>";
                                }
                                ?>
                            </h1>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div  class="form-group input-group">
                                    <input type="text" name="message" placeholder="Write Message...." class="form-control">

                                    <input type="text" name="m_id"  hidden value="<?php echo $repy_msg['m_id'];?>" class="form-control">
                                    <input type="text" name="m_name" hidden value="<?php echo $repy_msg['m_name'];?>" class="form-control">

                                    <input type="text" name="name"  value="admin.jpg" hidden class="form-control">

                                    <div class="input-group-prepend">
                                        <button type="submit" name="btn" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Create By © Md. Mehedi Hasan</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->


<?php include "front/footer.php";?>
</body>
</html>
