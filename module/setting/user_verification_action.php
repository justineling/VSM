 <?php
	include("../../include/dbconnection.php");
	require "../../include/plugin/PasswordHash.php";
	date_default_timezone_set('Asia/Kuala_Lumpur');
	session_start();

	$datetimeday = date("l, d F Y , h:i a");
	$link = 'localhost/fwms';

	if(isset($_POST['submit']))
	{
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = addslashes($_POST['password']);

		//encrypt password
		$t_hasher = new PasswordHash(8, FALSE);
		$hash_password = $t_hasher->HashPassword($password);
	
		if ($password != ''){											
			$insert_pwd = "UPDATE fwms_users SET password = '".$hash_password."', status = 'ACTIVE', activation_email = '".$username."'WHERE id = '".$id."'";
			$result= mysqli_query($con, $insert_pwd);
			// $insert = mysqli_fetch_assoc($result);														
		}
	/* Email ----------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
		$company_q = "SELECT * FROM fwms_company_profile WHERE 1=1";
		$company = mysqli_query($con, $company_q);
		$company_p = mysqli_fetch_assoc($company);
		$company_name = $company_p['company_name'];
		$fullname = $_POST['fname'];

		$message = '<html>
						<head></head>
						<body>		
							<table width="100%" height="60%" style="font-family:Century Gothic; margin-top:30px;">
								<tr>
									<td>
										<table width="600px" height="70%" style="font-family:Century Gothic; background-color:#f0eff5;" align="center">
											<tr style="background-color:#ffab68;">
												<td align="center">
													<table width="480px" align="center">
														<tr>
															<td width="100%" style="padding-left:5px; text-align: center"><img src="'.$link.'/include/icon/logo.png" width="auto"></td>
														</tr>
														<tr>
															<td width="100%" style="font-family:Century Gothic; font-size:13px; text-align: center">
																<span style="font-family:Century Gothic; font-weight:600; font-size:13px;">User Account Activation</span><br>
																<span style="font-family:Century Gothic; font-size:13px;">03 JULY 2018 Malaysia Time</span><br>
																From: <span style="font-family:Century Gothic; font-weight:600; font-size:12px;">'.strtoupper($company_name).'</span><br>
																To: <span style="font-family:Century Gothic; font-weight:normal; font-size:12px; font-style:italic;"><u>'.$fullname.'</u></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td align="left" style="padding-left:30px">							
													<br>
													<table width="500px">
														<tr>
															<td width="500px" style="font-family:Century Gothic; font-size:13px; color:#000000;">
																<span style="font-family:Century Gothic; font-weight:normal; font-size:13px; margin-left:0px;">Dear '.$fullname.',</span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td align="left" style="padding-left:30px; padding-right:30px">							
													<br>
													<table width="500px">
														<tr>
															<td width="500px" style="font-family:Century Gothic; font-size:13px; color:#000000;">
																<span style="font-family:Century Gothic; font-weight:normal; font-size:13px; margin-left:0px;">Your account has successfully <span style="color:#00c475; font-style:italic; font-weight:600">ACTIVATED</span>. <span style="font-family:Century Gothic; font-weight:normal; font-size:13px; margin-left:0px;">Please click <spen style="font-style:italic"><a href="'.$link.'">here</a></span> to start<br> using this system.</span>
															</td>
														</tr>
													</table>
													<br><br>
												</td>
											</tr>
											<tr>
												<td align="left" style="padding-left:30px; padding-bottom:30px">							
													<br>
													<table width="500px">
														<tr>
															<td width="500px" style="font-family:Century Gothic; font-size:13px; color:#000000;">Thanks & Regards,</td>
														</tr>
														<tr>
															<td width="500px" style="font-family:Century Gothic; font-size:13px; color:#000000;">Foreign Worker Management Team</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr style="background: linear-gradient(to right, rgba(255,128,174), rgba(254,122,136));" height="70px">
												<td height="70px" align="center">
													<table width="90%" height="70px" align="center">
														<tr height="70px">
															<td width="100%" height="70px" align="center" style="font-family:Century Gothic;"><span style="font-family:Century Gothic; font-weight:bold; font-size:13px; vertical-align:middle; text-align:center">Foreign Worker Management System</span> <span style="font-family:Century Gothic; font-weight:normal; font-size:13px; vertical-align:middle; text-align:center">Powered by Softworld Software Sdn. Bhd.</span></td>
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

		$retval = mail($_POST['username'],$subject,$message,$headers);
		// $retval = mail($to,$subject,$message,$header);
			    // if(isset($retval)){
			    // 	echo $_POST['username'];
			    //     echo "Message sent successfully...";
			    // }
			    // else{
			    // 	echo "Message could not be sent...";
			    // }    
	/* End of Email ---------------------------------------------------------------------------------------------------------------------------------------------------------*/	

		//echo "<script>alert('Your account successfully registered. Thank You!');</script>";
		
		echo "<script>window.location='../../index.php'</script>";
	}

?>