
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
                <li class="breadcrumb-item active">Add New Plumber</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-11 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add New Plumber</h1>
                            <?php
                                $sql = "SELECT * FROM apply_plumber WHERE status = 1";
                                $result = mysqli_query($connect, $sql);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th> Serial</th>
                                        <th> Application ID</th>
                                        <th> Name</th>
                                        <th> Phone</th>
                                        <th> Email</th>
                                        <th> NID</th>
                                        <th>View</th>
                                    </tr>
                                    </thead>
                                    <?php $i =1; while ($row = $result->fetch_assoc()) {?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td> <?php echo $row['nid'];?></td>
                                            <td>
                                                <a href="add.php?app_id=<?php echo $row['id'];?>" class="nav-link"> Add Now</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    <?php }?>
                                </table>
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
