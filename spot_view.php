
<?php 
  include('log_in/functions.php');

  if (!isLoggedIn()) {
 

?>

 <!DOCTYPE html>
  <html>
  <link href='rate/jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
  <!--Connections-->
  <?php include('config.php'); ?>

<head>

 <title>Cagayan Tourist Website</title>
 <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />  
<link rel="stylesheet" href="css/chocolat.css" type="text/css">

 
        <!-- Script -->

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
        <nav class="navbar navbar-default" style="padding-bottom: 15px;"">
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
  <center>
  <div class="google-map" style="width: 95%;">
    <?php include('tourist_location.php') ?>
            
          </div>
        </center>

    
    <div class="content">
      <div class="promotions">
        <div class="container">
            <?php   include('config.php');
            include('view/spotView.php');

          
                               $id=$_GET['y'];
                              $sql="SELECT * from spots   where spot_id=".$id;
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){
                                 $spot_id = $row['spot_id'];

                                ?>
          <h2 class="tittle"><?php echo $row['spot']; ?></h2>
        
          <div class="promotion-grids">
            <div class="col-md-12 promation-grid">
              <?php 
              echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="25%" width="100%">';
               ?> 
            </div>
            <br>
          <div class="col-md-12" style="padding: 5px; font-family: century gothic;">
            <?php echo "<a href=moreImage.php?z=".$row['spot_id']." class='pull-right btn btn-primary'  style='width: 30%'> <i class='fa fa-arrow-circle-right'></i>More Image</a>";
             echo "<a class='pull-left btn btn-warning'  style='width:auto; padding-left:10px'>"." ".$row['view']." "."View's"."</a>";
                // echo "<span class='pull-left btn btn-warning '>"." ".$row['view']." "."View's"."</span>";
             ?>
            </div>
             <div class="col-md-12" style="padding: 5px; font-family: century gothic;">
            <?php echo "<a href=showLocation.php?m=".$row['spot_id']." class='pull-right btn btn-primary'  style='width: 30%'> <i class='fa fa-arrow-circle-right'></i>How to go Here</a>";
             
             ?>
            </div>
          <div class="clearfix"></div>
            <div class="col-md-17 about-grid1">
                <div class="about-top1">
                  <div class="about-right">
                    <h3><?php echo $row['spot']; ?></h3>
                    <h3><?php echo $row['location']; ?></h3>
                    <p style="text-indent: 10%; text-align: justify;" ><?php echo $row['des'];  ?></p>
                    <h3>
        <script src="rate/jquery-3.0.0.js" type="text/javascript"></script>
        <script src="rate/jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>

        <script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');

                    // rating was selected by a user
                    if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");

                        var spot_id = split_id[1];  // spot_id

                        // AJAX Request
                        $.ajax({
                            url: 'rate/rating_ajax.php',
                            type: 'post',
                            data: {spot_id:spot_id,rating:value},
                            dataType: 'json',
                            success: function(data){
                                // Update average
                                var average = data['averageRating'];
                                $('#avgrating_'+spot_id).text(average);
                            }
                        });
                    }
                }
            });
        });
      
        </script>

                  <div class="content">
                      <form method="POST" action="rate/rating_ajax.php">
                          <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
                      </form>
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
                            <a href="log_in/login.php">
                            <select class='rating' id='rating_<?php echo $spot_id; ?>' data-id='rating_<?php echo $spot_id; ?>'>
                                         <option value="" >1</option>
                              <option value="1" >1</option>
                              <option value="2" >2</option>
                              <option value="3" >3</option>
                              <option value="4" >4</option>
                               <option value="5" >5</option>
                            </select></a>
                            <div style='clear: both;'></div>
                            Average Rating : <span  style="text-align: left;" id='avgrating_<?php echo $spot_id; ?>'><?php echo $averageRating; ?></span>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $spot_id; ?>').barrating('set',<?php echo $rating; ?>);
                            });
                            
                            </script>
                        </div>
                    </div>
       
        </div>

                   </h3>
                  </div>

                  <div class="clearfix"></div>

                </div>
              </div> <!-- end ng about grid1 -->
            
          </div> <!-- end ng promotion grid -->
          <?php 
            }
           ?>
      </div> <!-- end ng container -->
    </div> <!-- end ng promotion -->
    <center><h3>Nearby Hotels</h3>
    <div class="google-map" style="width: 100%; height: 500px;">
    <?php include('radius.php') ?>
            
          </div>
</center>




  
  <?php include('config.php'); ?>



<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/post.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<body class="w3-theme-l5">

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m1">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <!--Name of user-->
           
        </div>
           
      </div>
    <!-- End Left Column -->
    </div>

<!--rate-->
     <!-- Middle Column -->
    <div class="w3-col m10">
    <!--eto yung post buddy-->
      <div class="w3-row-padding">
          <form class="form-horizontal" method="post" action="insert/insert_spot_comment.php"> 
            <div class="w3-col m12">
                <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
                 <input type="hidden" name="spot_id" value=" <?php echo $id?>">
                  <div class="w3-card w3-round w3-white">
                    <div class="w3-container w3-padding">
                      <h6 class="w3-opacity"></h6>
                        <textarea rows="3" name="content" class="w3-border w3-padding"  placeholder="Whats on Your Mind" style="width: 100%"></textarea><br>
                            
                             <a href="log_in/login.php" type="submit" name="comment"  class="w3-button w3-theme"><i class="fa fa-pencil"></i>Comment</a> 
                     </div>
                  </div>
            </div>
          </form>
      </div>

<!--Display po ng poging post-->
      <?php 
      include('config.php');
        
          $query = mysqli_query($dbconnect,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from spot_comment LEFT JOIN user on user.user_id = spot_comment.user_id join spots on spots.spot_id=spot_comment.spot_id order by sc_id desc ")or die(mysql_error());
            while($row=mysqli_fetch_array($query)){
            $sid = $row['spot_id'] ;
            $uid = $row['user_id']; 
            $posted_by = $row['username'];
            
         

        ?>

        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
            <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
              <span class="w3-right w3-opacity">
<!--Time to-->
                <?php       
                    $days = floor($row['TimeSpent'] / (60 * 60 * 24));
                    $remainder = $row['TimeSpent'] % (60 * 60 * 24);
                    $hours = floor($remainder / (60 * 60));
                    $remainder = $remainder % (60 * 60);
                    $minutes = floor($remainder / 60);
                    $seconds = $remainder % 60;
                        if($days > 0)
                        echo date('F d, Y - H:i:sa');
                        elseif($days == 0 && $hours == 0 && $minutes == 0)
                        echo "A few seconds ago";   
                        elseif($days == 0 && $hours == 0)
                        echo $minutes.' minutes ago';
                ?> 
              </span>
                
                <h4><a href="#"><?php echo $posted_by; ?></a></h4><br>
        <hr class="w3-clear"><br>
             <p><?php echo $row['content']; ?> </p>
   <hr class="w3-clear"><br>
</div>

<?php 
  } 
?> 
  
  <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        
      </div>
      <br>
    
  <!-- End Grid -->
  </div> 
<!-- End Page Container -->
</div>




    
   


      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
    
  
</script>

</body>
</html> 



    
      <!--team-->
      <!--news-->
      <!--  -->
     
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
  } else {
?>

<!DOCTYPE html>
  <html>
  <link href='rate/jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
  <!--Connections-->
  <?php include('config.php'); ?>
  <?php include('post/session.php'); ?>

<head>

 <title>Cagayan Tourist Website</title>
 <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />  
<link rel="stylesheet" href="css/chocolat.css" type="text/css">

 
        <!-- Script -->

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
    <!--   <div class="ban -->
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
                  <li><a href="signout.php" class='btn btn-primary'  style='width: 100%;'>Sign out</a></li>
       
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      <div class="clearfix"></div>
      </div>  
    </div> 
  </div>
  <center>
  <div class="google-map" style="width: 95%;">
    <?php include('tourist_location.php') ?>
            
          </div>
        </center>

    
    <div class="content">
      <div class="promotions">
        <div class="container">
            <?php   include('config.php');
            include('view/spotView.php');

          
                               $id=$_GET['y'];
                              $sql="SELECT * from spots   where spot_id=".$id;
                              $result=mysqli_query($dbconnect,$sql);
                              while($row=mysqli_fetch_array($result)){
                                 $spot_id = $row['spot_id'];

                                ?>
          <h2 class="tittle"><?php echo $row['spot']; ?></h2>
        
          <div class="promotion-grids">
            <div class="col-md-12 promation-grid">
              <?php 
              echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="25%" width="100%">';
               ?> 
            </div>
            <br>
          <div class="col-md-12" style="padding: 5px; font-family: century gothic;">
            <?php echo "<a href=moreImage.php?z=".$row['spot_id']." class='pull-right btn btn-primary'  style='width: 30%'> <i class='fa fa-arrow-circle-right'></i>More Image</a>";
             echo "<a class='pull-left btn btn-warning'  style='width:auto; padding-left:10px'>"." ".$row['view']." "."View's"."</a>";
                // echo "<span class='pull-left btn btn-warning '>"." ".$row['view']." "."View's"."</span>";
             ?>
            </div>
          <div class="clearfix"></div>
            <div class="col-md-17 about-grid1">
                <div class="about-top1">
                  <div class="about-right">
                    <h3><?php echo $row['spot']; ?></h3>
                    <h3><?php echo $row['location']; ?></h3>
                    <p style="text-indent: 10%; text-align: justify;" ><?php echo $row['des'];  ?></p>
                    <h3>
        <script src="rate/jquery-3.0.0.js" type="text/javascript"></script>
        <script src="rate/jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>

        <script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');

                    // rating was selected by a user
                    if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");

                        var spot_id = split_id[1];  // spot_id

                        // AJAX Request
                        $.ajax({
                            url: 'rate/rating_ajax.php',
                            type: 'post',
                            data: {spot_id:spot_id,rating:value},
                            dataType: 'json',
                            success: function(data){
                                // Update average
                                var average = data['averageRating'];
                                $('#avgrating_'+spot_id).text(average);
                            }
                        });
                    }
                }
            });
        });
      
        </script>

                  <div class="content">
                      <form method="POST" action="rate/rating_ajax.php">
                          <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
                      </form>
            <?php
                    include('session.php'); 



             
                    // User rating
                    $query = "SELECT * FROM spot_rating WHERE spot_id=".$spot_id." and user_id=".$_SESSION['id'];
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
                            <select class='rating' id='rating_<?php echo $spot_id; ?>' data-id='rating_<?php echo $spot_id; ?>'>
                                         <option value="" >1</option>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                            </select>
                            <div style='clear: both;'></div>
                            Average Rating : <span style="text-align: left;" id='avgrating_<?php echo $spot_id; ?>'><?php echo $averageRating; ?></span>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $spot_id; ?>').barrating('set',<?php echo $rating; ?>);
                            });
                            
                            </script>
                        </div>
                    </div>
       
        </div>

                   </h3>
                  </div>

                  <div class="clearfix"></div>
                </div>
              </div> <!-- end ng about grid1 -->
            
          </div> <!-- end ng promotion grid -->
          <?php 
            }
           ?>
      </div> <!-- end ng container -->
    </div> <!-- end ng promotion -->
      <center><h3>Nearby Hotels</h3>
    <div class="google-map" style="width: 100%; height: 500px;">
    <?php include('radius.php') ?>
            
          </div>
</center>




  
  <?php include('config.php'); ?>



<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/post.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<body class="w3-theme-l5">

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m1">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <!--Name of user-->
           
        </div>
           
      </div>
    <!-- End Left Column -->
    </div>

<!--rate-->
     <!-- Middle Column -->

   
    <div class="w3-col m10">
    <!--eto yung post buddy-->
    <div>  <center> <h1> Reviews</h1></center>  </div>
      <div class="w3-row-padding">
          <form class="form-horizontal" method="post" action="insert/insert_spot_comment.php"> 
            <div class="w3-col m12">
                <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
                 <input type="hidden" name="spot_id" value=" <?php echo $id?>">
                  <div class="w3-card w3-round w3-white">

                    <div class="w3-container w3-padding">
                      <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                     <h3><?php echo $member_row['username']; ?>  </h3><br>
                      <h6 class="w3-opacity"></h6>
                        <textarea rows="3" name="content" class="w3-border w3-padding"  placeholder="Whats on Your Mind" style="width: 100%"></textarea><br>
                            
                                <button type="submit" name="spot_comment"  class="w3-button w3-theme"><i class="fa fa-pencil"></i> Commemnt</button> 
                     </div>
                  </div>
            </div>
          </form>
      </div>

<!--Display po ng poging post-->
      <?php 
      include('config.php');
        
          $query = mysqli_query($dbconnect,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from spot_comment LEFT JOIN user on user.user_id = spot_comment.user_id join spots on spots.spot_id=spot_comment.spot_id order by sc_id desc ")or die(mysql_error());
            while($row=mysqli_fetch_array($query)){
            $sid = $row['spot_id'] ;
            $uid = $row['user_id']; 
            $posted_by = $row['username'];
            
         

        ?>

        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
            <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
              <span class="w3-right w3-opacity">
<!--Time to-->
                <?php       
                    $days = floor($row['TimeSpent'] / (60 * 60 * 24));
                    $remainder = $row['TimeSpent'] % (60 * 60 * 24);
                    $hours = floor($remainder / (60 * 60));
                    $remainder = $remainder % (60 * 60);
                    $minutes = floor($remainder / 60);
                    $seconds = $remainder % 60;
                        if($days > 0)
                        echo date('F d, Y - H:i:sa');
                        elseif($days == 0 && $hours == 0 && $minutes == 0)
                        echo "A few seconds ago";   
                        elseif($days == 0 && $hours == 0)
                        echo $minutes.' minutes ago';
                ?> 
              </span>
                
                <h4><a href="#"><?php echo $posted_by; ?></a></h4><br>
        <hr class="w3-clear"><br>
        <p><?php echo $row['content']; ?> </p>
   <hr class="w3-clear"><br>
</div>

<?php 
  } 
?> 
  
  <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        
      </div>
      <br>
    
  <!-- End Grid -->
  </div> 
<!-- End Page Container -->
</div>




    
   


      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
    
  
</script>

</body>
</html> 



    
      <!--team-->
      <!--news-->
      <!--  -->
      
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
  }
?>


