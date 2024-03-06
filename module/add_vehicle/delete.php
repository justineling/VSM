<?php
include "../../include/connect.php";
$query1 = $connect;

if(isset($_GET["value"])){
		
	$vehicle_id = $_GET["value"];
		
	$query2 = "DELETE FROM vehicle WHERE vehicle_id=$vehicle_id";
	
	if(mysqli_query($query1,$query2)){
		
		echo "<script>window.location='../../main/mainIndex.php?page=vehicle'</script>";
	}
}
?>