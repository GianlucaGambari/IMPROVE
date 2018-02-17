<?php

if(isset($_COOKIE['userlogin'])){
   require_once ("connect.php");
   $connect = db_connection();

   $query = "SELECT id FROM cookies";
   $result = mysqli_query($connect, $query);
   parse_str($_COOKIE['userlogin'], $array);
   while ($row = mysqli_fetch_array($result)) {
        if ($row['id'] == $array['value']) {
           mysqli_close($connect);
           header('Location: area.php');
        }
    }
}

?>
