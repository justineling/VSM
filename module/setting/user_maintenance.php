
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
		background-color: #ffb464;
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
		padding-left: 10px;
		padding-right: 10px;
	}
</style>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="row row2">
		<div class="col-7 title">
			<b>USER MAINTENANCE</b>
		</div>
	</div>
	<div class="row" style="width:45%; padding-left: 0.5rem;">
		<div class="col">
			<a href="mainIndex.php?page=job_title">
			    <div class="square">  
					<img src="../include/img/setting/JOB TITLE(GREY).png" class="img-bottom">  
					<img src="../include/img/setting/JOB TITLE(WHITE).png" class="img-top">
			    </div>
		    </a>
		    <div class="sub-setting">JOB TITLE</div>  
		</div>
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
			<a href="mainIndex.php?page=user_management">
			    <div class="square">
			        <img src="../include/img/setting/USER MANAGEMENT(GREY).png" class="img-bottom">  
			        <img src="../include/img/setting/USER MANAGEMENT(WHITE).png" class="img-top">   	         
			    </div>
		    </a>
		    <div class="sub-setting">USER MANAGEMENT</div>
		</div>
	</div>
</main>
<script src="../include/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
	//same width and height for the square
	var square_width = $('.col').width();
	$('.square').css('height', square_width);
</script>