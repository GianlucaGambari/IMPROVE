<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="icon" href="img/img.png" type="image/png">
  <link rel="stylesheet" href="Bower/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="css/info.css" />
  <link rel="stylesheet" href="css/navbar.css" />
</head>

<body>

  <?php
      include_once('navbar.php');
  ?>

  <div class="logo-container ">
      <img src="img/logo-black.png" class="img-responsive" alt="logo">
      <h1>Report, view, or discuss local problems</h1>
  </div>

  <section class="one">
      <div class="container team">
        <div class="row">
            <h1>IMPROVE'S TEAM</h1>
            <div class="col-lg-12">
                <img class="img-circle" src="img/gian.png" alt="Generic placeholder image" width="200" height="200">
                <h2>Gianluca Gambari</h2>
                <p>is the CO-CEO and CO-Founder of Improve, a student of computer science at University of Genua.</p>
                <p><a class="btn btn-default btn-lg" href="https://www.facebook.com/gianluca.gambari?fref=ts" role="button">View details &raquo;</a></p>
            </div>
        </div>
    </div>
  </section>

  <div class="color-footer">
    <div class="container">
      <footer class="info-footer">
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
