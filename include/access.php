<?php
	$username = $_SESSION['username'];

	$sql = "Select access_level from fwms_users where activation_email = '$username'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	$access_id = $row['access_level'];
	mysqli_free_result($result);

	$sql1 = "Select * from fwms_user_access where jobtitle_id = '$access_id'";
	$result1 = mysqli_query($con, $sql1);
	$access_array = array();
	while($row1 = mysqli_fetch_assoc($result1)){
		$tempArray = array();
		array_push($tempArray, $row1['f_add']);
		array_push($tempArray, $row1['f_edit']);
		array_push($tempArray, $row1['f_view']);
		array_push($access_array, $tempArray);
	}
	mysqli_free_result($result1);
?>