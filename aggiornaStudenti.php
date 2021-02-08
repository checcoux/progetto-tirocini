<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuova azienda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
  <header>
      <a id="logo1" href="/">Portale<br>dei tirocini<br>d'azienda</a>
      <span id="logo2">Università<br>degli studi<br>di Udine</span>
	    <div class="gooey-rec"></div>
    </header>
    <div class="contenutoCentrato">
      <?php
        if (empty($_GET)) {
          echo '<h2>Ci dispiace</h2>
                <p>I tuoi dati non sono stati inseriti nel database. Puoi provare a <a href="/nuovoStudente.php">inserirli nuovamente</a> oppure <a href="/">tornare alla home</a>.</p>';
        } else {
          $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
          mysqli_select_db($link, "progetto_tirocinio");
          $nome = $_GET["nome"];
          $cognome = $_GET["cognome"];
          $matricola = $_GET["matricola"];
          $dataInizio = $_GET["dataInizio"];
          $dataFine = $_GET["dataFine"];
          $azienda = $_GET["azienda"];
          $settore = $_GET["settore"];
          $query = mysqli_query($link, "INSERT INTO tirocini (nome, cognome, matricola, dataInizio, dataFine, azienda, settore, stato) VALUES ('$nome', '$cognome', '$matricola', '$dataInizio', '$dataFine', '$azienda', '$settore', 0)");      
          $query = mysqli_query($link, "UPDATE aziende SET tirociniAttivi=tirociniAttivi+1 WHERE id='$azienda'");          
          mysqli_close($link);
          echo '<h2>Inserimento dati completato</h2>
                <p>I tuoi dati sono stati inseriti correttamente nel database.</p>';
        }
      ?>
    </div>

  </body>
</html>
