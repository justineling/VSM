<?php
include "../../include/connect.php";

$query1 = $connect;

if (isset($_GET["Submit"])) {
    $billing_no = $_GET['billing_no'];
    //echo "Received vehicle_id: " . $vehicleId_id; // Add this line for debugging

	$billing_no = mysqli_real_escape_string($query1,$_GET['billing_no']);
	$invoice_no = mysqli_real_escape_string($query1,$_GET['invoice_no']);
	$customer_name = mysqli_real_escape_string($query1,$_GET['customer_name']);
	$plate_no = mysqli_real_escape_string($query1,$_GET['plate_no']);
	$title = mysqli_real_escape_string($query1,$_GET['title']);
	$service_amount = mysqli_real_escape_string($query1,$_GET['service_amount']);
	$parts_amount = mysqli_real_escape_string($query1,$_GET['parts_amount']);
	$total = mysqli_real_escape_string($query1,$_GET['total']);
	$created_at = mysqli_real_escape_string($query1,$_GET['created_at']);
	$status = mysqli_real_escape_string($query1,$_GET['status']);
	$staff_name = mysqli_real_escape_string($query1,$_GET['staff_name']);
	$remarks = mysqli_real_escape_string($query1,$_GET['remarks']);

	// Fetch customer_id based on customer_name
	$queryCustomer = "SELECT customer_id FROM customer WHERE customer_name = ?";
	$stmtCustomer = mysqli_prepare($query1, $queryCustomer);
	mysqli_stmt_bind_param($stmtCustomer, "s", $customer_name);
	mysqli_stmt_execute($stmtCustomer);
	mysqli_stmt_bind_result($stmtCustomer, $customer_id);
	mysqli_stmt_fetch($stmtCustomer);
	mysqli_stmt_close($stmtCustomer);

	// Fetch plate_id based on plate_no
	$queryVehicle = "SELECT vehicle_id FROM vehicle WHERE plate_no = ?";
	$stmtVehicle = mysqli_prepare($query1, $queryVehicle);
	mysqli_stmt_bind_param($stmtVehicle, "s", $plate_no);
	mysqli_stmt_execute($stmtVehicle);
	mysqli_stmt_bind_result($stmtVehicle, $vehicle_id);
	mysqli_stmt_fetch($stmtVehicle);
	mysqli_stmt_close($stmtVehicle);

	// Fetch plate_id based on plate_no
	$queryStaff = "SELECT staff_id FROM staff WHERE staff_name = ?";
	$stmtStaff = mysqli_prepare($query1, $queryStaff);
	mysqli_stmt_bind_param($stmtStaff, "s", $staff_name);
	mysqli_stmt_execute($stmtStaff);
	mysqli_stmt_bind_result($stmtStaff, $staff_id);
	mysqli_stmt_fetch($stmtStaff);
	mysqli_stmt_close($stmtStaff);

    $query2 = "UPDATE billing SET billing_no='$billing_no', invoice_no='$invoice_no', customer_id='$customer_id', vehicle_id='$vehicle_id', title='$title', service_amount='$service_amount', parts_amount='$parts_amount', total='$total', created_at='$created_at', status='$status', staff_id='$staff_id', remarks='$remarks' WHERE billing_no='$billing_no'";
	
    if(mysqli_query($query1,$query2)){
		
		echo "<script>window.location='../../main/mainIndex.php?page=billing'</script>";
	}
}
?>