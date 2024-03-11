<?php
include '../../include/connect.php';

if(isset($_GET['id'])) {
    $stockId = $_GET['id'];
    $sql = "DELETE FROM stock WHERE id='$stockId'";

    if(mysqli_query($connect, $sql)) {
        echo '<script>alert("Deleted successfully!")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
} else {
    echo "Stock ID not provided";
}

echo '<script>window.location="../../main/mainIndex.php?page=stock"</script>';
?>