<?php
    include 'database/cookie.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="icon" href="img/img.png" type="image/png">
  <link rel="stylesheet" href="Bower/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/navbar.css" />
</head>

<body>
  <?php
      include_once('navbar.php');
  ?>

  <div class="parallax one" id="home">
    <div class="text">
      <div class="logo-container">
          <img src="img/logo.png" class="img-responsive" alt="logo">
          <h1>Report, view, or discuss local problems</h1>
      </div>
    </div>
  </div>

  <section class="color" id="about">
    <div class="container">
      <div class="info">
        <h2>WHAT IS IMPROVE ?</h2>
        <p >Is this a council website? No, it isn't – but Improve does send your reports direct to your local council. We also publish them online, so that others in the community can read, discuss, and offer advice where needed. </p>
        <div class="button">
          <a href="about.php">Learn More</a>
        </div>
      </div>
    </div>
  </section>

  <div class="parallax two"></div>

  <section class="color" id="reports">
    <div class="container">
      <div id="portion2" class="info">
        <h2>REPORTS</h2>
        <p>What can I report? Improve is primarily for reporting things which are broken or dirty or damaged or dumped, and need fixing, cleaning or clearing, like graffiti, dog fouling, potholes or street lights that don't work. </p>
        <div class="button">
          <a href="reports.php" >Learn More</a>
        </div>
      </div>
    </div>
  </section>

  <div class="parallax three"></div>

  <section class="color" id="contact">
    <div class="container">
      <div id="portion3" class="info">
        <h2>IMPROVE'S TEAM</h2>
        <p>We are not a Team because we work together. We are a Team because we work for to make Dream Works.</p>
        <div class="button">
          <a href="contact.php">Learn More</a>
        </div>
      </div>
    </div>
  </section>

<div class="color-footer">
  <div class="container">
    <footer class="info-footer info">
      <p>&copy; IMPROVE YOUR TOWN, &copy; Design by Gianluca Gambari</p>
    </footer>
  </div>
</div>

  <script src="Bower/jquery/jquery-3.2.1.min.js"  type="text/javascript">></script>
  <script src="Bower/bootstrap/js/bootstrap.min.js"></script>
  <script src="Bower/parallax.js/parallax.min.js"></script>
  <script type="text/javascript" src="js/navbar.js" ></script>


</body>

</html>
