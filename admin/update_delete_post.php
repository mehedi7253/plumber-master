<?php


session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.php');
}

include '../php/db_connect.php';



if(isset($_GET['update'])){
    $id = $_GET['update'];

    $sql = "SELECT * FROM hire_post WHERE id=$id";

    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($res);

}
if ($_POST) {
    $service     = $_POST['service'];
    $application = $_POST['application'];
    $post_date   = $_POST['post_date'];
    $post_end    = $_POST['post_end'];
    $vacancy     = $_POST['vacancy'];

    $sql = "UPDATE hire_post SET service = '$service',  application = '$application', post_date = '$post_date', post_end = '$post_end', vacancy = '$vacancy' WHERE id = $id";

    $res = mysqli_query($connect, $sql);


    header('Location: manage_post.php');
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM hire_post WHERE id = $id";

    $result = mysqli_query($connect, $sql);

    header('Location: manage_post.php');
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
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Service</label>
                                        <input type="text"  class="form-control" name="service" value="<?php echo $data['service'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label> Description: </label>
                                        <textarea name="application" class="form-control"><?php echo $data['application'];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Application Start Date </label>
                                        <input type="date" name="post_date" class="form-control" value="<?php echo $data['post_date'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Application End Date</label>
                                        <input type="date" name="post_end" class="form-control" value="<?php echo $data['post_end'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label> Total Vacancy</label>
                                        <input type="number" name="vacancy" class="form-control" value="<?php echo $data['vacancy'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <input type="submit" name="post_btn" class="btn btn-success col-5" value="Update">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <a class="float-right nav-link" href="manage_post.php">Back</a>
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
                    <span>Create By © Md. Mehedi Hasan</span>
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

