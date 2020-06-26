<?php
if(denyDuplicateSendQueue($db, $appID, $providerID)){
    // Do not insert anything
    $_SESSION['hasEntry'] = "yes";
    
    } else {
        $_SESSION['hasEntry'] = "no";

        $month = date('m');
        $year = date('Y');
        //add the data into the database
        $sqlInsert = "INSERT INTO sendQueue (appID, providerID, queueCreated, month, year)
        VALUES (:appID, :providerID, now(), :month, :year)";
        $statement = $db->prepare($sqlInsert);
        $statement->execute(array(':appID' => $appID, ':providerID' => $providerID, ':month' => $month, ':year' => $year));
}
?>