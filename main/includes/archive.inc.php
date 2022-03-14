<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
require_once '../../sendmail.php';
if(isset($_POST['archive'])){
    $id = $_POST['id'];
    $appid = $_POST['appid'];
    $idd = $_POST['User_ID'];
    $sched = $_POST['sched'];
    $startt = $_POST['startt'];
    $endd = $_POST['endd'];
    $stats = $_POST['stats'];

    
    $sq = "DELETE FROM booked WHERE ID = $id";
    $result = mysqli_query($conn, $sq) or die(mysqli_error($conn));
    $sql = "INSERT INTO archive(Booking_ID, Appointment_ID, User_ID, sched, start_time, end_time, status) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../app.php?error=somethingwentwrong");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $id, $appid, $idd, $sched, $startt, $endd, $stats);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../app.php?archived");
    exit();

}
if (isset($_POST['cancel'])){
    $id = $_POST['id'];
    $appid = $_POST['appid'];
    $idd = $_POST['User_ID'];
    $sched = $_POST['sched'];
    $startt = $_POST['startt'];
    $endd = $_POST['endd'];
    $stats = 'doctorcanceled';

        $sq = "UPDATE booked SET status = 'doctorcanceled' WHERE ID = '$id';";
        $result = mysqli_query($conn, $sq) or die(mysqli_error($conn));
        $sqq = "DELETE from Appointment WHERE ID = '$appid';";
        $results = mysqli_query($conn, $sqq) or die(mysqli_error($conn));
        $resultt = $conn->query("SELECT * FROM data WHERE User_ID = '$idd'");
	    $row = $resultt->fetch_assoc();
        $email = $row['Email'];
        
        //Query for Firstname and Lastname 
        $sqqq = "SELECT * FROM data WHERE User_ID = '$idd'";
    
        $resulttt = mysqli_query($conn, $sqqq) or die(mysqli_error($conn));
        $book = $resulttt->fetch_assoc();
        $First_Name = $book['First_Name'];
        $Last_Name = $book['Last_Name'];

        sendmail_cancel($email, $sched, $First_Name, $Last_Name );
        
}
if (isset($_POST['noshow'])){
    $id = $_POST['id'];
    $appid = $_POST['appid'];
    $idd = $_POST['User_ID'];
    $sched = $_POST['sched'];
    $startt = $_POST['startt'];
    $endd = $_POST['endd'];
    $stats = 'noshow';
        $sq = "UPDATE booked SET status = '$stats' WHERE ID = '$id';";
        $result = mysqli_query($conn, $sq) or die(mysqli_error($conn));
        $sqq = "DELETE from Appointment WHERE ID = '$appid';";
        $results = mysqli_query($conn, $sqq) or die(mysqli_error($conn));
        $sql = $conn->query("INSERT INTO `access`.`archive`(`Booking_ID`, `Appointment_ID`, `User_ID`, `sched`, `start_time`, `end_time`, `status`) SELECT `ID`, `Appointment_ID`,`User_ID`, `sched`, `start_time`, `end_time`, `status` FROM `access`.`booked` WHERE status = 'noshow';");
        $sqs = $conn->query("DELETE FROM booked WHERE status = 'noshow'");
        $resultt = $conn->query("SELECT * FROM data WHERE User_ID = '$idd'");
	    $row = $resultt->fetch_assoc();
        $email = $row['Email'];
        $First_Name = $row['First_Name'];

        sendmail_noshow($email, $sched, $First_Name);
        
}

else {
    header("location: ../../index.php?error=somethingwentwrong");
        exit();
}