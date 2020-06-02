<?php
//initialize variables to hold connection parameters
//LOCALHOST
$user = 'francoiscx';
$dsn = 'mysql:host=localhost; dbname=removals';
$password = 'Fran5048!';


//LIVE SERVER
//$user = '7262removals';
//$dsn = 'mysql:host=localhost; dbname=7262_removals';
//$password = 'ZWsfyqFf8QNU';


try{
    //create an instance of PDO calss with the required parameters
    $db = new PDO($dsn, $user, $password);
    
    //set PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //display succcess message
    //echo "Connected to the register database";
    
} catch (PDOException $ex) {
    //display error message
    //echo "Connection failed ".$ex->getMessage();
    
}

//LOCAL HOST
$servername = "localhost";
$username = "removals";
$password = "Fran5048!";

//LIVE SERVER
//$servername = "7262_removals";
//$username = "7262removals";
//$password = "ZWsfyqFf8QNU";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
