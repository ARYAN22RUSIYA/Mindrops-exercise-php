<?php
$servername = "localhost";
$username = "root";
$password = " " // My Sql Password;
$dbname = "myproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);
?>



