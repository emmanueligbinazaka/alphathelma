<?php
include('includes/connect.php');
require_once('includes/fns.php');

// Handle POST (bulk delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['check_id'])) {
        $ids = array_map('intval', $_POST['check_id']);
        $id_list = implode(',', $ids);
        $query = "DELETE FROM blog_categories WHERE id IN ($id_list)";
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
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM blog_categories WHERE id = $id";
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
