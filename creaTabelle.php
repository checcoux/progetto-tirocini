<?php
  $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
  if (!mysqli_select_db($link, "progetto_tirocinio")) {
    $query = mysqli_query($link, "CREATE DATABASE test");
  }
  mysqli_select_db($link, "progetto_tirocinio");
  $query = mysqli_query($link, "CREATE TABLE tirocini (
    matricola INT(6),
    nome CHAR(100),
    cognome CHAR(100),
    dataInizio CHAR(100),
    dataFine CHAR(100),
    settore CHAR(100),
    azienda CHAR(100)
  )");
  $query = mysqli_query($link, "CREATE TABLE aziende (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome CHAR(100),
    regione CHAR(100),
    provincia CHAR(100),
    comune CHAR(100),
    indirizzo CHAR(100),
    settore CHAR(100),
    email CHAR(100),
    web CHAR(100),
    tirociniAttivi INT(3),
    tirociniCompletati INT(3)
  )");

  mysqli_close($link);
?>
