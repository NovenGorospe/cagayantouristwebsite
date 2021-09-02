

    <?php
    	include('config.php');
    	$id=$_GET['id'];
    	mysqli_query($dbconnect,"delete from events where event_id=".$id);
    	header("location:../event.php")
     
    ?>