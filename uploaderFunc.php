<?php
if(!isset($_SERVER['HTTP_REFERER'])) die('Restricted access');
$pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
if($pos===false)
  die('Restricted access');


include_once 'inc/required/sessions.php'; 
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';


if(isset($_POST['data1'])){
    $inventoryUploadLink = $_POST['data1'];
    $_SESSION['uploadLink'] = $inventoryUploadLink;
}

if(isset($_POST['data2'])){
    $inventoryLink = $_POST['data2'];
    $_SESSION['inventoryLink'] = $inventoryLink;
}

    $timeUpdate = date_default_timezone_set('Africa/Johannesburg');
    $timeUpdate = date('Y-m-d @ H:i:s', time());

    $_SESSION['timeUpdate'] = $timeUpdate;


            if(isset($inventoryUploadLink) && ($inventoryLink)) {
                $_SESSION['here'] = 1;
                $sqlUpdate = "UPDATE app_details SET inventoryLink =:inventoryLink, inventoryUploaded =:fileUpload WHERE inventoryUploadLink =:inventoryUploadLink";
                //use PDO prepared to sanitize SQL statement
                $statement = $db->prepare($sqlUpdate);
                //execute the statement
                $statement->execute(array(':inventoryLink' => $inventoryLink, ':fileUpload' => $timeUpdate, ':inventoryUploadLink' => $inventoryUploadLink));

                $inventoryLink_result = "Success";
            }
?>