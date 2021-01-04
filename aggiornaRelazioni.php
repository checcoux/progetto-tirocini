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
    <div class="contenuto-centrato">
      <h2>Inserimento relazioni completato</h2>
      <?php
        $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
        mysqli_select_db($link, "progetto_tirocinio");
        $matricola = $_GET["matricola"];
        $relazioni = $_GET["relazioni"];
        $aziendeID = array_keys($_GET["relazioni"]);
        for ($i=0; $i < count($relazioni); $i++) {
          $aziendaID = $aziendeID["$i"];
          $relazione = $relazioni["$aziendaID"];
          $query = mysqli_query($link, "UPDATE tirocini SET relazione='$relazione' WHERE matricola='$matricola' AND azienda='$aziendaID'");
        }
        echo "<p>Le nuove relazioni sono state inserite correttamente nel database.</p>";
        mysqli_close($link);
      ?>
    </div>
    <img class="immagini-basso" src="img/undraw_Forms_re_pkrt.svg">
  </body>
</html>
