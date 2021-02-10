<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Nuova azienda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                <p>Le relazioni non sono state inserite nel database. Puoi provare a <a href="/nuovoRelazione.php">inserirle nuovamente</a> oppure <a href="/">tornare alla home</a>.</p>';
        } else {
          $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
          mysqli_select_db($link, "progetto_tirocinio");
          $matricola = $_GET["matricola"];
          $relazioni = $_GET["relazioni"];
          $aziendeID = array_keys($_GET["relazioni"]);
          for ($i=0; $i < count($relazioni); $i++) {
            $aziendaID = $aziendeID["$i"];
            $relazione = $relazioni["$aziendaID"];
            $query = mysqli_query($link, "UPDATE tirocini SET relazione='$relazione', stato='1' WHERE matricola='$matricola' AND azienda='$aziendaID'");
          }
          echo "<h2>Inserimento completato</h2><p>Le nuove relazioni sono state inserite correttamente nel database.</p>";
          mysqli_close($link);
        }
      ?>
    </div>
  </body>
</html>
