<?php
	include_once '../../include/connect.php';

	if(isset($_POST['save']))
	{        
	$parts_code = $_POST['pcode'];
	$parts_name = $_POST['pname'];
	$parts_cost = $_POST['pcost'];
	$parts_des = $_POST['pdes'];
	$parts_soh = $_POST['psoh'];
	$parts_type = $_POST['ptype'];
	$parts_sellp = $_POST['psellp'];
	$parts_bar = $_POST['pbar'];


     $sql = "INSERT INTO parts (parts_code,
	 							item_name, 
								cost, 
								description, 
								soh,
								category, 
								sell_price, 
								barcode)

				VALUES ('$parts_code',
						'$parts_name',
						'$parts_cost',
						'$parts_des',
						'$parts_soh',
     					'$parts_type',
     					'$parts_sellp',
     					'$parts_bar')";
 
     if (mysqli_query($connect, $sql)) {
        echo '<script>alert("Succesfully added new service!")</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
     }
}

echo '<script>window.location="../../main/mainIndex.php?page=parts"</script>';

?>