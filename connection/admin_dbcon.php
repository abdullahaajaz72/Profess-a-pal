<?php
$servername = 'localhost';
$username = 'root';
$password = ''; 
$database = 'admin'; 
$portno = '3307';

$adcon = mysqli_connect($servername, $username, $password, $database, $portno);
// Check connection
if ($adcon->connect_error) {
    die("Connection failed: " . $adcon->connect_error);
}