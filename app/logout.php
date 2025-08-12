<?php
session_start();
   
        unset($_SESSION['cms_user'], $_SESSION['privilege']);
        session_destroy();
        $success = 'You have logged out';
        include('index.php');


?>