<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM types";
$results = $db_handle->runQuery($query);
?>
<!DOCTYPE html>
<html>
<head>
  <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
<script>
function getspot(val) {
  $.ajax({
  type: "POST",
  url: "getspot.php",
  data:'type_id='+val,
  success: function(data){
    $("#spot-list").html(data);
  }
  });
}

function selecttype(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
  <title>Cagayan Tourist Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css"> 
   <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"> 
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
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
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
  <div class="header">Add More Image</div>
        <form method="POST" action="../insert/add_moreImage.php"   enctype="multipart/form-data">
         

          <div class="row">
                <div class="col-lg-3">
                  <label class="control-label" style="position:relative; top:7px;">Type:</label>
                </div>
                        <div class="col-lg-9">
                           <select name="type" id="type-list" onChange="getspot(this.value);">
                            <option value="">Select Type</option>
                            <?php
                           foreach($results as $type) {
                            ?>
                            <option value="<?php echo $type["type_id"]; ?>"><?php echo $type["type"]; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                      </div>
                </div>
              <div style="height:10px;"></div>
              <div class="row">
                <div class="col-lg-3">
                  <label class="control-label" style="position:relative; top:7px;">Spots:</label>
                </div>
                <div class="col-lg-9">
                          <select name="spot" id="spot-list">
                          <option value="">Select Spots</option>
                          </select>

                      </div>
              </div>
              <div style="height:10px;"></div>
              <div class="row">
                <div class="col-lg-3">
                  <label class="control-label" style="position:relative; top:7px;">Image:</label>
                </div>
                <div class="col-lg-9">
                         <input multiple="" name="img[]" type="file" />
                      </div>
              </div>
               
        <!-- <input name="submit" type="submit" /> -->
        <div style="height:10px;"></div>
                  

        
               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                   
             
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
        </form>
            
</body>
</html>