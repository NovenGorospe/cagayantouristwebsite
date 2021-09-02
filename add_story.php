<?php 
include('config.php');
		
      $type=$_POST['types'];
        $spot=$_POST['spots'];
       $first=$_POST['first'];
       // $second=$_POST['second'];
       // $third=$_POST['third'];
       // $last=$_POST['last'];
      
        $query="INSERT INTO pointlocation (type_id,spot_id,first_story) 
                            VALUES ('$type','$spot','$first')";
        if(mysqli_query($dbconnect,$query))

            header('location:../admin.php');

?>