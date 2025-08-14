<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

if ($_GET['token']) {
  $token = $_GET['token'];
}

$query = "select * from blog_categories where token = '$token'";

$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo (2) 1.png" type="image/png" />
  <!--plugins-->
  <link href="ltr/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="ltr/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="ltr/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="ltr/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="ltr/assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="ltr/assets/css/style.css" rel="stylesheet" />
  <link href="ltr/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
  <link href="ltr/assets/css/pace.min.css" rel="stylesheet" />
  <script src="./assets/ckeditor5-build-classic/ckeditor.js"></script>


  <!--Theme Styles-->
  <link href="ltr/assets/css/dark-theme.css" rel="stylesheet" />
  <link href="ltr/assets/css/light-theme.css" rel="stylesheet" />
  <link href="ltr/assets/css/semi-dark.css" rel="stylesheet" />
  <link href="ltr/assets/css/header-colors.css" rel="stylesheet" />

  <title>Aplha Thelma</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <?php include "./header.php" ?>
    <!--end top header-->

    <!--start sidebar -->
    <?php
    include "./aside.php";
    ?>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Blogs</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit Blogs</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <a href="./blog2">
              <button type="button" class="btn btn-primary">View Blogs</button>
            </a>

          </div>
        </div>
      </div>
      <!--end breadcrumb-->

      <form action="./proc_edit_blogs.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-xl-9 mx-auto">
      <h6 class="mb-0 text-uppercase">Edit Blogs</h6>
      <hr />
      <?php if (isset($error)) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
      } ?>
      <?php if (isset($success)) {
        echo '<div class="alert alert-success">' . $success . '</div>';
      } ?>

      <div class="card">
        <div class="card-body">
        <input type="hidden" name="token" value="<?php echo $row['token']; ?>">

          <div class="input-group mb-3">
            <span class="input-group-text">Title</span>
            <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" placeholder="Title">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Author</span>
            <input type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>" placeholder="Author">
          </div>

          <textarea class="form-control" id="editor" name="content" rows="10"><?php echo $row['content']; ?></textarea>

          <div class="input-group mb-3">
            <span class="input-group-text">Category</span>
            <select name="category" class="form-control">
              <option disabled>Select category</option>
              <option value="Branding" <?php if ($row['category'] == 'branding') echo 'selected'; ?>>Branding</option>
              <option value="Marketing" <?php if ($row['category'] == 'marketing') echo 'selected'; ?>>Marketing</option>
              <option value="Digital Marketing" <?php if ($row['category'] == 'digital_marketing') echo 'selected'; ?>>Digital Marketing</option>
            </select>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Date Posted</span>
            <input type="date" class="form-control" name="date_published" value="<?php echo $row['date_published']; ?>">
          </div>

          <!-- Show Current Image (only before a new one is selected) -->
<?php if (!empty($row['cat_img'])): ?>
  <div class="mb-3" id="current-image-container">
    <label class="form-label">Current Image</label><br>
    <img src="<?php echo $row['cat_img']; ?>" alt="Current Image" style="max-height: 150px;">
  </div>
<?php endif; ?>

<!-- Image Upload Field -->
<div class="input-group mb-3">
  <span class="input-group-text">Image</span>
  <input type="file" class="form-control" name="cat_img" id="cat_img" onchange="previewImage(event)">
</div>

<!-- New Image Preview (hidden initially) -->
<div id="preview-container" class="mb-3" style="display: none;">
  <label class="form-label">Selected Image Preview</label><br>
  <img id="image-preview" src="#" alt="Image Preview" style="max-height: 150px;">
</div>

<!-- JavaScript for Preview -->
<script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image-preview');
    const container = document.getElementById('preview-container');
    const currentImage = document.getElementById('current-image-container');

    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        container.style.display = 'block';
        if (currentImage) currentImage.style.display = 'none'; // Hide current image
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      container.style.display = 'none';
      preview.src = '#';
      if (currentImage) currentImage.style.display = 'block'; // Show current image if no new image selected
    }
  }
</script>



          <script>
            ClassicEditor
              .create(document.querySelector('#editor'))
              .catch(error => {
                console.error(error);
              });
          </script>

          <button class="btn btn-primary mt-3" type="submit">Update</button>
        </div>
      </div>
    </div>
  </div>
</form>


    </main>
    <!--end page main-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
      <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
      <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <h6 class="mb-0">Theme Variation</h6>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
            <label class="form-check-label" for="LightTheme">Light</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
            <label class="form-check-label" for="DarkTheme">Dark</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
            <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
          </div>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
            <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
          </div>
          <hr />
          <h6 class="mb-0">Header Colors</h6>
          <hr />
          <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
              <div class="col">
                <div class="indigator headercolor1" id="headercolor1"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor2" id="headercolor2"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor3" id="headercolor3"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor4" id="headercolor4"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor5" id="headercolor5"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor6" id="headercolor6"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor7" id="headercolor7"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor8" id="headercolor8"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end switcher-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="ltr/assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="ltr/assets/js/jquery.min.js"></script>
  <script src="ltr/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="ltr/assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="ltr/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="ltr/assets/js/pace.min.js"></script>
  <!--app-->
  <script src="ltr/assets/js/app.js"></script>


</body>

</html>