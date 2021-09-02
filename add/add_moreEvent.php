
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

      <style>
        /* Remove the navbar's default margin-bottom and rounded borders */ 
     .navbar {
          margin-bottom: 0;
          border-radius: 0;
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
    <div class="modal fade" id="moreImageSpot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
          </div>

          <div class="modal-body">
            <div class="container-fluid">
              <form method="POST" action="insert/add_moreImageEvent.php"  enctype="multipart/form-data">
                <div style="height:10px;"></div>
                  <div class="row">
                    <div class="col-lg-3">
                      <label class="control-label" style="position:relative; top:7px;">Type:</label>
                    </div>
                  <div class="col-lg-9">
                    <select  class="form-control" id="types" name="types"  placeholder="Type">
                        <option value="" selected> Select events </option>
                            <?php
                              include ('config.php');
                                $sql="SELECT * from events";
                                  $q=mysqli_query($dbconnect,$sql);
                                  while ($row=mysqli_fetch_assoc($q))
                                  {
                                  echo"<option value='".$row['event_id']."'>".$row['eventName']."</option>";
                                  }
                            ?>
                    </select> 
                  </div>
                 </div>

                <div style="height:10px;"></div>
                  <div class="row">
                          <div class="col-lg-3">
                              <label class="control-label" style="position:relative; top:7px;">Image:</label>
                          </div>
                          <div class="col-lg-7">
                            <input multiple="" name="img[]" type="file" />
                          </div>
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
</body>
</html>