<?php
  $provincia = $_GET["provincia"];
  $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
  mysqli_select_db($link, "progetto_tirocinio");
  $query = mysqli_query($link, "SELECT * FROM comuni WHERE id_provincia='$provincia'");
  while ($comune = mysqli_fetch_assoc($query)) {
    $nome = $comune["nome"];
    $comuni[] = array("nome" => $nome);
  }
  echo json_encode($comuni);
?>
