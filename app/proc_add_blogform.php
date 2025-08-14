<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

// Image resize function
function resizeImage($source_path, $dest_path, $new_width, $new_height) {
    list($width, $height, $type) = getimagesize($source_path);

    switch ($type) {
        case IMAGETYPE_JPEG:
            $src = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $src = imagecreatefrompng($source_path);
            break;
        case IMAGETYPE_GIF:
            $src = imagecreatefromgif($source_path);
            break;
        default:
            return false;
    }

    $dst = imagecreatetruecolor($new_width, $new_height);

    // Preserve transparency for PNG/GIF
    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
        imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
    }

    // Resize
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // Save
    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($dst, $dest_path, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($dst, $dest_path, 8);
            break;
        case IMAGETYPE_GIF:
            imagegif($dst, $dest_path);
            break;
    }

    imagedestroy($src);
    imagedestroy($dst);
    return true;
}

$title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');
$author = mysqli_real_escape_string($conn, $_POST['author'] ?? '');
$content = mysqli_real_escape_string($conn, $_POST['content'] ?? '');
$category = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
$date_published = mysqli_real_escape_string($conn, $_POST['date'] ?? date('Y-m-d'));

$allowed_exts = ["jpg", "jpeg", "png", "gif"];

// Validation
if (empty($title)) {
    $error = 'Title is required';
    include('./blog_form.php');
    exit;
}
if (empty($author)) {
    $error = 'Author is required';
    include('./blog_form.php');
    exit;
}
if (empty($content)) {
    $error = 'Content is required';
    include('./blog_form.php');
    exit;
}
if (empty($category)) {
    $error = 'Category is required';
    include('./blog_form.php');
    exit;
}

// Validate image upload
if (!isset($_FILES['image_path']) || $_FILES['image_path']['error'] !== UPLOAD_ERR_OK) {
    $error = 'Image is required';
    include('./blog_form.php');
    exit;
}

$image_tmp = $_FILES['image_path']['tmp_name'];
$image_name = $_FILES['image_path']['name'];
$image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

if (!in_array($image_ext, $allowed_exts)) {
    $error = 'Invalid image format. Allowed: jpg, jpeg, png, gif';
    include('./blog_form.php');
    exit;
}

// Insert blog entry
$query = "INSERT INTO blog_categories (title, author, content, date_published, cat_img, category, token) 
          VALUES ('$title', '$author', '$content', '$date_published', '', '$category', '".createToken()."')";
$result = mysqli_query($conn, $query);

if ($result) {
    $id = mysqli_insert_id($conn);
    $upload_dir = "uploads/blog_image/";
    $new_filename = "img{$id}.$image_ext";
    $upload_path = $upload_dir . $new_filename;

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move uploaded image
    if (move_uploaded_file($image_tmp, $upload_path)) {
        // Resize to 800x600
        resizeImage($upload_path, $upload_path, 845, 740);

        // Update DB with image path
        mysqli_query($conn, "UPDATE blog_categories SET cat_img = '$upload_path' WHERE id = '$id'");

        $success = 'Blog post added successfully.';
        include('./blog_form.php');
        exit;
    } else {
        $error = 'Error saving image.';
        include('./blog_form.php');
        exit;
    }
} else {
    $error = 'Error inserting blog post.';
    include('./blog_form.php');
    exit;
}
?>
