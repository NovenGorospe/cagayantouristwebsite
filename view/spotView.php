<?php 
                        include ('config.php');
                         $id=$_GET['y'];
                         mysqli_query($dbconnect,"UPDATE spots SET view = view +1 WHERE  spot_id=".$id)

 ?>s