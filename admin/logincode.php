<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM user WHERE email ='$email' AND password ='$password' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
     foreach($login_query_run as $row){
        $user_id = $row['id'];
        $user_firstname = $row['firstname'];
       // $user_lastname = $row["lastname"];
       // $user_city = $row["city"];
       // $user_state = $row["state"];
        $user_email = $row['email'];
       // $user_userimage = $row["userimage"];

     }

     $_SESSION['auth'] = true;
     $_SESSION['auth_user'] = [
       'user_id'=>$user_id,
      'user_firstname'=>$user_firstname,
     //'user_lastname' => $user_lastname,
     // 'user_city' => $user_city,
      //'user_state' => $user_state,
       'user_email'=>$user_email,
       //'user_userimage' => $user_userimage
     ];

     $_SESSION['status'] = "Logged In Successfully";
     header('Location: index.php');
    }

    else
    {
        $_SESSION['status'] = "Invalid Email or Password";
        header('Location: login.php');
    }
}
else
{
    $_SESSION['status'] = "Access Denied";
    header('Location: login.php');
}
?>