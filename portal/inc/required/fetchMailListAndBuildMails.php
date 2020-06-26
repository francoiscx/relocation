<?php
//include_once './inc/required/sessions.php';
//include_once './inc/required/database.php';

$mailsetup = 3;
$mailtosend = "mail" . $mailsetup;
$$mailtosend = "mail" . $mailsetup;
$messagetosend = "mail" . $mailsetup;
$$messagetosend = "message" . $mailsetup;
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

        $varID = 'mail' . $mailsetup;
        $$varID = $mailsetup;
        $varValue = $varID;

        // Retrieve the email template required
        $$messagetosend = file_get_contents('../phpmailer/email_templates/emailRecToAgents.html');

        // Replace the % with the actual information
        $$messagetosend = str_replace('%appName%', $appName, $$messagetosend);
        $$messagetosend = str_replace('%appSurname%', $appSurname, $$messagetosend);
        $$messagetosend = str_replace('%appEmail%', $appEmail, $$messagetosend);
        $$messagetosend = str_replace('%appCell%', $appCell, $$messagetosend);
        $$messagetosend = str_replace('%appWork%', $appWork, $$messagetosend);
        $$messagetosend = str_replace('%appType%', $relocationType, $$messagetosend);
        $$messagetosend = str_replace('%link%', $link, $$messagetosend);


        $$messagetosend = str_replace('%addedServices%', $addedServices, $$messagetosend);
        if(isset($pet)) $$messagetosend = str_replace('%pet%', $pet, $$messagetosend);
        if(isset($car)) $$messagetosend = str_replace('%car%', $car, $$messagetosend);
        if(isset($courier)) $$messagetosend = str_replace('%courier%', $courier , $$messagetosend);
        if(isset($shuttle)) $$messagetosend = str_replace('%shuttle%', $shuttle, $$messagetosend);
        if(isset($cleaning)) $$messagetosend = str_replace('%cleaning%', $cleaning, $$messagetosend);
        if(isset($wrapping)) $$messagetosend = str_replace('%wrapping%', $wrapping, $$messagetosend);
        if(isset($packing)) $$messagetosend = str_replace('%packing%', $packing, $$messagetosend);
        if(isset($insurance)) $$messagetosend = str_replace('%insurance%', $insurance, $$messagetosend);

        $$messagetosend = str_replace('%cApUnNr%', $cApUnNr, $$messagetosend);
        $$messagetosend = str_replace('%cApUnName%', $cApUnName, $$messagetosend);
        $$messagetosend = str_replace('%cHouseNum%', $cHouseNum, $$messagetosend);
        $$messagetosend = str_replace('%cAdr%', $cAdr, $$messagetosend);
        $$messagetosend = str_replace('%cArea%', $cArea, $$messagetosend);
        $$messagetosend = str_replace('%cCity%', $cCity, $$messagetosend);
        $$messagetosend = str_replace('%cProvince%', $cProvince, $$messagetosend);
        $$messagetosend = str_replace('%cCountry%', $cCountry, $$messagetosend);
        $$messagetosend = str_replace('%cFloor%', $cFloor, $$messagetosend);
        $$messagetosend = str_replace('%cLifts%', $cLifts, $$messagetosend);
        $$messagetosend = str_replace('%cTruck%', $cTruck, $$messagetosend);
        $$messagetosend = str_replace('%cTruckRes%', $cTruckTI, $$messagetosend);
        $$messagetosend = str_replace('%cTruckResH%', $cTruckHV, $$messagetosend);
        $$messagetosend = str_replace('%cTruckResT%', $cTruckTV, $$messagetosend);
        $$messagetosend = str_replace('%cIDReq%', $cIdReq, $$messagetosend);

        $$messagetosend = str_replace('%dApUnNr%', $dApUnNr, $$messagetosend);
        $$messagetosend = str_replace('%dApUnName%', $dApUnName, $$messagetosend);
        $$messagetosend = str_replace('%dHouseNum%', $dHouseNum, $$messagetosend);
        $$messagetosend = str_replace('%dAdr%', $dAdr, $$messagetosend);
        $$messagetosend = str_replace('%dArea%', $dArea, $$messagetosend);
        $$messagetosend = str_replace('%dCity%', $dCity, $$messagetosend);
        $$messagetosend = str_replace('%dProvince%', $dProvince, $$messagetosend);
        $$messagetosend = str_replace('%dCountry%', $dCountry, $$messagetosend);
        $$messagetosend = str_replace('%dFloor%', $dFloor, $$messagetosend);
        $$messagetosend = str_replace('%dLifts%', $dLifts, $$messagetosend);
        $$messagetosend = str_replace('%dTruck%', $dTruck, $$messagetosend);
        $$messagetosend = str_replace('%dTruckRes%', $dTruckTI, $$messagetosend);
        $$messagetosend = str_replace('%dTruckResH%', $dTruckHV, $$messagetosend);
        $$messagetosend = str_replace('%dTruckResT%', $dTruckTV, $$messagetosend);
        $$messagetosend = str_replace('%dIDReq%', $dIdReq, $$messagetosend);

        $$messagetosend = str_replace('%year%', $year, $$messagetosend);


        ++$mailsetup;

    endforeach;
/////////////////////////////////////////// 

endforeach;

}

?>