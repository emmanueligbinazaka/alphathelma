<?php
session_start();
    include('includes/connect.php');
    require_once('includes/fns.php');

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $privilege = mysqli_real_escape_string($conn, $_POST['privilege']);
    $id = $_POST['id'];

    if(!$firstname || !$lastname || !$username || !$password || !$privilege)
    {
        $error = 'All information required';
        include('./edit-user.php');
        exit;
    }

    $query = "update login set firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$password', privilege = '$privilege' where id = '$id'";

    
    $result = mysqli_query($conn, $query);
    if($result)
    {
        $success = $username.' has been updated to system';
        include('user_manage.php');
    } else
{
    $error = 'The username already exists';
    include('./edit-user.php');
    exit;
  
    }

?>