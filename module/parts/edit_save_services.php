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
     $s_code = $_POST['scode'];
     $s_name = $_POST['sname'];
     $s_des = $_POST['sdes'];
     $s_type = $_POST['stype'];
     $s_cost = $_POST['scost'];
     $s_bar = $_POST['sbar'];


     $sql = "UPDATE service SET    service_name = '$s_name', 
                                   description = '$s_des', 
                                   type = '$s_type', 
                                   cost = '$s_cost', 
                                   barcode = '$s_bar'

                    WHERE service_code = '$s_code'";
 
     if (mysqli_query($connect, $sql)) {
        
        echo '<script>alert("Succesfully updated!")</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
     }

}

echo '<script>window.location="../../main/mainIndex.php?page=services"</script>';

?>