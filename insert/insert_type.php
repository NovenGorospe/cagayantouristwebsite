	<?php
	include('config.php');
		
			$type = $_POST['type'];
			mysqli_query($dbconnect,"insert into types (type) values ('$type') ")or die(mysqli_error());
header('location:../type.php');
		?>