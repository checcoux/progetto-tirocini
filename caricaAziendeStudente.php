<?php
  $matricola = $_GET["matricola"];
  if (empty($matricola)) {
    echo "vuotaMatricola";
  } else {
    $link = mysqli_connect("db.ccns.it", "tirocinio_user", "Tirocinio2020!");
    mysqli_select_db($link, "progetto_tirocinio");
    $query = mysqli_query($link, "SELECT * FROM tirocini WHERE matricola='$matricola'");
    if (mysqli_num_rows($query)==0) {
      echo "noMatricola";
    } else {
      while ($tirocinio = mysqli_fetch_assoc($query)) {
        if (empty($tirocinio["relazione"]) || $tirocinio["relazione"]==NULL) {
          $id = $tirocinio["azienda"];
          $azienda = mysqli_fetch_assoc(mysqli_query($link, "SELECT nome FROM aziende WHERE id='$id'"))["nome"];
          $tirocini[] = array("id" => $id, "azienda" => $azienda);
        } else {
          continue;
        }
      }
      if (!empty($tirocini)) {
        echo json_encode($tirocini);
      } else {
        echo "noTirocini";
      }
    }
  }
?>
