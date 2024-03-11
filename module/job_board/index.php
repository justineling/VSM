
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

<main role="main" class="col-md-9 ml-sm-0 col-lg-10 pt-2 px-2" style="background-color: white;">
	<div class="row row2">
		<div class="col-12 title">
			<b>JOB BOARD</b>
			<div style="float:right;">
				<a type="button" class="btn btn-green" href="../main/mainIndex.php?page=addreg">ADD</a>&nbsp; 
			</div>
		</div>
		
		<div class="col-12">
			<table id="register" class="display" style="width:100%">
		        <thead>
		            <tr>
						<th style="padding:0;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
						<th>NO</th>
						<th>BILL ISSUE</th>
		                <th>STATUS</th>
						<th>JOB SHEET</th>
		                <th>DATE ISSUE</th>
		                <th>COMPLETION DATE</th>
		                <th>DATE OPERATION</th>
		                <th>MECHANIC</th>
		                <th>VEHICLE NO.</th>
		                <th>VEHICLE MODEL</th>
		                <th>OWNER</th>
						<th>REPAIR</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th></th>
		                <th></th>
		                <th>BILL ISSUE</th>
		                <th>STATUS</th>
						<th>JOB SHEET</th>
		                <th>DATE ISSUE</th>
		                <th>COMPLETION DATE</th>
		                <th>DATE OPERATION</th>
		                <th>MECHANIC</th>
		                <th>VEHICLE NO.</th>
		                <th>VEHICLE MODEL</th>
		                <th>OWNER</th>
						<th>REPAIR</th>
		            </tr>
		        </tfoot>
		        <tbody>
		            <tr>
						<td><input type="checkbox" name="check[]" value="" id=""></td>
		                <td>01</td>
		                <td>QT-02246</td>
		                <td>CLOSE</td>
						<td>4192</td>
		                <td>23/02/2018</td>
		                <td>23/02/2018</td>
		                <td>23/02/2018</td>
		                <td>DANNY</td>
		                <td>QAA 1234</td>
		                <td>ISUZU FSR</td>
		                <td>POS LAJU</td>
						<td>REPAIR</td>
		            </tr>
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