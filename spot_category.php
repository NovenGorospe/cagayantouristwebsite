
<?php 
  include('log_in/functions.php');

  if (!isLoggedIn()) {
 

?>
<!DOCTYPE html>
<html>
<head>
<title>Cagayan Tourist Spot</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />  
<link rel="stylesheet" href="css/chocolat.css" type="text/css">
<link href='css/banner.css' rel='stylesheet' type='text/css'>

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
        <!-- <h3>We Plan Your Trip<span>Cagayan Tourist Spot</span></h3> -->
      </div>
     <!--  -->
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
              <li><a href="newsfeed.php" data-hover="Newsfeeds" >Newsfeeds</a></li>
              <li><a href="tourist_site.php" >Tourist Site</a></li>
              <li><a href="adventure.php" data-hover="Adventure" >Adventure</a></li>
              <li><a href="#tours" data-hover="Hotels" >Hotels</a></li>
               <li><a data-hover="Events" href="view_event.php" >Events</a></li>
                     <li><a  href="about.php" data-hover="About Us" >About Us</a></li>
               
                  <li><a href="log_in/login.php" class='btn btn-primary'  style='width: 100%;'>Sign in</a></li>
               
               
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      <div class="clearfix"></div>
      </div>  
    </div> 
  </div>

<center>
  <?php include('mapCategory.php'); ?>  
</center>
    <div class="content">
      <div class="promotions">
        <div class="container">
          <?php 
             $id=$_GET['y'];
                              $sql="SELECT * from types  where types.type_id=".$id;
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){

                              
           ?>
          <h2 class="tittle">----- <?php echo $row['type']; ?> -----</h2>
          <?php 
          } ?>
          <?php   include('config.php');?>

                              <?php 
                               $id=$_GET['y'];
                              $sql="SELECT * from spots where spots.type_id=".$id;
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){
                              $spot_id=$row['spot_id']

                                ?>
          <div class="promotion-grids">
             

            <div class="col-md-4 promation-grid">
              <?php 
              echo '<a href=spot_view.php?y='.$row['spot_id'].'><img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="300" width="100%"></a>';
               ?>
              <div class="prom-text">
                <h4><?php  echo $row['spot'] ?></h4>
                <div class="prom-bottom">
                  <div class="prom-left">
                    <h5><?php  echo $row['location'] ?></h5>
                  </div>
                    <div class="prom-right">
                            <h5>  
                      <div class="content">
            <?php
          
                  // User rating
                    $query = "SELECT * FROM spot_rating WHERE spot_id=".$spot_id;
                    $userresult = mysqli_query($dbconnect,$query) or die(mysqli_error());
                    $fetchRating = mysqli_fetch_array($userresult);
                    $rating = $fetchRating['rating'];

                    // get average
                    $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM spot_rating WHERE spot_id=".$spot_id;
                    $avgresult = mysqli_query($dbconnect,$query) or die(mysqli_error());
                    $fetchAverage = mysqli_fetch_array($avgresult);
                    $averageRating = $fetchAverage['averageRating'];

                    if($averageRating <= 0){
                        $averageRating = "No rating yet.";
                    }
            ?>
                    <div class="post">
                       
                        <div class="post-action">
                            <!-- Rating -->
                           
                            <div style='clear: both;'></div>
                            Average Rating : <center> <h3><?php echo $averageRating; ?></h3></center>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $spot_id; ?>').barrating('set',<?php echo $rating; ?>);
                            });
                            
                            </script>
                        </div>
        </div>  <!-- end ng right prompt -->


</h5>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <br>
              </div>
            </div>
            
          </div>
          <?php 
            }
           ?>
      </div>
    
      <!--team-->
      <!--news-->
      <!--  -->
      
    
    </div>
</div>

       <div class="contact"  id="contact">
        <div class="container">
          <h3 class="tittle">Contact</h3>
          <div class="contact-grids">
           <form method="POST" action="insert/insert_cat.php">
              <div class="col-md-6 grid-contact">
                <div class="your-top">
                  <i class="glyphicon glyphicon-user"> </i>
                  <input type="text" name="name" >               
                  <div class="clearfix"> </div>
                </div>
                <div class="your-top">
                  <i class="glyphicon glyphicon-envelope"> </i>
                   <input type="text" name="email" >              
                  <div class="clearfix"> </div>
                </div>
                
                
              </div>
              <div class="col-md-6 grid-contact-in">
               <textarea name="message"></textarea>
                <input type="submit" value="Send">
              </div>
              <div class="clearfix"> </div>
            </form>
          </div>
          
        </div>
      </div>
      </form>
    <!--footer-->
      <div class="copy-section">
        <div class="container">
          <div class="footer-top">
            <p>Copyright &copy; 2017-2018</strong><br>  Bachelor of Science in Computer Science All rights
    reserved.</p>
          </div>
        </div>
      </div>
      <script type="text/javascript">
            $(document).ready(function() {
              /*
              var defaults = {
                  containerID: 'home', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
              };
              */
              
              $().UItoTop({ easingType: 'easeOutQuart' });
              
            });
          </script>
        
</body>
</html>
<?php
  } else {
?>

<!DOCTYPE html>
<html>
<head>
<title>Cagayan Tourist Spot</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />  
<link rel="stylesheet" href="css/chocolat.css" type="text/css">
<link href='css/banner.css' rel='stylesheet' type='text/css'>

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
        <!-- <h3>We Plan Your Trip<span>Cagayan Tourist Spot</span></h3> -->
      </div>
      <div class="banner-grids">
      
        <center>
        <div>
          <div class="search">
  <form>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" style="width: 50%">
        </div>
      </form>
   </div>
          
        </div>
        </center>
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
              <li><a href="newsfeed.php" data-hover="Newsfeeds" >Newsfeeds</a></li>
              <li><a href="tourist_site.php" >Tourist Site</a></li>
              <li><a href="#tours" data-hover="Hotels" class="scroll">Hotels</a></li>
               <li><a data-hover="Events" href="#news" class="scroll">Events</a></li>
                     <li><a  href="" data-hover="About Us" class="scroll">About Us</a></li>
               
                  <li><a href="signout.php" class='btn btn-primary'  style='width: 100%;'>Sign Out</a></li>
               
               
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      <div class="clearfix"></div>
      </div>  
    </div> 
  </div>

  <center>
  <?php include('mapCategory.php'); ?>  
</center>
    <div class="content">
      <div class="promotions">
        <div class="container">
          <?php 
             $id=$_GET['y'];
                              $sql="SELECT * from types  where types.type_id=".$id;
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){

                              
           ?>
          <h2 class="tittle">----- <?php echo $row['type']; ?> -----</h2>
          <?php 
          } ?>
          <?php   include('config.php');?>

                              <?php 
                               $id=$_GET['y'];
                              $sql="SELECT * from spots where spots.type_id=".$id;
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){

                                    $spot_id=$row['spot_id']
                                ?>
          <div class="promotion-grids">
             

            <div class="col-md-4 promation-grid">
              <?php 
              echo '<a href=spot_view.php?y='.$row['spot_id'].'><img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="300" width="100%"></a>';
               ?>
              <div class="prom-text">
                <h4><?php  echo $row['spot'] ?></h4>
                <div class="prom-bottom">
                  <div class="prom-left">
                    <h5><?php  echo $row['location'] ?></h5>
                  </div>
                  <div class="prom-right">
                            <h5>  
                      <div class="content">
            <?php
          
                  // User rating
                    $query = "SELECT * FROM spot_rating WHERE spot_id=".$spot_id;
                    $userresult = mysqli_query($dbconnect,$query) or die(mysqli_error());
                    $fetchRating = mysqli_fetch_array($userresult);
                    $rating = $fetchRating['rating'];

                    // get average
                    $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM spot_rating WHERE spot_id=".$spot_id;
                    $avgresult = mysqli_query($dbconnect,$query) or die(mysqli_error());
                    $fetchAverage = mysqli_fetch_array($avgresult);
                    $averageRating = $fetchAverage['averageRating'];

                    if($averageRating <= 0){
                        $averageRating = "No rating yet.";
                    }
            ?>
                    <div class="post">
                       
                        <div class="post-action">
                            <!-- Rating -->
                           
                            <div style='clear: both;'></div>
                            Average Rating : <center> <h3><?php echo $averageRating; ?></h3></center>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $spot_id; ?>').barrating('set',<?php echo $rating; ?>);
                            });
                            
                            </script>
                        </div>
        </div>  <!-- end ng right prompt -->


</h5>
                  </div>

                  <div class="clearfix"></div>
                </div>
                <br>
              </div>
            </div>
            
          </div>
          <?php 
            }
           ?>
      </div>
    
      <!--team-->
      <!--news-->
      <!--  -->
      
    
    <?php include('session.php')  ?>

    </div>
      <div class="contact"  id="contact">
        <div class="container">
          <h3 class="tittle">Contact</h3>
          <div class="contact-grids">
           <form method="POST" action="insert/insert_cat.php">
              <div class="col-md-6 grid-contact">
                <div class="your-top">
                  <i class="glyphicon glyphicon-user"> </i>
                  <input type="text" name="name" value="<?php echo $fullname ?>">               
                  <div class="clearfix"> </div>
                </div>
                <div class="your-top">
                  <i class="glyphicon glyphicon-envelope"> </i>
                   <input type="text" name="email" value="<?php  
                  $query = ("SELECT * FROM user WHERE user_id=".$_SESSION['id']);  
                  $result = mysqli_query($dbconnect, $query);  
                  while($row = mysqli_fetch_array($result))  
                    {  
                       echo $row['email'];               
                    }  
                    ?>">              
                  <div class="clearfix"> </div>
                </div>
                
                
              </div>
              <div class="col-md-6 grid-contact-in">
               <textarea name="message"></textarea>
                <input type="submit" value="Send">
              </div>
              <div class="clearfix"> </div>
            </form>
          </div>
          
        </div>
      </div>
      </form>
    <!--footer-->
      <div class="copy-section">
        <div class="container">
          <div class="footer-top">
            <p>Copyright &copy; 2017-2018</strong><br>  Bachelor of Science in Computer Science All rights
    reserved.</p>
          </div>
        </div>
      </div>
      <script type="text/javascript">
            $(document).ready(function() {
              /*
              var defaults = {
                  containerID: 'home', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
              };
              */
              
              $().UItoTop({ easingType: 'easeOutQuart' });
              
            });
          </script>
        
</body>
</html>
<?php }?>