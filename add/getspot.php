 <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["type_id"])) {
	$query ="SELECT * FROM spots WHERE type_id = '" . $_POST["type_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Spots</option>
<?php
	foreach($results as $spot) {
?>
	<option value="<?php echo $spot["spot_id"]; ?>"><?php echo $spot["spot"]; ?></option>
<?php
	}
}
?>