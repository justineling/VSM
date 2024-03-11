<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date('Y-m-d');
$time = date('H:i:s');

// Initialize $quotationId to avoid undefined variable warning
$quotationId = isset($_GET["quotationId"]) ? $_GET["quotationId"] : null;

// Check if $mysqli is not defined or null
if (!isset($mysqli) || $mysqli === null) {
    // Provide appropriate error handling, for example, redirect to an error page
    die("Database connection is not established.");
}

$quotation_q = mysqli_query($mysqli,"SELECT * FROM quotation WHERE quotationId = '".$quotationId."' AND displayStatus = 'ACTIVE'");
$quotation = mysqli_fetch_assoc($quotation_q);
?>
<style type="text/css">
body{
	color: black;
}
.row2{
	padding-left: 0.3rem;
	padding-right: 0.3rem;
	margin-top: 1rem;
	margin-bottom: 1rem;
}
table{
	font-size: 12px;
}
.spacerow{
	margin-bottom: 0.5rem;
	font-size: 12px;
}
.greyinput{
	border: 1px solid #000;
    width: 100%;
    padding: 0.2rem 0.2rem 0.2rem 0.3rem;
    height: auto;
    text-transform: uppercase;
    background: white;
}
th{
	padding: 0.5rem;
}
.sub{
	font-family: 'Century Gothic Bold';
}
.sub3{
	font-family: 'Century Gothic Bold';
	text-decoration: underline;
}
#img:hover {
	opacity: 0.7;
	cursor: pointer;
}

.info:hover {
	cursor: pointer;
}

/*START IMG MODAL*/
/* The Modal (background) */
.modal2 {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content2 {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content2, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close2 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close2:hover,
.close2:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
/*END IMG MODAL*/
</style>

<main role="main" class="col-md-11 ml-sm-auto col-lg-11 pt-3 px-4 scrollbar scrollstyle">
	<form method="post" action="../module/quotation/updatequotation_action.php?quotationId=<?php echo $quotationId; ?>&back=add" enctype="multipart/form-data" autocomplete="OFF">
		<div class="row row2" style="margin-bottom: 10%;">
			<div class="col-12">
				<?php 
					if(isset($_SESSION['error']))
					{
						echo "<div class='alert alert-danger' style='width:100%;'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
								".$_SESSION['error']."
							</div>";
						unset($_SESSION['error']);
					}
					else if(isset($_SESSION['msg']))
					{
						echo "<div class='alert alert-success' style='width:100%;'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
								".$_SESSION['msg']."
							</div>";
						unset($_SESSION['msg']);
					}
				?>
			</div>
			<div class="col-6 title">
				ADD QUOTATION
			</div>
			<div class="col-6" style="text-align:right">
				<input type="submit" name="discard" id="discard" value="DISCARD" style="text-transform:Uppercase;" class="actionbutton">&nbsp;
				<input type="submit" name="save" id="save" value="SAVE" style="text-transform:Uppercase;" class="actionbutton">
			</div>

			<div class="col-12">
				<div class="row">
					<div class="col-4">
<!-- 						<div class="row spacerow">
							<div class="col-4 sub">QUOTATION NO</div>
							<div class="col-7"><input type="text" name="quotationNo" id="quotationNo" value="<?php echo $quotation['quotationNo']; ?>" class="greyinput" readonly></div>
						</div> -->

						<div class="row spacerow">
							<div class="col-4 sub">DATE</div>
							<div class="col-7"><input type="date" name="quotationDate" id="quotationDate" value="<?php echo $quotation['quotationDate']; ?>" class="greyinput" readonly></div>
						</div>

						<div class="row spacerow">
							<div class="col-4 sub">CUSTOMER<b style="color: red;"> *</b></div>
							<div class="col-7">
								<?php
									if ($quotation['customerId'] != "")
									{
										$cusName = $quotation['customerId'].' : '.$quotation['customerName'];
									}
									else
									{
										$cusName = "";
									}
								?>

								<input class="greyinput" list="customerlist" id="customerName" name="customerName" value="<?php echo $cusName; ?>" onchange="saveCustomer(<?php echo $quotationId; ?>);">
								<input type="hidden" id="customerId" name="customerId" value="<?php echo $quotation['customerId']; ?>" readonly>

								<datalist id="customerlist">
								  	<?php
										$customer_q = sqlsrv_query($sqlsrv3,"SELECT * FROM Debtor WHERE IsActive = 'T' ORDER BY AccNo ASC");
										while($customer = sqlsrv_fetch_array($customer_q, SQLSRV_FETCH_ASSOC))
										{
											$original = array('"', "'");
											$replacement = array('""', "''");

											$customerName = str_ireplace($original, $replacement, $customer['CompanyName']);

											if ($customer['AccNo'] == $quotation['customerId']) 
											{
												$selected = "selected='selected'";
											}
											else
											{
												$selected = "";
											}
									?>
											<option value="<?php echo $customer['AccNo'].' : '.$customerName; ?>"<?php echo $selected; ?>></option>
									<?php
										}
									?>
								</datalist>
							</div>
							<div class="col-4"></div>
							<div class="col-7"><span id="customer_msg" style="color: red; display: none;"><b>Please select the customer!</b></span></div>
						</div>

						<div class="row spacerow">
							<div class="col-4 sub">ATTENTION<b style="color: red;"> *</b></div>
							<div class="col-7"><input type="text" name="customerAttention" id="customerAttention" class="greyinput" maxlength="40"></div>
						</div>

						<div class="row spacerow">
							<div class="col-4 sub">EMAIL</div>
							<div class="col-7"><input type="text" name="customerEmail" id="customerEmail" class="greyinput" value="<?php echo $quotation['customerEmail']; ?>" readonly></div>
						</div>

						<div class="row spacerow">
							<div class="col-4 sub">TITLE<b style="color: red;"> *</b></div>
							<div class="col-7"><input type="text" name="quotationTitle" id="quotationTitle" class="greyinput" value="<?php echo $quotation['quotationTitle']; ?>" style="text-transform:none;" onchange="saveTitle(this.value, <?php echo $quotationId; ?>);"></div>
						</div>

						<div class="row spacerow">
							<div class="col-4 sub">DATE OF DELIVERY<b style="color: red;"> *</b></div>
							<div class="col-7"><input type="date" name="quotationDateOfDelivery" id="quotationDateOfDelivery" class="greyinput" value="<?php echo $quotation['quotationDateOfDelivery']; ?>" onchange="saveDateOfDelivery(this.value, <?php echo $quotationId; ?>);"></div>
						</div>
					</div>

					<div class="col-4">
						<div class="row spacerow">
							<div class="col-4 sub">QUOTE BY COMPANY<b style="color: red;"> *</b></div>
							<div class="col-7">
								<select class="greyinput" id="quoteByCompanyId" name="quoteByCompanyId" onchange="saveCompanyId(this.value, <?php echo $quotationId; ?>);">
									<option value="SELECT">SELECT</option>
									<?php
										$company_q = mysqli_query($mysqli,"SELECT * FROM company WHERE displayStatus = 'ACTIVE' ORDER BY companyName ASC");
										while($company = mysqli_fetch_array($company_q))
										{
											if ($company['companyId'] == $quotation['companyId']) 
											{
												$selected = "selected='selected'";
											}
											else
											{
												$selected = "";
											}

											echo "<option value='".$company['companyId']."' ".$selected.">".$company['companyName']."</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="row spacerow">
							<div class="col-4 sub">REMARK</div>
							<div class="col-7">
								<textarea id="quotationRemark" name="quotationRemark" style="width: 100%; height: 100px; border: 1px solid black; padding-left: 0.3rem; padding-right: 0.3rem;" onchange="saveRemark(this.value, <?php echo $quotationId; ?>);"><?php echo $quotation['quotationRemark']; ?></textarea>
							</div>
						</div>

						<div class="row spacerow">
							<div class="col-4 sub">QUOTATION REFERENCE</div>
							<div class="col-7">
								<table style="width: 100%;">
							        <tbody>
									<?php
										$quotationref_q = mysqli_query($mysqli,"SELECT * FROM quotation_quotationreference WHERE quotationId = '".$quotationId."' AND displayStatus = 'ACTIVE'");
										while($quotationref = mysqli_fetch_assoc($quotationref_q))
										{
											$refquotationId[] = $quotationref['refquotationId'];
											$refquotation = implode(",", $refquotationId);
									?>
											<tr align="center">
								                <td style="width: 95%;"> 
													<input type="text" style="margin-bottom: 0.5rem;" value="<?php echo $quotationref['quotationQuotationReference']; ?>" class="greyinput" readonly>
												</td>
												<td>
													<div class="deletebutton" style="display:inline-block; margin-bottom: 0.5rem;" title="Add" onclick="quoref_Deleterow('<?php echo $quotationref['quoQuoRefId'] ?>');"></div>
												</td>
												<td style="width: 5%;">
													<!--a href="../main/mainIndex.php?page=quotationreferenceview&mainquotationId=<?php echo $quotationref['quotationId']; ?>&quotationId=<?php echo $quotationref['refquotationId']; ?>&back=viewquotation"><div class="viewbutton" style="display:inline-block;" title="View"></div></a-->
													<div class="viewbutton" style="display:inline-block; margin-bottom: 0.5rem; margin-top: 0;" title="View" onclick="viewRefModal('<?php echo $quotationref['refquotationId']; ?>');"></div>
												</td>
								            </tr>
									<?php
										}
									?>
										<tr align="center">
							                <td colspan="3" style="width: 85%;"> 
												<select class="greyinput" onchange="saveQuotationReference(this.value, <?php echo $quotationId; ?>);">
													<option value="SELECT">SELECT</option>
								                  	<?php
								                  		if (!empty($refquotation))
														{
															$cond = "AND quotationId NOT IN (".$refquotation.")";
														}
														else
														{
															$cond = "";
														}
														
														$quotation_q = mysqli_query($mysqli,"	SELECT * FROM quotation 
																								WHERE quotationStatus != 'ADDING' 
																								".$cond."
																								AND displayStatus = 'ACTIVE'
																								ORDER BY quotationNo ASC");
														while($quotation = mysqli_fetch_array($quotation_q))
														{
															echo "<option value='".$quotation['quotationId']."'>".$quotation['quotationNo']."</option>";
														}
													?>
								                </select>
											</td>
							            </tr>
							        </tbody>
							    </table>
							</div>
						</div>

						<!-- <div class="row spacerow">
							<div class="col-4 sub">QUOTATION REFERENCE</div>
							<div class="col-7">
								<table style="width: 100%;">
							        <tbody>
									<?php
										$quotation_q = mysqli_query($mysqli,"SELECT * FROM quotation_quotationreference WHERE quotationId = '".$quotationId."' AND displayStatus = 'ACTIVE'");
										while($quotation = mysqli_fetch_assoc($quotation_q))
										{
									?>
											<tr align="center">
								                <td style="width: 85%;"> 
													<input type="text" value="<?php echo $quotation['quotationQuotationReference']; ?>" class="greyinput" readonly>
												</td>
												<td>
													<div class="deletebutton" style="display:inline-block;" title="Add" onclick="quoref_Deleterow('<?php echo $quotation['quoQuoRefId'] ?>');"></div>
												</td>
												<td style="width: 5%;">
													<a href="../main/mainIndex.php?page=quotationreferenceview&mainquotationId=<?php echo $quotation['quotationId']; ?>&quotationId=<?php echo $quotation['refquotationId']; ?>&back=viewquotation"><div class="viewbutton" style="display:inline-block;" title="View"></div></a>
												</td>
								            </tr>
									<?php
										}
									?>
										<tr align="center">
							                <td colspan="3" style="width: 85%;"> 
												<select class="greyinput" onchange="saveQuotationReference(this.value, <?php echo $quotationId; ?>)";>
													<option value="SELECT">SELECT</option>
								                  	<?php
														$quotation_q = mysqli_query($mysqli,"SELECT * FROM quotation WHERE quotationStatus != 'ADDING' AND displayStatus = 'ACTIVE'");
														while($quotation = mysqli_fetch_array($quotation_q))
														{
															echo "<option value='".$quotation['quotationId']."'>".$quotation['quotationNo']."</option>";
														}
													?>
								                </select>
											</td>
							            </tr>
							        </tbody>
							    </table>
							</div>
						</div> -->
					</div>

					<?php 
						$quotation_q = mysqli_query($mysqli,"SELECT * FROM quotation WHERE quotationId = '".$quotationId."' AND displayStatus = 'ACTIVE'");
						$quotation = mysqli_fetch_assoc($quotation_q);	
					?>

					<div class="col-4">
						<div class="row spacerow">
							<div class="col-11 sub3">TERMS AND CONDITIONS</div>
						</div>

						<?php
							if ($quotation['quotationValidity'] != "")
							{
								$quotationValidity = $quotation['quotationValidity'];
							}
							else
							{
								$quotationValidity = "0";
							}

							if ($quotation['quotationDuration'] != "")
							{
								$quotationDuration = $quotation['quotationDuration'];
							}
							else
							{
								$quotationDuration = "0";
							}
						?>

						<div class="row spacerow">
							<div class="col-4 sub">VALIDITY<b style="color: red;"> *</b></div>
							<div class="col-7">
								<table style="width: 100%;">
									<tr>
										<td style="width: 60%;">
											<input type="number" name="quotationValidity" id="quotationValidity" value="<?php echo $quotationValidity; ?>" class="greyinput" onchange="saveValidity(this.value, <?php echo $quotationId; ?>)"></div>
										</td>
										<td style="width: 40%;">
											&nbsp;days
										</td>
									</tr>
								</table>
							</div>
						</div>

						<div class="row spacerow">
							<div class="col-4 sub">DURATION<b style="color: red;"> *</b></div>
							<div class="col-7">
								<table style="width: 100%;">
									<tr>
										<td style="width: 60%;">
											<input type="number" name="quotationDuration" id="quotationDuration" value="<?php echo $quotationDuration; ?>" class="greyinput" onchange="saveDuration(this.value, <?php echo $quotationId; ?>)"></div>
										</td>
										<td style="width: 40%;">
											&nbsp;working days
										</td>
									</tr>
								</table>
							</div>
						</div>

						<div class="row spacerow">
							<div class="col-4 sub">CREDIT</div>
							<div class="col-7">
								<input type="text" name="quotationCredit" id="quotationCredit" value="<?php echo $quotation['quotationCredit']; ?>" class="greyinput" readonly>
							</div>
						</div>

		<!-- 				<div class="row spacerow">
							<div class="col-4 sub">SEND EMAIL</div>
							<div class="col-7">
								<input type="checkbox" id="sendEmail" name="sendEmail" value="YES" onclick="showCustomerEmailModal();">
							</div>
						</div> -->
					</div>
				</div>
			</div>

			<div class="col-12" style="margin-top: 2%;">
				<div class="col-12">
					<div class="row spacerow" style="float:right; display:inline-block;"><input type="button" class="btn-yellow" value="ADD" style="width: 140px;" onclick="checkDataField();"></div>
				</div>
				<table border="0" style="width: 100%;">
					<tr align="center" style="border-top: 1px solid black;border-bottom: 1px solid black; background: black; color: white;">
						<th style="width:5%">NO</th>
						<th style="width:17%">PRODUCT</th>
						<th style="width:17%">PRODUCT TITLE</th>
						<th style="width:17%">QUANTITY</th>
						<th style="width:17%">UNIT PRICE</th>
						<th style="width:17%">AMOUNT</th>
						<th style="width:10%;">ACTION</th>
					</tr>
					<?php
						$quotationdetail_q = mysqli_query($mysqli,"SELECT * FROM quotationdetail WHERE quotationId = '".$quotationId."' AND displayStatus = 'ACTIVE'");
						$count = 0;
						while($quotationdetail = mysqli_fetch_array($quotationdetail_q))
						{
							$count++;
					?>
					<tr align="center" style="border-bottom: 1px solid #808080; ">
						<td style="vertical-align: text-top;"><?php echo $count; ?></td>
						<td style="vertical-align: text-top;"><?php echo $quotationdetail['ordertypeName']; ?></td>
						<td style="vertical-align: text-top;"><?php echo $quotationdetail['productTitle']; ?></td>
						<td colspan="3">
							<table border="0" style="width: 100%;">
								<?php 
									$quotationdetailqty_q = mysqli_query($mysqli,"SELECT * FROM quotationdetail_qty WHERE quotationDId = '".$quotationdetail['quotationDId']."' AND displayStatus = 'ACTIVE'");
									while($quotationdetailqty = mysqli_fetch_array($quotationdetailqty_q))
									{
										if($quotationdetailqty['quotationDRemark'] != '')
										{
											echo "
											<tr align='center'>
												<td style='padding:0.5rem; width:33.3%;' colspan='2'><table border='0' style='width: 100%;'><tr><td align='right' style='width:16.6%; padding-right: 5px;'>".number_format($quotationdetailqty['quotationDQty'])."</td><td style='width:16.6%;'><a href='#' title='View' class='modalbttnquoqtyremarkview' data-toggle='modal' data-id='".$quotationdetailqty['quoQtyId'].",/".$quotationdetailqty['quotationDRemark']."'><div class='viewbutton' style='display:inline-block;' title='View'></div></a></td></tr></table></td>
												<td style='padding:0.5rem; width:33.3%;'><input type='text' id='quotationDUnitPrice_".$quotationdetailqty['quoQtyId']."' name='quotationDUnitPrice_".$quotationdetailqty['quoQtyId']."' value='".$quotationdetailqty['quotationDUnitPrice']."' onkeypress='return isNumberKey(event)' onchange='savePrice(this.value, ".$quotationdetailqty['quotationDQty'].", ".$quotationdetailqty['quoQtyId'].");' style='text-align:center;' class='greyinput'></td>
												<td style='padding:0.5rem; width:33.3%;'><input type='text' id='quotationDAmount_".$quotationdetailqty['quoQtyId']."' name='quotationDAmount_".$quotationdetailqty['quoQtyId']."' value='".number_format($quotationdetailqty['quotationDAmount'],2,'.',',')."' class='greyinput' style='border:none; outline: none; text-align:center;' readonly></td>
											</tr>";
										}
										else
										{
											echo "
											<tr align='center'>
												<td style='padding:0.5rem; width:33.3%;' colspan='2'><table border='0' style='width: 100%;'><tr><td align='center' style='width:33.3%; padding-right: 5px;'>".number_format($quotationdetailqty['quotationDQty'])."</td></tr></table></td>
												<td style='padding:0.5rem; width:33.3%;'><input type='text' id='quotationDUnitPrice_".$quotationdetailqty['quoQtyId']."' name='quotationDUnitPrice_".$quotationdetailqty['quoQtyId']."' value='".$quotationdetailqty['quotationDUnitPrice']."' onkeypress='return isNumberKey(event)' onchange='savePrice(this.value, ".$quotationdetailqty['quotationDQty'].", ".$quotationdetailqty['quoQtyId'].");' style='text-align:center;' class='greyinput'></td>
												<td style='padding:0.5rem; width:33.3%;'><input type='text' id='quotationDAmount_".$quotationdetailqty['quoQtyId']."' name='quotationDAmount_".$quotationdetailqty['quoQtyId']."' value='".number_format($quotationdetailqty['quotationDAmount'],2,'.',',')."' class='greyinput' style='border:none; outline: none; text-align:center;' readonly></td>
											</tr>";
										}
									}

									$quotationdetailqty_q2 = mysqli_query($mysqli,"SELECT * FROM quotationdetail_qty WHERE quotationDId = '".$quotationdetail['quotationDId']."' AND displayStatus = 'ACTIVE' ORDER BY quoQtyId ASC LIMIT 1");
									$quotationdetailqty2 = mysqli_fetch_array($quotationdetailqty_q2);
								?>
							</table>
						</td>
						<td style="vertical-align: text-top;">
							<!--a href="../main/mainIndex.php?page=viewquotationproduct&quotationDId=<?php echo $quotationdetail['quotationDId']; ?>"><div class="viewbutton" style="display:inline-block; margin-top:0.5rem; margin-bottom: 0.5rem;" title="View"></div></a-->
							<a href="#" title="View" class="modalbttnquotationproductview" data-toggle="modal"><div class="viewbutton" style="display:inline-block; margin-top:0.5rem; margin-bottom: 0.5rem;" onclick="viewProductModal('<?php echo $quotationdetail['quotationDId'] ?>');"></div></a>
							<a href="../main/mainIndex.php?page=editquotationproduct&quotationDId=<?php echo $quotationdetail['quotationDId']; ?>&back=add"><div class="editbutton" style="display:inline-block; margin-top:0.5rem; margin-bottom: 0.5rem;" title="Edit"></div></a>
							<a href="../main/mainIndex.php?page=quotationproductqtyremark&quotationDId=<?php echo $quotationdetail['quotationDId']; ?>&quoQtyId=<?php echo $quotationdetailqty2['quoQtyId']; ?>&back=add"><div class="remarkbutton" style="display:inline-block; margin-top:0.5rem; margin-bottom: 0.5rem;" title="Remark"></div></a>
							<a href="#" title="Delete" class="modalbttndelete" data-toggle="modal" data-id="<?php echo "quotationdetail/".$quotationdetail['quotationDId']; ?>"><div class="deletebutton" style="display:inline-block; margin-top:0.5rem; margin-bottom: 0.5rem;"></div></a>
						</td>
					</tr>
					<?php  
						}
					?>
				</table>
			</div>
		</div>
	</form>
</main>

<script>
function saveCustomer(quotationId)
{
	var customerName = $("#customerName").val();
	var customerCode = $("#customerName").val().split(" : ");

	// var str2 = "&";

	// if(customerName.indexOf(str2) != -1)
	// {
	//     customerName = encodeURIComponent($("#customerName").val());
	// }
	
	var dataString = "customerCode="+customerCode[0]+"&quotationId="+quotationId;

	$.ajax({
        url: '../module/quotation/saveCustomer.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {
			if(result != "")
			{
				var parsed = jQuery.parseJSON(result);
	          	$("#customerAttention").val(parsed[0]);
	         	$("#customerEmail").val(parsed[1]);
	         	$("#quotationCredit").val(parsed[2]);
	         	$("#customerId").val(parsed[3]);
	         	$("#customer_msg").css("display", "none");
			}
        }
    });	
}

function saveAttn(quotationId)
{
	var customerAttention = $("#customerAttention").val();

	var str2 = "&";

	if(customerAttention.indexOf(str2) != -1)
	{
	    customerAttention = encodeURIComponent($("#customerAttention").val());
	}

	var dataString = "customerAttention="+customerAttention+"&quotationId="+quotationId;

	$.ajax({
        url: '../module/quotation/saveCustomerAttention.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {
			if(result != "")
			{
				$("#customerAttention").val(result);
			}
        }
    });	
}

function saveTitle(quotationTitle, quotationId)
{
	var str2 = "&";

	if(quotationTitle.indexOf(str2) != -1)
	{
	    quotationTitle = encodeURIComponent(quotationTitle);
	}
	
	var dataString = "quotationTitle="+quotationTitle+"&quotationId="+quotationId;
	
	$.ajax({
        url: '../module/quotation/saveTitle.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {}
    });	
}

function saveDateOfDelivery(quotationDateOfDelivery, quotationId)
{
	var dataString = "quotationDateOfDelivery="+quotationDateOfDelivery+"&quotationId="+quotationId;
	
	$.ajax({
        url: '../module/quotation/saveDateOfDelivery.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {}
    });	
}

function saveCompanyId(companyId, quotationId) 
{
	var dataString = "companyId="+companyId+"&quotationId="+quotationId;
	
	$.ajax({
        url: '../module/quotation/saveCompanyId.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {}
    });	
}

function saveRemark(quotationRemark, quotationId)
{
	var str2 = "&";

	if(quotationRemark.indexOf(str2) != -1)
	{
	    quotationRemark = encodeURIComponent(quotationRemark);
	}
	
	var dataString = "quotationRemark="+quotationRemark+"&quotationId="+quotationId;
	
	$.ajax({
        url: '../module/quotation/saveRemark.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {}
    });	
}

function saveQuotationReference(refquotationId, quotationId) 
{
	if (quotationId != "SELECT") 
	{
		var dataString = "refquotationId="+refquotationId+"&quotationId="+quotationId+"&back=add";
		
		$.ajax({
	        url: '../module/quotation/saveQuotationReference.php',
	        type: 'POST',
	        data: dataString,
	        success: function(result) 
	        {
	        	location.reload();
	        }
	    });	
	}
}

function saveValidity(quotationValidity, quotationId)
{
	var dataString = "quotationValidity="+quotationValidity+"&quotationId="+quotationId;
	
	$.ajax({
        url: '../module/quotation/saveValidity.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {}
    });	
}

function saveDuration(quotationDuration, quotationId)
{
	var dataString = "quotationDuration="+quotationDuration+"&quotationId="+quotationId;
	
	$.ajax({
        url: '../module/quotation/saveDuration.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {}
    });	
}

function quoref_Deleterow(quoQuoRefId) 
{
	var dataString = "quoQuoRefId="+quoQuoRefId;
	
	$.ajax({
        url: '../module/quotation/deleteQuotationReference.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {
        	location.reload();
        }
    });
}

function savePrice(price, qty, quoQtyId)
{
	var amount = price * qty;
	var dataString = "unitprice="+price+"&amount="+amount+"&quoQtyId="+quoQtyId;

	$.ajax({
        url: '../module/quotation/savePrice.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {
			//location.reload();
			$("#quotationDAmount_"+quoQtyId).val(amount.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
        }
    });		
}

function checkDataField()
{
	var customerId = $("#customerId").val();
	var quotationDateOfDelivery = $("#quotationDateOfDelivery").val();
	var quoteByCompanyId = $("#quoteByCompanyId").val();

	if (customerId == "") 
	{
		$("#customer_msg").css("display", "block");
	}
	else
	{
		$("#customer_msg").css("display", "none");
		location.href="../main/mainIndex.php?page=addquotationproduct&quotationId=<?php echo $quotationId; ?>&back=add";
	}
}

function showCustomerEmailModal()
{	
	var email = document.getElementById('customerEmail').value;
	if (email == "")
	{
		var title = "Please Enter The Customer Email";
		var button = "SUBMIT";
	}
	else
	{
		var title = "Please Check The Customer Email";
		var button = "CONFIRM";
	}

	$('body').append(
		'<div class="row fixed-top" style="z-index: 1041;">'+
			'<div id="modal" class="modal" style="max-height: calc(100% - 100px); top: 50%;left: 50%;transform: translate(-50%, -50%);">'+
				'<div id="modal_content" class="modal-content" style="width: 100%; margin: auto;">'+
					'<table border="0" style="height: auto; width: 100%; background: white;">'+
						'<tr>'+
							'<td colspan="2" align="center" style="font-size: 110%; font-weight:bold; padding-top:5%;">'+
								title+
								'<hr style="border-color: black; width: 90%;">'+
							'</td>'+
						'</tr>'+
						'<tr>'+
							'<td colspan="2" align="center">'+
								'<input type="email" id="customerEmail2" class="greyinput" style="width:80%; margin-top:3%; text-align:center; text-transform:none;" value="'+email+'" autofocus>'+
							'</td>'+
						'</tr>'+
						'<tr>'+
							'<td colspan="2" align="center" style="padding-bottom:6%;">'+
								'<input type="text" id="customerEmail_msg" style="width:100%; font-weight:bold; color:red; border:none; text-align:center;"/>'+
							'</td>'+
						'</tr>'+
						'<tr>'+
							'<td align="center" style="background:#959595;">'+
								'<input type="button" class="greyinput modalbtn" style="padding-top:3%; padding-bottom:3%; font-weight:bold; border:none; background:transparent;" value="CANCEL" onclick="close_modal();">'+
							'</td>'+
							'<td align="center" style="background:#07ff8d;">'+
								'<input type="button" class="greyinput modalbtn" style="padding-top:3%; padding-bottom:3%; font-weight:bold; border:none; background:transparent;" value="'+button+'" onclick="getCustomerEmail();">'+
							'</td>'+
						'</tr>'+
					'</table>'+
				'</div>'+
			'</div>'+
		'</div>'
	);
	$('#modal').fadeIn("slow");
	$('#modal').modal({show:true});
}

function close_modal()
{
	$('#sendEmail').prop('checked', false);
	$('#modal').modal('hide');
	$('#modal').detach();
}

function getCustomerEmail()
{
	var email = $('#customerEmail2').val();

	if(email == "")
	{
		$("#customerEmail_msg").val("Please provide the customer email!");
	}
	else
	{
		if(IsEmail(email) == false)
		{
			$("#customerEmail_msg").val("Wrong email format!");
		}
		else
		{
			var dataString = "customerEmail="+email+"&quotationId=<?php echo $quotationId; ?>";
	
			$.ajax({
		        url: '../module/quotation/saveEmail.php',
		        type: 'POST',
		        data: dataString,
		        success: function(result) 
		        {
					if(result != "")
					{
						var parsed = jQuery.parseJSON(result);
			          	$('#customerEmail').val(parsed[0]);
						$('#sendEmail').prop('checked', true);
						$('#modal').modal('hide');
						$('#modal').detach();
					}
		        }
		    });	
		}
	}
}

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    
	if(charCode == 46)
	{
		return true;
	}
	else if (charCode > 31 && (charCode < 48 || charCode > 57))
	{
		return false;
	}
	else
	{
		return true;
	}
}

function IsEmail(email) 
{
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if(!regex.test(email)) 
  {
    return false;
  }
  else
  {
    return true;
  }
}

function viewProductModal(quotationDId)
{
	var dataString = "quotationDId="+quotationDId;

	$.ajax({
        url: '../module/quotation/viewquotationproduct.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {
			if(result != "")
			{
				$(".modalcontquotationproductview").html(result);
			}
        }
    });	
}

function viewRefModal(quotationId) 
{
	$(".modalcontainerquotationrefview").fadeIn("slow");
	$(".modalquotationrefview").fadeIn("slow");

	viewRefContent(quotationId);

	$(".closequotationrefview").click(function() {
	    $(".modalcontainerquotationrefview").fadeOut("slow");
	    $(".modalquotationrefview").fadeOut("slow");
	});

	$(".buttonsquotationrefview").click(function() {
	    $(".modalcontainerquotationrefview").fadeOut("slow");
	    $(".modalquotationrefview").fadeOut("slow");
	});
}

function viewRefContent(quotationId)
{
	var dataString = "quotationId="+quotationId;

	$.ajax({
        url: '../module/inquiry/viewquotation.php',
        type: 'POST',
        data: dataString,
        success: function(result) 
        {
			if(result != "")
			{
				$(".modalcontquotationrefview").html(result);
			}
        }
    });	
}

function showImage(url, name)
{	
	$('body').append(
		'<div id="imgModal" class="modal2 fixed-top" style="z-index: 1041;">'+
		  	'<span class="close2" onclick="close_img_modal();"><img src="../include/icon/action/delete_white.png" id="closebtn" onclick="close_modal();"></span>'+
		  	'<img class="modal-content2" src="'+url+'">'+
		  	'<div id="caption">'+name+'</div>'+
		'</div>'
	);
	$('#modal').fadeIn("slow");
	$('#modal').modal({show:true});
}

function loosesheetrollformdirection_ShowModal()
{	
	$('body').append(
		'<div id="imgModal" class="modal2 fixed-top" style="z-index: 1041;">'+
		  	'<span class="close2" onclick="close_img_modal();"><img src="../include/icon/action/delete_white.png" id="closebtn" onclick="close_modal();"></span>'+
		  	'<img class="modal-content2" src="../include/icon/image/loosesheet/Roll Form Printing.jpg">'+
		  	'<div id="caption">ROLL FORM DIRECTION</div>'+
		'</div>'
	);
}

function loosesheetnamecardverticalfold_ShowModal()
{	
	$('body').append(
		'<div id="imgModal" class="modal2 fixed-top" style="z-index: 1041;">'+
		  	'<span class="close2" onclick="close_img_modal();"><img src="../include/icon/action/delete_white.png" id="closebtn" onclick="close_modal();"></span>'+
		  	'<img class="modal-content2" src="../include/icon/image/loosesheet/Name Card Vertical Fold.jpg">'+
		  	'<div id="caption">VERTICAL FOLD</div>'+
		'</div>'
	);
}

function loosesheetnamecardhorizontalfold_ShowModal()
{	
	$('body').append(
		'<div id="imgModal" class="modal2 fixed-top" style="z-index: 1041;">'+
		  	'<span class="close2" onclick="close_img_modal();"><img src="../include/icon/action/delete_white.png" id="closebtn" onclick="close_modal();"></span>'+
		  	'<img class="modal-content2" src="../include/icon/image/loosesheet/Name Card Horizontal Fold.jpg" style="height:60%; width:auto;">'+
		  	'<div id="caption">HORIZONTAL FOLD</div>'+
		'</div>'
	);
}

function close_img_modal()
{
	$('#imgModal').modal('hide');
	$('#imgModal').detach();
}

function goBack() {
    window.history.back();
}

function previewFile(productType, fileName)
{
	$(".modalcontainersopreview").fadeIn("slow");
    $(".modalsopreview").fadeIn("slow"); 

	// var fileType = "<?php echo $fileType; ?>";

	var content = '<iframe src="../include/upload/'+productType+'/'+fileName+'" style="width: 100%; height: 100%;"></iframe>'; 

    $(".sopreview").html(content);
}
</script>