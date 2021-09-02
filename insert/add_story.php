<?php 
include('config.php');
		  $product=$_POST['product'];
       
       $first=$_POST['first'];
       $second=$_POST['second'];
       $third=$_POST['third'];
       $last=$_POST['last'];
        $type=$_POST['types'];
        $spot=$_POST['spots'];
      
        $query="INSERT INTO story (product,first_story,second_story,third_story,last_story,type_id,spot_id) 
                            VALUES ('$product','$first','$second','$third','$last','$type','$spot')";
        if(mysqli_query($dbconnect,$query))

            header('location:../howTo.php');

?>