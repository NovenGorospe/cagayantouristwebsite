<?php
    include('config.php');

    $Eid = $_POST['event_id'];
    $event=$_POST['event'];
    $date=$_POST['date'];
    $time=$_POST['time'];
      $des=$_POST['des'];
       $loc=$_POST['location'];
       
            
// move_uploaded_file($_FILES["uploadImage"]["tmp_name"],"images/" . $_FILES["uploadImage"]["name"]);
    $sql = "update events set eventName='".$event."', eventDate='".$date."' , eventTime='".$time."' , description='".$des."' , location='".$loc."' where event_id=".$Eid;

    mysqli_query($dbconnect,$sql);
      header('location:../event.php');
?>