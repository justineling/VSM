<?php
include "../include/connect.php";
$query1 = $connect;
?>

<style type="text/css">
    .row2{
    	padding-left: 0.3rem;
    	padding-right: 0.3rem;
    	margin-top: 1rem;
    }

	select.form-control:not([size]):not([multiple]) {
	    height: calc(1.6rem + 5px);
	    border-radius: 0px;
	    line-height: 1.0;
	    font-size: 12px;
	}
	form{
		margin-top: 10px;
	}
	.subtitle{
		font-size: 15px;
		font-family: 'Century Gothic';
		padding:15px;
	}
</style>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="row row2">
		<div class="col-12 title">
			<b>ADD BILLING</b>
			
		</div>
		<div class="col-12" id="message">
			
		</div>
		<div class="col-12">
			<form action="../module/add_billing/add.php" method="GET">
				<table width="70%">
					<tr>
						<td class="subtitle" width="16%">
							BILLING NO.
						</td>
						<td width="30%">
							<input type="text" name="billing_no" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							INVOICE NO.
						</td>
						<td width="30%">
							<input type="text" name="invoice_no" style="width:100%;" required>
						</td>
					</tr>
					<tr>
						<td class="subtitle" width="16%">
							CUSTOMER NAME
						</td>
						<td width="30%">
							<input type="text" name="customer_name" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							PLATE NO
						</td>
						<td width="30%">
							<input type="text" name="plate_no" style="width:100%;" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							TITLE
						</td>
						<td width="30%">
							<input type="text" name="title" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							SERVICE AMOUNT
						</td>
						<td width="30%">
							<input type="text" name="service_amount" style="width:100%;" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							PARTS AMOUNT
						</td>
						<td width="30%">
							<input type="text" name="parts_amount" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							TOTAL
						</td>
						<td width="30%">
							<input type="text" name="total" style="width:100%;" required>
						</td>
					</tr>

					<tr>
						<td class="subtitle" width="16%">
							CREATED AT
						</td>
						<td width="30%">
							<input type="text" name="created_at" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							STATUS
						</td>
						<td width="30%">
							<input type="text" name="status" style="width:100%;" required>
						</td>
					</tr>

					<tr>
						<td class="subtitle" width="16%">
							STAFF NAME
						</td>
						<td width="30%">
							<input type="text" name="staff_name" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							REMARKS
						</td>
						<td width="30%">
							<input type="text" name="remarks" style="width:100%;" required>
						</td>
					</tr>
					
					<tr>
						<td width="14%">
							&nbsp;
						</td>
						<td width="30%">
							&nbsp;
						</td>
					<td width="3%"></td>
						<td width="14%">
							&nbsp;
						</td>
						<td width="30%">
							<input type="submit" name="Submit" class="btn btn-green" value="ADD">&nbsp;
						</td>
					</tr>
				</table>
			</form>
		</div>
		
		<div class="col-12" id="access"></div>
	</div>
</main>