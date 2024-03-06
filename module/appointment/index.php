<?php
include "../include/connect.php";
$query1 = $connect;
?>

<link rel="stylesheet" href="../include/css/css.css">
<link rel="stylesheet" type="text/css" href="../include/DataTables/datatables.min.css"/>
<style type="text/css">
    .row2{
    	padding-left: 0.3rem;
    	padding-right: 0.3rem;
    	margin-top: 1rem;
    }
    table{
    	font-size: 12px;
    }
    table.dataTable{
    	border-collapse: collapse;
    	border-top: 1px solid #000;
    	border-bottom: 1px solid #000;
    }
    table.dataTable tfoot th, table.dataTable tfoot td {
    	padding: 6px 2px 6px 2px;
    }
	table th, td{
		text-align: center;
	}
    /*pagination button*/
    .dataTables_wrapper .dataTables_paginate .paginate_button{
    	padding:0.1rem 0.5rem;
    }
    .dataTables_wrapper .dataTables_paginate {
	    padding-top: 0.5rem;
	    font-size: 12px;
	}
	.modal-dialog{
		top:90px;
	}
	.modal-header{
		padding-left: 2rem;
		padding-right: 2rem;
		padding-bottom:0.5rem;
		z-index: 2000;
	}
	.modal-body{
		padding: 2rem;
		padding-top:1rem;
	}
	.modal-content{
		border-radius: 0;
	}
</style>

<main role="main" class="col-md-12 ml-sm-0 col-lg-12 pt-2 px-2" style="background-color: white;">
	<div class="row row2">
		<div class="col-12 title">
			<b>APPOINTMENT</b>
			<div style="float:right;">
                <!--loss of add function-->
				<a type="button" class="btn btn-green" href="mainIndex.php?page=add_appointment">ADD</a>&nbsp; 
			</div>
		</div>
		
		<div class="col-12">
			<table id="register" class="display" style="width:100%">
		        <thead>
		            <tr>
						<th style="width:2%;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
		                <th style="width:2%;">NO</th>
						<th>DATE</th>
		                <th>TIME</th>
		                <th>CUSTOMER</th>
		                <th>VEHICLE</th>
		                <th>SERVICE TYPE</th>
		                <th>PRE-ASSIGN MECHANIC</th>
		                <th>PRE-ASSIGN PARTS</th>
		                <th>REMARKS</th>
						<th style="width:10%;background-image:none !important;">ACTION</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th style="padding:0;"></th> 
						<th style="padding:0;"></th> 
						<th>DATE</th>
		                <th>TIME</th>
		                <th>CUSTOMER</th>
		                <th>VEHICLE</th>
		                <th>SERVICE TYPE</th>
		                <th>PRE-ASSIGN MECHANIC</th>
		                <th>PRE-ASSIGN PARTS</th>
		                <th>REMARKS</th>
		            </tr>
		        </tfoot>
		        <tbody>
					<?php
						$counter = '';
						$query2 = "SELECT appointment_id,customer_id,vehicle_id,date,time,service_id,staff_id,parts_id,remarks FROM appointment";
						
						if($result2 = mysqli_query($query1,$query2)){
							
							while($row = mysqli_fetch_assoc($result2)){
								
								$counter++;
								
								$appointment_id = $row["appointment_id"];
								$customer_id = $row["customer_id"];
								$vehicle_id = $row["vehicle_id"];
								$date = $row["date"];
								$time = $row["time"];
								$service_id = $row["service_id"];
								$staff_id = $row["staff_id"];
								$parts_id = $row["parts_id"];
								$remarks = $row["remarks"];
								
								echo '<tr>';
									
									echo '<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>';
									echo '<td>'.$counter.'</td>';
									echo '<td>',$date,'</td>';
									echo '<td>',$time,'</td>';
									
									$query3 = "SELECT name FROM customer WHERE customer_id=$customer_id";
									if($result3 = mysqli_query($query1,$query3)){
										if($row = mysqli_fetch_assoc($result3)){
											$customer_name = $row["name"];
											echo '<td>'.$customer_name.'</td>';		
										} else {
											echo '<td></td>'; 
										}
									}

									$query4 = "SELECT brand,model_type FROM vehicle WHERE vehicle_id=$vehicle_id";
									if($result4 = mysqli_query($query1,$query4)){
										if($row = mysqli_fetch_assoc($result4)){
											$brand = $row["brand"];
											$model = $row["model_type"];
											echo '<td>'.$brand.':'.$model.'</td>';
										} else {
											echo '<td></td>'; 
										}
									}

									$query5 = "SELECT service_type FROM service WHERE service_id=$service_id";
									if($result5 = mysqli_query($query1,$query5)){
										if($row = mysqli_fetch_assoc($result5)){
											$service_type = $row["service_type"];
											echo '<td>'.$service_type.'</td>';
										} else {
											echo '<td></td>'; 
										}
									}

									$query6 = "SELECT staff_name FROM staff WHERE staff_id=$staff_id";
									if($result6 = mysqli_query($query1,$query6)){
										if($row = mysqli_fetch_assoc($result6)){
											$staff_name = $row["staff_name"];
											echo '<td>'.$staff_name.'</td>';
										} else {
											echo '<td></td>'; 
										}
									}

									$query7 = "SELECT item_name FROM parts WHERE parts_id=$parts_id";
									if($result7 = mysqli_query($query1,$query7)){
										if($row = mysqli_fetch_assoc($result7)){
											$item_name = $row["item_name"];
											echo '<td>'.$item_name.'</td>';
										} else {
											echo '<td></td>'; 
										}
									}

									echo '<td>'.$remarks.'</td>';
								
									echo '
										<td>
											<!--loss of search function-->
											<a href="mainIndex.php?page=edit_appointment&value='.$appointment_id.'"><img class="actionbtn" src="../include/img/action/edit.png"></a>&nbsp;
											<a href="#"><img class="actionbtn" src="../include/img/action/search.png"></a>&nbsp;
											<a href="../module/add_appointment/delete.php?value='.$appointment_id.'"><img class="actionbtn" src="../include/img/action/delete.png"></a>&nbsp;
										</td>
									';
								echo '</tr>';
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</main>
</body>

<script src="../include/js/jquery-2.1.3.min.js"></script>
<script src="../include/js/bootstrap.min.js"></script>
<script src="../include/DataTables/datatables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#register tfoot th').not(":eq(0), :eq(1)").each( function () {
	        var title = $(this).text();
	         $(this).html( '<input type="text" class="search_input"  style="color:#000" />' );
	    } );

	    $('#register').DataTable( {
		    "bLengthChange": false, //disable the entries
		    "bFilter": true,
		    "bInfo": false,
		    "bAutoWidth": true,
		 	"sDom": '<"H"lTr><"datatable-scroll"t><"F"ip>' //disable search box
	    } );
	 
	    // DataTable
	    var table = $('#register').DataTable();

	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        });
	    });
	});

	$(".modalimport").click(function(){
		$("#import_reg").modal();
	});
</script>