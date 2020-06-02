<?php
include_once '/home/eipchpco/beta.wiapp.it/inc/required/sessions.php';
    
    if(isset($_SESSION['id'])) {
        header("location:/connections");
    } else {
        header("location:/index");
}
?>