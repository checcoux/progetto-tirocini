<?php
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "test");
  $nome = $_GET["nome"];
  $cognome = $_GET["cognome"];
  $matricola = $_GET["matricola"];
  $dataInizio = $_GET["dataInizio"];
  $dataFine = $_GET["dataFine"];
  echo "$dataFine"
?>
