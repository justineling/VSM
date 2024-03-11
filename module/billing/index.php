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
			<div style="float:right;">
				<a type="button" class="btn btn-green" href="mainIndex.php?page=add_billing">ADD</a>&nbsp; 
			</div>
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
						<th>STAFF</th>
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
						<th>STAFF</th>
						<th>REMARKS</th>
						<th style="width:10%;background-image:none !important;"></th>
		            </tr>
		        </tfoot>
		        <tbody>
				<?php
						$counter = '';
						$query2 = "
							SELECT
								b.billing_no,
								b.invoice_no,
								c.customer_id,
								c.name,
								v.vehicle_id,
								v.plate_no,
								b.title,
								b.service_amount,
								b.parts_amount,
								b.total,
								b.created_at,
								b.status,
								s.staff_id,
								s.staff_name,
								b.remarks
							FROM
								billing b
							JOIN
								customer c ON b.customer_id = c.customer_id
							JOIN
								vehicle v ON b.vehicle_id = v.vehicle_id
							JOIN
								staff s ON b.staff_id = s.staff_id
						";
						
						
						if ($result2 = mysqli_query($query1, $query2)) 
						{
							while ($row = mysqli_fetch_assoc($result2)) 
							{

								$counter++;
								echo '<tr>';
								echo '<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>';
								echo '<td>'.$counter.'</td>';
								//echo '<td>' . $row["billing_no"] . '</td>';
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
								echo '<td>' . $row["staff_name"] . '</td>';
								echo '<td>' . $row["remarks"] . '</td>';
								echo '
									<td>
									<a class="edit-btn" href="mainIndex.php?page=edit_billing&value='.$row["billing_no"].'"><img class="edit-btn" src="../include/img/action/edit.png"></a>&nbsp;
									<a class="delete-btn" href="../module/add_billing/delete.php?value='.$row["billing_no"].'"><img class="delete-btn" src="../include/img/action/delete.png"></a>&nbsp;
									</td>
								';
								echo '</tr>';
							}
						} 
						else 
						{
							echo "Error in query: " . mysqli_error($query1);
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
	    $('#register tfoot th').not(":eq(0), :eq(1), :eq(11)").each( function () {
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

	$('#register').DataTable();

</script>