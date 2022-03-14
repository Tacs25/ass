<?php
    include_once 'header.php';
	include_once 'includes/functions.inc.php';
    include_once 'includes/dbh.inc.php';
?>
<?php
session_start();
if(isset($_SESSION['id']))
{
	$id = $_SESSION['id']; 
	$result = $conn->query("SELECT * FROM data WHERE ID = $id");
	$row = $result->fetch_assoc();
	$user = $row['User_ID'];
	$sql = "SELECT * FROM profileimg WHERE status = 1 AND User_ID = '$user' ";
	$results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$rows = $results->fetch_assoc();
	
?>

</style>

<div id="edit">
<div id ="main" >
<div class="container mt-4 " id="content">
	<div class="row content d-flex justify-content-center">
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card"  style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);">
				<div class="card-header"><center><h5>Edit Information</h5></center></div>
				<div class="card-body">
				<p><?php 
				if (isset($_GET["error"])){
					if ($_GET["error"] === "filetoobig"){
						?>
						<div class="alert alert-danger" role="alert">
							This File is too big!
						</div>
					<?php
					}
					else if ($_GET["error"] === "notthistype"){
						?>
						<div class="alert alert-danger" role="alert">
						You cannot upload files of this type!
						</div>
					<?php
					}
					else if ($_GET["error"] === "successupload"){
						?>
						<div class="alert alert-success" role="alert">
						Changed Profile Picture Successfully.
						</div>
					<?php
					
					}}
				
				
					
				if ($rows){ ?>
				<div class="row content d-flex justify-content-center text-center"><label>Profile Image</label>
				<?php echo "<img src='../uploads/profile$user.jpg?".mt_rand()."' style='width:200px;height:180px; border-radius: 50%'"; ?></div>
					<form method="post" id="upload_image" action="../upload.php" enctype="multipart/form-data">
						<!-- <label>Profile Image</label> -->
						<input type="file" name="imahe"> <br>
						<button type="submit" name="subimg" class="btn btn-block btn-secondary">Upload</button>
					</form>

					</div>


					<?php } else {?>
					<div class="row content d-flex justify-content-center text-center"><label>Profile Image</label>
					<?php echo "<img src='../uploads/profiledefault.jpg' style='width: 200px; height:180px; border-radius: 50%;'"; ?> </div>
					<form method="post" id="upload_image" action="../upload.php" enctype="multipart/form-data">
						<!-- <label>Profile Image</label> -->
						<input type="file" name="imahe">
						<button type="submit" name="subimg" class="btn btn-block btn-secondary">Upload</button>
					</form>
					</div>
					<hr>
					<?php
					}
					?>
					
					<form method="post" id="patient_register_form" action="includes/edit.inc.php">
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required value="<?php echo $row['Email']; ?>" readonly/>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="patient_first_name" id="patient_first_name" class="form-control" required value="<?php echo $row['First_Name']; ?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="patient_last_name" id="patient_last_name" class="form-control" required value="<?php echo $row['Last_Name']; ?>"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Contact No.</label>
							<input type="tel"  name="patient_phone_no" id="patient_phone_no" class="form-control" placeholder="+63912345678" required value="<?php echo $row['Contact']; ?>"/>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea name="patient_address" id="patient_address" class="form-control" required ><?php echo $row['Home']; ?></textarea>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_register" />
							<input type="submit" name="edit_button" id="edit_button" class="btn btn-block btn-primary" value="Confirm" />
						</div>

						<div class="form-group text-center">
							<p><a href="patient/profile.php">Cancel</a></p>
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
}
?>

<?php
    include_once 'footer.php';    
?>