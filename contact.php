<?php
$page = 'Contact';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alpha Thelma - Contact</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css" />
  <link rel="shortcut icon" href="images/logo (2) 1.png" type="image/x-icon">
  <script src="dist/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include('header.php'); ?>

  <div class="container contact">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 text-center">
        <h1>Let's Talk</h1>
        <p>
          We’d love to hear from you! Whether you have a project in mind, need
          expert advice, or just want to say hello, feel free to reach out.
        </p>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <div class="up">
    <div class="container">
      <div class="row">
        <div class="col-md-5 contact1">
          <div class="wow">
            <h1>Contact Information</h1>
            <p>Say something to start a live chat!</p>
            <div class="flex">
              <div class="email-section mail" style="">
                <i class="fa fa-phone"></i>
                <span>+1012 3456 789</span>
              </div>
              <div class="email-section">
                <i class="fa fa-envelope"></i>
                <span>info@alphathelma.com</span>
              </div>
              <div class="email-section">
                <i class="fa fa-map-marker"></i>
                <span>24, Okota road, Chemist Bustop, Isolo. <br>
                  Lagos state</span>
              </div>
            </div>
            <div class="col-md-3 gap1">
              <i class="fab fa-twitter"></i>
              <i class="fab fa-instagram"></i>
              <i class="fa fa-discord"></i>
            </div>
          </div>
        </div>

        <div class="col-md-7">
          <div class="container">
            <form action="proc-contact.php" method="post">

            <?php if($msg == 'success') { ?>
              <div class="alert alert-success t">Message Sent</div>
            <?php } ?>

            <?php if($msg == 'error') { ?>
              <div class="alert alert-danger t"><?php echo $comment; ?></div>
            <?php } ?>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-field">
                      <input type="text" id="first-name" name="firstname" value="<?php echo $firstname; ?>" />
                      <label for="first-name">First Name</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-field">
                      <input type="text" id="last-name" name="lastname" value="<?php echo $lastname; ?>" />
                      <label for="first-name">Last Name</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-field">
                      <input type="text" id="email" name="email" value="<?php echo $email; ?>"/>
                      <label for="first-name">Email</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-field">
                      <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"/>
                      <label for="first-name">Phone Number</label>
                    </div>
                  </div>
                </div>

                <label class="form-label" style="font-weight: bold; color: gray;">Select Subject?</label><br />
                <div class="dflex">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="General Inquiry" name="subject" id="subject1" checked />
                    <label class="form-check-label" for="subject1">General Inquiry</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="Applicaton" name="subject" id="subject2" />
                    <label class="form-check-label" for="subject2">Application</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="Question" name="subject" id="subject3" />
                    <label class="form-check-label" for="subject3">Questions</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="General Inquiry2" name="subject" id="subject4" />
                    <label class="form-check-label" for="subject4">General Inquiry2</label>
                  </div>
                </div>

                <div class="col-md-12 mt-3">
                  <div class="form-group">
                    <div class="input-field">
                      <input type="text" id="first-name" name="message" value="<?php echo $message; ?>"/>
                      <label for="first-name">Messages</label>
                    </div>
                  </div>
                </div>
                <div>
                  <button class="button">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('footer.php'); ?>
</body>

</html>