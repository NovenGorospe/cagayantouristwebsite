

    <?php
    	include('config.php');
    	$id=$_GET['id'];
    	mysqli_query($dbconnect,"delete from contact where contact_id=".$id);
    	header("location:../message.php")
     
    ?>