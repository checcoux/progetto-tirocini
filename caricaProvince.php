<?php
  $regione = $_GET["regione"];
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "test");
  $query = mysqli_query($link, "SELECT * FROM province WHERE id_regione='$regione'");
  while ($provincia = mysqli_fetch_assoc($query)) {
    $id = $provincia["id"];
    $nome = $provincia["nome"];
    $province[] = array("id" => $id, "nome" => $nome);
  }
  echo json_encode($province);
?>
