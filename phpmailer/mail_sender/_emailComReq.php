<?php
$agentname = "Legend's";
$year = date("Y");
$appName = $_SESSION['appName'];
$appSurname = $_SESSION['appSurname'];
$appEmail = $_SESSION['appEmail'];
$appCell = $_SESSION['appCell'];
$appWork = $_SESSION['appWork'];
$appType = $_SESSION['appType'];

$CCApUnNr = $_SESSION['CCApUnNr'];
$CCApUnName = $_SESSION['CCApUnName'];
$CCHouseNum = $_SESSION['CCHouseNum'];
$CCAdr = $_SESSION['CCAdr'];
$CCArea = $_SESSION['CCArea'];
$CCCity = $_SESSION['CCCity'];
$CCProvince = $_SESSION['CCProvince'];
$CCCountry = $_SESSION['CCCountry'];
$CCFloor = $_SESSION['CCFloor'];
$CCLifts = $_SESSION['CCLifts'];
$CCTruck = $_SESSION['CCTruck'];

$RDApUnNr = $_SESSION['RDApUnNr'];
$RDApUnName = $_SESSION['RDApUnName'];
$RDHouseNum = $_SESSION['RDHouseNum'];
$RDAdr = $_SESSION['RDAdr'];
$RDArea = $_SESSION['RDArea'];
$RDCity = $_SESSION['RDCity'];
$RDProvince = $_SESSION['RDProvince'];
$RDCountry = $_SESSION['RDCountry'];
$RDFloor = $_SESSION['RDFloor'];
$RDLifts = $_SESSION['RDLifts'];
$RDTruck = $_SESSION['RDTruck'];

// Include the PHPMailer class
require 'phpmailer/class.phpmailer.php';

// Retrieve the email template required
$message = file_get_contents('phpmailer/email_templates/emailComReq.html');

// Replace the % with the actual information
$message = str_replace('%agentname%', $agentname, $message);
$message = str_replace('%appName%', $appName, $message);
$message = str_replace('%appSurname%', $appSurname, $message);
$message = str_replace('%appEmail%', $appEmail, $message);
$message = str_replace('%appCell%', $appCell, $message);
$message = str_replace('%appWork%', $appWork, $message);
$message = str_replace('%appType%', $appType, $message);

$message = str_replace('%CCApUnNr%', $CCApUnNr, $message);
$message = str_replace('%CCApUnName%', $CCApUnName, $message);
$message = str_replace('%CCHouseNum%', $CCHouseNum, $message);
$message = str_replace('%CCAdr%', $CCAdr, $message);
$message = str_replace('%CCArea%', $CCArea, $message);
$message = str_replace('%CCCity%', $CCCity, $message);
$message = str_replace('%CCProvince%', $CCProvince, $message);
$message = str_replace('%CCCountry%', $CCCountry, $message);
$message = str_replace('%CCFloor%', $CCFloor, $message);
$message = str_replace('%CCLifts%', $CCLifts, $message);
$message = str_replace('%CCTruck%', $CCTruck, $message);

$message = str_replace('%RDApUnNr%', $RDApUnNr, $message);
$message = str_replace('%RDApUnName%', $RDApUnName, $message);
$message = str_replace('%RDHouseNum%', $RDHouseNum, $message);
$message = str_replace('%RDAdr%', $RDAdr, $message);
$message = str_replace('%RDArea%', $RDArea, $message);
$message = str_replace('%RDCity%', $RDCity, $message);
$message = str_replace('%RDProvince%', $RDProvince, $message);
$message = str_replace('%RDCountry%', $RDCountry, $message);
$message = str_replace('%RDFloor%', $RDFloor, $message);
$message = str_replace('%RDLifts%', $RDLifts, $message);
$message = str_replace('%RDTruck%', $RDTruck, $message);
$message = str_replace('%year%', $year, $message);

//$aemail = "michael@legendremovals.co.za";

$aemail = "mail@francoisjoubert.me";


// Setup PHPMailer
$mail = new PHPMailer;
$mail->IsSMTP();                                        // Set mailer to use SMTP

// Setup PHPMailer
include_once 'phpmailer/MailerConfig.php';

// Set who the email is sending to
//$mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient
$mail->AddAddress($aemail);                              // Name is optional


//$mail->AddReplyTo('info@example.com', 'Information');
//$mail->AddCC('cc@example.com');
//$mail->AddBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

// Set the subject
$mail->Subject = 'New Commercial lead from RELOCATION STATION';

//Set the message
$mail->MsgHTML($message);
//$mail->AltBody(strip_tags($message));
$mail->AltBody = 'New Commercial lead from RELOCATION STATION';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

//echo 'Message has been sent';

?>