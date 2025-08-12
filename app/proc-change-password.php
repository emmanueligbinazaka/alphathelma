<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');


if (!isset($_SERVER['HTTP_REFERER'])) {
    $error = "Invalid request method";
    include('change_password.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $formFields = $_POST;

    $currentPassword = isset($formFields['currentPassword']) ? mysqli_real_escape_string($conn, $formFields['currentPassword']) : '';

    $newPassword = isset($formFields['newPassword']) ? mysqli_real_escape_string($conn, $formFields['newPassword']) : '';

    $confirmPassword = isset($formFields['confirmPassword']) ? mysqli_real_escape_string($conn, $formFields['confirmPassword']) : '';


    if (empty($currentPassword)) {
        $error = "Current password is required";
        include('change_password.php');
        exit;
    }

    if (empty($newPassword)) {
        $error = "New password is required";
        include('change_password.php');
        exit;
    }

    if (empty($confirmPassword)) {
        $error = "Confirm password is required";
        include('change_password.php');
        exit;
    }

    if ($newPassword != $confirmPassword) {
        $error = "Password do not match";
        include('change_password.php');
        exit;
    }

    if (strlen($newPassword) < 6) {
        $error = "Password cannot be less than 6 characters";
        include('change_password.php');
        exit;
    }

    $checkPassword = "select email, password, salt from admin_login where email = '" . $_SESSION['adminEmail'] . "' ";
    $checkPasswordResult = $conn->query("$checkPassword");
    $checkPasswordNum = mysqli_num_rows($checkPasswordResult);
    $checkPasswordRow = mysqli_fetch_array($checkPasswordResult);

    if ($checkPasswordNum == false) {
        $error = "Password cannot be changed at this time, try again later";
        include('change_password.php');
        exit;
    }

    if (!password_verify($currentPassword . $checkPasswordRow['salt'],   $checkPasswordRow['password'])) {
        $error = "Current password is incorrect";
        include('change_password.php');
        exit;
    } else {

        $newSalt = createToken();
        $newHash = password_hash($newPassword . $newSalt, PASSWORD_BCRYPT);

        $updatePassword = "update admin_login set 
            password = '$newHash', 
            salt = '$newSalt' where
            email = '" . $_SESSION['adminEmail']  . "' ";
        $updatePasswordResult = $conn->query($updatePassword);

        if ($updatePasswordResult) {
            $success = "Password has been changed successfully";
            header('location: logout?pass=success');
            exit;
        } else {
            $error = $updatePassword;
            include('change_password.php');
            exit;
        }
    }
} else {
    $error = "Invalid request method";
    include('change_password.php');
    exit;
}
