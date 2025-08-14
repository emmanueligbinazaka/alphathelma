<!-- 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alpha Thelma</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css" />
  <link rel="shortcut icon" href="images/logo (2) 1.png" type="image/x-icon">
  <script src="dist/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="banner">
    <h1>Latest Industry News</h1>
  </div>

  <div class="container h">
    <div class="row">
      <div class="col-md-7 descrip">
        <img src="images/14530 (1).png" class="img-fluid image" />
        <div>
          <h1>How to Build a Strong Brand Identity from Scratch</h1>
          📆 &nbsp; <strong>Published on:</strong> 6/11/2024 &nbsp; ✍️ &nbsp; <strong>By:</strong> James Hawton  &nbsp;
          📂 &nbsp;<strong>Category:</strong> Branding

          <p>Building a strong brand identity is more than just creating a logo—it’s about shaping how your audience
            perceives your business. A well-defined brand identity helps you stand out, build trust, and create a
            lasting connection with customers. Here’s how to establish a strong brand identity from scratch.</p>

          <h2>1. Define Your Brand Purpose & Values</h2>
          <p>Every strong brand starts with a clear purpose. You need to understand why your brand exists, what it
            stands for, and the values that drive it. These foundational elements shape how your audience connects with
            your business.</p>

          <h2>2. Research Your Target Audience & Competitors</h2>
          <p>A brand identity should be designed with the right audience in mind. Research your target customers, their
            preferences, and their challenges. Study your competitors to identify gaps in the market and find ways to
            differentiate your brand.</p>

          <h2>3. Choose Your Brand’s Visual Elements</h2>
          <p>Your visual identity includes your logo, color palette, typography, and imagery. These elements should
            align with your brand’s personality and create a consistent look and feel across all platforms.</p>

          <h2>4. Craft a Unique Brand Voice & Messaging</h2>
          <p>A strong brand has a distinct voice that reflects its personality. Whether formal, playful, or
            conversational, your tone should be consistent in all communications. Your messaging should be clear,
            engaging, and aligned with your brand’s values</p>

          <h2>5. Build a Strong Online Presence</h2>
          <p>Your brand identity should be reflected in every digital touchpoint, from your website to social media. A
            professional website, active social media profiles, and cohesive branding across digital channels help
            reinforce your brand’s image.</p>

          <h2>6. Maintain Brand Consistency</h2>
          <p>Consistency is key to building brand recognition and trust. Create brand guidelines that outline how your
            logo, colors, fonts, and messaging should be used. This ensures that your brand remains uniform across all
            platforms and communications.
            A strong brand identity helps businesses build credibility and loyalty. By following these steps, you can
            create a recognizable brand that resonates with your audience and sets you apart from competitors.</p>
        </div>
      </div>
      <div class="col-md-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="images/39530 (2).png" />
            </div>
            <div class="col-md-6">
              <p>The Future of Content Marketing</p>
              <span>Lorem ipsum dolor sit amet consectetur. Tempor amet non
                accumsan a auctor elementum.</span> <br>
              <button class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-6 mt-3">
              <img src="images/39530 (2).png" />
            </div>
            <div class="col-md-6">
              <p>The Future of Content Marketing</p>
              <span>Lorem ipsum dolor sit amet consectetur. Tempor amet non
                accumsan a auctor elementum.</span> <br>
              <button class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-6 mt-3">
              <img src="images/39530 (2).png" />
            </div>
            <div class="col-md-6">
              <p>The Future of Content Marketing</p>
              <span>Lorem ipsum dolor sit amet consectetur. Tempor amet non
                accumsan a auctor elementum.</span> <br>
              <button class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-6 mt-3">
              <img src="images/39530 (2).png" />
            </div>
            <div class="col-md-6">
              <p>The Future of Content Marketing</p>
              <span>Lorem ipsum dolor sit amet consectetur. Tempor amet non
                accumsan a auctor elementum.</span> <br>
              <button class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-6 mt-3">
              <img src="images/39530 (2).png" />
            </div>
            <div class="col-md-6">
              <p>The Future of Content Marketing</p>
              <span>Lorem ipsum dolor sit amet consectetur. Tempor amet non
                accumsan a auctor elementum.</span> <br>
              <button class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-6 mt-3">
              <img src="images/39530 (2).png" />
            </div>
            <div class="col-md-6">
              <p>The Future of Content Marketing</p>
              <span>Lorem ipsum dolor sit amet consectetur. Tempor amet non
                accumsan a auctor elementum.</span> <br>
              <button class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>
</html>  -->

<?php
$page = 'Services';

include('connection.php');
 ?>

<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alpha Thelma - Brand</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css" />
  <link rel="shortcut icon" href="images/logo (2) 1.png" type="image/x-icon">
  <script src="dist/js/bootstrap.min.js"></script>
</head>

<body>


  <?php include('header.php'); ?>

  <?php


$token = $_GET['token'];

    $query = "SELECT * FROM `blog_categories` WHERE token='$token' ";
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);

    for ($i = 0; $i < $num; $i++) {
    $row = mysqli_fetch_array($result);
  ?>

  <div class="container h">
    <div class="row">
    <div class="col-md-7 descrip">
        <img src="app/<?= $row['cat_img'] ?>" class="img-fluid image" />
        <div>
          <h1><?= $row['title'] ?></h1>
          📆 &nbsp; <strong>Published on:</strong> <?= $row['date_published'] ?> &nbsp; ✍️ &nbsp; <strong>By:</strong> <?= $row['author'] ?>  &nbsp;
          📂 &nbsp;<strong>Category:</strong> <?= $row['category'] ?>

          <?= $row['content'] ?>
        </div>
      </div>
    </div>
  </div>

  <?php } ?>


  <?php include('footer.php'); ?>
</body>
</html>