
<?php
session_start();
require_once ("connect.php");
$connect = db_connection();

$idmarker = ($_GET['idmarker']);

$sql= "SELECT name, user, address, city, description, data FROM markers WHERE idmarker='$idmarker'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($result);

$name = $row['name'];
$user = $row['user'];
$address = $row['address'];
$city = $row['city'];
$description = $row['description'];
$data = $row['data'];
$str="";

$target_dir = "img/upload/".$idmarker."/";
$directory = file_exists("../".$target_dir);
?>
<div class="scroll" style="height:100%">
  <div class="back-page">
    <span><i class="glyphicon glyphicon-menu-left"></i></span><a href='#' id="back" onclick="back_in_area()">Back to all reports</a>
  </div>
  <h2 style="text-align:center"><?php echo $name ?></h2>

  <?php if (!$directory) {?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/upload/default/no-image.png" alt="img" class="img-responsive">
        </div>

      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  <?php } else { ?>
        <?php $img_report = glob("../".$target_dir."*.{jpg,jpeg,gif,png}", GLOB_BRACE);
        $count = count($img_report);?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <?php for ($i=1; $i<$count; $i++) { ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>"></li>
            <?php } ?>
          </ol>
          <div class="carousel-inner" role="listbox">
            <?php $name_file = explode("/", $img_report[0]); ?>
            <div class="item active">
              <img src="img/upload/<?php echo $idmarker?>/<?php echo $name_file[4] ?>" class="img-responsive" alt="img" >
            </div>
            <?php for ($i=1; $i<$count; $i++) { ?>
              <?php $name_file = explode("/", $img_report[$i]); ?>
              <div class="item">
                <img src="img/upload/<?php echo $idmarker?>/<?php echo $name_file[4] ?>" class="img-responsive" alt="img">
              </div>
            <?php } ?>
          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          </div>
          <?php } ?>

  <div class="description">
    <h3>Description:</h3>
    <textarea disabled rows="5"><?php echo $description ?></textarea>
  </div>
  <div class="other-info">
    <p>User: <?php echo $user ?></p>
    <p>Data: <?php echo $data ?></p>
  </div>
</div>

<?php
mysqli_close($connect);
?>
