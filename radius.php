<!DOCTYPE html>
<html>
  <head>

<title>Cagayan Tourist Spot</title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  <?php
        include ('config.php');
        $id=$_GET['y'];
            $query = mysqli_query($dbconnect,"select * from spots where spot_id=".$id);
            while ($data = mysqli_fetch_array($query))
            {
                $spot = $data['spot'];
                $lat = $data['lat'];
                $lng = $data['lng'];
                $loc = $data['location'];
                $des = $data['des'];
                               
                  
            
          ?>

    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var infowindow;

      function initMap() 



      {
       
        var pyrmont = {lat:<?php echo $data['lat'] ?> , lng:<?php echo $data['lng'] ?>};

        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 16
        });

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

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: pyrmont,
          radius: 400,
          type: ['lodging']
        }, callback);
      }

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
    </script>
<?php } ?>
  </head>
  <body onload="initMap()">
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTj2-cr1r7mlgpiKwraxjffia-s_pbxRo&libraries=places&callback=initMap" async defer></script>
  </body>
</html>