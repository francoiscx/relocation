<?php
include_once '../inc/required/sessions.php';
include_once '../inc/required/database.php';
include_once '../inc/required/utilities.php';


if(isset($_SESSION['reviewEnteryToUpdate'])) {
$updateId = $_SESSION['reviewEnteryToUpdate'];

    if(isset($_POST['noActionBtn'])) {
        unset($_POST['noActionBtn']);
        unset($_SESSION['reviewEnteryToUpdate']);
        header("Location: ./index.php");
    }

    if(isset($_POST['rejectBtn'])) {
        unset($_POST['rejectBtn']);
        unset($_SESSION['reviewEnteryToUpdate']);
        $active = 0;
        $new = 0;
        $trial = 0;
        $suspended = 0;

        //SQL statement to update info
        $sqlUpdate = "UPDATE service_providers SET active =:active, new =:new, trial =:trial, suspended =:suspended WHERE serviceProviderID =:serviceProviderID";
        
        $statement = $db->prepare($sqlUpdate);
        $statement->execute(array(':active' => $active, ':new' => $new, ':trial' => $trial, ':suspended' => $suspended, ':serviceProviderID' => $updateId));
        if($statement->rowCount() > 0){
                // means updated
                include_once '';
                header("Location: ./index.php");
            }else{
                // means not updated
                echo "Something went wrong, please try again.";
        }
    }

    if(isset($_POST['trialBtn'])) {
        unset($_POST['trialBtn']);
        unset($_SESSION['reviewEnteryToUpdate']);
        $active = 1;
        $new = 0;
        $trial = 1;
        $suspended = 0;

        //SQL statement to update info
        $sqlUpdate = "UPDATE service_providers SET active =:active, new =:new, trial =:trial, suspended =:suspended WHERE serviceProviderID =:serviceProviderID";
        
        $statement = $db->prepare($sqlUpdate);
        $statement->execute(array(':active' => $active, ':new' => $new, ':trial' => $trial, ':suspended' => $suspended, ':serviceProviderID' => $updateId));
        if($statement->rowCount() > 0){
                // means updated
                include_once '';
                header("Location: ./index.php");
            }else{
                // means not updated
                echo "Something went wrong, please try again.";
        }
    }
    

    if(isset($_POST['liveBtn'])) {
        unset($_POST['liveBtn']);
        unset($_SESSION['reviewEnteryToUpdate']);
        $active = 1;
        $new = 0;
        $trial = 0;
        $suspended = 0;
    
        //SQL statement to update info
        $sqlUpdate = "UPDATE service_providers SET active =:active, new =:new, trial =:trial, suspended =:suspended WHERE serviceProviderID =:serviceProviderID";
        
        $statement = $db->prepare($sqlUpdate);
        $statement->execute(array(':active' => $active, ':new' => $new, ':trial' => $trial, ':suspended' => $suspended, ':serviceProviderID' => $updateId));
        if($statement->rowCount() > 0){
                // means updated
                include_once '';
                header("Location: ./index.php");
            }else{
                // means not updated
                echo "Something went wrong, please try again.";
        }
    }
}
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

    

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Relocation Station</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Card-Carousel-1.css">
    <link rel="stylesheet" href="../assets/css/Card-Carousel.css">
    <!-- <link rel="stylesheet" href="../assets/css/dh-header-cover-image-button.css"> -->
    <link rel="stylesheet" href="../assets/css/dh-row-text-image-right-responsive.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

</head>

<body>

<?php

// if(isset($_POST['submitApplication'])) {

//     $form_errors = array();
    
//     //list all required fields
//     $required_fields = array ('companyName', 'companyRegistrationNumber', 'title', 'firstname','lastname', 'email','emailnotify', 'address', 'townCity', 'suburb', 'postalCode', 'services');
    
//     //call function to check empty fields
//     $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    
//     //define fields that require checking for minimum length and indicate min
//     $fields_to_check_length = array('firstname' => 2, 'lastname' => 3, 'email' => 12);
    
//     //call function to check fields lengths
//     $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
    
//     //email validation and merge returned data
//     $form_errors = array_merge($form_errors, check_email($_POST));
    
//     //check if error array is empty. If YES then collect form vars
//     if(empty($form_errors)) {
    
    
//     if(isset($_POST['companyName']) && ($_POST['companyName'] != "")) {$_SESSION['app_companyName'] = $_POST['companyName'];} else {$_SESSION['app_companyName'] == "";}
//         $app_companyName = $_SESSION['app_companyName'];
//     if(isset($_POST['companyRegistrationNumber']) && ($_POST['companyRegistrationNumber'] != "")) {$_SESSION['app_companyRegistrationNumber'] = $_POST['companyRegistrationNumber'];} else {$_SESSION['app_companyRegistrationNumber'] == "";}
//         $app_companyRegistrationNumber = $_SESSION['app_companyRegistrationNumber'];
//     if(isset($_POST['title']) && ($_POST['title'] != "")) {$_SESSION['app_title'] = $_POST['title'];} else {$_SESSION['app_title'] == "";}
//         $app_title = $_SESSION['app_title'];
//     if(isset($_POST['firstname']) && ($_POST['firstname'] != "")) {$_SESSION['app_firstname'] = $_POST['firstname'];} else {$_SESSION['app_firstname'] == "";}
//         $app_firstname = $_SESSION['app_firstname'];
//     if(isset($_POST['lastname']) && ($_POST['lastname'] != "")) {$_SESSION['app_lastname'] = $_POST['lastname'];} else {$_SESSION['app_lastname'] == "";}
//         $app_lastname = $_SESSION['app_lastname'];
//     if(isset($_POST['companyNumber']) && ($_POST['companyNumber'] != "")) {$_SESSION['app_companyNumber'] = $_POST['companyNumber'];} else {$_SESSION['app_companyNumber'] == "";}
//         $app_companyNumber = $_SESSION['app_companyNumber'];
//     if(isset($_POST['email']) && ($_POST['email'] != "")) {$_SESSION['app_email'] = $_POST['email'];} else {$_SESSION['app_email'] == "";}
//         $app_email = $_SESSION['app_email'];
//     if(isset($_POST['emailnotify']) && ($_POST['emailnotify'] != "")) {$_SESSION['app_emailnotify'] = $_POST['emailnotify'];} else {$_SESSION['app_emailnotify'] == "";}
//         $app_emailnotify = $_SESSION['app_emailnotify'];
//     if(isset($_POST['address']) && ($_POST['address'] != "")) {$_SESSION['app_address'] = $_POST['address'];} else {$_SESSION['app_address'] == "";}
//         $app_address = $_SESSION['app_address'];
//     if(isset($_POST['suburb']) && ($_POST['suburb'] != "")) {$_SESSION['app_suburb'] = $_POST['suburb'];} else {$_SESSION['app_suburb'] == "";}
//         $app_suburb = $_SESSION['app_suburb'];
//     if(isset($_POST['townCity']) && ($_POST['townCity'] != "")) {$_SESSION['app_townCity'] = $_POST['townCity'];} else {$_SESSION['app_townCity'] == "";}
//         $app_townCity = $_SESSION['app_townCity'];
//     if(isset($_POST['postalCode']) && ($_POST['postalCode'] != "")) {$_SESSION['app_postalCode'] = $_POST['postalCode'];} else {$_SESSION['app_postalCode'] == "";}
//         $app_postalCode = $_SESSION['app_postalCode'];
//     if(isset($_POST['sudo']) && ($_POST['sudo'] != "")) {$_SESSION['app_services'] = $_POST['sudo'];} else {$_SESSION['app_services'] == "";}
//         $app_services = $_SESSION['app_services'];
    
    
//     if(isset($_POST['companyName'])
//     && isset($_POST['companyRegistrationNumber'])
//     && isset($_POST['title'])
//     && isset($_POST['firstname'])
//     && isset($_POST['lastname'])
//     && isset($_POST['companyNumber'])
//     && isset($_POST['email'])
//     && isset($_POST['emailnotify'])
//     && isset($_POST['address'])
//     && isset($_POST['suburb'])
//     && isset($_POST['townCity'])
//     && isset($_POST['postalCode'])
//     && isset($_POST['sudo'])) {
        
//         try{   
//             //SQL statement to update card
//             $sqlInsert = "INSERT INTO service_providers (companyName, companyRegistrationNumber, title, firstname, lastname, companyNumber, email, emailnotify, addresss, suburb, townCity, postalCode, services)
//                           VALUES (:companyName, :companyRegistrationNumber, :title, :firstname, :lastname, :companyNumber, :email, :emailnotify, :addresss, :suburb, :townCity, :postalCode, :services)";                                                  
//             //use PDO prepared to sanitize SQL statement
//             $statement = $db->prepare($sqlInsert);                                                               
//             //execute the statement
//             $statement->execute(array(':companyName' => $app_companyName, ':companyRegistrationNumber' => $app_companyRegistrationNumber, ':title' => $app_title, ':firstname' => $app_firstname, ':lastname' => $app_lastname, ':companyNumber' => $app_companyNumber, ':email' => $app_email, ':emailnotify' => $app_emailnotify, ':addresss' => $app_address, ':suburb' => $app_suburb, ':townCity' => $app_townCity, ':postalCode' => $app_postalCode, ':services' => $app_services));
    
//             $_SESSION['applicatoinSent'] = 1;
    
            
//             unset($_SESSION['app_firstname']);
//             unset($_SESSION['app_companyNumber']);
//             unset($_SESSION['app_email']);
//             unset($_SESSION['app_emailnotify']);
//             unset($_SESSION['app_address']);
//             unset($_SESSION['app_suburb']);
//             unset($_SESSION['app_townCity']);
//             unset($_SESSION['app_postalCode']);
//             unset($_SESSION['app_services']);
    
//         }
//         catch (PDOException $ex){
//             $result = "An error occurred: ".$ex->getMessage();
//             //die($result);
//         }
    
//     }   
    
//     } else {
    
//             if(count($form_errors) == 1) {   
//                 $result = "<h3 style='padding:20px; color:crimson'>There was 1 error in the form</h3>";
//                 } else {
                
//                     $result = "<h3 style='padding:20px; color:crimson'>There were " .count($form_errors). " errors in the form</h3>";
//         }
//     }
// }

?>
        </div>
    </div>
</nav>

    <style>
    h1.text-center.aos-init.aos-animate {
        color: white;
    }

    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
        width: 100%;
    }

    button.btn.dropdown-toggle.bs-placeholder.btn-light {
        min-height: 40px;
    }

    .container {
        margin-top: 100px;
    }
    </style>
<?php

        if(!isset($_SESSION['applicatoinSent'])) {

            include_once "partnerReview.php";

        } else {           
            unset($_SESSION['applicatoinSent']);
            include_once "partnerSignupSuccess.php";
            

        }

?>

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
        // include_once '../inc/required/footer.php';
        unset($page);
    ?>