<?php
  if (empty($_GET)) {
    echo "null";
  } else {
    $settore = $_GET["settore"];
    $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
    mysqli_select_db($link, "progetto_tirocinio");
    $query = mysqli_query($link, "SELECT * FROM aziende WHERE settore='$settore'");
    if (mysqli_num_rows($query)==0) {
      echo "null";
    } else {
      while ($azienda = mysqli_fetch_assoc($query)) {
        $id = $azienda["id"];
        $nome = $azienda["nome"];
        $aziende[] = array("id" => $id, "nome" => $nome);
      }
      echo json_encode($aziende);
    }
  }
?>
