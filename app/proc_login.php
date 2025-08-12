<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

if (!isset($_SERVER['HTTP_REFERER'])) {
    $error = "Invalid request method";
    include('index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    if(empty($username))
    {
        $error = "Username is required";
        include('index.php');
        exit;
    }
    
   

    if(empty($password))
    {
        $error = "Password is required";
        include('index.php');
        exit;
    }

   $check = "SELECT username FROM admin_login WHERE username = '$username'";
    $check_result = $conn->query($check);
    $check_num = mysqli_num_rows($check_result);
    $check_row = mysqli_fetch_array($check_result);

    if($check_num == false)
{
    $error = "Sorry no account is assosciated with this username";
    include('index.php');
    exit;
}

    if ($check_num > 0) {
    // Now check if password = username
    $pass_check = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'"; 
    $pass_result = $conn->query($pass_check);
    $pass_num = mysqli_num_rows($pass_result);
    
}

if ($pass_num == false) {
 
   $error = "wrong password. Try again";
  include('index.php');
  exit;
}



     if($pass_num == true)
    {
        $_SESSION['cms_user'] = $check_row['username'];
        $_SESSION['adminEmail'] = $check_row['email'];
        $_SESSION['privilege'] = $check_row['privilege'];
        $_SESSION['adminTimeStamp'] = time();
        
        if(($_SESSION['redirectStaffUser'] == 'Yes'))
        {              
            header('location: '.base64_decode($_SESSION['staffReturnPage']).' ');
            exit;
        }

        // $update = mysqli_query($db, "delete from invalid where username = '$username' ");
        header('location: dashboard');
        exit;
    }
}
else{
    $error = "Invalid request method";
    include('index.php');
    exit;
}

   
    // if($check_row['status']  == ('suspended'))
    // {        
    //     $error = "Your account has been suspended, kindly contact your the admin";
    //     include('index.php');
    //     exit;
    // }

    // if($check_row['status']  == ('blocked'))
    // {        
    //     $error = "Your account has been blocked, kindly contact your admin";
    //     header('location: logout?acc=blocked');
    //     exit;
    // }

    // if($check_row['status']  == ('pending'))
    // {
    //     $_SESSION['passwordUpdate'] = $username;
    //     $error = "You need to change your password before you can use the portal";
    //     include('update.php');
    //     exit;
    // }   

    // if($check_row['status']  == ('inactive'))
    // {
    //     $error = "Your account has been deactivated";
    //     include('index.php');
    //     exit;
    // }   

   