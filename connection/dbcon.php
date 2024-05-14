<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "registration_data"; 
$portno = "3307";

$con = mysqli_connect($servername, $username, $password, $database,$portno);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}