<?php

include('authentication.php');
include('config/dbcon.php');

if(isset($_POST['logout_btn']))
{
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
   $address= $_POST['address'];
   $city = $_POST['city'];  
   $state = $_POST['state'];
   $country = $_POST['country'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];
   $password = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
  
  if(isset($_FILES['userimage'])){
   $filename = $_FILES['userimage']['name'];
   $filesize = $_FILES['userimage']['size'];
   $tempname = $_FILES['userimage']['tmp_name'];
   $filetype = $_FILES['userimage']['type'];

   $folder = 'upload/'.$filename;
   move_uploaded_file($tempname, $folder);
 
  }
  
   $Dateofbirth = $_POST['Dob'] != '' ? "'".$_POST['Dob'] ."'" : "null";

   if($password ==  $confirmpassword)
   {
    
    $checkemail = "SELECT email FROM user WHERE email='$email'";
    $checkemail_run = mysqli_query($conn, $checkemail);

    if(mysqli_num_rows($checkemail_run) >0)
    {
     $_SESSION['status'] = "Email id already exists.!";
     header("Location: create-user.php");
     exit;
    }
    else
    {
        
        if (isset($_POST['addUser'])) {    
            
               $user_query = "INSERT INTO `user` (`firstname`,`lastname`,`address`,`city`,`state`,`country`,`email`,`gender`,`password`,`userimage`,`Dob`) VALUES ('$firstname','$lastname','$address','$city','$state','$country','$email','$gender','$password','$folder',$Dateofbirth)";

               $user_query_run = mysqli_query($conn,$user_query);
         $_SESSION['status'] = "user added successfully";
          header("Location: datatable.php");
        }
        else{
         $_SESSION['status'] = "user registration failed";
         header("Location: datatable.php");
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
      $address= $_POST['address'];
      $city = $_POST['city'];  
      $state = $_POST['state'];
      $country = $_POST['country'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $Dateofbirth = $_POST['Dob'];
   
      // Check if a new image is uploaded
      if(isset($_FILES['userimage']) && $_FILES['userimage']['size'] > 0) {
          $filename = $_FILES['userimage']['name'];
          $tempname = $_FILES['userimage']['tmp_name'];
          $folder = 'upload/'.$filename;
          move_uploaded_file($tempname, $folder);
          
          // Update user with new image
          $query = "UPDATE user SET firstname='$firstname',lastname='$lastname',address='$address',city='$city',state='$state',country='$country',email='$email',gender='$gender',userimage='$folder',Dob='$Dateofbirth' WHERE id='$user_id' ";
      } else {
          // If no new image is uploaded, retain the old image path
          $userimage = $_POST['old_userimage'];

          // Update user without changing the image
          $query = "UPDATE user SET firstname='$firstname',lastname='$lastname',address='$address',city='$city',state='$state',country='$country',email='$email',gender='$gender',Dob='$Dateofbirth' WHERE id='$user_id' ";
      }
   
      $query_run = mysqli_query($conn,$query);
   
      if($query_run)
      {
          $_SESSION['status'] = "User Updated successfully";
          header("Location: datatable.php");
      }
      else{
          $_SESSION['status'] = "User updating failed";
          header("Location: datatable.php");
      }
   }

 // delete user

if(isset($_POST["DeleteUserbtn"]))
{
    $userid = $_POST["delete_id"];

    $query = "DELETE FROM user WHERE id='$userid' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
   {
    $_SESSION['status'] = "user Deleted successfully";
     header("Location: datatable.php");
   }    
   else{
    $_SESSION['status'] = "user deleting failed";
    header("Location: datatable.php");
   }
}

// view user
if(isset($_POST['viewUser'])) {
    $user_id = $_POST['user_id'];
    header("Location: user-profile.php?user_id=$user_id");
    exit();
}

//CSV
// Check if the CSV button is clicked
if(isset($_POST['generate_csv'])) {
    // File name for download
    $filename = "users_" . date('Ymd') . ".csv";

    // Set headers for CSV file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Open file pointer
    $output = fopen('php://output', 'w');

    // Fetch user data from database
    $query = "SELECT id, firstname, lastname, address, city, state, country, email, gender, Dob FROM user";
    $result = mysqli_query($conn, $query);

    // Write CSV headers
    fputcsv($output, array('ID', 'First Name', 'Last Name', 'Address', 'City', 'State', 'Country', 'Email', 'Gender', 'Date of Birth'));

    // Write CSV rows
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    // Close file pointer
    fclose($output);

    // Exit script after generating CSV
    exit();
}
?>  
