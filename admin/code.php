<?php
include('authentication.php');
include('config/dbcon.php');

if(isset($_POST['logout_btn']))
{
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    
    $_SESSION['status']= "Logged out successfully";
    header('Location: login.php');
    exit();
}

if(isset($_POST['check_Emailbtn']))
{
    $email = $_POST['email'];

    $checkemail = "SELECT email FROM user WHERE email='$email'";
    $checkemail_run = mysqli_query($conn, $checkemail);
   // print_r($checkemail_run);
   // exit();
    if(mysqli_num_rows($checkemail_run) > 0)
    {
      echo "Email id already exists.!";
    }
    else
    {
        echo "It's Available";
    }
}


if(isset($_POST['addUser']))
{
   
   $firstname = $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $city = $_POST['city'];  
   $state = $_POST['state'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $userimage = $_FILES['userimage'];
   
   $allowed_extension = array('png','jpg','jpeg');
   $file_extension = pathinfo($userimage, PATHINFO_EXTENSION);

   $filename = time().'.'.$file_extension;
   if(!in_array($file_extension,$allowed_extension))
   {
      $_SESSION['status'] = "You are allowed with only jpg,png,jpeg image";
      header('Location: create-user.php');
      exit();
   }
   else
   {
     $query = "INSERT INTO `user` (`firstname`,`lastname`,`city`,`state`,`email`,`password`,`userimage`) VALUES ('$firstname','$lastname','$city','$state','$email','$password','$userimage','$filename')";
     $query_run = mysqli_query($conn, $query);
     if($query_run)
     {
        move_uploaded_file($_FILES['image']['tmp_name'],'uploads/product/'.$filename);
        $_SESSION['status'] = "image added successfully";
        header('Location: create-user.php');
        exit();
     }
     else{
        $_SESSION['status'] = "image something went wrong";
        header('Location: create-user.php');
        exit();
     }
   }



   if($password ==  $confirmpassword)
   {
    $checkemail = "SELECT email FROM user WHERE email='$email'";
    $checkemail_run = mysqli_query($conn, $checkemail);

    if(mysqli_num_rows($checkemail_run) >0)
    {
      // already exit
     $_SESSION['status'] = "Email id already exists.!";
     header("Location: create-user.php");
     exit;
    }
    else
    {
        // record not found
        $user_query = "INSERT INTO `user` (`firstname`,`lastname`,`city`,`state`,`email`,`password`,`userimage`) VALUES ('$firstname','$lastname','$city','$state','$email','$password','$userimage')";
   
        $user_query_run = mysqli_query($conn,$user_query);
        
        if($user_query_run)
        {
         $_SESSION['status'] = "user added successfully";
          header("Location: create-user.php");
        }
        else{
         $_SESSION['status'] = "user registration failed";
         header("Location: create-user.php");
        }    
    }

   
}
else 
{
    $_SESSION['status'] = "Password and Confirm Password does not match";
    header("Location: create-user.php");
}
   }
   
if(isset($_POST["updateUser"]))
{
   $user_id = $_POST['user_id'];
   $firstname = $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $city = $_POST['city'];  
   $state = $_POST['state'];
   $email = $_POST['email'];
   $userimage = $_POST['userimage'];

   $query = "UPDATE user SET firstname='$firstname',lastname='$lastname',city='$city',state='$state',email='$email',userimage='$userimage' WHERE id='$user_id' ";
   $query_run = mysqli_query($conn,$query);

   if($query_run)
   {
    $_SESSION['status'] = "user Updated successfully";
     header("Location: create-user.php");
   }
   else{
    $_SESSION['status'] = "user updating failed";
    header("Location: create-user.php");
   }
}

if(isset($_POST["DeleteUserbtn"]))
{
    $userid = $_POST["delete_id"];

    $query = "DELETE FROM user WHERE id='$userid' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
   {
    $_SESSION['status'] = "user Deleted successfully";
     header("Location: create-user.php");
   }
   else{
    $_SESSION['status'] = "user deleting failed";
    header("Location: create-user.php");
   }
}

?>