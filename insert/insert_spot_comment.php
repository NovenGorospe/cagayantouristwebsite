	<?php
	include('config.php');

		if (isset($_POST['spot_comment'])){
  
			$cmmt  = $_POST['content'];
			$user_id = $_POST['user_id'];
			$si = $_POST['spot_id'];
		
			mysqli_query($dbconnect,"insert into spot_comment (content,date_created,user_id,spot_id) values ('$cmmt','".strtotime(date("Y-m-d h:i:sa"))."','$user_id','$si') ")or die(mysqli_error());
			header('location:../spot_view.php?y='.$si);
		}
		?>
		