<?php
if(!isset($_SESSION['mailSent'])) {
   $year = date("Y");
   $relocationType = $_SESSION['relocationType'];
   $appName = $_SESSION['appName'];
   $appSurname = $_SESSION['appSurname'];
   $appEmail = $_SESSION['appEmail'];
   $appCell = $_SESSION['appCell'];
   $appWork = $_SESSION['appWork'];
   $link = $_SESSION['inventoryUploadLink'];
   $link = "https://demoprojects.relocation.co.za/inventoryUpload.php?id=" . $link;
   if(isset($_SESSION['partnersSent'])) $partnersSent = $_SESSION['partnersSent'];
   $agentname = "Legend's";

   if(isset($_SESSION['pet']) || isset($_SESSION['car']) || isset ($_SESSION['courier']) || isset($_SESSION['shuttle']) || isset($_SESSION['cleaning']) || isset($_SESSION['wrapping']) || isset($_SESSION['packing'])) {
      $addedServices = "With the following Services: - ";
   } else {
      $addedServices = "No aditional Services is Required";
   }


   if(isset($_SESSION['pet']) && ($_SESSION['pet'] == 1)) $pet = $_SESSION['pet'];
   if(isset($pet)) {$pet = "PET TRANSPORT - ";} else {$pet = "";}

   if(isset($_SESSION['car']) && ($_SESSION['car'] == 1)) $car = $_SESSION['car'];
   if(isset($car)) {$car = "CAR TRANSPORT - ";} else {$car = "";}

   if(isset($_SESSION['courier']) && ($_SESSION['courier'] == 1)) $courier = $_SESSION['courier'];
   if(isset($courier)) {$courier = "COURIER SERVICES - ";} else {$courier = "";}

   if(isset($_SESSION['shuttle']) && ($_SESSION['shuttle'] == 1)) $shuttle = $_SESSION['shuttle'];
   if(isset($shuttle)) {$shuttle = "SHUTTLE SERVICES - ";} else {$shuttle = "";}

   if(isset($_SESSION['cleaning']) && ($_SESSION['cleaning'] == 1)) $cleaning = $_SESSION['cleaning'];
   if(isset($cleaning)) {$cleaning = "CLEANING SERVICES - ";} else {$cleaning = "";}

   if(isset($_SESSION['wrapping']) && ($_SESSION['wrapping'] == 1)) $wrapping = $_SESSION['wrapping'];
   if(isset($wrapping)) {$wrapping = "WRAPPING SERVICES - ";} else {$wrapping = "";}

   if(isset($_SESSION['packing']) && ($_SESSION['packing'] == 1)) $packing = $_SESSION['packing'];
   if(isset($packing)) {$packing = "PACKAGING SERVICES - ";} else {$packing = "";}

   if(isset($_SESSION['insurance']) && ($_SESSION['insurance'] == 1)) $insurance = $_SESSION['insurance'];
   if(isset($insurance)) {$insurance = "INSURANCE - ";} else {$insurance = "";}



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
   require_once 'phpmailer/class.phpmailer.php';

   // Retrieve the email template required
   $message = file_get_contents('phpmailer/email_templates/emailReq.html');

   // Replace the % with the actual information
   $message = str_replace('%agentname%', $agentname, $message);
   $message = str_replace('%appName%', $appName, $message);
   $message = str_replace('%appSurname%', $appSurname, $message);
   $message = str_replace('%appEmail%', $appEmail, $message);
   $message = str_replace('%appCell%', $appCell, $message);
   $message = str_replace('%appWork%', $appWork, $message);
   $message = str_replace('%appType%', $relocationType, $message);
   if(isset($partnersSent)) $message = str_replace('%partnersSent%', $partnersSent, $message);

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

   //$aemail = "michael@legendremovals.co.za";

   $aemail = "mail@francoisjoubert.me";

   // Setup PHPMailer
   $mail = new PHPMailer;

   $mail2 = clone $mail;


   $mail->IsSMTP();                                        // Set mailer to use SMTP

   // Setup PHPMailer
   include_once 'phpmailer/MailerConfig.php';

   // Set who the email is sending to
   //$mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient
   $mail->AddAddress($aemail);                             // Name is optional


   //$mail->AddReplyTo('info@example.com', 'Information');
   //$mail->AddCC('cc@example.com');
   //$mail->AddBCC('bcc@example.com');

   $mail->WordWrap = 50;                                   // Set word wrap to 50 characters
   //$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
   //$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
   $mail->IsHTML(true);                                    // Set email format to HTML

   // Set the subject
   $mail->Subject = 'New ' . $relocationType . ' lead from RELOCATION STATION';

   //Set the message
   $mail->MsgHTML($message);
   //$mail->AltBody(strip_tags($message));
   $mail->AltBody = 'New ' . $relocationType . ' lead from RELOCATION STATION';

   if(!$mail->Send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      // $mail->ClearAllRecipients();
   }





   // Retrieve the email template required
   if($relocationType != "I'm not relocating, just need something moved") {
   $message2 = file_get_contents('phpmailer/email_templates/emailRecToClient.html');
   } else {
   $message2 = file_get_contents('phpmailer/email_templates/emailRecToClientNoInventory.html');
   }
   
   // Replace the % with the actual information
   $message2 = str_replace('%appName%', $appName, $message2);
   $message2 = str_replace('%appSurname%', $appSurname, $message2);
   $message2 = str_replace('%appEmail%', $appEmail, $message2);
   $message2 = str_replace('%appCell%', $appCell, $message2);
   $message2 = str_replace('%appWork%', $appWork, $message2);
   $message2 = str_replace('%appType%', $relocationType, $message2);
   $message2 = str_replace('%link%', $link, $message2);


   $message2 = str_replace('%addedServices%', $addedServices, $message2);
   if(isset($pet)) $message2 = str_replace('%pet%', $pet, $message2);
   if(isset($car)) $message2 = str_replace('%car%', $car, $message2);
   if(isset($courier)) $message2 = str_replace('%courier%', $courier , $message2);
   if(isset($shuttle)) $message2 = str_replace('%shuttle%', $shuttle, $message2);
   if(isset($cleaning)) $message2 = str_replace('%cleaning%', $cleaning, $message2);
   if(isset($wrapping)) $message2 = str_replace('%wrapping%', $wrapping, $message2);
   if(isset($packing)) $message2 = str_replace('%packing%', $packing, $message2);
   if(isset($insurance)) $message2 = str_replace('%insurance%', $insurance, $message2);

   $message2 = str_replace('%cApUnNr%', $cApUnNr, $message2);
   $message2 = str_replace('%cApUnName%', $cApUnName, $message2);
   $message2 = str_replace('%cHouseNum%', $cHouseNum, $message2);
   $message2 = str_replace('%cAdr%', $cAdr, $message2);
   $message2 = str_replace('%cArea%', $cArea, $message2);
   $message2 = str_replace('%cCity%', $cCity, $message2);
   $message2 = str_replace('%cProvince%', $cProvince, $message2);
   $message2 = str_replace('%cCountry%', $cCountry, $message2);
   $message2 = str_replace('%cFloor%', $cFloor, $message2);
   $message2 = str_replace('%cLifts%', $cLifts, $message2);
   $message2 = str_replace('%cTruck%', $cTruck, $message2);
   $message2 = str_replace('%cTruckRes%', $cTruckTI, $message2);
   $message2 = str_replace('%cTruckResH%', $cTruckHV, $message2);
   $message2 = str_replace('%cTruckResT%', $cTruckTV, $message2);
   $message2 = str_replace('%cIDReq%', $cIdReq, $message2);

   $message2 = str_replace('%dApUnNr%', $dApUnNr, $message2);
   $message2 = str_replace('%dApUnName%', $dApUnName, $message2);
   $message2 = str_replace('%dHouseNum%', $dHouseNum, $message2);
   $message2 = str_replace('%dAdr%', $dAdr, $message2);
   $message2 = str_replace('%dArea%', $dArea, $message2);
   $message2 = str_replace('%dCity%', $dCity, $message2);
   $message2 = str_replace('%dProvince%', $dProvince, $message2);
   $message2 = str_replace('%dCountry%', $dCountry, $message2);
   $message2 = str_replace('%dFloor%', $dFloor, $message2);
   $message2 = str_replace('%dLifts%', $dLifts, $message2);
   $message2 = str_replace('%dTruck%', $dTruck, $message2);
   $message2 = str_replace('%dTruckRes%', $dTruckTI, $message2);
   $message2 = str_replace('%dTruckResH%', $dTruckHV, $message2);
   $message2 = str_replace('%dTruckResT%', $dTruckTV, $message2);
   $message2 = str_replace('%dIDReq%', $dIdReq, $message2);

   $message2 = str_replace('%year%', $year, $message2);

   $appEmail = $_SESSION['appEmail'];
   //$appEmail = "michael@legendremovals.co.za";


   // REMOVE THIS LINE BELOW TO ENABLE MAIL SENDING TO THE CLINET
   $appEmail = "mail@francoisjoubert.me";

   //echo 'Message has been sent';

   // Setup PHPMailer
   $mail2->IsSMTP();                                        // Set mailer to use SMTP
   $mail2->setFrom('donotreply@demoprojects.relocation.co.za', 'Do not reply - Relocation Stration');

   // Setup PHPMailer
   include 'phpmailer/MailerConfig.php';

   // Set who the email is sending to
   //$mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient
   $mail2->AddAddress($appEmail);                             // Name is optional


   //$mail->AddReplyTo('info@example.com', 'Information');
   //$mail->AddCC('cc@example.com');
   //$mail->AddBCC('bcc@example.com');

   $mail2->WordWrap = 50;                                   // Set word wrap to 50 characters
   //$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
   //$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
   $mail2->IsHTML(true);                                    // Set email format to HTML

   // Set the subject
   $mail2->Subject = 'Your new ' . $relocationType . ' request via RELOCATION STATION';

   //Set the message2
   $mail2->MsgHTML($message2);
   //$mail2->AltBody(strip_tags($message2));
   $mail2->AltBody = 'Your new ' . $relocationType . ' request via RELOCATION STATION';

   if(!$mail2->Send()) {
      echo 'Message could not be sent to your email account, sorry.';
      echo 'Mailer Error: ' . $mail2->ErrorInfo;
      exit;
   }



   include_once './portal/inc/required/fetchMailListAndBuildMails.php';

$_SESSION['mailSent'] = 1;
}
?>