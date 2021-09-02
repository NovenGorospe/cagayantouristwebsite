<?php
    include('config.php');

    $cat_id = $_POST['cat_id'];
    $category=$_POST['cat'];
   
// move_uploaded_file($_FILES["uploadImage"]["tmp_name"],"images/" . $_FILES["uploadImage"]["name"]);
    $sql = "update category set category='".$category."' where cat_id=".$cat_id;

    mysqli_query($dbconnect,$sql);
      header('location:../category.php');
?>