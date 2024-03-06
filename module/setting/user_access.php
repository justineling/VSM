
<style type="text/css">
    .row2{
    	padding-left: 0.3rem;
    	padding-right: 33rem;
    	margin-top: 1rem;
    }
    .line{
    	margin-top: -2px;
    	border-top: 1px solid #000;
    	margin-bottom: 10px;
    	margin-right: unset;
    	margin-left: unset;
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
		font-size: 12px;

	}

	tbody{
		border-top: 1px solid #000;
	}

	tbody td{
		padding-top: 10px;
	}

	tbody tr{

	}
</style>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="row row2">
		<div class="col-12 title">
			<b> SETTINGS - USER ACCESS</b>
			<div style="float:right;">
				<!--<a type="button" class="btn btn-yellow modalimport" href="#" data-target="#import_reg">IMPORT</a>-->&nbsp;
				<a type="button" class="btn btn-green" href="../main/mainIndex.php?page=addreg">ADD</a>&nbsp; 
			</div>
		</div>
		
		<div class="col-12">
			<hr class="line">
			<table width="100%" style="border-bottom: 1px solid #000;" >
				<thead>
				<tr>
					<td class="subtitle" width="17.5%">USER ACCESS GROUP </td>
					<td width="30%">
						<form method="post">
							<select class="form-control" name="access_group_select" onchange="showAccess(this.value, '<?php echo $user;?>')">
								<option value="">-Select-</option>
								<option value="">User Admin</option>
							<?php 
								$sql = "SELECT id, access_level FROM fwms_job_title"; 
								$result = mysqli_query($con, $sql);
					        	if (mysqli_num_rows($result) > 0) {
						            while($row = mysqli_fetch_assoc($result)) {
							?>
						    	<option value="<?php echo strtoupper($row["id"]); ?>">
						      		<?php echo strtoupper($row["access_level"]); ?>
						      	</option>

						    <?php 	
									}
						    	}
						    ?>	     
						    </select> 				   
						</form>
					</td>
					<td width="10%"></td>
					<td width="10%"></td>
				</tr>
				</thead>

				<tbody>
					<tr>
						<td>NO</td>
		                <td>NAME</td>
		                <td>ADD</td>
		                <td>EDIT</td>
		                <td>VIEW</td>		              
					</tr>

					<tr>
						<td>01</td>
		                <td>CUSTOMERS</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="customers"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="customers"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="customers"></td>
					</tr>

					<tr>
						<td>02</td>
		                <td>VEHICLES</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="vehicles"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="vehicles"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="vehicles"></td>
					</tr>

					<tr>
						<td>03</td>
		                <td>APPOINTMENT</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="appointment"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="appointment"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="appointment"></td>
					</tr>

					<tr>
						<td>04</td>
		                <td>JOBSHEET</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="jobsheet"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="jobsheet"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="jobsheet"></td>
					</tr>

					<tr>
						<td>05</td>
		                <td>JOB BOARD</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="jobboard"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="jobboard"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="jobboard"></td>
					</tr>

					<tr>
						<td>06</td>
		                <td>QUOTATION</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="quoatation"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="quoatation"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="quoatation"></td>
					</tr>

					<tr>
						<td>07</td>
		                <td>BILLING</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="billing"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="billing"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="billing"></td>
					</tr>

					<tr>
						<td>08</td>
		                <td>PARTS</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="parts"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="parts"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="parts"></td>
					</tr>

					<tr>
						<td>09</td>
		                <td>REPORT</td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="report"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="report"></td>
		                <td><INPUT TYPE="Checkbox" Name="Access" ID="C1" Value="report"></td>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>

				</tbody>
			</table>

		</div>
		<div class="col-12" id="access"></div>
	</div>
</main>

<script src="../include/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">

	function showAccess(str,user){
		$.ajax({
		   type: "POST",
		   url: "../module/setting/getAccess.php",
		   data: 'id='+str+'&b='+user,
		   success: function(data){
		   		if(data!=""){
		   			$('#access').html(data);
		   		}
		   }
		});
	}

	function fullAccess(no){
	    if($('#full_'+no).is(':checked')) {
	        document.getElementById('f_add_'+no).checked=true; 
	        document.getElementById('f_edit_'+no).checked=true; 
	        document.getElementById('f_view_'+no).checked=true; 
	    }
	    else{
	        document.getElementById('f_add_'+no).checked=false; 
	        document.getElementById('f_edit_'+no).checked=false; 
	        document.getElementById('f_view_'+no).checked=false; 
	    }
	}
	
	function accessChecked(no){
	    if(!$('#f_add_'+no).is(':checked')) {
	        document.getElementById('full_'+no).checked=false; 
	    }
	    if(!$('#f_edit_'+no).is(':checked')) {
	        document.getElementById('full_'+no).checked=false; 
	    }
	    if(!$('#f_view_'+no).is(':checked')) {
	        document.getElementById('full_'+no).checked=false; 
	    }
	    if(	$('#f_add_'+no).is(':checked') && 
	    	$('#f_edit_'+no).is(':checked') && 
	    	$('#f_view_'+no).is(':checked')){
	        document.getElementById('full_'+no).checked=true; 
	    }
	}
</script>