<?php
  $host='localhost';
  $database='practice';
  $user='root';
  $password='';

  $GLOBALS['mysqli'] = mysqli_connect($host, $user, $password, $database);
  if (mysqli_connect_errno($GLOBALS['mysqli'])) {
    echo "Couldn't connect to MySQL: ".mysqli_connect_error($mysqli);
  }
?>
