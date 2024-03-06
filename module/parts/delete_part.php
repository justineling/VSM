<?php
	// include "../../include/dbconnection.php";
     include_once '../../include/connect.php';



	    
     $id = $_GET['id']; 
	
    
     
     $sql = "DELETE FROM parts WHERE parts_code='$id'";

     //$sql = "UPDATE farm = '".$_POST['farmCode']."', password = '".$_POST['password']."', ic_no = '".$_POST['ic']."', position = '".$_POST['pos']."',department = '".$_POST['depart']."',contact_no = '".$_POST['phone']."', access_level = '".$_POST['access_group_select']."', activation_email = '".$_POST['email']."' WHERE id = '".$_POST['id']."'";


       if (mysqli_query($connect, $sql)) {
        
        echo '<script>alert("Succesfully delete!")</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
     }



	// $sql="INSERT INTO farm (farmCode, farmName)
	// VALUES
	// ('$_POST[farmCode]','$_POST[farmName]')";

	echo '<script>window.location="../../main/mainIndex.php?page=parts"</script>';
?>