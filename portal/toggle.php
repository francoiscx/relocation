<?php

include_once '../inc/required/database.php';

if(isset($_POST['toggle'])) {
   $toggle = $_POST['toggle'];
        if(isset($toggle)) {

            $sqlQuery = "SELECT suspended FROM service_providers WHERE serviceProviderID =:serviceProviderID";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':serviceProviderID' => $toggle));
            
            if($row = $statement->fetch()){

                $suspended = $row['suspended'];
                if(!isset($suspended) || $suspended == "") {
                    $suspended = 0;
                } 
            
                            if($suspended == 1) {
                                $updateto = 0;
                                    $sqlUpdate = "UPDATE service_providers SET suspended =:suspended WHERE serviceProviderID =:serviceProviderID";
                                    $statement = $db->prepare($sqlUpdate);
                                    $statement->execute(array(':suspended' => $updateto, ':serviceProviderID' => $toggle));
                                echo 'The partner was reactivated!';
                            } else if($suspended == 0){
                                $updateto = 1;
                                    $sqlUpdate = "UPDATE service_providers SET suspended =:suspended WHERE serviceProviderID =:serviceProviderID";
                                    $statement = $db->prepare($sqlUpdate);
                                    $statement->execute(array(':suspended' => $updateto, ':serviceProviderID' => $toggle));
                                echo 'The partner was suspended!';
                            }
            }

    } else {
        echo "Could not retreive the current status.";
    }
}

?>