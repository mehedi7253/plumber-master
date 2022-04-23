
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
                <li class="breadcrumb-item active">Hire Plumber</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-10 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add New Post</h1>

                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <h4>
                                    <?php
                                        if (isset($_POST['post_btn'])){
                                            $service     = $_POST['service'];
                                            $application = $_POST['application'];
                                            $post_date   = $_POST['post_date'];
                                            $post_end    = $_POST['post_end'];
                                            $vacancy     = $_POST['vacancy'];

                                            if ($service == ""){
                                                echo"<span class='text-danger'> Please Select A Service <sup>**</sup></span> <br/>";
                                            }
                                            if ($application == ""){
                                                echo"<span class='text-danger'> Description Must Be Not Empty!! <sup>**</sup></span> <br/>";
                                            }
                                            if ($post_date == ""){
                                                echo"<span class='text-danger'> Post Date Must Be Not Empty!! <sup>**</sup></span> <br/>";
                                            }
                                            if ($post_end == ""){
                                                echo"<span class='text-danger'> Post End Date Must Be Not Empty!! <sup>**</sup></span> <br/>";
                                            }
                                            if ($vacancy == ""){
                                                echo"<span class='text-danger'> Vacancy Must Be Not Empty!! <sup>**</sup></span> <br/>";
                                            }

                                            if ($service && $application && $post_date && $post_end && $vacancy){
                                                $insert_data = "INSERT INTO hire_post (service, application, post_date, post_end, vacancy, status) VALUES ('$service', '$application', '$post_date', '$post_end', '$vacancy', '0')";
                                                $result      = mysqli_query($connect, $insert_data);

                                                echo "<span class='text-success'>New Post Create Successful</span> <br/>";
                                            }else{
                                                echo "<span class='text-danger'>New Post Create Failed...!!</span> <br/>";

                                            }
                                        }
                                    ?>
                                </h4>
                                <form action="" method="post" class="mt-3">
                                    <div class="form-group">
                                        <label>Select Service <sup class="text-danger font-weight-bold">**</sup></label>
                                        <select class="form-control" name="service">
                                            <option>-------Select One---------</option>
                                            <?php
                                                $get_service = "select * from services";
                                                $result = mysqli_query($connect, $get_service);
                                            ?>
                                            <?php
                                                while ($row = mysqli_fetch_assoc($result)){?>
                                                    <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Description <sup class="text-danger font-weight-bold">**</sup></label>
                                        <textarea class="form-control" name="application" placeholder="Write Hire Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Application Start Date <sup class="text-danger font-weight-bold">**</sup></label>
                                        <input type="date" name="post_date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Application End Date <sup class="text-danger font-weight-bold">**</sup></label>
                                        <input type="date" name="post_end" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label> Total Vacancy <sup class="text-danger font-weight-bold">**</sup></label>
                                        <input type="number" name="vacancy" class="form-control" placeholder="Enter Number Of Vacancy">
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <input type="submit" name="post_btn" class="btn btn-info col-5" value="Post Now">
                                    </div>
                                </form>
                            </div>
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
