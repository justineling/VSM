<?php
	include "../include/connect.php";

	$query1 = $connect;

	if (!$connect) {
		die("Database connection failure: " . mysqli_connect_error());
	}

	// Get value from SESSION
	$vehicle_id = isset($_SESSION['vehicle_id']) ? $_SESSION['vehicle_id'] : '';
	// Clear the value in the SESSION to prevent it from remaining on the next access
	unset($_SESSION['vehicle_id']);

	$query2 = "SELECT * FROM vehicle WHERE vehicle_id=$vehicle_id";
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
			<b>EDIT VEHICLE</b>
			
		</div>
		<div class="col-12" id="message">
			
		</div>
		<div class="col-12">
			<form action="../module/edit_vehicle/edit.php" method="GET">
				<table width="70%">
					<tr>
						<td class="subtitle" width="16%">
							PLATE NO.
						</td>
						<td width="30%">
							<input type="text" name="plate_no" style="width:100%;" placeholder="<?php echo isset($row['plate_no']) ? $row['plate_no'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							ENGINE NO.
						</td>
						<td width="30%">
							<input type="text" name="engine_no" style="width:100%;" placeholder="<?php echo isset($row['engine_no']) ? $row['engine_no'] : ''; ?>" required>
						</td>
					</tr>
					<tr>
						<td class="subtitle" width="16%">
							BRAND
						</td>
						<td width="30%">
							<input type="text" name="brand" style="width:100%;" placeholder="<?php echo isset($row['brand']) ? $row['brand'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							LAST SERVICE
						</td>
						<td width="30%">
							<input type="text" name="last_service" style="width:100%;" placeholder="<?php echo isset($row['last_service']) ? $row['last_service'] : ''; ?>" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							MODEL TYPE
						</td>
						<td width="30%">
							<input type="text" name="model_type" style="width:100%;" placeholder="<?php echo isset($row['model_type']) ? $row['model_type'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							MILEAGE
						</td>
						<td width="30%">
							<input type="text" name="mileage" style="width:100%;" placeholder="<?php echo isset($row['mileage']) ? $row['mileage'] : ''; ?>" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							OWNER
						</td>
						<td width="30%">
							<input type="text" name="owner" style="width:100%;" placeholder="<?php echo isset($row['owner']) ? $row['owner'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							COLOUR
						</td>
						<td width="30%">
							<input type="text" name="colour" style="width:100%;" placeholder="<?php echo isset($row['colour']) ? $row['colour'] : ''; ?>" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							CC
						</td>
						<td width="30%">
							<input type="text" name="cc" style="width:100%;" placeholder="<?php echo isset($row['cc']) ? $row['cc'] : ''; ?>" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							&nbsp;
						</td>
						<td width="30%">
							&nbsp;
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
                            <input type="hidden" name="vehicleId" value="<?php echo $vehicle_id; ?>">
							<input type="submit" name="Submit" class="btn btn-green" value="EDIT">&nbsp;
						</td>
					</tr>
				</table>
			</form>
		</div>
		
		<div class="col-12" id="access"></div>
	</div>
</main>