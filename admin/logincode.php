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
        $user_id = $row["id"];
        $user_name = $row["name"];
        $user_email = $row["email"];

     }
     $_SESSION['auth'] = true;
     $_SESSION['auth_user'] = [
       'user_id' =>$user_id,
       'user_name' => $user_id,
       'user_email' => $user_id,
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