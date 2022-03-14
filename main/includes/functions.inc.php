<?php
include_once 'dbh.inc.php';

function selectgender($Gender){
    $regex = "/^[a-zA-Z]+$/";
    $result;
    if (preg_match($regex,$Gender)){
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}
function invalidFirstName($First_Name,){
    $regex = "/^[a-zA-Z\s]+$/";
    $result;
    if (preg_match($regex,$First_Name)){
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}
function invalidLastName($Last_Name){
    $regex = "/^[a-zA-Z\s]+$/";
    $result;
    if (preg_match($regex,$Last_Name)){
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}
function invalidContact($Contact_no){
    $regex = "/^(\+639)\d{9}$/";
    $result;
    if (preg_match($regex,$Contact_no)){
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}
function emptyInputSignup($email, $Password, $Passwordrp, $First_Name, $Last_Name, $Gender, $Contact_no, $Address){
    $result;
    if (empty($email) || empty($Password) || empty($Passwordrp) || empty($First_Name) || empty($Last_Name) || empty($Gender) || empty($Contact_no) || empty($Address)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function pwdMatch($Password, $Passwordrp){
    $result;
    if($Password !== $Passwordrp){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function datemailex($conn, $sched, $idd, $stats){
    $sql = "SELECT * FROM booked WHERE sched = ?  AND User_ID = ? AND status = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=somethingwenwrong!");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $sched, $idd, $stats);   
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function datemailexex($conn, $id, $idd){
    $resultt = $conn->query("SELECT * FROM archive WHERE Appointment_ID = $id  AND User_ID = $idd");

    if ($resultt){
        $row = true;
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
}
function emailexdit($conn, $email, $idd){
    $sql = "SELECT * FROM data WHERE Email = ? AND ID != ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=Emailtaken!");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $email, $idd);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;      
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function changemail(){
    $sql = "UPDATE data SET Email = '$hashedpwd' WHERE ID = '$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("location: ../patient/profile.php?error=none");
    exit();
}

function emailexists($conn, $email){
    $sql = "SELECT * FROM data WHERE Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=Emailtaken!");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createuser($conn, $email, $Password, $First_Name, $Last_Name, $Gender, $Contact_no, $Address, $vkey){
    $sql = "INSERT INTO data (Email, Pass, First_Name, Last_Name, Gender, Contact, Home, vkey) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=somethingwentwrong");
        exit();
    }
    $hashedpwd = password_hash($Password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $email, $hashedpwd, $First_Name, $Last_Name, $Gender, $Contact_no, $Address, $vkey);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $last_id = mysqli_insert_id($conn);
    if ($last_id){
        $code = rand(1,99999);
        $user_id = "AO";
        $user_id .= $code;
        $user_id .= "N";
        $user_id .= $last_id;
        $ss = $conn->query("UPDATE data SET User_ID = '$user_id' WHERE ID = '$last_id'");
        $sss = $conn->query("INSERT INTO profileimg (User_ID, status) VALUES ('$user_id', '0')");
    }
    if($sql){
        sendmail_verify("$email", "$vkey", "$First_Name");

    }
}
function emptyInputlogin($email, $Password){
    $result;
    if (empty($email) || empty($Password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $email, $Password){
    $Emailexists = emailexists($conn, $email);

    if ($Emailexists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $verify = $Emailexists["verified"];
    $pwdhashed = $Emailexists["Pass"];
    $check = password_verify($Password, $pwdhashed);

      if ($check === false){
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if($verify === 0){
        header("location: ../login.php?error=youneedtoverify");
        exit();
    }
    else if ($check === true){
        session_start();
        $_SESSION["id"] = $Emailexists["ID"]; 
        $_SESSION["email"] = $Emailexists["Email"];
        $_SESSION["user"] = $Emailexists["User_ID"];
        header("location: ../patient/profile.php");
        exit();
    }
}
function updatepass($conn, $oldpass, $newpass, $passrp){
    session_start();
    $id = $_SESSION['id'];
    if($newpass !== $passrp){
        header("location: ../patient/update.php?error=passnotmatch");
        exit();
    }
    else {
        $password = $newpass;
    }
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE data SET Pass = '$hashedpwd' WHERE ID = '$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    session_destroy();
    header("location: ../login.php?error=changepasssuccess");
    exit();
    
}
function edit($conn , $First_Name, $Last_Name, $Contact_no, $Address, $idd){
    $sql = "UPDATE data SET  First_Name = '$First_Name', Last_Name = '$Last_Name', Contact = '$Contact_no', Home = '$Address' WHERE ID = '$idd';";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("location: ../patient/profile.php?error=success");
    exit();
}

function fetchpass($conn, $id){
    $sql = "SELECT * FROM data WHERE ID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=Emailtaken");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function chk($conn, $oldpass, $id){
    $passy = fetchpass($conn, $id);
    $dbpass = $passy['Pass'];
    $check = password_verify($oldpass, $dbpass);

      if ($check === false){
        header("location: ../patient/update.php?error=wrongpassword1");
        exit();
    }
    else if ($check === true){
        return $check;
    }
}
function fetchemail($conn, $email){
    $passy = emailexists($conn, $email);
    $passed = $passy['Email'];
    return $passy;
}
function loginAdmin($conn, $emaila, $Passworda){
    $Emailexists = emailadminex($conn, $emaila);

    if ($Emailexists === false){
        header("location: ../logina.php?error=wronglogin");
        exit();
    }

    $check = $Emailexists["Pass"];

      if ($check !== $Passworda){
        header("location: ../logina.php?error=wrongpassword");
        exit();
    }
    else if ($check === $Passworda){
        session_start();
        $_SESSION["id"] = $Emailexists["ID"]; 
        $_SESSION["email"] = $Emailexists["Email"];
        header("location: ../../dashboard.php");
        exit();
    }
}
function emailadminex($conn, $emaila){
    $sql = "SELECT * FROM admin WHERE Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=Emailtaken!");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $emaila);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//function getID($conn, $email = null){ 
    //$sql = "SELECT 'ID' FROM data WHERE 'Email' = $email";
    //$result = mysqli_query($conn, $sql);
    //if ($row = mysqli_fetch_assoc($result)){
    //}
    //return $row;
//}
//function getUsersData(){
    //$array = array();
    //$asoc = emailexists($conn, $email);
    //$id = emailexists['ID'];
    //$sql = "SELECT * FROM data WHERE 'ID' = $id;";
    //while($row = mysqli_fetch_assoc($sql)){
        //$array['First_Name'] = $row['First_Name'];
        //$array['Last_Name'] = $row['Last_Name'];
        //$array['Email'] = $row['Email'];
        //$array['Pass'] = $row['Pass'];
        //$array['Home'] = $row['Home'];
        //$array['Contact'] = $row['Contact'];
        //$array['Gender'] = $row['Gender'];
    //}
    //return $array;
//}
