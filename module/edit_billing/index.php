<?php
	include "../include/connect.php";

	$query1 = $connect;

	if (!$connect) {
		die("Database connection failure: " . mysqli_connect_error());
	}

	// Get value from SESSION
	$billing_no = isset($_SESSION['billing_no']) ? $_SESSION['billing_no'] : '';
	// Clear the value in the SESSION to prevent it from remaining on the next access
	unset($_SESSION['billing_no']);

	$query2 = "SELECT * FROM billing WHERE billing_no=$billing_no";
	if($result = mysqli_query($query1,$query2)){
		$row = mysqli_fetch_assoc($result);
	}
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
			<b>EDIT BILLING</b>
			
		</div>
		<div class="col-12" id="message">
			
		</div>
		<div class="col-12">
			<form action="../module/edit_billing/edit.php" method="GET">
				<table width="70%">
				<tr>
						<td class="subtitle" width="16%">
							BILLING NO.
						</td>
						<td width="30%">
							<input type="text" name="billing_no" style="width:100%;" placeholder="<?php echo isset($row['billing_no']) ? $row['billing_no'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							INVOICE NO.
						</td>
						<td width="30%">
							<input type="text" name="invoice_no" style="width:100%;" placeholder="<?php echo isset($row['invoice_no']) ? $row['invoice_no'] : ''; ?>" required>
						</td>
					</tr>
					<tr>
						<td class="subtitle" width="16%">
							CUSTOMER NAME
						</td>
						<td width="30%">
							<input type="text" name="customer_name" style="width:100%;" placeholder="<?php echo isset($row['customer_name']) ? $row['customer_name'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							PLATE NO
						</td>
						<td width="30%">
							<input type="text" name="plate_no" style="width:100%;" placeholder="<?php echo isset($row['plate_no']) ? $row['plate_no'] : ''; ?>" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							TITLE
						</td>
						<td width="30%">
							<input type="text" name="title" style="width:100%;" placeholder="<?php echo isset($row['title']) ? $row['title'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							SERVICE AMOUNT
						</td>
						<td width="30%">
							<input type="text" name="service_amount" style="width:100%;" placeholder="<?php echo isset($row['service_amount']) ? $row['service_amount'] : ''; ?>" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							PARTS AMOUNT
						</td>
						<td width="30%">
							<input type="text" name="parts_amount" style="width:100%;" placeholder="<?php echo isset($row['parts_amount']) ? $row['parts_amount'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							TOTAL
						</td>
						<td width="30%">
							<input type="text" name="total" style="width:100%;" placeholder="<?php echo isset($row['total']) ? $row['total'] : ''; ?>" required>
						</td>
					</tr>

					<tr>
						<td class="subtitle" width="16%">
							CREATED AT
						</td>
						<td width="30%">
							<input type="text" name="created_at" style="width:100%;" placeholder="<?php echo isset($row['created_at']) ? $row['created_at'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							STATUS
						</td>
						<td width="30%">
							<input type="text" name="status" style="width:100%;" placeholder="<?php echo isset($row['status']) ? $row['status'] : ''; ?>" required>
						</td>
					</tr>

					<tr>
						<td class="subtitle" width="16%">
							STAFF NAME
						</td>
						<td width="30%">
							<input type="text" name="staff_name" style="width:100%;" placeholder="<?php echo isset($row['staff_name']) ? $row['staff_name'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							REMARKS
						</td>
						<td width="30%">
							<input type="text" name="remarks" style="width:100%;" placeholder="<?php echo isset($row['remarks']) ? $row['remarks'] : ''; ?>" required>
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
							<input type="hidden" name="billing_no" value="<?php echo $billing_no; ?>">
							<input type="submit" name="Submit" class="btn btn-green" value="ADD">&nbsp;
						</td>
					</tr>
				</table>
			</form>
		</div>
		
		<div class="col-12" id="access"></div>
	</div>
</main>