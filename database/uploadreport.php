<?php
session_start();

  require_once("connect.php");
  $connect = db_connection();
  $name = trim($_GET['reportname']);
  $description = trim($_GET['description']);
  $lat = $_GET['lat'];
  $lng = $_GET['lng'];
  $address = trim($_GET['address']);
  $city = trim($_GET['city']);

  if(isset($_SESSION['username_successful']) ) {
      $user=$_SESSION['username_successful'];
  }
  else {
      parse_str($_COOKIE['userlogin'], $array);
      $user=$array['cookie_username'];
  }
  // Inserts new row with place data.
  if ($statement_insert = mysqli_prepare($connect, "INSERT INTO markers VALUES (default, ?, ?,?,?,?,?,?,current_timestamp())" )){
    mysqli_stmt_bind_param($statement_insert, "ssssdds", $user, $name, $address, $city, $lat,$lng,$description);
    mysqli_stmt_execute($statement_insert);
    mysqli_stmt_close($statement_insert);

  }
  $idmarker;
  $target_dir;
  if(!empty($_FILES)){
      $sql="SELECT idmarker FROM markers WHERE idmarker=(SELECT max(idmarker) FROM markers)";
      $result=mysqli_query($connect, $sql);
      $row = mysqli_fetch_array($result);
      $idmarker=$row["idmarker"];
      $target_dir = "../img/upload/" . $idmarker."/";
      mkdir($target_dir,0700);

  }
  mysqli_close($connect);
  $cnt=0;
  foreach($_FILES as $File){
    $uploadOk = 1;
    $target_file = $target_dir . basename($File['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      $check = $File['size'];
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }

      // Check file size
      if ($File['size'] > 9000000) {
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          $uploadOk = 0;
      }


      if ($uploadOk == 1) {
          if (move_uploaded_file($File['tmp_name'], $target_file)) {
              rename($target_file,$target_dir.$cnt.".".$imageFileType);
          }
      }
      $cnt++;
    }
  ?>
