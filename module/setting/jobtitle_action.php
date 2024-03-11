<?php 
	session_start();
	include("../../include/dbconnection.php");
	$datetime = date("Y-m-d H:i:s");

  	if(isset($_POST["submit"])){
		// Check connection
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		} 
		
		$sql = "SELECT * FROM fwms_job_title WHERE access_level ='".$_POST["position"]."' ";
		$sql1 = "INSERT INTO fwms_job_title(access_level, description)VALUES ('".$_POST["position"]."', '".$_POST["description"]."')";
		$result= mysqli_query($con, $sql);

		//check if exists
		if(mysqli_num_rows($result) == 0){
			mysqli_query($con, $sql1);	  	
			$job_id = mysqli_insert_id($con);
			//audit trail
			$insert_job_title = mysqli_query($con_audit, "INSERT INTO audit_trial SET user_id		= '".$_SESSION['id']."', 
																				      user_Level	= '".$_SESSION['access_level']."', 
																				      module    	= 'Settings - Job Title',
																				      action		= 'Add', 
																				      reference 	= 'New Job Title',
																				      table_name 	= 'fwms_job_title',
																				      table_id	= '".$job_id."', 
																				      datetime	= '".$datetime."'") or die(mysqli_error($con_audit));
			$module_q = "SELECT * FROM fwms_module";
			$module = mysqli_query($con, $module_q);

        	while($module_p = mysqli_fetch_assoc($module)){
				$job = mysqli_query($con, $sql);
				$job_p = mysqli_fetch_assoc($job);
				
				$user_access = "INSERT INTO fwms_user_access(module_id, jobtitle_id, f_add, f_edit, f_view) VALUES ('".$module_p["id"]."', '".$job_p["id"]."', '0', '0', '0')";
				mysqli_query($con, $user_access);

				$access_id = mysqli_insert_id($con);
				//audit trail
				$insert_user_access = mysqli_query($con_audit, "INSERT INTO audit_trial SET user_id		= '".$_SESSION['id']."', 
																						    user_Level	= '".$_SESSION['access_level']."', 
																						    module    	= 'Settings - User Access',
																						    action		= 'Add', 
																						    reference 	= 'New User Access',
																						    table_name 	= 'fwms_user_access',
																						    table_id	= '".$access_id."', 
																						    datetime	= '".$datetime."'") or die(mysqli_error($con_audit));
			
				$_SESSION['message'] = "<div class='alert alert-success'>
											Data added successfully!
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
			}	
		}
		$con->close();
		echo "<script>window.location='../../main/mainIndex.php?page=job_title'</script>";
	}
	else
	if(isset($_POST["edit"])){
		// Check connection
		if ($con->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$jobtitle_id = $_POST['modal_id'];
		$jobtitle_position = $_POST['modal_position'];
		$jobtitle_description = $_POST['modal_description'];

		$sql = "UPDATE fwms_job_title SET access_level = '".$jobtitle_position."', description = '".$jobtitle_description."' WHERE id = '".$jobtitle_id."'";
		$result= mysqli_query($con, $sql);
		//audit trail
		$update_job_title = mysqli_query($con_audit, "INSERT INTO audit_trial SET user_id		= '".$_SESSION['id']."', 
																				    user_Level	= '".$_SESSION['access_level']."', 
																				    module    	= 'Settings - Job Title',
																				    action		= 'Edit', 
																				    reference 	= 'Job Title',
																				    table_name 	= 'fwms_job_title',
																				    table_id	= '".$jobtitle_id."', 
																				    datetime	= '".$datetime."'") or die(mysqli_error($con_audit));
		if($result){
			$_SESSION['message'] = "<div class='alert alert-success'>
										Data has been edited successfully!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>";
		}
		$con->close();
		
		echo "<script>window.location='../../main/mainIndex.php?page=job_title'</script>";	
	}
?>