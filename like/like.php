<?php 
include ('config.php');
	include('../log_in/functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: log_in/login.php');
	}
?>
<!DOCTYPE html>
<?php include('../post/session.php'); ?>

<html>
<head>

</head>
<body>
<div>
	
	<?php
	
		$query=mysqli_query($dbconnect,"select * from `post`");
		while($row=mysqli_fetch_array($query)){
			?>
				<div>
				Date: <?php echo date('M-d-Y h:i A',strtotime($row['date_created'])); ?><br>
				Post: <?php echo $row['content']; ?><br>
				<div>
					
						<?php
							$query1=mysqli_query($dbconnect,"select * from `like` where post_id='".$row['post_id']."' and user_id='".$_SESSION['id']."'");
							if (mysqli_num_rows($query1)>0){
								?>
								<button value="<?php echo $row['post_id']; ?>" class="unlike">Unlike</button>
								<?php
							}
							else{
								?>
								<button value="<?php echo $row['post_id']; ?>" class="like"><?php
							$query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$row['post_id']."'");
							echo mysqli_num_rows($query3);
						?>Like</button>
								<?php
							}
						?>
					<span id="show_like<?php echo $row['post_id']; ?>">
						
					</span>
				</div>
				</div><br>
			<?php
		}
	?>
</div>

<a href="../post/logout.php">OUT</a>

<script src = "jquery-3.1.1.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		
		$(document).on('click', '.like', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('like');
			if($this.hasClass('like')){
				$this.text('Like'); 
			} else {
				$this.text('Unlike');
				$this.addClass("unlike"); 
			}
				$.ajax({
					type: "POST",
					url: "like2.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
		
		$(document).on('click', '.unlike', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('unlike');
			if($this.hasClass('unlike')){
				$this.text('Unlike'); 
			} else {
				$this.text('Like');
				$this.addClass("like"); 
			}
				$.ajax({
					type: "POST",
					url: "like2.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
		
	});
	
	function showLike(id){
		$.ajax({
			url: 'show_like.php',
			type: 'POST',
			async: false,
			data:{
				id: id,
				showlike: 1
			},
			success: function(response){
				$('#show_like'+id).html(response);
				
			}
		});
	}
	
</script>
</body>
</html>