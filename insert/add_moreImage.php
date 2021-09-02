<?php 
include('config.php');
   
$filename = $_FILES['img']['name'];
$file_tmp = $_FILES['img']['tmp_name'];
$filetype = $_FILES['img']['type'];
$filesize = $_FILES['img']['size'];
for($i=0; $i<=count($file_tmp); $i++){
if(!empty($file_tmp[$i])){
$name = addslashes($filename[$i]);
$temp = addslashes(file_get_contents($file_tmp[$i]));
// if(mysqli_query($dbconnect,"Insert into multiple(name,image) values('$name','$temp')"))
        $type=$_POST['type'];
        $spot=$_POST['spot'];
        // $image = $_POST['image'];
        // $target = "images/".basename($image);
        // $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $query="INSERT INTO multiple (name,image,spot_id,type_id) 
                            VALUES ('$name','$temp','$spot','$type')";
        if(mysqli_query($dbconnect,$query))
            header('location:../admin.php');
}
}
?>