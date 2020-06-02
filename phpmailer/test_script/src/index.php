<?php include_once '/home/eipchpco/beta.wiapp.it/inc/required/sessions.php';?>
<?php require_once '/home/eipchpco/beta.wiapp.it/inc/detect.php';?>
<?php if(isset($_SESSION['id'])) header("location:/connections.php");?>

<?php
if (Detect::isiOS()) { //browser reported as an iPhone/iPod touch -- do something here
    //echo 'iPhone';
    $_SESSION['iPhone'] = "yes";
    if(!isset($_SESSION['iPhoneModel'])) header("location: /iphone/iphone.php");
    if(isset($_SESSION['iPhoneModel'])) header("location: /m.login.php");
    }
else if (Detect::isAndroidOS()) { //browser reported as an Android -- do something here
    //echo 'Android';
    $_SESSION['iPhone'] = "no";
    header("location: /m.login.php");

    }
else if (Detect::isTablet()) {//browser reported as tablet device -- do something here
    //echo 'Tablet';
    $_SESSION['iPhone'] = "no";
    header("location: /m.login.php");

    }
else if (Detect::isComputer()) {
    $_SESSION['iPhone'] = "no";
    $notmobile = 101;
    //echo 'Computer';
    header("location: /login.php");
    }   
else { //browser reported as other mobile device -- do something here
    //echo 'Other Mobile';
    $_SESSION['iPhone'] = "no";
    header("location: /m.login.php");
}

?>

