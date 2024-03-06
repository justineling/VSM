<?php
include "../include/connect.php";
$query1 = $connect;
?>

<link rel="stylesheet" href="../include/css/css.css">
<link rel="stylesheet" type="text/css" href="../include/DataTables/datatables.min.css"/>
<style type="text/css">
    .row2{
    	padding-left: 0.2rem;
    	padding-right: 0.2rem;
    	margin-top: 1rem;
    }
    table{
    	font-size: 11px;
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
			<b>JOBSHEET</b>
			<div style="float:right;">
				<a type="button" class="btn btn-green" href="../main/mainIndex.php?page=add_jobsheet">ADD</a>&nbsp; 
			</div>
		</div>
		
		<div class="col-12">
			<table id="register" class="display" style="width:100%">
		        <thead>
		            <tr>
						<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
						<th style="padding:0;background-image:none !important;">NO</th>
						<th>CUSTOMER</th>
		                <th>VEHICLE NO</th>
		                <th>DATE RECEIVED</th>
		                <th>COMPLETION DATE</th>
		                <th>TYPE OF WORK</th>
		                <th>BODY INSPECTION</th>
		                <th>WARNING INDICATOR</th>
		                <th>PICTURES</th>
		                <th>PARTS USED</th>
						<th>SERVICES</th>
						<th>INFORM CUSTOMERS</th>
						<th>QC CHECK</th>
						<th>CHECKED BY</th>
						<th>REMARKS</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th style="padding:0;"></th>
		                <th style="padding:0;"></th>
						<th>CUSTOMER</th>
		                <th>VEHICLE NO</th>
		                <th>DATE RECEIVED</th>
		                <th>COMPLETION DATE</th>
		                <th>TYPE OF WORK</th>
		                <th>BODY INSPECTION</th>
		                <th>WARNING INDICATOR</th>
		                <th>PICTURES</th>
		                <th>PARTS USED</th>
						<th>SERVICES</th>
						<th>INFORM CUSTOMERS</th>
						<th>QC CHECK</th>
						<th>CHECKED BY</th>
						<th>REMARKS</th>
		            </tr>
		        </tfoot>
		        <tbody>
					
					
		            <tr>
						<td style="padding:0;"><input type="checkbox" name="check[]" value="" id=""></td>
		                <td style="padding:0;">02</td>
						<td>RAYMOND</td>
		                <td>C1234</td>
		                <td>12/05/2018</td>
		                <td>22/05/2018</td>
		                <td>TYPE OF WORK</td>
		                <td>BODY INSPECTION</td>
		                <td>WARNING INDICATOR</td>
		                <td>PICTURES</td>
		                <td>PARTS USED</td>
						<td>SERVICES</td>
						<td>INFORM</td>
						<td>QC CHECK</td>
						<td>CHECKED BY</td>
						<td>NA</td>
		            </tr>
		            <!-- <tr>
		            	<th><?php echo $count; ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            	<th><?php ?></th>
		            </tr> -->
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
</script>