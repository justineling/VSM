<?php 
	session_start();
	include("../../include/dbconnection.php");
	$datetime = date("Y-m-d H:i:s");

  	if(isset($_POST["add_user"])){
		// Check connection
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		} 

		$datetimeday = date("l, d F Y , h:i a");
		
		
		$sql = "SELECT * FROM fwms_users WHERE activation_email ='".$_POST["email"]."' ";
		$sql1 = "INSERT INTO fwms_users(name, ic_no, position, department, contact_no, access_level, activation_email, status, datetime_created)VALUES ('".$_POST["fname"]."', '".$_POST["ic"]."', '".$_POST["pos"]."', '".$_POST["department"]."', '".$_POST["phone"]."', '".$_POST["access_group_select"]."', '".$_POST["email"]."', 'PENDING', '".$datetime."')";

		$result= mysqli_query($con, $sql);

		//check if exists
		if(mysqli_num_rows($result) == 0){
			if(mysqli_query($con, $sql1)){	
				$user_id = mysqli_insert_id($con);

				//audit trail 	
				$insert_user= mysqli_query($con_audit, "INSERT INTO audit_trial SET user_id		= '".$_SESSION['id']."', 
																				    user_Level	= '".$_SESSION['access_level']."', 
																				    module    	= 'Settings - User Management',
																				    action		= 'Add', 
																				    reference 	= 'New User',
																				    table_name 	= 'fwms_users',
																				    table_id	= '".$user_id."', 
																				    datetime	= '".$datetime."'") or die(mysqli_error($con_audit));

				$_SESSION['message'] = "<div class='alert alert-success'>
											Data added successfully!
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";

		
	/* Email ----------------------------------------------------------------------------------------------------------------------------------------------------------------*/	

		$company_q = "SELECT * FROM fwms_company_profile WHERE 1=1";
		$company = mysqli_query($con, $company_q);
		$company_p = mysqli_fetch_assoc($company);
		$company_name = $company_p['company_name'];
		$fullname = $_POST['fname'];

		$email = $_POST["email"];
		$link="localhost/fwms";
		$message = '<html>
					<head></head>
					<body>		
						<table width="100%" height="60%" style="font-family:Century Gothic; margin-top:30px;">
							<tr>
								<td>
									<table width="600px" height="70%" style="font-family:Century Gothic; background-color: #f0eff5;" align="center">
										<tr style="background-color:#ffab68;">
											<td align="center">
												<table width="480px" align="center">
													<tr>
														<td width="100%" style="padding-left:5px; text-align: center"><img src="'.$link.'/include/icon/logo.png" width="auto"></td>
													</tr>
													<tr>
														<td width="100%" style="font-family:Century Gothic; font-size:13px; text-align: center">
															<span style="font-family:Century Gothic; font-weight:600; font-size:13px;">Registration Confirmation</span><br>
															<span style="font-family:Century Gothic; font-size:13px;">'.$datetimeday.' Malaysia Time</span><br>
															From: <span style="font-family:Century Gothic; font-weight:600; font-size:12px;">'.strtoupper($company_name).'</span><br>
															To: <span style="font-family:Century Gothic; font-weight:normal; font-size:12px; font-style:italic;"><u>'.strtoupper($fullname).'</u></span>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td align="center">							
												<br>
												<table width="400px" align="center">
													<tr>
														<td width="400px" style="font-family:Century Gothic; font-size:13px; color:#000000;">
															<span style="font-family:Century Gothic; font-weight:600; font-size:13px; margin-left:0px;">'.strtoupper($company_name).'</span> has registered you as one of<br>
															<span style="font-family:Century Gothic; font-size:13px;  margin-left:0px; margin-top:0px;">Foreign Worker Management System user.</span><br><br></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td align="center">							
												<br>
												<table width="400px" align="center">
													<tr>
														<td width="400px" style="font-family:Century Gothic; font-size:13px; color:#000000;">
															<span style="font-family:Century Gothic; font-weight:600; font-size:13px; margin-left:0px;">Your username:</span><br>
															<span style="font-family:Century Gothic; font-size:13px;  margin-left:0px; margin-top:0px; font-style:italic">'.$email.'</span><br><br>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td align="center">							
												<br><br>
												<table width="510px">
													<tr>
														<td width="100%" style="font-family:Century Gothic; font-size:13px; color:#000000;" align="center">
															<a href="'.$link.'/module/setting/user_verification.php?id='.$user_id.'&un='.$email.'&name='.$fullname.'">Activate</a>
														</td>
													</tr>
												</table>
												<br><br>
											</td>
										</tr>
										<tr style="background: linear-gradient(to right, rgba(255,128,174), rgba(254,122,136));" height="70px">
											<td height="70px" align="center">
												<table width="90%" height="70px" align="center">
													<tr height="70px">
														<td width="100%" height="70px" align="center" style="font-family:Century Gothic;"><span style="font-family:Century Gothic; font-weight:bold; font-size:13px; vertical-align:middle; text-align:center">Foreign Worker Management System</span> <span style="font-family:Century Gothic; font-weight:normal; font-size:13px; vertical-align:middle; text-align:center; font-style: italic;">Powered by Softworld Software Sdn Bhd</span></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</body>
					</html>';
					
					$subject = "FWMS Testing Registration";
					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: Foreign Worker Management System <webmaster@example.com>' . "\r\n";
					$headers .= "Reply-To: noreply@softworld.com.my \r\n";


					$retval = mail($_POST["email"],$subject,$message,$headers);
					 // $retval = mail($to,$subject,$message,$header);
				    // if(isset($retval))//change
				    // {
				    //     echo "Message sent successfully...";
				    // }
				    // else
				    // {
				    //     echo "Message could not be sent...";
				    // }
	/* End of Email ---------------------------------------------------------------------------------------------------------------------------------------------------------*/	

            } else {
               	echo "Error: " . $sql1 . "" . mysqli_error($con);
            } 
            echo "<script>window.location='../../main/mainIndex.php?page=user_management'</script>";	
		}
		else{
			$_SESSION['message'] = "<div class='alert alert-danger'>
										This user already exists!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>";
			echo "<script>window.location='../../main/mainIndex.php?page=add_user'</script>";	
		}
		$con->close();
	}else if(isset($_POST["edit_user"])){
		// Check connection
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		} 

		$sql = "UPDATE fwms_users SET name = '".$_POST['user_name']."', ic_no = '".$_POST['user_ic']."', position = '".$_POST['user_pos']."', department = '".$_POST['user_department']."', contact_no = '".$_POST['user_contact']."', access_level = '".$_POST['user_level']."', activation_email = '".$_POST['user_email']."' WHERE id = '".$_POST['user_id']."'";
		$result= mysqli_query($con, $sql);
		
		if($result){
			//audit trail 	
			$update_user= mysqli_query($con_audit, "INSERT INTO audit_trial SET user_id		= '".$_SESSION['id']."', 
																			    user_Level	= '".$_SESSION['access_level']."', 
																			    module    	= 'Settings - User Management',
																			    action		= 'Edit', 
																			    reference 	= 'User',
																			    table_name 	= 'fwms_users',
																			    table_id	= '".$_POST['user_id']."', 
																			    datetime	= '".$datetime."'") or die(mysqli_error($con_audit));
			$_SESSION['message'] = "<div class='alert alert-success'>
										Data has been edited successfully!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>";
		}
		$con->close();
		echo "<script>window.location='../../main/mainIndex.php?page=user_management'</script>";	
	}
?>