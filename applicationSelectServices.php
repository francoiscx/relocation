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

    if(isset($_SESSION['appID'])) {
        $appID = $_SESSION['appID'];


        if(isset($_SESSION['appDetailsID'])) {
            $appDetailsID = $_SESSION['appDetailsID'];


            $sqlQuery = "SELECT * FROM app_details WHERE app_detail_id =:appDetailsID";
                $statement = $db->prepare($sqlQuery);
                $statement->execute(array(':appDetailsID' => $appDetailsID));
                
                while($row = $statement->fetch()){

                    $storage = $row['storage'];
                    $_SESSION['storage'] = $storage;

                    $pet = $row['pet'];
                    $_SESSION['pet'] = $pet;

                    $car = $row['car'];
                    $_SESSION['car'] = $car;
                    
                    $courier = $row['courier'];
                    $_SESSION['courier'] = $courier;
                    
                    $shuttle = $row['shuttle'];
                    $_SESSION['shuttle'] = $shuttle;
                    
                    $cleaning = $row['cleaning'];
                    $_SESSION['cleaning'] = $cleaning;
                    
                    $wrapping = $row['wrapping'];
                    $_SESSION['wrapping'] = $wrapping;
                    
                    $packing = $row['packing'];
                    $_SESSION['packing'] = $packing;
                    
                    $insurance = $row['insurance'];
                    $_SESSION['insurance'] = $insurance;
                }
        }
                
                include_once 'inc/required/head.php';

                                    if(isset($_POST['submit'])){



                                        if(isset($_POST['moveType'])){
                                            $relocationType = $_POST['moveType'];  // Storing Selected Value In Variable
                                            $_SESSION['relocationType'] = $relocationType;
                                        }

                                        if(isset($_POST['selectedExtra'])){
                                            unset($_SESSION['none']);
                                            unset($_SESSION['storage']);
                                            unset($_SESSION['pet']);
                                            unset($_SESSION['car']);
                                            unset($_SESSION['courier']);
                                            unset($_SESSION['shuttle']);
                                            unset($_SESSION['cleaning']);
                                            unset($_SESSION['wrapping']);
                                            unset($_SESSION['packing']);
                                            unset($_SESSION['insurance']);

                                            

                                    foreach ($_POST['selectedExtra'] as $select) {
                                        if($select == "Storage") { 
                                            $storage = 1;
                                            $_SESSION['storage'] = $storage;
                                        }

                                        if($select == "Pet Transport") { 
                                            $pet = 1;
                                            $_SESSION['pet'] = $pet;
                                        }

                                        if($select == "Car Transport") { 
                                            $car = 1;
                                            $_SESSION['car'] = $car;
                                        }

                                        if($select == "Courier Services") { 
                                            $courier = 1;
                                            $_SESSION['courier'] = $courier;
                                        }

                                        if($select == "Shuttle Services") { 
                                            $shuttle = 1;
                                            $_SESSION['shuttle'] = $shuttle;
                                        }

                                        if($select == "Cleaning Services") { 
                                            $cleaning = 1;
                                            $_SESSION['cleaning'] = $cleaning;
                                        }

                                        if($select == "Wrapping Services") { 
                                            $wrapping = 1;
                                            $_SESSION['wrapping'] = $wrapping;
                                        }

                                        if($select == "Packing services") { 
                                            $packing = 1;
                                            $_SESSION['packing'] = $packing;
                                        }

                                        if($select == "Insurance") { 
                                            $insurance = 1;
                                            $_SESSION['insurance'] = $insurance;
                                        }

                                        if($select == "No Other Services") {
                                            $none = 1;
                                            unset($_SESSION['none']);
                                            unset($_SESSION['storage']);
                                            unset($_SESSION['pet']);
                                            unset($_SESSION['car']);
                                            unset($_SESSION['courier']);
                                            unset($_SESSION['shuttle']);
                                            unset($_SESSION['cleaning']);
                                            unset($_SESSION['wrapping']);
                                            unset($_SESSION['packing']);
                                            unset($_SESSION['insurance']); 
                                            
                                            $needItem = "Please select at least one service other than Insurance<br>";   
                                               

                                            if($_SESSION['relocationType'] == "Residential" || $_SESSION['relocationType'] == "Commercial" || $_SESSION['relocationType'] == "International"){
                                                unset($needItem);
                                            }
                                            
                                    }

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
                                                                            $needItem = "Please select at least one service other than Insurance<br>";
                                                                        }
                                }
                            }
                            unset($_POST['submit']);
                            unset($_POST['moveType']);
                            unset($_POST['selectedExtra']);
                            unset($_SESSION['appDetailsID']);

                            if(!isset($needItem)) echo '
                                <script>
                                    location.replace("applicationSelectedServicesConfirmation.php")
                                </script>
                            ';
                        }
                    ?>
                
                                
                            </div>
                        </div>
                    </nav>
                  
                    <section id="appSection">    
                    <div id="backgrounddiv">
                        <div class="container">
                            <div class="row" style="margin-top:44px;">
                                <div class="col-md-12"><h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">Please Select all the<br><span style="color:#BF3838">Services</span><br/> you are interested in.</h1><p style="text-align:center; color:#4A4A4A">
                                    <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;margin: 0px 17px;"></h1>
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">

                                <center><h4>Select your requirements<br><br></h4></center>
                                <?php if(isset($needItem)) echo "<p style='color:crimson'>" . $needItem . "</p>";
                                unset($needItem);?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <select name="moveType" class="form-control" style="max-width:400px!important;" id='relocationType' name='relocationType' required="required">
                                            <option disabled value="">Select Relocation Type</option>
                                            <option value="I'm not relocating, just need something moved" <?php if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "I'm not relocating, just need something moved") echo "selected";?>>I'm not relocating, just need something moved</option>
                                            <option value="Residential" <?php if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "Residential") echo "selected";?>>Residential</option>
                                            <option value="Commercial" <?php if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "Commercial") echo "selected";?>>Commercial</option>
                                            <option value="International" <?php if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "International") echo "selected";?>>International</option>
                                        </select>
                                    </div> 
                                    

                                    <div class="form-group">
                                        <select name="selectedExtra[]" multiple class="form-control select-toggle" size="11" style="height:25%!important" required="required">
                                            <option disabled value="">Select the services you require</option>
                                            <option value="Storage" <?php if(isset($_SESSION['storage']) && $_SESSION['storage'] == "1") echo "selected";?>>Storage</option>
                                            <option value="Pet Transport" <?php if(isset($_SESSION['pet']) && $_SESSION['pet'] == "1") echo "selected";?>>Pet Transport</option>
                                            <option value="Car Transport" <?php if(isset($_SESSION['car']) && $_SESSION['car'] == "1") echo "selected";?>>Car Transport</option>
                                            <option value="Courier Services" <?php if(isset($_SESSION['courier']) && $_SESSION['courier'] == "1") echo "selected";?>>Courier Services</option>
                                            <option value="Shuttle Services" <?php if(isset($_SESSION['shuttle']) && $_SESSION['shuttle'] == "1") echo "selected";?>>Shuttle Services</option>
                                            <option value="Cleaning Services" <?php if(isset($_SESSION['cleaning']) && $_SESSION['cleaning'] == "1") echo "selected";?>>Cleaning Services</option>
                                            <option value="Wrapping Services" <?php if(isset($_SESSION['wrapping']) && $_SESSION['wrapping'] == "1") echo "selected";?>>Wrapping Services</option>
                                            <option value="Packing services" <?php if(isset($_SESSION['packing']) && $_SESSION['packing'] == "1") echo "selected";?>>Packing services</option>
                                            <option value="Insurance" <?php if(isset($_SESSION['insurance']) && $_SESSION['insurance'] == "1") echo "selected";?>>Insurance</option>
                                            <option value="No Other Services" <?php if(isset($_SESSION['none']) && $_SESSION['none'] == "1") echo "selected";?>>No Other Services</option>
                                        </select>
                                    </div>    

                                        <div class="table-responsive">
                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>

                                                            <input type="submit" id="submit" name="submit" value="Select Services" class="btn btn-block btn-success" style="float:right; max-width:265px;padding:5px 12px!important;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
        
      
      
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
