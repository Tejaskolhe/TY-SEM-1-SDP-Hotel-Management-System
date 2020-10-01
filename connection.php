<?php

$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "hotel";  
  
$link = mysqli_connect($host, $user, $password, $db_name); 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>