	<?php
	include "../include/connect.php";

	$query1 = $connect;

	if (!$connect) {
		die("Database connection failure: " . mysqli_connect_error());
	}

	// Get value from SESSION
	$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : '';
	// Clear the value in the SESSION to prevent it from remaining on the next access
	unset($_SESSION['customer_id']);

	$query2 = "SELECT * FROM customer WHERE customer_id=$customer_id";
	if($result = mysqli_query($query1,$query2)){
		$row = mysqli_fetch_assoc($result);
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Edit Customer</title>
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
			
			.data-field {
            background-color: rgba(128, 128, 128, 0.3); 
            padding: 5px;
            border-radius: 3px;
            margin-bottom: 5px;
            width: 100%;
            font-size: 14px;
            box-sizing: border-box;
        }
		</style>
	</head>
	<body>
	<main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-2 px-2" style="background-color: white;">
		<div class="row row2">
			<div class="col-12 title">
				<b>EDIT CUSTOMERS</b>
			</div>
			<div class="col-12" id="message">
				<a type="button" class="btn btn-green" href="#" id = "1" onclick = "show(1)" style="background-color:#cccccc !important; color:#fff;">PERSONAL</a>&nbsp;
				<a type="button" class="btn btn-green" href="#" id = "2" onclick = "show(2)" style="background-color:#cccccc !important; color:#fff;">COMPANY</a>&nbsp;
			</div>

			<div id = "show_1">
				<form id="edit-form-1" action="../module/edit_customer/edit.php" method="POST" enctype="multipart/form-data">
					<div class="col-12" style="border-bottom-style: groove;">
						<table width="50%">
							<tr>
								<td class="subtitle" width="14%">
									ACCOUNT CODE
								</td>
								<td width="30%">
									<input type="text" name="account_code" style="width:100%;" placeholder="<?php echo isset($row['account_code']) ? $row['account_code'] : ''; ?>" required>
								</td>
							</tr>
							<tr>
								<td class="subtitle" width="14%">
									NAME
								</td>
								<td width="30%">
									<input type="text" name="name" style="width:100%;" placeholder="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" required>
								</td>
							</tr>

							<tr>
								<td class="subtitle" width="14%">
									NICKNAME
								</td>
								<td width="30%">
									<input type="text" name="nickname" style="width:100%;" placeholder="<?php echo isset($row['nickname']) ? $row['nickname'] : ''; ?>" required>
								</td>
							</tr>

							<tr>
								<td class="subtitle" width="14%">
									TYPE
								</td>
								<td width="30%">
									<input type="text" name="type" style="width:100%;" placeholder="<?php echo isset($row['type']) ? $row['type'] : ''; ?>" required>
								</td>
							</tr>

							<tr>
								<td class="subtitle" width="14%">
									IC
								</td>
								<td width="30%">	
									<input type="text" name="ic" style="width:100%;" placeholder="<?php echo isset($row['ic']) ? $row['ic'] : ''; ?>" required>
								</td>
							</tr>
							<tr>
								<td class="subtitle" width="14%">
									CONTACT
								</td>
								<td width="30%">	
									<input type="text" name="contact" style="width:100%;" placeholder="<?php echo isset($row['personal_contact']) ? $row['personal_contact'] : ''; ?>" required>
								</td>
							</tr>
							<tr>
								<td class="subtitle" width="14%">
									EMAIL
								</td>
								<td width="30%">
									<input type="text" name="email" style="width:100%;" placeholder="<?php echo isset($row['personal_email']) ? $row['personal_email'] : ''; ?>" required>
								</td>
							</tr>
							<tr>
								<td class="subtitle" width="14%">
									ADDRESS
								</td>
								<td width="30%">
								<textarea name="address" cols="35" rows="3" required placeholder="<?php echo isset($row['address']) ? $row['address'] : ''; ?>"></textarea>
								</td>
							</tr>

							<tr>
								<td class="subtitle" width="14%">
									OUTSTANDING
								</td>
								<td width="30%">
									<input type="text" name="outstanding" style="width:100%;" placeholder="<?php echo isset($row['outstanding']) ? $row['outstanding'] : ''; ?>" required>
								</td>
							</tr>

							<tr>
								<td class="subtitle" width="14%">
									NO. OF VEHICLES
								</td>
								<td width="30%">
									<select name="plate_no" style="width:100%;" required>
										<option value="">Select Vehicle</option>
										<?php
										$queryVeh = "SELECT plate_no FROM vehicle";
										$result = mysqli_query($query1, $queryVeh);
										while ($row = mysqli_fetch_assoc($result)) {
											echo "<option value='" . $row['plate_no'] . "'>" . $row['plate_no'] . "</option>";
										}
										?>
									</select>
								</td>
							</tr>

							<tr>
								<td class="subtitle" width="14%">
									STATUS
								</td>
								<td width="30%">
									<input type="text" name="status" style="width:100%;" placeholder="<?php echo isset($row['status']) ? $row['status'] : ''; ?>" required>
								</td>
							</tr>

							<tr>
								<td class="subtitle" width="14%">
									REMARKS
								</td>
								<td width="30%">
									<input type="text" name="remarks" style="width:100%;" placeholder="<?php echo isset($row['remarks']) ? $row['remarks'] : ''; ?>">
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
						<input type="hidden" name="customerId" value="<?php echo $customer_id; ?>">
						<input type="Submit" name="Submit" class="btn btn-green" value="SAVE">&nbsp;
						<a id="discardBtn1" type="button" class="btn btn-green" href="#" style="background-color: red;">DISCARD</a>
						&nbsp;
					</div>
				</form>
			</div>
			
			<div id = "show_2">
				<form id="edit-form-2" action="../module/edit_customer/edit.php" method="POST" enctype="multipart/form-data">
					<div class="col-12" style="border-bottom-style: groove;">
			
						<table width="40%">
							<tr>
							<td width="50%">
								<input type="radio" name="com_type" value="GOVERNMENT" <?php if(isset($row['goverment_private']) && $row['goverment_private'] == 'GOVERNMENT') echo 'checked'; ?>> GOVERNMENT<br>
							</td>
							<td width="50%">
								<input type="radio" name="com_type" value="PRIVATE" <?php if(isset($row['goverment_private']) && $row['goverment_private'] == 'PRIVATE') echo 'checked'; ?>> PRIVATE<br>
							</td>
							</tr>
						</table>
						
						<table>
							<tr>
								<td class="subtitle" width="5%">
									ACCOUNT CODE
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="account_code" style="width:100%;" required placeholder="<?php echo isset($row['account_code']) ? $row['account_code'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;</td>
								<td class="subtitle" width="5%">
									COMPANY NAME
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="company_name" style="width: 65%;" required placeholder="<?php echo isset($row['company_name']) ? $row['company_name'] : ''; ?>">
								</td>
							</tr>
							<tr>
								<td class="subtitle" width="5%">
									DEPARTMENT
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="department" style="width:100%;" placeholder="<?php echo isset($row['department']) ? $row['department'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;</td>
								<td class="subtitle" width="5%">
									ADDRESS
								</td>
								<td width="10%" rowspan="4">
									<textarea class="data-field" name="address" cols="32" rows="6" required placeholder="<?php echo isset($row['address']) ? $row['address'] : ''; ?>"></textarea>
								</td>
							</tr>
							<tr>
								<td class="subtitle" width="5%">
									OFFICE CONTACT
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="contact_office" style="width:100%;" required placeholder="<?php echo isset($row['office_ontact']) ? $row['office_ontact'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;</td>
								<td width="5%">&nbsp;</td>
								
							</tr>
							<tr>
								<td class="subtitle" width="5%">
									OFFICE FAX
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="fax_office" style="width:100%;" placeholder="<?php echo isset($row['office_fax']) ? $row['office_fax'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;</td>
								<td width="5%">&nbsp;</td>
								
							</tr>
							<tr>
								<td class="subtitle" width="5%">
									EMAIL
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="email_company" style="width:100%;" required placeholder="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;</td>
								<td width="5%">&nbsp;</td>
								
							</tr>
							<tr>
								<td class="subtitle" width="5%">
									WEBSITE
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="website" style="width:100%;" placeholder="<?php echo isset($row['website']) ? $row['website'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;</td>
								<td width="5%">&nbsp;</td>
								<td width="10%" rowspan="4">&nbsp;</td>
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
									<input class="data-field" type="text" name="name" style="width:100%;" required placeholder="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
								</td>
								
								<td 
									width="1%">&nbsp;
								</td>

								<td class="subtitle" width="5%">
									NICKNAME
								</td>
								<td width="10%">
									<input type="text" name="nickname" style="width:100%;" required placeholder="<?php echo isset($row['nickname']) ? $row['nickname'] : ''; ?>">
								</td>
							</tr>


							<tr>
								<td class="subtitle" width="5%">
									TYPE
								</td>
								<td width="10%">
									<input type="text" name="type" style="width:100%;" required placeholder="<?php echo isset($row['type']) ? $row['type'] : ''; ?>">
								</td>
							
								<td 
									width="1%">&nbsp;
								</td>

								<td class="subtitle" width="5%">
									I/C
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="ic" style="width: 65%;" required placeholder="<?php echo isset($row['ic']) ? $row['ic'] : ''; ?>">
								</td>
							</tr>
							<tr>
								<td class="subtitle" width="5%">
									CONTACT
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="contact" style="width:100%;" required placeholder="<?php echo isset($row['personal_contact']) ? $row['personal_contact'] : ''; ?>">
								</td>

								<td 
									width="1%">&nbsp;
								</td>

								<td class="subtitle" width="5%">
									OUTSTANDING
								</td>
								<td width="10%">
									<input type="text" name="outstanding" style="width:100%;" required placeholder="<?php echo isset($row['outstanding']) ? $row['outstanding'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;
								</td>
							</tr>	

							<tr>
								<td class="subtitle" width="5%">
									NO. OF VEHICLES
								</td>
								<td width="10%">
									<select name="plate_no" style="width:100%;" required>
										<option value="">Select Vehicle</option>
										<?php
										$queryVeh = "SELECT plate_no FROM vehicle";
										$result = mysqli_query($query1, $queryVeh);
										while ($row = mysqli_fetch_assoc($result)) {
											echo "<option value='" . $row['plate_no'] . "'>" . $row['plate_no'] . "</option>";
										}
										?>
									</select>
								</td>
								
								<td 
									width="1%">&nbsp;
								</td>

								<td class="subtitle" width="5%">
									STATUS
								</td>
								<td width="10%">
									<input type="text" name="status" style="width:100%;" required placeholder="<?php echo isset($row['status']) ? $row['status'] : ''; ?>">
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
									<input class="data-field" type="text" name="email" style="width:100%;" required placeholder="<?php echo isset($row['personal_email']) ? $row['personal_email'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;</td>
								<td width="5%">&nbsp;</td>
								<td width="10%" rowspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td class="subtitle" width="5%">
									REMARKS
								</td>
								<td width="10%">
									<input class="data-field" type="text" name="remarks" style="width:100%;" placeholder="<?php echo isset($row['remarks']) ? $row['remarks'] : ''; ?>">
								</td>
								<td width="1%">&nbsp;</td>
								<td width="5%">&nbsp;</td>
							</tr>
							<tr>
								<td class="subtitle" width="5%">&nbsp;</td>
								<td width="10%">&nbsp;</td>
								<td width="1%">&nbsp;</td>
								<td width="5%">&nbsp;</td>
							</tr>
						</table>
											
					</div>

					<div class="col-12" style="margin-top: 5px;">
						<input type="hidden" name="customerId" value="<?php echo $customer_id; ?>">
						<input type="submit" name="submit" class="btn btn-green" value="SAVE">&nbsp;
						<a id="discardBtn2" type="button" class="btn btn-green" href="#" style="background-color: red;">DISCARD</a>
						&nbsp;
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

		document.getElementById("discardBtn1").addEventListener("click", function(event) {
			event.preventDefault(); 
			document.getElementById("edit-form-1").reset();
    	});

   		document.getElementById("discardBtn2").addEventListener("click", function(event) {
			event.preventDefault(); 
			document.getElementById("edit-form-2").reset();
    	});
	
	</script>
	</body>
	</html>
