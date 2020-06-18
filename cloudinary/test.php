<?php 
date_default_timezone_set('Africa/Johannesburg');
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/vendor/jquery.ui.widget.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.iframe-transport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.fileupload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-jquery-file-upload/2.1.2/cloudinary-jquery-file-upload.js"></script>
 


<?php

echo "Hello"; 


    require '/home/erasmusm/beta.kia-data.com/cloudinary/autoload.php';
 //   require '/home/erasmusm/beta.kia-data.com/cloudinary/Helpers.php'; 


\Cloudinary::config(array( 
  "cloud_name" => "dxrnquvix", 
  "api_key" => "236788698812818", 
  "api_secret" => "n86YpfTZDIT_-srqT9CC35EyRkA" 
));

?>






<input name="file" type="file" class="cloudinary-fileupload" data-cloudinary-field="image_id" 
   data-form-data="[upload-preset-and-other-upload-options-as-html-escaped-JSON-data]"></input>



<script>
    

$(document).ready(function() {
    $("input.cloudinary-fileupload[type=file]").cloudinary_fileupload();
});


</script>







 <script type="text/javascript">
    $(document).on("click",function(){
            $.ajax({
        cache: false,
        type: "GET",
        url: "modules/clickRefreshSession.php",
        success: function(data) {
        }
    });
  });
        
</script>

