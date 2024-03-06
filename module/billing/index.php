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
			<b>BILLING</b>
		</div>
		
		<div class="col-12">

			<table id="register" class="display" style="width:100%">
		        <thead>
		            <tr>
						<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
						<th style="padding:0;background-image:none !important;">NO</th>
						<th>INVOICE NO.</th>
		                <th>CUSTOMER NAME</th>
		                <th>VEHICLE NO</th>
		                <th>TITLE</th>
		                <th>SERVICE AMOUNT</th>
		                <th>PARTS AMOUNT</th>
		                <th>TOTAL</th>
		                <th>CREATED AT</th>
		                <th>STATUS</th>
						<th>REMARKS</th>
						<th style="width:10%;background-image:none !important;">ACTION</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th></th>
		                <th></th>
		                <th>INVOICE NO.</th>
		                <th>CUSTOMER NAME</th>
		                <th>VEHICLE NO</th>
		                <th>TITLE</th>
		                <th>SERVICE AMOUNT</th>
		                <th>PARTS AMOUNT</th>
		                <th>TOTAL</th>
		                <th>CREATED AT</th>
		                <th>STATUS</th>
						<th>REMARKS</th>
						<th style="width:10%;background-image:none !important;"></th>
		            </tr>
		        </tfoot>
		        <tbody>
				<?php
						
						$query = "
							SELECT
								b.billing_no,
								b.invoice_no,
								b.customer_id,
								c.name,
								v.vehicle_id,
								v.plate_no,
								b.title,
								b.service_amount,
								b.parts_amount,
								b.total,
								b.created_at,
								b.status,
								b.remarks
							FROM
								billing b
							JOIN
								customer c ON b.customer_id = c.customer_id
							JOIN
								vehicle v ON b.vehicle_id = v.vehicle_id
						";
						
						$result = mysqli_query($query1, $query);
						
						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<tr>';
								echo '<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>';
								echo '<td>' . $row["billing_no"] . '</td>';
								echo '<td>' . $row["invoice_no"] . '</td>';
								echo '<td>' . $row["name"] . '</td>';
								echo '<td>' . $row["plate_no"] . '</td>';
								echo '<td>' . $row["title"] . '</td>';
								echo '<td>' . $row["service_amount"] . '</td>';
								echo '<td>' . $row["parts_amount"] . '</td>';
								echo '<td>' . $row["total"] . '</td>';
								echo '<td>' . date('d-m-Y H:i:s') . '</td>';
								//echo '<td>' . date('d-m-Y H:i:s', strtotime($row["created_at"])) . '</td>';
								echo '<td>' . $row["status"] . '</td>';
								echo '<td>' . $row["remarks"] . '</td>';
								echo '
									<td>
									<a class="edit-btn" href="#" data-billing-no="' . $row["billing_no"] . '"><img class="edit-btn" src="../include/img/action/edit.png"></a>&nbsp;
									<a class="delete-btn" href="#" data-billing-no="' . $row["billing_no"] . '"><img class="delete-btn" src="../include/img/action/delete.png"></a>&nbsp;
									</td>
								';
								echo '</tr>';
							}
						} else {
							echo "Error in query: " . mysqli_error($query1);
						}
						
					?>
		        </tbody>
		    </table>
		</div>
	</div>


	<!-- Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Edit Billing Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<form id="editForm">
						<div class="form-group">
							<label for="editStatus">Status</label>
							<input type="text" class="form-control" id="editStatus" name="editStatus" required>
						</div>
						<button type="submit" class="btn btn-primary">Save Changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</main>

<script src="../include/js/jquery-2.1.3.min.js"></script>
<script src="../include/js/bootstrap.min.js"></script>
<script src="../include/DataTables/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#register tfoot th').not(":eq(0), :eq(1)").each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="search_input"  style="color:#000" />');
        });

        // Handling row deletion
		$(document).on('click', 'a.delete-btn', function(e) {
			e.preventDefault();
			var row = $(this).closest('tr');
			var billingNo = row.find('td:eq(1)').text(); // Assuming the billing_no is in the second column
			var confirmation = confirm("Are you sure you want to delete billing no. " + billingNo + "?");

			if (confirmation) {
				// Perform AJAX request to delete the row in the database
				$.ajax({
					type: "GET",
					url: "../module/billing/delete.php",
					data: {
						value: billingNo
					},
					success: function(response) {
						// Handle success, update UI, etc.
						row.remove(); // Remove the row from the DataTable
					},
					error: function(error) {
						console.error("Error deleting billing:", error);
						alert("An error occurred while deleting the billing.");
					}
				});
			}
		});


		// Handling row edit
		$(document).on('click', 'a.edit-btn', function(e) {
			e.preventDefault();
			var row = $(this).closest('tr');
			var billingNo = row.find('td:eq(1)').text();

			fetch("../module/billing/fetch.php?value=" + billingNo)
				.then(response => response.text()) // Use text() instead of json()
				.then(data => {
					// Extract data from HTML attributes
					var billingNo = $(data).attr('data-billing-no');
					var status = $(data).attr('data-status');

					// Populate the modal
					$('#editStatus').val(status);
					$('#editBillingNo').val(billingNo);

					// Show the modal
					$('#editModal').modal('show');
				})
				.catch(error => {
					console.error("Error fetching billing data for edit:", error);
					alert("An error occurred while fetching billing data for edit.");
				});
		});



		// Handling form submission for edit
		$('#editForm').submit(function(e) {
			e.preventDefault();

			// Serialize form data
			var formData = $(this).serialize();


			// Perform AJAX request to update the row in the database
			$.ajax({
				type: "POST",
				url: "../module/billing/update.php",
				data: {
						value: formData,
					},
				success: function(response) {
					console.log('Full response:', response); // Log the full response

					// Split the response into status and message
					var [status, message] = response.split('|');

					// Handle success or error
					if (status === 'success') {
						// Update UI or show success message
					} else {
						console.error("Error updating billing:", message);
						alert("An error occurred while updating the billing: " + message);
					}

					// Close the edit modal
					$('#editModal').modal('hide');
				},
				error: function(error) {
					console.error("Error updating billing:", error);
					alert("An error occurred while updating the billing.");
				}
			});
		});




		//console.log(response);


    });

	$('#register').DataTable();

</script>