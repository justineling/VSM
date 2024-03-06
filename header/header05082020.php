<?php 
  // include("../include/dbconnection.php");
  // include("../include/access.php");
  date_default_timezone_set("Asia/Kuala_Lumpur");
  $datetime = date("Y-m-d H:i:s");
  // $id = $_SESSION['id'];
  // $user = $_SESSION['username'];
  // $name = $_SESSION['name'];
  // $level = $_SESSION['access_level'];

?>
<!Doctype html>
<html lang="en">
<style type="text/css">
    .icon{
      background-repeat: no-repeat;
      position: relative;
      width: 30px;
      height: 30px;
      display: inline-block;
    }
    .icon-img{
      background-repeat: no-repeat;
      position: relative;
      width: 30px;
      height: 29px;
      top: 0px;
      display: inline-block;
      vertical-align: bottom;
    }
    .sidebar{
      background-color: #007acc;
    }
    .p-0{
      height:60px;
      background: #007acc;
    }
    .showname{
      background-color: #fff;
    }
	
	
	
	.customer{
      background-image:url('../include/icon/header1/CUSTOMERS(WHITE).png');
    }
    .customer-hover{
      background-image:url('../include/icon/header1/CUSTOMERS(BLUE).png');
    }
	.vehicle{
      background-image:url('../include/icon/header1/VEHICLE(WHITE).png');
    }
    .vehicle-hover{
      background-image:url('../include/icon/header1/VEHICLE(BLUE).png');
    }
	.appointment{
      background-image:url('../include/icon/header1/APPOINTMENT(WHITE).png');
    }
    .appointment-hover{
      background-image:url('../include/icon/header1/APPOINTMENT(BLUE).png');
    }
	.jobsheet{
      background-image:url('../include/icon/header1/JOBSHEET(WHITE).png');
    }
    .jobsheet-hover{
      background-image:url('../include/icon/header1/JOBSHEET(BLUE).png');
    }
	.job_board{
      background-image:url('../include/icon/header1/JOB BOARD(WHITE).png');
    }
    .job_board-hover{
      background-image:url('../include/icon/header1/JOB BOARD(BLUE).png');
    }
	.quotation{
      background-image:url('../include/icon/header1/QUOTATION(WHITE).png');
    }
    .quotation-hover{
      background-image:url('../include/icon/header1/QUOTATION(BLUE).png');
    }
	.billing{
      background-image:url('../include/icon/header1/BILLING(WHITE).png');
    }
    .billing-hover{
      background-image:url('../include/icon/header1/BILLING(BLUE).png');
    }
	.parts{
      background-image:url('../include/icon/header1/PARTS(WHITE).png');
    }
    .parts-hover{
      background-image:url('../include/icon/header1/PARTS(BLUE).png');
    }
	.stock{
      background-image:url('../include/icon/header1/STOCK(WHITE).png');
    }
    .stock-hover{
      background-image:url('../include/icon/header1/STOCK(BLUE).png');
    }
	
	
    .report{
      background-image:url('../include/icon/header1/REPORT(WHITE).png');
    }
    .report-hover{
      background-image:url('../include/icon/header1/REPORT(BLUE).png');
    }
    .container-fluid{
      height:100%;
      position: fixed;
    }
    .rows{
      height:100%;
    }
    main{
      background-color: #f0eff5;
    }
    .foot{
      background-color: #A8A8A8; 
      position: absolute; 
      font-family: 'Century Gothic';
      font-size:12px;
      color: black;
      height:30px;
      vertical-align: middle;
      line-height: 30px;
    }
    .nav-link{
       width:180px;
    }
    .sidebar-sticky{
      padding-top: 40px;
    }
    .text-hover{
      padding-left: 8px;  
      height: 25px;
      font-family: 'Century Gothic';
      color: #008ae6;
      display: inline-block;
      font-size: 12px;
      line-height: 25px;
      vertical-align: middle;
      font-weight: bold;
    }
    .text{
      padding-left: 8px;  
      height: 25px;
      font-family: 'Century Gothic';
      color: #fff;
      display: inline-block;
      font-size: 12px;
      line-height: 25px;
      vertical-align: middle;
      font-weight: bold;
    }
    .active{
      background-color:#fff;
    }
    .active-bottom{
      background-color:#cccccc;
    }
    li:hover{
      background-color:#66b3ff;
    }
    .settings td{
      text-align: center;
    }
    .setting{
      background-image: url('../include/icon/header/SETTINGS(GREY).png');
    }
    .setting-hover{
      background-image: url('../include/icon/header/SETTINGS(GREY).png');
    }
    .maintenance{
      background-image: url('../include/icon/header/MAINTENANCE(GREY).png');
    }
    .maintenance-hover{
      background-image: url('../include/icon/header/MAINTENANCE(WHITE).png');
    }
    .manual{
      background-image: url('../include/icon/header/USER MANUAL(GREY).png');
    }
    .manual-hover{
      background-image: url('../include/icon/header/USER MANUAL(WHITE).png');
    }
    .help{
      background-image: url('../include/icon/header/HELP(GREY).png');
    }
    .help-hover{
      background-image: url('../include/icon/header/HELP(WHITE).png');
    }
    .import td{

    }
</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=1024">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href="../../../../favicon.ico"> -->

  <title>VSM</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../include/css/bootstrap.min.css">
   <link rel="stylesheet" href="../include/css/css.css">
  <link rel="stylesheet" type="text/css" href="../include/DataTables/datatables.min.css"/>
</head>

<body>
  <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
    <a class="navbar-brand " style="width:100px; text-align: center; margin: 0;" href="#"><h2 style="width: 100px;">VSM</h2><!--<img src="../include/icon/logo.png" width="auto" height="auto">--></a>
    <div class="w-100 h-100 showname" style="font-size:20px;">
      <div class="ml-4 mt-3">
        Greetings, Softworld!   &nbsp; &nbsp;
        <span style="font-size:12px">Local time &nbsp;</span>
        <span style="font-size:12px" id="clockbox"></span>
        <a href="../logout.php" style="float: right; padding-right: 25px;"><img onmouseover="this.src='../include/icon/header/LOGOUT(PINK).png'" onmouseout="this.src='../include/icon/header/LOGOUT(GREY).png'" alt="tribute" src="../include/icon/header/LOGOUT(GREY).png" ></a></div>
    
    </div>
  </nav>



  <div class="container-fluid">
    <div class="row rows">
      <nav class=" d-none d-md-block sidebar" style="padding:0; width: 100px;">
        <div class="sidebar-sticky" style="width: 50%;">
		  
          <ul class="nav flex-column">
			<!-- <li class="<?php if($page == 'customer'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=customer">
                <div class="icon-img <?php if($page == 'customer'){ echo 'customer-hover'; }else{ echo 'customer';} ?>"></div>
                <div class="<?php if($page == 'customer'){ echo 'text-hover'; }else{echo 'text';} ?>">CUSTOMERS</div>
              </a>
            </li> -->

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'customer'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- customer -->
              <a href="mainIndex.php?page=customer">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'customer'){ echo 'customer-hover'; }else{ echo 'customer';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'customer'){ echo 'text-hover'; }else{echo 'text';} ?>">CUSTOMER</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'vehicle'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- vehicle -->
              <a href="mainIndex.php?page=vehicle">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'vehicle'){ echo 'vehicle-hover'; }else{ echo 'vehicle';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'vehicle'){ echo 'text-hover'; }else{echo 'text';} ?>">VEHICLE</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'appointment'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- appointment -->
              <a href="mainIndex.php?page=appointment">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'appointment'){ echo 'appointment-hover'; }else{ echo 'appointment';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'appointment'){ echo 'text-hover'; }else{echo 'text';} ?>">APPOINTMENT</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'jobsheet'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- jobsheet -->
              <a href="mainIndex.php?page=jobsheet">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'jobsheet'){ echo 'jobsheet-hover'; }else{ echo 'jobsheet';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'jobsheet'){ echo 'text-hover'; }else{echo 'text';} ?>">JOBSHEET</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'job_board'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- job board -->
              <a href="mainIndex.php?page=job_board">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'job_board'){ echo 'job_board-hover'; }else{ echo 'job_board';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'job_board'){ echo 'text-hover'; }else{echo 'text';} ?>">JOB BOARD</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'quotation'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- quotation -->
              <a href="mainIndex.php?page=quotation">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'quotation'){ echo 'quotation-hover'; }else{ echo 'quotation';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'quotation'){ echo 'text-hover'; }else{echo 'text';} ?>">QUOTATION</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'billing'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- billing -->
              <a href="mainIndex.php?page=billing">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'billing'){ echo 'billing-hover'; }else{ echo 'billing';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'billing'){ echo 'text-hover'; }else{echo 'text';} ?>">BILLING</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'parts'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- parts -->
              <a href="mainIndex.php?page=parts">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'parts'){ echo 'parts-hover'; }else{ echo 'parts';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'parts'){ echo 'text-hover'; }else{echo 'text';} ?>">PARTS</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>

            <li style="height: 11.1%; padding-top: 3.5%;" class="<?php if($page == 'report'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>"> <!-- report -->
              <a href="mainIndex.php?page=parts">
                <table border="0" style="width: 100px; height: 100%;">
                  <tr>
                    <td align="center">
                      <div class="icon-img <?php if($page == 'report'){ echo 'report-hover'; }else{ echo 'report';} ?>"></div><br> 
                      <div id="dashboard_text" class="<?php if($page == 'report'){ echo 'text-hover'; }else{echo 'text';} ?>">REPORT</div>
                    </td>
                  </tr>
                </table>
              </a>
            </li>


			<!-- <li class="<?php if($page == 'vehicle'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=vehicle">
                <div class="icon-img <?php if($page == 'vehicle'){ echo 'vehicle-hover'; }else{ echo 'vehicle';} ?>"></div>
                <div class="<?php if($page == 'vehicle'){ echo 'text-hover'; }else{echo 'text';} ?>">VEHICLES</div>
              </a>
            </li> -->
			<!-- <li class="<?php if($page == 'appointment'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=appointment">
                <div class="icon-img <?php if($page == 'appointment'){ echo 'appointment-hover'; }else{ echo 'appointment';} ?>"></div>
                <div class="<?php if($page == 'appointment'){ echo 'text-hover'; }else{echo 'text';} ?>">APPOINTMENT</div>
              </a>
            </li> -->
			<!-- <li class="<?php if($page == 'jobsheet'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=jobsheet">
                <div class="icon-img <?php if($page == 'jobsheet'){ echo 'jobsheet-hover'; }else{ echo 'jobsheet';} ?>"></div>
                <div class="<?php if($page == 'jobsheet'){ echo 'text-hover'; }else{echo 'text';} ?>">JOBSHEET</div>
              </a>
            </li> -->
			<!-- <li class="<?php if($page == 'job_board'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=job_board">
                <div class="icon-img <?php if($page == 'job_board'){ echo 'job_board-hover'; }else{ echo 'job_board';} ?>"></div>
                <div class="<?php if($page == 'job_board'){ echo 'text-hover'; }else{echo 'text';} ?>">JOB BOARD</div>
              </a>
            </li> -->
			<!-- <li class="<?php if($page == 'quotation'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=quotation">
                <div class="icon-img <?php if($page == 'quotation'){ echo 'quotation-hover'; }else{ echo 'quotation';} ?>"></div>
                <div class="<?php if($page == 'quotation'){ echo 'text-hover'; }else{echo 'text';} ?>">QUOTATION</div>
              </a>
            </li> -->
			<!-- <li class="<?php if($page == 'billing'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=billing">
                <div class="icon-img <?php if($page == 'billing'){ echo 'billing-hover'; }else{ echo 'billing';} ?>"></div>
                <div class="<?php if($page == 'billing'){ echo 'text-hover'; }else{echo 'text';} ?>">BILLING</div>
              </a>
            </li> -->
			<!-- <li class="<?php if($page == 'parts'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=parts">
                <div class="icon-img <?php if($page == 'parts'){ echo 'parts-hover'; }else{ echo 'parts';} ?>"></div>
                <div class="<?php if($page == 'parts'){ echo 'text-hover'; }else{echo 'text';} ?>">PARTS</div>
              </a>
            </li> -->
          <!-- </ul> -->
          
          <!-- <ul class="nav flex-column mb-2">
            <li class="<?php if($page == 'report'){ echo 'nav-item active'; }else{ echo 'nav-item'; } ?>">
              <a class="nav-link mx-auto" href="mainIndex.php?page=report">
                <div class="icon-img <?php if($page == 'report'){ echo 'report-hover'; }else{ echo 'report';} ?>"></div>
                <div class="<?php if($page == 'report'){ echo 'text-hover'; }else{echo 'text';} ?>">REPORTS</div>
              </a>
            </li>
          </ul> -->
        </div>
      </nav>
      <?php 
          if ($page == 'customer') {
             include "../module/customer/index.php";
          }
		  else if ($page == 'add_customer') {
             include "../module/add_customer/index.php"; 
          }
		  else if ($page == 'vehicle') {
             include "../module/vehicle/index.php"; 
          }
		  else if ($page == 'add_vehicle') {
             include "../module/add_vehicle/index.php"; 
          }
		  else if ($page == 'appointment') {
             include "../module/appointment/index.php"; 
          }
		  else if ($page == 'jobsheet') {
             include "../module/jobsheet/index.php"; 
          }
      else if ($page == 'add_jobsheet') {
             include "../module/jobsheet/add_jobsheet.php"; 
          }
		  else if ($page == 'job_board') {
             include "../module/job_board/index.php"; 
          }
		  else if ($page == 'quotation') {
             include "../module/quotation/index.php"; 
          }
		  else if ($page == 'billing') {
             include "../module/billing/index.php"; 
          }
		  else if ($page == 'parts') {
             include "../module/parts/index.php"; 
          }
          else if ($page == 'report') {
             include "../module/report/index.php"; 
          }
		  else if ($page == 'setting') {
             include "../module/setting/index.php"; 
          }
          else if ($page == 'user_access') {
             include "../module/setting/user_access.php"; 
          }
		  else if ($page == 'running_no') {
             include "../module/setting/running_no.php"; 
          }
		  
      ?>
      <div class="col-2 fixed-bottom float-left" style="background-color: #fff;">
        <table class="settings" width="100%">
          <tr>
            <td class="<?php if($page == 'maintenance'){ echo 'active-bottom'; } ?>">
              <a href="mainIndex.php?page=maintenance">
                <div class="icon <?php if($page == 'maintenance'){ echo 'maintenance-hover'; }else{ echo 'maintenance'; } ?>"></div>
              </a>
            </td>
            <td class="<?php if($page == 'setting' || $page == 'user_maintenance'){ echo 'active-bottom'; } ?>">
              <a href="mainIndex.php?page=setting">
                <div class="icon <?php if($page == 'setting' || $page == 'user_maintenance'){ echo 'setting-hover'; }else{ echo 'setting'; } ?>"></div>
              </a>
            </td>
            <td class="<?php if($page == 'manual'){ echo 'active-bottom'; } ?>">
              <a href="mainIndex.php?page=manual">
                <div class="icon <?php if($page == 'manual'){ echo 'manual-hover'; }else{ echo 'manual'; } ?>"></div>
              </a>
            </td>
            <td class="<?php if($page == 'help'){ echo 'active-bottom'; } ?>">
              <a href="mainIndex.php?page=help">
                <div class="icon <?php if($page == 'help'){ echo 'help-hover'; }else{ echo 'help'; } ?>"></div>
              </a>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-10 fixed-bottom ml-auto">
          <div class="row">
            <div class="col-12 foot"><strong>Vehicle Sales Management System</strong> <i>developed by Softworld Software Sdn Bhd</i></div>
          </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <script src="../include/js/jquery-2.1.3.min.js"></script>
  <script src="../include/js/bootstrap.min.js"></script>
  <script src="../include/DataTables/datatables.min.js"></script>
  <script type="text/javascript">
    tday = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    tmonth = new Array("January","February","March","April","May","June","July","August","September","October","November","December");

    function GetClock(){
      var d = new Date();
      var nday = d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
      var nhour = d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

      if(nhour == 0){ap = " AM";nhour=12;}
      else if(nhour < 12){ap = " AM";}
      else if(nhour == 12){ap = " PM";}
      else if(nhour > 12){ap = " PM";nhour-=12;}

      if(nmin <= 9) nmin = "0"+nmin;
      if(nsec <= 9) nsec = "0"+nsec;

      document.getElementById('clockbox').innerHTML = ""+nhour+":"+nmin+":"+nsec+ap+" "+tday[nday]+", "+ndate+" "+tmonth[nmonth]+" "+nyear;
    }

    window.onload=function(){
      GetClock();
      setInterval(GetClock,1000);
    }
  </script>
</body>

<!--======================================================================================================-->
<!-- Edit Job Title Modal -->
  <form action="../module/setting/jobtitle_action.php" method="post">
    <div id="edit_jobtitle" class="modal fade" tabindex="-1" role="dialog" style="z-index: 1050;">
      <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-header"> 
            <h5> EDIT </h5> 
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div> 
          <div class="modal-body">
            <input type="hidden" class="form-control" id="modal_id" name="modal_id">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">POSITION</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="modal_position" name="modal_position" placeholder="Enter Position">
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">DESCRIPTION</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modal_description" name="modal_description" placeholder="Enter Description">
                </div>
            </div>
            <input type="submit" class="btn btn-green" value="SAVE" name="edit">
          </div>                          
        </div> 
      </div>
    </div>
  </form>
<!-- end of edit modal -->
<!-- =====================================================================================================-->

<!--======================================================================================================-->
<!-- Edit User Management Modal -->
  <form action="../module/setting/user_action.php" method="post">
    <div id="edit_user" class="modal fade" tabindex="-1" role="dialog" style="z-index: 1050;">
      <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-header"> 
            <h5> EDIT </h5> 
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div> 
          <div class="modal-body">
            <input type="hidden" class="form-control" id="user_id" name="user_id">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">FULL NAME</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="user_name" name="user_name">
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">IC NO.</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="user_ic" name="user_ic">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">POSITION</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="user_pos" name="user_pos">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">DEPARTMENT</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="user_department" name="user_department">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">ACTIVATION EMAIL</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="user_email" name="user_email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">CONTACT NO.</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="user_contact" name="user_contact">
                </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-4 col-form-label">ACCESS GROUP</label>
                <div class="col-sm-8">
                  <select class="form-control" id="user_level" name="user_level">
                    <?php 
                      $user_access_q = "SELECT id, access_level FROM fwms_job_title"; 
                      $user_access = mysqli_query($con, $user_access_q);
                          while($user_access_p = mysqli_fetch_assoc($user_access)) {
                    ?>
                    <option value="<?php echo $user_access_p['id']; ?>">
                        <?php echo strtoupper($user_access_p["access_level"]); ?>
                    </option>
                    <?php }?>       
                  </select> 
                </div>
            </div>
            <div style="float:right; padding-top: 5px;">
              <input type="submit" class="btn btn-yellow" value="SAVE" name="edit_user">
            </div>
          </div>                          
        </div> 
      </div>
    </div>
  </form>
<!-- end of edit modal -->
<!-- =====================================================================================================-->

<!--======================================================================================================-->
<!-- Import File Modal -->
<!--   <form action="../module/registration/import_registration_action.php" method="post">
 -->    <div id="import_reg" class="modal fade" tabindex="-1" role="dialog" style="z-index: 1050;">
      <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-header" style="border-bottom: unset; padding-top:1.5rem;"> 
            <h5 class="modal-title" style="margin:0 auto;">FILE IMPORTING</h5>
            <button type="button" class="close" style="padding:unset; margin:unset;" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div> 
          <div class="modal-body" style="padding: 0rem;">
            <form enctype="multipart/form-data" action="../module/registration/import_registration_action.php" method="post" onSubmit="document.getElementById('import-button').style.display = 'none'; document.getElementById('loadingicon').style.display = 'block';">
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                  <div valign="middle" align="center">
                        <span style="color:#F00; align:center; font-weight:bold;">Note:</span><br>
                        Please download given template.<br>Uploaded file must be excel (.xlsx/.xls) file.<br>
                    <?php
                      if ($handle = opendir('downloads/')) {
                        echo "<a href='download_file.php?file=registration_form.xlsx'>Download Template</a>\n<br><br>";
                        closedir($handle);
                      }
                    ?>
                  </div> 
                  <div valign="middle" align="center" style="margin-bottom: 20px">
                    <strong>File Name: </strong>
                    <input  style="width:210px;" type="file" name="fileToUpload" id="fileToUpload" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                    <br><br>
                    <!-- <div class="checkbox">
                      <label><input type="checkbox" value="">&nbsp; Send activation email</label>
                    </div> -->
                  </div>
                  <div>
                    <table style="width:100%; height: 45px;">
                      <tr>
                        <td style="width: 50%; text-align: center; background-color: #00fbce;"><input type="submit" class="btn" id="import-button" value="UPLOAD" style="background: transparent; font-size: 12px; font-weight: bold;"></td>
                        <td style="width: 50%; text-align: center; background-color: grey;">
                          <button class="btn" id="import-button" data-dismiss="modal" aria-hidden="true" style="background: transparent; font-size: 12px; font-weight: bold;">DISCARD</button>
                        </td>
                      </tr>
                    </table>
                  </div>
            </form>
          </div>                          
        </div> 
      </div>
    </div>
  <!-- </form> -->
<!-- end of import file modal -->
<!-- =====================================================================================================-->
</html>
