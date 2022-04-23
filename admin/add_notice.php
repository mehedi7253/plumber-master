
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
                    <a href="admin_dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add New Notice</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-8 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add New Notice</h1>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php
                                if (isset($_POST['btn'])){
                                    $title        = $_POST['title']; //decleare variable first_name and put it into post method
                                    $description  = $_POST['application']; //decleare variable last_name and put it into post method

                                    if ($title  == ""){
                                        echo "<span class='text-danger'>Enter Title</span> <br/>";
                                    }
                                    if ($description== ""){
                                        echo "<span class='text-danger'>Write Description <sup class='text-danger'>*</sup></span> <br/>";
                                    }



                                    if ($title && $description){
                                        $created = @date('Y-m-d H:i:s');
                                        $add_notice = "INSERT INTO notice (title, application, date) VALUES('$title', '$description', '$created')";
                                        $result = mysqli_query($connect, $add_notice);

                                        echo "<span class='text-success'>New Notice Add Successful</span>";
                                    }else{
                                        echo "<span class='text-danger'>New Notice Add Failed....!</span>";
                                    }



                                }
                                ?>
                            </p>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Notice Title: :<sup class="text-danger font-weight-bold"> * </sup>  </label>
                                    <input type="text" name="title" placeholder="Enter Title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Notice Description: :<sup class="text-danger font-weight-bold"> * </sup>  </label>
                                    <textarea name="application" placeholder="Enter Description" class="form-control"></textarea>
                                </div>
                                <div  class="form-group">
                                    <button class="btn  btn-success col-4" type="submit" name="btn">Add</button>
                                    <button class="btn btn-danger col-4" type="reset">Cancel</button>
                                </div>
                            </form>
                        </div>


                        <div class="card-footer">
                            <a href="admin_dashboard.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
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
