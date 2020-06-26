<?php
include_once './inc/required/database.php';
include_once './inc/required/sessions.php';
include_once './inc/required/utilities.php';


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
// Build list of services that need to be quoted on
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            

    if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "Residential")) {$getRes = 1;} else {$getRes = 3;}
    if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "Commercial")) {$getCom = 1;} else {$getCom = 3;}
    if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "International")) {$getInt = 1;} else {$getInt = 3;}

if(isset($_SESSION['storage']) && ($_SESSION['storage'] == 1)) {$getStorage = 1;} else {$getStorage = 3;}
if(isset($_SESSION['pet']) && ($_SESSION['pet'] == 1)) {$getPet = 1;} else {$getPet = 3;}
if(isset($_SESSION['car']) && ($_SESSION['car'] == 1)) {$getCar = 1;} else {$getCar = 3;}
if(isset($_SESSION['courier']) && ($_SESSION['courier'] == 1)) {$getCourier = 1;} else {$getCourier = 3;}
if(isset($_SESSION['shuttle']) && ($_SESSION['shuttle'] == 1)) {$getShuttle = 1;} else {$getShuttle = 3;}
if(isset($_SESSION['cleaning']) && ($_SESSION['cleaning'] == 1)) {$getCleaning = 1;} else {$getCleaning = 3;}
if(isset($_SESSION['wrapping']) && ($_SESSION['wrapping'] == 1)) {$getWrapping = 1;} else {$getWrapping = 3;}
if(isset($_SESSION['packing']) && ($_SESSION['packing'] == 1)) {$getPacking = 1;} else {$getPacking = 3;}
if(isset($_SESSION['insurance']) && ($_SESSION['insurance'] == 1)) {$getInsurance = 1;} else {$getInsurance = 3;}

//COUNT HOW MANY PARTNERS NEED TO BE NOTIFIED
$active = 1;
$trial = 0;

// echo "<br>getRes :" .$getRes;
// echo "<br>getCom :" .$getCom;
// echo "<br>getInt :" .$getInt;
// echo "<br>getStorage :" .$getStorage;
// echo "<br>getPet :" .$getPet;
// echo "<br>getCar :" .$getCar;
// echo "<br>getCourier :" .$getCourier;
// echo "<br>getShuttle :" .$getShuttle;
// echo "<br>getCleaning :" .$getCleaning;
// echo "<br>getWrapping :" .$getWrapping;
// echo "<br>getPacking :" .$getPacking;
//echo "<br>getInsurance :" .$getInsurance;

$trialEnds = strtotime('today midnight');
//echo "<br>TrialEnds: " . $trialEnds . "<br>";
$noTrial = null;
$suspended = 0;

$sqlQuery = "SELECT count(*) from service_providers WHERE (active = :active AND suspended = :suspended) AND (trial = :trial || trialEnd > :trialEnds) AND (residential = :getRes || commercial = :getCom || international = :getInt || storage = :getStorage || pet = :getPet || car = :getCar || courier = :getCourier || shuttle = :getShuttle || cleaning = :getCleaning || wrapping = :getWrapping || packing = :getPacking || insurance = :getInsurance)";
$result = $db->prepare($sqlQuery); 
$result->execute(array(':active' => $active, ':suspended' => $suspended, ':trial' => $trial, ':trialEnds' => $trialEnds, ':getRes' => $getRes, ':getCom' => $getCom, ':getInt' => $getInt, ':getStorage' => $getStorage, ':getPet' => $getPet, ':getCar' => $getCar, ':getCourier' => $getCourier, ':getShuttle' => $getShuttle, ':getCleaning' => $getCleaning, ':getWrapping' => $getWrapping, ':getPacking' => $getPacking, ':getInsurance' => $getInsurance)); 

$agentInfo = $result->fetchColumn();

// var_dump($sqlQuery);

//echo "AgentInfo: " . $agentInfo;


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//FETCH ID of each PARTNER that need to receive a request                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                 

    if(isset($agentInfo) && ($agentInfo > 0)) {

        $_SESSION['partnersSent'] = $agentInfo;

                            $agentInfoQuery = "
     
                                SELECT
                                    serviceProviderID
                                FROM
                                    service_providers
                                WHERE
                                    (active = $active AND suspended = $suspended) 
                                AND 
                                    (trial = $trial || trialEnd > $trialEnds)
                                AND 
                                (residential = $getRes || commercial = $getCom || international = $getInt || storage = $getStorage || pet = $getPet || car = $getCar || courier = $getCourier || shuttle = $getShuttle || cleaning = $getCleaning || wrapping = $getWrapping || packing = $getPacking || insurance = $getInsurance)
                            ";
                     
                            $agentsInfo = $db->query($agentInfoQuery)->fetchAll();

//var_dump($agentsInfo);                            
           
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//START FOR EACH LOOP - BUILD FILES FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                         

        foreach($agentsInfo as $agentsInfo):
            
                            $serviceProviderID = $agentsInfo['serviceProviderID'];
                            //echo $serviceProviderID;
            
            
                            //THIS WILL RETREIVE THE INFO TO POPULATE THE AGENTCARD IN QUESTION
                            $getagentQuery = "  SELECT 
                                                    serviceProviderID,
                                                    companyName,
                                                    emailnotify
                                                FROM
                                                    service_providers
                                                WHERE
                                                    serviceProviderID = $serviceProviderID
                                            ";
                                            
                                            $getagent = $db->query($getagentQuery);
                                
                        // var_dump($getagent);                                    
                        foreach($getagent->fetchAll() as $agentData):
                            $appID = $_SESSION['appID'];

                        $id = $agentData[0];
                        $company = $agentData[1];
                        $email = $agentData[2];
                        $providerID = $id;

                               //echo "<br>" . $id . "<br>";
                               //echo $company . "<br>";
                               //echo $email . "<br>";
                               include 'insertSendQueue.php';
                               //echo "<br><br>";
                        endforeach;
                        /////////////////////////////////////////// 
        
        endforeach;
} else {
    $_SESSION['noPartners'] = 1;
    // unset($_SESSION['partnersSent']);
}
?>