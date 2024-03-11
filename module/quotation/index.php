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

<main role="main" class="col-md-9 ml-sm-0 col-lg-12 pt-2 px-2" style="background-color: white;">
	<div class="row row2">
		<div class="col-12 title">
			<b>QUOTATION</b>
		</div>
		
		<div class="col-12">
			<table id="register" class="display" style="width:100%">
		        <thead>
		            <tr>
						<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
						<th style="padding:0;background-image:none !important;">NO</th>
						<th>QUOTE NO.</th>
		                <th>CUSTOMER NAME</th>
		                <th>VEHICLE NO</th>
		                <th>TITLE</th>
		                <th>SERVICE AMOUNT</th>
		                <th>PARTS AMOUNT</th>
		                <th>TOTAL</th>
		                <th>CREATED BY</th>
		                <th>REMARKS</th>
						<th style="width:10%;background-image:none !important;">ACTION</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th></th>
		                <th></th>
						<th>QUOTE NO.</th>
		                <th>CUSTOMER NAME</th>
		                <th>VEHICLE NO</th>
		                <th>TITLE</th>
		                <th>SERVICE AMOUNT</th>
		                <th>PARTS AMOUNT</th>
		                <th>TOTAL</th>
		                <th>CREATED BY</th>
		                <th>REMARKS</th>
						<th style="width:10%;background-image:none !important;"></th>
		            </tr>
		        </tfoot>
		        <tbody>
				<?php
						$counter = '';
							
						$query2 = "
							SELECT
								q.quotation_id,
								q.quote_no,
								q.customer_id,
								c.name,
								q.vehicle_id,
								v.plate_no,
								q.title,
								q.service_amount,
								q.parts_amount,
								q.total,
								q.staff_id,
								s.staff_name,
								q.remarks
							FROM
								quotation q
							JOIN
								customer c ON q.customer_id = c.customer_id
							JOIN
								vehicle v ON q.vehicle_id = v.vehicle_id
							JOIN
								staff s ON q.staff_id = s.staff_id
						";
							
						if($result2 = mysqli_query($query1,$query2)){
								
							while($row = mysqli_fetch_assoc($result2)){
								
								$counter++;
								echo '<tr>';
								echo '<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>';
								echo '<td>'.$counter.'</td>';
								echo '<td>'.$row["quote_no"].'</td>';
								echo '<td>'.$row["name"].'</td>';
								echo '<td>'.$row["plate_no"].'</td>';
								echo '<td>'.$row["title"].'</td>';
								echo '<td>'.$row["service_amount"].'</td>';
								echo '<td>'.$row["parts_amount"].'</td>';
								echo '<td>'.$row["total"].'</td>';
								echo '<td>'.$row["staff_name"].'</td>';
								echo '<td>'.$row["remarks"].'</td>';
								echo '
									<td>
									<!--loss of search function-->
										<a href="#"><img class="actionbtn" src="../include/icon/view.png"></a>&nbsp;
										<a class="delete-btn" href="#" data-quotation-id="' . $row["quotation_id"] . '"><img class="delete-btn" src="../include/img/action/delete.png"></a>&nbsp;
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

	// Handling row deletion
	$(document).on('click', 'a.delete-btn', function(e) {
			e.preventDefault();
			var row = $(this).closest('tr');
			var quotation_id = row.find('td:eq(0)').text();
			var confirmation = confirm("Are you sure you want to delete the quotation. " +  quotation_id + "?");

			if (confirmation) {
				// Perform AJAX request to delete the row in the database
				$.ajax({
					type: "GET",
					url: "../module/quotation/delete.php",
					data: {
						value: quotation_id
					},
					success: function(response) {
						// Handle success, update UI, etc.
						row.remove(); // Remove the row from the DataTable
					},
					error: function(error) {
						console.error("Error deleting quotation:", error);
						alert("An error occurred while deleting the quotation.");
					}
				});
			}
		});

		$('#register').DataTable();
</script>