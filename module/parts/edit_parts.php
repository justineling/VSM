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

  <div class="col-12 title" style="padding-top: 10px;">
    <h4 style="color: #008ae6; "><img src="" style=""> EDIT PART</h4>
    </div>

  <div class='' style="padding: 10px 10px;">
  <div class='row'>
    <div class='col-lg-9' style="">
      <div class='card' style="">
        <div class='card-body'>
          <table style="border: 1px solid transparent; width: 100%;">
            <?php 
            $parts_q = "SELECT * FROM parts WHERE parts_id='".$_GET['id']."'";
            $parts_res = mysqli_query($connect, $parts_q);
            $parts_row = mysqli_fetch_array($parts_res);
            ?>
            <form id = "editPartForm" action="../module/parts/edit_save_parts.php" method="post">
            <tbody>
              <tr class="mt-3">
                  <td style="width: auto;">Part Code: </td>
                  <td style="width: 80%;"><input type="text" name="pcode" style="width: 100%;" value="<?php echo $parts_row['parts_code'] ?>" placeholder="<?php echo $parts_row['parts_code'] ?>"></td>
              </tr>
              <tr>
                  <td style="width: auto;">Part Name: </td>
                  <td style="width: 80%;"><input type="text" name="pname" style="width: 100%;" value="<?php echo $parts_row['item_name'] ?>" placeholder="<?php echo $parts_row['item_name'] ?>"></td>
              </tr>
              <tr>
                  <td style="width: 30%;">Cost: </td>
                  <td style="width: 80%;"><input type="text" name="pcost" style="width: 100%;" value="<?php echo $parts_row['cost'] ?>" placeholder="<?php echo $parts_row['cost'] ?>"></td>
              </tr>
              <tr>
                  <td style="width: 30%;">Description: </td>
                  <td style=" width: 80%;"><textarea style="width: 100%; height: 150px;" name="pdes" value="<?php echo $parts_row['cost'] ?>" placeholder="<?php echo $parts_row['cost'] ?>"></textarea></td>
              </tr>
              <tr>
                  <td style="width: 30%;">SOH </td>
                  <td style="width: 80%;"><input type="text" name="psoh" style="width: 100%;" value="<?php echo $parts_row['soh'] ?>" placeholder="<?php echo $parts_row['soh'] ?>"></td>
              </tr>
              <tr>
                  <td style="width: 30%;">Type: </td>
                  <td style="width: 80%;"><input type="text" name="ptype" style="width: 100%;" value="<?php echo $parts_row['category'] ?>" placeholder="<?php echo $parts_row['category'] ?>"></td>
              </tr>
              <tr>
                  <td style="width: 30%;">Selling Price: </td>
                  <td style="width: 80%;"><input type="text" name="psellp" style="width: 100%;" value="<?php echo $parts_row['sell_price'] ?>" placeholder="<?php echo $parts_row['sell_price'] ?>"></td>
              </tr>
              <tr>
                  <td style="width: 30%;">Barcode: </td>
                  <td style="width: 80%;"><input type="text" name="pbar" style="width: 100%;" value="<?php echo $parts_row['barcode'] ?>" placeholder="<?php echo $parts_row['barcode'] ?>"></td>
              </tr>
          </tbody>

          </table>
              <div>
                <div style="float: right;">
                  <input type="hidden" name="pid" value="<?php echo $parts_row['parts_id'] ?>">
                  <input id="discardBtn" type="button" class="btn btn-green" value="DISCARD" style="background-color: red;">&nbsp;
                  <input type="submit" class="btn btn-green" style="float: right" value="SAVE" name="save">&nbsp;
              </div>
            </form>
        </div>
      </div>
        </div>
        
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

  document.getElementById("discardBtn").addEventListener("click", function(event) {
			event.preventDefault(); 
			document.getElementById("editPartForm").reset();
    	});
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var inputs = document.querySelectorAll("input, textarea");
        inputs.forEach(function(input) {
            var originalValue = input.value;
            input.addEventListener("focus", function() {
                if (input.value === originalValue) {
                    input.value = "";
                }
            });
            input.addEventListener("blur", function() {
                if (input.value === "") {
                    input.value = originalValue;
                }
            });
        });
    });
</script>
