<?php
include "../../include/connect.php";
$query1 = $connect;

if(isset($_GET["value"])){
		
	$customer_id = $_GET["value"];
		
	$query2 = "DELETE FROM customer WHERE customer_id=$customer_id";
	
	if(mysqli_query($query1,$query2)){
		
		echo "<script>window.location='../../main/mainIndex.php?page=customer'</script>";
	}
}
?>