<?php
require __DIR__.'/PHPMailer/src/Exception.php';
require __DIR__.'/PHPMailer/src/PHPMailer.php';
require __DIR__.'/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//require('/PHPMailer/src/PHPMailer.php');
//require('/PHPMailer/src/SMTP.php');

//$mailTo = "zanreno1085@yahoo.com";
//$body = "<h2>You have registered in Asuncion Optical Webpage</h2>
//<h5>Verify your email to log in with the given link below</h5>
//<br/><br/>
//<a href='http://localhost/clinic/main/includes/verify.php?vkey=sad2312jjasda2'>Click Here Wag Muna </a></h1>";

//$mail = new PHPMailer(true);
//$mail = new PHPMailer\PHPMailer\PHPMailer;

//$mail->SMTPDebug = 3;

//$mail->isSMTP();

//$mail->Host = "mail.smtp2go.com";
//$mail->SMTPAuth = true;

//$mail->Username = "zanreno01";
//$mail->Password = "testing2252";

//$mail->SMTPSecure = "tls";

//$mail->Port = "2525";

//$mail->From = "zan.reno.carreon.student@access.edu.ph";
//$mail->FromName = "ZanReno";

//$mail->addAddress($mailTo, "Zan");

//$mail->isHTML(true);

//$mail->Subject = "Test Email Notification";
//$mail->Body = $body;
//$mail->AltBody = "This is the Plain text version of the email content";

//if (!$mail->send()){
    //echo "Mailer Error". $mail->ErrorInfo;
//}
//else {
    //echo "Message has been sent";
//}


function sendmail_getmail($email, $id, $appid, $idd, $sched, $startt, $endd){
    $mailTo = $email;
    // $body = "<h2>You have booked an Appointment with the following Details:</h2>
    // <h5>Appointment ID: #$appid</h5>
    // <h5>Booking ID: #$id</h5>
    // <h5>Your User ID: #$idd</h5>
    // <h5>Date of your Appointment: $sched</h5>
    // <h5>Start Time: $startt</h5>
    // <h5>End Time: $endd</h5>
    // <br/><br/>";
    date_default_timezone_set('Asia/Manila');
    
    $sched = date("M d, Y");
    $startt = date('H:i A');
    $endd  = date('H:i A');
    $body = "<h2>YOU HAVE BOOKED AN APPOINTMENT WITH THE FOLLOWING DETAILS:</h2>
    <p>Appointment ID: <strong> #$appid </strong> </p>
    <p>Booking ID: <strong> #$id </strong> </p>
    <p>Your User ID: <strong> #$idd </strong></p>
    <p>Date of your Appointment: <strong> $sched </strong> </p>
    <p>Start Time:<strong> $startt </strong> </p>
    <p>End Time: <strong> $endd </strong> </p>
    <br/>
    <p>Best Wishes,<p>
    <p><strong> Asuncion Optical </strong><p>
    ";
    


    
    $mail = new PHPMailer(true);
    //$mail = new PHPMailer\PHPMailer\PHPMailer;
    
    //$mail->SMTPDebug = 3;
    
    $mail->isSMTP();
    
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    
    $mail->Username = "zanreno06@gmail.com";
    $mail->Password = "ecaabcwxcnzojaxt";
    
    $mail->SMTPSecure = "tls";
    
    $mail->Port = "587";
    
    $mail->From = "zanreno06@gmail.com";
    $mail->FromName = "AsuncionAdmin";
    
    $mail->addAddress($mailTo, "Zan");
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    
    $mail->isHTML(true);
    
    $mail->Subject = "Booking Schedule Details";
    $mail->Body = $body;
    $mail->AltBody = "This is the Plain text version of the email content";
    
    if (!$mail->send()){
        echo "Mailer Error". $mail->ErrorInfo;
    }
    else {
        header("location: ../patient/myappointment.php?error=getmailsuccess");
        exit(); 
    }
}

function sendmail_usercanc($id, $idd,$sched){
    $mailTo = "asuncion.optical.clinic@gmail.com";
    $body = "<h2>The User with a User ID of #$idd </h2>
    <h5>Has canceled an appointment booking at this date $sched</h5>
    <h5>With a booking Id of #$id</h5>
    <br/><br/>";
    
    $mail = new PHPMailer(true);
    //$mail = new PHPMailer\PHPMailer\PHPMailer;
    
    //$mail->SMTPDebug = 3;
    
    $mail->isSMTP();
    
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    
    $mail->Username = "zanreno06@gmail.com";
    $mail->Password = "ecaabcwxcnzojaxt";
    
    $mail->SMTPSecure = "tls";
    
    $mail->Port = "587";
    
    $mail->From = "jan-jan.riparip.student@access.edu.ph";
    $mail->FromName = "Client";
    
    $mail->addAddress($mailTo, "Zan");
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    
    $mail->isHTML(true);
    
    $mail->Subject = "User Canceled Booking";
    $mail->Body = $body;
    $mail->AltBody = "This is the Plain text version of the email content";
    
    if (!$mail->send()){
        echo "Mailer Error". $mail->ErrorInfo;
    }
    else {
        header("location: ../patient/myappointment.php?canceledsuccess");
        exit(); 
    }
}

function sendmail_book($id, $idd,$sched){
    $mailTo = "asuncion.optical.clinic@gmail.com";
    $body = "<h2>The User with a User ID of #$idd </h2>
    <h5>Has booked an appointment at this date $sched</h5>
    <h5>With an appointment Id of #$id</h5>
    <br/><br/>";
    
    $mail = new PHPMailer(true);
    //$mail = new PHPMailer\PHPMailer\PHPMailer;
    
    //$mail->SMTPDebug = 3;
    
    $mail->isSMTP();
    
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    
    $mail->Username = "zanreno06@gmail.com";
    $mail->Password = "ecaabcwxcnzojaxt";
    
    $mail->SMTPSecure = "tls";
    
    $mail->Port = "587";
    
    $mail->From = "zanreno06@gmail.com";
    $mail->FromName = "Client";
    
    $mail->addAddress($mailTo, "Zan");
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    
    $mail->isHTML(true);
    
    $mail->Subject = "Appointment Booking";
    $mail->Body = $body;
    $mail->AltBody = "This is the Plain text version of the email content";
    
    if (!$mail->send()){
        echo "Mailer Error". $mail->ErrorInfo;
    }
    else {
        header("location: ../patient/myappointment.php?error=none");
        exit();
    }
}

function sendmail_cancel($email, $sched){
$mailTo = $email;
$body = "<h2>UNFORTUNATELY THE DOCTOR IS NOT AVAILABLE</h2>
<h5>Your appointment at this date $sched has been canceled.</h5>
<br/><br/>";

$mail = new PHPMailer(true);
//$mail = new PHPMailer\PHPMailer\PHPMailer;

//$mail->SMTPDebug = 3;

$mail->isSMTP();

$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;

$mail->Username = "zanreno06@gmail.com";
$mail->Password = "ecaabcwxcnzojaxt";

$mail->SMTPSecure = "tls";

$mail->Port = "587";

$mail->From = "zanreno06@gmail.com";
$mail->FromName = "AsuncionAdmin";

$mail->addAddress($mailTo, "Zan");
$mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false
));

$mail->isHTML(true);

$mail->Subject = "Canceled Appointment";
$mail->Body = $body;
$mail->AltBody = "This is the Plain text version of the email content";

if (!$mail->send()){
    echo "Mailer Error". $mail->ErrorInfo;
}
else {
    header("location: ../../app.php?canceledsuccess");
    exit();
}
}

function sendmail_forgot($email){
$mailTo = $email;
$body = "<h2>Forgot Password Verification Link</h2>
<h5>Verify your email to change your password with the given link below</h5>
<br/><br/>
<a href='https://asuncion-clinic.herokuapp.com/changeforgot.php?error=$email'>Click Here</a></h1>";

$mail = new PHPMailer(true);
//$mail = new PHPMailer\PHPMailer\PHPMailer;

//$mail->SMTPDebug = 3;

$mail->isSMTP();

$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;

$mail->Username = "zanreno06@gmail.com";
$mail->Password = "ecaabcwxcnzojaxt";

$mail->SMTPSecure = "tls";

$mail->Port = "587";

$mail->From = "zanreno06@gmail.com";
$mail->FromName = "AsuncionAdmin";

$mail->addAddress($mailTo, "Zan");
$mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false
));

$mail->isHTML(true);

$mail->Subject = "Forgot Password Verify";
$mail->Body = $body;
$mail->AltBody = "This is the Plain text version of the email content";

if (!$mail->send()){
    echo "Mailer Error". $mail->ErrorInfo;
}
else {
    header("location: ty.php");
    exit();
}
}

function sendmail_verify($email, $vkey){
$mailTo = $email;
$body = "<h2>YOU HAVE REGISTERED IN ASUNCION OPTICAL</h2>
<h5>Verify your email to log in with the given link below.</h5>
<br/><br/>
<a href='https://asuncion-clinic.herokuapp.com/main/includes/verify.php?vkey=$vkey'>Click Here</a></h1>";

$mail = new PHPMailer(true);
//$mail = new PHPMailer\PHPMailer\PHPMailer;

//$mail->SMTPDebug = 3;

$mail->isSMTP();

$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;

$mail->Username = "zanreno06@gmail.com";
$mail->Password = "ecaabcwxcnzojaxt";

$mail->SMTPSecure = "tls";

$mail->Port = "587";

$mail->From = "zanreno06@gmail.com";
$mail->FromName = "AsuncionAdmin";

$mail->addAddress($mailTo, "Zan");
$mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false
));

$mail->isHTML(true);

$mail->Subject = "Email Verification";
$mail->Body = $body;
$mail->AltBody = "This is the Plain text version of the email content";

if (!$mail->send()){
    echo "Mailer Error". $mail->ErrorInfo;
}
else {
    // echo "Message has been sent";
    header("location: ty.php");
    
    exit();
}


}

//$email_template = "
        //<h2>You have registered in Asuncion Optical Webpage</h2>
        //<h5>Verify your email to log in with the below given link</h5>
        //<br/><br/>
        //<a href='http://localhost/clinic/main/includes/verify.php?vkey=$vkey'>Click Here </a>
    //";