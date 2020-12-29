<?php
  $settore = $_GET["settore"];
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "test");
  $query = mysqli_query($link, "SELECT * FROM aziende WHERE settore='$settore'");
  while ($azienda = mysqli_fetch_assoc($query)) {
    $id = $azienda["id"];
    $nome = $azienda["nome"];
    $aziende[] = array("id" => $id, "nome" => $nome);
  }
  echo json_encode($aziende);
?>
