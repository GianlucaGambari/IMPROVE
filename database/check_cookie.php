<?php
    session_start();
    if(!isset($_SESSION['username_successful']) && !isset($_COOKIE['userlogin'])) {
        header("location: index.php");
    }
    if(isset($_SESSION['username_successful']) ) {
        $username=$_SESSION['username_successful'];
        $email=$_SESSION['email_successful'];
        $img = $_SESSION['img'];
    }
    else {
        parse_str($_COOKIE['userlogin'], $array);

        $username=$array['cookie_username'];
        $_SESSION['img'] = $array['img'];

        require_once ("connect.php");
        $connect = db_connection();

        $sql = "SELECT email FROM users where username='".$username."'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $email=$row["email"];
        }
        mysqli_close($connect);
    }




?>
