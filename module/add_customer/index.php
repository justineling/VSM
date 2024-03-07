<?php
include "../include/connect.php";
$query1 = $connect;
?>

<style type="text/css">
    .row2{
    	padding-left: 0.3rem;
    	padding-right: 0.3rem;
		overflow-y: auto;
		overflow-x: hidden;
    }

	select.form-control:not([size]):not([multiple]) {
	    height: calc(1.6rem + 5px);
	    border-radius: 0px;
	    line-height: 1.0;
	    font-size: 12px;
	}
	form{
		margin-top: 5px;
	}
	table{
		margin-bottom: 5px;
	}
	.btn{
		font-size: 12px;
		font-weight: 900;
		font-family: 'Century Gothic';
	}
	.subtitle{
		font-size: 12px;
		font-weight: 900;
		font-family: 'Century Gothic';
	}
	#show_1{
		margin-top:10px;
		width: 70%;
	}
	#show_2{
		margin-top:10px;
		width: 70%;
	}
</style>

<main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-2 px-2" style="background-color: white;">
	<div class="row row2">
		<div class="col-12 title">
			<b>ADD CUSTOMERS</b>
		</div>
		<div class="col-12" id="message">
			<a type="button" class="btn btn-green" href="#" id = "1" onclick = "show(1)" style="background-color:#cccccc !important; color:#fff;">PERSONAL</a>&nbsp;
			<a type="button" class="btn btn-green" href="#" id = "2" onclick = "show(2)" style="background-color:#cccccc !important; color:#fff;">COMPANY</a>&nbsp;
		</div>
		
		<div id = "show_1">
			<form action="../module/add_customer/add.php" method="POST" enctype="multipart/form-data">
				<div class="col-12" style="border-bottom-style: groove;">
					<table width="50%">
						<tr>
							<td class="subtitle" width="14%">
								ACCOUNT CODE
							</td>
							<td width="30%">
								<input type="text" name="account_code" style="width:100%;" required>
							</td>
						</tr>
						<tr>
							<td class="subtitle" width="14%">
								NAME
							</td>
							<td width="30%">
								<input type="text" name="name" style="width:100%;" required>
							</td>
						</tr>
						
						<tr>
							<td class="subtitle" width="14%">
								IC
							</td>
							<td width="30%">
								<input type="text" name="ic" style="width:100%;" required>
							</td>
						</tr>
						
						<tr>
							<td class="subtitle" width="14%">
								CONTACT
							</td>
							<td width="30%">
								<input type="text" name="contact" style="width:100%;" required>
							</td>
						</tr>
						
						<tr>
							<td class="subtitle" width="14%">
								EMAIL
							</td>
							<td width="30%">
								<input type="text" name="email" style="width:100%;" required>
							</td>
						</tr>
						
						<tr>
							<td class="subtitle" width="14%">
								ADDRESS
							</td>
							<td width="30%">
								<textarea  name="address" cols="35" rows="3" required></textarea>
							</td>
						</tr>
						
						<tr>
							<td class="subtitle" width="14%">
								REMARKS
							</td>
							<td width="30%">
								<input type="text" name="remarks" style="width:100%;">
							</td>
						</tr>
						
						<tr>
							<td class="subtitle" width="14%">
								UPLOAD IC
							</td>
							<td width="30%">
								<input name='documents' type='file' id="fileUpload"/>
							</td>
						</tr>
						
					</table>
				
				</div>
				<div class="col-12" style="margin-top: 5px;">
					<input type="Submit" name="Submit" class="btn btn-green" value="SAVE">&nbsp;
					<a type="button" class="btn btn-green" href="#" onclick="discardForm()" style="background-color: red;">DISCARD</a>&nbsp;
				</div>
			</form>
		</div>
		
		<div id = "show_2">
			<form action="../module/add_customer/add.php" method="POST" enctype="multipart/form-data">
				<div class="col-12" style="border-bottom-style: groove;">
				
					<table width="40%">
						<tr>
							<td width="50%">
								<input type="radio" name="com_type" value="GOVERMENT"> GOVERMENT<br>
							</td>
							<td width="50%">
								<input type="radio" name="com_type" value="PRIVATE"> PRIVATE<br>
							</td>
						</tr>
					</table>
					
					<table>
						<tr>
							<td class="subtitle" width="5%">
								ACCOUNT CODE
							</td>
							<td width="10%">
								<input type="text" name="account_code" style="width:100%;" required>
							</td>
							<td width="1%">&nbsp;
							</td>
							<td class="subtitle" width="5%">
								COMPANY NAME
							</td>
							<td width="10%">
								<input type="text" name="company_name" style="width: 65%;" required>
							</td>
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								DEPARTMENT
							</td>
							<td width="10%">
								<input type="text" name="department" style="width:100%;">
							</td>
							<td width="1%">&nbsp;
							</td>
							<td class="subtitle" width="5%">
								ADDRESS
							</td>
							<td width="10%" rowspan="4">
								<textarea  name="address" cols="32" rows="6" required></textarea>
							</td>
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								OFFICE CONTACT
							</td>
							<td width="10%">
								<input type="text" name="contact_office" style="width:100%;" required>
							</td>
							<td width="1%">&nbsp;
							</td>
							<td width="5%">
								&nbsp;
							</td>
							
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								OFFICE FAX
							</td>
							<td width="10%">
								<input type="text" name="fax_office" style="width:100%;">
							</td>
							<td width="1%">&nbsp;
							</td>
							<td width="5%">
								&nbsp;
							</td>
							
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								EMAIL
							</td>
							<td width="10%">
								<input type="text" name="email_company" style="width:100%;" required>
							</td>
							<td width="1%">&nbsp;
							</td>
							<td width="5%">
								&nbsp;
							</td>
							
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								WEBSITE
							</td>
							<td width="10%">
								<input type="text" name="website" style="width:100%;">
							</td>
							<td width="1%">&nbsp;
							</td>
							<td width="5%">
								&nbsp;
							</td>
							<td width="10%" rowspan="4">
								&nbsp;
							</td>
						</tr>
					</table>
					
				</div>
				
				<div class="col-12" style="border-bottom-style: groove;margin-top: 5px;">
					<h6><u>DRIVER PARTICULAR</u></h6>
					<table>
						<tr>
							<td class="subtitle" width="5%">
								NAME
							</td>
							<td width="10%">
								<input type="text" name="name" style="width:100%;" required>
							</td>
							<td width="1%">&nbsp;
							</td>
							<td class="subtitle" width="5%">
								I/C
							</td>
							<td width="10%">
								<input type="text" name="ic" style="width: 65%;" required>
							</td>
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								CONTACT
							</td>
							<td width="10%">
								<input type="text" name="contact" style="width:100%;" required>
							</td>
							<td width="1%">&nbsp;
							</td>
							<td class="subtitle" width="5%">
								UPLOAD IC
							</td>
							<td width="10%">
								<input name='documents' type='file' required="true" id="fileUpload"/>
							</td>
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								EMAIL
							</td>
							<td width="10%">
								<input type="text" name="email" style="width:100%;" required>
							</td>
							<td width="1%">&nbsp;
							</td>
							<td width="5%">
								&nbsp;
							</td>
							<td width="10%" rowspan="3">
								&nbsp;
							</td>
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								REMARKS
							</td>
							<td width="10%">
								<input type="text" name="remarks" style="width:100%;">
							</td>
							<td width="1%">&nbsp;
							</td>
							<td width="5%">
								&nbsp;
							</td>
							
						</tr>
						<tr>
							<td class="subtitle" width="5%">
								&nbsp;
							</td>
							<td width="10%">
								&nbsp;
							</td>
							<td width="1%">&nbsp;
							</td>
							<td width="5%">
								&nbsp;
							</td>
						</tr>
						
					</table>
					
				</div>
				
				<div class="col-12" style="margin-top: 5px;">
					<input type="submit" name="submit1" class="btn btn-green" value="SAVE">&nbsp;
					<a type="button" class="btn btn-green" href="#" onclick="discardForm()" style="background-color: red;">DISCARD</a>&nbsp;
				</div>
				
			</form>
		</div>
		
	</div>
</main>
<script>
	function show(no){
		
		document.getElementById("show_"+no).style.display = "block";
		document.getElementById(no).style.background = "#008ae6";
		document.getElementById("show_"+((no==1)?2:1)).style.display = "none";
		document.getElementById(((no==1)?2:1)).style.background = "#cccccc";
	}
	
	document.getElementById("1").click();

	function discardForm() {
        location.reload();
    }
	
</script>