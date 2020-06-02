<?php
session_start();
if(!isset($_POST['width']) || !isset($_POST['height']) || !is_numeric($_POST['width']) || !is_numeric($_POST['height']))
{
    exit("invald height or width");
}
$_SESSION['height'] = $_POST['height'];
$_SESSION['width'] = $_POST['width'];
echo "success";
?>