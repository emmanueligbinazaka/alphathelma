<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

$id = mysqli_real_escape_string($conn, $_POST['id']);
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
$query = "SELECT cat_img FROM blog_categories WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$existing = mysqli_fetch_assoc($result);
$existing_image = $existing['cat_img'] ?? '';

// Handle image if new one is uploaded
$image_tmp = $_FILES['cat_img']['tmp_name'] ?? null;
$image_ext = $image_tmp ? strtolower(pathinfo($_FILES['cat_img']['name'], PATHINFO_EXTENSION)) : null;

// Start building update query
$update_fields = "
    title = '$title', 
    author = '$author', 
    content = '$content',
    category = '$category',
    date_published = '$date'
";

// If new image uploaded and valid, save it and update path
if ($image_tmp && in_array($image_ext, $allowed_extensions)) {
    $image_path = "uploads/blogs/blog_$id.$image_ext";
    if (move_uploaded_file($image_tmp, $image_path)) {
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

// Update blog record
$query = "UPDATE blog_categories SET $update_fields WHERE id = '$id'";
if (!mysqli_query($conn, $query)) {
    $error = 'Failed to update blog details.';
    include('edit-blogs.php');
    exit;
}

$success = 'Blog updated successfully.';
include('edit-blogs.php');
exit;
?>
