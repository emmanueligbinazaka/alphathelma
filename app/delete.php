<?php
include('includes/connect.php');
require_once('includes/fns.php');

// Handle POST (bulk delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['check_token'])) {
        // Escape and sanitize each token
        $tokens = array_map(function($token) use ($conn) {
            return "'" . mysqli_real_escape_string($conn, $token) . "'";
        }, $_POST['check_token']);

        $token_list = implode(',', $tokens);
        $query = "DELETE FROM blog_categories WHERE token IN ($token_list)";
        
        if (mysqli_query($conn, $query)) {
            header("Location: blog2.php?success=Selected blogs deleted");
        } else {
            echo "Error deleting selected blogs.";
        }
        exit;
    } else {
        header("Location: blog2.php?error=No items selected");
        exit;
    }
}

// Handle GET (single delete)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);
    $query = "DELETE FROM blog_categories WHERE token = '$token'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: blog2.php?success=Blog deleted");
    } else {
        echo "Error deleting blog.";
    }
    exit;
}

// Fallback
header("Location: blog2.php?error=Invalid request");
exit;
