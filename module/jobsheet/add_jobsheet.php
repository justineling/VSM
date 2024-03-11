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

<?php
include "../include/connect.php";
$query1 = $connect;

// Check if jobsheet_id is set
$jobsheetId = isset($_GET['jobsheet_id']) ? $_GET['jobsheet_id'] : null;

// Fetch data from the database only if jobsheet_id is set
if ($jobsheetId !== null) {
    $query = "SELECT * FROM jobsheet
              JOIN vehicle ON jobsheet.vehicle_id = vehicle.vehicle_id
              JOIN service ON jobsheet.service_id = service.service_id
              JOIN parts ON jobsheet.parts_id = parts.parts_id
              WHERE jobsheet.jobsheet_id = $jobsheetId";

    $result = mysqli_query($query1, $query);

    if (!$result) {
        echo "Error in query: " . mysqli_error($query1);
    }

    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $vehicleName = $_GET['vehicle_id'];


  // Perform additional validation and sanitization if needed

  // Retrieve model and owner based on the selected vehicle_name
  $query = "SELECT model_type, owner FROM vehicle WHERE plate_no = ?";
  $stmt = mysqli_prepare($query1, $query);

  mysqli_stmt_bind_param($stmt, "s", $vehicleName);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $model, $owner);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);

  // Echo the retrieved data (you can modify this part based on your needs)
  echo "Selected Vehicle: $vehicleName<br>";
  echo "Model: $model<br>";
  echo "Owner: $owner";

  mysqli_close($query1);
}


if(!isset($_GET['selectedVehicleId']))
{
  //die('not exist');
}

?>


<main role="main" class="col-md-12 ml-sm-0 col-lg-12 pt-0 px-0" style="background-color: white;">

<form action="../module/jobsheet/add.php" method="GET">
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



                      <label for="vehicle_id">Select Vehicle:</label>
        <select name="vehicle_id" id="vehicle_id" onchange="getVehicleDetails(this.value)">
            <?php
                $connection = mysqli_connect("your_host", "your_username", "your_password", "vehicle_db");
                $query = "SELECT DISTINCT vehicle_name FROM vehicles";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['vehicle_name']}'>{$row['vehicle_name']}</option>";
                }

                mysqli_close($connection);
            ?>
        </select>

        <label for="model">Model:</label>
        <input type="text" name="model" id="model" readonly>

        <label for="owner">Owner:</label>
        <input type="text" name="owner" id="owner" readonly>



                      <tr>
                          <td style="width: 30%;">Vehicle Plate Number: </td>
                          <td>
                              <select name="vhc_no" style="width: 100%;" onchange="getVehicleDetails(this.value)">
                                  <?php echo getDropdownOptions($query1, 'vehicle_id', 'plate_no', 'vehicle'); ?>
                              </select>
                          </td>
                          <input type="hidden" id="selectedVehicleId" name="selectedVehicleId" value="">
                      </tr>
                      <tr>
                          <td style="width: 30%;">Vehicle Model: </td>
                          <td>
                              <?php echo $row['model_type']; ?>
                          </td>
                      </tr>
                      <tr>
                          <td style="width: 30%;">Vehicle Owner: </td>
                          <td>
                              <?php echo $row['owner']; ?>
                          </td>
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
                          <td style=" ">Receiving Date: </td>
                          <td>
                            <input type="date" class="form-control" id="rcv_date" name="rcv_date" required>
                          </td>
                          
                        </tr>
                        <tr style="">
                          <td style=" ">Completion Date: </td>
                          <td>
                            <input type="date" class="form-control" id="cmplt_date" name="cmplt_date" required>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


            <!----type of work----->
            <div class='card mt-3'>
              <div class='card-body'>
                <table style="border: 1px solid transparent; width: 100%;">
                  <tbody>
                  <td style="width: auto;">Type of Work:</td>
                    <tr>
                        <td style="width: auto; display: inline-block;">
                            <input type="checkbox" name="type[]" style="width: auto;" value="generalservice"> General Servicing
                        </td>
                        
                    </tr>
                    <tr>
                      <td style="width: auto; display: inline-block;">
                            <input type="checkbox" name="type[]" style="width: auto;" value="repair"> Repair
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
  

          <!----Vehicle Pre Check ------>
            <div class='card mt-3'>
              <div class='card-body'>
                <h4 class='card-title'>Vehicle Pre Check</h4>
                <table style="border: 1px solid transparent; width: 100%;">
                  <tbody>
                    <tr>
                        <td style="width: auto;">Body Scratches:</td>
                        <td style="width: auto; display: inline-block;">
                            <input type="checkbox" name="type[]" style="width: auto;" onclick="enableInput(this)" value="Yes"> Yes
                            <input type="checkbox" name="type[]" style="width: auto;" onclick="enableInput(this)" value="No"> No
                            <input type="" name="inspection" id="inspectionInput" style="width: auto;"  >
                        </td>
                    </tr>
                    <tr>
                        <td style="width: auto;">Warning Indicator:</td>
                        <td style="width: auto; display: inline-block;">
                        <input type="checkbox" name="type[]" style="width: auto;" onclick="enableInput(this)" value="Yes"> Yes
                            <input type="checkbox" name="type[]" style="width: auto;" onclick="enableInput(this)" value="No"> No
                            <input type="" name="inspection" id="inspectionInput" style="width: auto;"  >
                        </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>


    <!---Service Item List---->
      <div class='card mt-3'>
        <div class='card-body'>
          <h4 class='card-title'>Service/Repair Item List</h4>
            <!--Table-->
            <table style="border: 1px solid transparent; width: auto; " >
                <tbody>
                  <tr>
                    <td >Technician:</td>
                    <td>
                      <select name="staff_name" style="width: auto;">
                        <?php echo getDropdownOptions($query1, 'staff_name', 'staff'); ?>
                      </select>
                    </td>
                    <td style="width: 20%;">
                    <td>Assign Date:</td>
                    <td>
                      <input type="date" style="width: 100%;" class="form-control" id="assign_date" name="assign_date" required>
                    </td>
                    <td style="width: 20%;">
                    <td>Mileage:</td>
                    <td>
                      <select name="mileage" style="width: 100%;">
                        <?php echo getDropdownOptions($query1, 'mileage', 'vehicle'); ?>
                      </select>
                      <td><span style="margin-left: 5px;">kilometer</span></td>
                    </td>
                </tbody>
            </table>
            <br><br>
            <div class='card mt-3'>
                <div class='card-body'>
                <table id="tablePreview" class="table">
                    <!-- Form for inserting data -->
                    <form action="../module/jobsheet/addparts.php" method="GET" id="insertForm" class="mt-3">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputCode">Code</label>
                                <select name="inputCode" style="width: auto;">
                                  <?php echo getDropdownOptions($query1, 'parts_code', 'parts'); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputName">Name</label>
                                <select name="inputName" style="width: auto;">
                                  <?php echo getDropdownOptions($query1, 'item_name', 'parts'); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCategory">Category</label>
                                <select name="inputCategory" style="width: auto;">
                                  <?php echo getDropdownOptions($query1, 'category', 'parts'); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputQty">Qty</label>  
                                <input type="number" style="width: auto;" class="form-control" id="inputQty" name="inputQty" required>               
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputSOH">S.O.H</label>
                                <select name="inputSOH" style="width: auto;">
                                  <?php echo getDropdownOptions($query1, 'soh', 'parts'); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit" name="Submit"  class="btn btn-primary">Add Item</button>
                            </div>
                        </div>
                    </form>
                                <!-- End of Form -->
                    <!--Table head-->
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Qty</th>
                          <th>S.O.H</th>
                          <th>Actions</th>
                          
                        </tr>
                      </thead>
                      <!--Table head-->
                      <!--Table body-->
                      <tbody>
                        <tr>
                          <th scope="row">Eg: 0</th>
                          <td>F0001</td>
                          <td>Oil Filter</td>
                          <td>Filter</td>
                          <td>6</td>
                          <td>10</td>
                          <td>
                            <a href="#"><img class="tableactions" src="../include/icon/delete.png" title="View"></a>
                          </td>
                          
                        </tr>
                      </tbody>
                      <!--Table body-->
                    </table>
                
                </div>
            </div>
          </div>
      </div>
      <!-----remarks----->
      <div class='row mt-3'>
            <div class='col-lg-6'>
              <div class='card' style="">
                <div class='card-body'>
                  <h4 class='card-title'>Remarks</h4>
                  <textarea name="remarks" style="width: 100%; height: 150px;"></textarea>
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-12 title">
              <div style="float:right;">
                <!-- add modal here -->
                <a type="button" class="btn btn-green" href="../main/mainIndex.php?page=jobsheet" style="background-color: red;">DISCARD</a>
                &nbsp; 
                <button type="submit" name="Submit"  class="btn btn-green">SAVE</button>
              </div>
          </div>
    


  
   
  
      </div>
</form>
<br><br><br><br>
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

function enableInput(checkbox) {
        var inspectionInput = document.getElementById('inspectionInput');

        // Disable the input field if neither checkbox is checked
        if (!document.querySelector('input[name="type[]"]:checked')) {
            inspectionInput.disabled = true;
            inspectionInput.value = '';
        } else {
            // Enable the input field if the clicked checkbox is "Yes"; otherwise, disable it
            inspectionInput.disabled = (document.querySelector('input[name="type[]"][value="Yes"]:checked') !== null) ? false : true;

            // Clear the input field when disabling
            if (inspectionInput.disabled) {
                inspectionInput.value = '';
            }
        }
    }

    function getVehicleDetails(selectedValue) {
            if (selectedValue === "Car") {
                document.getElementById('model').value = 'Car Model';
                document.getElementById('owner').value = 'Car Owner';
            } else if (selectedValue === "Motorcycle") {
                document.getElementById('model').value = 'Motorcycle Model';
                document.getElementById('owner').value = 'Motorcycle Owner';
            } else {
                // Handle other cases if needed
            }
        }

</script>