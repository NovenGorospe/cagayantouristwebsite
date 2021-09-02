<!DOCTYPE html>
<html>
<head>
    <title></title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
   
        #map {
  width:570px;
  height:480px;
}
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
     #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
        z-index: 1050 !important;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

  </style>
</head>
<body>


    <!-- Delete -->
        <div class="modal fade" id="del<?php echo $row['spot_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                    </div>
                    <div class="modal-body">
                    <?php
                      include('config.php');
                        $del=mysqli_query($dbconnect,"select * from spots where id='".$row['id']."'");
                        $drow=mysqli_fetch_array($del);
                    ?>
                    <div class="container-fluid">
                        <h5>Spot Name: <strong><?php echo $drow['spot']; ?></strong></h5> 
                         <h5>Place: <strong><?php echo $drow['location']; ?></strong></h5> 
                          <h5>Description: <strong><?php echo $drow['des']; ?></strong></h5> 
                    </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="php/delSpot.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>
     
                </div>
            </div>
        </div>
    <!-- /.modal -->
     
    <!-- Edit -->
        <div class="modal fade" id="edit<?php echo $row['spot_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                    </div>
                    <div class="modal-body">
                    <?php
                    include('config.php');
                  
                        $edit=mysqli_query($dbconnect,"select * from spots where spot_id='".$id);
                        $row=mysqli_fetch_array($edit);
                    ?>
                    <div class="container-fluid">
                    <form method="POST" action="../update.php?id=<?php echo $erow['spot_id']; ?>">
                            <div class="row">
                        <div class="col-lg-3">
                            <label class="control-label" style="position:relative; top:7px;">Tousist Spot:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="spot" value="<?php echo $erow['spot']; ?>">
                        </div>
                    </div>
                    <div></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="control-label" style="position:relative; top:7px;">Description:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" style="height: 80px;" name="des" value="<?php echo $erow['des']; ?>"></input> 
                        </div>
                    </div>
                    <div class="col-lg-3">
                            <label class="control-label" style="position:relative; top:7px;">Type:</label>
                           <select class="form-control" id="types" name="types"  placeholder="Type" >
                              
                                    <?php
                                    include ('config.php');
                                    $sql="SELECT * from types";
                                    $q=mysqli_query($dbconnect,$sql);
                                    while ($row=mysqli_fetch_assoc($q)) {
                                    echo"<option value='".$row['type_id']."'>".$row['type']."</option>";
                                      }
                                      ?>
                            </select> 
                    </div>
                    <div style="height:10px;"></div>
          
                    <div class="row">
                         <input type="hidden" name="lat" id="lat" >
                            <input type="hidden" name="lng" id="lng" >
                            <input type="hidden" name="location" id="location" >

                              <input id="pac-input" class="controls" type="text"
                          placeholder="Enter a location" value="<?php echo $erow['location']; ?>">
                      <div id="type-selector" class="controls">
                        <input type="radio" name="type" id="changetype-all" checked="checked">
                        <label for="changetype-all">All</label>
                      </div>
                            <div id="map"></div>
                    </div>

                    </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- /.modal -->
     <script>
          // This example requires the Places library. Include the libraries=places
          // parameter when you first load the API. For example:
          // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

          function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 17.6132, lng: 121.7270},
              zoom: 8
            });
            var input = /** @type {!HTMLInputElement} */(
                document.getElementById('pac-input'));

            var types = document.getElementById('type-selector');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
              map: map,
              anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function() {
              infowindow.close();
              marker.setVisible(false);
              var place = autocomplete.getPlace();
              if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
              }

              // If the place has a geometry, then present it on a map.
              if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
              } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
              }
              marker.setIcon(/** @type {google.maps.Icon} */({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
              }));
              marker.setPosition(place.geometry.location);
              marker.setVisible(true);
    var item_Lat =place.geometry.location.lat();
    var item_Lng= place.geometry.location.lng();
    var item_Location = place.formatted_address;
    //alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
    $("#lat").val(item_Lat);
    $("#lng").val(item_Lng);
    $("#location").val(item_Location);



              var address = '';
              if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
              }

              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
              infowindow.open(map, marker);
            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
              var radioButton = document.getElementById(id);
              radioButton.addEventListener('click', function() {
                autocomplete.setTypes(types);
              });
            }

            setupClickListener('changetype-all', []);
            setupClickListener('changetype-address', ['address']);
            setupClickListener('changetype-establishment', ['establishment']);
            setupClickListener('changetype-geocode', ['geocode']);
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR5PFyvraK8Cqbu-vQu7UAR-NkcABHNuw&libraries=places&callback=initMap"
            async defer></script>
</body>
</html>