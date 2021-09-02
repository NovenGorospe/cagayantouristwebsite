 <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form>
<?php
    include('config.php');

    $sid = $_POST['sid'];
    $spot=$_POST['spot'];
    $des=$_POST['des'];
    $type=$_POST['types'];
      $lat=$_POST['lat'];
        $lng=$_POST['lng'];
          $loc=$_POST['location'];
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            
// move_uploaded_file($_FILES["uploadImage"]["tmp_name"],"images/" . $_FILES["uploadImage"]["name"]);
    $sql = "update spots set spot='".$spot."', des='".$des."' , type_id='".$type."', lat='".$lat."', lng='".$lng."', location='".$loc."', image='".$image."'    where spot_id=".$sid;

    mysqli_query($dbconnect,$sql);
      header('location:../admin.php');
?>
</form>
</body>
</html>