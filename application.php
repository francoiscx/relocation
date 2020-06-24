<?php 
include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';

$tranLoc = "app";

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

    if(isset($nameError)) {echo $nameError; unset($nameError);}
    if(isset($surnameError)) {echo $surnameError; unset($surnameError);}
    if(isset($cellError)) {echo $cellError; unset($cellError);}
    if(isset($workError)) {echo $workError; unset($workError);}
    if(isset($emailError)) {echo $emailError; unset($emailError);}


if(isset($_POST['fileApplicationBtn'])){

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

    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array('appName', 'appSurname', 'appCell', 'appWork', 'appEmail');
   
    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
     
    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));
    
    //Check if errors is empty
    if(empty($form_errors)){

		//Fields to change Case to Name
		$appName = name_field($appName);
		$appSurname = name_field($appSurname);
        $appEmail = strtolower($appEmail);
        
        if(denyDuplicate($db, $appName, $appSurname, $appEmail)){
            $_SESSION['appName'] = $appName;
            $_SESSION['appSurname'] = $appSurname;
            $_SESSION['appCell'] = $appCell;
            $_SESSION['appWork'] = $appWork;
            $_SESSION['appEmail'] = $appEmail;

            $user_ip = getUserIP();

            //echo $user_ip;
            
            if(isset($_SESSION['hasApplied'])) {
                
                        try{
                            //SQL statement to update info
                            $sqlUpdate = "UPDATE applicants SET applicant_cell =:appCell, applicant_work_number =:appWork, ip =:ip WHERE applicant_id =:appID";
                            $statement = $db->prepare($sqlUpdate);
                            $statement->execute(array(':appCell' => $appCell, ':appWork' => $appWork, ':appID' => $appID, ':ip' => $user_ip)); 
                        } catch (PDOException $ex) {
                            //handle exception
                        } 
                        header("Location: applicationExists.php");
        }
    } else {

            //create SQL insert statement
            $sqlInsert = "INSERT INTO applicants (applicant_name, applicant_surname, applicant_cell, applicant_work_number, applicant_email, first_date)
              VALUES (:appName, :appSurname, :appCell, :appWork, :appEmail, now())";

            //use PDO prepared to sanitize data
            $statement = $db->prepare($sqlInsert);

            //add the data into the database
            $statement->execute(array(':appName' => $appName, ':appSurname' => $appSurname, ':appCell' => $appCell, ':appWork' => $appWork, ':appEmail' => $appEmail));

            //check if one new row was created
            if($statement->rowCount() == 1){
                
                $_SESSION['appName'] = $appName;
                $_SESSION['appSurname'] = $appSurname;
                $_SESSION['appCell'] = $appCell;
                $_SESSION['appWork'] = $appWork;
                $_SESSION['appEmail'] = $appEmail;
                $_SESSION['firstDate'] = 1;
                $cancel = 0;
                $newReg = 1;
         
                                //check for userID in database
                                $sqlQuery = "SELECT * FROM applicants WHERE applicant_name =:appName AND applicant_surname =:appSurname AND applicant_cell =:appCell AND applicant_work_number =:appWork AND applicant_email =:appEmail";
                                $statement = $db->prepare($sqlQuery);
                                $statement->execute(array(':appName' => $appName, ':appSurname' => $appSurname, ':appCell' => $appCell, ':appWork' => $appWork, ':appEmail' => $appEmail));
		                    	
                                while($row = $statement->fetch()){
                                $appID = $row['applicant_id'];
                                $_SESSION['appID'] = $appID;
                                }
                              
                }
                if(isset($newReg)) {
                    header("Location: applicationSelectServices.php");
                }
            }
        
} else {
        if(count($form_errors) == 1){
			$result = "<h3 style='color: #381A64;'>There was one error in the form </h3>";
		}else{
			$result = "<h3 style='color: #381A64;'>There were " .count($form_errors). " errors in the form</h3>";
		}  
	}
}























include_once 'inc/required/head.php';?>

            </div>
        </div>
    </nav>
  
    <section id="appSection">
    <div id="backgrounddiv">
        <div class="container">
        <div class="row" style="margin-top:44px;">
                <div class="col-md-12"><h1 id="partners" style="text-align:center; color:#34495E; font-weight: 800">Please provide your <br><span style="color:#BF3838">Contact Details</span><br/>where we can send your quotations too!</h1><p style="text-align:center; color:#4A4A4A">Please provide your contact details so that our Professional Partners can contact you.<br/></p>
                    <h1 class="text-left" style="color: rgba(221,27,61,1.00);font-size: x-large;margin:0px 17px;"></h1>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <p id="partners" style="  text-align: center; color: #4A4A4A;">
<!--                    Talk about some the benefits they will get after doing your application!
-->                    <br/></p>
                            
                        <form method="post" action="">

                        <div class="form-group"><label>Name</label>         <input class="form-control" type="text" id="appName" name="appName" <?php if(isset($_SESSION['appName']) && $_SESSION['appName']!=""){ echo 'value="' . $_SESSION['appName'] . '"';} else {echo 'value=""';};?>required></div>
                        <div class="form-group"><label>Surname</label>      <input class="form-control" type="text" id="appSurname" name="appSurname" <?php if(isset($_SESSION['appSurname']) && $_SESSION['appSurname']!=""){ echo 'value="' . $_SESSION['appSurname'] . '"';} else {echo 'value=""';};?>required></div>
                        <div class="form-group"><label>Cell Number</label>  <input class="form-control" type="text" id="appCell" name="appCell" <?php if(isset($_SESSION['appCell']) && $_SESSION['appCell']!=""){ echo 'value="' . $_SESSION['appCell'] . '"';} else {echo 'value=""';};?>required></div>
                        <div class="form-group"><label>Work Number</label>   <input class="form-control" type="text" id="appWork" name="appWork" <?php if(isset($_SESSION['appWork']) && $_SESSION['appWork']!=""){ echo 'value="' . $_SESSION['appWork'] . '"';} else {echo 'value=""';};?>required></div>
                        <div class="form-group"><label>Email</label>        <input class="form-control" type="email" id="appEmail" name="appEmail" <?php if(isset($_SESSION['appEmail']) && $_SESSION['appEmail']!=""){ echo 'value="' . $_SESSION['appEmail'] . '"';} else {echo 'value=""';};?>required></div>
                        
                        <!-- <div class="form-group"><label>Type of Move Required</label>
                            <select  class="form-control" style="max-width: 300px!important;" id="appType" name="appType">
                                <option value=""> -- Select -- </option>
                                <option <?php if(isset($_SESSION['appType']) && $_SESSION['appType'] == "Residential") echo "selected";?> value="Residential">Residential</option>
                                <?php if(isset($_SESSION['appType']) && $_SESSION['appType'] == "Commercial") echo "selected";?> value="Commercial">Commercial</option>
                                <option <?php if(isset($_SESSION['appType']) && $_SESSION['appType'] == "International") echo "selected";?> value="International">International</option>
                            </select>
                        </div> -->
                    
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                            <input type="submit" id="fileApplicationBtn" name="fileApplicationBtn" value="Start Your Application" class="btn btn-block btn-success" style="float:right; max-width:265px;padding:5px 12px!important;">
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

<?php include_once 'inc/required/footer.php';?>