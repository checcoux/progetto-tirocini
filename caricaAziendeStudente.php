<?php
  $matricola = $_GET["matricola"];
  $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
  mysqli_select_db($link, "progetto_tirocinio");
  $query = mysqli_query($link, "SELECT * FROM tirocini WHERE matricola='$matricola'");
  while ($tirocinio = mysqli_fetch_assoc($query)) {
    if (empty($tirocinio["relazione"])) {
      $id = $tirocinio["azienda"];
      $azienda = mysqli_fetch_assoc(mysqli_query($link, "SELECT nome FROM aziende WHERE id='$id'"))["nome"];
      $tirocini[] = array("id" => $id, "azienda" => $azienda);
    } else {
      break;
    }
  }
  if (!empty($tirocini)) {
    echo json_encode($tirocini);
  } else {
    echo json_encode(null);
  }
?>
