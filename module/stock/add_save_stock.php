<?php
include_once '../../include/connect.php';

if(isset($_POST['save']))
{        
    $category = $_POST['stkcategpry'];      
    $item = $_POST['stkitem'];
    $cost = $_POST['stkcost'];
    $sell = $_POST['stksell'];
    $unit = $_POST['stkunit'];
    $uom = $_POST['stkuom'];
    $in_date = $_POST['stkindate'];
    $out_date = $_POST['stkoutdate'];
    $vehicle_no = $_POST['stkvehicle'];
    $model = $_POST['stkmodel'];
    $owner = $_POST['stkowner'];

    $sql = "INSERT INTO stock (category, item, cost, sell, unit, uom, in_date, out_date, vehicle_no, model, owner)
            VALUES ('$category', '$item', '$cost', '$sell', '$unit', '$uom', '$in_date', '$out_date', '$vehicle_no', '$model', '$owner')";

    if (mysqli_query($connect, $sql)) {
        echo '<script>alert("Succesfully added new stock!")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
}

echo '<script>window.location="../../main/mainIndex.php?page=stock"</script>';

?>