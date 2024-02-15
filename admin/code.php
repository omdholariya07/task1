<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
   
   $firstname = $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $city = $_POST['city'];  
   $state = $_POST['state'];
   $email = $_POST['email'];
   $userimage = $_POST['userimage'];

   $user_query = "INSERT INTO `user` (`firstname`,`lastname`,`city`,`state`,`email`,`userimage`) VALUES ('$firstname','$lastname','$city','$state','$email','$userimage')";
  // print_r($_POST);
  // exit();
   $user_query_run = mysqli_query($conn,$user_query);
   
   if($user_query_run)
   {
    $_SESSION['status'] = "user add successfully";
     header("Location: create-user.php");
   }
   else{
    $_SESSION['status'] = "user registration failed";
    header("Location: create-user.php");
   }
}

?>