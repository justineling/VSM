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

     $parts_name = $_POST['pname'];
     $parts_des = $_POST['pdes'];
     $parts_type = $_POST['ptype'];
     $parts_cost = $_POST['pcost'];
     $parts_sellp = $_POST['psellp'];
     $parts_bar = $_POST['pbar'];


     $sql = "INSERT INTO parts (part_name, 
     							description, 
     							type, 
     							cost, 
     							sell_price, 
     							barcode)

     			VALUES ('$parts_name',
     					'$parts_des',
     					'$parts_type',
     					'$parts_cost',
     					'$parts_sellp',
     					'$parts_bar')";
 
     if (mysqli_query($connect, $sql)) {
        
        echo '<script>alert("Succesfully added new part!")</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
     }

}

echo '<script>window.location="../../main/mainIndex.php?page=parts"</script>';

?>