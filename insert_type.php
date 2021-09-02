	<?php
	include('config.php');
		
			
			$type = $_POST['type'];
			$image = $_POST['image'];
        $target = "images/".basename($image);
			mysqli_query($dbconnect,"insert into types (type,,image) values ($type','$image') ")or die(mysqli_error());
	
		}
		?>