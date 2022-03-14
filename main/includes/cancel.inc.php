<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
require_once '../../sendmail.php';

if(isset($_POST['cancel'])){
    $id = $_POST['id'];
    $appid = $_POST['appid'];
    $idd = $_POST['User_ID'];
    $sched = $_POST['sched'];
    $startt = $_POST['startt'];
    $endd = $_POST['endd'];
    $stats = $_POST['stats'];

    $sqq = "UPDATE appointment SET status = 'available' WHERE ID = '$appid';";
    $resultt = mysqli_query($conn, $sqq) or die(mysqli_error($conn));

     //Query for Firstname and Lastname 
    $sqqq = "SELECT * FROM data WHERE User_ID = $idd";
    
    $resulttt = mysqli_query($conn, $sqqq) or die(mysqli_error($conn));
    $book = $resulttt->fetch_assoc();
    $First_Name = $book['First_Name'];
    $Last_Name = $book['Last_Name'];
    //Query for Firstname and Lastname 

    $sq = "UPDATE booked SET status = 'canceled' WHERE ID = '$id';";
    $result = mysqli_query($conn, $sq) or die(mysqli_error($conn));
    sendmail_usercanc($id, $idd, $sched, $First_Name , $Last_Name, $appid, $startt, $endd);
    //  header("location: ../patient/myappointment.php?error=canceled");
    //   exit(); 
    
      
       
}

if(isset($_POST['getmail'])){
    $id = $_POST['id'];
    $appid = $_POST['appid'];
    $idd = $_POST['User_ID'];
    $sched = $_POST['sched'];
    $startt = $_POST['startt'];
    $endd = $_POST['endd'];
   
    

    $resultt = $conn->query("SELECT * FROM data WHERE User_ID = '$idd'");
	$row = $resultt->fetch_assoc();
    $email = $row['Email'];
    $First_Name = $row['First_Name'];
    

    sendmail_getmail($email, $id, $appid, $idd, $sched, $startt, $endd, $First_Name);
}
else{
    header("location: ../../index.php");
}