<?php
// Setup PHPMailer
$mail = new PHPMailer;
$mail->IsSMTP();                                                    // Set mailer to use SMTP

// This is the SMTP mail server
//$mail->Host = gethostbyname('tls://smtp.gmail.com');
$mail->Host = 'smtp.demoprojects.relocation.co.za';                      // Specify main and backup server
$mail->SMTPDebug = 1;

// Remove these next 4 lines if you dont need SMTP authentication
$mail->SMTPAuth = true;                                             // Enable SMTP authentication
$mail->Username = 'donotreply@demoprojects.relocation.co.za';     // SMTP username
$mail->Password = 'e=U&ta6DLaT^';      
$mail->Port = "587";                               // SMTP password
//$mail->SMTPSecure = /*'ssl'*/'';                                    // Enable encryption, 'ssl' or 'tsl' accepted

// Set who the email is coming from
$mail->From = 'donotreply@demoprojects.relocation.co.za';
$mail->FromName = 'Do not reply - Relocation Stration';


$mail2 = new PHPMailer;
$mail2->IsSMTP();                                                    // Set mailer to use SMTP

// This is the SMTP mail server
//$mail->Host = gethostbyname('tls://smtp.gmail.com');
$mail2->Host = 'smtp.demoprojects.relocation.co.za';                      // Specify main and backup server
$mail2->SMTPDebug = 1;

// Remove these next 4 lines if you dont need SMTP authentication
$mail2->SMTPAuth = true;                                             // Enable SMTP authentication
$mail2->Username = 'donotreply@demoprojects.relocation.co.za';     // SMTP username
$mail2->Password = 'e=U&ta6DLaT^';      
$mail2->Port = "587";                               // SMTP password
//$mail->SMTPSecure = /*'ssl'*/'';                                    // Enable encryption, 'ssl' or 'tsl' accepted

// Set who the email is coming from
$mail2->From = 'donotreply@demoprojects.relocation.co.za';
$mail2->FromName = 'Do not reply - Relocation Stration';


// include_once '../portal/inc/required/fetchMailListAndConfig.php';





?>