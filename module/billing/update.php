<?php
include __DIR__ . "/../include/connect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Update the billing information in the database
    $query = "UPDATE billing SET status = ? WHERE billing_no = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($connect, $query);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'si', $editStatus, $billingNo);

        // Execute the query
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo 'success|Billing information updated successfully';
        } else {
            // Log the error or provide a more user-friendly error message
            echo 'error|Error updating billing information';
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Log the error or provide a more user-friendly error message
        echo 'error|Error preparing statement';
    }
} else {
    echo 'error|Invalid request';
}

