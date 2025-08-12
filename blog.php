<?php
$page = 'Blog';
?>

<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alpha Thelma - Blog</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css" />
  <link rel="shortcut icon" href="images/logo (2) 1.png" type="image/x-icon">
  <script src="dist/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include('header.php'); ?>

  <div class="banner">
    <h1>Latest Industry News</h1>
  </div>

  <?php 
    $query = "SELECT title FROM blog_categories";
    $result = mysqli_query($conn,$query);
  ?>

  <div class="top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-5">
          <img src="images/14530.png" class="img-fluid" />
          <div class="set">
            <a href="#">
            <h6>How to Build a Strong Brand Identity from Scratch</h6>
              <div class="arrow-right"></div>
            </a>
          </div>
        </div>
        <div class="col-md-4 mt-5">
          <img src="images/14530.png" class="img-fluid" />
          <div class="set">
          <a href="#">
            <h6>How to Build a Strong Brand Identity from Scratch</h6>
              <div class="arrow-right"></div>
          </a>
          </div>
        </div>
        <div class="col-md-4 mt-5">
          <img src="images/14530.png" class="img-fluid" />
          <div class="set">
            <a href="#">
            <h6>How to Build a Strong Brand Identity from Scratch</h6>
              <div class="arrow-right"></div>
            </a>
          </div>
        </div>
        <div></div>
        <div class="col-md-4 mt-5">
          <img src="images/14530.png" class="img-fluid" />
          <div class="set">
            <a href="#">
            <h6>How to Build a Strong Brand Identity from Scratch</h6>
              <div class="arrow-right"></div>
            </a>
          </div>
        </div>
        <div class="col-md-4 mt-5">
          <img src="images/14530.png" class="img-fluid" />
          <div class="set">
            <a href="#">
            <h6>How to Build a Strong Brand Identity from Scratch</h6>
              <div class="arrow-right"></div>
            </a>
          </div>
        </div>
        <div class="col-md-4 mt-5">
          <img src="images/14530.png" class="img-fluid" />
          <div class="set">
            <a href="#">
            <h6>How to Build a Strong Brand Identity from Scratch</h6>
              <div class="arrow-right"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include('footer.php'); ?>
</body>

</html>