<!--Insert sa datapogi-->
	<?php
	include('config.php');
		if (isset($_POST['post'])){
			$post_content  = $_POST['post_content'];
			$user_id = $_POST['user_id'];
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			mysqli_query($dbconnect,"insert into post (content,date_created,user_id,image) values ('$post_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id','$image') ")or die(mysqli_error());
			header('location:../newsfeed.php');
		}
		?>

	<?php
		if (isset($_POST['comment'])){
			$comment_content = $_POST['comment_content'];
			$post_id=$_POST['id'];
			$user_id=$_POST['user_id'];
			mysqli_query($dbconnect,"insert into comment (content,date_posted,user_id,post_id) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id','$post_id')") or die (mysqli_error());
			header('location:../newsfeed.php');
			}
	?>