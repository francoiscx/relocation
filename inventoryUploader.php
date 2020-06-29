<?php
if(isset($_POST['finishLogoBtn'])){
$_SESSION['uploaded'] = 1;
echo "Post Clicked
<script>
  location.replace('https://relocation.co.za');
</script>";
}

  $uploadLink = $_GET['id'];
  $_SESSION['returnlink'] = "inventoryUpload.php?id=" . $uploadLink;

  // echo "Upload Link: " . $uploadLink;

  $hasInventoryLinkQuery = "SELECT
                                inventoryLink,
                                inventoryUploaded,
                                applicant_id
                            FROM 
                                app_details
                            WHERE
                                inventoryUploadLink = '$uploadLink'
                                ";

$hasInventoryLink = $db->query($hasInventoryLinkQuery);

foreach($hasInventoryLink->fetchAll() as $hasInventoryLink):
    $inventoryUploaded = $hasInventoryLink['inventoryUploaded'];
    // $inventoryUploaded = new DateTime("@$inventoryUploaded");
    // $inventoryUploaded = $inventoryUploaded->format('d-m-Y H:i:s');
    
    $existingFile = $hasInventoryLink['inventoryLink'];
    $applicant_id = $hasInventoryLink['applicant_id'];

    // echo $inventoryUploaded;
    // echo $existingFile;
    // echo $applicant_id;
endforeach; 

if(!isset($_SESSION['userIDss'])) {

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



require './cloudinary/autoload.php'; 

require './cloudinary/src/Helpers.php'; //optional for using the cl_image_tag and cl_video_tag helper methods


require './cloudinary/src/Cloudinary.php';
require './cloudinary/src/Uploader.php';
// require 'cloudinary/src/Api.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./cloudinary/src/jquery.ui.widget.js" type="text/javascript"></script>
<script src="./cloudinary/src/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="./cloudinary/src/jquery.fileupload.js" type="text/javascript"></script>

<!-- <script src="./cloudinary/src./cloudinary.js" type="text/javascript"></script> -->

<script>
    $(function() {
  if($.fn.cloudinary_fileupload !== undefined) {
    $("input.cloudinary-fileupload[type=file]").cloudinary_fileupload();
  }
});
</script>    

<?php 

$accountID = 1;
$cloudinaryName = $_SESSION['cloudinaryName'];
//echo $cloudinaryName . "<br>";
$cloudinaryKey = $_SESSION['cloudinaryKey'];
//echo $cloudinaryKey . "<br>";
$cloudinarySecret = $_SESSION['cloudinarySecret'];
//echo  $cloudinarySecret;
\Cloudinary::config(array( 
    "cloud_name" => "$cloudinaryName", 
    "api_key" => "$cloudinaryKey",  
    "api_secret" => "$cloudinarySecret" 
  ));

require './cloudinary/src/Error.php';
//echo cloudinary_js_config(); 

?>

<style>
input#viewLogoBtn {
    background: #65d4eb;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
    float: right;
}

input[type="file"] {
    background: #bf3938;
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}

input[type="submit"] {
    background: #bf3938;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    float: right;
    color: #fff;
}

input#finishLogoBtn {
    background: #83B63E;
    margin-bottom: 200px;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}


#load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("dist/img/loading.gif") no-repeat center center rgba(0,0,0,0.25)
}
</style>



<!-- TO DO List -->
<div class="box" style="min-height:90%">
    <div class="box-header">

            <!-- /.box-header -->
            <div class="box-body">

<?php
if(isset($existingFile) && ($existingFile != "Not set") && ($existingFile != "NYU")){
 echo "<div id='result'><h5 style='color:green'>The latest inventory was uploaded: " . $inventoryUploaded . ".</h5></div>";
} else {
  echo "<div id='result'><h5 style='color:crimson'>No Inventory has been uploaded yet.</h5></div>";
} 
?>
<br>

<container>
<style>
 .form-control{
    margin-top: 10px;
    margin-bottom: 10px;
 }
</style>
<?php 
if(isset($existingFile) && ($existingFile != "Not set")){ 
$inventoryLink = "'" . $existingFile . "'";
  echo'
    <legend>View / Download Inventory</legend>  
    <form action="" method="post">  
          <input type="button" id="viewLogoBtn" value="View Inventory" onclick="window.open(' . $inventoryLink . ')"/>   
           
    </form>
    <br><br>';}?>    
       
<form action="" method="post" enctype="multipart/form-data" onsubmit="AJAXSubmit(this); return false;">
    <fieldset>
        <p>
        <div style="visibility: hidden; margin-top:-40px"><label for="upload_preset">Unsigned upload Preset: <input type="text" name="upload_preset" value="zn4hfvnc"></label></div>
        </p>

        <p>
        <label><h4>If file is an image (.png or .jpg or .jpeg or .pdf):</h4>
        <input type="file" name="file"></label>
        </p>
        
        <p>
        <input type="submit" value="Upload Image" />
        </p>

        <div style="visibility: hidden">
        <img id="uploaded">
        </div>
        <div style="min-height:125px;max-width:800px;white-space:pre-line;overflow-x:overlay;" id="results"></div>
    </fieldset>
</form>

<?php
    $uploadLink = $_GET['id'];
?>
<?php
if(isset($_SESSION['fileUploadResult'])) {
echo '<span style="color:crimson"><h2><center>' . $_SESSION['fileUploadResult'] . '<center></h2></span>';
unset($_SESSION['fileUploadResult']);
}
?>
<form action="xlsupload.php" method="post" enctype="multipart/form-data">
<h4>If file is a document (.xls or .xlsx formats)</h4>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br><br>
  <input type="submit" value="Upload File" name="submit">
</form>


        <script>
        var uploadLink;        
        uploadLink = "<?php echo $uploadLink;?>"
            //console.log("uploadLink: ", uploadLink);

        var inventoryLink;

        window.ajaxSuccess = function () {
            response = JSON.parse(this.responseText);
            console.log("ajaxSuccess", typeof this.responseText);
            document.getElementById('uploaded').setAttribute("src", inventoryLink = response["secure_url"]);
            state = "complete";
            console.log("uploadLink: ", uploadLink)
            console.log("url: ", inventoryLink)
            //console.log("pages: ", pages)
            document.getElementById('results').innerText = this.responseText;
            document.getElementById('results').innerText = "The file was successfully uploaded!";

        $.ajax({
            method: "POST",
            url: "uploaderFunc.php",
            data: { data1:uploadLink, data2:inventoryLink}
                })
                    .done(function(html){//function block runs if Ajax request was successful
                    $('#result').html("The file was successfully uploaded to the server")
                    alert("Your Inventory was uploaded to the following URL: " + inventoryLink + ", partners that revceived your request to quote shall be notified.");    
                    window.open(inventoryLink,'_blank'); 
                    window.setTimeout(function(){location.reload()},2000)
                })
                    .fail(function(html){// function block runs if Ajax request failed
                    $('#result').html("Data could not be linked");
                });    
            }

        window.AJAXSubmit = function (formElement) {
            state = 'uploading';
            console.log("starting AJAXSubmit");
            if (!formElement.action) { return; }
            var xhr = new XMLHttpRequest();
            xhr.onload = ajaxSuccess;
            xhr.open("post", "https://api.cloudinary.com/v1_1/relocation/image/upload");
            xhr.send(new FormData(formElement));
        }
        </script>
                                                
        </container>
                                                                                    
    </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->


<script>
  document.onreadystatechange = function () {
    var state = document.readyState
        if (state == 'uploading') {
            document.getElementById('contents').style.visibility="hidden";
        } else if (state == 'complete') {
            document.getElementById('interactive');
            //document.getElementById('load').style.visibility="hidden";
        }
  }
</script>