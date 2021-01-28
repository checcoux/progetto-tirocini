<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <title>Scopri le aziende</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>

  </head>
  <body>
  <header>
      <a id="logo1" href="/">Portale<br>dei tirocini<br>d'azienda</a>
      <span id="logo2">Università<br>degli studi<br>di Udine</span>
	    <div class="gooey-rec"></div>
    </header>

    <?php
      $id = $_GET["id"];
      $link = mysqli_connect("db.ccns.it", "tirocinio_user","Tirocinio2020!");
      mysqli_select_db($link, "progetto_tirocinio");
      $query = mysqli_query($link, "SELECT * FROM aziende WHERE id = '$id'");
      $stato = 0;
      while ($azienda = mysqli_fetch_assoc($query)) {
        echo "<div class=\"row_azienda alt\">
                <img src=\"https://picsum.photos/seed/" . $azienda['id'] . "/100/100?grayscale\">
                <div>
                  <h2>" . $azienda['nome'] . "</h2>
                  <h4>" . $azienda['indirizzo'] . ", " .$azienda['comune'] . "</h4>
                  <h5><span class=\"hed\">TIROCINI</span> <span>IN CORSO</span> <span class=\"nmb\">" . $azienda['tirociniAttivi'] . "</span> <span class=\"dsk\">COMPLETATI</span> <span class=\"nmb\">" . $azienda['tirociniCompletati'] . "</span></h5>
                </div>
              </div>";
              $stato++;
      }

      if ($stato ==0) {echo '
        <div class="contenuto-centrato">
          <h2>Questa azienda non esiste</h2>
        </div>';}
    ?>
    <!-- INSERIRE BREVE DESCRIZIONE AZIENDA -->

  </body>
</html>
