
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
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Message List</h3>
                            <?php
                                $count = 0;
                                $view_message = "SELECT id, message, name, image, m_id, m_name, status = 0, COUNT(m_id) FROM chating GROUP BY m_name HAVING COUNT(m_id) > 1";
                                $res = mysqli_query($connect, $view_message);


                                 $count = mysqli_num_rows($res);

                                $sql="UPDATE chating SET status=1 WHERE status=0";
                                $result=mysqli_query($connect, $sql);
                            ?>
                        </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Reply</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td id="notification-icon" aria-haspopup="true" aria-expanded="false" name="button" onclick="myFunction()"><?php echo $row['m_name'];?> <sup class="text-danger" id="" ><?php if($count>0) { echo $count; }?> New message</sup></td>
                                            <td>
                                                <a href="reply.php?reply=<?php echo $row['m_id']?>">Reply</a>
                                            </td>
                                        </tr>
                                  <?php }?>
                                  </tbody>
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
