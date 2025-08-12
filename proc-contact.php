<?php 

session_start();
include('connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$firstname = mysqli_real_escape_string($conn, $_POST['firstname'] ?? '');
$lastname = mysqli_real_escape_string($conn, $_POST['lastname'] ?? '');
$email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
$message = mysqli_real_escape_string($conn, $_POST['message'] ?? '');
$subject = mysqli_real_escape_string($conn, $_POST['subject'] ?? '');

// $firstname = $_POST['firstname'];
// // $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
// $lastname = $_POST['lastname'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $message = $_POST['message'];
// $subject = $_POST['subject'];



if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($message) || empty($subject))
{
    $msg = 'error';
    $comment = 'All fields are required';
    include('contact.php');  
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email = '';
    $msg = 'error';
    $comment = 'Please enter a valid email';
    include('contact.php');
    exit;
}

if (strlen($phone) != 11) {
    $phone = '';
    $msg = 'error';
    $comment = 'Please enter valid GSM number';
    include('contact.php');
    exit;
}


// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// require 'PHPMailer/src/Exception.php';

// $mail = new PHPMailer(true);

// try {
//     // Server settings
//     $mail->isSMTP();
//     $mail->Host       = 'mail.cheapwebsitenigeria.com'; // Your SMTP server
//     $mail->SMTPAuth   = true;
//     $mail->Username   = 'noreply@cheapwebsitenigeria.com'; // Your email
//     $mail->Password   = 'Aledoy@2025!'; // Your password or app password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
//     $mail->Port       = 587;

//     // Recipients
//     $mail->setFrom('noreply@cheapwebsitenigeria.com', 'Next Frontier');
//     $mail->addAddress('youremail@gmail.com'); // Replace with receiver email
//     $mail->addReplyTo('', 'Jobrole Consulting');

//     // Content
//     $mail->isHTML(true);
//     $mail->Subject = 'Test Mail using PHPMailer';
//     $mail->Body    = '<h2>This is a test message sent from PHPMailer</h2>';
//     $mail->AltBody = 'This is a test message sent from PHPMailer (plain text)';

//     // Send the email
//     $mail->send();
//     echo '✅ Email has been sent successfully';
// } catch (Exception $e) {
//     echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }


// $conn = mysqli_connect('localhost', 'alpha_thelma', 'alphathelma', 'alpha_thelma');

// if (!$conn) {
//     echo 'Cannot connect to database server';
//     exit;
// }

// try {
    

// $conn = mysqli_connect('localhost', 'alphathe_lma', 'alphathelma', 'alphathe_lma');

// if (!$conn) {
//     echo 'Cannot connect to database server';
//     exit;
// }
// }
// catch (mysqli_sql_exception $th) {
//     echo $th->getMessage();
// }
 $query = "INSERT INTO contact_form set firstname = '$firstname', lastname = '$lastname', email = '$email', phone_no = '$phone', subject = '$subject', message = '$message' ";
$result = mysqli_query($conn,$query);




$msg = "success";
include('contact.php');

?>


<?php
// // Database connection
// $conn = mysqli_connect('localhost', 'alpha_thelma', 'alphathelma', 'alpha_thelma');

// if (!$conn) {
//     die('Cannot connect to database server');
// }

// // Get and sanitize input
// $firstname = trim($_POST['firstname']);
// $lastname = trim($_POST['lastname']);
// $email = trim($_POST['email']);
// $phone = trim($_POST['phone']);
// $subject = trim($_POST['subject']);
// $message = trim($_POST['message']);

// // Validate required fields
// if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($subject)) {
//     $msg = 'error';
//     $comment = 'All fields are required';
//     include('contact.php');
//     exit;
// }

// // Validate email
// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $msg = 'error';
//     $comment = 'Please enter a valid email';
//     include('contact.php');
//     exit;
// }

// // Validate phone number (basic check: exactly 11 digits)
// if (!preg_match('/^\d{11}$/', $phone)) {
//     $msg = 'error';
//     $comment = 'Please enter a valid GSM number';
//     include('contact.php');
//     exit;
// }

// // Use prepared statements to prevent SQL injection
// $stmt = $conn->prepare("INSERT INTO contact_form (firstname, lastname, email, phone_no, subject, message) VALUES (?, ?, ?, ?, ?, ?)");

// if ($stmt === false) {
//     $msg = 'error';
//     $comment = 'Failed to prepare database query.';
//     include('contact.php');
//     exit;
// }

// $stmt->bind_param("ssssss", $firstname, $lastname, $email, $phone, $subject, $message);

// if ($stmt->execute()) {
//     $msg = 'success';
// } else {
//     $msg = 'error';
//     $comment = 'Something went wrong. Please try again.';
// }

// $stmt->close();
// $conn->close();

// include('contact.php');
?>
