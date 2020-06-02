<?php

$year = date("Y");
$relocationType = $_SESSION['relocationType'];
$appName = $_SESSION['appName'];
$appSurname = $_SESSION['appSurname'];
$appEmail = $_SESSION['appEmail'];
$appCell = $_SESSION['appCell'];
$appWork = $_SESSION['appWork'];

if(isset($_SESSION['pet']) || isset($_SESSION['car']) || isset ($_SESSION['courier']) || isset($_SESSION['shuttle']) || isset($_SESSION['cleaning']) || isset($_SESSION['wrapping']) || isset($_SESSION['packing'])) {
   $addedServices = "With the following Services: - ";
} else {
   $addedServices = "No aditional Services is Required";
}


if(isset($_SESSION['pet']) && ($_SESSION['pet'] == 1)) $pet = $_SESSION['pet'];
if(isset($pet)) $pet = "PET TRANSPORT - ";
if(isset($_SESSION['car']) && ($_SESSION['car'] == 1)) $car = $_SESSION['car'];
if(isset($car)) $car = "CAR TRANSPORT - ";
if(isset($_SESSION['courier']) && ($_SESSION['courier'] == 1)) $courier = $_SESSION['courier'];
if(isset($courier)) $courier = "COURIER SERVICES - ";
if(isset($_SESSION['shuttle']) && ($_SESSION['shuttle'] == 1)) $shuttle = $_SESSION['shuttle'];
if(isset($shuttle)) $shuttle = "SHUTTLE SERVICES - ";
if(isset($_SESSION['cleaning']) && ($_SESSION['cleaning'] == 1)) $cleaning = $_SESSION['cleaning'];
if(isset($cleaning)) $cleaning = "CLEANING SERVICES - ";
if(isset($_SESSION['wrapping']) && ($_SESSION['wrapping'] == 1)) $wrapping = $_SESSION['wrapping'];
if(isset($wrapping)) $wrapping = "WRAPPING SERVICES - ";
if(isset($_SESSION['packing']) && ($_SESSION['packing'] == 1)) $packing = $_SESSION['packing'];
if(isset($packing)) $packing = "PACKAGING SERVICES - ";
if(isset($_SESSION['insurance']) && ($_SESSION['insurance'] == 1)) $insurance = $_SESSION['insurance'];
if(isset($insurance)) $insurance = "INSURANCE - ";



if(isset($_SESSION['cApUnNr']) && ($_SESSION['cApUnNr'] != "0")) {$cApUnNr = $_SESSION['cApUnNr'];} else {$cApUnNr = "";}
if(isset($_SESSION['cApUnName']) && ($_SESSION['cApUnName'] != "0")) {$cApUnName = $_SESSION['cApUnName'];} else {$cApUnName = "";}
$cHouseNum = $_SESSION['cHouseNum'];
$cAdr = $_SESSION['cAdr'];
if(isset($_SESSION['cArea']) && ($_SESSION['cArea'] != "0")) {$cArea = $_SESSION['cArea'];} else {$cArea = "";}
$cCity = $_SESSION['cCity'];
$cProvince = $_SESSION['cProvince'];
$cCountry = $_SESSION['cCountry'];
$cFloor = $_SESSION['cFloor'];
if(isset($_SESSION['cLiftsV']) && ($_SESSION['cLiftsV'] != "0")) {$cLifts = $_SESSION['cLiftsV'];} else {$cLifts = "N/A";}
$cTruck = $_SESSION['cTruck'];
if(isset($_SESSION['cTruckTI'])&& ($_SESSION['cTruckTI'] != "0")) {$cTruckTI = "Truck Restrictions Defined: " . $_SESSION['cTruckTI'];} else {$cTruckTI = "Truck Restrictions Defined: N/A";}
if(isset($_SESSION['cTruckHV']) && ($_SESSION['cTruckHV'] != "0")) {$cTruckHV = $_SESSION['cTruckHV'];} else {$cTruckHV = "N/A";}
if(isset($_SESSION['cTruckTV']) && ($_SESSION['cTruckTV'] != "0")) {$cTruckTV = $_SESSION['cTruckTV'];} else {$cTruckTV = "N/A";}
$cIdReq = $_SESSION['cIdReq'];

if(isset($_SESSION['dApUnNr']) && ($_SESSION['dApUnNr'] != "0")) {$dApUnNr = $_SESSION['dApUnNr'];} else {$dApUnNr = "";}
if(isset($_SESSION['dApUnName']) && ($_SESSION['dApUnName'] != "0")) {$dApUnName = $_SESSION['dApUnName'];} else {$dApUnName = "";}
$dHouseNum = $_SESSION['dHouseNum'];
$dAdr = $_SESSION['dAdr'];
if(isset($_SESSION['dArea']) && ($_SESSION['dArea'] != "0")) {$dArea = $_SESSION['dArea'];} else {$dArea = "";}
$dCity = $_SESSION['dCity'];
$dProvince = $_SESSION['dProvince'];
$dCountry = $_SESSION['dCountry'];
$dFloor = $_SESSION['dFloor'];
if(isset($_SESSION['dLiftsV']) && ($_SESSION['dLiftsV'] != "0")) {$dLifts = $_SESSION['dLiftsV'];} else {$dLifts = "N/A";}
$dTruck = $_SESSION['dTruck'];
if(isset($_SESSION['dTruckTI'])&& ($_SESSION['dTruckTI'] != "0")) {$dTruckTI = "Truck Restrictions Defined: " . $_SESSION['dTruckTI'];} else {$dTruckTI = "Truck Restrictions Defined: N/A";}
if(isset($_SESSION['dTruckHV']) && ($_SESSION['dTruckHV'] != "0")) {$dTruckHV = $_SESSION['dTruckHV'];} else {$dTruckHV = "N/A";}
if(isset($_SESSION['dTruckTV']) && ($_SESSION['dTruckTV'] != "0")) {$dTruckTV = $_SESSION['dTruckTV'];} else {$dTruckTV = "N/A";}
$dIdReq = $_SESSION['dIdReq'];


$agentname = "Legend's";
// Include the PHPMailer class
require 'phpmailer/class.phpmailer.php';

// Retrieve the email template required
$message = file_get_contents('phpmailer/email_templates/emailReqToClient.html');

// Replace the % with the actual information
$message = str_replace('%appName%', $appName, $message);
$message = str_replace('%appSurname%', $appSurname, $message);
$message = str_replace('%appEmail%', $appEmail, $message);
$message = str_replace('%appCell%', $appCell, $message);
$message = str_replace('%appWork%', $appWork, $message);
$message = str_replace('%appType%', $relocationType, $message);


$message = str_replace('%addedServices%', $addedServices, $message);
if(isset($pet)) $message = str_replace('%pet%', $pet, $message);
if(isset($car)) $message = str_replace('%car%', $car, $message);
if(isset($courier)) $message = str_replace('%courier%', $courier , $message);
if(isset($shuttle)) $message = str_replace('%shuttle%', $shuttle, $message);
if(isset($cleaning)) $message = str_replace('%cleaning%', $cleaning, $message);
if(isset($wrapping)) $message = str_replace('%wrapping%', $wrapping, $message);
if(isset($packing)) $message = str_replace('%packing%', $packing, $message);
if(isset($insurance)) $message = str_replace('%insurance%', $insurance, $message);



$message = str_replace('%cApUnNr%', $cApUnNr, $message);
$message = str_replace('%cApUnName%', $cApUnName, $message);
$message = str_replace('%cHouseNum%', $cHouseNum, $message);
$message = str_replace('%cAdr%', $cAdr, $message);
$message = str_replace('%cArea%', $cArea, $message);
$message = str_replace('%cCity%', $cCity, $message);
$message = str_replace('%cProvince%', $cProvince, $message);
$message = str_replace('%cCountry%', $cCountry, $message);
$message = str_replace('%cFloor%', $cFloor, $message);
$message = str_replace('%cLifts%', $cLifts, $message);
$message = str_replace('%cTruck%', $cTruck, $message);
$message = str_replace('%cTruckRes%', $cTruckTI, $message);
$message = str_replace('%cTruckResH%', $cTruckHV, $message);
$message = str_replace('%cTruckResT%', $cTruckTV, $message);
$message = str_replace('%cIDReq%', $cIdReq, $message);



$message = str_replace('%dApUnNr%', $dApUnNr, $message);
$message = str_replace('%dApUnName%', $dApUnName, $message);
$message = str_replace('%dHouseNum%', $dHouseNum, $message);
$message = str_replace('%dAdr%', $dAdr, $message);
$message = str_replace('%dArea%', $dArea, $message);
$message = str_replace('%dCity%', $dCity, $message);
$message = str_replace('%dProvince%', $dProvince, $message);
$message = str_replace('%dCountry%', $dCountry, $message);
$message = str_replace('%dFloor%', $dFloor, $message);
$message = str_replace('%dLifts%', $dLifts, $message);
$message = str_replace('%dTruck%', $dTruck, $message);
$message = str_replace('%dTruckRes%', $dTruckTI, $message);
$message = str_replace('%dTruckResH%', $dTruckHV, $message);
$message = str_replace('%dTruckResT%', $dTruckTV, $message);
$message = str_replace('%dIDReq%', $dIdReq, $message);

$message = str_replace('%year%', $year, $message);


$appEmail = $_SESSION['appEmail'];
//$appEmail = "michael@legendremovals.co.za";


// REMOVE THIS LINE BELOW TO ENABLE MAIL SENDING TO THE CLINET
$appEmail = "mail@francoisjoubert.me";


// Setup PHPMailer
$mail = new PHPMailer;
$mail->IsSMTP();                                        // Set mailer to use SMTP

// Setup PHPMailer
include_once 'phpmailer/MailerConfig.php';

// Set who the email is sending to
//$mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient
$mail->AddAddress($appEmail);                             // Name is optional


//$mail->AddReplyTo('info@example.com', 'Information');
//$mail->AddCC('cc@example.com');
//$mail->AddBCC('bcc@example.com');

$mail->WordWrap = 50;                                   // Set word wrap to 50 characters
//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                    // Set email format to HTML

// Set the subject
$mail->Subject = 'Your new ' . $relocationType . ' request via RELOCATION STATION';

//Set the message
$mail->MsgHTML($message);
//$mail->AltBody(strip_tags($message));
$mail->AltBody = 'Your new ' . $relocationType . ' request via RELOCATION STATION';

if(!$mail->Send()) {
   echo 'Message could not be sent to your email account, sorry.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

                                                         //echo 'Message has been sent';

?>