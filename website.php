<?php
$page = 'Services';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alpha Thelma - Website</title>
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
    <h1>Website Development</h1>
  </div>

  <div class="brand">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1>High-performance websites that impress and convert</h1>
          <p>
            Your website is your digital storefront. We design and develop <br>responsive, user-friendly websites that
            enhance your brand and drive <br> business growth
          </p>
          <span class="span">Our Website Development Service;</span>
          <div class="d-flex gap-4 mt-3">
            <img src="images/Vector.png">
            <span>Custom Web Design & Development</span>
          </div>
          <div class="d-flex gap-4 mt-3">
            <img src="images/Vector.png">
            <span>E-commerce Website Solutions</span>
          </div>
          <div class="d-flex gap-4 mt-3">
            <img src="images/Vector.png">
            <span>UX/UI Optimization</span>
          </div>
          <div class="d-flex gap-4 mt-3">
            <img src="images/Vector.png">
            <span>Landing Pages & Conversion Funnels</span>
          </div>
        </div>
        <div class="col-md-5">
          <img src="images/18705.png" class="img-fluid img">
        </div>
      </div>
    </div>
  </div>

  <div class="brand1">
    <h1>Why Invest in a Great Website?</h1>
    <p>A professional, fast, and responsive website increases credibility, improves user <br> experience, and boosts
      conversion. Let’s build your perfect website!</p>
    <a href="contact.php">Contact Us</a><i></i>
  </div>

  <?php include('footer.php'); ?>
</body>

</html>