<?php

        $appDetailsID = $_SESSION['appDetailsID'];

            if(isset($appID)) {
                unset($notset);

                    if(isset($_SESSION['dCountry'])) {
                        $dCountry = $_SESSION['dCountry'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_country =:dCountry WHERE app_detail_id =:appDetailsID";
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':dCountry' => $dCountry, ':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                            // means updated
                            $_SESSION['dCountryUpdate'] = 1;
                            
                        } else {
                            // means not updated
                            $_SESSION['dCountryUpdate'] = 0;
                    }

                } else {
                    $notset = 1;
                }


                
                    if(isset($_SESSION['dProvince'])) {
                        $dProvince = $_SESSION['dProvince'];
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE app_details SET d_province =:dProvince WHERE app_detail_id =:appDetailsID";
        
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':dProvince' => $dProvince, ':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                                    // means updated
                                    $_SESSION['dProvinceUpdate'] = 1;
                                }else{
                                    // means not updated
                                    $_SESSION['dProvinceUpdate'] = 0;
                            }

                } else {
                    $notset = 2;
                }
            

                    if(isset($_SESSION['dCity'])) {
                        $dCity = $_SESSION['dCity'];
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE app_details SET d_city =:dCity WHERE app_detail_id =:appDetailsID";
        
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':dCity' => $dCity, ':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                                    // means updated
                                    $_SESSION['dCityUpdate'] = 1;
                                }else{
                                    // means not updated
                                    $_SESSION['dCityUpdate'] = 0;
                            }
                } else {
                    $notset = 3;
                }
            

                    if(isset($_SESSION['dArea'])) {
                        $dArea = $_SESSION['dArea'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_area =:dArea WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':dArea' => $dArea, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['dAreaUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['dAreaUpdate'] = 0;
                        }
                } else {
                    $notset = 4;
                }
    

                    if(isset($_SESSION['dHouseNum'])) {
                        $dHouseNum = $_SESSION['dHouseNum'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_house_nr =:dHouseNum WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array( ':dHouseNum' => $dHouseNum, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['dHouseNumUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['dHouseNumUpdate'] = 0;
                        }
                } else {
                    $notset = 5;
                }
            


                    if(isset($_SESSION['dAdr'])) {
                        $dAdr = $_SESSION['dAdr'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_adr =:dAdr WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':dAdr' => $dAdr, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['dAdrUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['dAdrUpdate'] = 0;
                        }
                } else {
                    $notset = 6;
                }
            


                    if(isset($_SESSION['dApUnNr'])) {
                        $dApUnNr = $_SESSION['dApUnNr'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_apart_unit_nr =:dApUnNr WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':dApUnNr' => $dApUnNr, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['dApUnNrUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['dApUnNrUpdate'] = 0;
                        }
                } else {
                    $notset = 7;
                }
            


                    if(isset($_SESSION['dApUnName'])) {
                        $dApUnName = $_SESSION['dApUnName'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_apart_unit_name =:dApUnName WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':dApUnName' => $dApUnName, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['dApUnNameUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['dApUnNameUpdate'] = 0;
                        }
                } else {
                    $notset = 8;
                }
            

                    if(isset($_SESSION['dFloor'])) {
                        $dFloor = $_SESSION['dFloor'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_floor =:dFloor WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':dFloor' => $dFloor, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['dFloorUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['dFloorUpdate'] = 0;
                        }
                } else {
                    $notset = 9;
                }
            

                    if(isset($_SESSION['dLiftsV'])) {
                        $dLifts = $_SESSION['dLiftsV'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_lifts =:dLifts WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':dLifts' => $dLifts, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['dLiftUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['dLiftUpdate'] = 0;
                        }
                } else {
                    $notset = 10;
                }
            

                    if(isset($_SESSION['dTruck'])) {
                        if($_SESSION['dTruck'] == "No") {
                            $dTruck = $_SESSION['dTruck'];
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE app_details SET d_truck =:dTruck, d_truck_t_i = :dTruckTI, d_truck_h_v = :dTruckHV, d_truck_t_v = :dTruckTV WHERE app_detail_id =:appDetailsID";
        
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':dTruck' => $dTruck, ':dTruckTI' => $dTruckTI, ':dTruckHV' => $dTruckHV, ':dTruckTV' => $dTruckTV, ':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                                    // means updated
                                    $_SESSION['dTruckUpdate'] = 1;
                                }else{
                                    // means not updated
                                    $_SESSION['dTruckUpdate'] = 0;
                                }
                        } else {
                        $dTruck = $_SESSION['dTruck'];
                         //SQL statement to update info
                         $sqlUpdate = "UPDATE app_details SET d_truck =:dTruck WHERE app_detail_id =:appDetailsID";
        
                         $statement = $db->prepare($sqlUpdate);
                         $statement->execute(array(':dTruck' => $dTruck, ':appDetailsID' => $appDetailsID));
                         if($statement->rowCount() > 0){
                                 // means updated
                                 $_SESSION['dTruckUpdate'] = 1;
                             }else{
                                 // means not updated
                                 $_SESSION['dTruckUpdate'] = 0;
                            }
                        }
                } else {
                    $notset = 11;
                }


                    if(isset($_SESSION['dTruckTI'])) {
                        $dTruckTI = $_SESSION['dTruckTI'];
                        $dTruckHV = $_SESSION['dTruckHV'];
                        $dTruckTV = $_SESSION['dTruckTV'];
                        if(!isset($dTruckTI)) $dTruckTI = '0';
                            if(!isset($dTruckHV)) $dTruckHV = '0';
                            if(!isset($dTruckTV)) $dTruckTV = '0';
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET d_truck_t_i = :dTruckTI, d_truck_h_v = :dTruckHV, d_truck_t_v = :dTruckTV WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':dTruckTI' => $dTruckTI, ':dTruckHV' => $dTruckHV, ':dTruckTV' => $dTruckTV, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['dProvinceUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['dProvinceUpdate'] = 0;
                        }
                } else {
                    if(isset($_SESSION['dTruck']) && ($_SESSION['dTruck']) == "Unknown"){
                            if(!isset($dTruckTI)) $dTruckTI = '0';
                            $_SESSION['dTruckTI'] = $dTruckTI;      
                            if(!isset($dTruckHV)) $dTruckHV = '0';
                            $_SESSION['dTruckHV'] = $dTruckHV;  
                            if(!isset($dTruckTV)) $dTruckTV = '0';
                            $_SESSION['dTruckTV'] = $dTruckTV;  
                    } else {
                        $notset = 12;
                    }
                }
            


                    if(isset($_SESSION['dTruckHV'])) {
                        $dTruckHV = $_SESSION['dTruckHV'];
                        $dTruckTV = $_SESSION['dTruckTV'];

                    //SQL statement to update info
                    $sqlUpdate = "UPDATE app_details SET d_truck_h_v = :dTruckHV, d_truck_t_v = :dTruckTV WHERE app_detail_id =:appDetailsID";

                    $statement = $db->prepare($sqlUpdate);
                    $statement->execute(array(':dTruckHV' => $dTruckHV, ':dTruckTV' => $dTruckTV, ':appDetailsID' => $appDetailsID));
                    if($statement->rowCount() > 0){
                            // means updated
                            $_SESSION['dTruckHVUpdate'] = 1;
                        }else{
                            // means not updated
                            $_SESSION['dTruckHVUpdate'] = 0;
                    }
                }


                    if(isset($_SESSION['dTruckTV'])) { 
                        $dTruckTV = $_SESSION['dTruckTV'];
                        $dTruckHV = $_SESSION['dTruckHV'];

                    //SQL statement to update info
                    $sqlUpdate = "UPDATE app_details SET d_truck_h_v = :dTruckHV, d_truck_t_v = :dTruckTV WHERE app_detail_id =:appDetailsID";

                    $statement = $db->prepare($sqlUpdate);
                    $statement->execute(array(':dTruckHV' => $dTruckHV, ':dTruckTV' => $dTruckTV, ':appDetailsID' => $appDetailsID));
                    if($statement->rowCount() > 0){
                            // means updated
                            $_SESSION['dTruckTVUpdate'] = 1;
                        }else{
                            // means not updated
                            $_SESSION['dTruckTVUpdate'] = 0;
                    }
                }


                if(!isset($dIdReq)) {
                    if(isset($_SESSION['dIdReq'])) {
                        $dIdReq = $_SESSION['dIdReq'];
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE app_details SET d_id_req =:dIdReq 
                                WHERE app_detail_id =:appDetailsID";
        
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':dIdReq' => $dIdReq,':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                                    // means updated
                                    $_SESSION['dIdReqUpdate'] = 1;
                                }else{
                                    // means not updated
                                    $_SESSION['dIdReqUpdate'] = 0;
                            }
                } else {
                    $notset = 13;
                }
            }




                if(isset($dCountry) && isset($dProvince) && isset($dCity) && isset($dArea) && isset($dHouseNum) && isset($dAdr) && isset($dApUnNr) && isset($dApUnName) && isset($dFloor) && isset($dLifts) && isset($dTruck) && isset($dIdReq)) {
                    if(isset($dTruck)) {
                        if(isset($dTruckTI) && isset($dTruckHV) && isset($dTruckTV)) {
                            if(!isset($dArea)) $dArea = '0';
                            if(!isset($dApUnNr)) $dApUnNr = '0';
                            if(!isset($dApUnName)) $dApUnName = '0';
                        } else {
                            if(!isset($dTruckTI)) $dTruckTI = '0';
                            if(!isset($dTruckHV)) $dTruckHV = '0';
                            if(!isset($dTruckTV)) $dTruckTV = '0';
                            if(!isset($dArea)) $dArea = '0';
                            if(!isset($dApUnNr)) $dApUnNr = '0';
                            if(!isset($dApUnName)) $dApUnName = '0';
                        }
                } else {
                    if(!isset($dArea)) $dArea = '0';
                    if(!isset($dApUnNr)) $dApUnNr = '0';
                    if(!isset($dApUnName)) $dApUnName = '0';
                }

                if(!isset($notset)) {
                    $_SESSION['updated'] = 1;
                    unset($_SESSION['FailedToUpdateCol']);
                    unset($_SESSION['UpdatedCol']);
                    $appDetailsID = $_SESSION['appDetailsID'];

            } else {
                echo 'Notset Col ' .  $notset;
            }

        }


    if(isset($_SESSION['updated'])) {
        unset($_SESSION['updated']);
        header("Location: applicationReview.php");
    }
}?>