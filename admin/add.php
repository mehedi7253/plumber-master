
<?php
session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.php');
}

require_once '../php/db_connect.php';
require_once '../php/plumber.php';

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
                <li class="breadcrumb-item active">Add New Plumber</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-10 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add New Plumber</h1>
                            <?php
                                if (isset($_GET['app_id'])){
                                    $id = $_GET['app_id'];

                                    $sql = "SELECT * FROM apply_plumber WHERE id = $id";
                                    $result = mysqli_query($connect, $sql);

                                    $app_data = mysqli_fetch_assoc($result);
                                }



                            ?>
                        </div>
                        <div class="card-body">
                            <h5 class="ml-3 mb-5">
                                <?php
                                if($_POST) {
                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $username = $_POST['username'];
                                    $nid = $_POST['nid'];
                                    $service = $_POST['service'];
                                    $password = $_POST['password'];
                                    $cpassword  = $_POST['cpassword'];

                                    //check first name is required
                                    if ($fname == "") {
                                        echo "<br/><br/><span class='text-danger'> First Name is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }

                                    //check last name is required
                                    if ($lname == "") {
                                        echo "<span class='text-danger'> Last Name is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }

                                    //check email is required
                                    if ($username == "") {
                                        echo "<span class='text-danger'> Email is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    //check address is required

                                    if ($service == "") {
                                        echo "<span class='text-danger'>Select Service <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    //check address is required
                                    if ($nid == "") {
                                        echo "<span class='text-danger'> NID is Required (Must Be Bangladeshi) <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    //check gender is required

                                    if ($password == "") {
                                        echo "<span class='text-danger'> Password is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }
                                    if($cpassword == "") {
                                        echo "<span class='text-danger'> Confirm Password is Required <sup class='font-weight-bold'>*</sup></span> <br/>";
                                    }


                                    //check all information..if all information is coorectly input then data will be insert into database. other wise not.
                                    if ($fname && $lname && $username && $service && $nid && $password && $cpassword) {

                                        if($password == $cpassword) {
                                            if(userExists($username) === TRUE) {
                                                echo $_POST['username'] . "<span class='text-danger'> already exists !!</span>";
                                            } else {
                                                if(registerUser() === TRUE) {
                                                    echo "<h1 class='text-success'>Successfully Added</h1><br/>";
                                                } else {
                                                    echo "<span class='text-danger'>Failed To Added</span>";
                                                }
                                            }
                                        } else {
                                            echo "<span class='text-danger'>  Password does not match with Conform Password <sup class='font-weight-bold'>*</sup></span>";
                                        }
                                    }
                                }

                                ?>
                            </h5>
                            <form action="" method="post">
                                <div class="form-group input-group col-md-6 col-sm-12 float-left">
                                    <div class="input-group-prepend">
                                         <span class="input-group-text"> First Name </span>
                                    </div>
                                    <input type="text" name="fname" id="firstName" placeholder="First Name" autocomplete="off" class="form-control" value="<?php echo $app_data['first_name'];?>">
                                </div>

                                <div  class="form-group input-group col-md-6 col-sm-12 float-left">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> Last Name</span>
                                    </div>
                                    <input type="text" name="lname" id="lastName" placeholder="Last Name" autocomplete="off" class="form-control" value="<?php echo $app_data['last_name'];?>">
                                </div>

                                <div  class="form-group input-group col-md-6 col-sm-12 float-left">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 99px"> Email</span>
                                    </div>
                                    <input type="email" name="username" id="email" placeholder="Email" autocomplete="off" class="form-control" value="<?php echo $app_data['email'];?>"/>
                                </div>

                                <div  class="form-group input-group col-md-6 col-sm-12 float-left">
                                    <div class="input-group-prepend">
                                         <span class="input-group-text" style="width: 99px"> NID </span>
                                    </div>
                                    <input type="text" name="nid" id="nid" placeholder="NID Number (Must Be Bangladesh Format)"  class="form-control" autocomplete="off" value="<?php echo $app_data['nid'];?>"/>
                                </div>

                                <div  class="form-group input-group col-md-6 col-sm-12 float-left">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" style="width: 99px"> Service </span>
                                    </div>
                                    <input type="text" name="service" autocomplete="off" class="form-control" value="<?php echo $app_data['service'];?>">
                                </div>
                                <div  class="form-group">
                                    <input type="password" name="password" id="password" hidden value="123"  class="form-control mt-2" autocomplete="off" />
                                </div>

                                <div  class="form-group">
                                    <input type="password" name="cpassword" hidden value="123" class="form-control" autocomplete="off" />
                                </div>

                                <div  class="form-group">
                                    <button class="btn  btn-success col-5 ml-3" type="submit">Submit</button>
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
