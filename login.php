<?php
    include 'database/login-user.php';
    include 'database/register-user.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="icon" href="img/img.png" type="image/png">
  <link rel="stylesheet" href="Bower/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="css/navbar.css" />
</head>

<body>

  <?php
    include_once('navbar.php');
  ?>


  <div class="modal fade" id="modal-forgot-pwd" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">x</button>
                  <h2 style="text-align:center">Forgot Password</h2>
              </div>
              <div class="modal-body" >
                <div id="div-forgot-pwd">
                  <form action="" method="post"  style="text-align:center" >
                    <h3>Input Username and Email:</h3>
                    <div class="row" style="padding: 30px 50px; height: 30px; text-align:center">
                      <input type="text" name="username-forgot-pwd" id="username-forgot-pwd" tabindex="1" class="form-control" placeholder="Username">
                    </div>
                    <div class="row" style="padding: 20px 50px; height: 30px;">
                      <input type="email" name="email-forgot-pwd" id="email-forgot-pwd" tabindex="1" class="form-control" placeholder="Email">
                    </div>
                    <div class="row">
                      <input style="margin-top: 30px;" value="Submit" name="submit" id="submit-forgot-pwd" class="btn btn-default btn-lg" onclick="forgot_pwd()">
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer"></div>
          </div>
      </div>
  </div>

  <div class="container">
      	<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<div class="panel panel-login">
  					<div class="panel-heading">
  						<div class="row">
  							<div class="col-xs-6">
  								<a href="#" class="active" id="login-form-link">Login</a>
  							</div>
  							<div class="col-xs-6">
  								<a href="#" id="register-form-link">Register</a>
  							</div>
  						</div>
  						<hr>
  					</div>
  					<div class="panel-body">
  						<div class="row">
  							<div class="col-lg-12">

                  <!-- form login -->

                  <form id="login-form"  method="post" role="form" style="display: block" action="">
  									<div id="user-form" class="form-group has-feedback" >
  										<input type="text" name="user" id="user" tabindex="1" class="form-control" placeholder="Username" value="" >
                      <span id="user-glyph" class="glyphicon form-control-feedback invisible"></span>
                      <div class="alert alert-danger hide" id="user-err">

                      </div>
  									</div>

                    <div id="password-form" class="form-group has-feedback">
  										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="">
                      <span id="password-glyph" class="glyphicon form-control-feedback invisible"></span>
                      <div class="alert alert-danger hide" id="password-err">

                      </div>
  									</div>
  									<div class="form-group text-center">
  										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
  										<label for="remember"> Remember Me</label>
  									</div>
  									<div class="form-group">
  										<div class="row">
  											<div class="col-sm-6 col-sm-offset-3">
  												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-submit " value="Log In">
  											</div>
  										</div>
  									</div>
  									<div class="form-group">
  										<div class="row">
  											<div class="col-lg-12">
  												<div class="text-center">
  													<a tabindex="5" class="forgot-password" id="forgot-pwd">Forgot Password?</a>
  												</div>
  											</div>
  										</div>
  									</div>

                    <?php
                      if (!empty($errLogin)) { ?>
                        <div class="alert alert-danger" id="user-exist">
                          <p style="text-align:center"> Username or Password incorrect !!</p>
                        </div>
                    <?php } ?>
  								</form>

                  <!--form register-->

  								<form id="register-form" method="post" role="form" style="display: none;" action="">
  									<div id="new-user-form" class="form-group has-feedback">
  										<input type="text" name="new-username" id="new-username" tabindex="1" class="form-control" placeholder="Username" value="">
                      <span id="new-user-glyph" class="glyphicon form-control-feedback invisible"></span>
                      <div class="alert alert-danger hide" id="new-user-err">

                      </div>
  									</div>
  									<div id="email-form" class="form-group has-feedback">
  										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                      <span id="email-glyph" class="glyphicon form-control-feedback invisible"></span>
                      <div class="alert alert-danger hide" id="email-err">

                      </div>
  									</div>
  									<div id="new-password-form" class="form-group has-feedback">
  										<input type="password" name="new-password" id="new-password" tabindex="2" class="form-control" placeholder="Password">
                      <span id="new-password-glyph" class="glyphicon form-control-feedback invisible"></span>
                      <div class="alert alert-danger hide" id="new-password-err">

                      </div>
  									</div>
  									<div id="confirm-password-form" class="form-group has-feedback">
  										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                      <span id="confirm-password-glyph" class="glyphicon form-control-feedback invisible"></span>
                      <div class="alert alert-danger hide" id="confirm-password-err">

                      </div>
  									</div>
  									<div class="form-group">
  										<div class="row">
  											<div class="col-sm-6 col-sm-offset-3">
  												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-submit" value="Register Now">
  											</div>
  										</div>
  									</div>

                    <?php if(!empty($result_username) ) { ?>
                      <div class="alert alert-danger" id="user-exist">
                        <p style="text-align:center"> Username already exists !!</p>
                      </div>
                    <?php } ?>

  								</form>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  <script src="Bower/jquery/jquery-3.2.1.min.js"  type="text/javascript">></script>
  <script src="Bower/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/navbar.js" ></script>
  <script type="text/javascript" src="js/login.js" ></script>

  <script>
    $(document).ready(function(){
      var ul = document.getElementById('forgot-pwd');
      ul.onclick = function(event) {
        $("#modal-forgot-pwd").modal();
      };
    });

    var user = "";

    function forgot_pwd() {
      user = $("#username-forgot-pwd").val();
      var email = $("#email-forgot-pwd").val();
      if (user.length != 0 && email.length != 0){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("div-forgot-pwd").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "database/forgot-pwd.php?user="+user+"&email="+email, true);
        xhttp.send();
      }
    }
  </script>


</body>

</html>
