
<?php

session_start();
require_once ("connect.php");
$con = db_connection();

$target_dir = "../img/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Check if file already exists
$duplicate = glob($target_dir.$_SESSION['username_successful'].".{jpg,jpeg,gif,png}", GLOB_BRACE);
if (!empty($duplicate[0])) {
    unlink ($duplicate[0]);
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 9000000) {
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $uploadOk = 0;
}


if ($uploadOk == 1) {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        rename($target_file, $target_dir.$_SESSION['username_successful'].".".$imageFileType);
        $name = $_SESSION['username_successful'].".".$imageFileType;
        $username = $_SESSION['username_successful'];

        $_SESSION['img'] = $name;

        if ($statement_update_img = mysqli_prepare ($con, "UPDATE cookies SET img=? WHERE username=?")) {
          mysqli_stmt_bind_param($statement_update_img, "ss", $name, $username);
          mysqli_stmt_execute($statement_update_img);
          mysqli_stmt_close($statement_update_img);


        }
        mysqli_close($con);
        header("Location: ../user_info.php");

        //$new_cookie ="cookie_username=".$_SESSION['username_successful']."&img=".$_SESSION['img'];
        //setcookie("userlogin", $new_cookie, time()+3600, "/");


    }
}
//}
?>
