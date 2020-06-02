<?php
session_start();
if(isset($_SESSION['appDetailsID'])) $appDetailsID = $_SESSION['appDetailsID'];



if(isset($_POST['cCountry']) && ($_POST['cCountry'] != "")) {

    $cCountry = $_POST['cCountry'];
    $_SESSION['cCountry'] = $cCountry;
}


if(isset($_POST['cProvince'])) {
    $cProvince = $_POST['cProvince'];
    $_SESSION['cProvince'] = $cProvince;
}


if(isset($_POST['cCity'])) {
    $cCity = $_POST['cCity'];
    $_SESSION['cCity'] = $cCity;
}


if(isset($_POST['cArea'])) {
    $cArea = $_POST['cArea'];
    $_SESSION['cArea'] = $cArea;
}


if(isset($_POST['cHouseNum'])) {
    $cHouseNum = $_POST['cHouseNum'];
    $_SESSION['cHouseNum'] = $cHouseNum;
}


if(isset($_POST['cAdr'])) {
    $cAdr = $_POST['cAdr'];
    $_SESSION['cAdr'] = $cAdr;
}


if(isset($_POST['cApUnNr'])) {
    $cApUnNr = $_POST['cApUnNr'];
    $_SESSION['cApUnNr'] = $cApUnNr;
}


if(isset($_POST['cApUnName'])) {
    $cApUnName = $_POST['cApUnName'];
    $_SESSION['cApUnName'] = $cApUnName;
}


if(isset($_POST['cFloor'])) {
    $cFloor = $_POST['cFloor'];
    $_SESSION['cFloor'] = $cFloor;
    if($_SESSION['cFloor' == "Ground"]) {
        $_SESSION['cLiftsV'] = 0;
    }
}
if(isset($_SESSION['cLiftsV']) && ($_SESSION['cLiftsV'] == "")) {
    $_SESSION['cLiftsV'] = 0;
}


if(isset($_POST['cLift'])) {
    $cLift = $_POST['cLift'];
    $_SESSION['cLiftsV'] = $cLift;
}



if(isset($_POST['cTruckoptions'])) {
    $_SESSION['cTruck'] = $_POST['cTruckoptions'];
    if($_SESSION['cTruck'] == "No") {
        $cTruckTI = '0';
        $_SESSION['cTruckTI'] = $cTruckTI;
        $cTruckHV = '0';
        $_SESSION['cTruckHV'] = $cTruckHV;
        $cTruckTV = '0';
        $_SESSION['cTruckTV'] = $cTruckTV;
    }
}


if(isset($_POST['cTruckoption'])) {
    $cTruckoption = $_POST['cTruckoption'];
    $_SESSION['cTruckTI'] = $cTruckoption;
}


if(isset($_POST['cTonval'])) {
    $cTonval = $_POST['cTonval'];
    $_SESSION['cTruckTV'] = $cTonval;
    $cTruckHV = 0;
    $_SESSION['cTruckHV'] = $cTruckHV;
}


if(isset($_POST['cHeival'])) {
    $cHeival = $_POST['cHeival'];
    $_SESSION['cTruckHV'] = $cHeival;
    $cTruckTV = 0;
    $_SESSION['cTruckTV'] = $cTruckTV;
}


if(isset($_POST['cIdReq'])) {
    $cIdReq = $_POST['cIdReq'];
    $_SESSION['cIdReq'] = $cIdReq;
}

?>