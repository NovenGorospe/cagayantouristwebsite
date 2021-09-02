<!DOCTYPE html>
<html>
<head>
  <title>Cagayan Tourist Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="map/map.js"></script>
  <!--bootstrap-->
    <!-- css print -->
   <!-- PAGE LEVEL SCRIPTS -->
  
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
        #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 1px;
    width: 120px;
    height: 45px;
   }


  </style>
</head>
<body>
<!-- Add New -->
    <div class="modal fade" id="add_spot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
        <form method="POST" action="insert/add_new.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-2">
                  <label class="control-label" style="position:relative; top:7px;">Tourist Spot:</label>
                </div>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="spot">
                </div>
              </div>
              <div style="height:10px;"></div>
              <div class="row">
                <div class="col-lg-2">
                  <label class="control-label" style="position:relative; top:7px;">Descrition:</label>
                </div>
                <div class="col-lg-10">
                 <textarea  class="form-control" name="des"></textarea>
                </div>
              </div>
              <div style="height:10px;"></div>


              <div class="row">
              <div class="col-lg-2">
             <label class="control-label" style="position:relative; top:7px;">Type:</label>
           </div>
            <div class="col-lg-10">
                           <select  class="form-control" id="types" name="types"  placeholder="Type">
                               <option value="" selected> Select Type </option>
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
                              </div>
                              
                   <div style="height:10px;"></div>

                <div class="row">
                          <div class="col-lg-2">
                              <label class="control-label" style="position:relative; top:7px;">Image:</label>
                          </div>
                          <div class="col-lg-7">
                              <input type="file" class="form-control"  name="image"></input> 
                          </div>
                    </div>

          <div style="height:10px;"></div>
            <div class="row">
                      <input type="hidden" name="lat" id="lat">
                      <input type="hidden" name="lng" id="lng">
                      <input type="hidden" name="location" id="location">

                        <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
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
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
        </form>
                </div>
 
            </div>
        </div>
    </div>

    
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOS5lkVzX7NUr7peU05g6DLlzixjulJq4&libraries=places&callback=initMap"
            async defer></script>
</body>
</html>