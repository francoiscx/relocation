<?php


$year = date("Y");


// Include the PHPMailer class
require_once '/home/eipchpco/beta.wiapp.it/phpmailer/class.phpmailer.php';

// Retrieve the email template required
$message = file_get_contents('/home/eipchpco/beta.wiapp.it/phpmailer/email_templates/secondaryActivationRequest_notification.html');

// Replace the % with the actual information
$message = str_replace('%used%', $used, $message);
$message = str_replace('%firstname%', $first_name, $message);
$message = str_replace('%lastname%', $last_name, $message);
$message = str_replace('%email%', $email, $message);
$message = str_replace('%id%', $id, $message);
$message = str_replace('%year%', $year, $message);

// Setup PHPMailer
$mail = new PHPMailer;
$mail->IsSMTP();                                      // Set mailer to use SMTP

// This is the SMTP mail server
//$mail->Host = gethostbyname('tls://smtp.gmail.com');
$mail->Host = 'localhost';  // Specify main and backup server

// Remove these next 4 lines if you dont need SMTP authentication
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'system@beta.wiapp.it';                            // SMTP username
$mail->Password = 'System101Mail';                           // SMTP password
$mail->SMTPSecure = /*'ssl'*/'';                            // Enable encryption, 'ssl' or 'tsl' accepted

// Set who the email is coming from
$mail->From = 'system@beta.wiapp.it';
$mail->FromName = 'Wi-APP | Beta |System Generated Mail (Do not reply) ';

// Set who the email is sending to
//$mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient
$mail->AddAddress('francoiscx@icloud.com');               // Name is optional


//$mail->AddReplyTo('info@example.com', 'Information');
//$mail->AddCC('cc@example.com');
//$mail->AddBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

// Set the subject
$mail->Subject = 'Secondary Activation Request - Wi-APP | Beta';

//Set the message
$mail->MsgHTML($message);
//$mail->AltBody(strip_tags($message));
//$mail->Body    = '<br>Notice: </b> A new user was registered on<br> Wi-APP | Beta';
$mail->AltBody = 'A user requested a secondary Activation request on Wi-APP | Beta';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

//echo 'Message has been sent';

?>