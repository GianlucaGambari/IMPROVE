
<?php
session_start();
require_once ("connect.php");
$connect = db_connection();

$q =($_GET['q']);

if (!empty($q)){
    $sql= "SELECT idmarker, user, name, city, address FROM markers WHERE address like '%$q%' or name like '%$q%' or city like '%$q%'";
    $result = mysqli_query($connect,$sql);
}
else {
    $sql= "SELECT idmarker, user, name, city, address FROM markers ORDER BY name ASC";
    $result = mysqli_query($connect,$sql);
}


while($row = mysqli_fetch_array($result)) {
    $idmarker = $row['idmarker'];
    $name = $row['name'];
    $user = $row['user'];
    $address = $row['address'];
    $city = $row['city'];
 ?>
    <li class='clearfix'>
        <a href='#' class='list-group-item' onclick="change_marker(<?php echo $idmarker ?>), info_marker(<?php echo $idmarker ?>), getIdMarker(<?php echo $idmarker ?>) ">
            <div>
                <h3> <?php echo $name ?></h3>
                <small> <?php echo $user ?></small>
                <h5> <?php echo $address ?> - <?php echo $city ?></h5>
            </div>
        </a>
    </li>
<?php
}

mysqli_close($connect);
?>
