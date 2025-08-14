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
  <div class="top">
    <div class="container">
      <div class="row">
      <?php 
        $query = "SELECT * FROM `blog_categories` ORDER by id DESC";
        $result = mysqli_query($conn,$query);
        $num = mysqli_num_rows($result);

        for ($i = 0; $i < $num; $i++) {
        $row = mysqli_fetch_array($result);
      ?>
        <div class="col-md-4 mt-5">
          <img src="app/<?= $row['cat_img']; ?>" class="img-fluid" />
          <div class="set">
            <a href="descrip.php?token=<?= $row['token']; ?>">
            <h6><?= $row['title']; ?></h6>
              <div class="arrow-right"></div>
            </a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>


  <?php include('footer.php'); ?>
</body>

</html>