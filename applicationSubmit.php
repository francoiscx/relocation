<?php 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';

unset($_POST['submApp']);


if(isset($_POST['submitRequestBtn'])) {
    echo '
    <script>
    window.location = "index.php";
  </script>'
;
}

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

if(isset($_SESSION['mobile'])) {$mobile = 1;} else {unset($mobile);
}


 if(isset($_SESSION['appID'])) {
        $appID = $_SESSION['appID'];
 }

 if($_SESSION['relocationType'] != "I'm not relocating, just need something moved") {
    $relacationType = $_SESSION['relocationType'];
} else {
    $relacationType = "Non-Relocation";
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

<?php
if(!isset($emailSent)){
include 'inc/required/head.php';
include_once 'phpmailer/mail_sender/emailReq.php';
include_once 'phpmailer/mail_sender/emailReqToClient.php';
$emailSent = 1;
}
?>

            </div>
        </div>
    </nav>
  
    <section id="appSection">    
    <div id="backgrounddiv">
        <div class="container">
            <div class="row" style="margin-top:44px;">
                <div class="col-md-12"><h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">Thank you for submitting your<br><span style="color:crimson"><?php echo $_SESSION['relocationType'];?> Moving Requirements</span><br/>you will soon start to receive your <span style="color:crimson">Quotations</span> </h1><p style="text-align:center; color:#4A4A4A">
                    <br/></p>
                    <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;"></h1></div>
                </div>
            </div>

        <form method="get" action="files/relocationStationInventory.xlsx">
        <?php
        if(isset($_SESSION['relocationType'])){
            if($_SESSION['relocationType'] == "Commercial"){
            echo '<a href="files/relocationStationInventory.xlsx"><button class="btn btn-primary" style="float:right" type="submit">Download Commercial Inventory List!</button></a>';
            }
            if($_SESSION['relocationType'] == "Residential"){
                echo '<a href="files/relocationStationInventory.xlsx"><button class="btn btn-primary" style="float:right" type="submit">Download Residential Inventory List!</button></a>';
            }
            if($_SESSION['relocationType'] == "International"){
                echo '<a href="files/relocationStationInventory.xlsx"><button class="btn btn-primary" style="float:right" type="submit">Download International Inventory List!</button></a>';
            }
        }
        ?>
        </form>
        
        <br><br>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <form method="post" action="">
                    <div class="outer">
<center>                                         

<?php 
echo "<h4>Hi " . $_SESSION['appName'] . "!</h4>
Thank you for submitting your " . $_SESSION['relocationType'] . " Moving Quotation Request through the Relocation Station.
<br> We received your request and you can expect communication from our partners soon.
<br><br>
Thanks again for using the Relocation Station.<br>

Kind regards
Relocation Station Team"
?>
<br><br>
<button id="submitRequestBtn" name="submitRequestBtn" class="btn btn-primary" type="submit">Back to website!</button>
</center>  
              
                            </div>
                    </form>
                </div>
 
</section>
            </div>
        </div>
    </div>
</div>

<?php include_once 'inc/required/footer.php';?>