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

	select.form-control:not([size]):not([multiple]) {
	    height: calc(1.6rem + 5px);
	    border-radius: 0px;
	    line-height: 1.0;
	    font-size: 12px;
	}
	form{
		margin-top: 10px;
	}
	.subtitle{
		font-size: 15px;
		font-family: 'Century Gothic';
		padding:15px;
	}

	.container {
  margin-top: 50px;
  margin-bottom: 50px;
}

.hidden {
  display: none !important;
}

.tableactions {
	width: 20px;
	height: 20px;

}


</style>

<main role="main" class="col-md-12 ml-sm-0 col-lg-12 pt-0 px-0" style="background-color: white;">
<form>
	<div class="col-12 title" style="padding-top: 10px;">
		<h4 style="color: #008ae6; "><img src="../include/icon/header1/JOBSHEET(BLUE).png" style=""> ADD JOBSHEET</h4>
		</div>

	<div class='' style="padding: 10px 10px;">
  <div class='row'>
    <div class='col-lg-6'>
      <div class='card' style="">
        <div class='card-body'>
        	<table style="border: 1px solid transparent; width: 100%;">
				<tbody>
					<tr style="">
						<td style=" ">Date: </td>
						<td style=" width: 80%;"><input type="date" name="dateIn" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 30%;">Customer Code: </td>
						<td style=" width: 70%;"><input type="" name="cust_id" style="width: 100%;"  ></td>
					</tr>
					<tr>
						<td style="width: 30%;">Customer Name: </td>
						<td style=" width: 70%;"><input type="" name="cust_name" style="width: 100%;"  ></td>
					</tr>
					<tr>
						<td style="width: 30%;">Status: </td>
						<td style=" width: 70%;"><input type="" name="status" style="width: 100%;"  ></td>
					</tr>
				</tbody>
			</table>
        </div>
      </div>
        </div>
        <div class='col'>
      <div class='card'>
        <div class='card-body'>
          <table style="border: 1px solid transparent; width: 100%;">
				<tbody>
					<tr style="">
						<td style=" ">Vehicle Number: </td>
						<td style=" width: 80%;"><input type="" name="vhc_no" style="width: 100%;"  ></td>
					</tr>
					<tr>
						<td style="width: 30%;">Vehicle Model: </td>
						<td style=" width: 70%;"><input type="" name="vhc_md" style="width: 100%;"  ></td>
					</tr>
					<tr>
						<td style="width: 30%;">Type of Work:</td>
						<td style=" width: 70%;"><input type="" name="type" style="width: 100%;"  ></td>
					</tr>
					<tr>
						<td style="width: 30%;">Mechanic: </td>
						<td style=" width: 70%;"><input type="" name="mech_name" style="width: 100%;"  ></td>
					</tr>
				</tbody>
			</table>
        </div>
      </div>
    </div>
  </div>
  
   <div class='card mt-3'>
    <div class='card-body'>
      <h4 class='card-title'>Services</h4>
      <form>
        <!--Table-->
<table id="tablePreview" class="table">
<!--Table head-->
  <thead>
    <tr>
      <th>#</th>
      <th>Service Code</th>
      <th>Service Name</th>
      <th>Service Description</th>
      <th>Qty</th>s
      <th>Actions</th>
      
    </tr>
  </thead>
  <!--Table head-->
  <!--Table body-->
  <tbody>
    <?php 
      $srv_q = "SELECT * FROM service";
      $srv_run = mysqli_query($connect, $srv_q);

      $count = 0
    ?>
    <tr>
      <th scope="row"> 
      </th>
      <td>
       <?php 
              

                echo "<select name='service'>";
                while ($srv_row = mysqli_fetch_array($srv_run)) {
                    echo "<option value='" . $srv_row['service_code'] ."'>" . $srv_row['service_code'] ."</option>";
                }
                echo "</select>";
              ?>      

      </td>
      <td>
        <?php 
                $srv_q = "SELECT * FROM service";
                $srv_run = mysqli_query($connect, $srv_q);
                echo "<select name='service'>";
                while ($srv_row = mysqli_fetch_array($srv_run)) {
                    echo "<option value='" . $srv_row['service_name'] ."'>" . $srv_row['service_name'] ."</option>";
                }
                echo "</select>";
         ?> 
       </td>
      <td><input type="" name=""></td>
      <td><input type="" name=""></td>
      <td>
        <a href="#"><img class="tableactions" src="../include/icon/view.png" title="View"></a>
        <a href="#"><img class="tableactions" src="../include/icon/delete.png" title="View"></a>
      </td>
      
    </tr>
  
  </tbody>
  <!--Table body-->
</table>
<!--Table-->
      </form>
    </div>
  </div>

  <div class='card mt-3'>
    <div class='card-body'>
      <h4 class='card-title'>Parts</h4>

      <div class="row">
         
    <table id="tablePreview" class="table">
<!--Table head-->
  <thead>
    <tr>
      <th>#</th>
      <th>Code</th>
      <th>Name</th>
      <th>Qty</th>
      <th>S.O.H</th>
      <th>Actions</th>
      
    </tr>
  </thead>
  <!--Table head-->
  <!--Table body-->
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>F0001</td>
      <td>Filter</td>
      <td>6</td>
      <td>10</td>
      <td>
      	<a href="#"><img class="tableactions" src="../include/icon/view.png" title="View"></a>
      	<a href="#"><img class="tableactions" src="../include/icon/delete.png" title="View"></a>
      </td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><input type="" name=""></td>
      <td><input type="" name=""></td>
      <td><input type="" name=""></td>
      <td><input type="" name=""></td>
      <td></td>
      
    </tr>
    
  </tbody>
  <!--Table body-->
</table>
      


    </div>
  </div>

  <div class='row mt-3'>
    <div class='col-lg-6'>
      <div class='card' style="">
        <div class='card-body'>
        	<h4 class='card-title'>Remarks</h4>
        	<textarea style="width: 100%; height: 150px;"></textarea>
        </div>
      </div>
        </div>
        
  </div>

 

<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center">
              #
            </th>
            <th class="text-center">
              User ID
            </th>
            <th class="text-center">
              Name
            </th>
            <th class="text-center">
              NIC
            </th>
            <th class="text-center">
              Amount
            </th>
            <th class="text-center">
              Date
            </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>
              1
            </td>
            <td>
              <input type="text" name='uid' placeholder='User ID' class="form-control" />
            </td>
            <td>
              <input type="text" name='uname' placeholder='Name' class="form-control" />
            </td>
            <td>
              <input type="text" name='nic' placeholder='NIC' class="form-control" />
            </td>
            <td>
              <input type="text" name='amount' placeholder='Amount' class="form-control" />
            </td>
            <td>
              <input type="date" name='dt' placeholder='Date' class="form-control" />
            </td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
  <button id="add_row" class="">SUBMIT</button>
</div>

  <div class="col-12 title">
			<div style="float:right;">
				<!-- add modal here -->
				<a type="button" class="btn btn-green" href="../main/mainIndex.php?page=" style="background-color: red;">DISCARD</a>
				&nbsp; 
				<a type="button" class="btn btn-green" href="../main/mainIndex.php?page=add_jobsheet">SAVE</a>&nbsp; 
			</div>
		</div>

		<br><br><br><br><br>
  
   <!-- <div class='card mt-3'>
    <div class='card-body'>
      <h4 class='card-title'>Services</h4>
      <form>
        <div class='form-row'>
          <div class='form-group col-sm-4'>
            <label>Productivity Modules per Lab</label>
            <div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='pmpl' value='0' id='pmpl0'>
                <label class='form-check-label' for='pmpl0'>0</label>
              </div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='pmpl' value='1' id='pmpl1'>
                <label class='form-check-label' for='pmpl1'>1</label>
              </div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='pmpl' value='2' id='pmpl2' checked='checked'>
                <label class='form-check-label' for='pmpl2'>2</label>
              </div>
            </div>
          </div>
          <div class='form-group col-sm-2' id='pml-block'>
            <label>Prod. Module Level</label>
                    <div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='pml' value='1' id='pml1'>
                <label class='form-check-label' for='pml1'>&bull;</label>
              </div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='pml' value='2' id='pml2'>
                <label class='form-check-label' for='pml2'>&bull;&bull;</label>
              </div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='pml' value='3' id='pml3' checked='checked'>
                <label class='form-check-label' for='pml3'>&bull;&bull;&bull;</label>
              </div>
            </div>
          </div>
          <div class='form-group col-sm-3'>
            <label>Research Time</label>
            <input type='number' id='research-time' class='form-control' placeholder='15, 30, 45, 60' value='60'>
          </div>
          <div class='form-group col-sm-3'>
            <label>Science Packs needed (one color)</label>
            <input type='number' id='number-of-packs' class='form-control' placeholder='10, 50, 100, 1000, etc' value='1000'>
          </div>
          <div class='form-group col-sm-4'>
            <label>Speed Modules, in Beacons, per Lab</label>
            <input type='number' id='speed-modules' class='form-control' placeholder='0, 16, 24, etc' value='16' min='0' max='24' style='width: 60px;'>
          </div>
          <div class='form-group col-sm-2' id='sml-block'>
            <label>Speed Module Level</label>
                    <div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='sml' value='1' id='sml1'>
                <label class='form-check-label' for='sml1'>&bull;</label>
              </div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='sml' value='2' id='sml2'>
                <label class='form-check-label' for='sml2'>&bull;&bull;</label>
              </div>
              <div class='form-check form-check-inline'>
                <input class='form-check-input' type='radio' name='sml' value='3' id='sml3' checked='checked'>
                <label class='form-check-label' for='sml3'>&bull;&bull;&bull;</label>
              </div>
            </div>
          </div>
          <div class='form-group col-sm-3'>
            <label>Lab Research Speed</label>
            <select id='lab-research-speed' class='form-control'>
              <option value='0'>None</option>
              <option value='20'>Lab research speed 1</option>
              <option value='50'>Lab research speed 2</option>
              <option value='90'>Lab research speed 3</option>
              <option value='140'>Lab research speed 4</option>
              <option value='190'>Lab research speed 5</option>
              <option value='250' selected='selected'>Lab research speed 6</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div> -->


  <!-- <div class='card mt-3'>
    <div class='card-body'>
      <h6 class='card-title'>Quick Toggles</h6>
  
      <div class='row'>
        <div class='col'>
          <div>
        <button type='button' class='btn btn-primary' id='drop-modules'>Drop Modules</button>
        <button type='button' class='btn btn-primary' id='eight-beacon-modules'>8 Beacon Layout</button>
        <button type='button' class='btn btn-primary' id='twelve-beacon-modules'>12 Beacon Layout</button>
      </div>
        </div>
        <div class='col'>
          <div class='mb-3'>
            <button type='button' class='btn btn-primary' id='mid-recipe'>Mid Game Recipe</button>
            <button type='button' class='btn btn-primary' id='end-recipe'>End Game Recipe</button>
          </div>
          <div>
            <div class='form-group'>
              <select class='form-control col-sm-6' id='recipe-select'>
                <optgroup id='level-7' label='Infinite Research'></optgroup>
                <optgroup id='level-6' label='High Tech Research'></optgroup>
                <optgroup id='level-5' label='Production Research'></optgroup>
                <optgroup id='level-3' label='Military Research'></optgroup>
                <optgroup id='level-4' label='Pack 3 Research'></optgroup>
                <optgroup id='level-2' label='Pack 2 Research'></optgroup>
                <optgroup id='level-1' label='Pack 1 Research'></optgroup>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  
</div>
</form>
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

  $(document).ready(function() {
  var i = 1;
  $("#add_row").click(function() {
  $('tr').find('input').prop('disabled',true);
    $('#addr' + i).html("<td>" + (i + 1) + "</td><td><input type='text' name='uid" + i + "'  placeholder='User ID' class='form-control input-md'/></td><td><input type='text' name='uname" + i + "' placeholder='Name' class='form-control input-md'/></td><td><input type='text' name='nic" + i + "' placeholder='NIC' class='form-control input-md'/></td><td><input type='text' name='amount" + i + "' placeholder='Amount' class='form-control input-md'/></td><td><input type='date' name='dt" + i + "' placeholder='Date' class='form-control input-md'/></td>");

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
    i++;
  });
});
</script>