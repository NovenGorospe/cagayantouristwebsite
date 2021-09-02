<?php 
include ('config.php');
	include('../log_in/functions.php');

	if (isLoggedIn()) {
	
	

$user_id =$_SESSION['id'];
$spot_id = $_POST['spot_id'];
$rating = $_POST['rating'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM spot_rating WHERE spot_id=".$spot_id." and user_id=".$user_id;

$result = mysqli_query($dbconnect,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

if($count == 0){
    $insertquery = "INSERT INTO spot_rating(user_id,spot_id,rating) values(".$user_id.",".$spot_id.",".$rating.")";
    mysqli_query($dbconnect,$insertquery);
}else {
    $updatequery = "UPDATE spot_rating SET rating=" . $rating . " where user_id=" . $user_id . " and spot_id=" . $spot_id;
    mysqli_query($dbconnect,$updatequery);

}


// get average
$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM spot_rating WHERE spot_id=".$spot_id ;
$result = mysqli_query($dbconnect,$query) or die(mysqli_error());
$fetchAverage = mysqli_fetch_array($result);
$averageRating = $fetchAverage['averageRating'];

 

$return_arr = array("averageRating"=>$averageRating);

echo json_encode($return_arr);
}
?>