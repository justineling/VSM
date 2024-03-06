<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicle_sales_management_system";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

//check Connection
if($connect->connect_error)
{
	die("Connection Failed: ". $connect->connect_error);
}

?>