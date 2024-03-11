<?php
include "../../include/connect.php";
$query1 = $connect;

if(isset($_GET["Submit"])){
	
	$plate_no = mysqli_real_escape_string($query1,$_GET['plate_no']);
	$engine_no = mysqli_real_escape_string($query1,$_GET['engine_no']);
	$brand = mysqli_real_escape_string($query1,$_GET['brand']);
	$last_service = mysqli_real_escape_string($query1,$_GET['last_service']);
	$model_type = mysqli_real_escape_string($query1,$_GET['model_type']);
	$mileage = mysqli_real_escape_string($query1,$_GET['mileage']);
	$owner = mysqli_real_escape_string($query1,$_GET['owner']);
	$colour = mysqli_real_escape_string($query1,$_GET['colour']);
	$type = mysqli_real_escape_string($query1,$_GET['type']);
	$year = mysqli_real_escape_string($query1,$_GET['year']);
	$remarks = mysqli_real_escape_string($query1,$_GET['remarks']);
	$cc = mysqli_real_escape_string($query1,$_GET['cc']);
	
	$query2 = "INSERT INTO vehicle (vehicle_id,plate_no,engine_no,brand,last_service,model_type,mileage,owner,colour,type,year,remarks,cc) 
				VALUES ('','".$plate_no."','".$engine_no."','".$brand."','".$last_service."','".$model_type."','".$mileage."','".$owner."','".$colour."','".$type."','".$year."','".$remarks."','".$cc."')";
	
	if(mysqli_query($query1,$query2)){
		
		echo "<script>window.location='../../main/mainIndex.php?page=vehicle'</script>";
	}
}
?>