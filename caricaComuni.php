<?php
  $provincia = $_GET["provincia"];
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "test");
  $query = mysqli_query($link, "SELECT * FROM comuni WHERE id_provincia='$provincia'");
  while ($comune = mysqli_fetch_assoc($query)) {
    $nome = $comune["nome"];
    $comuni[] = array("nome" => $nome);
  }
  echo json_encode($comuni);
?>
