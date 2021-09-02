
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
   <form method="POST" action="search.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search"  name="search" style="width: 50%">
          <input type="hidden" name="submit">
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
          <h2 class="tittle">Results: </h2>
          <?php   include('config.php');?>

                              <?php 
                               if(isset($_REQUEST['submit'])){
                               $event=$_POST['search'];
                              $sql="SELECT * from events WHERE eventName like '%".$event."%' OR location like'%".$event."%' OR eventDate like'%".$event."%'";
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){

                                ?>
          <div class="promotion-grids">
             

           <div class="col-md-4 promation-grid">
              <?php 
              echo '<a href=event_view.php?y='.$row['event_id'].'><img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="300" width="100%"></a>';
               ?>
              <div class="prom-text">
                <h4><?php  echo $row['eventName'] ?></h4>
                <div class="prom-bottom">
                  <div class="prom-left">
                    <h5><?php echo $row['location'] ?></h5>
                  </div>
                  <div class="prom-right">
                  <h5> Date: <?php  echo $row['eventDate']?> </h5>
                  <h5> Time: <?php  echo $row['eventTime']?> </h5>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <br>
              </div>
            </div>
            
          </div>
          <?php 
            }}
           ?>
      </div>
    
      <!--team-->
      <!--news-->
      <!--  -->
      
    
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
