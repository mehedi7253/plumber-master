<script src="front_template/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="front_template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="front_template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="front_template/dist/js/app-style-switcher.js"></script>
<!--Wave Effects -->
<script src="front_template/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="front_template/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="front_template/dist/js/custom.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="front_template/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="front_template/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="front_template/dist/js/pages/dashboards/dashboard1.js"></script>

<script src="../assets/js/script.js"></script>
<script src="../assets/jquery-3.0.0.js" type="text/javascript"></script>
<script src="../assets/js/awesomechart.js"></script>
<script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('.rating').barrating({
            theme: 'fontawesome-stars',
            onSelect: function(value, text, event) {

                // Get element id by data-id attribute
                var el = this;
                var el_id = el.$elem.data('id');

                // rating was selected by a user
                if (typeof(event) !== 'undefined') {

                    var split_id = el_id.split("_");

                    var postid = split_id[1];  // postid

                    // AJAX Request
                    $.ajax({
                        url: 'rating_ajax.php',
                        type: 'post',
                        data: {postid:postid,rating:value},
                        dataType: 'json',
                        success: function(data){
                            // Update average
                            var average = data['averageRating'];
                            $('#avgrating_'+postid).text(average);
                        }
                    });
                }
            }
        });
    });

</script>


<script>
    $(function() {
        $("#hour_rate, #hour").on("keydown keyup", total);
        function total() {
            $("#total").val(Number($("#hour_rate").val()) * Number($("#hour").val()));
        }
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

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw">
</script>

</body>

</html>