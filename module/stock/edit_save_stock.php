<?php
include_once '../../include/connect.php';

if(isset($_POST['save']))
{        
    $stk_id = $_POST['stkid'];  
    $category = $_POST['stkcategory'];      
    $item = $_POST['stkitem'];
    $cost = $_POST['stkcost'];
    $sell = $_POST['stksell'];
    $unit = $_POST['stkunit'];
    $uom = $_POST['stkuom'];
    $in_date = $_POST['stkin_date'];
    $out_date = $_POST['stkout_date'];
    $vehicle_no = $_POST['stkvehicle_no'];
    $model = $_POST['stkmodel'];
    $owner = $_POST['stkowner'];

    $sql = "UPDATE stock 
            SET category = '$category',
                item = '$item', 
                cost = '$cost', 
                sell = '$sell', 
                unit = '$unit', 
                uom = '$uom', 
                in_date = '$in_date', 
                out_date = '$out_date', 
                vehicle_no = '$vehicle_no', 
                model = '$model', 
                owner = '$owner'
            WHERE id = '$stk_id'";

    if (mysqli_query($connect, $sql)) {
        echo '<script>alert("Stock details updated successfully!")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
}

echo '<script>window.location="../../main/mainIndex.php?page=stock"</script>';

?>
