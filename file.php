<html>
<head>
<title>PHP File Upload example</title>
</head>
<body>
 
<form  enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file"><br/>
<input type="submit" value="Upload" name="Submit1"> <br/>
 
 
</form>
<?php
if(isset($_POST['Submit1']))
{ 

$filepath = "images/" . $_FILES["file"]["name"];
 
if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
{
 
 
} 
else 
{
echo "Error !!";
}
} 
?>
 
</body>
</html>