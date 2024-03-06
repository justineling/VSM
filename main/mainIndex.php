<html>
<?php 
	session_start();
	
	if ($_GET['page'] == 'customer') {
		$page = "customer";
	}
	else if ($_GET['page'] == 'add_customer') {
		$page = "add_customer";
	}
	
	else if ($_GET['page'] == 'vehicle') {
		$page = "vehicle";
	}
	else if ($_GET['page'] == 'add_vehicle') {
		$page = "add_vehicle";
	}
	
	else if ($_GET['page'] == 'appointment') {
		$page = "appointment";
	}
	else if ($_GET['page'] == 'jobsheet') {
		$page = "jobsheet";
	}
	else if ($_GET['page'] == 'add_jobsheet') {
		$page = "add_jobsheet";
	}
	else if ($_GET['page'] == 'job_board') {
		$page = "job_board";
	}
	else if ($_GET['page'] == 'quotation') {
		$page = "quotation";
	}
	else if ($_GET['page'] == 'billing') {
		$page = "billing";
	}
	else if ($_GET['page'] == 'parts') {
		$page = "parts";
	}
	else if ($_GET['page'] == 'add_parts') {
		$page = "add_parts";
	}
	else if ($_GET['page'] == 'add_save_parts') {
		$page = "add_save_parts";
	}
	else if ($_GET['page'] == 'edit_parts') {
		$page = "edit_parts";
	}
	else if ($_GET['page'] == 'edit_save_parts') {
		$page = "edit_save_parts";
	}
	else if ($_GET['page'] == 'delete_part') {
		$page = "delete_part";
	}
	else if ($_GET['page'] == 'services') {
		$page = "services";
	}
	else if ($_GET['page'] == 'add_service') {
		$page = "add_service";
	}
	else if ($_GET['page'] == 'edit_services') {
		$page = "edit_services";
	}
	else if ($_GET['page'] == 'edit_save_services') {
		$page = "edit_save_services";
	}
	else if ($_GET['page'] == 'delete_service') {
		$page = "delete_service";
	}
	else if ($_GET['page'] == 'report') {
		$page = "report";
	}
	
	else if ($_GET['page'] == 'setting') {
	   $page = "setting";
	}
	
	else if ($_GET['page'] == 'user_access') {
       $page = "user_access";
    }
	else if ($_GET['page'] == 'running_no') {
		$page = "running_no";
	}
	else
	{
		$page = "customer";
	}

	include '../header/header.php'; 
?>

</html>