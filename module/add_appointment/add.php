<?php
include "../../include/connect.php";
$query1 = $connect;

// Getting Data from Forms
$customer_name = $_GET['customer_name'];
$plate_no = $_GET['plate_no'];
$service_type = $_GET['service_type'];
$pre_assign_mechanic = $_GET['pre_assign_mechanic'];
$pre_assign_parts = $_GET['pre_assign_parts'];
$date = $_GET['date'];
$time = $_GET['time'];
$remarks = $_GET['remarks'];

// Convert name or type to ID
$queryCus = "SELECT customer_id FROM customer WHERE name = '$customer_name'";
$resultCus = mysqli_query($query1, $queryCus);
$rowCus = mysqli_fetch_assoc($resultCus);
$customer_id = $rowCus['customer_id'];

$queryVeh = "SELECT vehicle_id FROM vehicle WHERE plate_no = '$plate_no'";
$resultVeh = mysqli_query($query1, $queryVeh);
$rowVeh = mysqli_fetch_assoc($resultVeh);
$vehicle_id = $rowVeh['vehicle_id'];

$querySer = "SELECT service_id FROM service WHERE service_type = '$service_type'";
$resultSer = mysqli_query($query1, $querySer);
$rowSer = mysqli_fetch_assoc($resultSer);
$service_id = $rowSer['service_id'];

$queryMec = "SELECT staff_id FROM staff WHERE staff_name = '$pre_assign_mechanic'";
$resultMec = mysqli_query($query1, $queryMec);
$rowMec = mysqli_fetch_assoc($resultMec);
$staff_id = $rowMec['staff_id'];

$queryPart = "SELECT parts_id FROM parts WHERE item_name = '$pre_assign_parts'";
$resultPart = mysqli_query($query1, $queryPart);
$rowPart = mysqli_fetch_assoc($resultPart);
$parts_id = $rowPart['parts_id'];

// Perform insert operation
$insertQuery = "INSERT INTO appointment (customer_id, vehicle_id, service_id, staff_id, parts_id, date, time, remarks) 
                VALUES ('$customer_id', '$vehicle_id', '$service_id', '$staff_id', '$parts_id', '$date', '$time', '$remarks')";

if (mysqli_query($query1, $insertQuery)) {
    echo "<script>window.location='../../main/mainIndex.php?page=appointment'</script>";
} else {
    echo "Error: " . $insertQuery . "<br>" . mysqli_error($connect);
}

// Close database connection
mysqli_close($connect);
?>