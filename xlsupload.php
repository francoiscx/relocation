<?php
include_once 'inc/required/sessions.php';
include_once 'inc/required/database.php';
include_once 'inc/required/utilities.php';

$uploadLink = $_SESSION['uploadLink'];
$target_dir = "uploads/" . $uploadLink . "_";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "xls" && $imageFileType != "xlsx") {
  echo "Sorry, only xls & xlsx files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
$_SESSION['fileUploadResult'] = "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    
    $newFileName = $uploadLink . "_" . basename( $_FILES["fileToUpload"]["name"]);    
    $inventoryLink = "https://demoprojects.relocation.co.za/uploads/" . $newFileName;
    $inventoryUploadLink = $_SESSION['uploadLink'];

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
            echo "The file ". $newFileName . " has been uploaded.";
            $_SESSION['fileUploadResult'] = "The file ". $newFileName . " has been uploaded.";
  } else {
            echo "Sorry, there was an error uploading your file.";
            $_SESSION['fileUploadResult'] = "Sorry, there was an error uploading your file.";
  }
}

$return = $_SESSION['returnlink'];

echo '
<script>
    location.replace("' . $return .'");
</script>
'

?>

