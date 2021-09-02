<?php
	session_start();
	include('config.php');
	
	if (isset($_POST['showlike'])){
		$id = $_POST['id'];
		$query2=mysqli_query($dbconnect,"select * from `like` where post_id='$id'");
		echo mysqli_num_rows($query2);	
	}
?>

