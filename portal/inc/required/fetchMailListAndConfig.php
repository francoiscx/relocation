<?php
include_once '../../../inc/required/sessions.php';
include_once '../../../inc/required/database.php';

$mailsetup = 3;
$mailtosend = "mail" . $mailsetup;
$$mailtosend = "mail" . $mailsetup;
$requested = 0;
$appID = $_SESSION['appID'];

$sqlQuery = "SELECT count(*) FROM sendqueue WHERE requested = $requested AND appID = $appID";
$result = $db->prepare($sqlQuery); 
$result->execute(array(':appID' => $appID, ':requested' => $requested)); 
$listInfo = $result->fetchColumn();

if(isset($listInfo) && $listInfo > 0) {


    $listsInfoQuery = "SELECT
        providerID
    FROM
        sendqueue
    WHERE
        appID = $appID
    AND
        requested = $requested
";

$listsInfo = $db->query($listsInfoQuery)->fetchAll();

foreach($listsInfo as $listsInfo):
            
    $serviceProviderID = $listsInfo['providerID'];
    //echo $serviceProviderID;


    //THIS WILL RETREIVE THE INFO TO POPULATE THE AGENTCARD IN QUESTION
    $getPartnerQuery = "  SELECT 
                            companyName,
                            emailnotify
                        FROM
                            service_providers
                        WHERE
                            serviceProviderID = $serviceProviderID
                    ";
                    
                    $getPartner = $db->query($getPartnerQuery);
        
    // var_dump($getPartner);                                    
    foreach($getPartner->fetchAll() as $mailListDetails):
    //var_dump($resultURL);  
        $companyName = $mailListDetails[0];
        $emailnotify = $mailListDetails[1];

        $$maitosend = new PHPMailer;
        $$maitosend->IsSMTP();                                                    // Set mailer to use SMTP
        
        // This is the SMTP mail server
        //$mail->Host = gethostbyname('tls://smtp.gmail.com');
        $$maitosend->Host = 'smtp.demoprojects.co.za';                      // Specify main and backup server
        $$maitosend->SMTPDebug = 1;
        
        // Remove these next 4 lines if you dont need SMTP authentication
        $$maitosend->SMTPAuth = true;                                             // Enable SMTP authentication
        $$maitosend->Username = 'donotreply@demoprojects.co.za';     // SMTP username
        $$maitosend->Password = 'P@ssword01';      
        $$maitosend->Port = "25";                               // SMTP password
        //$mail->SMTPSecure = /*'ssl'*/'';                                    // Enable encryption, 'ssl' or 'tsl' accepted
        
        // Set who the email is coming from
        $$maitosend->From = 'donotreply@demoprojects.co.za';
        $$maitosend->FromName = 'Do not reply - Relocation Stration';





        ++$mailsetup;


    endforeach;
/////////////////////////////////////////// 

endforeach;

}

?>