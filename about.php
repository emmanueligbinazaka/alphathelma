<?php
$page = 'About';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alpha Thelma - About</title>
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
      <h1>About</h1>
    </div>

    <div class="about-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>Who We Are</h1>
            <p>
              Alpha Thelma Digital is a full-service digital marketing agency
              dedicated to helping brands stand out in a fast-paced digital
              world. We combine strategy, creativity, and technology to deliver
              impactful marketing solutions tailored to each client's unique
              needs.
            </p>
            <p>
              With expertise in brand development, content marketing, website
              development, SEO, PPC advertising, and more, we empower businesses
              to grow and thrive in a competitive landscape.
            </p>
          </div>
          <div class="col-md-6">
            <img src="images/47741 (2).png" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>

    <div class="about-section2">
      <div class="container">
        <h1>Mission</h1>
        <div class="row grid">
          <div class="col-md-4">
            <img
              src="images/pexels-tima-miroshnichenko-6791493.png"
              class="img-fluid"
            />
          </div>
          <div class="col-md-1">
            <img src="images/Line 10.png" class="know" style="margin-left: 30px;">
          </div>
          <div class="col-md-3">
            <p>
              To transform brands with data-driven strategies, innovative
              creativity, and cutting-edge digital solutions that drive
              measurable success.
            </p>
          </div>
          <h1>Vision</h1>
          <div class="col-md-4">
            <p>
              To be the go-to digital partner for businesses looking to scale,
              engage, and make a lasting impact in their industry."
            </p>
          </div>
          <div class="col-md-1">
            <img src="images/Line 10.png" class="know" style="margin-left: 30px;">
          </div>
          <div class="col-md-4">
            <img src="images/39530 (1).png" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>

    <div class="about-section3">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/21684.png" class="img-fluid" />
          </div>
          <div class="col-md-6">
            <h1>Our Core Values</h1>
            <div class="d-flex gap-3 mt-4">
              <div class="mt-2">
              <img src="images/Vector.png" class="img-fluid" />
              </div>
              <div>
                <span>Innovation</span>
                <p>
                  We stay ahead of trends to deliver fresh and <br />
                  effective strategies.
                </p>
              </div>
            </div>
            <div class="d-flex gap-3 mt-2">
              <div class="mt-2">
                <img src="images/Vector.png" class="img-fluid" />
              </div>
              <div>
                <span>Creativity</span>
                <p>
                  We craft compelling digital experiences that leave a lasting
                  impression.
                </p>
              </div>
            </div>
            <div class="d-flex gap-3 mt-2">
              <div class="mt-2">
                <img src="images/Vector.png" class="img-fluid" />
              </div>
              <div>
                <span>Result-Driven</span>
                <p>
                  Every campaign we create is focused on achieving measurable
                  success.
                </p>
              </div>
            </div>
            <div class="d-flex gap-3 mt-2">
              <div class="mt-2">
                <img src="images/Vector.png" class="img-fluid" />
              </div>
              <div>
                <span>Integrity</span>
                <p>
                  We build transparent, trust-based relationships with our
                  clients.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('footer.php'); ?>
  </body>
</html>
