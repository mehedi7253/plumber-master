<?php

//connect with database
require_once '../php/config.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: customer_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['c_id']);  //get all information by user id

?>


<?php include 'mastaring/top_header.php'?>
<!--top header-->

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <?php include "mastaring/nav.php";?>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->

    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <?php include "mastaring/side_bar.php";?>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->


    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="customer_dasboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Book Plumber</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->




        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Search And Book Plumber</h3>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 float-left">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Find Service: </label>

                                        <input type="text" id="search_data" class="col-8 ml-2"  placeholder="Search Service Or Location..."/>
                                        <button type="button" id="search" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                                        <button type="button" id="refresh" class="btn btn-success"><i class="fas fa-redo-alt"></i></button>
                                    </div>
                                </form>
                                <br /><br />
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="alert-success">
                                        <tr>
                                            <th>Plumber</th>
                                            <th>Service</th>
                                            <th>Address</th>
                                            <th>Available Time</th>
                                            <th>Service Charge</th>
                                            <th>Book</th>
                                            <th>Profile</th>
                                        </tr>
                                        </thead>
                                        <tbody id="data"></tbody>
                                    </table>
                                </div>
                            </div>
<!--                            <div class="card-footer">-->
<!--                                <a href="validation.php" target="_blank" class="float-right">Check Plumber Validity</a>-->
<!--                            </div>-->
                        </div>
                        <div class="card-body">
                                <?php
                                include '../php/locations_model.php';
                                ?>
                                <div id="map" style="height: 400px; border: 1px solid blue"></div>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 float-left">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Our Services</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "select * from services";
                                $res = mysqli_query($connect, $sql);
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <?php $i=1;
                                        while ($row = mysqli_fetch_assoc($res)){?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                            </tr>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- footer -->
        <!-- ============================================================== -->
        <?php include 'mastaring/footer.php'?>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php include 'mastaring/script.php'?>
<script>
    /**
     * Create new map
     */
    var infowindow;
    var map;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
    var locations = <?php get_confirmed_locations() ?>;
    var myOptions = {
        zoom: 12,
        center: new google.maps.LatLng(23.777176, 90.399452),
        mapTypeId: 'roadmap'
    };
    map = new google.maps.Map(document.getElementById('map'), myOptions);
    var markers = {};
    var getMarkerUniqueId= function(lat, lng) {
        return lat + '_' + lng;
    };

    var getLatLng = function(lat, lng) {
        return new google.maps.LatLng(lat, lng);
    };

//    var addMarker = google.maps.event.addListener(map, 'click', function(e) {
//        var lat = e.latLng.lat(); // lat of clicked point
//        var lng = e.latLng.lng(); // lng of clicked point
//        var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
//        var marker = new google.maps.Marker({
//            position: getLatLng(lat, lng),
//            map: map,
//            animation: google.maps.Animation.DROP,
//            id: 'marker_' + markerId,
//            html: "    <div id='info_"+markerId+"'>\n" +
//            "        <table class=\"map1\">\n" +
//            "            <tr>\n" +
//            "                <td><a>Service:</a></td>\n" +
//            "                <td><textarea  id='manual_description' placeholder='Description'></textarea></td></tr>\n" +
//            "            <tr><td></td><td><input type='button' value='Save' onclick='saveData("+lat+","+lng+")'/></td></tr>\n" +
//            "        </table>\n" +
//            "    </div>"
//        });
//        markers[markerId] = marker; // cache marker in markers object
//        bindMarkerEvents(marker); // bind right click event to marker
//        bindMarkerinfo(marker); // bind infowindow with click event to marker
//    });

    var bindMarkerinfo = function(marker) {
        google.maps.event.addListener(marker, "click", function (point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            infowindow = new google.maps.InfoWindow();
            infowindow.setContent(marker.html);
            infowindow.open(map, marker);
            // removeMarker(marker, markerId); // remove it
        });
    };

    var bindMarkerEvents = function(marker) {
        google.maps.event.addListener(marker, "rightclick", function (point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            removeMarker(marker, markerId); // remove it
        });
    };

    var removeMarker = function(marker, markerId) {
        marker.setMap(null); // set markers setMap to null to remove it from map
        delete markers[markerId]; // delete marker instance from markers object
    };

    var i ; var confirmed = 0;
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
            html: "<div>\n" +
            "<table class=\"map1\">\n" +
            "<tr>\n" +
            "<td><a>Service:</a></td>\n" +
            "<td><textarea disabled id='manual_description' placeholder='Service'>"+locations[i][3]+"</textarea></td></tr>\n" +
            "</table>\n" +
            "</div>"
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow = new google.maps.InfoWindow();
                confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
                $("#confirmed").prop(confirmed,locations[i][4]);
                $("#id").val(locations[i][0]);
                $("#description").val(locations[i][3]);
                $("#form").show();
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }


</script>