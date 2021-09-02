<?php 
  include('log_in/functions.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: log_in/login.php');
  }
?>


<!DOCTYPE html>
<html>

   <?php include('config.php'); ?>
    <?php include('post/session.php'); ?>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="post.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

    <section class="content-header">
     
   <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
      <ul class="nav navbar-nav" style="margin-left: 20px" >
        <li><a href="newsfeed.php">NewsFeeds</a></li>
         <li><a href="profile.php">Profile</a></li>
          <li><a href="like/like.php">Tourist Site</a></li>
          <li><a href="adventure.php" data-hover="Adventure" >Adventure</a></li>
           <li><a href="rating/rate.php">Hotels</a></li>
            <li><a href="#">Events</a></li>
             <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
           
          </ul>
        </li>
      </ul>

     
      <ul class="nav navbar-nav navbar-right"  style="margin-right: 10px" >
         <!-- <li><a href="#">Contact Us</a></li> -->
     
           <li><a href="post/logout.php">Sign Out</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    </section>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><a href="post/logout.php"><button><?php echo $member_row['username'];?> - Log Out</button></a></h4>
         <p class="w3-center"><img src="/w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
        </div>
      </div>
      <br>

    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <form class="form-horizontal" method="post" action="insert/insert_post.php"> 
        <div class="w3-col m12">
          <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity"></h6>
             <textarea rows="3" name="post_content" class="w3-border w3-padding"  placeholder="Whats on Your Mind" style="width: 100%"></textarea><br>
              <button type="submit" name="post"  class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button> 
            </div>
          </div>
        </div>
      </form>
      </div>

      <?php 
  $query = mysqli_query($dbconnect,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC")or die(mysql_error());
    while($post_row=mysqli_fetch_array($query)){
  $id = $post_row['post_id']; 
  $upid = $post_row['user_id']; 
  $posted_by = $post_row['username'];
  $image=$post_row['image'];
?>


<!--Eto yung display ng name and post with the time and kung may image o wala-->  
<?php 
  if ($image =='')
  {
?>
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity"><?php       
    $days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
    $remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
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
  ?></span>
        <h4><a href="#"><?php echo $posted_by; ?></a></h4><br>
        <hr class="w3-clear">
        <p><?php
    echo $post_row['content'];
  ?></p>
          
      
    <?php }else
  { 
  ?>

 
   




   
      

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity"> <?php       
    $days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
    $remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
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
  ?></span>
        <h4> <a href="#"><?php echo $posted_by; ?></a></h4><br>
        <hr class="w3-clear">
        <p><?php
    echo $post_row['content'];?><br><?php
  ?></p>
          
  <?php  
    echo "<div id='img_div' >";
        echo "<img src='images/".$post_row['image']." '  >";
        echo "</div>";
    ?>

     <?php 
  } 
  ?>

 <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div> 
   <?php 
  } 
  ?> 
        
       
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      
      
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p> <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a></p>
</footer>
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html> 
