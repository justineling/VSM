<?php
	
	
	
	include_once '../../include/connect.php';
	// include("../include/access.php");
	// $date = date("Y-m-d");
	// $time = date("H:i:sa");
	// $user = $_SESSION['username'];
	// $level = $_SESSION['access_level'];


	if(isset($_POST['save']))
	{        
     // $id = $_GET['id']; 
     $parts_code = $_POST['pcode'];
     $parts_name = $_POST['pname'];
     $parts_des = $_POST['pdes'];
     $parts_type = $_POST['ptype'];
     $parts_cost = $_POST['pcost'];
     $parts_sellp = $_POST['psellp'];
     $parts_bar = $_POST['pbar'];


     $sql = "UPDATE parts SET part_name = '$parts_name', 
     					description = '$parts_des', 
     					type = '$parts_type', 
     					cost = '$parts_cost', 
     					sell_price = '$parts_sellp', 
     					barcode = '$parts_bar'

     			  WHERE parts_code = '$parts_code'";
 
     if (mysqli_query($connect, $sql)) {
        
        echo '<script>alert("Succesfully updated!")</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
     }

}

echo '<script>window.location="../../main/mainIndex.php?page=parts"</script>';

?>