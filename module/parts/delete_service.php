<?php
include '../../include/connect.php';

if(isset($_GET['id'])) {
    $serviceCode = $_GET['id'];
    $sql = "DELETE FROM service WHERE service_code='$serviceCode'";

    if(mysqli_query($connect, $sql)) {
        echo '<script>alert("Deleted successfully!")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
} else {
    echo "Service code not provided";
}

echo '<script>window.location="../../main/mainIndex.php?page=services"</script>';
?>