<?php
	session_start();
	include("include/connect.php");
	$query1 = $connect;

	$username = $_POST['a'];

	if($username != "")
	{
		$query2 = "SELECT * FROM vsm_users WHERE username='".$username."'";
		$result = mysqli_query($query1,$query2);
		$user = mysqli_fetch_assoc($result);
		
		if($user)
		{	 
			$access_q = "SELECT * FROM position WHERE access_level = '".$user['access_level']."'";
            $access_result = mysqli_query($query1, $access_q);
            $access = mysqli_fetch_assoc($access_result);
			echo strtoupper($access['position']);		
		}
	}

?>