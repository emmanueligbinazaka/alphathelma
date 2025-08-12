<?php 
session_start();
include('includes/connect.php');
require_once('includes/fns.php');
$id = $_GET['id'];
echo $id; exit;
if(isset($_GET['status']) && !empty($_GET['status']))
{
    $status = $_GET['status'];
    

    $update = "UPDATE service_request SET status = 'Invoice raised' WHERE id = '".$id."'";

    if (mysqli_query($connect, $update))
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($connect);
    }
    die;
}
?>