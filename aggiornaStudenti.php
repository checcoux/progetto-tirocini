<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuova azienda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
    <header>
      <span id="logo1">Università<br>degli studi<br>di Udine</span>
      <span id="logo2">Portale<br>dei tirocini<br>d'azienda</span>
    </header>
    <div class="contenuto-centrato">
      <h2>Inserimento dati completato</h2>
      <?php
        $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
        mysqli_select_db($link, "progetto_tirocinio");
        $nome = $_GET["nome"];
        $cognome = $_GET["cognome"];
        $matricola = $_GET["matricola"];
        $dataInizio = $_GET["dataInizio"];
        $dataFine = $_GET["dataFine"];
        $azienda = $_GET["azienda"];
        $settore = $_GET["settore"];
        $query = mysqli_query($link, "INSERT INTO tirocini (nome, cognome, matricola, dataInizio, dataFine, azienda, settore) VALUES ('$nome', '$cognome', '$matricola', '$dataInizio', '$dataFine', '$azienda', '$settore')");
        mysqli_close($link);
        echo "<p>I tuoi dati sono stati inseriti correttamente nel database.</p>";
      ?>
    </div>
    <img class="aggiorna-img" src="img/undraw_Forms_re_pkrt.svg">
  </body>
</html>
