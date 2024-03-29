<?php
    include_once 'header.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div id="signup">
<div id ="main" >
<div class="container mt-5 ">
	<div class="row justify-content-md-center">
		<div class="col col-md-4">
			
			<span id="message"></span>
			<div class="card" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);">
				<div class="card-header"><center><h5>Login</h5></center></div>
				<div class="card-body">
					<form method="post" id="admin_login_form" action="includes/logina.inc.php">
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" name="admin_email_address" id="admin_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" />
						</div>

						<div class="form-group">

							<label>Password</label>
							<div class="input-group">
							<input type="password" name="admin_password" id="admin_password" class="form-control" required  data-parsley-trigger="keyup" />
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
								<div class="form-group text-center">
									<input type="hidden" name="action" value="admin_login" />
									<input type="submit" name="admin_login_button" id="admin_login_button" class="btn btn-block btn-primary" value="Login" />
								</div>
														
						</div>

						
						<?php
						if (isset($_GET["error"])){
								if ($_GET["error"] === "emptyinput"){
									?>
									<script>
									swal("Something went wrong", "Fill Empty Field", "error");
									</script>
								<?php
								}
								else if ($_GET["error"] === "wronglogin"){
									?>
									<script>
									swal("Something went wrong", "Incorrect Login Info", "error");
									</script>
								<?php
								}
								else if ($_GET["error"] === "wrongpassword"){
									?>
									<script>
									swal("Something went wrong", "Wrong Password", "error");
									</script>
								<?php
								}
							}
							?>
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

			var input = $("#admin_password");
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