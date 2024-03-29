<?php
    include_once 'header.php';
?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<div id="signup">
<div id ="main" >
<div class="container mt-5 ">
	<div class="row justify-content-md-center">
		<div class="col col-md-4">
			
			<span id="message"></span>
			<div class="card" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);">
				<div class="card-header"><center><h5>Login</h5></center></div>
				<div class="card-body">
				<?php
						if (isset($_GET["error"])){
							
								if ($_GET["error"] === "wronglogin"){
									?>
									<div class="alert alert-danger" role="alert">
										Incorrect Login Info.
									</div>
									
								<?php
								}
								else if ($_GET["error"] === "wrongpassword"){
									?>
									<div class="alert alert-danger" role="alert">
										Wrong Password.
									</div>
									
								<?php
								}
								else if ($_GET["error"] === "youneedtoverify"){
									?>
									<div class="alert alert-danger" role="alert">
										You need to verify your email.
									</div>
									
								<?php
								}
								else if ($_GET["error"] === "invalidemai"){
									?>
									<div class="alert alert-danger" role="alert">
										Invalid Email.
									</div>
									
								<?php
								}
									
								else if ($_GET["error"] === "success"){
									?>
									<div class="alert alert-success" role="alert">
										Password Changed Successfully.
									</div>
									
								<?php
								}
							}
							?>
					<form method="post" id="patient_login_form" action="includes/login.inc.php">
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" />
						</div>

						<div class="form-group">

							<label>Password</label>
							<div class="input-group">
							<input type="password" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" />
							<div class="input-group-prepend">
								<div class="input-group-text">
									<a href="#" class="text-dark" id="icon-click">
										<i class="fas fa-eye" id="icon"></i>
									</a>
								</div>
								</div>
							</div>
						</div>

						<div class = "row">
							<div class="col-md-6">
								<div class="form-group text-center">
									<input type="hidden" name="action" value="patient_login" />
									<input type="submit" name="patient_login_button" id="patients_login_button" class="btn btn-block btn-primary" value="Login" />
								</div>
							</div>
				
							<div class="col-md-6">
								<div class="form-group text-center">
									
									<a href="signup.php" class="btn btn-block btn-outline-dark"> Sign up </a>
								</div>
							</div>
							</div>

							
						</div>

						<div class="form-group text-center">
							<p><a href="../forgotpass.php">Forgot Password?</a></p>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#icon-click").click(function(){
			$("#icon").toggleClass('fa-eye-slash');

			var input = $("#patient_password");
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

<?php
    include_once 'footer.php';    
?>