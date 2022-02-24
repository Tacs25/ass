<?php
include_once 'header.php';
require_once '../includes/functions.inc.php';
require_once '../includes/dbh.inc.php';
session_start();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div id="edit">
<div id ="main" >
<div class="container mt-4 " id="content">
	<div class="row content d-flex justify-content-center">
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card">
				<div class="card-header">Register</div>
				<div class="card-body">
					<form method="post" id="patient_register_form" action="../includes/update.inc.php">
						<div class="form-group">
							
							<label>Current Password<span class="text-danger"></label>
							<div class="input-group">
							<input type="password" name="current_password" id="current_password" class="form-control" required  />
							<div class="input-group-prepend">
								<div class="input-group-text">
									<a href="#" class="text-dark" id="icon-click">
										<i class="fas fa-eye" id="icon"></i>
									</a>
								</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">

								<div class="form-group">

									<label>New Password<span class="text-danger"></label>
									<div class="input-group">
									<input type="password" name="new_password" id="new_password" class="form-control" required   />
									<div class="input-group-prepend">
										<div class="input-group-text">
											<a href="#" class="text-dark" id="icon-click1">
												<i class="fas fa-eye" id="icon1"></i>
											</a>
										</div>
									</div>
								</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">

									<label>Confirm Password<span class="text-danger"></label>
									<div class="input-group">
									<input type="password" name="repeat_password" id="repeat_password" class="form-control" required   />
									<div class="input-group-prepend">
										<div class="input-group-text">
											<a href="#" class="text-dark" id="icon-click2">
												<i class="fas fa-eye" id="icon2"></i>
											</a>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_register" />
							<input type="submit" name="edit_button" id="edit_button" class="btn btn-primary btn-block" value="Confirm" />
						</div>

						<div class="form-group text-center">
							<p><a href="../patient/profile.php">Cancel</a></p>
						</div>
					</form>
				</div>
			</div>
			<br />
			<br />
		</div>
	</div>
</div> 
</div>
</div>  
			<?php 
				if (isset($_GET["error"])){
					if ($_GET["error"] === "passnotmatch"){
            			?>
            			<script>
            			swal("Something Went Wrong", "Password didn't match", "error");
            			</script>
          				<?php
          			}
					else if ($_GET["error"] === "wrongpassword1"){
            			?>
            			<script>
            			swal("Something Went Wrong", "Wrong Password", "error");
            			</script>
          				<?php
          			}
      			}
			?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#icon-click").click(function(){
			$("#icon").toggleClass('fa-eye-slash');

			var input = $("#current_password");
			if(input.attr("type") === "password"){
				input.attr("type","text");
			}
			else
			{
				input.attr("type","password");
			}
			
		});
		$("#icon-click1").click(function(){
			$("#icon1").toggleClass('fa-eye-slash');

			var input = $("#new_password");
			if(input.attr("type") === "password"){
				input.attr("type","text");
			}
			else
			{
				input.attr("type","password");
			}
			
			
		});
		$("#icon-click2").click(function(){
			$("#icon2").toggleClass('fa-eye-slash');

			var input = $("#repeat_password");
			if(input.attr("type") === "password"){
				input.attr("type","text");
			}
			else
			{
				input.attr("type","password");
			}
			
			
		});
	});

</script>
