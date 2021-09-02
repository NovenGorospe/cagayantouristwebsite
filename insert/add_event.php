
<?php 
include('config.php');
   
        $event=$_POST['event'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $des=$_POST['des'];
         $loc=$_POST['location'];
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $query="INSERT INTO events (eventName,eventDate,eventTime,image,description,location) 
                            VALUES ('$event','$date','$time','$image','$des','$loc')";
         if(mysqli_query($dbconnect,$query))
            header('location:../event.php');

?>