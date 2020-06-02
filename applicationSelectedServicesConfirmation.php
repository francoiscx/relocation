<?php 
$page = "Select Services";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';

$tranLoc = "services";

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

    if(isset($_SESSION['appDetailID'])) unset($_SESSION['appDetailID']);
    if(isset($_SESSION['hasRecord'])) unset($_SESSION['hasRecord']);

    if(isset($_SESSION['appID'])) {

        $appID = $_SESSION['appID'];
                    
                include_once 'inc/required/head.php';
                ?>
                
                                
                            </div>
                        </div>
                    </nav>
                  
                    <section id="appSection">    
                    <div id="backgrounddiv">
                        <div class="container">
                            <div class="row" style="margin-top:44px;">
                                <div class="col-md-12">
                                    <center><h4>
                                        <?php
                                                // SET THE TOP HEADDER "PLEASE CONFIRM..." OR "REGRESTFULLY..."
                                                if(($_SESSION['relocationType'] == "I'm not relocating, just need something moved") &&
                                                !isset($_SESSION['storage']) &&
                                                !isset($_SESSION['storage']) &&
                                                !isset($_SESSION['pet']) &&
                                                !isset($_SESSION['car']) &&
                                                !isset($_SESSION['courier']) &&
                                                !isset($_SESSION['shuttle']) &&
                                                !isset($_SESSION['cleaning']) &&
                                                !isset($_SESSION['wrapping']) &&
                                                !isset($_SESSION['packing']) &&
                                                isset($_SESSION['insurance'] )) { 
                                                    echo '<h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800"><span style="color:#BF3838">Regretfully </span>this is not valid.</h1><p style="text-align:center; color:#4A4A4A">
                                                        <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;margin: 0px 17px;"></h1>';
                                                    
                                            } else { 
                                                echo '<h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">Please <span style="color:#BF3838">Confirm </span>the services<br>you want to receive quotations for.</h1><p style="text-align:center; color:#4A4A4A">
                                                    <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;margin: 0px 17px;"></h1>';
                                            }
                                        ?>
                                
                                    </h4></center>
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                <center><h4>


                                <?php
                                    // SET THE secondary HEADDER "Are you sure..." OR "Can not help..."
                                    if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "I'm not relocating, just need something moved") &&
                                    !isset($_SESSION['storage']) &&
                                    !isset($_SESSION['storage']) &&
                                    !isset($_SESSION['pet']) &&
                                    !isset($_SESSION['car']) &&
                                    !isset($_SESSION['courier']) &&
                                    !isset($_SESSION['shuttle']) &&
                                    !isset($_SESSION['cleaning']) &&
                                    !isset($_SESSION['wrapping']) &&
                                    !isset($_SESSION['packing']) &&
                                    isset($_SESSION['insurance'] )) { echo '
                                        We can not help<br><br>';
                                    } else {
                                        echo ' Are you sure you want to receive quotations for the following<br><br>';
                                    }?>

                                </h4></center>
                                
                                <?php
                                // "Relocation type" or "No relocation, other..."
                                if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "I'm not relocating, just need something moved")) {
                                    
                                    // "Insurance only ___ We only offer..." or "No relocation, only..."
                                    if(!isset($_SESSION['storage']) &&
                                    !isset($_SESSION['storage']) &&
                                    !isset($_SESSION['pet']) &&
                                    !isset($_SESSION['car']) &&
                                    !isset($_SESSION['courier']) &&
                                    !isset($_SESSION['shuttle']) &&
                                    !isset($_SESSION['cleaning']) &&
                                    !isset($_SESSION['wrapping']) &&
                                    !isset($_SESSION['packing']) &&
                                    isset($_SESSION['insurance'])) {

                                    echo '<p>We only offer insurance quotations on items that is being moved by our partners</p>';

                                    } else {
                                    
                                    echo '
                                    No Relocation, only:

                                <ul>';
                               
                                    if(isset($_SESSION['storage'])) echo '<li>Storage</li>';
                                    if(isset($_SESSION['pet'])) echo '<li>Pet Transport</li>';
                                    if(isset($_SESSION['car'])) echo '<li>Car Transport</li>';
                                    if(isset($_SESSION['courier'])) echo '<li>Courier Services</li>';
                                    if(isset($_SESSION['shuttle'])) echo '<li>Shuttle Services</li>';
                                    if(isset($_SESSION['cleaning'])) echo '<li>Cleaning Services</li>';
                                    if(isset($_SESSION['wrapping'])) echo '<li>Wrapping Services</li>';
                                    if(isset($_SESSION['packing'])) echo '<li>Packing services</li>';
                                    if(isset($_SESSION['insurance'])) echo '<li>Insurance</li>'; 

                               echo ' </ul>
                                    ';}
                                } else { 
                                    // RESIDENTIAL
                                    if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "Residential")) { 
                                        // RESIDENTIAL WITH SERVICES
                                        if(isset($_SESSION['storage']) ||
                                            isset($_SESSION['pet']) ||
                                            isset($_SESSION['car']) ||
                                            isset($_SESSION['courier']) ||
                                            isset($_SESSION['shuttle']) ||
                                            isset($_SESSION['cleaning']) ||
                                            isset($_SESSION['wrapping']) ||
                                            isset($_SESSION['packing']) ||
                                            isset($_SESSION['insurance'])) {
                                        echo '<p>Residential Relocation within South Africa with added services:</p>

                                        <ul>';

                                    if(isset($_SESSION['storage'])) echo '<li>Storage</li>';
                                    if(isset($_SESSION['pet'])) echo '<li>Pet Transport</li>';
                                    if(isset($_SESSION['car'])) echo '<li>Car Transport</li>';
                                    if(isset($_SESSION['courier'])) echo '<li>Courier Services</li>';
                                    if(isset($_SESSION['shuttle'])) echo '<li>Shuttle Services</li>';
                                    if(isset($_SESSION['cleaning'])) echo '<li>Cleaning Services</li>';
                                    if(isset($_SESSION['wrapping'])) echo '<li>Wrapping Services</li>';
                                    if(isset($_SESSION['packing'])) echo '<li>Packing services</li>';
                                    if(isset($_SESSION['insurance'])) echo '<li>Insurance</li>';

                                echo ' </ul>
                                    ';
                                } else {
                                    // RESIDENTIAL WITHOUT FURTHER SERVICES
                                    echo '<p>Residential Relocation within South Africa only.<br>
                                    No additional services required.
                                    </p>
                                    ';
                                }
                            }
                                    // COMMERCIAL
                                    if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "Commercial")) { 
                                        // COMMERCIAL WITH SERVICES       
                                        if(isset($_SESSION['storage']) ||
                                        isset($_SESSION['storage']) ||
                                        isset($_SESSION['pet']) ||
                                        isset($_SESSION['car']) ||
                                        isset($_SESSION['courier']) ||
                                        isset($_SESSION['shuttle']) ||
                                        isset($_SESSION['cleaning']) ||
                                        isset($_SESSION['wrapping']) ||
                                        isset($_SESSION['packing']) ||
                                        isset($_SESSION['insurance'])) {
                                        echo '<p>Commercial Relocation within South Africa with added services:</p>

                                        <ul>';

                                    if(isset($_SESSION['storage'])) echo '<li>Storage</li>';
                                    if(isset($_SESSION['pet'])) echo '<li>Pet Transport</li>';
                                    if(isset($_SESSION['car'])) echo '<li>Car Transport</li>';
                                    if(isset($_SESSION['courier'])) echo '<li>Courier Services</li>';
                                    if(isset($_SESSION['shuttle'])) echo '<li>Shuttle Services</li>';
                                    if(isset($_SESSION['cleaning'])) echo '<li>Cleaning Services</li>';
                                    if(isset($_SESSION['wrapping'])) echo '<li>Wrapping Services</li>';
                                    if(isset($_SESSION['packing'])) echo '<li>Packing services</li>';
                                    if(isset($_SESSION['insurance'])) echo '<li>Insurance</li>';

                                echo ' </ul>
                                    ';
                                } else {
                                    // COMMERCIAL WITHOUT FURTHER SERVICES
                                    echo '<p>Commercial Relocation within South Africa only.<br>
                                    No additional services required.
                                    </p>
                                    ';
                                }
                            }
                            // INTERNATIONAL
                            if(isset($_SESSION['relocationType']) && ($_SESSION['relocationType'] == "International")) {
                                // INTERNATIONAL with services   
                                if(isset($_SESSION['storage']) ||
                                isset($_SESSION['storage']) ||
                                isset($_SESSION['pet']) ||
                                isset($_SESSION['car']) ||
                                isset($_SESSION['courier']) ||
                                isset($_SESSION['shuttle']) ||
                                isset($_SESSION['cleaning']) ||
                                isset($_SESSION['wrapping']) ||
                                isset($_SESSION['packing']) ||
                                isset($_SESSION['insurance'])) {
                                echo '<p>International Relocation from South Africa to abroad with added services:</p>

                            <ul>';
                                if(isset($_SESSION['storage'])) echo '<li>Storage</li>';
                                if(isset($_SESSION['pet'])) echo '<li>Pet Transport</li>';
                                if(isset($_SESSION['car'])) echo '<li>Car Transport</li>';
                                if(isset($_SESSION['courier'])) echo '<li>Courier Services</li>';
                                if(isset($_SESSION['shuttle'])) echo '<li>Shuttle Services</li>';
                                if(isset($_SESSION['cleaning'])) echo '<li>Cleaning Services</li>';
                                if(isset($_SESSION['wrapping'])) echo '<li>Wrapping Services</li>';
                                if(isset($_SESSION['packing'])) echo '<li>Packing services</li>';
                                if(isset($_SESSION['insurance'])) echo '<li>Insurance</li>';
                            echo ' </ul>
                            ';
                        } else {
                            // INTERNATIONAL without further services   
                            echo '<p>International Relocation from South Africa to abroad only.<br>
                            No additional services required.
                            </p>
                            ';
                        }
                    }
                }
            ?>                       
                                
                                    <form action="#" method="post">
                                        <?php
                                        $relocationType = $_SESSION['relocationType'];
                                        if(isset($_POST['confirm'])) {

                                            if(isset($_SESSION['storage'])) {$storage = 1;} else {$storage = 0;}
                                            if(isset($_SESSION['pet'])) {$pet = 1;} else {$pet = 0;}
                                            if(isset($_SESSION['car'])) {$car = 1;} else {$car = 0;}
                                            if(isset($_SESSION['courier'])) {$courier = 1;} else {$courier = 0;}
                                            if(isset($_SESSION['shuttle'])) {$shuttle = 1;} else {$shuttle = 0;}
                                            if(isset($_SESSION['cleaning'])) {$cleaning = 1;} else {$cleaning = 0;}
                                            if(isset($_SESSION['wrapping'])) {$wrapping = 1;} else {$wrapping = 0;}
                                            if(isset($_SESSION['packing'])) {$packing = 1;} else {$packing = 0;}
                                            if(isset($_SESSION['insurance'])) {$insurance = 1;} else {$insurance = 0;}

                                            
                                                if(denyDuplicateAT($db, $appID, $relocationType)){

                                                    if(isset($_SESSION['hasRecord'])) {} else {
                                                        $appDetailID = $_SESSION['appDetailsID']; // Update

                                                        //SQL statement to update info
                                                        $sqlUpdate = "UPDATE app_details SET storage =:storage, pet =:pet, car =:car, courier =:courier, shuttle =:shuttle, cleaning =:cleaning, wrapping =:wrapping, packing =:packing, insurance =:insurance WHERE app_detail_id =:appDetailID ";
                                                        $statement = $db->prepare($sqlUpdate);
                                                        $statement->execute(array(':storage' => $storage, ':pet' => $pet, ':car' => $car, ':courier' => $courier, ':shuttle' => $shuttle, ':cleaning' => $cleaning, ':wrapping' => $wrapping, ':packing' => $packing, ':insurance' => $insurance, 'appDetailID' => $appDetailID));

                                                        if(isset($appDetailID)) {
                                                            echo '<script>
                                                                    location.replace("./applicationCol.php");
                                                                </script>';
                                                        } 

                                                    }
                                                } else {
                                                    if(!isset($_SESSION['hasRecord'])) {

                                                                //SQL statement to insert info as new entery
                                                                $sqlInsert = "INSERT INTO app_details(applicant_id, app_type, storage, pet, car, courier, shuttle, cleaning, wrapping, packing, insurance)
                                                                            VALUES(:appID, :relocationType, :storage, :pet, :car, :courier, :shuttle, :cleaning, :wrapping, :packing, :insurance)";
                                                                $statement = $db->prepare($sqlInsert);
                                                                $statement->execute(array(':appID' => $appID, ':relocationType' => $relocationType, ':storage' => $storage , ':pet' => $pet , ':car' => $car, ':courier' => $courier, ':shuttle' => $shuttle, ':cleaning' => $cleaning, ':wrapping' => $wrapping, ':packing' => $packing, ':insurance' => $insurance));
                                                                
                                                                //check if one new row was created
                                                                if($statement->rowCount() == 1){                        
                                                                        //check for userID in database
                                                                        $sqlQuery = "SELECT * FROM app_details WHERE applicant_id =:appID AND app_type =:relocationType";
                                                                        $statement = $db->prepare($sqlQuery);
                                                                        $statement->execute(array(':appID' => $appID, ':relocationType' => $relocationType));
                                                                        
                                                                        while($row = $statement->fetch()){
                                                                            $appDetailID = $row['app_detail_id'];
                                                                            $_SESSION['appDetailID'] = $appDetailID;
                                                                            }

                                                                        if(isset($appDetailID)) {
                                                                            echo '<script>
                                                                                    location.replace("./applicationCol.php");
                                                                                </script>';
                                                                        } 
                                                                }


                        } else {}
                    }
            }
            ?>

            <div class="table-responsive">
                <table class="table">

                    <tbody>
                        <tr>
                            <td>
                                <div>

                                    <?php
                                        if(($_SESSION['relocationType'] == "I'm not relocating, just need something moved") &&
                                            !isset($_SESSION['storage']) &&
                                            !isset($_SESSION['storage']) &&
                                            !isset($_SESSION['pet']) &&
                                            !isset($_SESSION['car']) &&
                                            !isset($_SESSION['courier']) &&
                                            !isset($_SESSION['shuttle']) &&
                                            !isset($_SESSION['cleaning']) &&
                                            !isset($_SESSION['wrapping']) &&
                                            !isset($_SESSION['packing']) &&
                                            isset($_SESSION['insurance'] )) {} else { 
                                                echo '<input type="submit" id="confirm" name="confirm" value="Confirm Services" class="btn btn-block btn-success" style="float:right; max-width:265px;padding:5px 12px!important;">';
                                            }                    
                                    ?>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </form> 
                                    <button onclick="reselect()">Reselect</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                
                <script>
                function reselect() {
                    location.replace("./applicationSelectServices.php");
                    }
                </script>
      
      
      <script type="text/javascript">
                $(document).ready(function() {
                    $('.select-toggle').each(function(){    
                        var select = $(this), values = {};    
                        $('option',select).each(function(i, option){
                            values[option.value] = option.selected;        
                        }).click(function(event){        
                            values[this.value] = !values[this.value];
                            $('option',select).each(function(i, option){            
                                option.selected = values[option.value];        
                            });    
                        });
                    });
                });
            </script>
                <?php include_once 'inc/required/footer.php';
    }
?>
