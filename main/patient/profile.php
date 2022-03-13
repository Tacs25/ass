<?php
    include_once 'header.php';
	include_once '../includes/functions.inc.php';
	include_once '../includes/dbh.inc.php';

session_start();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">
	<?php $page = 'profile'; include('navbar.php'); ?>

	<br>
    
	<div class="container">
   
			<div class="row">
            <div class="col-md-4 mb-3">
              <div class="card">
			  <?php
    					if(isset($_SESSION['id']))
						{
							$id = $_SESSION['id']; 
							$result = $conn->query("SELECT * FROM data WHERE ID = $id");
							$row = $result->fetch_assoc();
							
					?>
				  
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">

                      <h4><?php echo $row['First_Name']?> <?php echo $row['Last_Name']?></h4>
                      
                      <button class="btn btn-primary">Upload Photo</button>
                     
                    </div>
                  </div>
                </div>
              </div>
			  </div>
			  
			  <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						<?php echo $row['First_Name']; ?>
                    </div>
                  </div>
				 
                  <hr>
				  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						<?php echo $row['Last_Name']; ?>
                    </div>
                  </div>
				 
                  <hr>
				  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						<?php echo $row['Gender']; ?>
                    </div>
                  </div>
				 
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						<?php echo $row['Email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contact no.</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						<?php echo $row['Contact']; ?>
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						<?php echo $row['Home']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="../edit.php">Edit</a>
					  <a class="btn btn-danger " target="__blank" href="update.php">Change password</a>
                    </div>
                  </div>
                </div>
              </div>
			  </div>
						</div>
						<?php
						}
						?>
		
			<?php 
				if (isset($_GET["error"])){
					if ($_GET["error"] === "none"){
            ?>

            <script>
            swal("Password", "Successfully Changed", "success");
            </script>
          <?php
          }
		  if (isset($_GET["error"])){
			if ($_GET["error"] === "success"){
			?>
			<script>
			swal("Edit Information", "Successfully Changed", "success");
			</script>
  			<?php
  			}
		}		
      }

      ?>


