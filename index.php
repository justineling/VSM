<!DOCTYPE html>
<html lang="en">
<head>
	<title>VSM</title>
	<!-- icon -->
	<link rel="icon" href="include/icon/tab_icon.png">

	<!-- Required meta tags -->
	<meta charset="utf-8">

	<meta name="viewport" content="width=1024">

	<!-- Bootstrap css -->
	<link rel="stylesheet" href="include/css/bootstrap.min.css">

	<style type="text/css">
	    @font-face {
	      font-family: 'Century Gothic';
	      src: url("include/font/century-gothic.ttf");
	    }

	    @font-face {
	      font-family: 'Century Gothic Bold';
	      src: url("include/font/century-gothic-bold.ttf");
	    }
	    body{
	    	font-family: 'Century Gothic';
	    	background: -webkit-linear-gradient(#ffab68, #ff9973); /* Chrome 10+, Safari 5.1+ */
		    background: -o-linear-gradient(#ffab68, #ff9973); /* Opera 11.1+ */
		    background: -moz-linear-gradient(#ffab68, #ff9973); /* Firefox 3.6+ */
		    background: linear-gradient(#ffab68, #ff9973); /* Standard syntax (must be last) */
		    background-color: #007acc; /*set a background color in case the gradient doesn't load */
	    }
	    .container{
	    	position: absolute; 
	    	top:0; 
	    	bottom: 0; 
	    	left: 0; 
	    	right: 0; 
	    	margin: auto; 
	    	width: 26%; 
	    	height: 52%; 
	    	text-align: center;
	    	background-color: #fff;
	    	box-shadow: 0px -4px 5px 3px rgba(58, 58, 58, 0.1), 
	    				-4px 0px 5px 3px rgba(58, 58, 58, 0.1), 
	    				4px 0px 5px 3px rgba(58, 58, 58, 0.1), 
	    				0px 4px 5px 3px rgba(58, 58, 58, 0.1);
	    	border-radius: 15px;
	    	padding: 3px;
	    }
	    .localtime{
	    	font-family: 'Century Gothic';
	    	font-size: 12px;
	    	color: #000;
	    	font-style: italic;
	    	margin-bottom: 15px;
	    }
	    .form-horizontal{
	    	padding-left: 10%;
	    	padding-right: 10%;
	    }
	    .btn-login{
	    	width: 100%;
	    	border-radius: 0;
	    	background-color: #ed008c;
	    	color:#fff;
	    	font-family: 'Century Gothic Bold';
	    	text-align: center;
	    }
	  /*  input[type="text"]:focus,
		input[type="password"]:focus{
			border-color: transparent;
			box-shadow: none;
			outline: 0 none;
			border-bottom: 1px solid #000;
		}*/
	    .form-control{
	    	border-radius: 0;
	    	border: 1px solid transparent;
	    	border-bottom: 1px solid #000;
	    	font-size: 12px;
	    }
	    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		   color: #000!important;
		   font-family: 'Century Gothic Bold';
		   letter-spacing: 3px;
		   font-size: 12px;
		}
		::-moz-placeholder { /* Firefox 19+ */
		   color: #000!important;
		   font-family: 'Century Gothic Bold';  
		   letter-spacing: 3px;
		   font-size: 12px;
		}
		:-ms-input-placeholder { /* IE 10+ */
		   color: #000!important;
		   font-family: 'Century Gothic Bold';
		   letter-spacing: 3px;
		   font-size: 12px;
		}
		:-moz-placeholder { /* Firefox 18- */
		   color: #000!important; 
		   font-family: 'Century Gothic Bold';
		   letter-spacing: 3px;
		   font-size: 12px;
		}
		.foot_bottom{
			font-family: 'Century Gothic';
			background: #A8A8A8; 
			padding:10px; 
			position:absolute; 
			top:96%; 
			left:0; 
			right:0;
			bottom:0; 
			color:#000; 
    		font-size: 11px; 
    		text-align: center;
		}
		.foot_title{
			font-family: 'Century Gothic Bold';
		}
		.rectangle{
			padding-top:45px;
			padding-left: 25px;
			padding-right: 25px;
			padding-bottom: 35px;
		}
		.centered {
		  position: fixed;
		  top: 50%;
		  left: 50%;
		  /* bring your own prefixes */
		  transform: translate(-50%, -50%);
		  width:20%;
		}
		.error{
			text-align: center;
		    height: 10%;
		    width: 50%;
		    position: absolute;
		    margin: auto;
		    top: 18%;
		    left: 0;
		    right: 0;
		}
	</style>
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION['error']))
		{
			echo '<div class="error"><span style="font-size:12px; font-weight:bold; color:red; text-align:center; letter-spacing:0.5px">'.$_SESSION['error'].'</span></div>';
		}
		unset($_SESSION['error']);
	?>	
	<section class="container">
		<div class="rectangle">	
			<h4> Vehicle Sales Management System</h4>
			<!--<img src="include/img/login_icon.png" style="width: auto;">-->
			<br>
		</div>
		<form method="post" action="action.php" class="form-horizontal">
			<div class="centered">
				<div class="form-group" style="margin-bottom:1.1rem !important;">
					<div style="text-align: center;">
						<input type="text" class="form-control" id="username" name="username" required autofocus onblur = "onBlurUserLevel(this.value)" placeholder="USERNAME">
					</div>
				</div>
				<div class="form-group" style="margin-bottom:1.1rem !important;">
					<input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD">
				</div>
				<div class="form-group" style="margin-bottom:1.1rem !important;">
					<input type="access_level" class="form-control" id="access_level" name="access_level" placeholder="ADMIN"readonly>
				</div>
			</div>
		
		<div style="position: absolute; bottom:0px; right:0; width:100%">
			<input type="submit" class="btn btn-login" style="padding:15px; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px;" value="LOG IN" name="login">
		</div>
		</form>
	</section>
</body>

<footer>
	<div class="foot_bottom">
		<span class="foot_title">Foreign Worker Management System &nbsp;</span><i>developed by Softworld Software Sdn. Bhd.</i>
	</div>
</footer>
</html>

<script src="include/js/jquery-2.1.3.min.js"></script>
<script src="include/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function onBlurUserLevel(a){
		var dataString = 'a='+a;
		$.ajax({
			type: "POST",
			url: "checkAccessLevel.php",
			data: dataString,
			cache: true,
			success: function (result){
				if(result != "")
				{
					$("#"+'access_level').attr("placeholder", result);
				}
			}
		})
	}
</script>
