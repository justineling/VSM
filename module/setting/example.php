<html>
<?php
error_reporting(0);
session_start();
//print_r($_SESSION);
?>

<html>

<head>
<title>Import Holiday</title>

<style>
@font-face {
	font-family:Century Gothic;
	src:url(../../include/font/century-gothic.ttf);
}

body
{
	font-family:Century Gothic;
	width:100%;
	height:100%;
	background:#FFFFFF;
	padding-bottom:30px;
	font-size:12px;
}

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

.bluesubmitbtn {
	font-family:Century Gothic;
	color:#0066ff;
	font-weight:normal;
	width:120px;
	height:32px;
	border:1px solid #0066FF;
	background-color: #FFF;
}

.bluesubmitbtn:hover {
	font-family:Century Gothic;
	font-weight:normal;
	width:120px;
	height:32px;
	border:1px solid #0066FF;
	color:#FFF;
	background-color:#0066ff;
}

.loadingbtn{
	border:1px solid #0066FF;
	background-color: #FFF;
}
</style>
</head>

<body style="overflow:hidden">
<form enctype="multipart/form-data" action="import_holiday_action.php" method="post" onSubmit="document.getElementById('import-button').style.display = 'none'; document.getElementById('loadingicon').style.display = 'block';">
  <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
  <table height="350" align="center" style="font-size:12px;">
	<tr>
		<td align="center" style="padding-top:50px"><img src="../../include/icon/action button/penguin/import-penguin.png"></td>
	</tr>
  	<tr align="center">
  		<td valign="middle" align="center">
        	<span style="color:#F00; align:center; font-weight:bold;">Note:<br> Please download given template.<br>Uploaded file must be excel (.xlsx/.xls) file.</span><br/>
			<?php
			if ($handle = opendir('downloads/')) {
				echo "<a href='download_file.php?file=holiday.xls'>Download Template</a>\n<br/><br/>";
				closedir($handle);
			}
			
			?>
		</td>	
	</tr>
		<td align="center">
			<span style="padding-left:80px"><strong>File Name:</strong><input type="file" name="fileToUpload1" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required /></span>
        	<br><br><br>
			<input type="submit" class="bluesubmitbtn" id="import-button" value="Upload" style="width:100px;"><br><br>
			<img src="../../include/icon/loading.gif" class="loadingbtn " id="loadingicon" style="display:none; width:100px; height:25px;">
		</td>
    </tr>
  </table>
  </form>
</body>

</html>

</html>
