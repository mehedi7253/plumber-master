
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
                <li class="breadcrumb-item active">Add New Services</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-10 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Create New Service</h1>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php
                                if (isset($_POST['btn'])){
                                    $name         = $_POST['name']; //decleare variable first_name and put it into post method
                                    $title        = $_POST['title'];  //decleare variable last_name and put it into post method
                                    $description  = $_POST['application']; //decleare variable last_name and put it into post method
                                    $image        = $_FILES['image']['name']; //decleare variable last_name and put it into post method



                                    //check first name is required
                                    if ($name == ""){
                                        echo "<span class='text-danger'>Enter Name <sup class='text-danger'>*</sup></span> <br/>";
                                    }

                                    if ($title  == ""){
                                        echo "<span class='text-danger'>Enter Title</span> <br/>";
                                    }
                                    if ($description== ""){
                                        echo "<span class='text-danger'>Write Description <sup class='text-danger'>*</sup></span> <br/>";
                                    }
                                    if ($image == ""){
                                        echo "<span class='text-danger'>Chose an Image <sup class='text-danger'>*</sup></span> <br/>";
                                    }


                                    if ($name && $title && $description && $image){
                                        $fileinfo = PATHINFO($_FILES['image']['name']);
                                        $newFile = $fileinfo['filename']. "." . $fileinfo['extension'];
                                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/" .$newFile);
                                        $location = $newFile;

                                        $add_services = "INSERT INTO services (name, title, application, image) VALUES('$name', '$title', '$description', '$image')";
                                        $result = mysqli_query($connect, $add_services);

                                        echo "<span class='text-success'>New Service Create Successful</span>";
                                    }else{
                                        echo "<span class='text-danger'>New Service Create Failed....!</span>";
                                    }



                                }
                                ?>
                            </p>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Service name :<sup class="text-danger font-weight-bold"> * </sup> </label>
                                    <input type="text" name="name" placeholder="Enter Service Name.." class="form-control" value="<?php if($_POST) {
                                        echo $_POST['name'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label>Service Title: :<sup class="text-danger font-weight-bold"> * </sup>  </label>
                                    <input type="text" name="title" placeholder="Enter Title" class="form-control" value="<?php if($_POST) {
                                        echo $_POST['title'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label>Service Description: :<sup class="text-danger font-weight-bold"> * </sup>  </label>
                                    <textarea name="application" placeholder="Enter Description" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label><span class="text-danger font-weight-bold">*</span>Select an Image: </label>
                                    <input type="file" name="image" class="form-control">
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
