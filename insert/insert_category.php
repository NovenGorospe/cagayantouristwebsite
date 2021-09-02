	<?php
	include('config.php');
		
			$cat = $_POST['cat'];
			mysqli_query($dbconnect,"insert into category (category) values ('$cat') ")or die(mysqli_error());
header('location:../category.php');
		?>