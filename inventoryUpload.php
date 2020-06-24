<?php
if(isset($uploadLink)) {
    $accountID = 1;

    $sqlQuery = "SELECT * FROM account WHERE accountID = :accountID";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':accountID' => 1));

      while($row = $statement->fetch()){

        $cloudinaryName = $row['cloudinary_name'];
        if(isset($cloudinaryName)) {$_SESSION['cloudinaryName'] = $cloudinaryName;}
        
        $cloudinaryKey = $row['cloudinary_key'];
        if(isset($cloudinaryKey)) {$_SESSION['cloudinaryKey'] = $cloudinaryKey;}

        $cloudinarySecret = $row['cloudinary_secret'];    
        if(isset($cloudinarySecret)) {$_SESSION['cloudinarySecret'] = $cloudinarySecret;}

      }
  }
  ?>

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

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sqlQuery = "SELECT * FROM app_details LEFT JOIN applicants ON app_details.applicant_id = applicants.applicant_id WHERE inventoryUploadLink =:inventoryUploadLink ";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':inventoryUploadLink' => $id));
    
    while($row = $statement->fetch()){
    $appID = $row['applicant_id'];
    $_SESSION['appID'] = $appID;

    $relocationType = $row['app_type'];
    $_SESSION['relocationType'] = $relocationType;

    $appName = $row['applicant_name'];
    $_SESSION['appName'] = $appName;

    $appSurname = $row['applicant_surname'];
    $_SESSION['appSurname'] = $appSurname;

    
    }
}

$returnLink = '/inventoryUpload.php?id=' . $id;
?>

            </div>
        </div>
    </nav>
  
    <section id="appSection">    
    <div id="backgrounddiv">
        <div class="container">
            <div class="row" style="margin-top:44px;">
            <div class="col-md-12"><h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">Please upload your inventory for your<br><span style="color:crimson"><?php echo $_SESSION['relocationType'];?> Moving Requirements</span><br/>
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
        <?php echo '<b>Hi ' . $_SESSION['appName'] . ' ' . $_SESSION['appSurname'] . '<br><br> Please ensure that you fully completed your inventory list before uploading it.<br><br></b>
        You will be able to upload it again, at which time any previous uploads will be overwritten, but its bet to only upload once as to prevent confusion.';?>
    </center>  

    </div>
</div>
 
<br>
<section id="services">
    <div class="row">
        <div class="col-2">
        </div>

        <div class="col-12">    
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">

                    <?php include_once "inventoryUploader.php";?>
                            
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<br><br><br>

</script>
<a href="index.php"><button class="btn btn-primary" id="submApp" name="submApp" type="button" style="float:right">Go back to homepage</button></a>


                              


                                   
                                
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