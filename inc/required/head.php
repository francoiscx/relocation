<?php 
include_once "sessions.php";

if(isset($_POST['exitApplication'])) {
unset($_SESSION['notmobile']);
unset($_SESSION['appID']);
unset($_SESSION['appType']);
unset($_SESSION['appDate']);
unset($_SESSION['resAppID']);
unset($_SESSION['appID']);
unset($_SESSION['appType']);
unset($_SESSION['appDate']);
unset($_SESSION['CCIdReq']);
unset($_SESSION['comAppID']);
unset($_SESSION['resAppID']);
unset($_SESSION['intAppID']);

unset($_SESSION['RCCountry']);
unset($_SESSION['RCProvince']);
unset($_SESSION['RCCity']);
unset($_SESSION['RCArea']);
unset($_SESSION['RCHouseNum']);
unset($_SESSION['RCAdr']);
unset($_SESSION['RCApUnNr']);
unset($_SESSION['RCApUnName']);
unset($_SESSION['RCFloor']);
unset($_SESSION['RCLifts']);
unset($_SESSION['RCTruck']);
unset($_SESSION['RCIdReq']);
unset($_SESSION['RDCountry']);
unset($_SESSION['RDProvince']);
unset($_SESSION['RDCity']);
unset($_SESSION['RDArea']);
unset($_SESSION['RDHouseNum']);
unset($_SESSION['RDAdr']);
unset($_SESSION['RDApUnNr']);
unset($_SESSION['RDApUnName']);
unset($_SESSION['RDFloor']);
unset($_SESSION['RDLifts']);
unset($_SESSION['RDTruck']);
unset($_SESSION['RDIdReq']);

header("Location: index.php");

} else {

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Relocation Station</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel-1.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel.css">
    <link rel="stylesheet" href="assets/css/dh-header-cover-image-button.css">
    <link rel="stylesheet" href="assets/css/dh-row-text-image-right-responsive.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid">
                <div id="logotop">
                    <a class="navbar-brand" style="font-weight:800;color: rgb(191,56,56);" href="index.php">RELOCATION STATION</a>
                </div>
                <div id="slogan" style="font-weight:800;margin-left:-240px;"><i>For all your relocation needs</i>
                    
                </div>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse"
                id="navcol-1" style="padding: -2px;">
                <ul class="nav navbar-nav ml-auto">


<?php if(isset($tranLoc)) {

    if(isset($_SESSION['appType'])) {
        // if($_SESSION['appType'] == "Residential") {
        //     $colLink = "applicationResCol.php";
        //     $delLink = "applicationResDel.php";
        //     $invLink = "applicationResReview.php";
        // } else if($_SESSION['appType'] == "Commercial") {
        //     $colLink = "applicationComCol.php";
        //     $delLink = "applicationComDel.php";
        //     $invLink = "applicationComReview.php";
        // } else if($_SESSION['appType'] == "International") {
        //     $colLink = "applicationIntCol.php";
        //     $delLink = "applicationIntDel.php";
        //     $invLink = "applicationIntReview.php";
        // } else {
        //     header("Location: application.php");
        // }
    

    if($tranLoc == "app") {
        echo'
        <li class="nav-item" role="presentation"><a class="nav-link active" href="application.php" style="padding: 16px;">General Details</a></li>';?>
        <?php if(isset($colLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link "href="' . $colLink . '" style="padding: 16px;">Collection</a></li>';?>
        <?php if(isset($delLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $delLink . '" style="padding: 16px;">Delivery</a></li>';?>
        <?php if (isset($invLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $invLink . '" style="padding: 16px;">Review</a></li>';?>
        </ul>
        <form method="post" action=""><button type="submit" class="btn btn-primary" type="button" name="exitApplication" value="exit">Exit Application</button></form>
    <?php }

     if($tranLoc == "exi") {
        echo'
        <li class="nav-item" role="presentation"><a class="nav-link active" href="application.php" style="padding: 16px;">General Details</a></li>';?>
        <?php if(isset($colLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $colLink . '" style="padding: 16px;">Collection</a></li>';?>
        <?php if(isset($delLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $delLink . '" style="padding: 16px;">Delivery</a></li>';?>
        <?php if (isset($invLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $invLink . '" style="padding: 16px;">Review</a></li>';?>
        </ul>
        <form method="post" action=""><button type="submit" class="btn btn-primary" type="button" name="exitApplication" value="exit">Exit Application</button></form>
        
    <?php } else if($tranLoc == "col") {
        echo'
        <li class="nav-item" role="presentation"><a class="nav-link" href="application.php" style="padding: 16px;">General Details</a></li>';?>
        <?php if(isset($colLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="' . $colLink . '" style="padding: 16px;">Collection</a></li>';?>
        <?php if(isset($delLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $delLink . '" style="padding: 16px;">Delivery</a></li>';?>
        <?php if (isset($invLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $invLink . '" style="padding: 16px;">Review</a></li>';?>
        </ul>
        <form method="post" action=""><button type="submit" class="btn btn-primary" type="button" name="exitApplication" value="exit">Exit Application</button></form>
        
    <?php } else if($tranLoc == "del") {
        echo'
        <li class="nav-item" role="presentation"><a class="nav-link" href="application.php" style="padding: 16px;">General Details</a></li>';?>
        <?php if(isset($colLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $colLink . '" style="padding: 16px;">Collection</a></li>';?>
        <?php if(isset($delLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="' . $delLink . '" style="padding: 16px;">Delivery</a></li>';?>
        <?php if (isset($invLink)) echo '<li class="nav-item" role="presentation"><a class="nav-link" href="' . $invLink . '" style="padding: 16px;">Review</a></li>';?>
        </ul>
        <form method="post" action=""><button type="submit" class="btn btn-primary" type="button" name="exitApplication">Exit Application</button></form>
    
    <?php } else if($tranLoc == "inv") {
        echo'
        </ul><button class="btn btn-primary" type="button" name="exitApplication" value="exit" onclick="changeLocation()">Exit Application</button>';
     }
    }   

} else {
    echo'
    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php" style="padding: 16px;">Home</a></li>
    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php#about" style="padding: 16px;">About Us</a></li>
    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php#services" style="padding: 16px;">Services</a></li>
    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php#partners" style="padding: 16px;">Partners</a></li>';
    
    if(!isset($page) || ($page == "!partner")) echo' </ul><a href="application.php"><button class="btn btn-primary" type="button">Get a Quote Now!</button></a>
    </ul><a href="partnerApplication.php"><button class="btn" style="color:#BF3838; background-color:white; margin-left:20px" type="button">Become a Partner</button></a>
    ';}

}
?>
   
   


