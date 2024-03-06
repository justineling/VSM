<?php
include "../include/connect.php";
$query1 = $connect;

if (isset($_GET['value'])) {
    $billingNo = $_GET['value'];

    // Fetch the billing data based on billing_no
    $query = "SELECT * FROM billing WHERE billing_no = '$billingNo'";
    $result = mysqli_query($query1, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Output the data as HTML attributes
        echo '<div data-billing-no="' . $row['billing_no'] . '" data-status="' . $row['status'] . '"></div>';
    } else {
        http_response_code(500);
        echo '<div data-error="Error fetching billing data"></div>';
    }
} else {
    http_response_code(400);
    echo '<div data-error="Invalid request"></div>';
}
?>
