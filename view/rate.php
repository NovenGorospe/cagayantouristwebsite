<?php 
                        include ('config.php');
                         $id=$_GET['y'];
                         mysqli_query($dbconnect,"UPDATE spots SET rate = rate WHERE  spot_id=".$id)

 ?>