<?php

$user = ($_GET['user']);
$email = ($_GET['email']);

require_once ("connect.php");
$connect = db_connection();


if ($statement_check_user_forgot_pwd = mysqli_prepare($connect, "SELECT username, email FROM users WHERE username=? and email=?")) {

   mysqli_stmt_bind_param($statement_check_user_forgot_pwd, "ss", $user, $email);
   mysqli_stmt_execute($statement_check_user_forgot_pwd);
   mysqli_stmt_bind_result($statement_check_user_forgot_pwd, $res_username, $res_email);
   mysqli_stmt_fetch($statement_check_user_forgot_pwd);

  if (!empty($res_username) && !empty($res_email)) {?>
   <form action ="database/change-forgot-pwd.php?user=<?php echo $user ?>" method="post" style="text-align:center">
     <h3>Input New Password:</h3>
     <div class="row" style="padding: 30px 50px; height: 30px;">
       <input type="password" name="pwd-forgot-pwd" id="pwd-forgot-pwd" tabindex="1" class="form-control" placeholder="Password">
     </div>
     <div class="row" style="padding: 20px 50px; height: 30px;">
       <input type="password" name="confirm-pwd-forgot-pwd" id="confirm-pwd-forgot-pwd" tabindex="1" class="form-control" placeholder="Confirm Password">
     </div>
     <div class="row">
       <input style="margin-top: 30px;" type="submit" value="Submit" id="submit-change-forgot-pwd" class="btn btn-default btn-lg">
     </div>
   </form>

  <?php  } else { ?>
    <form action ="" method="post" style="text-align:center">
      <div class="alert alert-danger" id="user-exist">
        <p style="text-align:center"> Username or Email incorrect !!</p>
      </div>
      <input style="margin-top: 30px;" type="submit" value="Submit" name="submit" id="submit-forgot-pwd" class="btn btn-default btn-lg">
  </form>
  <?php
    }
}?>
