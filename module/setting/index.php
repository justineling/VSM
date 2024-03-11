
<style type="text/css">
    .row2{
    	padding-left: 0.3rem;
    	padding-right: 1rem;
    	margin-top: 1rem;
    	padding-bottom: 1rem;
    }
    .square{
		border-radius: 0px;
		display: block;
		text-align: center;
		position: relative;
		background-color: #fff;
		border-radius: 15px;
	}
	.square img{
		position: absolute;
	    top: 0;
	    bottom: 0;
	    left: 0;
	    right: 0;
	    width: 55px;
	    height: 55px;
	    margin: auto;
	    
	}
	.square .img-top{
		display: none;
        z-index: 99;
	}
	.square:hover .img-bottom{
		display:none;
	}
	.square:hover .img-top {
        display: inline;
    }
	.col a .square:hover,
	.col a .square:focus{
		background-color: #00ffcc;
		box-shadow: 0px 1px 20px 2px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);	
	}
	.sub-setting{
		color:#000;
		font-family:"Century Gothic";
		font-size: 13px;
		text-align: center;
		margin-top: 10px;
		/*font-weight: bold;*/
	}
	.col{
		padding-left: 20px;
		padding-right: 20px;
	}
</style>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="row row2">
		<!--<div class="col-7 title">
			<b>SETTINGS</b>
		</div>-->
	</div>
	<div class="row" style="width:45%; padding-left: 0.5rem;">
		<div class="col">
			<a href="mainIndex.php?page=user_access">
			    <div class="square">  
					<img src="../include/img/setting/USER ACCESS(GREY).png" class="img-bottom">  
					<img src="../include/img/setting/USER ACCESS(WHITE).png" class="img-top">
			    </div>
		    </a>
		    <div class="sub-setting">USER ACCESS</div>  
		</div>
		<div class="col">
			<a href="#">
			    <div class="square">
			        <img src="../include/img/setting/AUDIT TRAIL(GREY).png" class="img-bottom">  
			        <img src="../include/img/setting/AUDIT TRAIL(WHITE).png" class="img-top">
			    </div>
		    </a>
		    <div class="sub-setting">AUDIT TRAIL</div>
		</div>
		<div class="col">
			<a href="mainIndex.php?page=running_no">
			    <div class="square">
			        <img src="../include/img/setting/DOC RUNNING NO(GREY).png" class="img-bottom">  
			        <img src="../include/img/setting/DOC RUNNING NO(WHITE).png" class="img-top">   	         
			    </div>
		    </a>
		    <div class="sub-setting">DOC RUNNING NO</div>
		</div>
	</div>
	<div class="row" style="padding:2%;"></div>
	<div class="row" style="width:45%; padding-left: 0.5rem;">
		<div class="col">
			<a href="#">
			    <div class="square">
			        <img src="../include/img/setting/MECHANIC MAINTENANCE(GREY).png" class="img-bottom">  
			        <img src="../include/img/setting/MECHANIC MAINTENANCE(WHITE).png" class="img-top">
			    </div>
		    </a>
		    <div class="sub-setting">MECHANIC MAINTENANCE</div>
		</div>
		<div class="col">
			<a href="company_profile.php">
			    <div class="square">
			        <img src="../include/img/setting/PRESET REMINDER(GREY).png" class="img-bottom">  
			        <img src="../include/img/setting/PRESET REMINDER(WHITE).png" class="img-top"> 
			    </div>
		    </a>
		    <div class="sub-setting">NOTIFICATION SETTING</div>
		</div>
		<div class="col">
			<a href="do_difference.php">
			    <div class="square">
			        <img src="../include/img/setting/MAINTAIN RUNNER(GREY).png" class="img-bottom">  
			        <img src="../include/img/setting/MAINTAIN RUNNER(WHITE).png" class="img-top"> 
			    </div>
		    </a>
		    <div class="sub-setting">NOTICE BOARD</div>
		</div>
		
	</div>
</main>
<script src="../include/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
	//same width and height for the square
	var square_width = $('.col').width();
	$('.square').css('height', square_width);
</script>