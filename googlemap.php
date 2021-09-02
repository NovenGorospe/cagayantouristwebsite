<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cagayan Tourist Website</title>
    
      <script src='bootstrap-3.3.7-dist/js/jquery-1.10.1.min.js'></script>       
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZG8szpZ4eQbaryhm1Ti_D0l1QXhkabag&callback=initMap">
    </script>
    <script>
        
    var marker;
      function initialize() {
        var infoWindow = new google.maps.InfoWindow;
        
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
 
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var bounds = new google.maps.LatLngBounds();

        // Retrieve data from database
        <?php
        include ('config.php');
            $query = mysqli_query($dbconnect,"select * from spots");
            while ($data = mysqli_fetch_array($query))
            {
                $spot = $data['spot'];
                $lat = $data['lat'];
                $lng = $data['lng'];
                $loc = $data['location'];
                $des = $data['des'];
                
                
                echo ("addMarker($lat, $lng, '<b>$spot</b>' );\n");                        
            }
          ?>
          
        // Proses of making marker 
        function addMarker(lat, lng, info) {
            var location = new google.maps.LatLng(lat, lng);
            bounds.extend(location);
            var marker = new google.maps.Marker({
                map: map,
                position: location
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Displays information on markers that are clicked
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
        

 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
    </script>
    
</head>
<body onload="initialize()">

<!-- <div class="container" style="margin-top:10px">  -->
 <div id="map-canvas" style="width:auto; height: 450px;"></div>
    <!-- <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
              
                    <div class="panel-body">
                       
                    </div>  
            </div>
        </div>  
    </div> -->
<!-- </div>   -->
</body>

</html>
