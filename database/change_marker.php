<?php
session_start();
require_once ("connect.php");
$connect = db_connection();

$id = ($_GET['id']);


$sql= "SELECT idmex, username, idmarker, description, data FROM messages where idmarker='".$id."'";
$result = mysqli_query($connect,$sql);

if(isset($_SESSION['username_successful']) ) {
    $username=$_SESSION['username_successful'];
}
else {
    parse_str($_COOKIE['userlogin'], $array);
    $username=$array['cookie_username'];
}

if(mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)) {
    $idmex = $row['idmex'];
    $user = $row['username'];
    $mex = $row['description'];
    $data = $row['data'];

    if ($user == $username){
  ?>
    <div class="message my-message">
        <p> <?php echo $mex ?> </p>
        <small style="float:right"> <?php echo $data ?> </small>
    </div>
    <?php } else { ?>
    <div class="message other-message">
        <h4> <?php echo $user ?></h4>
        <p> <?php echo $mex ?> </p>
        <small style="float:right"> <?php echo $data ?> </small>
    </div>

  <?php }
  }
}
else {  ?>
  <div>
    <h3 id="no-messages" style="text-align:center">There aren't messages for this marker!!</h3>
  </div>
<?php }
mysqli_close($connect);
?>
