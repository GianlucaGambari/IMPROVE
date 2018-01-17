<?php

session_start();
$errLogin ="";

if (isset($_POST['login-submit'])) {

   require_once ("connect.php");

   if (!empty($_POST['user']) && !empty($_POST['password']) && isset($_POST['user']) && isset($_POST['password'])) {
      $connect = db_connection();

      $username = trim($_POST["user"]);
      $pwd = trim($_POST["password"]);


      if ($statement = mysqli_prepare($connect, "SELECT * FROM users WHERE username=?")) {

         mysqli_stmt_bind_param($statement, "s", $username);
         mysqli_stmt_execute($statement);
         mysqli_stmt_bind_result($statement, $res_username, $res_email, $res_password);
         mysqli_stmt_fetch($statement);

         if (password_verify($pwd,$res_password )) {
            $_SESSION["login_successful"]=true;
            $_SESSION["username_successful"]=$username;
            $_SESSION["email_successful"]=$res_email;

            $file = glob("img/upload/".$username.".{jpg,jpeg,gif,png}", GLOB_BRACE);

            if (!empty($file[0])) {
               $name_file = explode("/", $file[0]);
               $_SESSION['img']=$name_file[2];
            } else {
               $_SESSION['img']="user.png";
            }

            if (isset($_POST['remember'])) {
               $new_cookie ="cookie_username=".$username."&img=".$_SESSION['img']."&cookie_session_id=".session_id();
               setcookie("userlogin", $new_cookie, time()+3600, "/");
            }
            header('Location: area.php');
         }
         else {
           $errLogin = "Username or Password incorrect !!";
         }
      }
      mysqli_close($connect);
   }
}
?>
