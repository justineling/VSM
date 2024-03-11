<?php
include "../../include/connect.php";
$query1 = $connect;

if(isset($_GET["value"])){
		
	$billing_no = $_GET["value"];
		
	$query2 = "DELETE FROM billing WHERE billing_no=$billing_no";
	
	if(mysqli_query($query1,$query2)){
		
		echo "<script>window.location='../../main/mainIndex.php?page=billing'</script>";
	}
}
?>