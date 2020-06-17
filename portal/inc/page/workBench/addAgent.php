<?php if(isset($_SESSION['newAgentEntery'])) {
    
    unset($_SESSION['country']);
    unset($_SESSION['province']);
    unset($_SESSION['town']);
    unset($_SESSION['area']);
    unset($_SESSION['lat']);
    unset($_SESSION['lng']);
    unset($_SESSION['agent']);
    unset($_SESSION['cell']);
    unset($_SESSION['aemail']);
    unset($_SESSION['newAgentEntery']);
    
    unset($_POST['newAgentCountry']);
    unset($_POST['newAgentProvince']);
    unset($_POST['newAgentTown']);
    unset($_POST['newAgentArea']);
    unset($_POST['newAgentlat']);
    unset($_POST['newAgentlng']);
    unset($_POST['newAgentName']);
    unset($_POST['newAgentCell']);
    unset($_POST['newAgentEmail']);
    unset($_POST['clearFormBtn']);

}

?>


<style>
    input#clearFormBtn {
    background: gold;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}

input#addAgentBtn {
    background: #83B63E;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}

.box-body {
    height: 200%;
}
</style>

          <!-- TO DO List -->
          <div class="box">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->
            </div>

            <!-- /.box-header -->
                <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->



                    <?php
                            include_once '../inc/required/sessions.php';
                            include_once '../inc/required/database.php';
                            include_once '../inc/required/utilities.php';

                            $page = "partner";

                            require_once '../inc/required/detect.php';

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

                            include_once 'inc/required/head.php';

                            if(isset($_POST['submitApplication'])) {

                                $form_errors = array();
                                
                                //list all required fields
                                $required_fields = array ('companyName', 'companyRegistrationNumber', 'title', 'firstname','lastname', 'email','emailnotify', 'address', 'townCity', 'suburb', 'postalCode', 'services');
                                
                                //call function to check empty fields
                                $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
                                
                                //define fields that require checking for minimum length and indicate min
                                $fields_to_check_length = array('firstname' => 2, 'lastname' => 3, 'email' => 12);
                                
                                //call function to check fields lengths
                                $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
                                
                                //email validation and merge returned data
                                $form_errors = array_merge($form_errors, check_email($_POST));
                                
                                //check if error array is empty. If YES then collect form vars
                                if(empty($form_errors)) {
                                
                                
                                if(isset($_POST['companyName']) && ($_POST['companyName'] != "")) {$_SESSION['app_companyName'] = $_POST['companyName'];} else {$_SESSION['app_companyName'] == "";}
                                    $app_companyName = $_SESSION['app_companyName'];
                                if(isset($_POST['companyRegistrationNumber']) && ($_POST['companyRegistrationNumber'] != "")) {$_SESSION['app_companyRegistrationNumber'] = $_POST['companyRegistrationNumber'];} else {$_SESSION['app_companyRegistrationNumber'] == "";}
                                    $app_companyRegistrationNumber = $_SESSION['app_companyRegistrationNumber'];
                                if(isset($_POST['title']) && ($_POST['title'] != "")) {$_SESSION['app_title'] = $_POST['title'];} else {$_SESSION['app_title'] == "";}
                                    $app_title = $_SESSION['app_title'];
                                if(isset($_POST['firstname']) && ($_POST['firstname'] != "")) {$_SESSION['app_firstname'] = $_POST['firstname'];} else {$_SESSION['app_firstname'] == "";}
                                    $app_firstname = $_SESSION['app_firstname'];
                                if(isset($_POST['lastname']) && ($_POST['lastname'] != "")) {$_SESSION['app_lastname'] = $_POST['lastname'];} else {$_SESSION['app_lastname'] == "";}
                                    $app_lastname = $_SESSION['app_lastname'];
                                if(isset($_POST['companyNumber']) && ($_POST['companyNumber'] != "")) {$_SESSION['app_companyNumber'] = $_POST['companyNumber'];} else {$_SESSION['app_companyNumber'] == "";}
                                    $app_companyNumber = $_SESSION['app_companyNumber'];
                                if(isset($_POST['email']) && ($_POST['email'] != "")) {$_SESSION['app_email'] = $_POST['email'];} else {$_SESSION['app_email'] == "";}
                                    $app_email = $_SESSION['app_email'];
                                if(isset($_POST['emailnotify']) && ($_POST['emailnotify'] != "")) {$_SESSION['app_emailnotify'] = $_POST['emailnotify'];} else {$_SESSION['app_emailnotify'] == "";}
                                    $app_emailnotify = $_SESSION['app_emailnotify'];
                                if(isset($_POST['address']) && ($_POST['address'] != "")) {$_SESSION['app_address'] = $_POST['address'];} else {$_SESSION['app_address'] == "";}
                                    $app_address = $_SESSION['app_address'];
                                if(isset($_POST['suburb']) && ($_POST['suburb'] != "")) {$_SESSION['app_suburb'] = $_POST['suburb'];} else {$_SESSION['app_suburb'] == "";}
                                    $app_suburb = $_SESSION['app_suburb'];
                                if(isset($_POST['townCity']) && ($_POST['townCity'] != "")) {$_SESSION['app_townCity'] = $_POST['townCity'];} else {$_SESSION['app_townCity'] == "";}
                                    $app_townCity = $_SESSION['app_townCity'];
                                if(isset($_POST['postalCode']) && ($_POST['postalCode'] != "")) {$_SESSION['app_postalCode'] = $_POST['postalCode'];} else {$_SESSION['app_postalCode'] == "";}
                                    $app_postalCode = $_SESSION['app_postalCode'];
                                if(isset($_POST['sudo']) && ($_POST['sudo'] != "")) {$_SESSION['app_services'] = $_POST['sudo'];} else {$_SESSION['app_services'] == "";}
                                    $app_services = $_SESSION['app_services'];
                                
                                
                                if(isset($_POST['companyName'])
                                && isset($_POST['companyRegistrationNumber'])
                                && isset($_POST['title'])
                                && isset($_POST['firstname'])
                                && isset($_POST['lastname'])
                                && isset($_POST['companyNumber'])
                                && isset($_POST['email'])
                                && isset($_POST['emailnotify'])
                                && isset($_POST['address'])
                                && isset($_POST['suburb'])
                                && isset($_POST['townCity'])
                                && isset($_POST['postalCode'])
                                && isset($_POST['sudo'])) {


        
                                    $a = $_POST['sudo'];

                                    if (strpos($a, 'Residential') !== false) {
                                        $residential = 1;
                                    }
                            
                                    if (strpos($a, 'Commercial') !== false) {
                                        $commercial = 1;
                                    }
                            
                                    if (strpos($a, 'International') !== false) {
                                        $international = 1;
                                    }
                            
                                    if (strpos($a, 'Storage') !== false) {
                                        $storage = 1;
                                    }
                            
                                    if (strpos($a, 'Pet') !== false) {
                                        $pet = 1;
                                    }
                            
                                    if (strpos($a, 'Car') !== false) {
                                        $car = 1;
                                    }
                            
                                    if (strpos($a, 'Transport') !== false) {
                                        $transport = 1;
                                    }
                            
                                    if (strpos($a, 'Courier') !== false) {
                                        $courier = 1;
                                    }
                            
                                    if (strpos($a, 'Shuttle') !== false) {
                                        $shuttle = 1;
                                    }
                            
                                    if (strpos($a, 'Cleaning') !== false) {
                                        $cleaning = 1;
                                    }
                            
                                    if (strpos($a, 'Wrapping') !== false) {
                                        $wrapping = 1;
                                    }
                                    
                                    if (strpos($a, 'Packing') !== false) {
                                        $packing = 1;
                                    }
                                    
                                    if (strpos($a, 'Insurance') !== false) {
                                        $insurance = 1;
                                    }       
                                      
                                        if(!isset($residential)) $residential = 0;
                                        if(!isset($commercial)) $commercial = 0;
                                        if(!isset($international)) $international = 0;
                                        if(!isset($storage)) $storage = 0;
                                        if(!isset($pet)) $pet = 0;
                                        if(!isset($car)) $car = 0;
                                        if(!isset($transport)) $transport = 0;
                                        if(!isset($courier)) $courier = 0;
                                        if(!isset($shuttle)) $shuttle = 0;
                                        if(!isset($cleaning)) $cleaning = 0;
                                        if(!isset($wrapping)) $wrapping = 0;
                                        if(!isset($packing)) $packing = 0;
                                        if(!isset($insurance)) $insurance = 0;
                                    
                                    try{   
                                        //SQL statement to update card
                                        $sqlInsert = "INSERT INTO service_providers (companyName, companyRegistrationNumber, title, firstname, lastname, companyNumber, email, emailnotify, addresss, suburb, townCity, postalCode, services, residential, commercial, international, storage, pet, car, courier, shuttle, cleaning, wrapping, packing, insurance)
                                        VALUES (:companyName, :companyRegistrationNumber, :title, :firstname, :lastname, :companyNumber, :email, :emailnotify, :addresss, :suburb, :townCity, :postalCode, :services, :residential, :commercial, :international, :storage, :pet, :car, :courier, :shuttle, :cleaning, :wrapping, :packing, :insurance)";                                                  
                                        //use PDO prepared to sanitize SQL statement
                                        $statement = $db->prepare($sqlInsert);                                                               
                                        //execute the statement
                                        $statement->execute(array(':companyName' => $app_companyName, ':companyRegistrationNumber' => $app_companyRegistrationNumber, ':title' => $app_title, ':firstname' => $app_firstname, ':lastname' => $app_lastname, ':companyNumber' => $app_companyNumber, ':email' => $app_email, ':emailnotify' => $app_emailnotify, ':addresss' => $app_address, ':suburb' => $app_suburb, ':townCity' => $app_townCity, ':postalCode' => $app_postalCode, ':services' => $app_services, ':residential' => $residential, ':commercial' => $commercial, ':international' => $international, ':storage' => $storage, ':pet' => $pet, ':car' => $car, ':courier' => $courier, ':shuttle' => $shuttle, ':cleaning' => $cleaning, ':wrapping' => $wrapping, ':packing' => $packing, ':insurance' => $insurance));

                                        $_SESSION['applicatoinSent'] = 1;
                                
                                        unset($_SESSION['app_firstname']);
                                        unset($_SESSION['app_email']);
                                        unset($_SESSION['app_emailnotify']);
                                        unset($_SESSION['companyNumber']);
                                        unset($_SESSION['app_address']);
                                        unset($_SESSION['app_suburb']);
                                        unset($_SESSION['app_townCity']);
                                        unset($_SESSION['app_postalCode']);
                                        unset($_SESSION['app_services']);
                                    }
                                    catch (PDOException $ex){
                                        $result = "An error occurred: ".$ex->getMessage();
                                        //die($result);
                                    }
                                
                                }   
                                
                                } else {
                                
                                        if(count($form_errors) == 1) {   
                                            $result = "<h3 style='padding:20px; color:crimson'>There was 1 error in the form</h3>";
                                            } else {
                                            
                                                $result = "<h3 style='padding:20px; color:crimson'>There were " .count($form_errors). " errors in the form</h3>";
                                    }
                                }
                            }

                            ?>

                            <?php

                                    if(!isset($_SESSION['applicatoinSent'])) {

                                        include_once "partnerSignupPending.php";
                                    } else {           
                                        unset($_SESSION['applicatoinSent']);
                                        include_once "partnerSignupSuccess.php";
                                        
                                    }

                            ?>
                                
<style>
    select#services {
    margin: 23px 0 0 -170px;
    width: 300px;
    height: 193px;
}

button#submitApplication {
    margin-top: -80px;
}

.btn:not(:disabled):not(.disabled) {
    background-color: rgb(191,56,56);
    color: white;
    padding: 5px 37px;
    border: solid 1px rgb(191,56,56);
    border-radius: 24px;
}

</style>                                

            </div>
            <!-- /.box-body -->
            <br><br><br><br><br>
        </div>
          <!-- /.box -->

            <script>
                $(function() {
                    $('#services').change(function(e) {
                    var selected = $(e.target).val();
                    selected = selected.join("','");
                    window.selected = selected;
                    document.getElementById('sudo').value = "['" + selected + "']";
                    console.log (selected);
                    sudo = document.getElementById('sudo');
                    }); 
                });
            </script>


            <script>
                var value = <?php if(isset($_SESSION['app_services'])) {echo $_SESSION['app_services'];} else { echo"''";}?>,
                    el = document.getElementById("services");

                // value is the array.
                for (var j = 0; j < value.length; j++) {
                    for (var i = 0; i < el.length; i++) {
                        if (el[i].innerHTML == value[j]) {
                            el[i].selected = true;
                            //alert("option should be selected");
                        }
                    }
                }
            </script>

<?php
        unset($page);
    ?>