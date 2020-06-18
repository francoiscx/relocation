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