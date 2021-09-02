

    <?php
    	include('config.php');
    	$id=$_GET['id'];
    	mysqli_query($dbconnect,"delete from types where type_id=".$id);
    	header("location:../type.php")
     
    ?>