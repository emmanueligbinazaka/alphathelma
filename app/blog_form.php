<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');


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
  <script src="./assets/ckeditor5-build-classic/ckeditor.js"></script>

  <!-- loader-->
  <link href="ltr/assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="ltr/assets/css/dark-theme.css" rel="stylesheet" />
  <link href="ltr/assets/css/light-theme.css" rel="stylesheet" />
  <link href="ltr/assets/css/semi-dark.css" rel="stylesheet" />
  <link href="ltr/assets/css/header-colors.css" rel="stylesheet" />

  <title>Alpha Thelma</title>
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
        <div class="breadcrumb-title pe-3">Blogs</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blogs</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <a href="./blog2">
              <button type="button" class="btn btn-primary">View Blogs</button></a>

          </div>
        </div>
      </div>
      <!--end breadcrumb-->

      <form action="./proc_add_blogform.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-xl-9 mx-auto">
      <h6 class="mb-0 text-uppercase">Blog</h6>
      <hr />
      <?php if (!empty($error)) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
      } ?>
      <?php if (!empty($success)) {
        echo '<div class="alert alert-success">' . $success . '</div>';
      } ?>

      <div class="card">
        <div class="card-body">
          <div class="input-group mb-3">
            <span class="input-group-text">Title</span>
            <input type="text" class="form-control" name="title" value="<?php echo $title ?? ''; ?>" placeholder="Title">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Author</span>
            <input type="text" class="form-control" name="author" value="<?php echo $author ?? ''; ?>" placeholder="Author">
          </div>

          <span class="input-group-text">Content</span>
          <textarea class="form-control mb-5" id="editor" name="content" rows="10"><?php echo $content ?? ''; ?></textarea>

          <div class="input-group mb-3">
            <span class="input-group-text">Category</span>
            <select name="category" class="form-control">
              <option disabled selected value="">Select Category</option>
              <option value="Branding" <?php echo ($category ?? '') === 'branding' ? 'selected' : ''; ?>>Branding</option>
              <option value="Marketing" <?php echo ($category ?? '') === 'marketing' ? 'selected' : ''; ?>>Marketing</option>
              <option value="Digital Marketing  " <?php echo ($category ?? '') === 'digital_marketing' ? 'selected' : ''; ?>>Digital Marketing</option>
            </select>
          </div>

          <span class="input-group-text">Date Posted</span>
          <input type="date" name="date" class="form-control mb-3" value="<?php echo $date ?? date('Y-m-d'); ?>">

          <div class="input-group mb-3">
            <span class="input-group-text">Image</span>
            <input type="file" class="form-control" name="image_path">
          </div>
          <div class="mb-3">
  <img id="previewImage" src="#" alt="Selected Image" style="max-height: 150px; display: none;">
</div>

          <script>
  const imageInput = document.querySelector('input[name="image_path"]');
  const previewImage = document.getElementById('previewImage');

  imageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
      }

      reader.readAsDataURL(file);
    }
  });
</script>


          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => console.error(error));
</script>


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