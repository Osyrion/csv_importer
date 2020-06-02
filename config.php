<?php

$basePath = "//127.0.0.1/exporter_csv";

// Database configuration
$dbHost     = "127.0.0.1";
$dbUsername = "universalusername";
$dbPassword = "1234";
$dbName     = "testdb";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);