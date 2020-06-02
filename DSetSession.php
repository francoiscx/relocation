<?php
session_start();
if(isset($_SESSION['appDetailsID'])) $appDetailID = $_SESSION['appDetailsID'];



if(isset($_POST['dCountry']) && ($_POST['dCountry'] != "")) {

    $dCountry = $_POST['dCountry'];
    $_SESSION['dCountry'] = $dCountry;
}


if(isset($_POST['dProvince'])) {
    $dProvince = $_POST['dProvince'];
    $_SESSION['dProvince'] = $dProvince;
}


if(isset($_POST['dCity'])) {
    $dCity = $_POST['dCity'];
    $_SESSION['dCity'] = $dCity;
}


if(isset($_POST['dArea'])) {
    $dArea = $_POST['dArea'];
    $_SESSION['dArea'] = $dArea;
}


if(isset($_POST['dHouseNum'])) {
    $dHouseNum = $_POST['dHouseNum'];
    $_SESSION['dHouseNum'] = $dHouseNum;
}


if(isset($_POST['dAdr'])) {
    $dAdr = $_POST['dAdr'];
    $_SESSION['dAdr'] = $dAdr;
}


if(isset($_POST['dApUnNr'])) {
    $dApUnNr = $_POST['dApUnNr'];
    $_SESSION['dApUnNr'] = $dApUnNr;
}


if(isset($_POST['dApUnName'])) {
    $dApUnName = $_POST['dApUnName'];
    $_SESSION['dApUnName'] = $dApUnName;
}


if(isset($_POST['dFloor'])) {
    $dFloor = $_POST['dFloor'];
    $_SESSION['dFloor'] = $dFloor;
}


if(isset($_POST['dLift'])) {
    $dLift = $_POST['dLift'];
    $_SESSION['dLiftsV'] = $dLift;
}


if(isset($_POST['dTruckoptions'])) {
    $_SESSION['dTruck'] = $_POST['dTruckoptions'];
    if($_SESSION['dTruck'] == "No") {
        $dTruckTI = '0';
        $_SESSION['dTruckTI'] = $dTruckTI;
        $dTruckHV = '0';
        $_SESSION['dTruckHV'] = $dTruckHV;
        $dTruckTV = '0';
        $_SESSION['dTruckTV'] = $dTruckTV;
    }
}


if(isset($_POST['dTruckoption'])) {
    $dTruckoption = $_POST['dTruckoption'];
    $_SESSION['dTruckTI'] = $dTruckoption;
}


if(isset($_POST['dTonval'])) {
    $dTonval = $_POST['dTonval'];
    $_SESSION['dTruckTV'] = $dTonval;
    $dTruckHV = 0;
    $_SESSION['dTruckHV'] = $dTruckHV;
}


if(isset($_POST['dHeival'])) {
    $dHeival = $_POST['dHeival'];
    $_SESSION['dTruckHV'] = $dHeival;
    $dTruckTV = 0;
    $_SESSION['dTruckTV'] = $dTruckTV;
}


if(isset($_POST['dIdReq'])) {
    $dIdReq = $_POST['dIdReq'];
    $_SESSION['dIdReq'] = $dIdReq;
}

?>