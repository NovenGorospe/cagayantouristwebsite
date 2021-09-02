<?php
    include('config.php');

    $type_id = $_POST['type_id'];
    $type=$_POST['type'];
   
// move_uploaded_file($_FILES["uploadImage"]["tmp_name"],"images/" . $_FILES["uploadImage"]["name"]);
    $sql = "update types set type='".$type."' where type_id=".$type_id;

    mysqli_query($dbconnect,$sql);
      header('location:../type.php');
?>