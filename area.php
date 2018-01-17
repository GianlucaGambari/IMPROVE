<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="icon" href="img/img.png" type="image/png">
  <link rel="stylesheet" href="Bower/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/area.php" />
</head>

<body>
  <?php
      include 'database/check_cookie.php';
      //include 'database/google-map.php';
      include_once('navbar.php');
  ?>

  <div class="container-fluid padded">


    <div class="row padded-google">
      <div class="col col-md-4 padded-google" id="info-area-marker">

        <div class="search">
          <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search..." onkeyup="marker_in_area(this.value); name_marker(this.value)">
            <span class="input-group-addon">
              <i class="glyphicon glyphicon-search glyph"></i>
            </span>
          </div>
         </div>

        <div class="scroll padded-marker" id="marker_in_area"></div>
      </div>
      <div class="col col-md-8 padded-google" id="map"> </div>
    </div>

    <!-- Modal -->
      <div class="modal fade" id="insert" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 style="text-align:center">New Report</h2>
              </div>
              <div class="modal-body">
                    <div class="form-group">
                      <label for="reportname">Report name:</label>
                      <input type="text" class="form-control" id="reportname">
                    </div>
                    <div class="form-group">
                      <label for="reportaddress">Report Address:</label>
                      <input type="text" class="form-control" id="reportaddress">
                    </div>
                    <div class="form-group">
                      <label for="reportcity">Report City:</label>
                      <input type="text" class="form-control" id="reportcity">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea style="resize:none" class="form-control" rows="3" id="description"></textarea>
                    </div>
                    <h5 class="modal-margin">Select image to upload:</h5>
                    <div class="row">
                      <div class="col-xs-8 col-md-8">
                        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" class="btn btn-default btn-upload btn-md modal-margin" multiple>
                      </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" id="send" name="send" onclick="return saveData()">Upload Report</button>
              </div>
          </form>
          </div>

        </div>
      </div>

      <div class="alert alert-success alert-dismissible message hide">
        <a href="#" class="close">&times;</a>
        <div style="text-align:center" id="message"></div>
      </div>

  </div>


  <script src="Bower/jquery/jquery-3.2.1.min.js"  type="text/javascript">></script>
  <script src="Bower/bootstrap/js/bootstrap.min.js"></script>
  <script src="Bower/parallax.js/parallax.min.js"></script>
  <script type="text/javascript" src="js/navbar_area.js" ></script>
  <script type="text/javascript" src="js/google-map-area.js" ></script>

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQga0gy1iDYPNgxairb2BU5xkx32S-EKc&callback=initMap">
  </script>

</body>
</html>
