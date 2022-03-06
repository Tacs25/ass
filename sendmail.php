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


function sendmail_getmail($email, $id, $appid, $idd, $sched, $startt, $endd, $First_Name){
    $mailTo = $email;
    // $body = "<h2>You have booked an Appointment with the following Details:</h2>
    // <h5>Appointment ID: #$appid</h5>
    // <h5>Booking ID: #$id</h5>
    // <h5>Your User ID: #$idd</h5>
    // <h5>Date of your Appointment: $sched</h5>
    // <h5>Start Time: $startt</h5>
    // <h5>End Time: $endd</h5>
    // <br/><br/>";
    

    $sched1 = date('M d, Y', strtotime($sched));
    $startt1  = date('h:i A', strtotime($startt));
    $endd1  = date('h:i A', strtotime($endd));
    // $startt = date('h:i A');
    // $endd  = date('h:i A');
    $body = "<h2>Book Information</h2>
    <p>Hi <strong>$First_Name,</strong></p> 
    <p>This is a friendly reminder that we have an appointment scheduled <br>
    for you on <strong>$sched1</strong> at <strong>$startt1</strong> to <strong>$endd1</strong>.</p>
    <p>Please bring <strong> Vaccination Card</strong> with you. <br>
    Try to arrive 15 minutes early. <br>
    See you soon!
    </p> 
    <p>Regards, <br>
    <strong><em>Asuncion Optical </em></strong>
    </p>
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
    $mail->FromName = "AsuncionOptical";
    
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

    $sched1 = date('M d, Y', strtotime($sched));
    $body = "<h2>The User with a User ID of #$idd </h2>
    <h5>Has canceled an appointment booking at this date $sched1 </h5>
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

    $sched1 = date('M d, Y', strtotime($sched));
    $body = "<h2>The User with a User ID of #$idd </h2>
    <h5>Has booked an appointment at this date $sched1</h5>
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
$sched1 = date('M d, Y', strtotime($sched));
$body = "<h2>UNFORTUNATELY THE DOCTOR IS NOT AVAILABLE</h2>
<p>Your appointment at this date <strong>$sched1</strong> has been canceled.</p>
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
$mail->FromName = "AsuncionOptical";

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
<h5><em>Verify your email to change your password with the given link below.</em></h5>
<br/><br/>
<a href='http://localhost/ass/changeforgot.php?error=$email'>Click Here</a></h1>";

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
$mail->FromName = "AsuncionOptical";

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

function sendmail_verify($email, $vkey, $First_Name){
$mailTo = $email;
$body = "<h2>Register Confirmation</h2>
<p>Dear <strong>$First_Name,</strong></p> 
<p>Thank you for completing your registration with <strong>Asuncion Optical</strong>.</p>
<p>This email serves as a confirmation that your account is activated  <br>
that you are officially a part of the <strong>Asuncion Optical</strong> family. <br>
Enjoy!
</p>
<p> <em>Click the link below to get fully verified </em> </p>
<a href='http://localhost/ass/main/includes/verify.php?vkey=$vkey'>Click Here </a>
<p>Regards, <br>
<strong><em>Asuncion Optical </em></strong>
</p>";


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
$mail->FromName = "AsuncionOptical";

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
        // <a href='https://asuncion-clinic.herokuapp.com/main/includes/verify.php?vkey=$vkey'>Click Here</a></h1>";
    //";