<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cagayan Tourist Spot</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="description" content="Responsive Image Gallery with jQuery" />
        <meta name="keywords" content="jquery, carousel, image gallery, slider, responsive, flexible, fluid, resize, css3" />
		<meta name="author" content="Codrops" />
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<!-- <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' /> -->
		<!-- <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' /> -->	
		<!-- <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">			
		</script> -->
    </head>
    <body>
		<div class="container">
			<div class="content" style="margin-left:10%; width:80%">
			<a href="tourist_site.php" class=' btn btn-primary'  style='width: 45%; margin:1% '>Back</a>
				<div id="rg-gallery" class="rg-gallery">

					<div class="rg-thumbs">
						
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							 <?php
			                        include ('config.php');?>
			                    
			                        <?php
			                         $id=$_GET['z'];
			                          $query = mysqli_query($dbconnect,"select * from multiple where spot_id=".$id);
			                          while ($data = mysqli_fetch_array($query))
			                          {
			                            ?>
							<div class="es-carousel">	 
								<ul>
									<li style="padding: 10px">
									 <?php
                             echo '<img src="data:image/jpeg;base64,'.base64_encode($data['image'] ).'" height="500" width="1000">'; 
                              
                            // echo"<img src='images/".$data['image']." 'style='height:auto;max-width:auto; max-width:100%'>";
                            ?>
                            </li>
								</ul>
								
							</div>
							<?php 
							}
						 ?>
						</div>
						
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div><!-- rg-gallery -->
			</div><!-- content -->
		</div><!-- container -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript" src="js/gallery.js"></script>
    </body>
</html>