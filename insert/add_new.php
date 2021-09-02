    <?php 
  include('../log_in/functions.php');

  if (isAdmin()) {

  

include('config.php');
   
        $spot=$_POST['spot'];
        $lat=$_POST['lat'];
        $lng=$_POST['lng'];
        $location=$_POST['location'];
        $des=$_POST['des'];
        $type=$_POST['types'];
       $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $query="INSERT INTO spots (spot,lat,lng,location,des,type_id,image) 
                            VALUES ('$spot','$lat','$lng','$location','$des','$type','$image')";
        if(mysqli_query($dbconnect,$query))
            header('location:../admin.php');

}

?>