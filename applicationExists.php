<?php 
include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';

    if(isset($_POST['resBtn'])|| isset($_POST['comBtn'])|| isset($_POST['intBtn'])|| isset($_POST['otherBtn'])|| isset($_POST['startNewBtn'])) {

        $appID = $_SESSION['appID'];

        $user_ip = getUserIP();

        if(isset($_POST['appName'])){
            $appName = $_POST['appName'];
            $_SESSION['appName'] = $appName;
        } else {
            if(isset($_SESSION['appName'])) {
                $appName = $_SESSION['appName'];
            } else { 
                $nameError = "Please provide your name<br>";
                die();
            }
        }

        if(isset($_POST['appSurname'])){
            $appSurname = $_POST['appSurname'];
            $_SESSION['appSurname'] = $appSurname;
        } else {
            if(isset($_SESSION['appSurname'])) {
                $appSurname = $_SESSION['appSurname'];
            } else { 
                $surnameError = "Please provide your surname<br>";
                die();
            }
        }
    
        if(isset($_POST['appCell'])){
            $appCell = $_POST['appCell'];
        } else {
            if(isset($_SESSION['appCell'])) {
                $appCell = $_SESSION['appCell'];
            } else { 
                $cellError = "Please provide your cell number<br>";
                die();
            }
        }
    
        if(isset($_POST['appWork'])){
            $appWork = $_POST['appWork'];
        } else {
            if(isset($_SESSION['appWork'])) {
                $appWork = $_SESSION['appWork'];
            } else { 
                $workError = "Please provide an alternative number<br>";
                die();
            }
        }
    
        if(isset($_POST['appEmail'])){
            $appEmail = $_POST['appEmail'];
        } else {
            if(isset($_SESSION['appEmail'])) {
                $appEmail = $_SESSION['appEmail'];
            } else { 
                $emailError = "Please provide your email address<br>";
                die();
            }
        }

            if(isset($appID)) {
                    //SQL statement to update info
                    $sqlUpdate = "UPDATE applicants SET applicant_cell =:appCell, applicant_work_number =:appWork, ip =:ip WHERE applicant_id =:appID";
                    $statement = $db->prepare($sqlUpdate);
                    $statement->execute(array(':appCell' => $appCell, ':appWork' => $appWork, ':appID' => $appID, ':ip' => $user_ip)); 
                    $_SESSION['saved'] == 1;
        

                if(isset($_POST['resBtn'])) {
                    unset($_POST['resBtn']);
                    $_SESSION['appDetailsID'] = $_SESSION['appRes'];
                    $_SESSION['relocationType'] = "Residential";
                    header("Location: ./applicationSelectServices.php");
                }

                if(isset($_POST['comBtn'])) {
                    unset($_POST['comBtn']);
                    $_SESSION['appDetailsID'] = $_SESSION['appCom'];
                    $_SESSION['relocationType'] = "Commercial";
                    header("Location: ./applicationSelectServices.php");
                }

                if(isset($_POST['intBtn'])) {
                    unset($_POST['intBtn']);
                    $_SESSION['appDetailsID'] = $_SESSION['appInt'];
                    $_SESSION['relocationType'] = "International";
                    header("Location: ./applicationSelectServices.php");
                }

                if(isset($_POST['otherBtn'])) {
                    unset($_POST['otherBtn']);
                    $_SESSION['appDetailsID'] = $_SESSION['appOther'];
                    $_SESSION['relocationType'] = "Other";
                    header("Location: ./applicationSelectServices.php");
                }
            }

            if(isset($_POST['startNewBtn'])) {
                header("Location: ./applicationSelectServices.php");
            }
    }

unset($_SESSION['appType']);
$tranLoc = "exi";

        if(isset($appID)) {
            //check for userID in database
            $sqlQuery = "SELECT * FROM applicants WHERE applicant_id =:appID";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':appID' => $appID));
		                    	
                while($row = $statement->fetch()){
                $appName = $row['applicant_name'];
                $appSurname = $row['applicant_surname'];
                $appCell = $row['applicant_cell'];
                $appWork = $row['applicant_work_number'];
                $appEmail = $row['applicant_email'];
                $appDate = $row['first_date'];
                $appRes = $row['res'];
                $appCom = $row['com'];
                $appInt = $row['int'];
                $appOther = $row['other'];

                $_SESSION['appName'] = $appName;
                $_SESSION['appSurname'] = $appSurname;
                $_SESSION['appCell'] = $appCell;
                $_SESSION['appWork'] = $appWork;
                $_SESSION['appEmail'] = $appEmail;
                $_SESSION['appDate'] = $appDate;
                $_SESSION['appRes'] = $appRes;
                $_SESSION['appCom'] = $appCom;
                $_SESSION['appInt'] = $appInt;
                $_SESSION['appOther'] = $appOther;
                } 
            }
                
                $appID = $_SESSION['appID'];
                $appType = "Residential";
                if(denyDuplicateAT($db, $appID, $appType)){
                    $_SESSION['appRes'] = $_SESSION['appDetailsID'];
                    unset($_SESSION['appDetailsID']);
                } else {
                    // CREATE NEW LINE
                    if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "Residential"){
                        $_SESSION['appRes'] = 1;
                    $createNew = 1;
                    }
                }

                $appType = "Commercial";
                if(denyDuplicateAT($db, $appID, $appType)){
                    $_SESSION['appCom'] = $_SESSION['appDetailsID'];
                    unset($_SESSION['appDetailsID']);
                } else {
                    // CREATE NEW LINE
                    if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "Commercial"){
                        $_SESSION['appCom'] = 1;
                    $createNew = 1;
                    }
                }

                $appType = "International";
                if(denyDuplicateAT($db, $appID, $appType)){
                    $_SESSION['appInt'] = $_SESSION['appDetailsID'];
                    unset($_SESSION['appDetailsID']);
                } else {
                    // CREATE NEW LINE
                    if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "International"){
                        $_SESSION['appInt'] = 1;
                    $createNew = 1;
                    }
                }

                $appType = "Other";
                if(denyDuplicateAT($db, $appID, $appType)){
                    $_SESSION['appOther'] = $_SESSION['appDetailsID'];
                    unset($_SESSION['appDetailsID']);
                } else {
                    // CREATE NEW LINE
                    if(isset($_SESSION['relocationType']) && $_SESSION['relocationType'] == "Other"){
                        $_SESSION['appOther'] = 1;
                    $createNew = 1;
                    }
                }

        if(isset($createNew)) {
            unset($createNew);
            $applicantID = $_SESSION['appID'];
            $appType = $_SESSION['relocationType'];

            //create SQL insert statement
            $sqlInsert = "INSERT INTO app_details (applicant_id, app_type)
            VALUES (:applicantID, :appType)";

            //use PDO prepared to sanitize data
            $statement = $db->prepare($sqlInsert);

            //add the data into the database
            $statement->execute(array(':applicantID' => $applicantID, ':appType' => $appType));

            //check if one new row was created
            if($statement->rowCount() == 1){
            
                  //check for userID in database
                  $sqlQuery = "SELECT * FROM app_details WHERE applicant_id =:applicantID AND app_type =:appType";
                  $statement = $db->prepare($sqlQuery);
                  $statement->execute(array(':applicantID' => $applicantID, ':appType' => $appType));
                  
                  while($row = $statement->fetch()){
                  $appDetailsID = $row['app_detail_id'];
                  $_SESSION['appDetailsID'] = $appDetailsID;
                  $newService = 1;
                  }
                
            }
            if(isset($newService)) {



            $appID = $_SESSION['appID'];
            $res = $_SESSION['appRes'];
            $com = $_SESSION['appCom'];
            $inter = $_SESSION['appInt'];
            $other = $_SESSION['appOther'];

            //SQL statement to update info
            $sqlUpdate = "UPDATE applicants SET res =:res, com =:com, int =:inter, other =:other WHERE applicant_id =:appID";
            $statement = $db->prepare($sqlUpdate);
            $statement->execute(array(':res' => $res, ':com' => $com, ':inter' => $inter, ':other' => $other, ':appID' => $appID)); 

    }
}



include_once 'inc/required/head.php';?>

                    
                
            </div>
        </div>
    </nav>

    <section id="home">
        <header class="header"></header>
    </section>

    <section id="appSection">
    <div id="backgrounddiv">
        <div class="container">
        <div class="row" style="margin-top:44px;">
                <div class="col-md-12"><h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">This is what we have for you <span style="color:#BF3838"></span>.<br></h1><p style="text-align:center; color:#4A4A4A">
                Please select wether you want to continiue your application or to cancel it and restart a new application.
                <br/></p>
                    <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;margin: 0px 17px;"></h1>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                
                <h4 id="partners" style="text-align:center; color:#4A4A4A">It seems like you already started an application.<br/>
                    </h4>
                   
                    <form method="post" action="">

                        <div class="form-group"><label>Name</label>         <input class="form-control" type="text" id="appName" name="appName" value="<?php echo $_SESSION['appName'];?>" disabled=disabled></div>
                        <div class="form-group"><label>Surname</label>      <input class="form-control" type="text" id="appSurname" name="appSurname" value="<?php echo $_SESSION['appSurname'];?>" disabled=disabled></div>
                        <div class="form-group"><label>Cell Number</label>  <input class="form-control" type="text" id="appCell" name="appCell" value="<?php echo $_SESSION['appCell'];?>"></div>
                        <div class="form-group"><label>Work Numer</label>   <input class="form-control" type="text" id="appWork" name="appWork" value="<?php echo $_SESSION['appWork'];?>"></div>
                        <div class="form-group"><label>Email</label>        <input class="form-control" type="text" id="appEmail" name="appEmail" value="<?php echo $_SESSION['appEmail'];?>"></div>
                        <div class="form-group"><label>Select an existing application to continiue or start a new application</label><br>
                        <div class="flexbox">
                        <?php 
                        
                        if(isset($_SESSION['appRes'])) {
                            if($_SESSION['appRes'] > 0) {
                                echo '<div class="flex">
                                    <input type="submit" id="resBtn" name="resBtn" value="Continue Residential" class="btn btn-block btn-warning" style="max-width:320px; margin:10px" onclick="location.href=\'./applicationSelectServices.php?c='. $_SESSION['appRes'] . '\'">
                                </div>';
                            } else {
                                echo '<div class="flex">
                                    <input type="submit" id="resBtn" name="resBtn" value="Start New Residential" class="btn btn-block btn-success" style="max-width:320px; margin:10px; background-color:green; border: solid 1px green;" onclick="location.href=\'./applicationSelectServices.php?c='. $_SESSION['appRes'] . '\'">
                                </div>';
                            }
                        } 
                        
                        if(isset($_SESSION['appCom'])) {
                            if($_SESSION['appCom'] > 0) {
                                echo '<div class="flex">
                                    <input type="submit" id="comBtn" name="comBtn" value="Continue Commercial" class="btn btn-block btn-warning" style="max-width:320px; margin:10px" onclick="location.href=\'./applicationSelectServices.php?c=com\'">
                                </div>';
                            } else {
                                echo '<div class="flex">
                                    <input type="submit" id="comBtn" name="comBtn" value="Start New Commercial" class="btn btn-block btn-success" style="max-width:320px; margin:10px; background-color:green; border: solid 1px green;" onclick="location.href=\'./applicationSelectServices.php?c=com\'">
                                </div>';
                            }
                        } 
                        
                        if(isset($_SESSION['appInt'])) {
                            if($_SESSION['appInt'] > 0) {
                                echo '<div class="flex">
                                    <input type="submit" id="intBtn" name="intBtn" value="Continue International" class="btn btn-block btn-warning" style="max-width:320px; margin:10px" onclick="location.href=\'./applicationSelectServices.php?c=int\'">
                                </div>';
                            } else {
                                echo '<div class="flex">
                                    <input type="submit" id="intBtn" name="intBtn" value="Start New International" class="btn btn-block btn-success" style="max-width:320px; margin:10px; background-color:green; border: solid 1px green;" onclick="location.href=\'./applicationSelectServices.php?c=int\'">
                                </div>';
                            }
                        } 
                        
                        if(isset($_SESSION['appOther'])) {
                            if($_SESSION['appOther'] > 0) {
                                echo '<div class="flex">
                                    <input type="submit" id="otherBtn" name="otherBtn" value="Continue Other Services" class="btn btn-block btn-warning" style="max-width:320px; margin:10px" onclick="location.href=\'./applicationSelectServices.php?c=other\'">
                                </div>';
                            } else {
                                echo '<div class="flex">
                                    <input type="submit" id="otherBtn" name="otherBtn" value="Start New Other Services" class="btn btn-block btn-success" style="max-width:320px; margin:10px; background-color:green; border: solid 1px green;" onclick="location.href=\'./applicationSelectServices.php?c=other\'">
                                </div>';
                            }
                        }
                        ?>
                        </div>
                        

                        <!-- <div style="position:inline-block"> 
                            <div class="flexbox">
                                <br><br>
                                    <div class="flex">
                                        <input type="submit" id="startNewBtn" name="startNewBtn" value="Start New Application" class="btn btn-block btn-success" style="float:right; background-color:#218838; border-color:#1e7e34; max-width:320px;">
                                    </div>    
                            </div> 
                        
                            <br><br><br>                                                                                       
                        </div>    -->
                        </form>                                                                                     
                    </div>        
                </div>
            </div>
        </div>
    </div>
</section>






<?php include_once 'inc/required/footer.php';?>