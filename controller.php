<?php

/* GLOBAL VARIABLES */ 
$basePath = "http://127.0.0.1/php/";
$password = "1234";
$dbName = "testdb";
$user = "robert";


function OpenCon()
{
    $dbhost = $basePath;
    $dbuser = $user;
    $dbpass = $password;
    $db = $dbName;
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
}
 
function CloseCon($conn)
 {
 $conn -> close();
 }
 
 


?>