<?php
    include_once 'header.php';
	include_once 'includes/functions.inc.php';
?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</div>  
<div id="signup">
<div id ="main" >
<div class="container mt-4 " id="content">
	<div class="row content d-flex justify-content-center " >
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);">
				<div class="card-header"><center><h5>Register</h5></center></div>

				<div class="card-body">
				<?php 
							if (isset($_GET["error"])){
								if ($_GET["error"] === "emptyinput"){
									?>
									<div class="alert alert-danger" role="alert">
										Fill Empty Input.
									</div>
								<?php
								}
								
								else if ($_GET["error"] === "invalidemail"){
									?>
									<div class="alert alert-danger" role="alert">
										Invalid Email.
									</div>
								<?php
								}
								
								else if($_GET["error"] === "passworddontmatch"){
									?>
									<div class="alert alert-danger" role="alert">
										Password didn't match.
									</div>
									
								<?php
								}
								
								else if ($_GET["error"] === "somethingwentwrong"){
									?>
									<div class="alert alert-danger" role="alert">
										Something went wrong.
									</div>
									
								<?php
								}
								
								else if ($_GET["error"] === "emailtaken"){
									?>
									<div class="alert alert-danger" role="alert">
										Email Already Exist.
										</div>
								<?php
								}
								else if ($_GET["error"] === "invalidfirstname"){
									?>
									<div class="alert alert-danger" role="alert">
										Invalid First Name.
										</div>
								<?php
								}
								else if ($_GET["error"] === "invalidlastname"){
									?>
									<div class="alert alert-danger" role="alert">
										Invalid Last Name.
										</div>
								<?php
								}
								else if ($_GET["error"] === "invalidContact"){
									?>
									<div class="alert alert-danger" role="alert">
										Invalid Contact Number.
										</div>
								<?php
								}
								else if ($_GET["error"] === "selectgender"){
									?>
									<div class="alert alert-danger" role="alert">
										Please Select Gender.
										</div>
								<?php
								}
							}
							?>
					<form method="post" id="patient_register_form" action="../signup.inc.php">
						<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<?php if (isset($_GET['first'])){?>
										<label>First Name<span class="text-danger"></label>
										<input type="text" name="patient_first_name" id="patient_first_name" required value = "<?php echo $_GET['first']; ?>"class="form-control" required   />
										<?php } else {?>
										<label>First Name<span class="text-danger"></label>
										<input type="text" name="patient_first_name" id="patient_first_name" class="form-control" required   />
										<?php }?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<?php if (isset($_GET['last'])){?>
										<label>Last Name<span class="text-danger"></label>
										<input type="text" name="patient_last_name" id="patient_last_name" required value = "<?php echo $_GET['last']; ?>" class="form-control" required   />
										<?php } else { ?>
										<label>Last Name<span class="text-danger"></label>
										<input type="text" name="patient_last_name" id="patient_last_name" class="form-control" required   />
										<?php }?>
									</div>
								</div>
							</div>
						
						
						<div class="form-group">
							<label>Gender<span class="text-danger"></label>
								<select required name="patient_gender" id="patient_gender" class="form-control" autofocus required>
									<option><p>--Select Gender--</p></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
						</div>
						<div class="form-group">
						<?php if (isset($_GET['contact'])){
							$contact = $_GET['contact'];?>
							<label>Contact No.<span class="text-danger"></label><br>
							<input type="tel"  name="patient_phone_no" id="patient_phone_no" class="form-control" required value = "+<?php echo "$contact"; ?>"required   />
							<?php } else {?>
							<label>Contact No.<span class="text-danger"></label>
							<input type="tel"  name="patient_phone_no" id="patient_phone_no" class="form-control" required value = "+63"required   />
							<?php }?>
						</div>
						
						<div class="form-group">
						<?php if (isset($_GET['email'])){?>
							<label>Email Address<span class="text-danger"></label>
							<input type="text" name="patient_email_address" id="patient_email_address" required value = "<?php echo $_GET['email']; ?>"class="form-control" required />
							<?php } else {?>
							<label>Email Address<span class="text-danger"></label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required />
							<?php }?>
						</div>
						<div class="form-group">

							<label>Password<span class="text-danger"></label>
							<div class="input-group">
							<input type="password" name="patient_password" id="patient_password" class="form-control" required  />
							<div class="input-group-prepend">
								<div class="input-group-text">
									<a  class="text-dark" id="icon-click">
										<i class="fas fa-eye" id="icon"></i>
									</a>
								</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Confirm Password<span class="text-danger"></label>
							<div class="input-group">
							<input type="password" name="patient_passwordrp" id="patient_passwordrp" class="form-control" required  />
							<div class="input-group-prepend">
							<div class="input-group-text">
									<a  class="text-dark" id="icon-click1">
										<i class="fas fa-eye" id="icon1"></i>
									</a>
								</div>
								</div>
							</div>
						</div>
						<div class="form-group">
						<?php if (isset($_GET['address'])){?>
							<label>Address<span class="text-danger"></label>
							<textarea name="patient_address" id="patient_address" class="form-control" required ><?php echo $_GET['address']; ?></textarea>
							<?php } else {?>
							<label>Address<span class="text-danger"></label>
							<textarea name="patient_address" id="patient_address" class="form-control" required ></textarea>
							<?php }?>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_register" />
							<input type="submit" name="patient_register_button" id="patient_register_button" class="btn btn-block btn-primary" value="Register" />
						</div>

						<div class="form-group text-center">
							<p><a href="login.php">Login</a></p>
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
		$("#icon-click1").click(function(){
			$("#icon1").toggleClass('fa-eye-slash');

			var input = $("#patient_passwordrp");
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
