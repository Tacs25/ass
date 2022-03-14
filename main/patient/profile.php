<?php
    include_once 'header.php';
	include_once '../includes/functions.inc.php';
	include_once '../includes/dbh.inc.php';

session_start();
?>

</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">
	<?php $page = 'profile'; include('navbar.php'); ?>
    
	
	<br>
    
	<div class="container">
   
			<div class="row">
            <div class="col-md-4 mb-3">
              <div class="card" style="background-color: #e2e8f0;">
			 <?php
    					if(isset($_SESSION['id']))
						{
							$id = $_SESSION['id']; 
							$idd = $_SESSION['user'];
							$result = $conn->query("SELECT * FROM data WHERE ID = $id");
							$row = $result->fetch_assoc();
							$user = $row['User_ID'];
							$sql = "SELECT * FROM profileimg WHERE status = 1 AND User_ID = '$user' ";
							$results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							$rows = $results->fetch_assoc();
							
            
					?>
				<?php if($rows){ ?>
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
					  <h4>Profile Picture </h4>
                   <img>
				   <?php echo "<img src='../../uploads/profile$user.jpg?".mt_rand()."' style='width:200px; height:200px; border-radius: 50%'"; ?>
				   </img>
                 
				   <?php } else {?>
					<div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
					<h4>Profile Picture </h4>
                   <img>
				   <?php echo "<img src='../../uploads/profiledefault.jpg' style='width:200px; height:200px; border-radius: 50%'"; ?>
				   </img>
           <?php
						}
						?>
                    
                  </div>
                </div>
              </div> 
			  </div>
           
			  
			  <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body" style="background-color: #e2e8f0;">
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
                      <h6 class="mb-0">User ID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						<?php echo $row['User_ID']; ?>
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


