<?php
  $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
  mysqli_select_db($link, "progetto_tirocinio");
  $query = mysqli_query($link, "SELECT settore FROM aziende");
  $settori = array();
  while ($settore = mysqli_fetch_row($query)) {
    if (!(in_array($settore[0], $settori))) {
      $settori[] = $settore[0];
    }
  }
  echo json_encode($settori);
?>
