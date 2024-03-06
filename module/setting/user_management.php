
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
    /*pagination button*/
    .dataTables_wrapper .dataTables_paginate .paginate_button{
    	padding:0.1rem 0.5rem;
    }
    .dataTables_wrapper .dataTables_paginate {
	    padding-top: 0.5rem;
	    font-size: 12px;
	}
	#user th,
	#user td{
		text-align: center;
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
		<div class="col-12 title">
			<b>USER MANAGEMENT</b>
			<?php 
				if($access_array[11][0] == 1){
			?>
			<div style="float:right;">
				<a type="button" class="btn btn-green" href="mainIndex.php?page=add_user">ADD</a>&nbsp; 
			</div>
			<?php } ?>
		</div>
		<div class="col-12" style="box-shadow: unset; margin-bottom: 10px; padding: 0;">
				
			</div>	
		<div class="col-12">
			<table id="user" class="display" style="width:100%">
		        <thead>
		            <tr>
		                <th>NO</th>
		                <th>NAME</th>
		                <th>POSITION</th>
		                <th>DEPARTMENT</th>
		                <th>ACCESS LEVEL</th>
		                <th>ACTIVATION EMAIL</th>
		                <th>STATUS</th>
		                <?php 
							if($access_array[11][1] == 1){
						?>
		                <th>ACTION</th>
		                <?php } ?>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th></th>
		                <th>NAME</th>
		                <th>POSITION</th>
		                <th>DEPARTMENT</th>
		                <th>ACCESS LEVEL</th>
		                <th>ACTIVATION EMAIL</th>
		                <th>STATUS</th>
		                <?php 
							if($access_array[11][1] == 1){
						?>
		                <th></th>
		                <?php } ?>
		            </tr>
		        </tfoot>
		        <tbody>
		        <?php 
		        	$sql = "SELECT * FROM fwms_users";
		        	$item = 0;
		        	$result = mysqli_query($con, $sql);
		            while($row = mysqli_fetch_assoc($result)) {
		            	$item++;
			            $access_q = "SELECT * FROM fwms_job_title WHERE id = '".$row['access_level']."'";
			            $access = mysqli_query($con, $access_q);
			            $access_p = mysqli_fetch_assoc($access);

		        ?>
		            <tr>
		                <td><?php echo $item; ?></td>
		                <th><?php echo strtoupper($row['name']); ?></th>
		                <th><?php echo strtoupper($row['position']); ?></th>
		                <th><?php echo strtoupper($row['department']); ?></th>
		                <th><?php echo strtoupper($access_p['access_level']); ?></th>
		                <th><?php echo strtoupper($row['activation_email']); ?></th>
		                <th><?php echo strtoupper($row['status']); ?></th>
		                <?php 
							if($access_array[11][1] == 1){
						?>
		                <td>
		                	<a href="#" data-target="#edit_user" data-id="<?php echo $row['id'].",/".$row['name'].",/".$row['ic_no'].",/".$row['position'].",/".$row['department'].",/".$row['contact_no'].",/".$row['access_level'].",/".$row['activation_email']; ?>" class="modaledit"><img class="actionbtn" src="../include/img/action/edit.png"></a>&nbsp;
		                </td>
		                <?php } ?>
		            </tr>
		        <?php } ?>
		        </tbody>
		    </table>
		</div>
	</div>
</main>

<script src="../include/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#user tfoot th').not(":eq(0), :eq(10)").each( function () {
	        var title = $(this).text();
	         $(this).html( '<input type="text" class="search_input"  style="color:#000" />' );
	    } );

	    $('#user').DataTable( {
		    "bLengthChange": false, //disable the entries
		    "bFilter": true,
		    "bInfo": false,
		    "bAutoWidth": true,
		 	"sDom": '<"H"lTr><"datatable-scroll"t><"F"ip>' //disable search box
	    } );
	 
	    // DataTable
	    var table = $('#user').DataTable();

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
		$("#edit_user").modal();
		var rowId = $(this).data('id');
		rowId = rowId.split(",/");
		$(".modal-body #user_id").val(rowId[0]);
		$(".modal-body #user_name").val(rowId[1]);
		$(".modal-body #user_ic").val(rowId[2]);
		$(".modal-body #user_pos").val(rowId[3]);
		$(".modal-body #user_department").val(rowId[4]);
		$(".modal-body #user_contact").val(rowId[5]);
		$(".modal-body #user_level").val(rowId[6]);
		$(".modal-body #user_email").val(rowId[7]);
	});
</script>