<?php
session_set_cookie_params(0); 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$universalName = "Removals";
$universalURL = "http://demoprojects.relocation.co.za";
$adminName = "Removals Administration";
$adminURL = "http://demoprojects.relocation.co.za/internal.php";

// Print_r ($_SESSION);
?>