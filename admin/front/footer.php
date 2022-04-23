
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="admin_login.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="../assets/js/script.js"></script>


<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<script src="js/awesomechart.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>

<script src="../assets/datatables/datatables.min.js"></script>
<script src="../assets/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/datatables/export-tables/dataTables.buttons.min.js"></script>
<script src="../assets/datatables/export-tables/buttons.flash.min.js"></script>
<script src="../assets/datatables/export-tables/jszip.min.js"></script>
<script src="../assets/datatables/export-tables/pdfmake.min.js"></script>
<script src="../assets/datatables/export-tables/vfs_fonts.js"></script>
<script src="../assets/datatables/export-tables/buttons.print.min.js"></script>
<script src="../assets/js/page/datatables.js"></script>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script type="text/javascript">

    function myFunction() {
        $.ajax({
            url: "view_notification.php",
            type: "POST",
            processData:false,
            success: function(data){
                $("#notification-count").remove();
                $("#notification-latest").show();$("#notification-latest").html(data);
            },
            error: function(){}
        });
    }

    $(document).ready(function() {
        $('body').click(function(e){
            if ( e.target.id != 'notification-icon'){
                $("#notification-latest").hide();
            }
        });
    });

</script>
<script type="application/javascript">
    $(document).ready(function () {

        $('#prntPSS').click(function() {
            var printContents = $('#mainFrame').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });

    });
</script>

