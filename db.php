<?php

  $server = "localhost";
  $user = "root";
  $dbname = "prela_test";
  

  $conn = mysql_connect($server, $user, $password);

  $mysqli = new mysqli($server, $user, $password, $dbname);
  
  if ($mysqli->connect_error) {
  error_log($mysqli->connect_error);
  exit;
}
  mysql_select_db($dbname);
?>
