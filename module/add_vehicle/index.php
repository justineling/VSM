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
			<b> VEHICLE</b>
			
		</div>
		<div class="col-12" id="message">
			
		</div>
		<div class="col-12">
			<form action="../module/add_vehicle/add.php" method="GET">
				<table width="70%">
					<tr>
						<td class="subtitle" width="16%">
							PLATE NO.
						</td>
						<td width="30%">
							<input type="text" name="plate_no" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							ENGINE NO.
						</td>
						<td width="30%">
							<input type="text" name="engine_no" style="width:100%;" required>
						</td>
					</tr>
					<tr>
						<td class="subtitle" width="16%">
							BRAND
						</td>
						<td width="30%">
							<input type="text" name="brand" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							LAST SERVICE
						</td>
						<td width="30%">
							<input type="text" name="last_service" style="width:100%;" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							MODEL TYPE
						</td>
						<td width="30%">
							<input type="text" name="model_type" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							MILEAGE
						</td>
						<td width="30%">
							<input type="text" name="mileage" style="width:100%;" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							OWNER
						</td>
						<td width="30%">
							<input type="text" name="owner" style="width:100%;" required>
						</td>
					<td width="3%"></td>
						<td class="subtitle" width="16%">
							COLOUR
						</td>
						<td width="30%">
							<input type="text" name="colour" style="width:100%;" required>
						</td>
					</tr>
					
					<tr>
						<td class="subtitle" width="16%">
							CC
						</td>
						<td width="30%">
							<input type="text" name="cc" style="width:100%;" required>
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
							<input type="submit" name="Submit" class="btn btn-green" value="ADD">&nbsp;
						</td>
					</tr>
				</table>
			</form>
		</div>
		
		<div class="col-12" id="access"></div>
	</div>
</main>