<?php 
include('config.php');
		$cat=$_POST['cat'];
        $type=$_POST['type'];
        $spot=$_POST['spot'];
      
        $query="INSERT INTO spot_category (cat_id,type_id,spot_id) 
                            VALUES ('$cat','$type','$spot')";
        if(mysqli_query($dbconnect,$query))
            header('location:../admin.php');

?>