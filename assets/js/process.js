/**
 * Created by ASUS on 12/3/2019.
 */
$(document).ready(function(){
    DisplayData();

    $('#search').on('click', function(){
        if($('#search_data').val() == ""){
            alert("Please enter something first!");
        }else{
            var process = $('#search_data').val();
            var loader = $('<tr ><td colspan = "12"><center>Loading....</center></td></tr>');
            $('#data').empty();
            loader.appendTo('#data');

            setTimeout(function(){
                loader.remove();
                $.ajax({
                    url: 'process_list.php',
                    type: 'POST',
                    data: {
                        process: process
                    },
                    success: function(data){
                        $('#data').html(data);
                    }
                });

            }, 3000);
        }
    });

    $('#refresh').on('click', function(){
        DisplayData();
    });


    function DisplayData(){
        $.ajax({
            url: 'data.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(data){
                $('#data').html(data);
            }
        });
    }
});