<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


    <!-- Delete -->
        <div class="modal fade" id="del<?php echo $row['cat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                    </div>
                    <div class="modal-body">
                    <?php
                        $del=mysqli_query($dbconnect,"select * from category where cat_id='".$row['cat_id']."'");
                        $drow=mysqli_fetch_array($del);
                    ?>
                    <div class="container-fluid">
                        <input type="hidden" name="cat_id" class="form-control" value="<?php echo $drow['cat_id']; ?>">
                        <h5><center>Category: <strong><?php echo $drow['category']; ?></strong></center></h5> 
                    </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="delete/delete_cat.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.modal -->
     
    <!-- Edit -->
        <div class="modal fade" id="edit_cat<?php echo $row['cat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                    </div>
                    <div class="modal-body">
                    <?php
                   
                        $edit=mysqli_query($dbconnect,"select * from category where cat_id='".$row['cat_id']."'");
                        $erow=mysqli_fetch_array($edit);
                    ?>
                    <div class="container-fluid">
                     <form method="POST" action="update/update_cat.php"  enctype="multipart/form-data">
                      <div class="row">
               
                <div class="col-lg-9">
                   
                  <input type="hidden" name="cat_id" class="form-control" value="<?php echo $erow['cat_id']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3">
                  <label class="control-label" style="position:relative; top:7px;">Category:</label>
                </div>
                <div class="col-lg-9">
                   
                  <input type="text" name="cat" class="form-control" value="<?php echo $erow['category']; ?>">
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