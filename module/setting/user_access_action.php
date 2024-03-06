 <?php
 	session_start();
	include("../../include/dbconnection.php");
	$datetime = date("Y-m-d H:i:s");

	if(isset($_POST['save'])){
	 
		for($i = 1; $i <= $_POST['counter']; $i++){
			//detect row by row
			if(isset($_POST['access_row_id_'.$i])){
				$access_id = $_POST['access_row_id_'.$i];
				if(isset($_POST['f_add_'.$i])){
					$add = 1;
				}else{
					$add = 0;
				}
				if(isset($_POST['f_edit_'.$i])){
					$edit = 1;
				}else{
					$edit = 0;
				}
				if(isset($_POST['f_view_'.$i])){
					$view = 1;
				}else{
					$view = 0;
				}
				
				$update_q = "UPDATE fwms_user_access SET f_add = '".$add."', f_edit = '".$edit."', f_view = '".$view."'  WHERE id = '".$access_id."'";
				if (mysqli_query($con, $update_q)){
					//audit trail
					$insert_job_title = mysqli_query($con_audit, "INSERT INTO audit_trial SET user_id		= '".$_SESSION['id']."', 
																						      user_Level	= '".$_SESSION['access_level']."', 
																						      module    	= 'Settings - User Access',
																						      action		= 'Edit', 
																						      reference 	= 'User Access',
																						      table_name 	= 'fwms_user_access',
																						      table_id	= '".$access_id."', 
																						      datetime	= '".$datetime."'") or die(mysqli_error($con_audit));
		      		$_SESSION['message'] = "<div class='alert alert-success'>
												Data updated successfully!
												<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
											</div>";
		  		}else{
		      		echo "Error updating record: " . mysqli_error($conn);
		   		}
			}
		}
		echo "<script>window.location='../../main/mainIndex.php?page=user_access'</script>";	
	}
?>
