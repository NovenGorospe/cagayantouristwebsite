<?php 
  include('log_in/functions.php');
  if (!isLoggedIn()) {  
?>

<!DOCTYPE html>
  <html>
  <title>Cagayan Tourist Spot</title>
  <!--Connections-->
  <?php include('config.php'); ?>
 
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/post.css">
      <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
      <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<body class="w3-theme-l5">
  <section class="content-header">
      <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #007ea3; padding-top: 10px; padding-bottom: 10px; padding-right: 10px;">
  <div class="container-fluid">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" style="margin-left: 20px;">
        <li><a href="index.php" style="color: #ffffff;">Home</a></li>
        <li><a href="newsfeed.php" style="color: #ffffff;">NewsFeed</a></li>
        <li><a href="tourist_site.php" style="color: #ffffff;">Tourist Site</a></li>
        <li><a href="adventure.php" data-hover="Adventure" >Adventure</a></li>
        <li><a href="view_event.php" style="color: #ffffff;">Events</a></li>
        <li><a href="about.php" style="color: #ffffff;">About Us</a></li>
        <li><a href="log_in/login.php" style="color: #ffffff;" class='btn btn-primary'>Sign In</a></li>
      </ul>

     <!--  <ul class="nav navbar-nav navbar-right"  style="margin-right: 10px" >
           <li><a href="post/logout.php">Sign Out</a></li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

</section>



<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
        </div>
           
      </div>
    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m7">
    <!--eto yung post buddy-->
      <div class="w3-row-padding">
          <form class="form-horizontal" method="post" action="insert/insert_post.php" enctype="multipart/form-data"> 
            <div class="w3-col m12">
                <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
                  <div class="w3-card w3-round w3-white">
                    <div class="w3-container w3-padding">
                      <h6 class="w3-opacity"></h6>
                        <textarea rows="3" name="post_content" class="w3-border w3-padding"  placeholder="Whats on Your Mind" style="width: 100%"></textarea><br>
                            <div>
                              <input type="file" name="image" multiple="images">
                            </div>
                             <a href="log_in/login.php" name="post"  class="w3-button w3-theme"><i class="fa fa-pencil"></i>POST</a>    
                     </div>
                  </div>
            </div>
          </form>
      </div>

<!--Display po ng poging post-->
      <?php 
          $query = mysqli_query($dbconnect,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC")or die(mysql_error());
            while($post_row=mysqli_fetch_array($query)){
            $id = $post_row['post_id']; 
            $upid = $post_row['user_id']; 
            $posted_by = $post_row['username'];
            $image=$post_row['image'];
        ?>
<!--Eto yung display ng name and post with the time and kung may image o wala, may if para malaman if if haha-->  
      

      <?php 
      if ($image =='')
        {
      ?>
        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
            <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
              <span class="w3-right w3-opacity">
<!--Time to-->
                <?php       
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
                ?> 
              </span>
                
                <h4><a href="#"><?php echo $posted_by; ?></a></h4><br>
                    <hr class="w3-clear">
                <p><?php echo $post_row['content']; ?></p>

<!--Like kita kaya tatawaging niya yung like2 para like din niya-->
            <?php
              $query1=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."' ");
              if (mysqli_num_rows($query1)>0){
            ?>

           
                <a href="log_in/login.php"  value="<?php echo $id; ?>" class="unlike w3-button w3-theme-d2 w3-margin-bottom "> <span id="show_like<?php echo $id; ?>">
            <?php
              $query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
            ?>
                </span>Unlike</a> 
            <?php
              }
              else{
            ?>
            
                <a href="log_in/login.php"  value="<?php echo $id; ?>" class="like w3-button w3-theme-d2 w3-margin-bottom" ><span id="show_like<?php echo $id; ?>">
            <?php
              $query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
            ?>
                </span>Like</a> 
            <?php
              }
            ?>
                
  
<!--comment ka kung may sasabihin ka-->
      <button type="submit" class="w3-button w3-theme-d2 w3-margin-bottom" data-toggle="collapse" data-target="#<?php echo $id ?>"> 
      <?php
              $query3=mysqli_query($dbconnect,"select * from `comment` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
          ?>
           <i class="fa fa-comment"></i>  Comment</button>
        
        <div id="<?php echo $id ?>" class="collapse">
          <form method="post" action="insert/insert_post.php">
            <input type="hidden" name="id" value=" <?php echo $id ?>">
            <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
              <div class="w3-container w3-padding">
                <h6 class="w3-opacity"></h6>
                  <textarea rows="3" name="comment_content" class="w3-border w3-padding"  placeholder="Add Comment..." style="width: 100%"></textarea><br>
                     <a href="log_in/login.php" type="submit" name="comment"  class="w3-button w3-theme  btn btn-primary"><i class="fa fa-pencil"></i>Comment</a> 
                           
                <!-- <button name="comment" type="submit"  class="w3-button w3-theme btn btn-primary"><i class="fa fa-pencil"></i><a href="log_in/login.php">Comment</a></button>  -->
          </form>
        </div>

      <?php 
        $comment_query = mysqli_query ($dbconnect,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.user_id = comment.user_id where post_id = '$id'") or die (mysqli_error());
          while ($comment_row=mysqli_fetch_array($comment_query)){
          $comment_id = $comment_row['comment_id'];
          $comment_by = $comment_row['username'];
        ?>
     <hr class="w3-clear">
     <br>
        <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <span class="w3-right w3-opacity">
            <?php       
              $days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
              $remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
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

        <h4><a href="#"><?php echo $comment_by; ?></a></h4>
        <br>
        <p><?php echo $comment_row['content']; ?></p>
        <hr class="w3-clear">
<!--closing ng if sa taas-->

<?php
  }
?>

</div> 



<?php }else
  { 
  ?>
  <!--post post-->
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"><br>
          <span class="w3-right w3-opacity">
           <?php       
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
            ?>
          </span>
        <h4> <a href="#"><?php echo $posted_by; ?></a></h4>
        <hr class="w3-clear">
            <?php echo $post_row['content'];?><br>
        <center>
 
         <?php  echo '<img src="data:image/jpeg;base64,'.base64_encode($image ).'" height="400" width="100%"/>'; ?>
        
        </center>
        <br>
        <!--like po kita-->
          <?php
              $query1=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."' ");
              if (mysqli_num_rows($query1)>0){
          ?>
          
              <a href="log_in/login.php"  value="<?php echo $id; ?>" class="unlike w3-button w3-theme-d2 w3-margin-bottom"> <span id="show_like<?php echo $id; ?>">
          <?php
              $query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
          ?>
          </span>Unlike</a> 
          <?php
          }
              else{
          ?>
           
               <a href="log_in/login.php"  value="<?php echo $id; ?>" class="like w3-button w3-theme-d2 w3-margin-bottom "><span id="show_like<?php echo $id; ?>">
          <?php
              $query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
          ?>
          </span>Like</a> 
          <?php
          }
          ?>
         

      
<!--comment lang-->
      <button type="submit" class="w3-button w3-theme-d2 w3-margin-bottom" data-toggle="collapse" data-target="#<?php echo $id ?>">

        <?php
              $query3=mysqli_query($dbconnect,"select * from `comment` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
          ?><i class="fa fa-comment"></i>   Comment</button>
        <div id="<?php echo $id ?>" class="collapse">
          <form method="post" action="insert/insert_post.php">
            <input type="hidden" name="id" value=" <?php echo $id ?>">
            <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
              <div class="w3-container w3-padding">
              <h6 class="w3-opacity"></h6>
                <textarea rows="3" name="comment_content" class="w3-border w3-padding"  placeholder="Add Comment..." style="width: 100%"></textarea><br>
                 <a href="log_in/login.php" type="submit" name="comment"  class="w3-button w3-theme  btn btn-primary"><i class="fa fa-pencil"></i>Comment</a> 
              <!-- <button name="comment" type="submit"  class="w3-button w3-theme"><i class="fa fa-pencil"></i>Comment</button>  -->
          </form>
        </div>

         <!--display comment 2-->
          <?php 
            $comment_query = mysqli_query ($dbconnect,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.user_id = comment.user_id where post_id = '$id'") or die (mysqli_error());
              while ($comment_row=mysqli_fetch_array($comment_query)){
              $comment_id = $comment_row['comment_id'];
              $comment_by = $comment_row['username'];
            ?>
     
            <hr class="w3-clear">
            <br>
            <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
              <span class="w3-right w3-opacity">
                <?php       
                  $days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
                  $remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
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
            <h4><a href="#"><?php echo $comment_by; ?></a></h4>
            <br>
            <p><?php echo $comment_row['content']; ?></p>
            <hr class="w3-clear">
<!--closing bracket is important as you-->
<?php
  }
?>
</div> 
<?php 
  } 
?>
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
<br>

<footer style="background-color: #007ea3; height: 90px; padding-top: 30px;">
            <center><p style="color: #fff;">Copyright &copy; 2017-2018</strong><br>  Bachelor of Science in Computer Science All rights
    reserved.</p></center>
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

      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
      <!--script po ni like to para fuction well-->
      <script src = "like/jquery-3.1.1.js"></script> 
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
          url: "like/like2.php",
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
          url: "like/like2.php",
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
      url: 'like/show_like.php',
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







<?php }else
  { 
  ?>
      <!DOCTYPE html>
  <html>
  <!--Connections-->
  <?php include('config.php'); ?>
  

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/post.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  



<body class="w3-theme-l5">
  <section class="content-header">
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #007ea3; padding-top: 10px; padding-bottom: 10px; padding-right: 10px;">
  <div class="container-fluid">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" style="margin-left: 20px;">
        <li><a href="index.php" style="color: #ffffff;">Home</a></li>
        <li><a href="newsfeed.php" style="color: #ffffff;">NewsFeed</a></li>
        <li><a href="tourist_site.php" style="color: #ffffff;">Tourist Site</a></li>
        <li><a href="adventure.php" data-hover="Adventure" >Adventure</a></li>
        <li><a href="view_event.php" style="color: #ffffff;">Events</a></li>
        <li><a href="about.php" style="color: #ffffff;">About Us</a></li>
        <li><a href="post/logout.php" style="color: #ffffff;" class='btn btn-primary'>Sign Out</a></li>
      </ul>

     <!--  <ul class="nav navbar-nav navbar-right"  style="margin-right: 10px" >
           <li><a href="post/logout.php">Sign Out</a></li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
</section>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <!--Name of user-->
              <h4 class="w3-center">
                <?php  
                  $query = ("SELECT * FROM user WHERE user_id=".$_SESSION['id']);  
                  $result = mysqli_query($dbconnect, $query);  
                  while($row = mysqli_fetch_array($result))  
                  {  
                       echo "<td>".$row['username']."</td>";
                  }  
                  ?> 
             </h4>

             <center>
                <p class="w3-center"><img src="images/user.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
              <hr>
                <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>
                  Account Type: 
                  <?php  
                      $query = ("SELECT * FROM user WHERE user_id=".$_SESSION['id']);  
                      $result = mysqli_query($dbconnect, $query);  
                      while($row = mysqli_fetch_array($result))  
                        {  
                           echo "<td>".$row['user_type']."</td>";
                        }  
                      ?>
                    </p>
            </center>
        </div>
            <center>
              <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>
                Email:
                 <?php  
                  $query = ("SELECT * FROM user WHERE user_id=".$_SESSION['id']);  
                  $result = mysqli_query($dbconnect, $query);  
                  while($row = mysqli_fetch_array($result))  
                    {  
                       echo "<td>".$row['email']."</td>";               
                    }  
                    ?>
                  </p>      
            </center>
      </div>
    <!-- End Left Column -->
    </div>

    
    <!-- Middle Column -->
    <div class="w3-col m7">
    <!--eto yung post buddy-->
      <div class="w3-row-padding">
          <form class="form-horizontal" method="post" action="insert/insert_post.php" enctype="multipart/form-data"> 
            <div class="w3-col m12">
                <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
                  <div class="w3-card w3-round w3-white">
                    <div class="w3-container w3-padding">
                      <h6 class="w3-opacity"></h6>
                        <textarea rows="3" name="post_content" class="w3-border w3-padding"  placeholder="Whats on Your Mind" style="width: 100%"></textarea><br>
                            <div>
                              <input type="file" name="image" multiple="images">
                            </div>
                                <button type="submit" name="post"  class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button> 
                     </div>
                  </div>
            </div>
          </form>
      </div>

<!--Display po ng poging post-->
      <?php 
          $query = mysqli_query($dbconnect,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC")or die(mysql_error());
            while($post_row=mysqli_fetch_array($query)){
            $id = $post_row['post_id']; 
            $upid = $post_row['user_id']; 
            $posted_by = $post_row['username'];
            $image=$post_row['image'];
        ?>
<!--Eto yung display ng name and post with the time and kung may image o wala, may if para malaman if if haha-->  
      <?php 
      if ($image =='')
        {
      ?>
        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
            <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
              <span class="w3-right w3-opacity">
<!--Time to-->
                <?php       
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
                ?> 
              </span>
                
                <h4><a href="#"><?php echo $posted_by; ?></a></h4><br>
        <hr class="w3-clear">
                <p><?php echo $post_row['content']; ?></p>

<!--Like kita kaya tatawaging niya yung like2 para like din niya-->
            <?php
              $query1=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."' and user_id='".$_SESSION['id']."'");
              if (mysqli_num_rows($query1)>0){
            ?>

            <span id="show_like<?php echo $id; ?>">
            <?php
              $query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
            ?>
                </span>
                <button value="<?php echo $id ?>" class="unlike w3-button w3-theme-d2 w3-margin-bottom"> Unlike</button>
            <?php
              }
              else{
            ?>
            <span id="show_like<?php echo $id; ?>">
            <?php
              $query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
            ?>
                </span>
              
                <button value="<?php echo $id; ?>" class="like w3-button w3-theme-d2 w3-margin-bottom"> Like</button>

            <?php
              }
            ?>
                
   
         
         
<!--comment ka kung may sasabihin ka-->
      <button type="submit" class="w3-button w3-theme-d2 w3-margin-bottom" data-toggle="collapse" data-target="#<?php echo $id ?>"> <?php
              $query3=mysqli_query($dbconnect,"select * from `comment` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
          ?> <i class="fa fa-comment"></i>  Comment</button>

        
        <div id="<?php echo $id ?>" class="collapse">
          <form method="post" action="insert/insert_post.php">
            <input type="hidden" name="id" value=" <?php echo $id ?>">
            <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
              <div class="w3-container w3-padding">
                <h6 class="w3-opacity"></h6>
                  <textarea rows="3" name="comment_content" class="w3-border w3-padding"  placeholder="Add Comment..." style="width: 100%"></textarea><br>
                <button name="comment" type="submit"  class="w3-button w3-theme btn btn-primary"><i class="fa fa-pencil"></i>Comment</button> 
          </form>
        </div>

      <?php 
        $comment_query = mysqli_query ($dbconnect,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.user_id = comment.user_id where post_id = '$id'") or die (mysqli_error());
          while ($comment_row=mysqli_fetch_array($comment_query)){
          $comment_id = $comment_row['comment_id'];
          $comment_by = $comment_row['username'];
        ?>
     <hr class="w3-clear">
     <br>
        <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <span class="w3-right w3-opacity">
            <?php       
              $days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
              $remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
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

        <h4><a href="#"><?php echo $comment_by; ?></a></h4>
        <br>
        <p><?php echo $comment_row['content']; ?></p>
        <hr class="w3-clear">
<!--closing ng if sa taas-->

<?php
  }
?>

</div> 



<?php }else
  { 
  ?>
  <!--post post-->
  <title>Cagayan Tourist Spot</title>
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"><br>
          <span class="w3-right w3-opacity">
           <?php       
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
            ?>
          </span>
        <h4> <a href="#"><?php echo $posted_by; ?></a></h4>
        <hr class="w3-clear">
            <?php echo $post_row['content'];?><br>
        <center>
         <?php  echo '<img src="data:image/jpeg;base64,'.base64_encode($image ).'" height="400" width="100%"/>'; ?>
        </center>
        <br>
        <!--like po kita-->
          <?php
              $query1=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."' and user_id='".$_SESSION['id']."'");
              if (mysqli_num_rows($query1)>0){
          ?>
           <span id="show_like<?php echo $id; ?>">
          <?php
              $query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
          ?>
          </span>
              <button value="<?php echo $id; ?>" class="unlike w3-button w3-theme-d2 w3-margin-bottom" >Unlike</i></button>
          <?php
          }
              else{
          ?>
           <span id="show_like<?php echo $id; ?>">
          <?php
              $query3=mysqli_query($dbconnect,"select * from `like` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
          ?>
          </span>
                <button value="<?php echo $id; ?>" class="like w3-button w3-theme-d2 w3-margin-bottom"> Like</button>
          <?php
          }
          ?>
         

      
<!--comment lang-->
      <button type="submit" class="w3-button w3-theme-d2 w3-margin-bottom" data-toggle="collapse" data-target="#<?php echo $id ?>"><i class="fa fa-comment"></i>  <?php
              $query3=mysqli_query($dbconnect,"select * from `comment` where post_id='".$id."'");
              echo mysqli_num_rows($query3);
          ?>   Comment</button>
        <div id="<?php echo $id ?>" class="collapse">
          <form method="post" action="insert/insert_post.php">
            <input type="hidden" name="id" value=" <?php echo $id ?>">
            <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
              <div class="w3-container w3-padding">
              <h6 class="w3-opacity"></h6>
                <textarea rows="3" name="comment_content" class="w3-border w3-padding"  placeholder="Add Comment..." style="width: 100%"></textarea><br>
              <button name="comment" type="submit"  class="w3-button w3-theme"><i class="fa fa-pencil"></i>Comment</button> 
          </form>
        </div>

         <!--display comment 2-->
          <?php 
            $comment_query = mysqli_query ($dbconnect,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.user_id = comment.user_id where post_id = '$id'") or die (mysqli_error());
              while ($comment_row=mysqli_fetch_array($comment_query)){
              $comment_id = $comment_row['comment_id'];
              $comment_by = $comment_row['username'];
            ?>
     
            <hr class="w3-clear">
            <br>
            <img src="images/user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
              <span class="w3-right w3-opacity">
                <?php       
                  $days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
                  $remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
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
            <h4><a href="#"><?php echo $comment_by; ?></a></h4>
            <br>
            <p><?php echo $comment_row['content']; ?></p>
            <hr class="w3-clear">
<!--closing bracket is important as you-->
<?php
  }
?>
</div> 
<?php 
  } 
?>
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
</form>
</div>
</div>
<!-- Footer -->


<footer style="background-color: #007ea3; height: 90px; padding-top: 30px;">
            <center><p style="color: #fff;">Copyright &copy; 2017-2018</strong><br>  Bachelor of Science in Computer Science All rights
    reserved.</p></center>
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

      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
      <!--script po ni like to para fuction well-->
      <script src = "like/jquery-3.1.1.js"></script> 
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
          url: "like/like2.php",
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
          url: "like/like2.php",
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
      url: 'like/show_like.php',
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


   <?php } ?>