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
                <p>I dati dell\'azienda non sono stati inseriti nel database. Puoi provare a <a href="/nuovoAzienda.php">inserirli nuovamente</a> oppure <a href="/">tornare alla home</a>.</p>';
        } else {
          $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
          mysqli_select_db($link, "progetto_tirocinio");
          $nome = mysqli_real_escape_string($link, $_GET["nome"]);
          $descrizione = mysqli_real_escape_string($link, $_GET["descrizione"]);
          $regione = $_GET["regione"];
          $provincia = $_GET["provincia"];
          $comune = $_GET["comune"];
          $indirizzo = mysqli_real_escape_string($link, $_GET["indirizzo"]);
          $settore = $_GET["settore"];
          $email = $_GET["email"];
          $query = mysqli_query($link, "INSERT INTO aziende (nome, descrizione, regione, provincia, comune, indirizzo, settore, email) VALUES ('$nome', '$descrizione', '$regione', '$provincia', '$comune', '$indirizzo', '$settore', '$email')");
          $aziendaID = mysqli_fetch_assoc(mysqli_query($link, "SELECT id FROM aziende WHERE nome='$nome'"))["id"];
          if (!empty($_GET["telefono"])) {
            $telefono = $_GET["telefono"];
            $query = mysqli_query($link, "UPDATE aziende SET telefono='$telefono' WHERE id='$aziendaID'");
          }
          if (empty($_GET["web"])==false) {
            $web = $_GET["web"];
            $query = mysqli_query($link, "UPDATE aziende SET web='$web' WHERE id='$aziendaID'");
          }
          echo "<h2>Inserimento completato</h2><p>I dati dell'azienda sono stati inseriti correttamente nel database.</p>";
          mysqli_close($link);
        }
      ?>
    </div>
  </body>
</html>
