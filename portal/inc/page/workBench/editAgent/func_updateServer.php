<?php
$pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
if($pos===false)
  die('Restricted access');

include_once '../inc/required/sessions.php'; 
include_once '../inc/required/database.php';
include_once '../inc/required/utilities.php';


if(isset($_POST['data1'])){
    $serviceProviderID = $_POST['data1'];
    $_SESSION['serviceProviderID'] = $serviceProviderID;
}

if(isset($_POST['data2'])){
    $logoURL = $_POST['data2'];
    $_SESSION['logoURL'] = $logoURL;
}


    $userID = $_SESSION['userID'];
    $timeUpdate = date_default_timezone_set('Africa/Johannesburg');
    $timeUpdate = date('Y-m-d @ H:i:s', time());


            if(isset($serviceProviderID) && ($logoURL)) {
                $sqlUpdate = "UPDATE banks SET logoURL =:logoURL, file_upload =:fileUpload, uploadedBy =:userID WHERE serviceProviderID =:serviceProviderID";
                //use PDO prepared to sanitize SQL statement
                $statement = $db->prepare($sqlUpdate);
                //execute the statement
                $statement->execute(array(':logoURL' => $logoURL, ':fileUpload' => $timeUpdate, ':serviceProviderID' => $serviceProviderID, ':userID' => $userID));

                $logoURL_result = "Success";
            }
?>