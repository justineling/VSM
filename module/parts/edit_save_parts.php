<?php
include_once '../../include/connect.php';

if(isset($_POST['save']))
{        
    $p_id = $_POST['pid'];  
    $p_code = $_POST['pcode'];        
    $p_name = $_POST['pname'];
    $p_cost = $_POST['pcost'];
    $p_des = $_POST['pdes'];
    $p_soh = $_POST['psoh'];
    $p_type = $_POST['ptype'];
    $p_sellP = $_POST['psellp'];
    $p_bar = $_POST['pbar'];
    
    $sql = "UPDATE parts 
            SET parts_code = '$p_code',
                item_name = '$p_name', 
                cost = '$p_cost',
                description = '$p_des', 
                soh = '$p_soh', 
                category = '$p_type', 
                sell_price = '$p_sellP', 
                barcode = '$p_bar'
            WHERE parts_id = '$p_id'";

    if (mysqli_query($connect, $sql)) {
        echo '<script>alert("Parts details updated successfully!")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
}

echo '<script>window.location="../../main/mainIndex.php?page=parts"</script>';
?>

