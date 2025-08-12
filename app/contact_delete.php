<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
    $error = "Invalid request method";
    header("Location: $return");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include('includes/connect.php');
    require_once('includes/fns.php');
    if (isset($_GET['id'])) {
        $check_id = $_GET['id'];
        $id =  $check_id;
         $query_1 = "delete from contact_form where id = '$id'";
        $result_1 = mysqli_query($conn, $query_1);
        header("Location: contact");
        exit;
    }
} else {
    $error = "Invalid request method";
    header("Location: contact");
    exit;
}

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//     session_start();
//     include('includes/connect.php');
//     require_once('includes/fns.php');

//     $tab = base64_decode($_GET['tab']);
//     $return = base64_decode($_GET['return']);
//     $token =  ($_GET['token']);
//     $query = "delete from $tab where token = '$token' ";
//     mysqli_query($conn, $query);
//     header("Location: $return");
//     exit;
// } else {
//     $error = "Invalid request method";
//     header("Location: $return");
//     exit;
// }
