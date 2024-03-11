<?php
include '../../include/connect.php';

if(isset($_GET['id'])) {
    $partsCode = $_GET['id'];
    $sql = "DELETE FROM parts WHERE parts_code='$partsCode'";

    if(mysqli_query($connect, $sql)) {
        echo '<script>alert("Deleted successfully!")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
} else {
    echo "Part code not provided";
}

echo '<script>window.location="../../main/mainIndex.php?page=parts"</script>';
?>