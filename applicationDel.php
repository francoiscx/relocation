<style>
.removeItem {
    margin: -43px 20px 60px 0px!important;
    float:right;
    color: crimson;
}
</style>

<?php 


include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';

$page = $_SESSION['relocationType'] . " Delivery";
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
                if(!isset($_SESSION['dCountry'])){
                    $error = $error . "<br>Please provide your Country";
                }
    
                if(!isset($_SESSION['dProvince'])){
                    $error = $error . "<br>Please provide your Province";
                }
    
                if(!isset($_SESSION['dCity'])){
                    $error = $error . "<br>Please provide your City";
                }
                
                if(!isset($_SESSION['dArea'])){
                    $error = $error . "<br>Please provide your Area / Suburb";
                }
    
                if(!isset($_SESSION['dHouseNum'])){
                    $error = $error . "<br>Please provide your Street Number";
                }
    
                if(!isset($_SESSION['dAdr'])){
                    $error = $error . "<br>Please provide your Street Name";
                }
    
                if(!isset($_SESSION['dFloor'])){
                    $error = $error . "<br>Please what floor  / level you are on";
                }
    
                if(!isset($_SESSION['dLiftsV'])){
                    if($_SESSION['dFloor'] != "Ground") {
                    $error = $error . "<br>Is there a lift available?";
                    } else {
                        $_SESSION['dLiftsV'] = 0;
                    }
                }
    
                if(!isset($_SESSION['dTruck'])){
                    $error = $error . "<br>Indicate wheather you have truck restrictions on the property";
                }
    
                if(isset($_SESSION['dTruck']) && ($_SESSION['dTruck']) == "Yes") {
    
                    if(!isset($_SESSION['dTruckTI'])){
                        $error = $error . "<br>What type of limitation is imposed, Tonnage or Height?";
                    
                        if(isset($_SESSION['dTruckTI']) && ($_SESSION['dTruckTI']) == "Tonnage") {
    
                        }
    
                        if(isset($_SESSION['dTruckTI']) && ($_SESSION['dTruckTI']) == "Height") {
    
                        }
                    }
                }
    
    
                if(!isset($_SESSION['dIdReq'])){
                    $error = $error . "<br>Does the movers require their ID's to enter the premisis?";
                }
            
                if(!isset($error) || ($error == '')) {
                    include_once "applicationDelStore.php";
                }

            }                            
                    include_once 'inc/required/head.php';

                    if(isset($appDetailsID)) {
                        //check for userID in database
                        $sqlQuery = "SELECT * FROM app_details WHERE app_detail_id =:appDetailsID";
                        $statement = $db->prepare($sqlQuery);
                        $statement->execute(array(':appDetailsID' => $appDetailsID));
                                            
                            while($row = $statement->fetch()){
                            $dCountry = $row['d_country'];
                            $dProvince = $row['d_province'];
                            $dCity = $row['d_city'];
                            $dArea = $row['d_area'];
                            $dHouseNum = $row['d_house_nr'];
                            $dAdr = $row['d_adr'];
                            $dApUnNr = $row['d_apart_unit_nr'];
                            $dApUnName = $row['d_apart_unit_name'];
                            $dFloor = $row['d_floor'];
                            $dLiftsV = $row['d_lifts'];
                            $dTruck = $row['d_truck'];
                            $dTruckTI = $row['d_truck_t_i'];
                            $dTruckHV = $row['d_truck_h_v'];
                            $dTruckTV = $row['d_truck_t_v'];
                            $dIdReq = $row['d_id_req'];
            
                            if(!isset($_SESSION['dCountry'])) $_SESSION['dCountry'] = $dCountry;
                            if(!isset($_SESSION['dProvince'])) $_SESSION['dProvince'] = $dProvince;
                            if(!isset($_SESSION['dCity'])) $_SESSION['dCity'] = $dCity;
                            if(!isset($_SESSION['dArea'])) $_SESSION['dArea'] = $dArea;
                            if(!isset($_SESSION['dHouseNum'])) $_SESSION['dHouseNum'] = $dHouseNum;
                            if(!isset($_SESSION['dAdr'])) $_SESSION['dAdr'] = $dAdr;
                            if(!isset($_SESSION['dApUnNr'])) $_SESSION['dApUnNr'] = $dApUnNr;
                            if(!isset($_SESSION['dApUnName'])) $_SESSION['dApUnName'] = $dApUnName;
                            if(!isset($_SESSION['dFloor'])) $_SESSION['dFloor'] = $dFloor;
                            if(!isset($_SESSION['dLiftsV']))  $_SESSION['dLiftsV'] = $dLiftsV;
                            if(!isset($_SESSION['dTruck'])) $_SESSION['dTruck'] = $dTruck;
                            if(!isset($_SESSION['dTruckTI'])) $_SESSION['dTruckTI'] = $dTruckTI;
                            if(!isset($_SESSION['dTruckHV'])) $_SESSION['dTruckHV'] = $dTruckHV;
                            if(!isset($_SESSION['dTruckTV'])) $_SESSION['dTruckTV'] = $dTruckTV;
                            if(!isset($_SESSION['dIdReq'])) $_SESSION['dIdReq'] = $dIdReq;
                            } 
                        }?>
                
                                
                            </div>
                        </div>
                    </nav>
                  

                    <section id="appSection">    
                    <div id="backgrounddivred">
                        <div class="container">
                            <div class="row" style="margin-top:44px;">
                            <div class="col-md-12"><h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">Please Provide details for the<br><span style="color:#E9ECEF">Delivery Address</span><br/>of your <span style="color:#E9ECEF"><?php echo $_SESSION['relocationType'];?></span> Move Requirements</h1><p style="text-align:center; color:#4A4A4A">
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
                                        if(isset($_POST['DBtn'])){
                                            unset($_POST['DBtn']);
                                            echo $error . '<br><br>';
                                        } else { echo'<center><h4><div>Provide the details where you are moving too.</div></h4></center>';
                                            
                                        }

                                       
                                          if(!isset($_SESSION['dCountry']) && (!isset($_SESSION['dProvince'])) && (!isset($_SESSION['dCity']))){
                                              if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "International")) {
                                        ?>
                                            <div class="form-group"><label>Country *</label>
                                                <select name="dCountry" class="countries order-alpha form-control" id="countryId">
                                                    <option value = "">Country</option>
                                                </select>
                                            </div>
                                        <?php 
                                              } else {
                                        ?>
                                            <div class="form-group"><label>Country *</label>
                                                <select name="dCountry" class="countries order-alpha presel-ZA form-control" id="countryId">
                                                    <option value = "">Country</option>
                                                </select>
                                            </div>
                                        <?php 
                                            }
                                    } else {
                                            echo '
                                            <div class="form-group"><label>Country *</label>
                                                <input name="dCountry" class="form-control" id="countryIdP" value="';
                                                if(isset($_SESSION['dCountry'])) echo $_SESSION['dCountry'];
                                                echo '">
                                            </div>';
                                             
                                        }
                                        ?>
                
                
                                        <?php 
                                        if(!isset($_SESSION['dCountry']) && (!isset($_SESSION['dProvince'])) && (!isset($_SESSION['dCity']))){
                                            ?>
                                            <div class="form-group"><label>Province *</label>
                                                <select name="dProvince" class="states  form-control" id="stateId">
                                                    <option value = "">Province</option>
                                                </select>
                                            </div>
                                        <?php 
                                        } else {
                                           echo'
                                           <div class="form-group"><label>Province *</label>
                                                <input name="dProvince" class="form-control" id="stateIdP" value="';
                                                if(isset($_SESSION['dProvince'])) echo $_SESSION['dProvince'];
                                                echo '">
                                            </div>';
                                       }
                                    ?>
                
                
                                        <?php
                                         if(!isset($_SESSION['dCountry']) && (!isset($_SESSION['dProvince'])) && (!isset($_SESSION['dCity']))){
                                            echo '<div class="form-group"><label>City *</label>
                                            <select name="dCity" class="cities  form-control" id="cityId">
                                                <option value = "">City</option>
                                            </select>
                                        </div>';
                                         } else {
                                        echo '
                                        <div class="form-group"><label>Town / City *</label>
                                                <input name="dCity" class="cities form-control" id="cityIdP" value="'; 
                                                if(isset($_SESSION['dCity'])) echo $_SESSION['dCity'];
                                                echo '">
                                        </div>';
                                            

                                         } 


                                        if(!isset($_SESSION['dCountry']) && (!isset($_SESSION['dProvince'])) && (!isset($_SESSION['dCity']))){
                                echo '
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                                <script src="//geodata.solutions/includes/countrystatecity.js"></script>
                                ';
                            }
                            ?> 
                                        <div class="form-group"><label>Area (if applicable)</label><input class="form-control" type="text" id="dArea" name="dArea" <?php if(isset($_SESSION['dArea']) && ($_SESSION['dArea'] != '0')) { echo 'value="' . $_SESSION['dArea'] . '"';};?>></div>
                                        <div class="form-group"><label>Street Number *</label><input class="form-control" type="text" id="dHouseNum" name="dHouseNum" <?php if(isset($_SESSION['dHouseNum'])){ echo 'value="' . $_SESSION['dHouseNum'] . '"';};?>></div>
                                        <div class="form-group"><label>Street Name *</label><input class="form-control" type="text" id="dAdr" name="dAdr" <?php if(isset($_SESSION['dAdr'])){ echo 'value="' . $_SESSION['dAdr'] . '"';};?>></div>
                                        <div class="form-group"><label>Unit Number (if applicable)</label><input class="form-control" type="text" id="dApUnNr" name="dApUnNr" <?php if(isset($_SESSION['dApUnNr']) && ($_SESSION['dApUnNr'] != '0')){ echo 'value="' . $_SESSION['dApUnNr'] . '"';};?>></div>
                                        <div class="form-group"><label>Unit Name (if applicable)</label><input class="form-control" type="text" id="dApUnName" name="dApUnName" <?php if(isset($_SESSION['dApUnName']) && ($_SESSION['dApUnName'] != '0')){ echo 'value="' . $_SESSION['dApUnName'] . '"';};?>></div>
                
                                        <label>Floor *</label>
                                            <select class="form-control" style="max-width:300px!important;" id='dFloor' name='dFloor'>
                                                <option <?php if(!isset($_SESSION['dFloor']) || ($_SESSION['dFloor'] == "")) echo "selected";?> value = "">-- Select Floor --</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "Ground") echo "selected";?> value="Ground">Ground</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "1st") echo "selected";?>>1st</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "2nd") echo "selected";?>>2nd</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "3rd") echo "selected";?>>3rd</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "4th") echo "selected";?>>4th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "5th") echo "selected";?>>5th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "6th") echo "selected";?>>6th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "7th") echo "selected";?>>7th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "8th") echo "selected";?>>8th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "9th") echo "selected";?>>9th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "10th") echo "selected";?>>10th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "11th") echo "selected";?>>11th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "12th") echo "selected";?>>12th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "13th") echo "selected";?>>13th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "14th") echo "selected";?>>14th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "15th") echo "selected";?>>15th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "16th") echo "selected";?>>16th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "17th") echo "selected";?>>17th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "18th") echo "selected";?>>18th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "19th") echo "selected";?>>19th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "20th") echo "selected";?>>20th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "21st") echo "selected";?>>21st</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "22nd") echo "selected";?>>22nd</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "23rd") echo "selected";?>>23rd</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "24th") echo "selected";?>>24th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "25th") echo "selected";?>>25th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "26th") echo "selected";?>>26th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "27th") echo "selected";?>>27th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "28th") echo "selected";?>>28th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "29th") echo "selected";?>>29th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "30th") echo "selected";?>>30th</option>
                                                <option <?php if(isset($_SESSION['dFloor']) && $_SESSION['dFloor'] == "Other") echo "selected";?>>Other</option>
                                            </select>
                                            
                                            
                                            <div style='display:none;' id='dLifts' name='dLifts'>
                                                <br><label>Lifts *</label>
                                                <select class="form-control" style="max-width:300px!important;" id='dLiftsV' name='dLiftsV'>
                                                    <option <?php if(!isset($_SESSION['dLiftsV']) || $_SESSION['dLiftsV'] == "") echo "selected";?>>-- Is there a lift available? --</option>
                                                    <option <?php if(isset($_SESSION['dLiftsV']) && $_SESSION['dLiftsV'] == "No lifts available") echo "selected";?>>No lifts available</option>
                                                    <option <?php if(isset($_SESSION['dLiftsV']) && $_SESSION['dLiftsV'] == "Yes - Normaly Works") echo "selected";?>>Yes - Normaly Works</option>
                                                    <option <?php if(isset($_SESSION['dLiftsV']) && $_SESSION['dLiftsV'] == "Yes - Often Out of Service") echo "selected";?>>Yes - Often Out of Service</option>
                                                </select>
                                            </div>
        
                                            <br><label>Truck Restrictions *</label>
                                            <select class="form-control" style="max-width:300px!important;" id='dTruck' name='dTruck'>
                                                <option <?php if(!isset($_SESSION['dTruck']) || ($_SESSION['dTruck'] == "")) echo "selected";?> value = "">-- Is there truck limitations? --</option>
                                                <option <?php if(isset($_SESSION['dTruck']) && $_SESSION['dTruck'] == "Unknown") echo "selected";?> value="Unknown">Unknown</option>
                                                <option <?php if(isset($_SESSION['dTruck']) && $_SESSION['dTruck'] == "Yes") echo "selected";?> value="Yes">Yes</option>
                                                <option <?php if(isset($_SESSION['dTruck']) && $_SESSION['dTruck'] == "No") echo "selected";?> value="No">No</option>
                                            </select>
                                            
                                            <div style='display:none;' id='dTruckT' name='dTruckT'>
                                                <br><label>Restriction Type *</label>
                                                <select class="form-control" style="max-width:300px!important;" id='dTruckTI' name='dTruckTI'>
                                                    <option <?php if(!isset($_SESSION['dTruckTI']) || ($_SESSION['dTruckTI'] == "")) echo "selected";?> value = "">-- Select Restriction --</option>
                                                    <option <?php if(isset($_SESSION['dTruckTI']) && $_SESSION['dTruckTI'] == "Height") echo "selected";?> value="Height">Height</option>
                                                    <option <?php if(isset($_SESSION['dTruckTI']) && $_SESSION['dTruckTI'] == "Tonnage") echo "selected";?> value="Tonnage">Tonnage</option>
                                                </select>
                                            </div>

                                            <div style='display:none;' id='dTruckTH' name='dTruckTH'>
                                                <br><label>Height in meters *</label>
                                                <select class="form-control" style="max-width:300px!important;" id='dTruckHV' name='dTruckHV'>
                                                    <option value = "">-- What is the maximum height? --</option>
                                                    <option <?php if(!isset($_SESSION['dTruckHV']) || ($_SESSION['dTruckHV'] == "")) echo "selected";?> value = "">-- What is the maximum height? --</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "1.8m") echo "selected";?>>1.8m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "1.9m") echo "selected";?>>1.9m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.0m") echo "selected";?>>2.0m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.1m") echo "selected";?>>2.1m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.2m") echo "selected";?>>2.2m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.3m") echo "selected";?>>2.3m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.4m") echo "selected";?>>2.4m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.5m") echo "selected";?>>2.5m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.6m") echo "selected";?>>2.6m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.7m") echo "selected";?>>2.7m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.8m") echo "selected";?>>2.8m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "2.9m") echo "selected";?>>2.9m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.0m") echo "selected";?>>3.0m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.1m") echo "selected";?>>3.1m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.2m") echo "selected";?>>3.2m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.3m") echo "selected";?>>3.3m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.4m") echo "selected";?>>3.4m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.5m") echo "selected";?>>3.5m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.6m") echo "selected";?>>3.6m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.7m") echo "selected";?>>3.7m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.8m") echo "selected";?>>3.8m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "3.9m") echo "selected";?>>3.9m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.0m") echo "selected";?>>4.0m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.1m") echo "selected";?>>4.1m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.2m") echo "selected";?>>4.2m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.3m") echo "selected";?>>4.3m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.4m") echo "selected";?>>4.4m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.5m") echo "selected";?>>4.5m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.6m") echo "selected";?>>4.6m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.7m") echo "selected";?>>4.7m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.8m") echo "selected";?>>4.8m</option>
                                                    <option <?php if(isset($_SESSION['dTruckHV']) && $_SESSION['dTruckHV'] == "4.9m") echo "selected";?>>4.9m</option>
                                                </select>
                                            </div>

                                            <div style='display:none;' id='dTruckTT' name='dTruckTT'>
                                                <br><label>Tonnage *</label>
                                                <select class="form-control" style="max-width:300px!important;" id='dTruckTV' name='dTruckTV'>
                                                    <option <?php if(!isset($_SESSION['dTruckTV']) || ($_SESSION['dTruckTV'] == "")) echo "selected";?> value = "">-- What is the maximum weight? --</option>
                                                    <option <?php if(isset($_SESSION['dTruckTV']) && $_SESSION['dTruckTV'] == "1T") echo "selected";?>>1T</option>
                                                    <option <?php if(isset($_SESSION['dTruckTV']) && $_SESSION['dTruckTV'] == "3T") echo "selected";?>>3T</option>
                                                    <option <?php if(isset($_SESSION['dTruckTV']) && $_SESSION['dTruckTV'] == "5T") echo "selected";?>>5T</option>
                                                    <option <?php if(isset($_SESSION['dTruckTV']) && $_SESSION['dTruckTV'] == "8T") echo "selected";?>>8T</option>
                                                </select>
                                            </div>
                
                                            <div style='display:none;' id='dTruckTO' name='dTruckTO'>
                                            <br><label>Other *</label>
                                                <input class="form-control" style="max-width:300px!important;" type="textfield" id='dTruckOV' name='dTruckOV' placeholder="Provide details" <?php if(isset($_SESSION['dTruckOV'])){ echo 'value="' . $_SESSION['dTruckOV'] . '"';};?>>
                                            </div>
                
                                            <br><div class="form-group"><label>ID Book required for access *</label>
                                            <select class="form-control" style="max-width:300px!important;" id="dIdReq" name="dIdReq">
                                                <option <?php if(!isset($_SESSION['dIdReq']) || ($_SESSION['dIdReq'] == "")) echo "selected";?> value = "">-- Is ID's required? --</option>
                                                <option <?php if(isset($_SESSION['dIdReq']) && $_SESSION['dIdReq'] == "Yes") echo "selected";?> value="Yes">Yes</option>
                                                <option <?php if(isset($_SESSION['dIdReq']) && $_SESSION['dIdReq'] == "No") echo "selected";?> value="No">No</option>
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
                                                                <input type="submit" name="CBtn" value="Submit Details" class="btn btn-block btn-success" style="float:right; max-width:265px;padding:5px 12px!important;">
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
                        var dCountry = $selected_value=$('#countryId option:selected').text();
                        // Store data
                        // localStorage.setItem('dCountry', dCountry);
                        // Remove data
                        //localStorage.removeItem('dCountry');
                        console.log(dCountry);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dCountry': dCountry
                                    },
                                success: function() {
                                }
                            });
                    });
                });

                $(document).ready(function(){
                    $("#countryIdP").change(function(){
                        var dCountry = document.getElementById("countryIdP").value;
                        // Store data
                        // localStorage.setItem('dCountry', dCountry);
                        // Remove data
                        //localStorage.removeItem('dCountry');
                        console.log(dCountry);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dCountry': dCountry
                                    },
                                success: function() {
                                }
                            });
                    });
                });






                $(document).ready(function(){
                    $('#stateId').on('change', function() {
                        var dProvince = $selected_value=$('#stateId option:selected').text();
                        // Store data
                        // localStorage.setItem('dProvince', dProvince);
                        // Remove data
                        //localStorage.removeItem('dProvince');
                        console.log(dProvince);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dProvince': dProvince
                                    },
                                success: function() {
                                }
                            });
                    });
                });


                $(document).ready(function(){
                    $("#stateIdP").change(function(){
                        var dProvince = document.getElementById("stateIdP").value;
                        // Store data
                        // localStorage.setItem('dProvince', dProvince);
                        // Remove data
                        //localStorage.removeItem('dProvince');
                        console.log(dProvince);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dProvince': dProvince
                                    },
                                success: function() {
                                }
                            });
                    });
                });




                $(document).ready(function(){
                    $('#cityId').on('change', function() {
                        var dCity = $selected_value=$('#cityId option:selected').text();
                        // Store data
                        // localStorage.setItem('dCity', dCity);
                        // Remove data
                        //localStorage.removeItem('dCity');
                        console.log(dCity);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dCity': dCity
                                    },
                                success: function() {
                                }
                            });
                    });
                });

                $(document).ready(function(){
                    $("#cityIdP").change(function(){
                        var dCity = document.getElementById("cityIdP").value;
                        // Store data
                        // localStorage.setItem('dCity', dCity);
                        // Remove data
                        //localStorage.removeItem('dCity');
                        console.log(dCity);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dCity': dCity
                                    },
                                success: function() {
                                }
                            });
                    });
                });




                $(document).ready(function(){
                    $("#dArea").change(function(){
                        var dArea = document.getElementById("dArea").value;
                        // Store data
                        // localStorage.setItem('dArea', dArea);
                        // Remove data
                        //localStorage.removeItem('dArea');
                        console.log(dArea);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dArea': dArea
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $("#dHouseNum").change(function(){
                        var dHouseNum = document.getElementById("dHouseNum").value;
                        // Store data
                        // localStorage.setItem('dHouseNum', dHouseNum);
                        // Remove data
                        //localStorage.removeItem('dHouseNum');
                        console.log(dHouseNum);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dHouseNum': dHouseNum
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $("#dAdr").change(function(){
                        var dAdr = document.getElementById("dAdr").value;
                        // Store data
                        // localStorage.setItem('dAdr', dAdr);
                        // Remove data
                        //localStorage.removeItem('dAdr');
                        console.log(dAdr);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dAdr': dAdr
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $("#dApUnNr").change(function(){
                        var dApUnNr = document.getElementById("dApUnNr").value;
                        // Store data
                        // localStorage.setItem('dApUnNr', dApUnNr);
                        // Remove data
                        //localStorage.removeItem('dApUnNr');
                        console.log(dApUnNr);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dApUnNr': dApUnNr
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $("#dApUnName").change(function(){
                        var dApUnName = document.getElementById("dApUnName").value;
                        // Store data
                        // localStorage.setItem('dApUnName', dApUnName);
                        // Remove data
                        //localStorage.removeItem('dApUnName');
                        console.log(dApUnName);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dApUnName': dApUnName
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $('#dFloor').on('change', function() {
                      if ( this.value !== 'Ground')
                      {
                        $("#dLifts").show();
                      }
                      else
                      {
                        $("#dLifts").hide();
                        var dFloor = "";
                        console.log(dFloor);
                      }
                    });
                });
                


                $(document).ready(function(){
                    $('#dFloor').on('change', function() {
                        var dFloor = $selected_value=$('#dFloor option:selected').text();
                        // Store data
                        // localStorage.setItem('dFloor', dFloor);
                        // Remove data
                        //localStorage.removeItem('dFloor');
                        console.log(dFloor);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dFloor': dFloor
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $('#dLiftsV').on('change', function() {
                        var dLift = $selected_value=$('#dLiftsV option:selected').text();
                        // Store data
                        // localStorage.setItem('dLift', dLift);
                        // Remove data
                        //localStorage.removeItem('dLift');
                        console.log(dLift);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dLift': dLift
                                    },
                                success: function() {
                                }
                            });
                    });
                });


                
                $(document).ready(function(){
                    $('#dTruck').on('change', function() {
                      if ( this.value == 'Yes') {
                        $("#dTruckT").show();
                      } else {
                        $("#dTruckT").hide();
                        $("#dTruckTO").hide();
                        $("#dTruckTH").hide();
                        $("#dTruckTT").hide();
                        var dFloor = "";
                        console.log(dFloor);
                      }
                    });
                });



                $(document).ready(function(){
                    $('#dTruck').on('change', function() {
                        var dTruckoptions = $selected_value=$('#dTruck option:selected').text();
                        // Store data
                        // localStorage.setItem('dTruckoptions', dTruckoptions);
                        // Remove data
                        //localStorage.removeItem('dTruckoptions');
                        console.log(dTruckoptions);
                        $.ajax({
                            async: true,
                            defaut: false,
                            url: 'DSetSession.php',
                            type: 'post',
                            data: {
                                'dTruckoptions': dTruckoptions
                                },
                            success: function() {
                            }
                        });
                    });
                });
                


                $(document).ready(function(){
                    $('#dTruckTI').on('change', function() {
                        var dTruckoption = $selected_value=$('#dTruckTI option:selected').text();
                        // Store data
                        // localStorage.setItem('dTruckoption', dTruckoption);
                        // Remove data
                        //localStorage.removeItem('dTruckoption');
                        console.log(dTruckoption);
                        $.ajax({
                            async: true,
                            defaut: false,
                            url: 'DSetSession.php',
                            type: 'post',
                            data: {
                                'dTruckoption': dTruckoption
                                },
                            success: function() {
                            }
                        });
                    });
                });



                $(document).ready(function() {
                    $('#dTruckTV').on('change', function() {
                        var dTonval = $selected_value=$('#dTruckTV option:selected').text();
                        // Store data
                        // localStorage.setItem('dTonval', dTonval);
                        // Remove data
                        //localStorage.removeItem('dTonval');
                        console.log(dTonval);
                        $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dTonval': dTonval
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                $(document).ready(function(){
                    $('#dTruckHV').on('change', function() {
                        var dHeival = $selected_value=$('#dTruckHV option:selected').text();
                        // Store data
                        // localStorage.setItem('dHeival', dHeival);
                        // Remove data
                        //localStorage.removeItem('dHeival');
                        console.log(dHeival);

                            $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dHeival': dHeival
                                    },
                                success: function() {
                                }
                            });
                    });
                });

                


                $(document).ready(function(){
                    $('#dTruckOV').on('change', function() {
                        var cotval = $selected_value=$('#dTruckOV option:selected').text();
                        // Store data
                        // localStorage.setItem('cotval', cotval);
                        // Remove data
                        //localStorage.removeItem('cotval');
                        console.log(cotval);
                    });
                });



                $(document).ready(function(){
                    $('#dIdReq').on('change', function() {
                        var dIdReq = $selected_value=$('#dIdReq option:selected').text();
                        // Store data
                        // localStorage.setItem('dIdReq', dIdReq);
                        // Remove data
                        //localStorage.removeItem('dIdReq');
                        console.log(dIdReq);

                            $.ajax({
                                async: true,
                                defaut: false,
                                url: 'DSetSession.php',
                                type: 'post',
                                data: {
                                    'dIdReq': dIdReq
                                    },
                                success: function() {
                                }
                            });
                    });
                });



                
                $(document).ready(function(){
                    $('#dTruckTI').on('change', function() {
                      if ( this.value == 'Tonnage') {
                        $("#dTruckTT").show();
                        $("#dTruckTH").hide();
                        $("#dTruckTO").hide();
                        
                      } else if ( this.value == 'Height') {
                        $("#dTruckTH").show();
                        $("#dTruckTT").hide();
                        $("#dTruckTO").hide();
                      } else {
                        $("#dTruckTO").show();
                        $("#dTruckTH").hide();
                        $("#dTruckTT").hide();
                      }
                    });
                });



                $(document).ready(function(){
                    $('#dTruckTI').on('change', function() {
                      if ( this.value == 'Tonnage') {
                        $("#dTruckTT").show();
                        $("#dTruckTH").hide();
                        $("#dTruckTO").hide();
                        
                      } else if ( this.value == 'Height') {
                        $("#dTruckTH").show();
                        $("#dTruckTT").hide();
                        $("#dTruckTO").hide();
                      } else {
                        $("#dTruckTO").show();
                        $("#dTruckTH").hide();
                        $("#dTruckTT").hide();
                      }
                    });
                });
                </script>



                <script>

                        $(document).ready(function(){   
                            var dFloor = $selected_value=$('#dFloor option:selected').text();
                            // Get data
                            // var dFloor = localStorage.getItem('dFloor');
                            // console.log(dFloor);
                            if(dFloor !== "Ground") {
                            document.getElementById("dLifts").style.display = "block";
                            }
                            console.log(dLift);
                            $('#dFloor').val(dFloor);
                    });
                    
                        
                        $(document).ready(function(){   
                            var dLift = $selected_value=$('#dLiftsV option:selected').text();
                            // Get data
                            // var dLift = localStorage.getItem('dLift');        
                            // console.log(dLift);
                            $('#dLiftsV').val(dLift);
                    });


                        $(document).ready(function(){
                            var showTruckoptions = $selected_value=$('#dTruck option:selected').text();
                            //console.log(showTruckoptions);
                            if(showTruckoptions == "Yes") {
                            document.getElementById("dTruckT").style.display = "block";
                            }
                    });

                        $(document).ready(function(){
                            var dTruckoption = $selected_value=$('#dTruckTI option:selected').text();
                            // Get data
                            // var dTruckoption = localStorage.getItem('dTruckoption');
                            console.log(dTruckoption);
                            $('#dTruckTI').val(dTruckoption);

                            if(dTruckoption == "Height") {
                            document.getElementById("dTruckTH").style.display = "block";
                            $('#dTruckHV').val(dHeival);
                            }
                            
                            if(dTruckoption == "Tonnage") {
                            document.getElementById("dTruckTT").style.display = "block";
                            }

                            if(dTruckoption == "Other") {
                            document.getElementById("dTruckTO").style.display = "block";
                            $('#dTruckOV').val(cotval);
                            }
                    });

                            // var dTonval = localStorage.getItem('dTonval');
                            $('#dTruckTV').val(dTonval);
                            console.log("dTonval: " + dTonval);
                            

                            // var dHeival = localStorage.getItem('dHeival');
                            $('#dTruckHV').val(dHeival);
                            console.log("dHeival: " + dHeival);
                </script>

<?php 
    }
?>