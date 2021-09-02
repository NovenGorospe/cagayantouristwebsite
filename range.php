<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
   <title>Cagayan Tourist Spot</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        right: 5px;
        top: 60%;
        margin-top: -195px;
        height: 330px;
        width: 200px;
        padding: 5px;
        z-index: 5;
        border: 1px solid #999;
        background: #fff;
      }
      h2 {
        font-size: 22px;
        margin: 0 0 5px 0;
      }
      ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        height: 271px;
        width: 200px;
        overflow-y: scroll;
      }
      li {
        background-color: #f1f1f1;
        padding: 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
      }
      li:nth-child(odd) {
        background-color: #fcfcfc;
      }
      #more {
        width: 100%;
        margin: 5px 0 0 0;
      }
    </style>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;

      function initMap() {
        // Create the map.

        var pyrmont = {lat: 17.6132, lng: 121.7270};
        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 17
        });

        // Create the places service.
        var service = new google.maps.places.PlacesService(map);
        var getNextPage = null;
        var moreButton = document.getElementById('more');
        moreButton.onclick = function() {
          moreButton.disabled = true;
          if (getNextPage) getNextPage();
        };
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
                
                echo ("addMarker($lat, $lng, '<b>$spot</b>');\n");                        
            }
          ?>
          

        // Perform a nearby search.
        service.nearbySearch(
            {location: pyrmont, radius: 500, type: ['hotel']},
            function(results, status, pagination) {
              if (status !== 'OK') return;

              createMarkers(results);
              moreButton.disabled = !pagination.hasNextPage;
              getNextPage = pagination.hasNextPage && function() {
                pagination.nextPage();
              };
            });
      }

      function createMarkers(places) {
        var bounds = new google.maps.LatLngBounds();
        var placesList = document.getElementById('places');

        for (var i = 0, place; place = places[i]; i++) {
          var image = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          var marker = new google.maps.Marker({
            map: map,
            icon: image,
            title: place.name,
            position: place.geometry.location
          });

          var li = document.createElement('li');
          li.textContent = place.name;
          placesList.appendChild(li);

          bounds.extend(place.geometry.location);
        }
        map.fitBounds(bounds);
      }
    </script>
  </head>
  <body>
    <div id="map"></div>
    <div id="right-panel">
      <h2>Results</h2>
      <ul id="places"></ul>
      <button id="more">More results</button>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOS5lkVzX7NUr7peU05g6DLlzixjulJq4&libraries=places&callback=initMap" async defer></script>
  </body>
</html>