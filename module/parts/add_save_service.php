<?php
	// include "../../include/dbconnection.php";
	
	
	include_once '../../include/connect.php';
	// include("../include/access.php");
	// $date = date("Y-m-d");
	// $time = date("H:i:sa");
	// $user = $_SESSION['username'];
	// $level = $_SESSION['access_level'];


	if(isset($_POST['save']))
	{        

     $s_name = $_POST['sname'];
     $s_des = $_POST['sdes'];
     $s_type = $_POST['stype'];
     $s_cost = $_POST['scost'];
     $s_bar = $_POST['sbar'];


     $sql = "INSERT INTO service (service_name, 
     							description, 
     							type, 
     							cost, 
     							barcode)

     			VALUES ('$s_name',
     					'$s_des',
     					'$s_type',
     					'$s_cost',
     					'$s_bar')";
 
     if (mysqli_query($connect, $sql)) {
        
        echo '<script>alert("Succesfully added new service!")</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
     }

}

echo '<script>window.location="../../main/mainIndex.php?page=services"</script>';

?>