<?php
include "../../include/connect.php";
$query1 = $connect;

if(isset($_GET["value"])){
		
	$quotation_id = $_GET["value"];
		
	$query2 = "DELETE FROM  WHERE quotation_id=$quotation_id";
	
	if(mysqli_query($query1,$query2)){
		
		echo "<script>window.location='../../main/mainIndex.php?page=quotation'</script>";
	}
	else
	{
		echo "Error deleting record:" . mysqli_error($query1);
	}
}
?>