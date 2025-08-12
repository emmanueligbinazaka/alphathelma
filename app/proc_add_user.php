<?php
session_start();
    include('includes/connect.php');
    require_once('includes/fns.php');
 
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $privilege = mysqli_real_escape_string($conn, $_POST['privilege']);

    if(!$firstname || !$lastname || !$username || !$password || !$privilege)
    {
        $error = 'All information required';
        include('add_user.php');
        exit;
    }

    $query = "insert login set firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$password', privilege = '$privilege'";

    
    $result = mysqli_query($conn, $query);
    if($result)
    {
        $success = $username.' has been added to system';
        include('user_manage.php');
    } else
{
    $error = 'The username already exists';
    include('add_user.php');
    exit;
  
    }

?>