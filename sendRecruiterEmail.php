<?php
session_start();
require '/Applications/XAMPP/htdocs/PHPMailer-master/class.phpmailer.php';
require '/Applications/XAMPP/htdocs/PHPMailer-master/class.smtp.php';
$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];
echo $email;
$from = $_SESSION['name'];

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'overtimemailserver@gmail.com';                 // SMTP username
$mail->Password = 'overtime123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'overtimemailserver@gmail.com';
$mail->FromName = 'OverTime Inc.';
$mail->addAddress($email);     // Add a recipient
            // Name is optional
// Set word wrap to 50 characters
$mail->Port = 25;
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "New message from {$from} on OverTime!";

$body = "Hello {$name},\n\n";
$body.= "{$from} sent you the following message on OverTime:";
$body.= "\n\n{$message}\n\n";
$body.= "If you would like to respond to this message, login to OverTime at http://localhost/cmsc389n/overtime-tool/Login.php";

$body = nl2br($body);
$mail->MsgHTML($body);


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

	header("Location: loadHome.php");


// $to = 'akguthal@gmail.com';
// $subject = "Connect with {$from} on Overtime!";
// $message = "Hello {$name},\n\nUse the link below to connect with {$from} on Overtime!\n\n";
// $message .= "{$url}";
// $headers = "From: overtimemailserver@gmail.com\r\n";
// if (mail($to, $subject, $message, $headers)) {
//    echo "SUCCESS";
// } else {
//    echo "ERROR";
// }
?>
