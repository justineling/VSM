<style>
a {
	color:#000;
}

a:hover{
	color:#62e6ac;
}
.salesiconstyle{
	position:relative;
	background-color:#fff;
	background-image:url('../../include/icon/report/SALES ORDER(BLACK).png');
	background-repeat:no-repeat;
	width:50px;
	height:50px;
	background-position:100px 80px;
}

.salesiconstyle:hover{
	position:relative;
	background-color:#000;
	background-image:url('../../include/icon/report/SALES ORDER.png');
	background-repeat:no-repeat;
	width:50px;
	height:50px;
	background-position:100px 80px;
}

.sbiconstyle{
	position:relative;
	background-color:#fff;
	background-image:url('../../include/icon/report/SB REPORT(BLACK).png');
	background-repeat:no-repeat;
	width:50px;
	height:50px;
	background-position:100px 80px;
}

.sbiconstyle:hover{
	position:relative;
	background-color:#000;
	background-image:url('../../include/icon/report/SB REPORT.png');
	background-repeat:no-repeat;
	width:50px;
	height:50px;
	background-position:100px 80px;
}

.dailyiconstyle{
	position:relative;
	background-color:#fff;
	background-image:url('../../include/icon/report/DAILY REPORT(BLACK).png');
	background-repeat:no-repeat;
	width:50px;
	height:50px;
	background-position:100px 80px;
}

.dailyiconstyle:hover{
	position:relative;
	background-color:#000;
	background-image:url('../../include/icon/report/DAILY REPORT.png');
	background-repeat:no-repeat;
	width:50px;
	height:50px;
	background-position:100px 80px;
}

.icontext{
	position:absolute;
    top:65%;
	width:90%; 
	text-align:center;
	letter-spacing:0.5px;
	font-size:12px;
}

.icontext:hover{
	position:absolute;
    top:65%;
	width:90%; 
	text-align:center;
	letter-spacing:0.5px;
	font-size:12px;
}
</style>

<form action="" method="post">
<div class="container-fluid" id="reportsales" style="margin-top:30px">
	
	<div class="row">
		<div class="col-xs-1 col-md-1" style="margin-top:12px">
			&nbsp;
		</div>
		
		<a href="../../main/main/mainStaff.php?page=salesordersales">
		<div class="col-xs-3 col-md-3 salesiconstyle" style="margin-top:100px; border:1px solid black; height:250px; width:250px;">
			<span class="icontext">SALES ORDER LIST</span>
		</div>
		</a>
		<div class="col-xs-1 col-md-1" style="margin-top:12px; width:3%">
			&nbsp;
		</div>
		<a href="../../main/main/mainStaff.php?page=sbreportsales">
		<div class="col-xs-3 col-md-3 sbiconstyle" style="margin-top:100px; border:1px solid black; height:250px; width:250px;">
			<span class="icontext">SB REPORT</span>
		</div>
		</a>
		<div class="col-xs-1 col-md-1" style="margin-top:12px; width:3%">
			&nbsp;
		</div>
		<a href="../../main/main/mainStaff.php?page=dailyreportsales">
		<div class="col-xs-3 col-md-3 dailyiconstyle" style="margin-top:100px; border:1px solid black; height:250px; width:250px;">
			<span class="icontext">DAILY REPORT</span>
		</div>
		</a>
		
		<div class="col-xs-1 col-md-1" style="margin-top:12px">
			&nbsp;
		</div>
	</div>
</div>
</form>