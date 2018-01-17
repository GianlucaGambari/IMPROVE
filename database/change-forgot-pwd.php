<?php

function checkPwd($pwd){
  if(strlen($pwd) >= 6)
    if (preg_match('/[A-Za-z]*.*[0-9]|[0-9].*[A-Za-z]/', $pwd))
      return true;
  return false;
}

$user = trim($_GET['user']);
$new_pwd = ($_POST['pwd-forgot-pwd']);
$new_con_pwd = ($_POST['confirm-pwd-forgot-pwd']);

if (isset($new_pwd) && isset($new_con_pwd) && !empty($new_pwd) && !empty($new_con_pwd)) {

  require_once ("connect.php");
  $connect = db_connection();

  $new_pwd = trim($new_pwd);
  $new_con_pwd = trim($new_con_pwd);

  if(checkPwd($new_pwd)){
    if($new_pwd == $new_con_pwd) {
      $new_hash = password_hash($new_pwd, PASSWORD_DEFAULT);
      if ($statement_update_forgot_pwd = mysqli_prepare($connect, "UPDATE users SET password=? WHERE username =?")) {
        mysqli_stmt_bind_param($statement_update_forgot_pwd, "ss", $new_hash, $user);
        mysqli_stmt_execute($statement_update_forgot_pwd);
        mysqli_stmt_close($statement_update_forgot_pwd);
        mysqli_close($connect);


        header("Location: ../login.php?type=login");
      }
    }
  }
}
else {
    header("Location: ../login.php?type=login");
}

?>
