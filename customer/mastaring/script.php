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
<script src="../assets/js/valid.js"></script>
<script src="../assets/js/main.js"></script>

<script src="../assets/jquery-3.0.0.js" type="text/javascript"></script>
<script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
<script src="../assets/js/awesomechart.js"></script>

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


<script>
      $(function() {
        $("#payble, #discount").on("keydown keyup", disc);
        function disc() {
            $("#disc").val(Number($("#payble").val()) -  Number($("#discount").val()));
        }
    });

  $(function() {
      $("#payble_bks, #discount_bks").on("keydown keyup", disc_bks);
      function disc_bks() {
          $("#disc_bks").val(Number($("#payble_bks").val()) -  Number($("#discount_bks").val()));
      }
  });

</script>



<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw">
</script>

</body>

</html>