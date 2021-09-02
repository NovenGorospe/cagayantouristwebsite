

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





    
    <!-- Middle Column -->
    <div class="w3-col m7">
    <!--eto yung post buddy-->
      <div class="w3-row-padding">
          <form class="form-horizontal" method="post" action="insert/insert_spot_comment.php"> 
            <div class="w3-col m12">
                <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
                  <div class="w3-card w3-round w3-white">
                    <div class="w3-container w3-padding">
                      <h6 class="w3-opacity"></h6>
                        <textarea rows="3" name="content" class="w3-border w3-padding"  placeholder="Whats on Your Mind" style="width: 100%"></textarea><br>
                            
                                <button type="submit" name="spot_comment"  class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button> 
                     </div>
                  </div>
            </div>
          </form>
      </div>

<!--Display po ng poging post-->
      <?php 
          $query = mysqli_query($dbconnect,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from spot_comment LEFT JOIN user on user.user_id = spot_comment.user_id order by sc_id DESC")or die(mysql_error());
            while($post_row=mysqli_fetch_array($query)){
            $id = $post_row['sc_id']; 
            $upid = $post_row['user_id']; 
            $posted_by = $post_row['username'];
         

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

</div>

<?php 
  } 
?> 
  


      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
    
  
</script>

</body>
</html> 
