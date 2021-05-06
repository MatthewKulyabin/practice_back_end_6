<?php
  function getFromTable($mysqli, $query) {
    $arr = [];
    $res = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($res)) {
      array_push($arr, $row);
	  }
    return $arr;
  }

  function changeTable($mysqli, $query) {
    return mysqli_query($mysqli, $query);
  }
?>
