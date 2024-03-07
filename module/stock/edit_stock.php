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
    <h4 style="color: #008ae6; "><img src="" style=""> EDIT STOCK</h4>
    </div>

  <div class='' style="padding: 10px 10px;">
  <div class='row'>
    <div class='col-lg-9' style="">
      <div class='card' style="">
        <div class='card-body'>
          <table style="border: 1px solid transparent; width: 100%;">
            <?php 
             $stk_q = "SELECT * FROM stock WHERE id='".$_GET['id']."'";
             $stk_res = mysqli_query($connect, $stk_q);
             $stk_row = mysqli_fetch_array($stk_res);
            ?>
            <form id = "editStockForm" action="../module/stock/edit_save_stock.php" method="post">
            <tbody>
                <tr class="mt-3">
                    <td style="width: auto;">Category: </td>
                    <td style="width: 80%;"><input type="text" name="stkcategory" style="width: 100%;" value="<?php echo $stk_row['category'] ?>" placeholder="<?php echo $stk_row['category'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: auto;">Item Name: </td>
                    <td style="width: 80%;"><input type="text" name="stkitem" style="width: 100%;" value="<?php echo $stk_row['item'] ?>" placeholder="<?php echo $stk_row['item'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Cost: </td>
                    <td style="width: 70%;"><input type="text" name="stkcost" style="width: 100%;" value="<?php echo $stk_row['cost'] ?>" placeholder="<?php echo $stk_row['cost'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Sell: </td>
                    <td style="width: 70%;"><input type="text" name="stksell" style="width: 100%;" value="<?php echo $stk_row['sell'] ?>" placeholder="<?php echo $stk_row['sell'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Unit: </td>
                    <td style="width: 70%;"><input type="text" name="stkunit" style="width: 100%;" value="<?php echo $stk_row['unit'] ?>" placeholder="<?php echo $stk_row['unit'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">UOM: </td>
                    <td style="width: 70%;"><input type="text" name="stkuom" style="width: 100%;" value="<?php echo $stk_row['uom'] ?>" placeholder="<?php echo $stk_row['uom'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">In Date: </td>
                    <td style="width: 70%;"><input type="date" name="stkin_date" style="width: 100%;" value="<?php echo $stk_row['in_date'] ?>" placeholder="<?php echo $stk_row['in_date'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Out Date: </td>
                    <td style="width: 70%;"><input type="date" name="stkout_date" style="width: 100%;" value="<?php echo $stk_row['out_date'] ?>" placeholder="<?php echo $stk_row['out_date'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Vehicle No: </td>
                    <td style="width: 70%;"><input type="text" name="stkvehicle_no" style="width: 100%;" value="<?php echo $stk_row['vehicle_no'] ?>" placeholder="<?php echo $stk_row['vehicle_no'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Model: </td>
                    <td style="width: 70%;"><input type="text" name="stkmodel" style="width: 100%;" value="<?php echo $stk_row['model'] ?>" placeholder="<?php echo $stk_row['model'] ?>"></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Owner: </td>
                    <td style="width: 70%;"><input type="text" name="stkowner" style="width: 100%;" value="<?php echo $stk_row['owner'] ?>" placeholder="<?php echo $stk_row['owner'] ?>"></td>
                </tr>
            </tbody>
          </table>
              <div>
                <div style="float: right;">
                    <input type="hidden" name="stkid" value="<?php echo $stk_row['id'] ?>">
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
			document.getElementById("editStockForm").reset();
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
