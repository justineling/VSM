<?php
include "../../include/connect.php";

$query1 = $connect;

if (isset($_GET["Submit"])) {
    $vehicle_id = $_GET['vehicleId'];
    //echo "Received vehicle_id: " . $vehicleId_id; // Add this line for debugging

	$plate_no = mysqli_real_escape_string($query1,$_GET['plate_no']);
	$engine_no = mysqli_real_escape_string($query1,$_GET['engine_no']);
	$brand = mysqli_real_escape_string($query1,$_GET['brand']);
	$last_service = mysqli_real_escape_string($query1,$_GET['last_service']);
	$model_type = mysqli_real_escape_string($query1,$_GET['model_type']);
	$mileage = mysqli_real_escape_string($query1,$_GET['mileage']);
	$owner = mysqli_real_escape_string($query1,$_GET['owner']);
	$colour = mysqli_real_escape_string($query1,$_GET['colour']);
	$cc = mysqli_real_escape_string($query1,$_GET['cc']);

    $query2 = "UPDATE vehicle SET plate_no='$plate_no', engine_no='$engine_no', brand='$brand', last_service='$last_service', model_type='$model_type', mileage='$mileage', owner='$owner', colour='$colour', cc='$cc' WHERE vehicle_id='$vehicle_id'";
	
    if(mysqli_query($query1,$query2)){
		
		echo "<script>window.location='../../main/mainIndex.php?page=vehicle'</script>";
	}
}
?>