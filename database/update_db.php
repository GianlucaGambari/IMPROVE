<?php
$nameErr = "";
$emailErr = "";
$pwdErr = "";

function checkEmail($email){
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  if (filter_var($email, FILTER_VALIDATE_EMAIL))
    return true;
  else
    return false;
}

function checkPwd($pwd){
  if(strlen($pwd) >= 6)
    if (preg_match('/[A-Za-z]*.*[0-9]|[0-9].*[A-Za-z]/', $pwd))
      return true;
  return false;
}

function checkAccount($user, $connect) {
  $query = "SELECT username FROM users WHERE username ='".$user."'";
  $result = mysqli_query($connect, $query);
  if ( mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    return true;
  }
  else {
    return false;
  }
}


if (isset($_POST['btn-change-user'])) {

  require_once ("connect.php");
  $connect = db_connection();

  if (isset($_POST['change-user']) && !empty($_POST['change-user'])) {

    $new_username = trim($_POST["change-user"]);

    if (!checkAccount($new_username, $connect)) {

       if ($statement_update_user = mysqli_prepare($connect, "UPDATE users SET username=? WHERE username =?")) {
        mysqli_stmt_bind_param($statement_update_user, "ss", $new_username, $username);
        mysqli_stmt_execute($statement_update_user);
        mysqli_stmt_close($statement_update_user);

        $duplicate = glob("img/upload/".$username.".{jpg,jpeg,gif,png}", GLOB_BRACE);
        $imageFileType = pathinfo($duplicate[0],PATHINFO_EXTENSION);
        rename($duplicate[0], "img/upload/".$new_username.".".$imageFileType);
        $_SESSION['img'] = $new_username.".".$imageFileType;

        if(isset($_SESSION['username_successful'])) {
          $_SESSION['username_successful'] = $new_username;
        }

        if (isset($_COOKIE['userlogin'])){

          $img = $_SESSION['img'];

          if ($statement_update_name_img = mysqli_prepare ($connect, "UPDATE cookies SET username=?, img=? WHERE username=?")) {
            mysqli_stmt_bind_param($statement_update_name_img, "sss", $new_username, $img, $username);
            mysqli_stmt_execute($statement_update_name_img);
            mysqli_stmt_close($statement_update_name_img);
            //mysqli_close($connect);

          }
          //$new_cookie ="cookie_username=".$new_username."&img=".$_SESSION['img']."&cookie_session_id=".session_id();
          //setcookie("userlogin", $new_cookie, time()+3600, "/");
        }
        mysqli_close($connect);
        header('Location: area.php');
      }
    }
    else{
      $nameErr = "Username already exist";
    }
  }
}


if (isset($_POST['btn-change-email'])) {

  require_once ("connect.php");
  $connect = db_connection();


  if (isset($_POST['change-email']) && !empty($_POST['change-email'])) {
   $new_email = trim($_POST["change-email"]);

   if (checkEmail($new_email)) {

     if ($statement_email = mysqli_prepare($connect, "SELECT email FROM users WHERE username=?")) {
        mysqli_stmt_bind_param($statement_email, "s", $username);
        mysqli_stmt_execute($statement_email);
        mysqli_stmt_bind_result($statement_email, $res_email);
        mysqli_stmt_fetch($statement_email);
        mysqli_stmt_close($statement_email);

        if ($new_email != $res_email) {

          if ($statement_update_email = mysqli_prepare($connect, "UPDATE users SET email =? WHERE username =?")) {

           mysqli_stmt_bind_param($statement_update_email, "ss", $new_email, $username);
           mysqli_stmt_execute($statement_update_email);
           mysqli_stmt_close($statement_update_email);

           $_SESSION['email_successful'] = $new_email;
           mysqli_close($connect);
           header('Location: area.php');
         }
       }
       else{
         $emailErr = "The NewEmail as same as old Email ";
       }
     }
   }
   else {
     $emailErr = "The NewEmail as same as old Email";
   }
 }
}





if (isset($_POST['btn-change-pwd'])) {

  require_once ("connect.php");

  if (isset($_POST['change-pwd']) && isset($_POST['change-confirm-pwd']) && !empty($_POST['change-pwd']) && !empty($_POST['change-confirm-pwd'])) {

    $connect = db_connection();

    $new_pwd = trim($_POST["change-pwd"]);
    $new_con_pwd = trim($_POST["change-confirm-pwd"]);

    if(checkPwd($new_pwd)){

      if($new_pwd == $new_con_pwd) {

        if ($statement_pwd = mysqli_prepare($connect, "SELECT password FROM users WHERE username=?")) {

           mysqli_stmt_bind_param($statement_pwd, "s", $username);
           mysqli_stmt_execute($statement_pwd);
           mysqli_stmt_bind_result($statement_pwd, $res_pwd);
           mysqli_stmt_fetch($statement_pwd);
           mysqli_stmt_close($statement_pwd);

          if (!password_verify($new_pwd,$res_pwd) ) {

            $new_hash = password_hash($new_pwd, PASSWORD_DEFAULT);

            if ($statement_update_pwd = mysqli_prepare($connect, "UPDATE users SET password=? WHERE username =?")) {

              mysqli_stmt_bind_param($statement_update_pwd, "ss", $new_hash, $username);
              mysqli_stmt_execute($statement_update_pwd);
              mysqli_stmt_close($statement_update_pwd);

              mysqli_close($connect);
              header('Location: area.php');

            }
          }
        }
      }
      else{
        $pwdErr = "Password and confirm password do not match";
      }
    }
    else{
    $pwdErr = "New password must contain at most 6 characters and at most one number (0-9)";
    }
  }
}


if (isset($_POST['btn-delete-user'])) {

  require_once ("connect.php");
  $connect = db_connection();

  if ($statement_delete_user = mysqli_prepare($connect, "DELETE FROM users WHERE username =?")) {

    mysqli_stmt_bind_param($statement_delete_user, "s", $username);
    mysqli_stmt_execute($statement_delete_user);
    mysqli_stmt_close($statement_delete_user);
    mysqli_close($connect);

    $duplicate = glob("img/upload/".$_SESSION['username_successful'].".{jpg,jpeg,gif,png}", GLOB_BRACE);

    if (!empty($duplicate[0])) {
        unlink ($duplicate[0]);
    }

    header('Location: database/logout.php');
  }
  else{
    header('Location: user_info.php');
  }
}


?>
