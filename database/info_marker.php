
<?php
session_start();
require_once ("connect.php");
$connect = db_connection();

$idmarker =($_GET['id']);

$sql= "SELECT user, name, city, address FROM markers WHERE idmarker='$idmarker'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($result);

$name = $row['name'];
$user = $row['user'];
$address = $row['address'];
$city = $row['city'];

if(isset($_SESSION['username_successful']) ) {
    $username=$_SESSION['username_successful'];
}
else {
    parse_str($_COOKIE['userlogin'], $array);
    $cookie=$array['value'];

    $sql_cookie= "SELECT username FROM cookies where id='".$cookie."'";
    $result_cookie =  mysqli_query($connect,$sql_cookie);
    $row_cookie = mysqli_fetch_array($result_cookie);

    $username = $row_cookie['username'];
}

?>


<div class="row no-padding" style="width:100%; height:100%">
    <div class="address-info no-padding">
        <h4 style="padding-left: 20px; vertical-align: middle;">address: <?php echo $address ?></h4>
    </div>
    <div class="marker-info no-padding">
        <h2 style="vertical-align: middle;" id="name-marker"> <?php echo $name ?> </h2>
    </div>
    <div class="username-info no-padding">
        <?php if ($user == $username) { ?>
            <h4  style="padding-right: 20px; vertical-align: middle;">user: YOU</h4>
        <?php } else { ?>
            <h4 style="padding-right: 20px; vertical-align: middle;">user: <?php echo $user ?></h4>
        <?php } ?>
    </div>

</div>
