<?php
	include ('config.php');
	session_start();
		
	if (isset($_POST['like'])){		
		
		$id = $_POST['id'];
		$query=mysqli_query($dbconnect,"select * from `like` where post_id='$id' and user_id='".$_SESSION['id']."'") or die(mysqli_error());
		
		if(mysqli_num_rows($query)>0){
			mysqli_query($dbconnect,"delete from `like` where user_id='".$_SESSION['id']."' and post_id='$id'");
		}
		else{
			mysqli_query($dbconnect,"insert into `like` (user_id,post_id) values ('".$_SESSION['id']."', '$id')");
		}
	}		
?>


