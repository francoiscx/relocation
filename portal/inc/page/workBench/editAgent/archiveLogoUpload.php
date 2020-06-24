<?php 
if(isset($_POST['finishLogoBtn'])){
$_SESSION['uploaded'] = 1;
echo "Post Clicked
<script>
  location.replace('../portal/workbench.php?id=4');
</script>";
}

$partnerID = $_GET['id'];

  $hasLogoQuery = "SELECT         
        service_providers.companyName,
        service_providers.logoURL, 
        service_providers.file_upload,
        service_providers.uploadedBy,
        users.user_id,
        users.user_first_name,
        users.user_last_name
FROM    
        service_providers
LEFT JOIN
        users
ON
        service_providers.serviceProviderID = users.user_id
WHERE   
        serviceProviderID = $partnerID";

$hasLogo = $db->query($hasLogoQuery);

foreach($hasLogo->fetchAll() as $hasLogo):
  $companyName = $hasLogo['companyName'];
  $_SESSION['companyName'] = $companyName;
  
  $fileUploaded = $hasLogo['file_upload'];
  $existingFile = $hasLogo['logoURL'];
  $uploadedBy = $hasLogo['uploadedBy'];
  $fname = $hasLogo['user_first_name'];
  $lname = $hasLogo['user_last_name'];
endforeach; 

// echo "names " . $fname . " " . $lname;

require '../cloudinary/autoload.php';
require '../cloudinary/src/Helpers.php'; //optional for using the cl_image_tag and cl_video_tag helper methods


require '../cloudinary/src/Cloudinary.php';
require '../cloudinary/src/Uploader.php';
//require 'cloudinary/src/Api.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../cloudinary/src/jquery.ui.widget.js" type="text/javascript"></script>
<script src="../cloudinary/src/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="../cloudinary/src/jquery.fileupload.js" type="text/javascript"></script>

<!-- <script src="../cloudinary/src/cloudinary.js" type="text/javascript"></script> -->

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

require '../cloudinary/src/Error.php';
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
    background: #fae76a;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}

input[type="submit"] {
    background: #fae76a;
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
 echo "<div id='result'><h5 style='color:green'>The latest Logo for " . $companyName . " was uploaded by " .  $fname . " " . $lname . " on " . $fileUploaded . ".</h5></div>";
} else {
  echo "<div id='result'><h5 style='color:crimson'>No Logo has been uploaded for " . $_SESSION['companyName'] . " yet.</h5></div>";
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
$logoURL = "'" . $existingFile . "'";
  echo'
    <legend>View Logo</legend>  
    <form action="" method="post">  
          <input type="button" id="viewLogoBtn" value="View logo" onclick="window.open(' . $logoURL . ')"/>   
           
    </form>
    <br><br><br>';}?>

    <legend>Upload Logo</legend>      
       
 <form action="" method="post" enctype="multipart/form-data" onsubmit="AJAXSubmit(this); return false;">
  <fieldset>

    <p>
      <div style="visibility: hidden; margin-top:-40px"><label for="upload_preset">Unsigned upload Preset: <input type="text" name="upload_preset" value="fbydimql"></label></div>
    </p>
    <p>
      <label><h4>Select your Logo:</h4>
      <input type="file" name="file"></label>
    </p>
    
    <p>
      <input type="submit" value="Upload" />
    </p>
    <div style="visibility: hidden">
    <img id="uploaded">
    </div>
    <div style="min-height:125px;max-width:800px;white-space:pre-line;overflow-x:overlay;" id="results"></div>
  </fieldset>
</form>

<?php
if(isset($_SESSION['companyName'])) $companyName = $_SESSION['companyName'];
$partnerID = $_GET['id'];
?>

<script>
  var partnerID;        
  partnerID = "<?php echo $partnerID;?>"
    //console.log("partnerID: ", partnerID);
    var companyName;        
    companyName = "<?php echo $companyName;?>"
    //console.log("partnerID: ", partnerID);
  var logoURL;

  window.ajaxSuccess = function () {
	response = JSON.parse(this.responseText);
  //console.log("ajaxSuccess", typeof this.responseText);
  document.getElementById('uploaded').setAttribute("src", logoURL = response["secure_url"]);
  state = "complete";
  console.log("partnerID: ", partnerID)
  console.log("url: ", logoURL)
  //console.log("pages: ", pages)
  document.getElementById('results').innerText = this.responseText;
  document.getElementById('results').innerText = "The file was successfully uploaded!";


  $.ajax({
	 method: "POST",
	 url: "../portal/inc/page/workBench/editAgent/func_updateServer.php",
	 data: { data1:partnerID, data2:logoURL}
          })
            .done(function(html){//function block runs if Ajax request was successful
              $('#result').html("The file was successfully uploaded to the server")
              alert("The new logo for Partner: " + companyName + " was uploaded to the following URL: " + logoURL );    
              window.open(logoURL,'_blank'); 
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


    <form action="" method="post">     
          <input type="submit" id="finishLogoBtn" name="finishLogoBtn" value="Finished" style="float:right;">
    </form>
                                                
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