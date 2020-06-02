<style>
.removeItem {
    margin: -43px 20px 60px 0px!important;
    float:right;
    color: crimson;
}

    h1.text-center.aos-init.aos-animate {
        color: white;
    }

    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
        width: 100%;
    }

    button.btn.dropdown-toggle.bs-placeholder.btn-light {
        min-height: 40px;
    }

    .container {
        margin-top: 100px;
    }
    </style>

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';


$tranLoc = "inv";

require_once 'inc/required/detect.php';

    if (Detect::isComputer()) { //browser reported as PC or Mac
        $notmobile = 101;
        if(isset($notmobile)) {
            $_SESSION['notmobile'] = 1;
            unset($_SESSION['mobile']);
        }
    } else { //browser reported as mobile device
        $mobile = 101;
        if(isset($mobile)) {
            $_SESSION['mobile'] = 1;
            unset($_SESSION['notmible']);
        }
    }

if(isset($_SESSION['mobile'])) {
    $mobile = 1;
} else {
    unset($mobile);
}


 if(isset($_SESSION['appID'])) {
        $appID = $_SESSION['appID'];
 }
?>

<style>
i.icon.ion-social-facebook {
    padding: 1px;
}

i.icon.ion-social-twitter {
    padding: 1px;
}

i.icon.ion-social-instagram {
    padding: 1px;
}

.wrapper { 
    border: 2px solid #545b62;
    border-radius: 8px;
    overflow: hidden;
    width: 80%;
}

.wrapper div {
   min-height: 200px;
   padding: 10px;
}
#from {
  background-color: white;
  float:left; 
  margin-right:20px;
  width:50%;
  border-right:2px solid #545b62;
}
#too { 
  background-color: white;
  overflow:hidden;
}

@media screen and (max-width: 400px) {
   #from { 
    float: none;
    margin-right:0;
    width:auto;
    border:0;
    border-bottom:2px solid #545b62;    
  }

  .wrapper { 
    width: 100%;
    }
}
</style>


<?php include 'inc/required/head.php';

if(isset($_POST['submit'])){

if(isset($_POST['ConfirmChanges'])){
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
    
}

if(($_SESSION['relocationType'] == "Other") &&
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
                        unset($_SESSION['appDetailID']);

                        if(!isset($needItem)) echo '
                        <script>
                            location.replace("applicationReview.php#services")
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
            <div class="col-md-12"><h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">Please review your application for your<br><span style="color:crimson"><?php echo $_SESSION['relocationType'];?> Moving Requirements</span><br/>then submit it to receive your <span style="color:crimson">Quotations</span> </h1><p style="text-align:center; color:#4A4A4A">
<!--    This is a short and straight to the point sub-headline talking about your application page!
-->           <br/></p>
                    <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large; margin: 0px 17px;"></h1></div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <form method="post" action="">

                    <div class="outer">
<center>                                         
<?php echo'Please contact me <b>' . $_SESSION['appName'] . ' ' . $_SESSION['appSurname'] . '</b> via email at <a href="' . $_SESSION['appEmail'] . '"><b>' . $_SESSION['appEmail'] . '</b></a>' . '<br><br> Alternatively you may also contact me on <b><a href="tel:' . $_SESSION['appCell'] . '">' . $_SESSION['appCell'] . '</a></b> for further information.<br><br> In the unlikely event where you can not get hold of me,<br>and where it is urgent to do so you may contact me on <b><a href="tel:' . $_SESSION['appWork'] . '">' . $_SESSION['appWork'] . '</a></b>.<br><br>
This submission is done by me in order to request quotations for a <b>' . $_SESSION['relocationType'] . ' move </b>with details as follow:
<br><br>

<div class="wrapper">
    <div id="from"><h4>Collection Address </h4>';
    if(isset($_SESSION['cApUnNr']) && ($_SESSION['cApUnNr'] != "0")) {
        echo $_SESSION['cApUnNr'] . ' '; 
    }
    if(isset($_SESSION['cApUnName']) && ($_SESSION['cApUnName'] != "0")) {
        echo $_SESSION['cApUnName'] . '<br>'; 
    }
    if(isset($_SESSION['cHouseNum'])) {
        echo $_SESSION['cHouseNum'] . ' '; 
    }
    if(isset($_SESSION['cAdr'])) {
        echo $_SESSION['cAdr'] . ' '; 
    }
    if(isset($_SESSION['cArea']) && ($_SESSION['cArea'] != "0")) {
        echo ", " . $_SESSION['cArea'] . '<br>'; 
    }
    if(isset($_SESSION['cCity'])) {
        echo $_SESSION['cCity'] . ', '; 
    }
    if(isset($_SESSION['cProvince'])) {
        echo $_SESSION['cProvince'] . '<br>'; 
    }
    if(isset($_SESSION['cCountry'])) {
        echo $_SESSION['cCountry'] . '<br><br>'; 
    }
    echo'The property particulars is as follow:<br>';
    
    if(isset($_SESSION['cFloor'])) {
        echo 'Floor: ';    
            if($_SESSION['cFloor'] ==  'ground') echo "Ground" . '<br>'; 
            if($_SESSION['cFloor'] ==  1) echo "1st" . '<br>'; 
            if($_SESSION['cFloor'] ==  2) echo "2nd" . '<br>'; 
            if($_SESSION['cFloor'] ==  3) echo "3rd" . '<br>'; 
            if($_SESSION['cFloor'] ==  4) echo "4th" . '<br>'; 
            if($_SESSION['cFloor'] ==  5) echo "5th" . '<br>'; 
            if($_SESSION['cFloor'] ==  6) echo "6th" . '<br>'; 
            if($_SESSION['cFloor'] ==  7) echo "7th" . '<br>';
            if($_SESSION['cFloor'] ==  8) echo "8th" . '<br>'; 
            if($_SESSION['cFloor'] ==  9) echo "9th" . '<br>'; 
            if($_SESSION['cFloor'] ==  10) echo "10th" . '<br>'; 
            if($_SESSION['cFloor'] ==  11) echo "11th" . '<br>'; 
            if($_SESSION['cFloor'] ==  12) echo "12th" . '<br>'; 
            if($_SESSION['cFloor'] ==  13) echo "13th" . '<br>'; 
            if($_SESSION['cFloor'] ==  14) echo "14th" . '<br>'; 
            if($_SESSION['cFloor'] ==  15) echo "15th" . '<br>'; 
            if($_SESSION['cFloor'] ==  16) echo "16th" . '<br>'; 
            if($_SESSION['cFloor'] ==  17) echo "17th" . '<br>'; 
            if($_SESSION['cFloor'] ==  18) echo "18th" . '<br>'; 
            if($_SESSION['cFloor'] ==  19) echo "19th" . '<br>'; 
            if($_SESSION['cFloor'] ==  20) echo "20th" . '<br>'; 
            if($_SESSION['cFloor'] ==  21) echo "21st" . '<br>'; 
            if($_SESSION['cFloor'] ==  22) echo "22nd" . '<br>'; 
            if($_SESSION['cFloor'] ==  23) echo "23rd" . '<br>'; 
            if($_SESSION['cFloor'] ==  24) echo "24th" . '<br>'; 
            if($_SESSION['cFloor'] ==  25) echo "25th" . '<br>'; 
            if($_SESSION['cFloor'] ==  26) echo "26th" . '<br>'; 
            if($_SESSION['cFloor'] ==  27) echo "27th" . '<br>'; 
            if($_SESSION['cFloor'] ==  28) echo "28th" . '<br>'; 
            if($_SESSION['cFloor'] ==  29) echo "29th" . '<br>'; 
            if($_SESSION['cFloor'] ==  30) echo "30th" . '<br>'; 
            if($_SESSION['cFloor'] ==  31) echo "31st" . '<br>'; 
            if($_SESSION['cFloor'] ==  32) echo "32nd" . '<br>'; 
            if($_SESSION['cFloor'] ==  33) echo "33rd" . '<br>'; 
            if($_SESSION['cFloor'] ==  34) echo "34th" . '<br>'; 
        } 
 if($_SESSION['cFloor'] == 'ground') {$_SESSION['cLiftsV'] = "";}


    if(isset($_SESSION['cLiftsV']) && $_SESSION['cLiftsV'] != "") {
        echo 'Lifts: ' . $_SESSION['cLiftsV'] . '<br>'; 
    }
    if(isset($_SESSION['cTruck']) && ($_SESSION['cTruck'] == "No")) {
    echo 'Truck Restrictions: ' . $_SESSION['cTruck'] . '<br>'; 
    }

    if(isset($_SESSION['cTruck'])) {
        if($_SESSION['cTruck'] == "Yes"){
            if($_SESSION['cTruckTI'] == "Tonnage") {
                echo 'Truck Restrictions: ' . $_SESSION['cTruckTI'] . ' - ' . $_SESSION['cTruckTV'] . '<br>';
            } else if($_SESSION['cTruckTI'] == "Height"){
                echo 'Truck Restrictions: ' . $_SESSION['cTruckTI'] . ' - ' . $_SESSION['cTruckHV'] . '<br>';
            }
        } 
    }

    
    if(isset($_SESSION['cIdReq'])) {
    echo 'ID\'s Required: ' . $_SESSION['cIdReq'] . '<br>'; 
    }






    echo '</div>
    <div id="too"><h4>Delivery Address </h4>';
    if(isset($_SESSION['dApUnNr']) && ($_SESSION['dApUnNr'] != "0")) {
        echo $_SESSION['dApUnNr'] . ' '; 
    }
    if(isset($_SESSION['dApUnName']) && ($_SESSION['dApUnName'] != "0")) {
        echo $_SESSION['dApUnName'] . '<br>'; 
    }
    if(isset($_SESSION['dHouseNum'])) {
        echo $_SESSION['dHouseNum'] . ' '; 
    }
    if(isset($_SESSION['dAdr'])) {
        echo $_SESSION['dAdr'] . ' '; 
    }
    if(isset($_SESSION['dArea']) && ($_SESSION['dArea'] != "0")) {
        echo ", " . $_SESSION['dArea'] . '<br>'; 
    }
    if(isset($_SESSION['dCity'])) {
        echo $_SESSION['dCity'] . ', '; 
    }
    if(isset($_SESSION['dProvince'])) {
        echo $_SESSION['dProvince'] . '<br>'; 
    }
    if(isset($_SESSION['dCountry'])) {
        echo $_SESSION['dCountry'] . '<br><br>'; 
    }
    echo'The property particulars is as follow:<br>';
    
    if(isset($_SESSION['dFloor'])) {
        echo 'Floor: ';    
            if($_SESSION['dFloor'] ==  'ground') echo "Ground" . '<br>'; 
            if($_SESSION['dFloor'] ==  1) echo "1st" . '<br>'; 
            if($_SESSION['dFloor'] ==  2) echo "2nd" . '<br>'; 
            if($_SESSION['dFloor'] ==  3) echo "3rd" . '<br>'; 
            if($_SESSION['dFloor'] ==  4) echo "4th" . '<br>'; 
            if($_SESSION['dFloor'] ==  5) echo "5th" . '<br>'; 
            if($_SESSION['dFloor'] ==  6) echo "6th" . '<br>'; 
            if($_SESSION['dFloor'] ==  7) echo "7th" . '<br>'; 
            if($_SESSION['dFloor'] ==  8) echo "8th" . '<br>'; 
            if($_SESSION['dFloor'] ==  9) echo "9th" . '<br>'; 
            if($_SESSION['dFloor'] ==  10) echo "10th" . '<br>'; 
            if($_SESSION['dFloor'] ==  11) echo "11th" . '<br>'; 
            if($_SESSION['dFloor'] ==  12) echo "12th" . '<br>'; 
            if($_SESSION['dFloor'] ==  13) echo "13th" . '<br>'; 
            if($_SESSION['dFloor'] ==  14) echo "14th" . '<br>'; 
            if($_SESSION['dFloor'] ==  15) echo "15th" . '<br>'; 
            if($_SESSION['dFloor'] ==  16) echo "16th" . '<br>'; 
            if($_SESSION['dFloor'] ==  17) echo "17th" . '<br>'; 
            if($_SESSION['dFloor'] ==  18) echo "18th" . '<br>'; 
            if($_SESSION['dFloor'] ==  19) echo "19th" . '<br>'; 
            if($_SESSION['dFloor'] ==  20) echo "20th" . '<br>'; 
            if($_SESSION['dFloor'] ==  21) echo "21st" . '<br>'; 
            if($_SESSION['dFloor'] ==  22) echo "22nd" . '<br>'; 
            if($_SESSION['dFloor'] ==  23) echo "23rd" . '<br>'; 
            if($_SESSION['dFloor'] ==  24) echo "24th" . '<br>'; 
            if($_SESSION['dFloor'] ==  25) echo "25th" . '<br>'; 
            if($_SESSION['dFloor'] ==  26) echo "26th" . '<br>'; 
            if($_SESSION['dFloor'] ==  27) echo "27th" . '<br>'; 
            if($_SESSION['dFloor'] ==  28) echo "28th" . '<br>'; 
            if($_SESSION['dFloor'] ==  29) echo "29th" . '<br>'; 
            if($_SESSION['dFloor'] ==  30) echo "30th" . '<br>'; 
            if($_SESSION['dFloor'] ==  31) echo "31st" . '<br>'; 
            if($_SESSION['dFloor'] ==  32) echo "32nd" . '<br>'; 
            if($_SESSION['dFloor'] ==  33) echo "33rd" . '<br>'; 
            if($_SESSION['dFloor'] ==  34) echo "34th" . '<br>'; 
     }


     if($_SESSION['dFloor'] == 'ground') {$_SESSION['dLiftsV'] = "";}

     if(isset($_SESSION['dLiftsV']) && $_SESSION['dLiftsV'] != "") {
        echo 'Lifts: ' . $_SESSION['dLiftsV'] . '<br>'; 
    }

    if(isset($_SESSION['dTruck']) && ($_SESSION['dTruck'] == "No")) {
    echo 'Truck Restrictions: ' . $_SESSION['dTruck'] . '<br>'; 
    }

    if(isset($_SESSION['dTruck'])) {
        if($_SESSION['dTruck'] == "Yes"){
            if($_SESSION['dTruckTI'] == "Tonnage") {
                echo 'Truck Restrictions: ' . $_SESSION['dTruckTI'] . ' - ' . $_SESSION['dTruckTV'] . '<br>';
            } else if($_SESSION['dTruckTI'] == "Height"){
                echo 'Truck Restrictions: ' . $_SESSION['dTruckTI'] . ' - ' . $_SESSION['dTruckHV'] . '<br>';
            }
        } 
    }

    
    if(isset($_SESSION['dIdReq'])) {
    echo 'ID\'s Required: ' . $_SESSION['dIdReq'] . '<br>'; 
    }
    ?>
    </div>
</div>
<br><br>
<section id="services">
<h3>The Highlighted items will be quoted on.<br></h3>

<p>Add and remove before submitting, should you still want to make changes.</p>
<br>

            <div class="row">
                    <div class="col-3">
                    </div>

                    <div class="col-6">    
                    
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">

                                        <?php if(isset($needItem)) echo "<p style='color:crimson'>" . $needItem . "</p>";
                                        unset($needItem);?>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <select name="moveType" class="form-control" id='relocationType' name='relocationType' required="required">
                                                    <option disabled value="">Select Relocation Type</option>
                                                    <option disabled value="Other" <?php if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "Other") echo "selected";?>>I'm not relocating, just need something moved</option>
                                                    <option disabled value="Residential" <?php if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "Residential") echo "selected";?>>Residential</option>
                                                    <option disabled value="Commercial" <?php if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "Commercial") echo "selected";?>>Commercial</option>
                                                    <option disabled value="International" <?php if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "International") echo "selected";?>>International</option>
                                                </select>
                                            </div> 
                                            

                                            <div class="form-group">
                                                <select name="selectedExtra[]" multiple class="form-control select-toggle" size="11" style="height:25%!important" required="required">
                                                    <option disabled value="">Select the services you require</option>
                                                    <option disabeled value="Storage" <?php if(isset($_SESSION['storage']) && $_SESSION['storage'] == "1") echo "selected";?>>Storage</option>
                                                    <option disabeled value="Pet Transport" <?php if(isset($_SESSION['pet']) && $_SESSION['pet'] == "1") echo "selected";?>>Pet Transport</option>
                                                    <option disabeled value="Car Transport" <?php if(isset($_SESSION['car']) && $_SESSION['car'] == "1") echo "selected";?>>Car Transport</option>
                                                    <option disabeled value="Courier Services" <?php if(isset($_SESSION['courier']) && $_SESSION['courier'] == "1") echo "selected";?>>Courier Services</option>
                                                    <option disabeled value="Shuttle Services" <?php if(isset($_SESSION['shuttle']) && $_SESSION['shuttle'] == "1") echo "selected";?>>Shuttle Services</option>
                                                    <option disabeled value="Cleaning Services" <?php if(isset($_SESSION['cleaning']) && $_SESSION['cleaning'] == "1") echo "selected";?>>Cleaning Services</option>
                                                    <option disabeled value="Wrapping Services" <?php if(isset($_SESSION['wrapping']) && $_SESSION['wrapping'] == "1") echo "selected";?>>Wrapping Services</option>
                                                    <option disabeled value="Packing services" <?php if(isset($_SESSION['packing']) && $_SESSION['packing'] == "1") echo "selected";?>>Packing services</option>
                                                    <option disabeled value="Insurance" <?php if(isset($_SESSION['insurance']) && $_SESSION['insurance'] == "1") echo "selected";?>>Insurance</option>
                                                    <option disabeled value="No Other Services" <?php if(isset($_SESSION['none']) && $_SESSION['none'] == "1") echo "selected";?>>No Other Services</option>
                                                </select>
                                            </div>    

                                        <div class="table-responsive">
                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <a href="applicationSelectServices.php"><button class="btn btn-primary" type="button" style="width:100%">Make Changes to Application!</button></a>
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
                </div>
                </section>
<br><br><br>


<script>
function goBack() {
  window.history.back();
}
</script>
<a href="applicationSubmit.php"><button class="btn btn-primary" id="submApp" name="submApp" type="button" style="float:right">Submit to get Quotes Now!</button></a>

</center>  

                              


                                   
                                
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>






<?php include_once 'inc/required/footer.php';?>

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