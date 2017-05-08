<?php
session_start();
require '/xampp/htdocs/PHPMailer_5.2.0/class.phpmailer.php';
require '/xampp/htdocs/PHPMailer_5.2.0/class.smtp.php';
$name = $_GET['name'];
$email = $_GET['email'];
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
$mail->FromName = 'Connection request';
$mail->addAddress("nicole27328@gmail.com");     // Add a recipient
            // Name is optional
// Set word wrap to 50 characters
$mail->Port = 25;
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = "Connect with {$email} on Overtime!";
$url = "http://localhost/overtime-tool/connect.php?email={$email}";
$body = "Hello {$name},\n\nYou have a new connection request on OverTime! Use the link below to connect with {$from}. If you do not want to connect with {$from}, please disregard this email.";
$body.= "\n{$url}";
$body = nl2br($body);
$mail->MsgHTML($body);
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
