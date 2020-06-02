<?php
$agentname = "Legend's";
$year = date("Y");
$appName = $_SESSION['appName'];
$appSurname = $_SESSION['appSurname'];
$appEmail = $_SESSION['appEmail'];
$appCell = $_SESSION['appCell'];
$appWork = $_SESSION['appWork'];
$appType = $_SESSION['appType'];

$ICApUnNr = $_SESSION['ICApUnNr'];
$ICApUnName = $_SESSION['ICApUnName'];
$ICHouseNum = $_SESSION['ICHouseNum'];
$ICAdr = $_SESSION['ICAdr'];
$ICArea = $_SESSION['ICArea'];
$ICCity = $_SESSION['ICCity'];
$ICProvince = $_SESSION['ICProvince'];
$ICCountry = $_SESSION['ICCountry'];
$ICFloor = $_SESSION['ICFloor'];
$ICLifts = $_SESSION['ICLifts'];
$ICTruck = $_SESSION['ICTruck'];

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
$message = file_get_contents('phpmailer/email_templates/emailIntReq.html');

// Replace the % with the actual information
$message = str_replace('%agentname%', $agentname, $message);
$message = str_replace('%appName%', $appName, $message);
$message = str_replace('%appSurname%', $appSurname, $message);
$message = str_replace('%appEmail%', $appEmail, $message);
$message = str_replace('%appCell%', $appCell, $message);
$message = str_replace('%appWork%', $appWork, $message);
$message = str_replace('%appType%', $appType, $message);

$message = str_replace('%ICApUnNr%', $ICApUnNr, $message);
$message = str_replace('%ICApUnName%', $ICApUnName, $message);
$message = str_replace('%ICHouseNum%', $ICHouseNum, $message);
$message = str_replace('%ICAdr%', $ICAdr, $message);
$message = str_replace('%ICArea%', $ICArea, $message);
$message = str_replace('%ICCity%', $ICCity, $message);
$message = str_replace('%ICProvince%', $ICProvince, $message);
$message = str_replace('%ICCountry%', $ICCountry, $message);
$message = str_replace('%ICFloor%', $ICFloor, $message);
$message = str_replace('%ICLifts%', $ICLifts, $message);
$message = str_replace('%ICTruck%', $ICTruck, $message);

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
$mail->Subject = 'New International lead from RELOCATION STATION';

//Set the message
$mail->MsgHTML($message);
//$mail->AltBody(strip_tags($message));
$mail->AltBody = 'New International lead from RELOCATION STATION';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

//echo 'Message has been sent';

?>