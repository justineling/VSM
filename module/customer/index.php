<?php
include "../include/connect.php";

$query1 = $connect;

if (!$connect) {
    die("Database connection failure: " . mysqli_connect_error());
}

/*
if(isset($_GET['value'])) {
    $customer_id = $_GET['value'];
    $query = "SELECT * FROM customer WHERE customer_id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $customer_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (!$result) {
        die("Database query failure: " . mysqli_error($connect));
    }

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No customer found with the given ID.";
    }
}
*/

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
    	font-size: 11px;
    }
    table.dataTable{
    	border-collapse: collapse;
    	border-top: 1px solid #000;
    	border-bottom: 1px solid #000;
    }
	table.dataTable thead th,table.dataTable thead td{
		padding: 10px 13.5px !important;
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
<body style="overflow-x: scroll;">
<main role="main" class="col-lg-9 ml-sm-0 col-lg-12 pt-2 px-2" style="background-color: white;">
	<div class="row row2">
		<div class="col-12 title">
			<b>CUSTOMERS</b>
			<div style="float:right;">
				<a type="button" class="btn btn-green" href="mainIndex.php?page=add_customer">ADD</a>&nbsp; 
			</div>
		</div>
		<div class="col-12">
			<table id="register" class="display" style="width:100%">
		        <thead>
		            <tr>
						<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
						<th style="padding:0;background-image:none !important;">NO</th>
						<th>ACCOUNT CODE</th>
						<th>COMPANY NAME</th>
		                <th>NAME</th>
						<th>IC</th>
		                <th>PERSONAL CONTACT</th>
						<th>PERSONAL EMAIL</th>
						<th>DEPARTMENT</th>
						<th>OFFICE CONTACT</th>
						<th>OFFICE FAX</th>
		                <th>EMAIL</th>
						<th>ADDRESS</th>
						<th>GOVERMENT / PRIVATE</th>
						<th>WEBSITE</th>
						<th>UPLOADED IC</th>
		                <th>REMARKS</th>
		                <th style="width:10%;background-image:none !important;">ACTION</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th style="padding:0;"></th>
		                <th style="padding:0;"></th>
		                <th>ACCOUNT CODE</th>
						<th>COMPANY NAME</th>
		                <th>NAME</th>
						<th>IC</th>
		                <th>PERSONAL CONTACT</th>
						<th>PERSONAL EMAIL</th>
						<th>DEPARTMENT</th>
						<th>OFFICE CONTACT</th>
						<th>OFFICE FAX</th>
		                <th>EMAIL</th>
						<th>ADDRESS</th>
						<th>GOVERMENT / PRIVATE</th>
						<th>WEBSITE</th>
						<th>UPLOADED IC</th>
		                <th>REMARKS</th>
		                <th style="width:10%;background-image:none !important;"></th>
		            </tr>
		        </tfoot>
		        <tbody>
					<?php
						$counter = '';
							
						$query2 = "SELECT * FROM customer";
							
						if($result2 = mysqli_query($query1,$query2)){
								
							while($row = mysqli_fetch_assoc($result2)){
								
								$counter++;
								echo '<tr>';
								echo '<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>';
								echo '<td>'.$counter.'</td>';
								echo '<td>'.$row["account_code"].'</td>';
								echo '<td>'.$row["company_name"].'</td>';
								echo '<td>'.$row["name"].'</td>';
								echo '<td>'.$row["ic"].'</td>';
								echo '<td>'.$row["personal_contact"].'</td>';
								echo '<td>'.$row["personal_email"].'</td>';
								echo '<td>'.$row["department"].'</td>';
								echo '<td>'.$row["office_contact"].'</td>';
								echo '<td>'.$row["office_fax"].'</td>';
								echo '<td>'.$row["email"].'</td>';
								echo '<td>'.$row["address"].'</td>';
								echo '<td>'.$row["government_private"].'</td>';
								echo '<td>'.$row["website"].'</td>';
								echo '<td>'.$row["uploaded_ic"].'</td>';
								echo '<td>'.$row["remarks"].'</td>';
								echo '
									<td>
									<!--loss of search function-->
										<a href="mainIndex.php?page=edit_customer&value='.$row["customer_id"].'"><img class="actionbtn" src="../include/img/action/edit.png"></a>&nbsp;
										<a href="#"><img class="actionbtn" src="../include/img/action/search.png"></a>&nbsp;
										<a href="../module/add_customer/delete.php?value='.$row["customer_id"].'"><img class="actionbtn" src="../include/img/action/delete.png"></a>&nbsp;
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
	    $('#register tfoot th').not(":eq(0), :eq(1), :eq(17)").each( function () {
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