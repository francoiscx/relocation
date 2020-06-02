<?php

$email = $_SESSION['email'];
$browser = $_SESSION['requestBrowser'];
$year = date("Y");
$device = $_SESSION['device'];
if ($device == "PC") {$otherDevice = "mobile";
} else {
    $otherDevice = "PC";
}

// Include the PHPMailer class
require 'phpmailer/class.phpmailer.php';

// Retrieve the email template required
$message = file_get_contents('phpmailer/email_templates/password_reset_success.html');

// Replace the % with the actual information

$message = str_replace('%otherDevice%' , $otherDevice, $message);
$message = str_replace('%device%' , $device, $message);
$message = str_replace('%resetLink%' , $resetLink, $message); 
$message = str_replace('%resetLinkLink%' , $resetLinkLink, $message);
$message = str_replace('%browser%' , $browser, $message);
$message = str_replace('%firstname%', $first_name, $message);
$message = str_replace('%lastname%', $last_name, $message);
$message = str_replace('%email%', $email, $message);





$message = str_replace('%year%', $year, $message);


// Setup PHPMailer
include_once 'phpmailer\MailerConfig.php';

// Set who the email is sending to
//$mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient
$mail->AddAddress($email);               // Name is optional


//$mail->AddReplyTo('info@example.com', 'Information');
//$mail->AddCC('cc@example.com');
$mail->AddBCC('passwordreset@wi-app.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

// Set the subject
$mail->Subject = 'Password Reset Success on Wi-APP | Beta';

//Set the message
$mail->MsgHTML($message);
//$mail->AltBody(strip_tags($message));
$mail->AltBody = 'Password Reset Success';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

//echo 'Message has been sent';

?>