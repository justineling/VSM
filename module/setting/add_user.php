<?php 
	include("../include/dbconnection.php");
?>

<style type="text/css">
	.row2{
    	padding-left: 0.3rem;
    	padding-right: 0.3rem;
    	margin-top: 1rem;
    }
    .line{
    	border-top: solid 1px #000;
    	margin-left: unset;
    	margin-right: unset;
    	margin-top: 5px;
    	margin-bottom: 5px;
    }
</style>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="row row2">
		<div class="col-12" id="message">
			<?php
				if(isset($_SESSION['message'])){
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				}
			?>
		</div>
		<div class="col-12 title">		
			<b>ADD USER</b>
			<hr class="line">
		</div>
		<div class="col-7">
			<form method="post" action="../module/setting/user_action.php">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">FULL NAME</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Full Name">
					</div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-4 col-form-label">IC NO.</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="ic" name="ic" placeholder="Enter IC No.">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-4 col-form-label">POSITION</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="pos" name="pos" placeholder="Enter Position">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-4 col-form-label">DEPARTMENT</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-4 col-form-label">ACTIVATION EMAIL</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-4 col-form-label">CONTACT NO.</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone No.">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-4 col-form-label">ACCESS LEVEL</label>
				    <div class="col-sm-8">
				      <select class="form-control" id="access_group_select" name="access_group_select">
				      	<option value="">--SELECT--</option>
						<?php 
							$access_q = "SELECT id, access_level FROM fwms_job_title"; 
							$access = mysqli_query($con, $access_q);
					        while($access_p = mysqli_fetch_assoc($access)) {
						?>
				    	<option value="<?php echo $access_p['id']; ?>">
				      		<?php echo strtoupper($access_p["access_level"]); ?>
				      	</option>
					    <?php 	
							}
					    ?>	     
					    </select> 
				    </div>
				</div>
				<input type="submit" class="btn btn-yellow" value="ADD NEW" name="add_user">
			</form>
		</div>
	</div>
</main>
