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
    include 'database/update_db.php';
    include_once('navbar.php');

  ?>

  <div class="modal fade" id="modal-change-img" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">x</button>
                  <h2 style="text-align:center">Change Image</h2>
              </div>
              <div class="modal-body">
                <form action="database/upload.php" method="post" enctype="multipart/form-data">
                  <h3>Select image to upload:</h3>
                  <div class="row">
                    <div class="col-xs-offset-2 col-md-offset-2">
                      <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-default btn-lg btn-upload">
                    </div>
                  </div>
                  <input type="submit" value="Upload Image" name="submit" id="submit-img" class="btn btn-default btn-lg ">
                </form>
              </div>
              <div class="modal-footer"></div>
          </div>
      </div>
  </div>

 <div class ="account">
    <div class="container-fluid" >
      <h1> Account </h1>
    </div>
  </div>

  <div class="container">
    <div class="row position">
      <div class="col-lg-6 col-xs-12">
        <div class="menu">
          <div class="img-profile">
            <br/>
            <a id="change-img" style="text-decoration:none; color:black"><h3 class="change" >Change Image</h3></a>
          </div>
          <h2><?php echo $username ?> </h2>

          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <button type="button" class="btn btn-default button" onclick="change_user()">
              <span class="border glyphicon glyphicon-user" aria-hidden="true" style="padding-right:10px;"></span> Account
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <button type="button" class="btn btn-default button" onclick="change_pwd()">
              <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="padding-right:10px;"></span> Change Password
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <button type="button" class="btn btn-default button" onclick="delete_user()">
              <span class="glyphicon glyphicon-trash" aria-hidden="true" style="padding-right:10px;"></span> Delete Account
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xs-12">
        <form id="info-form"  method="post" role="form" action=""></form>

        <?php if (!empty($nameErr)) { ?>
          <div class="alert alert-danger" style="text-align: center" role="alert">
            <h4> <?php echo $nameErr ?> </h4>
          </div>
        <?php }  ?>

        <?php if (!empty($emailErr)) { ?>
          <div class="alert alert-danger" style="text-align: center" role="alert">
            <h4> <?php echo $emailErr ?> </h4>
          </div>
        <?php }  ?>

        <?php if (!empty($pwdErr)) { ?>
          <div class="alert alert-danger" style="text-align: center" role="alert">
            <h4> <?php echo $pwdErr ?> </h4>
          </div>
        <?php }  ?>

      </div>
    </div>

  </div>


  <script src="Bower/jquery/jquery-3.2.1.min.js"  type="text/javascript">></script>
  <script src="Bower/bootstrap/js/bootstrap.min.js"></script>
  <script src="Bower/parallax.js/parallax.min.js"></script>
  <script type="text/javascript" src="js/navbar_area.js" ></script>
  <script type="text/javascript" src="js/change_info.js" ></script>

  <script>
      $(document).ready(function(){
      var ul = document.getElementById('change-img');
      ul.onclick = function(event) {
          $("#modal-change-img").modal();
        };
      });

  </script>

</body>
</html>
