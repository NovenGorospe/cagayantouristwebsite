

    <?php
    	include('config.php');
    	$id=$_GET['id'];
    	mysqli_query($dbconnect,"delete from category where cat_id=".$id);
    	header("location:../category.php")
     
    ?>