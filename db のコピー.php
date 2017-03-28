<?php

  $server = "mysql103.phy.lolipop.lan";
  $user = "LAA0671860";
  $dbname = "LAA0671860-canon";
  $password = "canon1289";
  

  $conn = mysql_connect($server, $user, $password);

  $mysqli = new mysqli($server, $user, $password, $dbname);
  
  if ($mysqli->connect_error) {
  error_log($mysqli->connect_error);
  exit;
}
  mysql_select_db($dbname);
?>
