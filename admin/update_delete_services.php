<?php


session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.php');
}

include '../php/db_connect.php';



if(isset($_GET['update'])){
    $id = $_GET['update'];

    $sql = "SELECT * FROM services WHERE id=$id";

    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($res);

}
if ($_POST) {
    $name         = $_POST['name']; //decleare variable first_name and put it into post method
    $description  = $_POST['application']; //decleare variable last_name and put it into post method

    $sql = "UPDATE services SET name = '$name', application = '$description' WHERE id = $id";

    $res = mysqli_query($connect, $sql);


    header('Location: manage_service.php');
}


if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $sql = "DELETE FROM services WHERE id = $id";

    $result = mysqli_query($connect, $sql);

    header('Location: manage_service.php');
}
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
                <li class="breadcrumb-item active">Update Event</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add donor-->
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto mt-5 mb-5">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h2 class="text-center">Update Services</h2>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Service Title: </label>
                                        <input type="text" name="event_title" placeholder="Enter Event Titile.." hidden value="<?php echo $data['id'];?>" class="form-control">
                                        <input type="text" name="name" value="<?php echo $data['name'];?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Service Description: </label>
                                        <textarea name="application" class="form-control"><?php echo $data['application'];?></textarea>
                                    </div>
                                    <div  class="form-group">
                                        <button class="btn  btn-success col-4" type="submit" name="btn">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <a class="float-right nav-link" href="manage_service.php">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--            end add donor-->
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Create by@ Israt Jahan</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->


<?php include "front/footer.php";?>
<script>
    CKEDITOR.replace('application',
        {
            height:400,
            resize_enabled:true,
            wordcount: {
                showParagraphs: false,
                showWordCount: true,
                showCharCount: true,
                countSpacesAsChars: true,
                countHTML: false,

                maxCharCount: 20}
        });
</script>
</body>
</html>

