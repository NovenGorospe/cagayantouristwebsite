	<?php
	include('config.php');
		
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mes = $_POST['message'];
			mysqli_query($dbconnect,"insert into contact (username,email,message) values ('$name','$email','$mes') ")or die(mysqli_error());
header('location:../spot_category.php');
		?>