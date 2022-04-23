
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
                <li class="breadcrumb-item active">Report List</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 col-sm-12 mt-5">
                    <div class="col-md-6 col-sm-12 float-left">
                        <div class="card-body" style="background-color: rgba(255,214,254,0.31)">
                            <?php
                                $sql = "SELECT * FROM report";
                                $result = mysqli_query($connect, $sql);
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Plumber Name</th>
                                        <th>Issue</th>
                                        <th>Description</th>
                                    </tr>
                                    <?php while ($row = $result->fetch_assoc()) {?>
                                        <tr>
                                            <td><?php echo $row['p_name']; ?></td>
                                            <td><?php echo $row['issue']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 float-left">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Search Plumber</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Find Plumber: </label>
                                        <input type="text" id="search_data" class="col-6 ml-2"  placeholder="Search By Plumber Name..."/>
                                        <button type="button" id="search" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                                    </div>
                                </form>
                                <br /><br />
                                <table class="table table-bordered">
                                    <thead class="alert-success">
                                    <tr>
                                        <th>Plumber Name</th>
                                        <th>Service</th>
                                        <th>Action</th>
                                        <th>Profile</th>
                                    </tr>
                                    </thead>
                                    <tbody class="alert-warning" id="data"></tbody>
                                </table>

                            </div>
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
