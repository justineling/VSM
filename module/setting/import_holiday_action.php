<?php 
error_reporting(0);
session_start();
include("../../include/dbconnection.php");
//require_once('../config.php');

date_default_timezone_set("Asia/Kuala_Lumpur");
mysql_query("SET TIME_ZONE = '+08:00'");

/**	Error reporting		**/
error_reporting(E_ALL);
/**	Include path		**/
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');  

include '../../include/Classes/PHPExcel/IOFactory.php';

/**	Load the quadratic equation solver worksheet into memory			**/
$temp = $_FILES['fileToUpload1']['name'];
$temp1 = $_FILES['fileToUpload1']['tmp_name'];
$objPHPExcel = PHPExcel_IOFactory::load($temp1);
$i=4;

$valid_formats = array("xls", "xlsx");

if(in_array(pathinfo($temp, PATHINFO_EXTENSION), $valid_formats) )
{
	do
	{
		$title = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();
		$date_from1 = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
		$date_to1 = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
		$remark = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
	
		$date_from = date("Y-m-d",strtotime(str_replace('/','-',$date_from1)));
		$date_to = date("Y-m-d",strtotime(str_replace('/','-',$date_to1)));
		
		$date_update = date('Y-m-d'); 
		$time_update = date('H:i A');
		
		//check blank row
		$check_blank = mysqli_query($con, "SELECT * FROM holiday WHERE title = '$title'");
		if($title == "" || $date_from1 == "" || $date_to1 == "")
		{
			//nothing
		}
		else if(mysqli_num_rows($check_blank))
		{
			echo "<script> window.parent.location.reload();</script>";
			$_SESSION['active_tab'] = "HOLIDAYS";
			$_SESSION["fail_msg"] = "Some Data Already Exist";			
		}else
		{
			$insert_holiday = mysqli_query($con, "INSERT INTO holiday SET 
										title='".strtoupper(addslashes($title))."', 
										date_from='".$date_from."', 
										date_to='".$date_to."', 
										date_update = '".$date_update."',
										time_update = '".$time_update."',
										remarks='".strtoupper($remark)."'")or die(mysqli_error());
		

			echo "<script> window.parent.location.reload();</script>";
			$_SESSION['active_tab'] = "HOLIDAYS";
			$_SESSION["berjaya_msg"] = "Import Success";
		}
		
		//sql end
		$i++;
		$check= $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();

	}while(!empty($check));

	$msg = "Data Empty! Please check file contain.";
}
else
{
	$msg = "Invalid File Format. <br/> Note: Use .xls or .xlsx extension";
}
?>
<html>
<head>
<title>Import Data</title>

<style>
.btn{
	cursor: pointer;
	background-color: #7BA428;
	-webkit-box-shadow: 2px 2px 2px #ccc;
	color: #FFF;
	font-weight: bold;
	height: 25px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
}
</style>
</head>

<body>
<table height="300" align="center">
	<tr>
    	<td valign="middle" align="center">
			<strong><?php echo $msg; ?></strong> <br/>
            <input type="button" style="background-color:#0066ff;color:#fff;font-family:Century Gothic;font-weight: 400;" name="back" value="Back to Instruction" onClick="location='import_holiday.php'" class="btn">
		</td>
    </tr>
</table>
</body>
</html>
