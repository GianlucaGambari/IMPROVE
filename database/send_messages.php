<?php

$user =($_GET['user']);
$idmarker =($_GET['idmarker']);
$text =trim($_GET['text']);
$date =($_GET['date']);

require_once("connect.php");
$connect = db_connection();

if ($statement_insert_mex = mysqli_prepare ($connect, "INSERT INTO messages (idmex, username, idmarker, description, data) VALUES (default, ?,?,?,?)" )){
  mysqli_stmt_bind_param($statement_insert_mex, "siss", $user, $idmarker, $text, $date);
  mysqli_stmt_execute($statement_insert_mex);
  mysqli_stmt_close($statement_insert_mex);

}
?>
