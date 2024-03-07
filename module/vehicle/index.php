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
			<b>VEHICLES</b>
			<div style="float:right;">
				<a type="button" class="btn btn-green" href="mainIndex.php?page=add_vehicle">ADD</a>&nbsp; 
			</div>
		</div>
			
		<div class="col-12">
			<table id="register" class="display" style="width:100%">
		        <thead>
		            <tr>
						<th style="width:2%;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
		                <th style="width:2%;">NO</th>
						<th>PLATE NO.</th>
		                <th>ENGINE NO.</th>
		                <th>BRAND</th>
		                <th>LAST SERVICE</th>
		                <th>MODEL TYPE</th>
		                <th>MILEAGE</th>
		                <th>OWNER</th>
						<th>COLOUR</th>
						<th>CC</th>
		               <th style="width:10%;background-image:none !important;">ACTION</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th></th>
		                <th></th>
						<th>PLATE NO.</th>
		                <th>ENGINE NO.</th>
		                <th>BRAND</th>
		                <th>LAST SERVICE</th>
		                <th>MODEL TYPE</th>
		                <th>MILEAGE</th>
		                <th>OWNER</th>
						<th>COLOUR</th>
						<th>CC</th>
		                <th></th>
		            </tr>
		        </tfoot>
		        <tbody>
					<?php
						$counter = '';
						$query2 = "SELECT * FROM vehicle";
						
						if($result2 = mysqli_query($query1,$query2)){
							
							while($row = mysqli_fetch_assoc($result2)){
								
								$counter++;
								echo '<tr>';
								echo '<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>';
								echo '<td>'.$counter.'</td>';
								echo '<td>'.$row["plate_no"].'</td>';
								echo '<td>'.$row["engine_no"].'</td>';
								echo '<td>'.$row["brand"].'</td>';
								echo '<td>'.$row["last_service"].'</td>';
								echo '<td>'.$row["model_type"].'</td>';
								echo '<td>'.$row["mileage"].'</td>';
								echo '<td>'.$row["owner"].'</td>';
								echo '<td>'.$row["colour"].'</td>';
								echo '<td>'.$row["cc"].'</td>';
								echo '
									<td>
									<!--loss of edit and search function-->
									<a href="mainIndex.php?page=edit_vehicle&value='.$row["vehicle_id"].'"><img class="actionbtn" src="../include/img/action/edit.png"></a>&nbsp;
										<a href="#"><img class="actionbtn" src="../include/img/action/search.png"></a>&nbsp;
										<a href="../module/add_vehicle/delete.php?value='.$row["vehicle_id"].'"><img class="actionbtn" src="../include/img/action/delete.png"></a>&nbsp;
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
</script>