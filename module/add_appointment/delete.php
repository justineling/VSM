<?php
include "../../include/connect.php";
$query1 = $connect;

if(isset($_GET["value"])){
		
	$appointment_id = $_GET["value"];
		
	$query2 = "DELETE FROM appointment WHERE appointment_id=$appointment_id";
	
	if(mysqli_query($query1,$query2)){
		
		echo "<script>window.location='../../main/mainIndex.php?page=appointment'</script>";
	}
}
?>