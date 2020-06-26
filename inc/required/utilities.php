<?php

/**
 * @param $required_fields_array, n array containing the list of all required fields
 * @return array, containing all errors
 */


function check_empty_fields($required_fields_array){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd populate the form error array
    foreach($required_fields_array as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " is a required field<br>";
        }
    }

    return $form_errors;
}



function check_if_empty($required){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd populate the form error array
    foreach($required as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " & Conditions need to be accepted before you can make use of our services.";
        }
    }

    return $form_errors;
}


function check_if_confirmed($required){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd populate the form error array
    foreach($required as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $showReset = 1 ;
            $form_errors[] = "You need to confirm that this is your own account before we can send you a password reset link.";
        }
    }

    return $form_errors;
}



function check_if_phone_at_hand($required){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd populate the form error array
    foreach($required as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $showReset = 1 ;
            $form_errors[] = "Confirm that you have the device with this number at hand?";
        }
    }

    return $form_errors;
}


/**
 * @param $fields_to_check_length, an array containing the name of fields
 * for which we want to check min required length e.g array('username' => 4, 'email' => 12)
 * @return array, containing all errors
 */
function check_min_length($fields_to_check_length){
    //initialize an array to store error messages
    $form_errors = array();

    foreach($fields_to_check_length as $name_of_field => $minimum_length_required){
        if(strlen(trim($_POST[$name_of_field])) < $minimum_length_required && $_POST[$name_of_field] != NULL){
            $form_errors[] = $name_of_field . " is too short, must be {$minimum_length_required} characters long";
        }
    }
    return $form_errors;
}




/**
 * @param $data, store a key/value pair array where key is the name of the form control
 * in this case 'email' and value is the input entered by the user
 * @return array, containing email error
 */
function check_email($data){
    //initialize an array to store error messages
    $form_errors = array();
    $key = 'appEmail';
    //check if the key email exist in data array
    if(array_key_exists($key, $data)){

        //check if the email field has a value
        if($_POST[$key] != null){

            // Remove all illegal characters from email
            $key = filter_var($key, FILTER_SANITIZE_EMAIL);

            //check if input is a valid email address
            if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false){
                $form_errors[] = "<b>" . $_POST[$key] . "</b> does not seem to be a valid email address";
            }
        }
    }
    return $form_errors;
}




/**
 * @param $form_errors_array, the array holding all
 * errors which we want to loop through
 * @return string, list containing all error messages
 */
function show_errors($form_errors_array){
    $errors = " ";

    //loop through error array and display all items in a list
    foreach($form_errors_array as $the_error){
        $errors .= "{$the_error}";
    }
    $errors .= "";
    return $errors;
}





/**
 * echo name_field("john o'grady-smith"); 	returns John O'Grady-Smith
 * change strings to first letter upper case
 * @return array, containing all errors
 */
function name_field($str,$a_char = array("'","-"," ")){   
    //$str contains the complete raw name string
    //$a_char is an array containing the characters we use as separators for capitalization. If you don't pass anything, there are three in there as default.
    $string = strtolower($str);
    foreach ($a_char as $temp){
        $pos = strpos($string,$temp);
        if ($pos){
            //we are in the loop because we found one of the special characters in the array, so lets split it up into chunks and capitalize each one.
            $mend = '';
            $a_split = explode($temp,$string);
            foreach ($a_split as $temp2){
                //capitalize each portion of the string which was separated at a special character
                $mend .= ucfirst($temp2).$temp;
                }
            $string = substr($mend,0,-1);
            }   
        }
    return ucfirst($string);
    }




function report($message, $eval = "Fail"){
	if($eval === "Pass"){
		$data = "<p>{$message}</p>";
	
  	 }else{
		$data = "<p>{$message}</p>";
	}
	return $data;	
}




function denyDuplicate($db, $appName, $appSurname, $appEmail){
 
	try{
		$sqlQuery = "SELECT * FROM applicants WHERE applicant_name =:appName AND applicant_surname =:appSurname AND  applicant_email =:appEmail";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':appName' => $appName, ':appSurname' => $appSurname, ':appEmail' => $appEmail));
		if($row = $statement->fetch()){
        $applicantID = $row['applicant_id'];
        $_SESSION['hasApplied'] = 1;
            
            try{
                $sqlQuery = "SELECT * FROM applicants WHERE applicant_id =:applicantID";
                $statement = $db->prepare($sqlQuery);
                $statement->execute(array(':applicantID' => $applicantID));
                
                        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                        $appID = $row['applicant_id'];
                        $_SESSION['appID'] = $appID;

                        $appName = $row['applicant_name'];
                        $_SESSION['appName'] = $appName;
                        
                        $appSurname = $row['applicant_name'];
                        $_SESSION['appSurname'] = $appSurname;
                        
                        $appCell = $row['applicant_cell'];
                        $_SESSION['appCell'] = $appCell;
                        
                        $appWork = $row['applicant_work_number'];
                        $_SESSION['appWork'] = $appWork;
                        
                        $appEmail = $row['applicant_email'];
                        $_SESSION['appEmail'] = $appEmail;
                        
                        $appRes = $row['res'];
                        $_SESSION['appRes'] = $appRes;
                        
                        $appCom = $row['com'];
                        $_SESSION['appCom'] = $appCom;
                        
                        $appInt = $row['int'];
                        $_SESSION['appInt'] = $appInt;
                        
                        $appOther = $row['other'];
                        $_SESSION['appOther'] = $appOther;

                        $appDate = $row['first_date'];
                        $_SESSION['appDate'] = $appDate;

                    return true;
                }
            }catch (PDOException $ex){
                //handle exception
            }
            return true;    
		} else {
            unset($_SESSION['hasApplied']);
            return false;
        }
	}catch (PDOException $ex){
		//handle exception
	}
}



function denyDuplicateAT($db, $appID, $appType){
 
	try{
		$sqlQuery = "SELECT * FROM app_details WHERE applicant_id =:appID AND app_type =:appType";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':appID' => $appID, ':appType' => $appType));
		if($row = $statement->fetch()){
            try{
                $sqlQuery = "SELECT * FROM app_details WHERE applicant_id =:appID AND app_type =:appType";
                $statement = $db->prepare($sqlQuery);
                $statement->execute(array(':appID' => $appID, ':appType' => $appType));
                
                while($row = $statement->fetch()){
                    $appDetailsID = $row['app_detail_id'];
                    $_SESSION['appDetailsID'] = $appDetailsID;
                    $inventoryUploadLink = $row['inventoryUploadLink']; 
                    $_SESSION['inventoryUploadLink'] = $inventoryUploadLink;

                    return true;
                }
            }catch (PDOException $ex){
                //handle exception
            }
            return true;    
		} else {
            return false;
        }
	}catch (PDOException $ex){
		//handle exception
	}
}


function denyDuplicateSendQueue($db, $appID, $providerID){
 
	try{
		$sqlQuery = "SELECT * FROM sendQueue WHERE appID =:appID AND providerID =:providerID";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':appID' => $appID, ':providerID' => $providerID));
		if($row = $statement->fetch()){
            
            return true;    
		} else {

            return false;
        }
	}catch (PDOException $ex){
        //handle exception
        $_SESSION['hasEntry'] = "error" . $ex;
	}
}





function allowedToReset($email, $first_name, $last_name, $db){

	try{
		$sqlQuery = "SELECT * FROM users WHERE email = :email AND first_name = :first_name AND last_name = :last_name";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':email' => $email, ':first_name' => $first_name, ':last_name' => $last_name));
		
		while($row = $statement->fetch()){
        $id = $row['id'];
        $_SESSION['userID'] = $id;
			return true;
		}
			return false;
	}catch (PDOException $ex){
		//handle exception
	}
	
}




function SetAsAlreadyUsed($reset, $selector, $token, $db){
    
	try{
		//SQL statement to update info
		$sqlUpdate = "UPDATE account_recovery SET reset = :reset, resetTime = now(), resetIP = '(" . $_SERVER['REMOTE_ADDR'] . ")' WHERE selector = :selector AND token = :token";
        $statement = $db->prepare($sqlUpdate);
        $statement->execute(array(':reset' => $reset, ':selector' => $selector, ':token' => $token));

	}catch (PDOException $ex){
		//handle exception
	}
	return true;
}




class Random{
  public static function Numeric($length)
      {
          $chars = "1234567890";
          $clen   = strlen( $chars )-1;
          $id  = '';

          for ($i = 0; $i < $length; $i++) {
                  $id .= $chars[mt_rand(0,$clen)];
          }
          return ($id);
      }

  public static function Alphabets($length)
      {
          $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
          $clen   = strlen( $chars )-1;
          $id  = '';

          for ($i = 0; $i < $length; $i++) {
                  $id .= $chars[mt_rand(0,$clen)];
          }
          return ($id);
      }

  public static function AlphaNumeric($length)
      {
          $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
          $clen   = strlen( $chars )-1;
          $id  = '';

          for ($i = 0; $i < $length; $i++) {
                  $id .= $chars[mt_rand(0,$clen)];
          }
          return ($id);
      }
}

  //echo Random::Numeric(6); # eg result: "567268"
  //echo Random::Alphabets(9); # eg result: IAGRmZyJS
  //echo Random::AlphaNumeric(10); #eg result: Gzt6syUS8M



  function String2Stars($string='',$first=0,$last=0,$rep='*'){
	$begin  = substr($string,0,$first);
	$middle = str_repeat($rep,strlen(substr($string,$first,$last)));
	$end    = substr($string,$last);
	$stars  = $begin.$middle.$end;
	return $stars;
  }


  function getUserIP(){
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


