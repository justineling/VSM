<?php 
	require_once("include/connect.php");
	//require 'include/plugin/PasswordHash.php';	
	session_start();
	$con = $connect;

	if(isset($_POST['login'])){
		
		// Check connection
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		} 
		
		$username = $_POST['username'];
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = $_POST['password'];
		//$t_hasher = new PasswordHash(8, FALSE);

		//$sql = "SELECT * FROM vsm_users WHERE activation_email = '".$username."' AND status = 'ACTIVE'";
		
		$sql = "SELECT * FROM vsm_users WHERE username = '".$username."'";
		$result= mysqli_query($con, $sql);

		if(mysqli_num_rows($result)){
			while($row = mysqli_fetch_assoc($result)){
				
				//$checkpwd = $t_hasher->CheckPassword($password, $row['password']);
			 	if($password == $row['password']){
			
				//if($username != ''){
			 		
			 		$_SESSION['id'] = $row['user_id'];
			 		$_SESSION['username'] = $username;
			 		$_SESSION['access_level'] = $row['access_level'];
			 		$_SESSION['name'] = $username;
					
			 	/* array to get module & action(add, edit, delete) */
					$access_level = $row['access_level'];

					//$access_q = "Select * from access where jobtitle_id = '$access_id'";
					$access_q = "Select * from access where access_level = '$access_level'";
					
					$access = mysqli_query($con, $access_q);
					$access_array = array();
					while($access_row = mysqli_fetch_assoc($access)){
						$tempArray = array();
						array_push($tempArray, $access_row['f_add']);
						array_push($tempArray, $access_row['f_edit']);
						array_push($tempArray, $access_row['f_view']);
						array_push($access_array, $tempArray);
					}
					mysqli_free_result($access);
				/* end of array */
					
					
			 		if($access_array[0][2] == 1){
			 			header('location:main/mainIndex.php?page=customer');
			 		}else if($access_array[1][2] == 1){
			 			header('location:main/mainIndex.php?page=vehicle');
			 		}else if($access_array[2][2] == 1){
			 			header('location:main/mainIndex.php?page=appointment');
			 		}else if($access_array[3][2] == 1){
			 			header('location:main/mainIndex.php?page=jobsheet');
			 		}else if($access_array[4][2] == 1){
			 			header('location:main/mainIndex.php?page=job_board');
			 		}else if($access_array[5][2] == 1){
			 			header('location:main/mainIndex.php?page=quotation');
			 		}else if($access_array[6][2] == 1){
			 			header('location:main/mainIndex.php?page=billing');
			 		}else if($access_array[7][2] == 1){
			 			header('location:main/mainIndex.php?page=parts');
			 		}else if($access_array[8][2] == 1){
			 			header('location:main/mainIndex.php?page=report');
			 		}
			 	}
			 	else{
			 		 $_SESSION['error'] = "Invalid Login. Please check your login account with your Administrator!";
			 		 ?> <meta http-equiv="refresh" content="0; url='index.php'"><?php
				
			 	}
			}
		}
		else{
			$_SESSION['error'] = "Invalid Login. Please check your login account with your Administrator!";
			?><meta http-equiv="refresh" content="0; url='index.php'"><?php
		}
	}


?>