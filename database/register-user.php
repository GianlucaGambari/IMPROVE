<?php

if (isset($_POST['register-submit'])) {

  require_once("connect.php");

  if (!empty($_POST["new-username"]) && !empty($_POST["email"]) && !empty($_POST["new-password"]) && !empty($_POST["confirm-password"])  ) {

    if ($_POST['new-password'] == $_POST['confirm-password']) {
      $connect = db_connection();

      $username = trim($_POST['new-username']);
      $email = trim($_POST['email']);
      $pwd = trim($_POST['new-password']);

      if ($statement_search = mysqli_prepare($connect, "SELECT * FROM users WHERE username=?")) {
        mysqli_stmt_bind_param($statement_search, "s", $username);
        mysqli_stmt_execute($statement_search);
        mysqli_stmt_bind_result($statement_search, $result_username, $result_email, $result_password);
        mysqli_stmt_fetch($statement_search);
        mysqli_stmt_close($statement_search);

        if(empty($result_username)) {

          $hash = password_hash($pwd, PASSWORD_DEFAULT);

          if ($statement_insert = mysqli_prepare ($connect, "INSERT INTO users VALUES (?, ?, ?)" )){
            mysqli_stmt_bind_param($statement_insert, "sss", $username, $email, $hash);
            mysqli_stmt_execute($statement_insert);
            mysqli_stmt_close($statement_insert);

          }
          header('Location: login.php?type=login');
        }
        mysqli_close($connect);
      }
    }
  }
}

?>
