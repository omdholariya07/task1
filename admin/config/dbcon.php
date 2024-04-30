<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "phpadminpanel";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    header("Location: ../errors/db.php");
    die();
    
}
