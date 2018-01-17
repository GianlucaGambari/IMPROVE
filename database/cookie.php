<?php

if(isset($_COOKIE['userlogin'])){
   require_once ("connect.php");
   $connect = db_connection();
   $query = "SELECT username FROM users";
   $result = mysqli_query($connect, $query);
   parse_str($_COOKIE['userlogin'], $array);
   while ($row = mysqli_fetch_array($result)) {
        //if (password_verify($row['username'], $_COOKIE['userlogin'])) {
        if ($row['username'] == $array['cookie_username']) {
           mysqli_close($connect);
           header('Location: area.php');
        }
    }
}

?>
