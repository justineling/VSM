<?php
include "../../include/connect.php";

if (isset($_GET["Submit"])) {
    // Assuming your form fields match the column names in the database
    $plateNo = $_GET['plate_no'];
    $engineNo = $_GET['engine_no'];
    $brand = $_GET['brand'];
    $lastService = $_GET['last_service'];
    $modelType = $_GET['model_type'];
    $mileage = $_GET['mileage'];
    $owner = $_GET['owner'];
    $colour = $_GET['colour'];
    $cc = $_GET['cc'];

    // Check if all required fields are filled
    if (empty($plateNo) || empty($engineNo) || empty($brand) || empty($lastService) || empty($modelType) || empty($mileage) || empty($owner) || empty($colour) || empty($cc)) {
        echo "All fields are required!";
        // Handle the error or redirect as needed
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $query2 = "INSERT INTO vehicle (plate_no, engine_no, brand, last_service, model_type, mileage, owner, colour, cc) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($query1, $query2);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssss", $plateNo, $engineNo, $brand, $lastService, $modelType, $mileage, $owner, $colour, $cc);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>window.location='../../main/mainIndex.php?page=quotation'</script>";
        } else {
            echo "Error executing the statement: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the statement: " . mysqli_error($query1);
    }
}

// Close the database connection if needed
mysqli_close($query1);
?>
