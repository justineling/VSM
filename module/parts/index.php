<?php 
	include "../include/connect.php";
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
    /*pagination button*/
    .dataTables_wrapper .dataTables_paginate .paginate_button{
    	padding:0.1rem 0.5rem;
    }
    .dataTables_wrapper .dataTables_paginate {
	    padding-top: 0.5rem;
	    font-size: 12px;
	}
</style>

<main role="main" class="col-md-12 ml-sm-0 col-lg-12 pt-2 px-2" style="background-color: white;">
	<div class="row row2">
		<div class="col-12 title">
			<b>PARTS</b> <br>
			<div style="float:left">
				<a type="button" class="btn btn-pink" style="background-color:#008ae6;" href="../main/mainIndex.php?page=parts">STOCK</a>&nbsp;
				<a type="button" class="btn btn-grey" href="../main/mainIndex.php?page=services">SERVICES</a>&nbsp;
				<a type="button" class="btn btn-grey" href="#">PART TYPE</a>&nbsp;	
				<a type="button" class="btn btn-grey" href="#">LOCATION</a>&nbsp;	

			</div>
			<div style="float:right;">
				<a type="button" class="btn btn-green" href="../main/mainIndex.php?page=add_parts">ADD</a>&nbsp;
			</div>
		</div>
			
		<div class="col-12">
			<table id="register" class="display" style="width:100%">
		        <thead>
		            <tr>
						<th style="padding:10px;background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
						<th>NO</th>
		                <th>CODE</th>
		                <th>NAME</th>
		                <th>COST</th>
		                <th>DESCRIPTION</th>
		                <th>S.O.H</th>
		                <th>TYPE</th>
		                <th>SELLING</th>
		                <th>BARCODE</th>
		                <th style="width:10%;background-image:none !important;">ACTION</th>
		    
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
						<th></th>
		                <th>NO</th>
		                <th>CODE</th>
		                <th>NAME</th>
		                <th>COST</th>
		                <th>DESCRIPTION</th>
		                <th>S.O.H</th>
		                <th>TYPE</th>
		                <th>SELLING</th>
		                <th>BARCODE</th>
		                <th style="width:10%;background-image:none !important;"></th>

		          
		            </tr>
		        </tfoot>
		         
		        <tbody>
		        	<?php                                
	                  $parts_q = "SELECT * FROM parts";
	                  $parts_res = mysqli_query($connect, $parts_q);
	                  
	                  $count = 0;
	                  while ($parts_row = mysqli_fetch_array($parts_res)) 
	                  {
	                  	$count++;
	                  

	                 
	                ?>  
		            <tr>
						<th style="background-image:none !important;"><input type="checkbox" name="check[]" value="" id=""></th>
						<td><?php echo $count ?></td>
		                <td><?php echo $parts_row["parts_code"]; ?></td>
		                <td><?php echo $parts_row["part_name"]; ?></td>
		                <td><?php echo $parts_row["cost"]; ?></td>
		                <td><?php echo $parts_row["description"]; ?></td>
		                <td><?php echo $parts_row["soh"]; ?></td>
		                <td><?php echo $parts_row["type"]; ?></td>
		                <td><?php echo $parts_row["sell_price"]; ?></td>
		                <td><?php echo $parts_row["barcode"]; ?></td>
		                <td>
		                	<a href="mainIndex.php?page=edit_parts&id=<?php echo $parts_row["parts_code"] ?>">
		                		<img class="actionbtn" src="../include/img/action/edit.png">
		                	</a>&nbsp;
		                	<a href="#"><img class="actionbtn" src="../include/img/action/search.png"></a>&nbsp;
		                	<a style="cursor: pointer;" onclick="openmodal('<?php echo $parts_row["parts_code"] ?>')"><img class="actionbtn" src="../include/img/action/delete.png"></a>&nbsp;
		                </td>
		               
		            </tr>
		            <?php
		        	}
		            ?>
		        </tbody>
		    </table>
		</div>
	</div>

	 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
            <div class="modal-dialog modal-sm" style="">
              <div class="modal-content" style="width: 400px; vertical-align: center;">
                <div class="modal-header">
                  
                  <p class="modal-title" id="myModalLabel">Are you sure about deleting this user's record?<br>(Click anywhere to close)</p> <br>
                  
                </div>
                <div class="modal-footer">
                  <a id="linkDel" href="../module/parts/delete_part.php?id=<?php echo $parts_row["service_code"] ?>"><button type="button" class="btn btn-primary" id="modal-btn-si" >Confirm</button></a>
                  <!-- <button type="button" class="btn btn-default" id="modal-btn-no">No</button> -->
                </div>
              </div>
            </div>
          </div>

</main>

<script src="../include/js/jquery-2.1.3.min.js"></script>
<script src="../include/js/bootstrap.min.js"></script>
<script src="../include/DataTables/datatables.min.js"></script>
<script type="text/javascript">
		function openmodal(x){
    //alert();
    document.getElementById("linkDel").setAttribute('href', '../module/parts/delete_part.php?id='+x);
    $("#mi-modal").modal('show');
  }


	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#register tfoot th').not(":eq(0), :eq(13)").each( function () {
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
</script>