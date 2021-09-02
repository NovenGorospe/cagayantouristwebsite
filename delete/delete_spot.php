

    <?php
    	include('config.php');
    	$id=$_GET['id'];
    	mysqli_query($dbconnect,"delete from spots where spot_id=".$id);
    	header("location:../admin.php")
     
    ?>