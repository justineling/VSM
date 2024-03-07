<?php
	include_once '../../include/connect.php';

	if(isset($_POST['save']))
	{        
	$s_code = $_POST['scode'];		
    $s_name = $_POST['sname'];
    $s_des = $_POST['sdes'];
    $s_type = $_POST['stype'];
    $s_cost = $_POST['scost'];
    $s_bar = $_POST['sbar'];


     $sql = "INSERT INTO service (service_code,
	 							service_name, 
     							service_description, 
     							service_type, 
     							service_cost, 
     							service_barcode)

     			VALUES ('$s_code',
						'$s_name',
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