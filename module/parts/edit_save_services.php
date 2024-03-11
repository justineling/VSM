<?php
include_once '../../include/connect.php';

if(isset($_POST['save']))
{        
    $s_id = $_POST['sid'];  
    $s_code = $_POST['scode'];        
    $s_name = $_POST['sname'];
    $s_des = $_POST['sdes'];
    $s_type = $_POST['stype'];
    $s_cost = $_POST['scost'];
    $s_bar = $_POST['sbar'];

    $sql = "UPDATE service 
            SET service_code = '$s_code',
                service_name = '$s_name', 
                service_description = '$s_des', 
                service_type = '$s_type', 
                service_cost = '$s_cost', 
                service_barcode = '$s_bar'
            WHERE service_id = '$s_id'";

    if (mysqli_query($connect, $sql)) {
        echo '<script>alert("Service details updated successfully!")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
}

echo '<script>window.location="../../main/mainIndex.php?page=services"</script>';

?>
