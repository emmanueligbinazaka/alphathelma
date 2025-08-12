<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

$title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');
$author = mysqli_real_escape_string($conn, $_POST['author'] ?? '');
$content = mysqli_real_escape_string($conn, $_POST['content'] ?? '');
$category = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
$date_published = mysqli_real_escape_string($conn, $_POST['date'] ?? date('Y-m-d'));

$allowed_exts = ["jpg", "jpeg", "png", "gif"];

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

  move_uploaded_file($image_tmp, $upload_path);
  mysqli_query($conn, "UPDATE blog_categories SET cat_img = '$upload_path' WHERE id = '$id'");

  $success = 'Blog post added successfully.';
  include('./blog_form.php');
  exit;
} else {
  $error = 'Error inserting blog post.';
  include('./blog_form.php');
  exit;
}
?>
