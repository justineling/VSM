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
    <h4 style="color: #008ae6; "><img src="" style=""> ADD STOCK</h4>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <form id="addStockForm" action="../module/stock/add_save_stock.php" method="post">
              <table id="stockTable" style="border: 1px solid transparent; width: 100%;">
                <tbody>
                  <tr class="mt-3">
                    <td style="width: auto;">Category:</td>
                    <td style="width: 80%;"><input type="text" name="stkcategpry" style="width: 100%;" required></td>
                  </tr>
                  <tr class="mt-3">
                    <td style="width: auto;">Item Name:</td>
                    <td style="width: 80%;"><input type="text" name="stkitem" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">Cost:</td>
                    <td style="width: 70%;"><input type="text" name="stkcost" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">Sell:</td>
                    <td style="width: 70%;"><input type="text" name="stksell" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">Unit:</td>
                    <td style="width: 70%;"><input type="text" name="stkunit" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">UOM:</td>
                    <td style="width: 70%;"><input type="text" name="stkuom" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">In:</td>
                    <td style="width: 70%;"><input type="date" name="stkindate" id="stkindate" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">Out:</td>
                    <td style="width: 70%;"><input type="date" name="stkoutdate" id="stkoutdate" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">Vehicle No:</td>
                    <td style="width: 70%;"><input type="text" name="stkvehicle" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">Model:</td>
                    <td style="width: 70%;"><input type="text" name="stkmodel" style="width: 100%;" required></td>
                  </tr>
                  <tr>
                    <td style="width: 30%;">Owner:</td>
                    <td style="width: 70%;"><input type="text" name="stkowner" style="width: 100%;" required></td>
                  </tr>
                </tbody>
              </table>
              
              <div style="margin-top: 20px;">
                <input id="discardBtn" type="button" class="btn btn-danger mr-2" value="DISCARD" href="#"></a>
                <input type="submit" name="save" class="btn btn-success" value="SAVE">
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
			document.getElementById("addStockForm").reset();
    	});
</script>