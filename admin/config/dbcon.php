<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "phpadminpanel";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    header("Location: ../errors/db.php");
    die();
    //die("Sorry we failed to connect: ". mysqli_connect_error());
}
//else{
   //echo "Connection was successful <br>";
//}   
?>