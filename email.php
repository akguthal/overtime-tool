<?php
require 'C:\xampp\htdocs\PHPMailer_5.2.0\class.phpmailer.php';
$body = <<< EOFDATA
<script>
function clickConnection(thing, side) {
    let email = $(thing).find(".email").text();
    let ajax = new XMLHttpRequest();
    let url = "getUserData.php?email=" + email;
    ajax.open("GET", url, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                let results = ajax.responseText.split(",");
                if (side == "right"){
                    loadModalRight(results);
                }
                else{
                    loadModalLeft(results);
                }

            } else {
                alert("Request Failed.");
            }
        }
    };
    ajax.send(null);
}
</script>
EOFDATA


$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'overtimemailserver@gmail.com';                 // SMTP username
$mail->Password = 'overtime123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'overtimemailserver@gmail.com\'';
$mail->FromName = 'Connection request';
$mail->addAddress('{$Email}', 'Name');     // Add a recipient
            // Name is optional
// Set word wrap to 50 characters
$mail->Port = 25;
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';

$body = file_get_contents('Login.php');
$mail->MsgHTML($body);

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>