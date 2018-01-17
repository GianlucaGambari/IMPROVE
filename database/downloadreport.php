<?php
session_start();

$lat0=$_GET['lat0'];
$lat1=$_GET['lat1'];
$lng0 = $_GET['lng0'];
$lng1 = $_GET['lng1'];
$str = trim($_GET['str']);

function parseToXML($htmlStr){
      $xmlStr=str_replace('<','&lt;',$htmlStr);
      $xmlStr=str_replace('>','&gt;',$xmlStr);
      $xmlStr=str_replace('"','&quot;',$xmlStr);
      $xmlStr=str_replace("'",'&#39;',$xmlStr);
      $xmlStr=str_replace("&",'&amp;',$xmlStr);
      $xmlStr=str_replace("è",'e\'',$xmlStr);
      $xmlStr=str_replace("é",'e\'',$xmlStr);
      $xmlStr=str_replace("ò",'o\'',$xmlStr);
      $xmlStr=str_replace("ù",'u\'',$xmlStr);
      $xmlStr=str_replace("ì",'i\'',$xmlStr);
      $xmlStr=str_replace("à",'a\'',$xmlStr);
      return $xmlStr;
}
require_once("connect.php");
$connect = db_connection();

if (empty($str)) {
  $query = "SELECT * FROM markers WHERE lat BETWEEN $lat0 AND $lat1 AND lng BETWEEN $lng0 AND $lng1";
  $result = mysqli_query($connect,$query);
}

else {
  $query = "SELECT * FROM markers WHERE lat BETWEEN $lat0 AND $lat1 AND lng BETWEEN $lng0 AND $lng1 AND name LIKE '%$str%'";
  $result = mysqli_query($connect,$query);
}
/*if (!$result) {
  die('Invalid query: ' . mysql_error());
}*/

header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<markers>';
// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_array($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'idmarker="' . $row['idmarker'] . '" ';
  echo 'user="' . parseToXML($row['user']) . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'city="' . parseToXML($row['city']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'description="' . $row['description'] . '" ';
  echo 'data="' . $row['data'] . '" ';
  echo '/>';
}
// End XML file
echo '</markers>';

?>
