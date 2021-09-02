	<?php
	include('config.php');
		
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mes = $_POST['message'];
			mysqli_query($dbconnect,"insert into contact (username,email,message) values ('$name','$email','$mes') ")or die(mysqli_error());
		// echo "<script>Alert('Messagee Sent');</script>";
		// echo '<script>window.location="../tourist_site.php";</script>';
header('location:../tourist_site.php');

		?>