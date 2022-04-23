
    <?php
    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }

    require_once '../php/db_connect.php';

?>


        <?php
        if (isset($_GET['id'])){
            $id = $_GET['id'];

            $q = "SELECT * FROM plumbers WHERE id = $id";

            $r = mysqli_query($connect, $q);
            $data = mysqli_fetch_assoc($r);

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
                    <a href="admin_dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Plumber Profile</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="col-md-4 col-sm-12 float-left">
                        <div class="mt-5">
                            <center class="m-t-30"> <img src="../images/<?php echo $data['image'];?>" title="<?php echo $data['first_name'];?>" class="rounded-circle" width="250" height="250" /><br/>
                                <h4 class="card-title m-t-10 mt-5 text-capitalize">Name: <?php echo $data['first_name'];?> <span><?php echo $data['last_name'];?></span></h4>
                                <h3>Email: <?php echo $data['username']; ?></h3>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 float-left">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Gender  </th>
                                        <td class="font-weight-bold"><?php echo $data['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Service  </th>
                                        <td class="font-weight-bold"><?php echo $data['service']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address  </th>
                                        <td class="font-weight-bold"><?php echo $data['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number  </th>
                                        <td class="font-weight-bold"><?php echo $data['contact']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Join Date  </th>
                                        <td class="font-weight-bold"><?php echo date('Y. M. D', strtotime($data['date']));?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Work  </th>
                                        <td class="font-weight-bold">
                                            <?php
                                            if (isset($_SESSION['id'])){
                                                $id = $_SESSION['id'];

                                                $sql = "SELECT * FROM booking WHERE plumberID = $id";
                                                $fetchs = mysqli_query($connect, $sql);
                                            }


                                            $get_total_work = "SELECT DISTINCT (COUNT(p_email)) as NOE FROM booking b WHERE $id=b.plumberID";

                                            $result_work = mysqli_query($connect, $get_total_work);


                                            ?>
                                            <?php while ($r = mysqli_fetch_assoc($result_work)){?>

                                                <span><?php echo $r['NOE']?></span>
                                            <?php }?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Avarage Rating</th>
                                        <td class="font-weight-bold">
                                            <div class="content">

                                                <?php
                                                $userid = $data['id'];

                                                $sql = "SELECT * FROM plumbers WHERE id = $userid";
                                                $result = mysqli_query($connect, $sql);

                                                while($row = mysqli_fetch_array($result)){
                                                    $postid = $row['id'];
                                                    $title = $row['first_name'];
                                                    $content = $row['username'];


                                                    // get average
                                                    $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=".$postid;
                                                    $avgresult = mysqli_query($connect,$query) or die(mysqli_error());
                                                    $fetchAverage = mysqli_fetch_array($avgresult);
                                                    $averageRating = $fetchAverage['averageRating'];

                                                    if($averageRating <= 0){
                                                        $averageRating = "No rating yet.";
                                                    }
                                                    ?>


                                                    <span id='avgrating_<?php echo $postid; ?>'><?php echo $averageRating; ?></span>

                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
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
