<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');

// Count total blogs
$sqlBlogs = "SELECT COUNT(*) AS total FROM blog_categories"; // change 'blogs' to your blog table name
$resultBlogs = $conn->query($sqlBlogs);
$totalBlogs = ($resultBlogs) ? $resultBlogs->fetch_assoc()['total'] : 0;

// Count total contacts
$sqlContacts = "SELECT COUNT(*) AS total FROM contact_form"; // change 'contacts' to your contact table name
$resultContacts = $conn->query($sqlContacts);
$totalContacts = ($resultContacts) ? $resultContacts->fetch_assoc()['total'] : 0;
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo (2) 1.png" type="image/png" />
  <!--plugins-->
  <link href="ltr/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
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

    <?php include "./aside.php"; ?>

    <!--start content-->
    <main class="page-content">

      <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
                
        <div class="col">
          <div class="card overflow-hidden radius-10">
            <div class="card-body">
              <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                <div class="w-50">
                  <p>Blogs</p>
                  <h4 class="">
                    <?php echo $totalBlogs; ?>
                  </h4>
                </div>
                <div class="w-50">
                  <!-- Optional chart space -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card overflow-hidden radius-10">
            <div class="card-body">
              <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                <div class="w-50">
                  <p>Contact</p>
                  <h4 class="">
                    <?php echo $totalContacts; ?>
                  </h4>
                </div>
                <div class="w-50">
                  <!-- Optional chart space -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><!--end row-->

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
      <!-- Theme switcher content here -->
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
  <script src="ltr/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="ltr/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="ltr/assets/js/pace.min.js"></script>
  <script src="ltr/assets/plugins/chartjs/js/Chart.min.js"></script>
  <script src="ltr/assets/plugins/chartjs/js/Chart.extension.js"></script>
  <script src="ltr/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <!--app-->
  <script src="ltr/assets/js/app.js"></script>
  <script src="ltr/assets/js/index.js"></script>
  <script>
    new PerfectScrollbar(".best-product")
  </script>

</body>
</html>
