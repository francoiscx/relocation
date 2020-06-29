<?php

        $appDetailsID = $_SESSION['appDetailsID'];

            if(isset($appID)) {
                unset($notset);

                    if(isset($_SESSION['cCountry'])) {
                        $cCountry = $_SESSION['cCountry'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_country =:cCountry WHERE app_detail_id =:appDetailsID";
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':cCountry' => $cCountry, ':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                            // means updated
                            $_SESSION['cCountryUpdate'] = 1;
                            
                        } else {
                            // means not updated
                            $_SESSION['cCountryUpdate'] = 0;
                    }

                } else {
                    $notset = 1;
                }


                
                    if(isset($_SESSION['cProvince'])) {
                        $cProvince = $_SESSION['cProvince'];
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE app_details SET c_province =:cProvince WHERE app_detail_id =:appDetailsID";
        
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':cProvince' => $cProvince, ':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                                    // means updated
                                    $_SESSION['cProvinceUpdate'] = 1;
                                }else{
                                    // means not updated
                                    $_SESSION['cProvinceUpdate'] = 0;
                            }

                } else {
                    $notset = 2;
                }
            

                    if(isset($_SESSION['cCity'])) {
                        $cCity = $_SESSION['cCity'];
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE app_details SET c_city =:cCity WHERE app_detail_id =:appDetailsID";
        
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':cCity' => $cCity, ':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                                    // means updated
                                    $_SESSION['cCityUpdate'] = 1;
                                }else{
                                    // means not updated
                                    $_SESSION['cCityUpdate'] = 0;
                            }
                } else {
                    $notset = 3;
                }
            

                    if(isset($_SESSION['cArea'])) {
                        $cArea = $_SESSION['cArea'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_area =:cArea WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':cArea' => $cArea, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['cAreaUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['cAreaUpdate'] = 0;
                        }
                } else {
                    $notset = 4;
                }
    

                    if(isset($_SESSION['cHouseNum'])) {
                        $cHouseNum = $_SESSION['cHouseNum'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_house_nr =:cHouseNum WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array( ':cHouseNum' => $cHouseNum, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['cHouseNumUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['cHouseNumUpdate'] = 0;
                        }
                } else {
                    $notset = 5;
                }
            


                    if(isset($_SESSION['cAdr'])) {
                        $cAdr = $_SESSION['cAdr'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_adr =:cAdr WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':cAdr' => $cAdr, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['cAdrUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['cAdrUpdate'] = 0;
                        }
                } else {
                    $notset = 6;
                }
            


                    if(isset($_SESSION['cApUnNr'])) {
                        $cApUnNr = $_SESSION['cApUnNr'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_apart_unit_nr =:cApUnNr WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':cApUnNr' => $cApUnNr, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['cApUnNrUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['cApUnNrUpdate'] = 0;
                        }
                } else {
                    $notset = 7;
                }
            


                    if(isset($_SESSION['cApUnName'])) {
                        $cApUnName = $_SESSION['cApUnName'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_apart_unit_name =:cApUnName WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':cApUnName' => $cApUnName, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['cApUnNameUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['cApUnNameUpdate'] = 0;
                        }
                } else {
                    $notset = 8;
                }
            

                    if(isset($_SESSION['cFloor'])) {
                        $cFloor = $_SESSION['cFloor'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_floor =:cFloor WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':cFloor' => $cFloor, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['cFloorUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['cFloorUpdate'] = 0;
                        }
                } else {
                    $notset = 9;
                }
            

                    if(isset($_SESSION['cLiftsV'])) {
                        $cLifts = $_SESSION['cLiftsV'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_lifts =:cLifts WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':cLifts' => $cLifts, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['cLiftUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['cLiftUpdate'] = 0;
                        }
                } else {
                    $notset = 10;
                }
            

                    if(isset($_SESSION['cTruck'])) {
                        if($_SESSION['cTruck'] == "No") {
                             
                            $cTruck = $_SESSION['cTruck'];
                            if(!isset($cTruck)) $cTruck = 0;
                            if(!isset($cTruckTI)) $cTruckTI = 0;
                            if(!isset($cTruckHV)) $cTruckHV = 0;
                            if(!isset($cTruckTV)) $cTruckTV = 0;
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE app_details SET c_truck =:cTruck, c_truck_t_i = :cTruckTI, c_truck_h_v = :cTruckHV, c_truck_t_v = :cTruckTV WHERE app_detail_id =:appDetailsID";
        
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':cTruck' => $cTruck, ':cTruckTI' => $cTruckTI, ':cTruckHV' => $cTruckHV, ':cTruckTV' => $cTruckTV, ':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                                    // means updated
                                    $_SESSION['cTruckUpdate'] = 1;
                                }else{
                                    // means not updated
                                    $_SESSION['cTruckUpdate'] = 0;
                                }
                        } else {
                        $cTruck = $_SESSION['cTruck'];
                         //SQL statement to update info
                         $sqlUpdate = "UPDATE app_details SET c_truck =:cTruck WHERE app_detail_id =:appDetailsID";
        
                         $statement = $db->prepare($sqlUpdate);
                         $statement->execute(array(':cTruck' => $cTruck, ':appDetailsID' => $appDetailsID));
                         if($statement->rowCount() > 0){
                                 // means updated
                                 $_SESSION['cTruckUpdate'] = 1;
                             }else{
                                 // means not updated
                                 $_SESSION['cTruckUpdate'] = 0;
                            }
                        }
                } else {
                    $notset = 11;
                }


                    if(isset($_SESSION['cTruckTI'])) {
                        $cTruckTI = $_SESSION['cTruckTI'];
                        $cTruckHV = $_SESSION['cTruckHV'];
                        $cTruckTV = $_SESSION['cTruckTV'];
                        //SQL statement to update info
                        $sqlUpdate = "UPDATE app_details SET c_truck_t_i = :cTruckTI, c_truck_h_v = :cTruckHV, c_truck_t_v = :cTruckTV WHERE app_detail_id =:appDetailsID";
    
                        $statement = $db->prepare($sqlUpdate);
                        $statement->execute(array(':cTruckTI' => $cTruckTI, ':cTruckHV' => $cTruckHV, ':cTruckTV' => $cTruckTV, ':appDetailsID' => $appDetailsID));
                        if($statement->rowCount() > 0){
                                // means updated
                                $_SESSION['cProvinceUpdate'] = 1;
                            }else{
                                // means not updated
                                $_SESSION['cProvinceUpdate'] = 0;
                        }
                }  else {
                    if(isset($_SESSION['cTruck']) && ($_SESSION['cTruck']) == "Unknown") {
                            if(!isset($cTruckTI)) $cTruckTI = '0';
                            $_SESSION['cTruckTI'] = $cTruckTI;      
                            if(!isset($cTruckHV)) $cTruckHV = '0';
                            $_SESSION['cTruckHV'] = $cTruckHV;  
                            if(!isset($cTruckTV)) $cTruckTV = '0';
                            $_SESSION['cTruckTV'] = $cTruckTV;  
                        } else {
                            $notset = 12;
                        }
                    }
                
            


                    if(isset($_SESSION['cTruckHV'])) {
                        $cTruckHV = $_SESSION['cTruckHV'];
                        $cTruckTV = $_SESSION['cTruckTV'];

                    //SQL statement to update info
                    $sqlUpdate = "UPDATE app_details SET c_truck_h_v = :cTruckHV, c_truck_t_v = :cTruckTV WHERE app_detail_id =:appDetailsID";

                    $statement = $db->prepare($sqlUpdate);
                    $statement->execute(array(':cTruckHV' => $cTruckHV, ':cTruckTV' => $cTruckTV, ':appDetailsID' => $appDetailsID));
                    if($statement->rowCount() > 0){
                            // means updated
                            $_SESSION['cTruckHVUpdate'] = 1;
                        }else{
                            // means not updated
                            $_SESSION['cTruckHVUpdate'] = 0;
                    }
                }


                    if(isset($_SESSION['cTruckTV'])) { 
                        $cTruckTV = $_SESSION['cTruckTV'];
                        $cTruckHV = $_SESSION['cTruckHV'];

                    //SQL statement to update info
                    $sqlUpdate = "UPDATE app_details SET c_truck_h_v = :cTruckHV, c_truck_t_v = :cTruckTV WHERE app_detail_id =:appDetailsID";

                    $statement = $db->prepare($sqlUpdate);
                    $statement->execute(array(':cTruckHV' => $cTruckHV, ':cTruckTV' => $cTruckTV, ':appDetailsID' => $appDetailsID));
                    if($statement->rowCount() > 0){
                            // means updated
                            $_SESSION['cTruckTVUpdate'] = 1;
                        }else{
                            // means not updated
                            $_SESSION['cTruckTVUpdate'] = 0;
                    }
                }


                if(!isset($cIdReq)) {
                    if(isset($_SESSION['cIdReq'])) {
                        $cIdReq = $_SESSION['cIdReq'];
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE app_details SET c_id_req =:cIdReq 
                                WHERE app_detail_id =:appDetailsID";
        
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':cIdReq' => $cIdReq,':appDetailsID' => $appDetailsID));
                            if($statement->rowCount() > 0){
                                    // means updated
                                    $_SESSION['cIdReqUpdate'] = 1;
                                }else{
                                    // means not updated
                                    $_SESSION['cIdReqUpdate'] = 0;
                            }
                } else {
                    $notset = 13;
                }
            }




                if(isset($cCountry) && isset($cProvince) && isset($cCity) && isset($cArea) && isset($cHouseNum) && isset($cAdr) && isset($cApUnNr) && isset($cApUnName) && isset($cFloor) && isset($cLifts) && isset($cTruck) && isset($cIdReq)) {
                    if(isset($cTruck)) {
                        if(isset($cTruckTI) && isset($cTruckHV) && isset($cTruckTV)) {
                            if(!isset($cArea)) $cArea = '0';
                            if(!isset($cApUnNr)) $cApUnNr = '0';
                            if(!isset($cApUnName)) $cApUnName = '0';
                        }
                } else {
                    if(!isset($cArea)) $cArea = '0';
                    if(!isset($cApUnNr)) $cApUnNr = '0';
                    if(!isset($cApUnName)) $cApUnName = '0';
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
        
        echo '<script>window.location.href = "applicationDel.php"</script>';
    }
}?>