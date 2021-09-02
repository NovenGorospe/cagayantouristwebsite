


<?php

include "config.php";

?>
<html>
    <head>
        <title>5 Star Rating system with jQuery, AJAX, and PHP</title>

        <!-- CSS -->
        <link href="style.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
        
        <!-- Script -->
        <script src="jquery-3.0.0.js" type="text/javascript"></script>
        <script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
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
                            url: 'rating_ajax.php',
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
    </head>
    <body>
        <div class="content">
            <?php    include('session.php');  ?>
            <form method="POST" action="rating_ajax.php">
                <input type="hidden" name="user_id" value=" <?php echo $_SESSION['id'] ?>">
            </form>
            <?php
          



                   $id=$_GET['y'];
                              $sql="SELECT * from spots   where spot_id=".$id;
                              $result = mysqli_query($dbconnect,$query);
                while($row = mysqli_fetch_array($result)){
                    $spot_id = $row['spot_id'];
                    $spot = $row['spot'];
                    $des = $row['des'];
               

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
                            Average Rating : <span id='avgrating_<?php echo $spot_id; ?>'><?php echo $averageRating; ?></span>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $spot_id; ?>').barrating('set',<?php echo $rating; ?>);
                            });
                            
                            </script>
                        </div>
                    </div>
            <?php
                }
            ?>

        </div>

        
    </body>
</html>
