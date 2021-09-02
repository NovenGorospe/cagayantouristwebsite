<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


    <!-- Delete -->
        <div class="modal fade" id="del<?php echo $row['event_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                    </div>
                    <div class="modal-body">
                    <?php
                        $del=mysqli_query($dbconnect,"select * from events where event_id='".$row['event_id']."'");
                        $drow=mysqli_fetch_array($del);
                    ?>
                    <div class="container-fluid">
                        <h5><center>Event Name: <strong><?php echo $drow['eventName']; ?></strong></center></h5> 
                    </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="delete/delete_event.php?id=<?php echo $row['event_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>
                </div>
            </div>
        </div> 
    <!-- /.modal -->
     
    <!-- Edit -->
        <div class="modal fade" id="editEvent<?php echo $row['event_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                    </div>
                    <div class="modal-body">
                    <?php
                   
                        $edit=mysqli_query($dbconnect,"select * from events where event_id='".$row['event_id']."'");
                        $erow=mysqli_fetch_array($edit);
                    ?>
                    <div class="container-fluid">
                     <form method="POST" action="update/update_event.php"  enctype="multipart/form-data">
                      <div class="row">
               
                <div class="col-lg-9">
                   
                  <input type="hidden" name="event_id" class="form-control" value="<?php echo $erow['event_id']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3">
                  <label class="control-label" style="position:relative; top:7px;">Event Name:</label>
                </div>
                <div class="col-lg-9">
                   
                  <input type="text" name="event" class="form-control" value="<?php echo $erow['eventName']; ?>">
                </div>
              </div>
              <div style="height:10px;"></div>
              <div class="row">
                <div class="col-lg-3">
                  <label class="control-label" style="position:relative; top:7px;">Event Date:</label>
                </div>
                <div class="col-lg-9">
                <input type="date" name="date" class="form-control" value="<?php echo $erow['eventDate']; ?>">
                </div>
              </div>
              <div style="height:10px;"></div>
               <div class="row">
              <div class="col-lg-3">
              <label class="control-label" style="position:relative; top:7px;">Time:</label>
              </div>
                 <div class="col-lg-9">
                <input type="text" name="time" class="form-control" value="<?php echo $erow['eventTime']; ?>">
                </div>
          </div>
         <div style="height:10px;"></div>
               <div class="row">
              <div class="col-lg-3">
              <label class="control-label" style="position:relative; top:7px;">Description:</label>
              </div>
                 <div class="col-lg-9">
                 <textarea  class="form-control" name="des"><?php echo $erow['description']; ?></textarea>
                </div>
          </div>
          <div style="height:10px;"></div>
               <div class="row">
              <div class="col-lg-3">
              <label class="control-label" style="position:relative; top:7px;">Location:</label>
              </div>
                 <div class="col-lg-9">
                <input type="text" name="location" class="form-control" value="<?php echo $erow['location']; ?>">
                </div>
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
</body>
</html>