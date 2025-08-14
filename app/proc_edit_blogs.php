<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

// Function to resize uploaded image
function resizeImage($sourcePath, $destinationPath, $maxWidth, $maxHeight) {
    $info = getimagesize($sourcePath);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($sourcePath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($sourcePath);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($sourcePath);
            break;
        default:
            return false;
    }

    $origWidth = imagesx($image);
    $origHeight = imagesy($image);
    $ratio = min($maxWidth / $origWidth, $maxHeight / $origHeight);
    $newWidth = (int)($origWidth * $ratio);
    $newHeight = (int)($origHeight * $ratio);

    $newImage = imagecreatetruecolor($newWidth, $newHeight);

    if ($mime == 'image/png' || $mime == 'image/gif') {
        imagecolortransparent($newImage, imagecolorallocatealpha($newImage, 0, 0, 0, 127));
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
    }

    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($newImage, $destinationPath, 90);
            break;
        case 'image/png':
            imagepng($newImage, $destinationPath);
            break;
        case 'image/gif':
            imagegif($newImage, $destinationPath);
            break;
    }

    imagedestroy($image);
    imagedestroy($newImage);
    return true;
}

// Get form data
$id = mysqli_real_escape_string($conn, $_POST['id']);
$token = mysqli_real_escape_string($conn, $_POST['token']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$date = mysqli_real_escape_string($conn, $_POST['date_published']);

$allowed_extensions = ["jpg", "jpeg", "png", "gif"];

// Validate required fields
if (empty($title) || empty($author) || empty($content) || empty($category) || empty($date)) {
    $error = 'All fields are required.';
    include('edit-blogs.php');
    exit;
}

// Fetch existing image
$query = "SELECT cat_img FROM blog_categories WHERE token = '$token'";
$result = mysqli_query($conn, $query);
$existing = mysqli_fetch_assoc($result);
$existing_image = $existing['cat_img'] ?? '';

// Handle image upload
$image_tmp = $_FILES['cat_img']['tmp_name'] ?? null;
$image_ext = $image_tmp ? strtolower(pathinfo($_FILES['cat_img']['name'], PATHINFO_EXTENSION)) : null;

$update_fields = "
    title = '$title', 
    author = '$author', 
    content = '$content',
    category = '$category',
    date_published = '$date'
";

if ($image_tmp && in_array($image_ext, $allowed_extensions)) {
    $upload_dir = "uploads/blogs/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $image_path = $upload_dir . "blog_" . $id . "." . $image_ext;
    if (move_uploaded_file($image_tmp, $image_path)) {
        resizeImage($image_path, $image_path, 845, 740);
        $update_fields .= ", cat_img = '$image_path'";
    } else {
        $error = 'Failed to upload image.';
        include('edit-blogs.php');
        exit;
    }
} elseif (!$existing_image && !$image_tmp) {
    $error = 'Image is required because none exists.';
    include('edit-blogs.php');
    exit;
}

// Update query
$query = "UPDATE blog_categories SET $update_fields WHERE token = '$token'";
if (!mysqli_query($conn, $query)) {
    $error = 'Failed to update blog details.';
    include('edit-blogs.php');
    exit;
}

$success = 'Blog updated successfully.';
include('edit-blogs.php');
exit;
?>
