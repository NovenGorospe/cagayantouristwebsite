<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


    <!-- Delete -->
        <div class="modal fade" id="del<?php echo $row['story_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                    </div>
                    <div class="modal-body">
                    <?php
                        $del=mysqli_query($dbconnect,"select * from story where story_id='".$row['story_id']."'");
                        $drow=mysqli_fetch_array($del);
                    ?>
                    <div class="container-fluid">
                        <input type="hidden" name="story_id" class="form-control" value="<?php echo $drow['story_id']; ?>">
                        <h5><center>Spots: <strong><?php echo $drow['spot_id']; ?></strong></center></h5> 
                    </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="delete/delete_dynamic.php?id=<?php echo $row['story_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.modal -->
     
   
</body>
</html>