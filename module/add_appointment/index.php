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
			<b>ADD APPOINTMENTS</b>
		</div>

		<div id = "show_1">
			<form id="add-form" action="../module/add_appointment/add.php" method="GET" enctype="multipart/form-data">
				<div class="col-12" style="border-bottom-style: groove;">
					<table width="50%">
						<tr>
                            <td class="subtitle" width="14%">
                                    CUSTOMER NAME
                            </td>    
                            <td width="30%">
                                <select name="customer_name" style="width:100%;" required>
                                    <option value="">Select Customer</option>
                                    <?php
                                    $queryCus = "SELECT name FROM customer";
                                    $result = mysqli_query($query1, $queryCus);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
						</tr>
                        
						<tr>
							<td class="subtitle" width="14%">
                                VEHICLE PLATE NO.
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
                                SERVICE TYPE
							</td>
							<td width="30%">
                                <select name="service_type" style="width:100%;" required>
                                    <option value="">Select Service</option>
                                    <?php
                                    $querySer = "SELECT service_type FROM service";
                                    $result = mysqli_query($query1, $querySer);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['service_type'] . "'>" . $row['service_type'] . "</option>";
                                    }
                                    ?>
                                </select>
							</td>
						</tr>
						
						<tr>
							<td class="subtitle" width="14%">
                                PRE-ASSIGN MECHANIC
							</td>
							<td width="30%">
                                <select name="pre_assign_mechanic" style="width:100%;" required>
                                    <option value="">Select Pre-assign Mechanic</option>
                                    <?php
                                    $queryMec = "SELECT staff_name FROM staff";
                                    $result = mysqli_query($query1, $queryMec);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['staff_name'] . "'>" . $row['staff_name'] . "</option>";
                                    }
                                    ?>
                                </select>
							</td>
						</tr>
						
						<tr>
							<td class="subtitle" width="14%">
                                PRE-ASSIGN PARTS
							</td>
							<td width="30%">
                                <select name="pre_assign_parts" style="width:100%;" required>
                                    <option value="">Select Pre-assign Parts</option>
                                    <?php
                                    $queryPart = "SELECT item_name FROM parts";
                                    $result = mysqli_query($query1, $queryPart);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['item_name'] . "'>" . $row['item_name'] . "</option>";
                                    }
                                    ?>
                                </select>
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
                                DATE
                            </td>
                            <td width="30%">
                                <input type="date" name="date" id="date">
                            </td>
                        </tr>

                        <tr>
                            <td class="subtitle" width="14%">
                                TIME
                            </td>
                            <td width="30%">
                                <input type="time" name="time" id="time">
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

    // Add a hidden field to store the selected time in the format HH:MM:SS
    document.getElementById("time").addEventListener("change", function() {
        var timeInput = this.value;
        // If the time format does not include seconds, add the seconds manually
        if (timeInput.split(':').length === 2) {
            timeInput += ':00'; // Add Seconds
        }
        // Assign the selected time value to the hidden field
        document.getElementById("hiddenTime").value = timeInput;
    });

    function discardForm() {
        location.reload();
    }
	
</script>