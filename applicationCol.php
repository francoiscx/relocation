<?php 
include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';

$page = $_SESSION['relocationType'] . " Collection";
$tranLoc = "col";

require_once 'inc/required/detect.php';

    if (Detect::isComputer()) { //browser reported as PC or Mac
        $notmobile = 101;
        if(isset($notmobile)) {
            $_SESSION['notmobile'] = 1;
        }
    } else { //browser reported as mobile device
        $mobile = 101;
        if(isset($mobile)) {
            $_SESSION['mobile'] = 1;
        }
    }



    if(isset($_SESSION['appDetailsID'])) {

                

        $appID = $_SESSION['appID'];
        //echo $appID;
        $appDetailsID = $_SESSION['appDetailsID'];
        //echo $appDetailsID;
        $appType = $_SESSION['relocationType'];
        //echo $appType;
    
    
        if(isset($_POST['CBtn'])){
            unset($_POST['CBtn']);
                $error ="";
                if(!isset($_SESSION['cCountry'])){
                    $error = $error . "<br>Please provide your Country";
                }
    
                if(!isset($_SESSION['cProvince'])){
                    $error = $error . "<br>Please provide your Province";
                }
    
                if(!isset($_SESSION['cCity'])){
                    $error = $error . "<br>Please provide your City";
                }
                
                if(!isset($_SESSION['cArea'])){
                    $error = $error . "<br>Please provide your Area / Suburb";
                }
    
                if(!isset($_SESSION['cHouseNum'])){
                    $error = $error . "<br>Please provide your Street Number";
                }
    
                if(!isset($_SESSION['cAdr'])){
                    $error = $error . "<br>Please provide your Street Name";
                }
    
                if(!isset($_SESSION['cFloor'])){
                    $error = $error . "<br>Please what floor  / level you are on";
                }
    
                if(!isset($_SESSION['cLiftsV'])){
                    if($_SESSION['cFloor'] != "Ground") {
                    $error = $error . "<br>Is there a lift available?";
                    } else {
                        $_SESSION['cLiftsV'] = 0;
                    }
                }
    
                if(!isset($_SESSION['cTruck'])){
                    $error = $error . "<br>Indicate wheather you have truck restrictions on the property";
                }
    
                if(isset($_SESSION['cTruck']) && ($_SESSION['cTruck']) == "Yes") {
    
                    if(!isset($_SESSION['cTruckTI'])){
                        $error = $error . "<br>What type of limitation is imposed, Tonnage or Height?";
                    
                        if(isset($_SESSION['cTruckTI']) && ($_SESSION['cTruckTI']) == "Tonnage") {
    
                        }
    
                        if(isset($_SESSION['cTruckTI']) && ($_SESSION['cTruckTI']) == "Height") {
    
                        }
                    }
                }
    echo $error;
    
                if(!isset($_SESSION['cIdReq'])){
                    $error = $error . "<br>Does the movers require their ID's to enter the premisis?";
                }
            
                if(!isset($error) || ($error == '')) {
                    include_once "applicationColStore.php";
                }

            }                            
                    include_once 'inc/required/head.php';

                    if(isset($appDetailsID)) {
                        //check for userID in database
                        $sqlQuery = "SELECT * FROM app_details WHERE app_detail_id =:appDetailsID";
                        $statement = $db->prepare($sqlQuery);
                        $statement->execute(array(':appDetailsID' => $appDetailsID));
                                            
                            while($row = $statement->fetch()){
                            $cCountry = $row['c_country'];
                            $cProvince = $row['c_province'];
                            $cCity = $row['c_city'];
                            $cArea = $row['c_area'];
                            $cHouseNum = $row['c_house_nr'];
                            $cAdr = $row['c_adr'];
                            $cApUnNr = $row['c_apart_unit_nr'];
                            $cApUnName = $row['c_apart_unit_name'];
                            $cFloor = $row['c_floor'];
                            $cLiftsV = $row['c_lifts'];
                            $cTruck = $row['c_truck'];
                            $cTruckTI = $row['c_truck_t_i'];
                            $cTruckHV = $row['c_truck_h_v'];
                            $cTruckTV = $row['c_truck_t_v'];
                            $cIdReq = $row['c_id_req'];
            
                            if(!isset($_SESSION['cCountry'])) $_SESSION['cCountry'] = $cCountry;
                            if(!isset($_SESSION['cProvince'])) $_SESSION['cProvince'] = $cProvince;
                            if(!isset($_SESSION['cCity'])) $_SESSION['cCity'] = $cCity;
                            if(!isset($_SESSION['cArea'])) $_SESSION['cArea'] = $cArea;
                            if(!isset($_SESSION['cHouseNum'])) $_SESSION['cHouseNum'] = $cHouseNum;
                            if(!isset($_SESSION['cAdr'])) $_SESSION['cAdr'] = $cAdr;
                            if(!isset($_SESSION['cApUnNr'])) $_SESSION['cApUnNr'] = $cApUnNr;
                            if(!isset($_SESSION['cApUnName'])) $_SESSION['cApUnName'] = $cApUnName;
                            if(!isset($_SESSION['cFloor'])) $_SESSION['cFloor'] = $cFloor;
                            if(!isset($_SESSION['cLiftsV'])) $_SESSION['cLiftsV'] = $cLiftsV;
                            if(!isset($_SESSION['cTruck'])) $_SESSION['cTruck'] = $cTruck;
                            if(!isset($_SESSION['cTruckTI'])) $_SESSION['cTruckTI'] = $cTruckTI;
                            if(!isset($_SESSION['cTruckHV'])) $_SESSION['cTruckHV'] = $cTruckHV;
                            if(!isset($_SESSION['cTruckTV'])) $_SESSION['cTruckTV'] = $cTruckTV;
                            if(!isset($_SESSION['cIdReq'])) $_SESSION['cIdReq'] = $cIdReq;
                            } 
                        }?>
                
                                
                            </div>
                        </div>
                    </nav>
                    <style>
                        .removeItem {
                            margin: -43px 20px 60px 0px!important;
                            float:right;
                            color: crimson;
                        }
                    </style>
                    <section id="appSection">    
                    <div id="backgrounddiv">
                        <div class="container">
                            <div class="row" style="margin-top:100px;">
                            <div class="col-md-12"><h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">Please Provide details for the<br><span style="color:#BF3838">Collection Address</span><br/>of your <span style="color:#BF3838"><?php echo $_SESSION['relocationType'];?></span> Move Requirements</h1><p style="text-align:center; color:#4A4A4A">
                <!--    This is a short and straight to the point sub-headline talking about your application page!
                -->           <br/></p>
                                    <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;margin: 0px 17px;"></h1></div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <p id="partners" style="text-align:center;color:#4A4A4A;">
                <!--                    Talk about some the benefits they will get after doing your application!
                -->                    <br/></p>
                                        
                
                                        <?php
                                        if(isset($_POST['CBtn'])){
                                            unset($_POST['CBtn']);
                                            echo $error . '<br><br>';
                                        } else { echo'<center><h4><div>Provide the details where you are moving from.</div></h4></center>';
                                            
                                        }
                                       
                                          if(!isset($_SESSION['cCountry']) && (!isset($_SESSION['cProvince'])) && (!isset($_SESSION['cCity']))){
                                        ?>

                                            <div class="form-group"><label>Country *</label>
                                                <select name="cCountry" class="countries order-alpha presel-ZA form-control" id="countryId">
                                                    <option value = "">Country</option>
                                                </select>
                                            </div>
                                        <?php } else {
                                            echo '
                                            <div class="form-group"><label>Country *</label>
                                                <input name="cCountry" class="form-control" id="countryIdP" value="';
                                                if(isset($_SESSION['cCountry'])) echo $_SESSION['cCountry'];
                                                echo '" required>
                                            </div>';
                                            } 

                                        ?>
                
                
                                        <?php 
                                        if(!isset($_SESSION['cCountry']) && (!isset($_SESSION['cProvince'])) && (!isset($_SESSION['cCity']))){
                                            ?>
                                            <div class="form-group"><label>Province *</label>
                                                <select name="cProvince" class="states  form-control" id="stateId">
                                                    <option value = "">Province</option>
                                                </select>
                                            </div>
                                        <?php 
                                        } else {
                                           echo'
                                           <div class="form-group"><label>Province *</label>
                                                <input name="cProvince" class="form-control" id="stateIdP" value="';
                                                if(isset($_SESSION['cProvince'])) echo $_SESSION['cProvince'];
                                                echo '" required>
                                            </div>';
                                       }
                                    ?>
                
                
                                        <?php
                                         if(!isset($_SESSION['cCountry']) && (!isset($_SESSION['cProvince'])) && (!isset($_SESSION['cCity']))){
                                            echo '<div class="form-group"><label>City *</label>
                                            <select name="cCity" class="cities  form-control" id="cityId">
                                                <option value = "">City</option>
                                            </select>
                                        </div>';
                                         } else {
                                        echo '
                                        <div class="form-group"><label>Town / City *</label>
                                                <input name="cCity" class="cities form-control" id="cityIdP" value="'; 
                                                if(isset($_SESSION['cCity'])) echo $_SESSION['cCity'];
                                                echo '" required>
                                        </div>';
                                            

                                         } 


                                        if(!isset($_SESSION['cCountry']) && (!isset($_SESSION['cProvince'])) && (!isset($_SESSION['cCity']))){
                                echo '
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                                <script src="//geodata.solutions/includes/countrystatecity.js"></script>
                                ';
                            }
                            ?> 
                                        <div class="form-group"><label>Area (if applicable)</label><input class="form-control" type="text" id="cArea" name="cArea" <?php if(isset($_SESSION['cArea']) && ($_SESSION['cArea'] != '0')) { echo 'value="' . $_SESSION['cArea'] . '"';};?>></div>
                                        <div class="form-group"><label>Street Number *</label><input class="form-control" type="text" id="cHouseNum" name="cHouseNum" <?php if(isset($_SESSION['cHouseNum'])){ echo 'value="' . $_SESSION['cHouseNum'] . '"';};?>></div>
                                        <div class="form-group"><label>Street Name *</label><input class="form-control" type="text" id="cAdr" name="cAdr" <?php if(isset($_SESSION['cAdr'])){ echo 'value="' . $_SESSION['cAdr'] . '"';};?>></div>
                                        <div class="form-group"><label>Unit Number (if applicable)</label><input class="form-control" type="text" id="cApUnNr" name="cApUnNr" <?php if(isset($_SESSION['cApUnNr']) && ($_SESSION['cApUnNr'] != '0')){ echo 'value="' . $_SESSION['cApUnNr'] . '"';};?>></div>
                                        <div class="form-group"><label>Unit Name (if applicable)</label><input class="form-control" type="text" id="cApUnName" name="cApUnName" <?php if(isset($_SESSION['cApUnName']) && ($_SESSION['cApUnName'] != '0')){ echo 'value="' . $_SESSION['cApUnName'] . '"';};?>></div>
                
                                        <label>Floor *</label>
                                            <select class="form-control" style="max-width:300px!important;" id='cFloor' name='cFloor'>
                                                <option <?php if(!isset($_SESSION['cFloor']) || ($_SESSION['cFloor'] == "")) echo "selected";?> value = "">-- Select Floor --</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "Ground") echo "selected";?> value="Ground">Ground</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "1st") echo "selected";?>>1st</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "2nd") echo "selected";?>>2nd</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "3rd") echo "selected";?>>3rd</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "4th") echo "selected";?>>4th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "5th") echo "selected";?>>5th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "6th") echo "selected";?>>6th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "7th") echo "selected";?>>7th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "8th") echo "selected";?>>8th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "9th") echo "selected";?>>9th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "10th") echo "selected";?>>10th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "11th") echo "selected";?>>11th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "12th") echo "selected";?>>12th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "13th") echo "selected";?>>13th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "14th") echo "selected";?>>14th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "15th") echo "selected";?>>15th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "16th") echo "selected";?>>16th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "17th") echo "selected";?>>17th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "18th") echo "selected";?>>18th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "19th") echo "selected";?>>19th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "20th") echo "selected";?>>20th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "21st") echo "selected";?>>21st</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "22nd") echo "selected";?>>22nd</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "23rd") echo "selected";?>>23rd</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "24th") echo "selected";?>>24th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "25th") echo "selected";?>>25th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "26th") echo "selected";?>>26th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "27th") echo "selected";?>>27th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "28th") echo "selected";?>>28th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "29th") echo "selected";?>>29th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "30th") echo "selected";?>>30th</option>
                                                <option <?php if(isset($_SESSION['cFloor']) && $_SESSION['cFloor'] == "Other") echo "selected";?>>Other</option>
                                            </select>
                                            
                                            
                                            <div style='display:none;' id='cLifts' name='cLifts'>
                                                <br><label>Lifts *</label>
                                                <select class="form-control" style="max-width:300px!important;" id='cLiftsV' name='cLiftsV'>
                                                    <option <?php if(!isset($_SESSION['cLiftsV']) || $_SESSION['cLiftsV'] == "") echo "selected";?>>-- Is there a lift available? --</option>
                                                    <option <?php if(isset($_SESSION['cLiftsV']) && $_SESSION['cLiftsV'] == "No lifts available") echo "selected";?>>No lifts available</option>
                                                    <option <?php if(isset($_SESSION['cLiftsV']) && $_SESSION['cLiftsV'] == "Yes - Normaly Works") echo "selected";?>>Yes - Normaly Works</option>
                                                    <option <?php if(isset($_SESSION['cLiftsV']) && $_SESSION['cLiftsV'] == "Yes - Often Out of Service") echo "selected";?>>Yes - Often Out of Service</option>
                                                </select>
                                            </div>
        
                                            <br><label>Truck Restrictions *</label>
                                            <select class="form-control" style="max-width:300px!important;" id='cTruck' name='cTruck'>
                                                <option <?php if(!isset($_SESSION['cTruck']) || ($_SESSION['cTruck'] == "")) echo "selected";?> value = "">-- Is there truck limitations? --</option>
                                                <option <?php if(isset($_SESSION['cTruck']) && $_SESSION['cTruck'] == "Unknown") echo "selected";?> value="Unknown">Unknown</option>
                                                <option <?php if(isset($_SESSION['cTruck']) && $_SESSION['cTruck'] == "Yes") echo "selected";?> value="Yes">Yes</option>
                                                <option <?php if(isset($_SESSION['cTruck']) && $_SESSION['cTruck'] == "No") echo "selected";?> value="No">No</option>
                                            </select>
                                            
                                            <div style='display:none;' id='cTruckT' name='cTruckT'>
                                                <br><label>Restriction Type *</label>
                                                <select class="form-control" style="max-width:300px!important;" id='cTruckTI' name='cTruckTI'>
                                                    <option <?php if(!isset($_SESSION['cTruckTI']) || ($_SESSION['cTruckTI'] == "")) echo "selected";?> value = "">-- Select Restriction --</option>
                                                    <option <?php if(isset($_SESSION['cTruckTI']) && $_SESSION['cTruckTI'] == "Height") echo "selected";?> value="Height">Height</option>
                                                    <option <?php if(isset($_SESSION['cTruckTI']) && $_SESSION['cTruckTI'] == "Tonnage") echo "selected";?> value="Tonnage">Tonnage</option>
                                                </select>
                                            </div>

                                            <div style='display:none;' id='cTruckTH' name='cTruckTH'>
                                                <br><label>Height in meters *</label>
                                                <select class="form-control" style="max-width:300px!important;" id='cTruckHV' name='cTruckHV'>
                                                    <option <?php if(!isset($_SESSION['cTruckHV']) || ($_SESSION['cTruckHV'] == "")) echo "selected";?> value = "">-- What is the maximum height? --</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "1.8m") echo "selected";?>>1.8m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "1.9m") echo "selected";?>>1.9m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.0m") echo "selected";?>>2.0m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.1m") echo "selected";?>>2.1m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.2m") echo "selected";?>>2.2m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.3m") echo "selected";?>>2.3m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.4m") echo "selected";?>>2.4m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.5m") echo "selected";?>>2.5m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.6m") echo "selected";?>>2.6m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.7m") echo "selected";?>>2.7m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.8m") echo "selected";?>>2.8m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "2.9m") echo "selected";?>>2.9m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.0m") echo "selected";?>>3.0m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.1m") echo "selected";?>>3.1m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.2m") echo "selected";?>>3.2m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.3m") echo "selected";?>>3.3m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.4m") echo "selected";?>>3.4m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.5m") echo "selected";?>>3.5m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.6m") echo "selected";?>>3.6m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.7m") echo "selected";?>>3.7m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.8m") echo "selected";?>>3.8m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "3.9m") echo "selected";?>>3.9m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.0m") echo "selected";?>>4.0m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.1m") echo "selected";?>>4.1m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.2m") echo "selected";?>>4.2m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.3m") echo "selected";?>>4.3m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.4m") echo "selected";?>>4.4m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.5m") echo "selected";?>>4.5m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.6m") echo "selected";?>>4.6m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.7m") echo "selected";?>>4.7m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.8m") echo "selected";?>>4.8m</option>
                                                    <option <?php if(isset($_SESSION['cTruckHV']) && $_SESSION['cTruckHV'] == "4.9m") echo "selected";?>>4.9m</option>
                                                </select>
                                            </div>

                                            <div style='display:none;' id='cTruckTT' name='cTruckTT'>
                                                <br><label>Tonnage *</label>
                                                <select class="form-control" style="max-width:300px!important;" id='cTruckTV' name='cTruckTV'>
                                                    <option <?php if(!isset($_SESSION['cTruckTV']) || ($_SESSION['cTruckTV'] == "")) echo "selected";?> value = "">-- What is the maximum weight? --</option>
                                                    <option <?php if(isset($_SESSION['cTruckTV']) && $_SESSION['cTruckTV'] == "1T") echo "selected";?>>1T</option>
                                                    <option <?php if(isset($_SESSION['cTruckTV']) && $_SESSION['cTruckTV'] == "3T") echo "selected";?>>3T</option>
                                                    <option <?php if(isset($_SESSION['cTruckTV']) && $_SESSION['cTruckTV'] == "5T") echo "selected";?>>5T</option>
                                                    <option <?php if(isset($_SESSION['cTruckTV']) && $_SESSION['cTruckTV'] == "8T") echo "selected";?>>8T</option>
                                                </select>
                                            </div>
                
                                            <div style='display:none;' id='cTruckTO' name='cTruckTO'>
                                            <br><label>Other *</label>
                                                <input class="form-control" style="max-width:300px!important;" type="textfield" id='cTruckOV' name='cTruckOV' placeholder="Provide details" <?php if(isset($_SESSION['cTruckOV'])){ echo 'value="' . $_SESSION['cTruckOV'] . '"';};?>>
                                            </div>
                
                                            <br><div class="form-group"><label>ID Book required for access *</label>
                                            <select class="form-control" style="max-width:300px!important;" id="cIdReq" name="cIdReq">
                                                <option <?php if(!isset($_SESSION['cIdReq']) || ($_SESSION['cIdReq'] == "")) echo "selected";?> value = "">-- Is ID's required? --</option>
                                                <option <?php if(isset($_SESSION['cIdReq']) && $_SESSION['cIdReq'] == "Yes") echo "selected";?> value="Yes">Yes</option>
                                                <option <?php if(isset($_SESSION['cIdReq']) && $_SESSION['cIdReq'] == "No") echo "selected";?> value="No">No</option>
                                            </select>
                                        </div>
                                    
                                    
                                        <div class="table-responsive">

                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                            <button class="btn btn-primary" type="button"  style="background-color:#fcfcfc;color:red;" onclick="goBack()">Go Back</button>
                                                            
                                                            <form action="" method="post">
                                                                <input type="submit" name="CBtn" id="CBtn" value="Submit Details" class="btn btn-block btn-success" style="float:right; max-width:265px;padding:5px 12px!important;">
                                                            </form>
                                                        
                                                        </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <script>
                function goBack() {
                  window.history.back();
                }
                </script>
                
                <?php include_once 'inc/required/footer.php';?>
                
                <script>

                $(document).ready(function(){
                    $('#countryId').on('change', function() {
                        var cCountry = $selected_value=$('#countryId option:selected').text();
                        // Store data
                        // localStorage.setItem('cCountry', cCountry);
                        // Remove data
                        //localStorage.removeItem('cCountry');
                        console.log(cCountry);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cCountry': cCountry
                                    },
                                success: function() {
                                }
                            });
                    });
                });

                $(document).ready(function(){
                    $("#countryIdP").change(function(){
                        var cCountry = document.getElementById("countryIdP").value;
                        // Store data
                        // localStorage.setItem('cCountry', cCountry);
                        // Remove data
                        //localStorage.removeItem('cCountry');
                        console.log(cCountry);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cCountry': cCountry
                                    },
                                success: function() {
                                }
                            });
                    });
                });






                $(document).ready(function(){
                    $('#stateId').on('change', function() {
                        var cProvince = $selected_value=$('#stateId option:selected').text();
                        // Store data
                        // localStorage.setItem('cProvince', cProvince);
                        // Remove data
                        //localStorage.removeItem('cProvince');
                        console.log(cProvince);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cProvince': cProvince
                                    },
                                success: function() {
                                }
                            });
                    });
                });


                $(document).ready(function(){
                    $("#stateIdP").change(function(){
                        var cProvince = document.getElementById("stateIdP").value;
                        // Store data
                        // localStorage.setItem('cProvince', cProvince);
                        // Remove data
                        //localStorage.removeItem('cProvince');
                        console.log(cProvince);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cProvince': cProvince
                                    },
                                success: function() {
                                }
                            });
                    });
                });




                $(document).ready(function(){
                    $('#cityId').on('change', function() {
                        var cCity = $selected_value=$('#cityId option:selected').text();
                        // Store data
                        // localStorage.setItem('cCity', cCity);
                        // Remove data
                        //localStorage.removeItem('cCity');
                        console.log(cCity);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cCity': cCity
                                    },
                                success: function() {
                                }
                            });
                    });
                });

                $(document).ready(function(){
                    $("#cityIdP").change(function(){
                        var cCity = document.getElementById("cityIdP").value;
                        // Store data
                        // localStorage.setItem('cCity', cCity);
                        // Remove data
                        //localStorage.removeItem('cCity');
                        console.log(cCity);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cCity': cCity
                                    },
                                success: function() {
                                }
                            });
                    });
                });




                $(document).ready(function(){
                    $("#cArea").change(function(){
                        var cArea = document.getElementById("cArea").value;
                        // Store data
                        // localStorage.setItem('cArea', cArea);
                        // Remove data
                        //localStorage.removeItem('cArea');
                        console.log(cArea);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cArea': cArea
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $("#cHouseNum").change(function(){
                        var cHouseNum = document.getElementById("cHouseNum").value;
                        // Store data
                        // localStorage.setItem('cHouseNum', cHouseNum);
                        // Remove data
                        //localStorage.removeItem('cHouseNum');
                        console.log(cHouseNum);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cHouseNum': cHouseNum
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $("#cAdr").change(function(){
                        var cAdr = document.getElementById("cAdr").value;
                        // Store data
                        // localStorage.setItem('cAdr', cAdr);
                        // Remove data
                        //localStorage.removeItem('cAdr');
                        console.log(cAdr);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cAdr': cAdr
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $("#cApUnNr").change(function(){
                        var cApUnNr = document.getElementById("cApUnNr").value;
                        // Store data
                        // localStorage.setItem('cApUnNr', cApUnNr);
                        // Remove data
                        //localStorage.removeItem('cApUnNr');
                        console.log(cApUnNr);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cApUnNr': cApUnNr
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $("#cApUnName").change(function(){
                        var cApUnName = document.getElementById("cApUnName").value;
                        // Store data
                        // localStorage.setItem('cApUnName', cApUnName);
                        // Remove data
                        //localStorage.removeItem('cApUnName');
                        console.log(cApUnName);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cApUnName': cApUnName
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $('#cFloor').on('change', function() {
                      if ( this.value !== 'Ground')
                      {
                        $("#cLifts").show();
                      }
                      else
                      {
                        $("#cLifts").hide();
                        var cFloor = "";
                        console.log(cFloor);
                      }
                    });
                });
                


                $(document).ready(function(){
                    $('#cFloor').on('change', function() {
                        var cFloor = $selected_value=$('#cFloor option:selected').text();
                        // Store data
                        // localStorage.setItem('cFloor', cFloor);
                        // Remove data
                        //localStorage.removeItem('cFloor');
                        console.log(cFloor);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cFloor': cFloor
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $('#cLiftsV').on('change', function() {
                        var cLift = $selected_value=$('#cLiftsV option:selected').text();
                        // Store data
                        // localStorage.setItem('cLift', cLift);
                        // Remove data
                        //localStorage.removeItem('cLift');
                        console.log(cLift);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cLift': cLift
                                    },
                                success: function() {
                                }
                            });
                    });
                });


                
                $(document).ready(function(){
                    $('#cTruck').on('change', function() {
                      if ( this.value == 'Yes') {
                        $("#cTruckT").show();
                      } else {
                        $("#cTruckT").hide();
                        $("#cTruckTO").hide();
                        $("#cTruckTH").hide();
                        $("#cTruckTT").hide();
                        var cFloor = "";
                        console.log(cFloor);
                      }
                    });
                });



                $(document).ready(function(){
                    $('#cTruck').on('change', function() {
                        var cTruckoptions = $selected_value=$('#cTruck option:selected').text();
                        // Store data
                        // localStorage.setItem('cTruckoptions', cTruckoptions);
                        // Remove data
                        //localStorage.removeItem('cTruckoptions');
                        console.log(cTruckoptions);
                        $.ajax({
                            async: true,
                            defaut: false,
                            url: 'CSetSession.php',
                            type: 'post',
                            data: {
                                'cTruckoptions': cTruckoptions
                                },
                            success: function() {
                            }
                        });
                    });
                });
                


                $(document).ready(function(){
                    $('#cTruckTI').on('change', function() {
                        var cTruckoption = $selected_value=$('#cTruckTI option:selected').text();
                        // Store data
                        // localStorage.setItem('cTruckoption', cTruckoption);
                        // Remove data
                        //localStorage.removeItem('cTruckoption');
                        console.log(cTruckoption);
                        $.ajax({
                            async: true,
                            defaut: false,
                            url: 'CSetSession.php',
                            type: 'post',
                            data: {
                                'cTruckoption': cTruckoption
                                },
                            success: function() {
                            }
                        });
                    });
                });



                $(document).ready(function() {
                    $('#cTruckTV').on('change', function() {
                        var cTonval = $selected_value=$('#cTruckTV option:selected').text();
                        // Store data
                        // localStorage.setItem('cTonval', cTonval);
                        // Remove data
                        //localStorage.removeItem('cTonval');
                        console.log(cTonval);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cTonval': cTonval
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $('#cTruckHV').on('change', function() {
                        var cHeival = $selected_value=$('#cTruckHV option:selected').text();
                        // Store data
                        // localStorage.setItem('cHeival', cHeival);
                        // Remove data
                        //localStorage.removeItem('cHeival');
                        console.log(cHeival);

                            $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cHeival': cHeival
                                    },
                                success: function() {
                                }
                            });
                    });
                });

                


                $(document).ready(function(){
                    $('#cTruckOV').on('change', function() {
                        var cotval = $selected_value=$('#cTruckOV option:selected').text();
                        // Store data
                        // localStorage.setItem('cotval', cotval);
                        // Remove data
                        //localStorage.removeItem('cotval');
                        console.log(cotval);
                    });
                });



                $(document).ready(function(){
                    $('#cIdReq').on('change', function() {
                        var cIdReq = $selected_value=$('#cIdReq option:selected').text();
                        // Store data
                        // localStorage.setItem('cIdReq', cIdReq);
                        // Remove data
                        //localStorage.removeItem('cIdReq');
                        console.log(cIdReq);

                            $.ajax({
                                async: true,
                                defaut: false,
                                url: 'CSetSession.php',
                                type: 'post',
                                data: {
                                    'cIdReq': cIdReq
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                
                $(document).ready(function(){
                    $('#cTruckTI').on('change', function() {
                      if ( this.value == 'Tonnage') {
                        $("#cTruckTT").show();
                        $("#cTruckTH").hide();
                        $("#cTruckTO").hide();
                        
                      } else if ( this.value == 'Height') {
                        $("#cTruckTH").show();
                        $("#cTruckTT").hide();
                        $("#cTruckTO").hide();
                      } else {
                        $("#cTruckTO").show();
                        $("#cTruckTH").hide();
                        $("#cTruckTT").hide();
                      }
                    });
                });



                $(document).ready(function(){
                    $('#cTruckTI').on('change', function() {
                      if ( this.value == 'Tonnage') {
                        $("#cTruckTT").show();
                        $("#cTruckTH").hide();
                        $("#cTruckTO").hide();
                        
                      } else if ( this.value == 'Height') {
                        $("#cTruckTH").show();
                        $("#cTruckTT").hide();
                        $("#cTruckTO").hide();
                      } else {
                        $("#cTruckTO").show();
                        $("#cTruckTH").hide();
                        $("#cTruckTT").hide();
                      }
                    });
                });
                </script>




                <script>

                        $(document).ready(function(){   
                            var cFloor = $selected_value=$('#cFloor option:selected').text();
                            // Get data
                            // var cFloor = localStorage.getItem('cFloor');
                            // console.log(cFloor);
                            if(cFloor !== "Ground") {
                            document.getElementById("cLifts").style.display = "block";
                            }
                            // console.log(cLift);
                            $('#cFloor').val(cFloor);
                    });
                    
                        
                        $(document).ready(function(){   
                            var cLift = $selected_value=$('#cLiftsV option:selected').text();
                            // Get data
                            // var cLift = localStorage.getItem('cLift');        
                            // console.log(cLift);
                            $('#cLiftsV').val(cLift);
                    });


                        $(document).ready(function(){
                            var showTruckoptions = $selected_value=$('#cTruck option:selected').text();
                            //console.log(showTruckoptions);
                            if(showTruckoptions == "Yes") {
                            document.getElementById("cTruckT").style.display = "block";
                            }
                    });

                        $(document).ready(function(){
                            var cTruckoption = $selected_value=$('#cTruckTI option:selected').text();
                            // Get data
                            // var cTruckoption = localStorage.getItem('cTruckoption');
                            console.log(cTruckoption);
                            $('#cTruckTI').val(cTruckoption);

                            if(cTruckoption == "Height") {
                            document.getElementById("cTruckTH").style.display = "block";
                            // $('#cTruckHV').val(cHeival);
                            }
                            
                            if(cTruckoption == "Tonnage") {
                            document.getElementById("cTruckTT").style.display = "block";
                            }

                            if(cTruckoption == "Other") {
                            document.getElementById("cTruckTO").style.display = "block";
                            $('#cTruckOV').val(cotval);
                            }
                    });

                            // var cTonval = localStorage.getItem('cTonval');
                            // $('#cTruckTV').val(cTonval);
                            // console.log("cTonval: " + cTonval);
                            

                            // var cHeival = localStorage.getItem('cHeival');
                            // $('#cTruckHV').val(cHeival);
                            // console.log("cHeival: " + cHeival);
                </script>

<?php 
    }
?>