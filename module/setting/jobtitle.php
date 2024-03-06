
<style type="text/css">
    .row2{
    	padding-left: 0.5rem;
    	padding-right: 0.5rem;
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
    /*pagination button*/
    .dataTables_wrapper .dataTables_paginate .paginate_button{
    	padding:0.1rem 0.5rem;
    }
    .dataTables_wrapper .dataTables_paginate {
	    padding-top: 0.5rem;
	    font-size: 12px;
	}
	#jobtitle th,
	#jobtitle td{
		text-align: center;
	}
	.line{
    	margin-top: -2px;
    	border-top: 1px solid #000;
    	margin-right: unset;
    	margin-left: unset;
    }
    .col-1{
    	max-width: 4%;
    }
    .btn-green{
    	float:right;
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

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="row row2">
		<div class="col-12" id="message">
			<?php
				if(isset($_SESSION['message'])){
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				}
			?>
		</div>
		<div class="col-7">
			<div class="title">
				<b>SETTINGS - JOB TITLE</b>
			</div>
			<table id="jobtitle" class="display" style="width:100%">
		        <thead>
		            <tr>
		                <th>NO</th>
		                <th>POSITION</th>
		                <th>DESCRIPTION</th>
		                <th>ACTION</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th></th>
		                <th>POSITION</th>
		                <th>DESCRIPTION</th>
		                <th></th>
		            </tr>
		        </tfoot>
		        <tbody>
		        <?php
		        	$sql = "SELECT * FROM fwms_job_title";
		        	$item = 0;
		        	$result = mysqli_query($con, $sql);
			            while($row = mysqli_fetch_assoc($result)) {
			            	$item++;
		        ?>
		            <tr>
		                <td><?php echo $item; ?></td>
		                <td><?php echo strtoupper($row['access_level']); ?></td>
		                <td><?php echo strtoupper($row['description']); ?></td>
		                <td>
		                	<a href="#" data-target="#edit_jobtitle" data-id="<?php echo $row['id'].",/".$row['access_level'].",/".$row['description']; ?>" class="modaledit"><img class="actionbtn" src="../include/img/action/edit.png"></a>&nbsp;
		                </td>
		            </tr>
		        <?php } ?>
		        </tbody>
		    </table>
		</div>
		<div class="col-1"></div>
		<?php 
		if($access_array[11][0] == 1){
		?>
		<div class="col-4">
			<div class="title">
				<b>ADD JOB TITLE</b>
			</div>
			<hr class="line">
			<form method="post" action="../module/setting/jobtitle_action.php">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">POSITION</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position">
					</div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-4 col-form-label">DESCRIPTION</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
				    </div>
				</div>
				<input type="submit" class="btn btn-green" value="ADD" name="submit">
			</form>
		</div>
		<?php } ?>
	</div>
</main>



<script src="../include/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#jobtitle tfoot th').not(":eq(0), :eq(3)").each( function () {
	        var title = $(this).text();
	         $(this).html( '<input type="text" class="search_input"  style="color:#000" />' );
	    } );

	    $('#jobtitle').DataTable( {
		    "bLengthChange": false, //disable the entries
		    "bFilter": true,
		    "bInfo": false,
		    "bAutoWidth": true,
		 	"sDom": '<"H"lTr><"datatable-scroll"t><"F"ip>' //disable search box
	    } );
	 
	    // DataTable
	    var table = $('#jobtitle').DataTable();

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

	$(".modaledit").click(function(){
		$("#edit_jobtitle").modal();
		var rowId = $(this).data('id');
		rowId = rowId.split(",/");
		$(".modal-body #modal_id").val(rowId[0]);
		$(".modal-body #modal_position").val(rowId[1]);
		$(".modal-body #modal_description").val(rowId[2]);
	});
</script>