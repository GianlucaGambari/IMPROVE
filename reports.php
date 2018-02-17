<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0,  user-scalable=no">
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="icon" href="img/img.png" type="image/png">
  <link rel="stylesheet" href="Bower/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="css/info.css" />
  <link rel="stylesheet" href="css/navbar.css" />

</head>

<body>

   <?php
      include_once('navbar.php');
      //include 'database/get_markers.php';
  ?>

  <div class="container-fluid padded">

    <div class="row padded-google" id="map">
      <div class="col col-md-12"></div>
    </div>

    <div class="row padded-footer">
      <div class="col col-md-12">
        <footer class="info-footer-reports">
          <p>&copy; IMPROVE YOUR TOWN, &copy; Design by Gianluca Gambari</p>
        </footer>
      </div>
    </div>


  </div>

  <script src="Bower/jquery/jquery-3.2.1.min.js"  type="text/javascript">></script>
  <script src="Bower/bootstrap/js/bootstrap.min.js"></script>
  <script src="Bower/parallax.js/parallax.min.js"></script>
  <script type="text/javascript" src="js/navbar.js" ></script>
  <script type="text/javascript" src="js/google-map-area.js" ></script>


  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQga0gy1iDYPNgxairb2BU5xkx32S-EKc&callback=initMap">
  </script>

</body>

</html>
