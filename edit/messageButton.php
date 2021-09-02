<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


    <!-- Delete -->
        <div class="modal fade" id="del<?php echo $row['contact_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                    </div>
                    <div class="modal-body">
                    <?php
                        $del=mysqli_query($dbconnect,"select * from contact where contact_id='".$row['contact_id']."'");
                        $drow=mysqli_fetch_array($del);
                    ?>
                    <div class="container-fluid">
                        <input type="hidden" name="contact_id" class="form-control" value="<?php echo $drow['contact_id']; ?>">
                        <h5><center>Message: <strong><?php echo $drow['message']; ?></strong></center></h5> 
                    </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="delete/delete_message.php?id=<?php echo $row['contact_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.modal -->
     
    <!-- Edit -->
       
    <!-- /.modal -->
</body>
</html>