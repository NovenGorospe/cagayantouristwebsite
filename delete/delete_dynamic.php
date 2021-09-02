

    <?php
    	include('config.php');
    	$id=$_GET['id'];
    	mysqli_query($dbconnect,"delete from story where story_id=".$id);
    	header("location:../howTo.php")
     
    ?>