<?php 
  include('log_in/functions.php');

  if (!isLoggedIn()) {

?>
          <!DOCTYPE html>
<html>
<head>
 <title>Cagayan Tourist Website</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />	
<link rel="stylesheet" href="css/chocolat.css" type="text/css">

<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Trip Guide Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---->
<script src="js/bootstrap.min.js"></script>
<!---->
<link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<script src="js/jquery.chocolat.js"></script>
		<!--lightboxfiles-->
		<script type="text/javascript">
		$(function() {
			$('.gallery a').Chocolat();
		});
		</script>
<!--script-->
<!--startsmothscrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>

<script src="js/modernizr.custom.97074.js"></script>
</head>
<body>
	<div class="banner-section">
		<div class="container">
			<div class="banner-heder">
				<!-- <h3>We Plan Your Trip at<span>Cagayan Tourist Spot</span></h3> -->
			</div>
			<<!-- div class="banner-grids"> -->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
    <div class="header">
		<div class="container">
			<div class="header-menu">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"><span>Cagayan</span>Tour</a></h1>
							</div>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav cl-effect-11">
							<li class="active"><a href="index.php" data-hover="Home">Home </a></li>
							<li><a href="newsfeed.php" data-hover="News" >Newsfeed</a></li>
							<li><a href="tourist_site.php" data-hover="Tourist" >Tourist site</a></li>
						<li><a href="adventure.php" data-hover="Adventure" >Adventure</a></li>
							<li><a href="view_event.php" data-hover="Events">Events</a></li>
							<li><a href="about.php" data-hover="About" >About</a></li>
         					<li><a href="log_in/login.php" class='btn btn-primary'  style='width: 100%;'>Sign in</a></li>
			 
						  </ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			<div class="clearfix"></div>
			</div>	
		</div> 
	</div>
	
		<div class="content">
			<div class="promotions">
				<div class="container">
						<?php   include('config.php');
						include('view/spotView.php');?>

                              <?php 
                               $id=$_GET['y'];
                              $sql="SELECT * from events   where event_id=".$id;
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){

                                ?>
					<h2 class="tittle"><?php echo $row['eventName']; ?></h2>
				
					<div class="promotion-grids">
						<div class="col-md-12 promation-grid">
							<?php 
							echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="25%" width="100%">';
							 ?> 
						</div>
						<br>
					<div class="col-md-12" style="padding: 5px; font-family: century gothic;">
						<?php echo "<a href=moreImage.php?z=".$row['event_id']." class='pull-right btn btn-primary'  style='width: 30%'> <i class='fa fa-arrow-circle-right'></i>More Image</a>";
						
							  // echo "<span class='pull-left btn btn-warning '>"." ".$row['view']." "."View's"."</span>";
						 ?>
						</div>
					<div class="clearfix"></div>
						<div class="col-md-17 about-grid1">
								<div class="about-top1">
									<div class="about-right">
										<h3><?php echo $row['eventName']; ?></h3>
										<h3><?php echo $row['location']; ?></h3>
										<p style="text-indent: 10%; text-align: justify;" ><?php echo $row['description'];  ?></p>
									</div>

									<div class="clearfix"></div>
								</div>
							</div>
						
					</div>
					<?php 
						}
					 ?>
			</div>
		</div>
		
			<!--team-->
			<!--news-->
			<!--  -->
			
		
		</div>
			<div class="contact"  id="contact">
				<div class="container">
					<h3 class="tittle">Contact</h3>
					<div class="contact-grids">
						<form action="#" method="post">
							<div class="col-md-6 grid-contact">
								<div class="your-top">
									<i class="glyphicon glyphicon-user"> </i>
									<input type="text" name="Name" placeholder="Name"  required >								
									<div class="clearfix"> </div>
								</div>
								<div class="your-top">
									<i class="glyphicon glyphicon-envelope"> </i>
									<input type="text" name="E-mail" placeholder="E-mail"  required>								
									<div class="clearfix"> </div>
								</div>
								<div class="your-top">
									<i class="glyphicon glyphicon-link"> </i>
									<input type="text" name="Website" placeholder="Website"  required>								
									<div class="clearfix"> </div>
								</div>
								
							</div>
							<div class="col-md-6 grid-contact-in">
								<textarea name="Message"  placeholder=" Message"  required></textarea>
								<input type="submit" value="Send">
							</div>
							<div class="clearfix"> </div>
						</form>
					</div>
					
				</div>
			</div>
		<!--footer-->
			<div class="copy-section">
				<div class="container">
					<div class="footer-top">
						<p>Copyright &copy; 2017-2018</strong><br>  Bachelor of Science in Computer Science All rights
    reserved.</p>
					</div>
				</div>
			</div>
</body>
</html>



<?php
    }else {
      ?>



        <!DOCTYPE html>
<html>
<head>
 <title>Cagayan Tourist Website</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />	
<link rel="stylesheet" href="css/chocolat.css" type="text/css">

<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Trip Guide Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---->
<script src="js/bootstrap.min.js"></script>
<!---->
<link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<script src="js/jquery.chocolat.js"></script>
		<!--lightboxfiles-->
		<script type="text/javascript">
		$(function() {
			$('.gallery a').Chocolat();
		});
		</script>
<!--script-->
<!--startsmothscrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>

<script src="js/modernizr.custom.97074.js"></script>
</head>
<body>
	<div class="banner-section">
		<div class="container">
			<div class="banner-heder">
				<!-- <h3>We Plan Your Trip at<span>Cagayan Tourist Spot</span></h3> -->
			</div>
			<!-- <div class="banner-grids"> -->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
    <div class="header">
		<div class="container">
			<div class="header-menu">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">a
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <div class="navbar-brand logo">
								<h1><a href="index.php"><span>Cagayan</span>Tour</a></h1>
							</div>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav cl-effect-11">
							<li class="active"><a href="index.php" data-hover="Home" >Home </a></li>
							<li><a href="newsfeed.php" data-hover="NewsFeeds" >NewsFeeds</a></li>
							<li><a href="tourist_site.php" data-hover="Tourist" >Tourist Site</a></li>
					<li><a href="adventure.php" data-hover="Adventure" >Adventure</a></li>
							<li><a href="view_event.php" data-hover="Events">Events</a></li>
							<li><a href="about.php" data-hover="About" >About</a></li>
							 <li><a href="post/logout.php" class='btn btn-primary'  style='width: 100%;'>Sign Out</a></li>
			 
						  </ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			<div class="clearfix"></div>
			</div>	
		</div> 
	</div>
	
		<div class="content">
			<div class="promotions">
				<div class="container">
						<?php   include('config.php');
						include('view/spotView.php');?>

                              <?php 
                               $id=$_GET['y'];
                              $sql="SELECT * from events   where event_id=".$id;
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){

                                ?>
					<h2 class="tittle"><?php echo $row['eventName']; ?></h2>
				
					<div class="promotion-grids">
						<div class="col-md-12 promation-grid">
							<?php 
							echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="25%" width="100%">';
							 ?> 
						</div>
						<br>
					<div class="col-md-12" style="padding: 5px; font-family: century gothic;">
						<?php echo "<a href=moreImage.php?z=".$row['event_id']." class='pull-right btn btn-primary'  style='width: 30%'> <i class='fa fa-arrow-circle-right'></i>More Image</a>";
						
							  // echo "<span class='pull-left btn btn-warning '>"." ".$row['view']." "."View's"."</span>";
						 ?>
						</div>
					<div class="clearfix"></div>
						<div class="col-md-17 about-grid1">
								<div class="about-top1">
									<div class="about-right">
										<h3><?php echo $row['eventName']; ?></h3>
										<h3><?php echo $row['location']; ?></h3>
										<p style="text-indent: 10%; text-align: justify;" ><?php echo $row['description'];  ?></p>
									</div>

									<div class="clearfix"></div>
								</div>
							</div>
						
					</div>
					<?php 
						}
					 ?>
			</div>
		</div>
		
			<!--team-->
			<!--news-->
			<!--  -->
			
		
		</div>
			<div class="contact"  id="contact">
				<div class="container">
					<h3 class="tittle">Contact</h3>
					<div class="contact-grids">
						<form action="#" method="post">
							<div class="col-md-6 grid-contact">
								<div class="your-top">
									<i class="glyphicon glyphicon-user"> </i>
									<input type="text" name="Name" placeholder="Name"  required >								
									<div class="clearfix"> </div>
								</div>
								<div class="your-top">
									<i class="glyphicon glyphicon-envelope"> </i>
									<input type="text" name="E-mail" placeholder="E-mail"  required>								
									<div class="clearfix"> </div>
								</div>
								<div class="your-top">
									<i class="glyphicon glyphicon-link"> </i>
									<input type="text" name="Website" placeholder="Website"  required>								
									<div class="clearfix"> </div>
								</div>
								
							</div>
							<div class="col-md-6 grid-contact-in">
								<textarea name="Message"  placeholder=" Message"  required></textarea>
								<input type="submit" value="Send">
							</div>
							<div class="clearfix"> </div>
						</form>
					</div>
					
				</div>
			</div>
		<!--footer-->
			<div class="copy-section">
				<div class="container">
					<div class="footer-top">
						<p>Copyright &copy; 2017-2018</strong><br>  Bachelor of Science in Computer Science All rights
    reserved.</p>
					</div>
				</div>
			</div>
</body>
</html>


   <?php } ?>